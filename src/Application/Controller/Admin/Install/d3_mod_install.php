<?php

// finalize show install info
// rollBack in case of aborted install

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Install;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\DatabaseException;

class d3_mod_install extends d3_cfg_mod_main
{
    protected $_sModId = 'd3modcfg_lib';
    public $sModId;
    public $sThisTemplate = 'd3_mod_install.tpl';
    protected $_sMenuSubItemTitle = 'D3_INSTALL';
    protected $_sStep = false;
    public $sRedirectStep = false;
    /** @var d3install */
    public $oInstall;
    public $sFnc;
    public $oModInfo;
    public $oModData;
    public $aQuestions;
    public $blAvoidAutoRedirect = false;

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws Exception
     */
    public function init()
    {
        parent::init();

        $this->oInstall = d3install::getInstance();

        if (Registry::getSession()->getVariable('d3InstallType') == 'expert' &&
            false == Registry::get(Request::class)->getRequestEscapedParameter('expconf') &&
            false == in_array(
                Registry::get(Request::class)->getRequestEscapedParameter('nextStep'),
                array('init', 'getArchive', 'extractArchive', 'showDescription', 'checkDescFile')
            ) &&
            false == Registry::get(Request::class)->getRequestEscapedParameter('addStep')
        ) {
            $this->blAvoidAutoRedirect = true;
        }

        $this->sFnc   = preg_replace('@_[0-9]$@', '', Registry::get(Request::class)->getRequestEscapedParameter('nextStep'));
        $this->sModId = Registry::get(Request::class)->getRequestEscapedParameter('modid');
        d3install::getInstance()->setModId($this->sModId);
        $oUpdateServer = d3install::getInstance()->getFromUpdateServer();

        if (d3_cfg_mod::isAvailable($this->sModId) && d3_cfg_mod::get($this->sModId)->getLicenseData('modversion')) {
            $oUpdateServer->setParameter(
                'sLicModVersion',
                d3_cfg_mod::get($this->sModId)->getLicenseData('modversion')
            );
        }

        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        $oUpdateServer->setParameter('sModId', $this->sModId);
        $oUpdateServer->setParameter(
            'sEdition',
            $oShopVersionConverter->fixEditionToDefaultEdition($this->getShopEdition())
        );
        $oUpdateServer->setParameter(
            'sShopVersion',
            $oShopVersionConverter->fixVersionToDefaultEdition($this->getShopVersion())
        );
        $this->oModInfo = $oUpdateServer->getRemoteModuleVersion();
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
        parent::render();

        if (false == $this->hasDemoshopMode() && $this->sFnc && method_exists($this, $this->sFnc)) {
            $this->{$this->sFnc}();
        } elseif (false == $this->hasDemoshopMode() && $this->sFnc) {
            $this->addTplParam('blNonExistingFunction', $this->sFnc);
            return $this->sThisTemplate;
        } else {
            $this->blAvoidAutoRedirect = true;
            $this->initSetup();
            $this->setRedirectStep($this->oInstall->getNextStep('ID'));
        }

        return $this->sThisTemplate;
    }

    /**
     * @return bool
     */
    public function hasDemoShopMode()
    {
        return Registry::get(d3utils::class)->hasDemoshopMode();
    }

    /**
     * @return d3_cfg_mod|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _d3GetSet()
    {
        if (d3_cfg_mod::isCallable()) {
            return d3_cfg_mod::get($this->_sModId);
        } else {
            return false;
        }
    }

    /**
     * @return false|d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _d3GetLog()
    {
        if ($this->_d3GetSet()) {
            return $this->_d3GetSet()->d3getLog();
        } else {
            return false;
        }
    }

    public function initSetup()
    {
        $this->_sStep = "init";
        $this->oInstall->init();

        return;
    }

    /**
     * @return string
     */
    public function getActStep()
    {
        return $this->oInstall->getActStep('ID');
    }

    /**
     * @return string
     */
    public function getNextStep()
    {
        return $this->oInstall->getNextStep('ID');
    }

    /**
     * @return string
     */
    public function getFurtherStep()
    {
        return $this->oInstall->getNextStep('ID');
    }

    /**
     * @return string
     */
    public function d3GetModId()
    {
        return $this->sModId;
    }

