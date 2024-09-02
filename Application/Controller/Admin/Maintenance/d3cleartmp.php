<?php

/**
 * Copyright (c) D3 Data Development (Inh. Thomas Dartsch)
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <info@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\FileSizeFormatter;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\UtilsView;

class d3cleartmp extends d3_cfg_mod_main
{
    public $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/cleartmp';
    protected $_sMenuSubItemTitle = 'd3mxd3cleartmp';
    protected $_sModId = 'd3modcfg_lib';
    private bool $_blIsTicker = false;
    protected $_sTickerUrl = null;
    /** @var d3filesystem */
    public $oFS = null;
    /** @var d3clrtmp */
    public $oClrTmp;

    /**
     * d3cleartmp constructor.
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function __construct()
    {
        d3install::getInstance()->startUpdateFrame();

        $this->addTplParam('clearModule', false);
        $this->addTplParam('clearSeo', false);
        $this->addTplParam('clearViews', false);
        $this->addTplParam('clearAll', false);
        $this->addTplParam('clearClassPath', false);
        $this->addTplParam('clearFrontend', false);
        $this->addTplParam('clearStructure', false);
        $this->addTplParam('clearDB', false);
        $this->addTplParam('clearLang', false);
        $this->addTplParam('clearTagcloud', false);
        $this->addTplParam('clearMenu', false);

        parent::__construct();
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render()
    {
        $sRet = parent::render();

        Registry::getConfig()->getActiveView()->addTplParam(
            'blShopIsProductive',
            Registry::getConfig()->isProductiveMode()
        );

        return $sRet;
    }

    /**
     * @return bool|d3_cfg_mod|false
     * @throws DatabaseConnectionException
     * @throws DBALException
     * @throws DatabaseErrorException
     */
    public function d3GetSet()
    {
        return d3_cfg_mod::get($this->_d3GetModId());
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function setDevelopmentMode()
    {
        $this->d3GetSet()->prepareSaveData();
        $this->d3GetSet()->save();
    }

    public function startTicker()
    {
        $this->_generateTickerUrl();
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearTmp()
    {
        $oClrTmp = $this->_getClrTmp();

        if (Registry::get(Request::class)->getRequestEscapedParameter('clearall')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearAll', true);
            $blReturn = $oClrTmp->clearAllCache();
        } else {
            $blReturn = $this->_clearCacheParts($oClrTmp);
            if (Registry::get(Request::class)->getRequestEscapedParameter('clearviewcache')) {
                Registry::getConfig()->getActiveView()->addTplParam('clearViews', true);
                $blClrTmp = $oClrTmp->updateViews();
                if (true === $blClrTmp) {
                    Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3_CFG_CLRTMP_VIEWUPDATESUCCESS'));
                } elseif (false === $blClrTmp) {
                    Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3_CFG_CLRTMP_VIEWUPDATENOSUCCESS'));
                }
            }
        }

        if ($blReturn) {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3_CFG_CLRTMP_SUCCESS'));
        }
    }

    /**
     *
     * @return string
     */
    public function getTmpPath()
    {
        return Registry::getConfig()->getConfigParam('sCompileDir');
    }

    /**
     * @return string
     */
    public function getTmpSize(): string
    {
        return (oxNew(FileSizeFormatter::class))->format($this->oFS->dirsize($this->getTmpPath()));
    }

    /**
     * @return int
     */
    public function getTmpCount()
    {
        return $this->_getFileSystemHandler()->filecount($this->getTmpPath());
    }

    /**
     *
     */
    public function getHelpUrl()
    {
        return;
    }

    /**
     * @return d3filesystem
     */
    protected function _getFileSystemHandler()
    {
        if (false == $this->oFS) {
            $this->oFS = oxNew(d3filesystem::class);
        }

        return $this->oFS;
    }

    /**
     * @return d3clrtmp
     */
    protected function _getClrTmp()
    {
        if (false == $this->oClrTmp) {
            $this->oClrTmp = oxNew(d3clrtmp::class);
        }

        return $this->oClrTmp;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasTicker()
    {
        $iThreshold = $this->getTickerThreshold();

        if ($this->getTmpCount() >= $iThreshold) {
            return true;
        }

        return false;
    }

    /**
     * @return int|mixed
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getTickerThreshold()
    {
        return $this->d3GetSet()->getValue('iClrTmp_tickerThreshold') ?: 50000;
    }

    /**
     * @param $iSlot
     * @return bool|mixed
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getUserDefinedAction($iSlot)
    {
        if ($this->d3GetSet()->getValue('sClrTmp_useraction' . $iSlot . 'name') &&
            $this->d3GetSet()->getValue('sClrTmp_useraction' . $iSlot . 'pattern')
        ) {
            return $this->d3GetSet()->getValue('sClrTmp_useraction' . $iSlot . 'name');
        }

        return false;
    }

    /**
     * @param null $iStep
     */
    protected function _generateTickerUrl($iStep = null)
    {
        // $oSession = oxRegistry::getSession();
        $aParams = [];

        $aParams['cl']              = 'd3cleartmp';
        $aParams['remoteaccess']    = 'true';
        $aParams['fnc']             = 'clrtmpticker';
        $aParams['iLimitTimeStamp'] =
            Registry::get(Request::class)->getRequestEscapedParameter('iLimitTimeStamp') ?: time();

        if ($iStep) {
            $aParams['istep'] = $iStep;
        }

        if (Registry::get(Request::class)->getRequestEscapedParameter('clearall')) {
            $aParams['clearall'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearAll', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearfrontend')) {
            $aParams['clearfrontend'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearFrontend', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('cleardbcache')) {
            $aParams['cleardbcache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearDB', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearlangcache')) {
            $aParams['clearlangcache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearLang', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearmenucache')) {
            $aParams['clearmenucache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearMenu', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearclasspathcache')) {
            $aParams['clearclasspathcache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearClassPath', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearstructurecache')) {
            $aParams['clearstructurecache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearStructure', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('cleartagcloudcache')) {
            $aParams['cleartagcloudcache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearTagcloud', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearuser1cache')) {
            $aParams['clearuser1cache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearUser1', true);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearuser2cache')) {
            $aParams['clearuser2cache'] = 1;
            Registry::getConfig()->getActiveView()->addTplParam('clearUser2', true);
        }

        $blUseRemoteToken  = true;
        $sUrl              = Registry::get(d3utils::class)->getAdminClassUrl($aParams, $blUseRemoteToken);
        $this->_sTickerUrl = $sUrl;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clrtmpticker()
    {
        $iLimitTimeStamp =
            Registry::get(Request::class)->getRequestEscapedParameter('iLimitTimeStamp') ?: time();

        $oClrTmp = $this->_getClrTmp();
        $oClrTmp->setLimit(200, $iLimitTimeStamp);

        $this->_blIsTicker = true;

        if (Registry::get(Request::class)->getRequestEscapedParameter('clearall')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearAll', true);
            $blReturn = $oClrTmp->clearAllCache();
        } else {
            $blReturn = $this->_clearCacheParts($oClrTmp);
        }

        if ($blReturn) {
            $this->_generateTickerUrl();
        }
        $this->_sendTickerOutput($this->_sTickerUrl);

        return;
    }

    /**
     * @return bool
     */
    public function isTicker()
    {
        return $this->_blIsTicker;
    }

    /**
     * @return null
     */
    public function getTickerUrl()
    {
        return $this->_sTickerUrl;
    }

    /**
     * @param $sRefreshURL
     */
    protected function _sendTickerOutput($sRefreshURL)
    {
        // ToDo: move to template
        echo "<html>";
        echo "<head>";
        echo "<title>Clear Tmp Processing</title>";

        if ($sRefreshURL) {
            echo "<meta http-equiv=\"refresh\" content=\"0; URL=$sRefreshURL\">";
        }

        echo "</head><body style='font: 12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;'>";
        echo "<br><br>Processing: " . $this->getTmpCount() . " &uuml;brige Dateien / files remained<br>";

        if ($sRefreshURL) {
            echo "<br><span style='font-weight: bold;'>Please wait...</span>";
        } else {
            echo "<br><span style='font-weight: bold;'>Finished.</span>";
        }

        echo "</body></html>";
    }

    /**
     * @return string
     */
    protected function _d3GetModId()
    {
        return $this->_sModId;
    }

    /**
     * @param d3clrtmp $oClrTmp
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _clearCacheParts(d3clrtmp $oClrTmp)
    {
        $blReturn = false;

        if (Registry::get(Request::class)->getRequestEscapedParameter('clearfrontend')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearFrontend', true);
            $blReturn = $oClrTmp->clearFrontendCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('cleardbcache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearDB', true);
            $blReturn = $oClrTmp->clearDataBaseStructCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearlangcache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearLang', true);
            $blReturn = $oClrTmp->clearLangCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearmenucache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearMenu', true);
            $blReturn = $oClrTmp->clearMenuCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearclasspathcache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearClassPath', true);
            $blReturn = $oClrTmp->clearClassPathCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearstructurecache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearStructure', true);
            $blReturn = $oClrTmp->clearStructureCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('cleartagcloudcache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearTagcloud', true);
            $blReturn = $oClrTmp->clearTagcloudCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearseocache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearSeo', true);
            $blReturn = $oClrTmp->clearSeoCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearmodulecache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearModule', true);
            $blReturn = $oClrTmp->clearModuleCache();
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearuser1cache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearUser1', true);
            $blReturn = $oClrTmp->clearUserCache(1);
        }
        if (Registry::get(Request::class)->getRequestEscapedParameter('clearuser2cache')) {
            Registry::getConfig()->getActiveView()->addTplParam('clearUser2', true);
            $blReturn = $oClrTmp->clearUserCache(2);
        }

        return $blReturn;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3ExecCommand1()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);
        $oClrTmp->d3ExecCommand(1);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3ExecCommand2()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);
        $oClrTmp->d3ExecCommand(2);
    }
}
