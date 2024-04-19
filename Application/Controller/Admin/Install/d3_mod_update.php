<?php

// rollBack in case of aborted install

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
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Install;

use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\d3filesystem;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;

class d3_mod_update extends AdminController
{
    public $sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/install/update';
    protected $_sMenuSubItemTitle = 'D3_INSTALL';
    protected $_sStep = false;
    public $sRedirectStep = false;
    protected $_sAction = false;
    public $sFnc = false;
    public $aCheckList = [];
    protected $_blUpdateBreak = false;
    protected $_aMessages;
    protected $_blError;
    protected $_sErrorMsg;
    protected $_aUserSelections = [];

    public function init()
    {
        parent::init();

        $this->addTplParam('formercl', Registry::get(Request::class)->getRequestEscapedParameter('formercl'));
        $this->addTplParam('default_edit', false);
        $this->addTplParam('bottom_buttons', false);
        $this->addTplParam('actlocation', false);
        $this->addTplParam('issubvariant', false);
        $this->addTplParam('box', false);
        $this->addTplParam('Errors', false);
        $this->addTplParam('blHideLinkBar', true);
    }

    /**
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();

        $this->addTplParam('sCheckMethod', Registry::getConfig()->getActiveView()->getViewDataElement('sCheckMethod'));
        $this->addTplParam('sUpdateMethod', Registry::getConfig()->getActiveView()->getViewDataElement('sUpdateMethod'));
        $this->addTplParam('sUpdateClass', Registry::getConfig()->getActiveView()->getViewDataElement('sUpdateClass'));

        if ($this->sFnc && method_exists($this, $this->sFnc)) {
            $sRet = $this->{$this->sFnc}();
        } elseif ($this->sFnc) {
            $this->addTplParam('blNonExistingFunction', $this->sFnc);
            return $this->sThisTemplate;
        }

        if ($sRet) {
            return $sRet;
        } else {
            return $this->sThisTemplate;
        }
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function requireUpdate()
    {
        return d3install::getInstance()->checkForRequiredUpdates();
    }

    /**
     * @return bool
     */
    public function hasDemoShopMode()
    {
        return Registry::get(d3utils::class)->hasDemoshopMode();
    }

    public function skipupdate()
    {
        $this->setAction('skip');
        /** @var d3install_updatebase $oUpdateBase */
        $oUpdateBase = oxNew(d3install_updatebase::class);
        $oUpdateBase->setUpdateSkipFlag();
    }

    public function sessionskip()
    {
        $sCheckMethod  = Registry::get(Request::class)->getRequestEscapedParameter('sCheckMethod');
        $sUpdateMethod = Registry::get(Request::class)->getRequestEscapedParameter('sUpdateMethod');
        $sUpdateClass  = Registry::get(Request::class)->getRequestEscapedParameter('sUpdateClass');
        Registry::get(Request::class)->getRequestEscapedParameter('exectype');

        /** @var d3install_updatebase $oUpdateBase */
        $oUpdateBase = oxNew($sUpdateClass);
        $sCheckHash  = $oUpdateBase->getHash($sUpdateClass, $sCheckMethod);
        $sUpdateHash = $oUpdateBase->getHash($sUpdateClass, $sUpdateMethod);

        $aSkipHashs                         = $oUpdateBase->getSessionSkipHashs();
        $aSkipHashs['check'][$sCheckHash]   = $sCheckHash;
        $aSkipHashs['update'][$sUpdateHash] = $sUpdateHash;
        Registry::getSession()->setVariable('aD3UpdateSkipHashs', $aSkipHashs);
    }