    /**
     * @return mixed
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws DatabaseException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getModName()
    {
        if (false == $this->oModData) {
            /** @var d3shopversionconverter $oShopVersionConverter */
            $oShopVersionConverter = oxNew(d3shopversionconverter::class);
            $oUpdateServer = $this->oInstall->getFromUpdateServer();
            $oUpdateServer->setParameter('sModId', $this->oModInfo['availableversion']['modid']);
            $oUpdateServer->setParameter(
                'sEdition',
                $oShopVersionConverter->fixEditionToDefaultEdition($this->getShopEdition())
            );
            $this->oModData = $oUpdateServer->getModuleInfo();
        }

        return $this->oModData['modtitle'];
    }

    protected function _registerInstallType()
    {
        Registry::getSession()->setVariable(
            'd3InstallType',
            strtolower(Registry::get(Request::class)->getRequestEscapedParameter('installtype'))
        );
    }

    /**
     * @return string
     */
    public function d3getActTitleMLIdent()
    {
        return "D3_INSTALL_SETUPSTEPS_" . strtoupper($this->getActStep());
    }

    /**
     * @return string
     */
    public function d3getActDescMLIdent()
    {
        return $this->d3getActTitleMLIdent() . "_DESC";
    }

    /**
     * @param $sRedirectStep
     */
    public function setRedirectStep($sRedirectStep)
    {
        $this->sRedirectStep = $sRedirectStep;
    }

    /**
     * @return bool
     */
    public function getRedirectStep()
    {
        if ($this->sRedirectStep) {
            return $this->sRedirectStep;
        }

        return false;
    }

    /**
     * @param null $aDetails
     */
    protected function _d3SetConfirmParameters($aDetails = null)
    {
        $this->addTplParam('blExpertMode', true);

        if ($aDetails) {
            $this->addTplParam('aStepDetails', $aDetails);
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getArchive()
    {
        $this->_registerInstallType();

        if ($this->oInstall->getArchive($this->oModInfo)) {
            $this->setRedirectStep($this->oInstall->getNextStep('ID'));
        } else {
            $this->setRedirectStep('error');
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function extractArchive()
    {
        if ($this->oInstall->zip_extract($this->oModInfo)) {
            $this->setRedirectStep($this->oInstall->getNextStep('ID'));
        } else {
            $this->setRedirectStep('error');
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function showDescription()
    {
        $this->addTplParam('sDescriptionContent', $this->oInstall->getDescriptionContent());

        if (Registry::get(Request::class)->getRequestEscapedParameter('confirmDesc')) {
            $this->setRedirectStep($this->oInstall->getNextStep('ID'));
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function copyFiles()
    {
        if ($this->_d3GetLog()) {
            $this->_d3GetLog()->Log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                'copyFiles',
                Registry::getSession()->getVariable('d3InstallType') . " - " .
                Registry::get(Request::class)->getRequestEscapedParameter('expconf'),
                false
            );
        }

        if (Registry::getSession()->getVariable('d3InstallType') == 'expert' &&
            false == Registry::get(Request::class)->getRequestEscapedParameter('expconf')
        ) {
            $this->_d3SetConfirmParameters($this->oInstall->copyFiles_getDetails($this->oModInfo));
            return;
        }

        if ($this->oInstall->copyFiles($this->oModInfo)) {
            $this->setRedirectStep($this->oInstall->getNextStep('ID'));
        } else {
            $this->setRedirectStep('error');
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function rollback_copyFiles()
    {
        if ($this->oInstall->rollback_copyFiles()) {
            $this->setRedirectStep('rollback_end');
            $this->_sStep = "rollback_copyFiles";
        } else {
            $this->setRedirectStep('error');
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function activateModule()
    {
        if ($this->_d3GetLog()) {
            $this->_d3GetLog()->Log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                'activateModule',
                Registry::getSession()->getVariable('d3InstallType') . " - " .
                Registry::get(Request::class)->getRequestEscapedParameter('expconf'),
                false
            );
        }

        if (Registry::getSession()->getVariable('d3InstallType') == 'expert' &&
            false == Registry::get(Request::class)->getRequestEscapedParameter('expconf')
        ) {
            $this->_d3SetConfirmParameters($this->oInstall->activateModule_getDetails($this->oModInfo));
            return;
        }

        if ($this->oInstall->activateModule($this->oModInfo)) {
            $this->setRedirectStep($this->oInstall->getNextStep('ID'));
        } else {
            $this->setRedirectStep('error');
        }
    }

    /**
     * @return array
     */
    public function getUserQuestions()
    {
        return $this->aQuestions;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function finished()
    {
        $this->oInstall->removeArchive($this->oModInfo);
        $this->addTplParam('sLogURI', $this->oInstall->getLogURI());
        $this->_sStep = "finished";
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function rollback_end()
    {
        $this->addTplParam('sLogURI', $this->oInstall->getLogURI());
        $this->_sStep = "rollback_end";
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function cleanup()
    {
        if ($this->oInstall->cleanUp()) {
            $this->addTplParam('blClrTmpSuccess', true);
        }

        $this->addTplParam('blClrTmp', true);
        $this->addTplParam('sLogURI', $this->oInstall->getLogURI());
        $this->_sStep = "finished";
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function error()
    {
        $this->oInstall->removeArchive($this->oModInfo);
        $this->addTplParam('sLogURI', $this->oInstall->getLogURI());
        $this->_sStep = "error";
    }

    /**
     * @return mixed
     */
    public function getInstallProtokoll()
    {
        return $this->oInstall->getProtokoll();
    }

    /**
     * @return bool
     */
    public function getProtokollStatus()
    {
        $blStatus = true;
        foreach ($this->getInstallProtokoll() as $oProtokollItem) {
            if ($oProtokollItem->Status < 1) {
                $blStatus = false;
            }
        }

        return $blStatus;
    }

    public function rollback()
    {
        $this->setRedirectStep('rollback_' . $this->oInstall->getPrevStep('ID'));
        $this->_sStep = "initRollBack";
    }

    /**
     * @param $sRet
     * @return bool|mixed|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function buildRetUrl($sRet)
    {
        if ($this->blAvoidAutoRedirect) {
            return false;
        }

        /** @var $oFS d3filesystem */
        $oFS  = oxNew(d3filesystem::class);
        $sUrl = false;
        $sURI = false;

        $sSeparator = ini_get('arg_separator.output');
        $sHTMLSeparator = htmlspecialchars($sSeparator);

        $sRequestUri = $oFS->getCurrentUrl();

        $aSearch  = array('('.$sSeparator.'nextStep=([^'.$sSeparator.']*))', '('.$sSeparator.'addStep=([0-9]{1}))', '('.$sSeparator.'expconf=([0-9]{1}))');
        $sReplace = '';
        if ($sRet) {
            if ($sRequestUri) {
                foreach ($aSearch as $sSearch) {
                    $sURI = $sRequestUri = preg_replace('@' . $sSearch . '@', $sReplace, $sRequestUri);
                }

                strstr($sURI, '?') ? $sDelimiter = $sSeparator : $sDelimiter = '?';
                $sUrl = $sURI . $sDelimiter . 'nextStep=' . $sRet;
            } else {
                $sURI = $_SERVER['REQUEST_URI'];
                foreach ($aSearch as $sSearch) {
                    $sURI = preg_replace('@' . $sSearch . '@', $sReplace, $sURI);
                }
                strstr($sURI, '?') ? $sDelimiter = $sSeparator : $sDelimiter = '?';
                $sProtokoll = $oFS->getSSLProtokollStatus();
                $sUrl       = $sProtokoll . "://" . $_SERVER['HTTP_HOST'] . $sURI . $sDelimiter . 'nextStep=' . $sRet;
            }
        }

        $this->_d3GetLog()->Log(d3log::INFO, __CLASS__, __FUNCTION__, __LINE__, 'buildReturnUrl', $sUrl, false);

        $sUrl = str_replace($sSeparator, $sHTMLSeparator, str_replace($sHTMLSeparator, $sSeparator, $sUrl));

        return $sUrl;
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
    public function filedownload()
    {
        /** @var $oFS d3filesystem */
        $oFS = oxNew(d3filesystem::class);
        $oFS->startDirectDownload($this->oModInfo->URL);

        return true;
    }

    /**
     * @return string
     */
    public function getProgressStatus()
    {
        $iActStepCount = $this->oInstall->getActStepCount();
        $iMaxStepCount = $this->oInstall->getMaxStepCount() - 1;

        $iPercent = round(100 / $iMaxStepCount * $iActStepCount);
        return $iPercent . "%";
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasAlternateConnect()
    {
        if ($this->_d3GetSet()->getValue('blInstall_forceFtpConnect')) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function getUserMessages()
    {
        return array();
    }
}
