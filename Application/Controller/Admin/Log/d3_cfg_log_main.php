<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Log;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use DateTime;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\Email;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\UtilsView;

class d3_cfg_log_main extends d3_cfg_mod_main
{
    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/log/main';

    protected $_sModId = 'd3modcfg_lib';

    protected $_sMenuSubItemTitle = 'd3mxlog';

    public $sExportPath = "export/";

    /** @var d3log */
    public $oLog;

    protected $_aExportNaviItems = [
        'new' => [
            'sScript' => 'top.basefrm.list.EditThis(-1);return false;',
            'sTranslationId' => 'D3_CFG_EXPORT_SHOWDIALOG',
        ],
    ];


    public function init()
    {
        parent::init();
        $this->oLog = oxNew(d3log::class);

        $this->addTplParam('deftime', (new DateTime('1 week ago'))->format('Y-m-d H:i:s'));
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

        $this->addTplParam('edit', $this->oLog);

        $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");

        if (isset($soxId) && $soxId && $soxId != "-1") {
            // load object
            $this->oLog->load($soxId);
            $this->_aNaviItems = $this->_aExportNaviItems;
        }

        return $sRet;
    }

    /**
     * @param $aParams
     *
     * @return mixed
     */
    public function addDefaultValues($aParams)
    {
        return $aParams;
    }

    /**
     * @param string $sModId
     *
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function getItemCount($sModId = '')
    {
        /** @var d3log $oLog */
        $oLog = oxNew(d3log::class);
        return $oLog->getItemCount($sModId);
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
    public function getLogInfoMessage()
    {
        $sMessage = '';
        $sModId   = Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId');

        if ($sModId) {
            $sMessage .= sprintf(
                Registry::getLang()->translateString('D3_CFG_LOG_ACTITEMS_MODULES'),
                d3_cfg_mod::get($sModId)->getModTitle()
            );
        }

        $sMessage .= Registry::getLang()->translateString('D3_CFG_LOG_ACTITEMS') . $this->getItemCount($sModId);

        if ($this->getItemCount($sModId) > 100) {
            $sMessage .= Registry::getLang()->translateString('D3_CFG_LOG_ACTITEMS2');
        } else {
            $sMessage .= Registry::getLang()->translateString('D3_CFG_LOG_ACTITEMS1');
        }

        return $sMessage;
    }

    /**
     * @return array
     */
    public function d3getAdditionalFormParams()
    {
        $aParams = parent::d3getAdditionalFormParams();

        if (Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId')) {
            $aParams['sD3ModId'] = Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId');
        }

        return $aParams;
    }

    /**
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getModIdList()
    {
        /** @var d3log $oLog */
        $oLog = oxNew(d3log::class);

        $aParams = $this->d3getAdditionalFormParams();
        $sModId = is_array($aParams) && isset($aParams['sD3ModId']) ? $aParams['sD3ModId'] : '';

        return $oLog->getModIdList($sModId);
    }

    /**
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getClassList()
    {
        /** @var d3log $oLog */
        $oLog = oxNew(d3log::class);

        $aParams = $this->d3getAdditionalFormParams();
        $sModId = is_array($aParams) && isset($aParams['sD3ModId']) ? $aParams['sD3ModId'] : '';

        return $oLog->getClassList($sModId);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3logexport_sql()
    {
        $aParams = $this->d3getAdditionalFormParams();
        $sModId = is_array($aParams) && isset($aParams['sD3ModId']) ? $aParams['sD3ModId'] : '';

        /** @var d3database $oD3DataBase */
        $oD3DataBase = d3database::getInstance();
        $sContent    = $oD3DataBase->getExportSqlByQuery(
            $this->oLog->d3BuildExportQuery($sModId),
            $this->oLog->getCoreTableName()
        );

        /** @var d3filesystem $oFS */
        $oFS = oxNew(d3filesystem::class);
        if (Registry::get(Request::class)->getRequestEscapedParameter('export_mail')) {
            $sPath = $oFS->trailingslashit(Registry::getConfig()->getConfigParam('sShopDir')) . $oFS->trailingslashit(
                $this->sExportPath
            ) . 'd3log.sql';
            $oFS->createFile($sPath, $sContent);
            $this->addTplParam('sExportPath', $sPath);

            $aPath = $oFS->splitPath($sPath);
            $this->_sendFileViaMail($aPath);
        } else {
            $oFS->startDirectDownload('d3log.sql', $sContent);
        }
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3logexport_csv()
    {
        /** @var d3database $oD3DataBase */
        $oD3DataBase = d3database::getInstance();
        $sContent    = $oD3DataBase->getExportCsvByQuery($this->oLog->d3BuildExportQuery());

        /** @var d3filesystem $oFS */
        $oFS = oxNew(d3filesystem::class);

        if (Registry::get(Request::class)->getRequestEscapedParameter('export_mail')) {
            $sPath = $oFS->trailingslashit(Registry::getConfig()->getConfigParam('sShopDir')) . $oFS->trailingslashit(
                $this->sExportPath
            ) . 'd3log.csv';
            $oFS->createFile($sPath, $sContent);
            $this->addTplParam('sExportPath', $sPath);

            $aPath = $oFS->splitPath($sPath);
            $this->_sendFileViaMail($aPath);
        } else {
            $oFS->startDirectDownload('d3log.csv', $sContent);
        }

        return false;
    }

    /**
     * @param $aPath
     */
    protected function _sendFileViaMail($aPath)
    {
        $aErrors = Registry::getSession()->getVariable('Errors');
        $sMailAdr = Registry::get(Request::class)->getRequestEscapedParameter('export_mail');
        $this->addTplParam('mail', $sMailAdr);

        if ($sMailAdr && ! count($aErrors['default'])) {
            /** @var Shop $oActShop */
            $oActShop = oxNew(Shop::class);
            $oActShop->load(Registry::getConfig()->getShopId());
            /** @var Email $oEmail */
            $oEmail = oxNew(Email::class);
            $oEmail->setSubject(Registry::getLang()->translateString('D3_LOG_MAIL_SUBJECT'));
            $oEmail->setRecipient($sMailAdr);
            $oEmail->setReplyTo($oActShop->getFieldData('oxinfoemail'), $oActShop->getFieldData('oxname'));
            $oEmail->setFrom($oActShop->getFieldData('oxinfoemail'), $oActShop->getFieldData('oxname'));
            $oEmail->addAttachment($aPath['dir'] . $aPath['file'], $aPath['file']);

            if ($oEmail->send()) {
                $this->addTplParam('blMailSend', true);
            } else {
                Registry::get(UtilsView::class)->addErrorToDisplay(
                    new StandardException(sprintf(
                        Registry::getLang()->translateString('D3_LOG_MAIL_NOTSEND'),
                        implode('', $aPath)
                    ))
                );
            }
        }
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
    public function getAllItemsTranslation()
    {
        $aParams = $this->d3getAdditionalFormParams();
        $sTitle = false;
        if (is_array($aParams) && isset($aParams['sD3ModId'])) {
            /** @var d3_cfg_mod $oCfgMod */
            $oCfgMod = d3_cfg_mod::get($aParams['sD3ModId']);
            $sTitle = $oCfgMod->getModTitle($aParams['sD3ModId']);
        }

        return $sTitle ?
            sprintf(Registry::getLang()->translateString('D3_CFG_EXPORT_EXP_MODULE_DEF'), $sTitle) :
            Registry::getLang()->translateString('D3_CFG_EXPORT_EXP_MODULE_ALL');
    }
}