    public function everskip()
    {
        if (! $this->hasDemoShopMode()) {
            $sCheckMethod  = Registry::get(Request::class)->getRequestEscapedParameter('sCheckMethod');
            $sUpdateMethod = Registry::get(Request::class)->getRequestEscapedParameter('sUpdateMethod');
            $sUpdateClass  = Registry::get(Request::class)->getRequestEscapedParameter('sUpdateClass');
            Registry::get(Request::class)->getRequestEscapedParameter('exectype');

            /** @var d3install_updatebase $oUpdateBase */
            $oUpdateBase = oxNew($sUpdateClass);
            $sCheckHash  = $oUpdateBase->getHash($sUpdateClass . '-' . $sCheckMethod);
            $sUpdateHash = $oUpdateBase->getHash($sUpdateClass . '-' . $sUpdateMethod);

            $aSkipHashs = $oUpdateBase->getConfigSkipHashs();

            $aSkipHashs['check'][$sCheckHash]   = $sCheckHash;
            $aSkipHashs['update'][$sUpdateHash] = $sUpdateHash;

            $oUpdateBase->setConfigSkipHashs($aSkipHashs);
        } else {
            $this->sessionskip();
        }
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws DBALException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function checklist()
    {
        $this->setAction('checklist');
        $blStepByStep     = false;
        $blUseBreak       = false;
        $this->aCheckList = d3install::getInstance()->performUpdateChecklist($blStepByStep, $blUseBreak);

        if (Registry::get(Request::class)->getRequestEscapedParameter('checkasfile')) {
            /** @var d3filesystem $oFS */
            $oFS = oxNew(d3filesystem::class);
            $oFS->startDirectDownload('install.txt', $this->_getCheckList4File());
        }

        if (is_string($this->aCheckList[count($this->aCheckList) - 1]['type']) &&
            strtolower($this->aCheckList[count($this->aCheckList) - 1]['type']) == 'break'
        ) {
            $this->_blUpdateBreak = true;
        }
    }

    /**
     * @return string
     */
    protected function _getCheckList4File()
    {
        $sText = '';
        foreach ($this->getCheckList() as $aCheckItem) {
            $sText .= $this->getCheckItemDesc($aCheckItem['type']) . "\r\n";
            if ($aCheckItem['log']) {
                $sText .= $aCheckItem['log'] . "\r\n";
            }
            $sText .= "\r\n";
        }

        return $sText;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ParameterNotFoundException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function autoinstall()
    {
        if (! $this->hasDemoShopMode()) {
            /** @var d3install_updatebase $oUpdateBase */
            $oUpdateBase = oxNew(d3install_updatebase::class);
            $oUpdateBase->resetUpdateSkipFlag();
            // reset
            $this->setAction('autoinstall');
            $this->_blUpdateBreak = d3install::getInstance()->performUpdateProcess(false, true);
            $this->_blError       = d3install::getInstance()->getUpdateProcessErrorStatus();
            $this->_sErrorMsg     = d3install::getInstance()->getUpdateProcessErrorMessage();
            $blStepByStep         = true;
            $aActionList          = d3install::getInstance()->performUpdateChecklist($blStepByStep);
            $this->_aUserSelections   = d3install::getInstance()->getUserSelections();
            $this->aCheckList     = $aActionList;
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ParameterNotFoundException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function manualyinstall()
    {
        if (! $this->hasDemoShopMode()) {
            /** @var d3install_updatebase $oUpdateBase */
            $oUpdateBase = oxNew(d3install_updatebase::class);
            $oUpdateBase->resetUpdateSkipFlag();

            $blExecute            = Registry::get(Request::class)->getRequestEscapedParameter('setExecute') == 1 ? true : false;
            $blStepByStep         = true;
            $this->setAction('manualyinstall');
            $this->_blUpdateBreak = d3install::getInstance()->performUpdateProcess($blStepByStep, $blExecute);
            $this->_blError       = d3install::getInstance()->getUpdateProcessErrorStatus();
            $this->_sErrorMsg     = d3install::getInstance()->getUpdateProcessErrorMessage();
            $aActionList          = d3install::getInstance()->performUpdateChecklist($blStepByStep);
            $this->_aUserSelections   = d3install::getInstance()->getUserSelections();
            $this->aCheckList     = $aActionList;

            if (false == count($this->aCheckList)) {
                $this->_sAction = 'skip';
            }
        }
    }

    public function getUserSelections()
    {
        return $this->_aUserSelections;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->_sAction;
    }

    /**
     * @param string $sAction
     */
    public function setAction(string $sAction)
    {
        $this->_sAction = $sAction;
    }

    /**
     * @return mixed
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getError()
    {
        if ($this->_blError) {
            $blStepByStep = true;
            $blUseBreak = true;
            $this->aCheckList = d3install::getInstance()->performUpdateChecklist($blStepByStep, $blUseBreak);
        }

        return $this->_blError;
    }

    /**
     * @return string
     */
    public function getErrorMessageText()
    {
        if ($this->_sErrorMsg) {
            return sprintf(
                Registry::getLang()->translateString('D3_CFG_MOD_UPDATE_JOB_ERRORMSG_DESC'),
                $this->_sErrorMsg
            );
        } else {
            return Registry::getLang()->translateString('D3_CFG_MOD_UPDATE_JOB_ERROR_DESC');
        }
    }

    /**
     * @return mixed|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function getRefreshUrl()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        if (d3install::getInstance()->getUpdateInstaller()->getModuleInstallations()) {
            $aParams = [
                'cl'         => $this->getClassKey(),
                'formercl'   => $this->getFormerClassName(),
                'formeritem' => $this->getFormerItem(),
                'fnc'        => $this->getAction(),
            ];
            $sURL    = Registry::get(d3utils::class)->getAdminClassUrl($aParams);

            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }

            return $sURL;
        } else {
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }

            return $this->getFormerClassUrl();
        }
    }

    /**
     * @return mixed
     */
    public function getFormerClassName()
    {
        return Registry::get(Request::class)->getRequestEscapedParameter('formercl');
    }

    /**
     * @return mixed
     */
    public function getFormerItem()
    {
        return Registry::get(Request::class)->getRequestEscapedParameter('formeritem');
    }

    /**
     * @return mixed|string
     */
    public function getFormerClassUrl()
    {
        $sSeparator = ini_get('arg_separator.output');
        $sHTMLSeparator = htmlspecialchars($sSeparator);

        //&amp;force_admin_sid='.oxRegistry::getSession()->getId().'&amp;
        $sUrl = str_replace($sHTMLSeparator, $sSeparator, $this->getViewConfig()->getSelfLink() . 'cl=' . $this->getFormerClassName());

        if ($this->getFormerItem()) {
            $sUrl .= $sSeparator.'item=' . $this->getFormerItem();
        }

        return $sUrl;
    }

    /**
     * @return string
     */
    public function getBackLinkText()
    {
        if ($this->getFormerClassName()) {
            return sprintf(
                Registry::getLang()->translateString('D3_CFG_MOD_UPDATE_NOUPDATEBACKLINK'),
                $this->getFormerClassUrl()
            );
        }

        return '';
    }

    /**
     * @return bool
     */
    public function getUpdateBreak()
    {
        return $this->_blUpdateBreak;
    }

    /**
     * @return array
     */
    public function getCheckList()
    {
        return $this->aCheckList;
    }

    /**
     * @param mixed $mType
     * @return mixed
     */
    public function getCheckItemDesc($mType)
    {
        if (is_array($mType)) {
            $aKeys = array_keys($mType);
            $mType[$aKeys[0]] = Registry::getLang()->translateString(
                'D3_CFG_MOD_UPDATE_JOB_' . strtoupper($mType[$aKeys[0]])
            );
            return call_user_func_array('sprintf', $mType);
        } elseif (is_string($mType)) {
            return Registry::getLang()->translateString('D3_CFG_MOD_UPDATE_JOB_' . strtoupper($mType));
        }

        return $mType;
    }

    /**
     * @return bool
     */
    public function getHideSkip()
    {
        if (Registry::get(Request::class)->getRequestEscapedParameter('blHideSkip') || false == $this->getFormerClassName()) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function getUserMessages()
    {
        return $this->_aMessages;
    }

    /**
     * @return int
     */
    public function hasSkipHashes()
    {
        /** @var d3install_updatebase $oUpdateBase */
        $oUpdateBase = oxNew(d3install_updatebase::class);
        return $oUpdateBase->hasSkipHashs();
    }

    public function delskiphashs()
    {
        /** @var d3install_updatebase $oUpdateBase */
        $oUpdateBase = oxNew(d3install_updatebase::class);
        $oUpdateBase->delSkipHashs();
    }

    public function getHelpUrl()
    {
    }

    /**
     * @return string
     */
    public function getStepCountMessage()
    {
        $iCount = Registry::getSession()->getVariable('iD3UpdatebaseCount');

        if (false == $iCount || $iCount == '' || $iCount == 0) {
            $iCount = 1;
        }

        $sText = sprintf(Registry::getLang()->translateString('D3_INSTALL_SETUPCOUNT'), $iCount);

        if ($sDescText = Registry::getConfig()->getConfigParam('sD3UpdatebaseStepDesc')) {
            $sText .= sprintf(Registry::getLang()->translateString('D3_INSTALL_SETUPCOUNT_DESC'), $sDescText);
            Registry::getConfig()->setConfigParam('sD3UpdatebaseStepDesc', null);
        }

        return $sText;
    }

    /**
     * Get flag if current view is an order view
     *
     * @return bool
     */
    public function getIsOrderStep()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return '';
    }

    public function getModCfgUpdateRequiredMessage()
    {
        return d3install::getInstance()->getModCfgUpdateRequiredMessage();
    }
}
