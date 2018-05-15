<?php

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

namespace D3\ModCfg\Application\Controller\Admin;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Configuration\d3modprofile;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Installcheck\d3installcheck;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\DatabaseException;

class d3_cfg_mod_main extends AdminDetailsController
{
    protected $_sThisTemplate = 'd3_cfg_mod_main.tpl';
    protected $_sModId = 'd3modcfg_lib';
    protected $_sMenuItemTitle = 'd3mxcfg';
    protected $_sMenuSubItemTitle = 'd3mxlibs';
    protected $_aMessages;
    protected $_blUseOwnOxid = false;   // edit ModCfg -> false; edit profile -> true
    public $soxId = null;
    protected $_blUseModCfgStdObject = false;
    /** @var string additional multilang item, which will added as last part to help url */
    protected $_sHelpLinkMLAdd;
    protected $_blHasDebugSwitch = false;
    protected $_blHasTestModeSwitch = false;
    protected $_sDebugHelpTextIdent = 'D3_CFG_MOD_GENERAL_DEBUGACTIVE_DESC';
    protected $_sTestModeHelpTextIdent = 'D3_CFG_MOD_GENERAL_TESTMODEACTIVE_DESC';
    protected $_sSavedId;
    protected $_aNaviItems = array();
    protected $_sD3ObjectClass = d3modprofile::class;
    protected $_sSetModId;
    protected $_blD3ShowLangSwitch = true;

    /**
     * constructor
     */
    public function __construct()
    {
        startProfile(__METHOD__);

        $this->addTplParam('aLanguages', Registry::getLang()->getLanguageArray());
        $this->addTplParam('actlocation', false);
        $this->addTplParam('Errors', false);
        $this->addTplParam('box', 'box');
        $this->addTplParam('readonly', false);
        $this->addTplParam('shop', Registry::getConfig()->getActiveShop());
        $this->addTplParam('art_category', null);
        $this->addTplParam('_act', null);
        $this->addTplParam('readonly', false);
        $this->addTplParam('lstrt', false);
        $this->addTplParam('updatenav', false);
        $this->addTplParam('issubvariant', false);

        parent::__construct();

        /** @var d3modprofile $oListObject */
        $oListObject = oxNew($this->_sD3ObjectClass);
        if (method_exists($oListObject, 'd3IsMultilang')) {
            $this->_blD3ShowLangSwitch = $oListObject->d3IsMultilang();
        }

        stopProfile(__METHOD__);
    }

    /**
     * @return bool|d3_cfg_mod
     */
    /**
     * @return bool|d3_cfg_mod
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3GetSet()
    {
        if (d3_cfg_mod::isCallable()) {
            if ($this->_blUseModCfgStdObject) {
                return d3_cfg_mod::get($this->d3getModId());
            } else {
                return d3_cfg_mod::get($this->d3getModId());
            }
        }

        return false;
    }

    /**
     * @return d3log
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3getLog()
    {
        return $this->d3GetSet()->d3getLog();
    }

    /**
     * @return bool|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getValueStatus()
    {
        if (false == $this->d3GetSet()->getFieldData('oxvalue') ||
            strlen($this->d3GetSet()->getFieldData('oxvalue')) == 0
        ) {
            return 'error';
        }

        return false;
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
        startProfile(__METHOD__);

        $sRet = parent::render();

        $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");

        if (false == $this->d3GetSet()->getFieldData('oxvalue') && d3log::isCallable()) {
            $this->d3getLog()->Log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "Admin-Error",
                "no oValue-Var: " . $this->d3GetSet()->getFieldData('oxmodid')
            );
        }

        $this->addTplParam('blShowLangSwitch', $this->_blD3ShowLangSwitch);
        if (false == $this->_blUseOwnOxid) {
            $this->addTplParam('oxid', $this->d3GetSet()->getId());
            $this->addTplParam('edit', $this->d3GetSet());
            // ToDo: required??
            $this->addTplParam('value', $this->d3GetSet()->getAllValues());
        } else {
            $oProfile = $this->getProfile();
            $this->addTplParam('edit', $oProfile);
            $this->addTplParam('oSet', $oProfile->d3getModCfg());

            // check if we right now saved a new entry
            if ($this->_sSavedId) {
                $soxId = $this->_sSavedId;
                $this->addTplParam("oxid", $soxId);

                // for reloading upper frame
                $this->addTplParam("updatelist", "1");
            }

            if (isset($soxId) && $soxId && $soxId != "-1") {
                $oOtherLang = $oProfile->getAvailableInLangs();
                $aLang = array_diff(Registry::getLang()->getLanguageNames(), $oOtherLang);
                if (count($aLang)) {
                    $this->addTplParam("posslang", $aLang);
                }

                foreach ($oOtherLang as $id => $language) {
                    $oLang= new \stdClass();
                    $oLang->sLangDesc = $language;
                    $oLang->selected = ($id == $this->_iEditLang);
                    $this->_aViewData["otherlang"][$id] =  clone $oLang;
                }
            }

            if ($oProfile->isWriteProtected()) {
                $this->addTplParam('readonly', true);
            }
        }

        $this->fakeBottomMenu();

        stopProfile(__METHOD__);

        return $sRet;
    }

    /**
     * @return d3modprofile|null
     */
    public function getProfile()
    {
        $oProfile = null;

        if ($this->_blUseOwnOxid) {
            /** @var d3modprofile $oProfile */
            $oProfile = oxNew($this->_sD3ObjectClass);

            $soxId = $this->getEditObjectId();

            if (isset($soxId) && $soxId && $soxId != "-1") {
                // load object
                $oProfile->loadInLang($this->_iEditLang, $soxId);

                // load object in other languages
                $oOtherLang = $oProfile->getAvailableInLangs();
                if (false == isset($oOtherLang[$this->_iEditLang])) {
                    $oProfile->loadInLang(key($oOtherLang), $soxId);
                }
            }
        }

        return $oProfile;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function save()
    {
        startProfile(__METHOD__);

        if (false == $this->_blUseOwnOxid) {
            $this->d3GetSet()->setLanguage($this->_iEditLang);
            $this->d3GetSet()->prepareSaveData();
            $this->d3GetSet()->save();
            /** @var d3installcheck $oInstallCheck */
            $oInstallCheck = oxNew(d3installcheck::class, $this->d3GetSet());

            if ($this->d3GetSet()->getFieldData('oxactive') &&
                $this->isAdmin() &&
                $oInstallCheck->hasErrors()
            ) {
                $this->_aMessages[] = Registry::getLang()->translateString('D3_CFG_MOD_INSTALLCHECK_PROBLEM');
            }
        } else {
            $soxId      = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
            $aParams    = Registry::get(Request::class)->getRequestEscapedParameter("editval");

            // default values
            $aParams = $this->addDefaultValues($aParams);

            /** @var d3modprofile $oProfile */
            $oProfile = oxNew($this->_sD3ObjectClass);

            $oProfile->setLanguage($this->_iEditLang);
            if ($soxId != "-1") {
                $oProfile->loadInLang($this->_iEditLang, $soxId);
            } else {
                $aParams[$oProfile->d3GetFieldLongName('oxid')]        = null;
            }

            $oProfile->setLanguage(0);

            $oProfile->assign($aParams);
            $oProfile->setLanguage($this->_iEditLang);

            $oProfile->prepareSaveData();

            $oProfile->save();

            // set oxid if inserted
            if ($soxId == "-1") {
                $this->_sSavedId = $oProfile->getId();
            }

            $this->setEditObjectId($oProfile->getId());
        }

        stopProfile(__METHOD__);

        return;
    }

    /**
     * Saves article parameters in different language.
     * @throws DatabaseConnectionException
     * @throws DatabaseException
     */
    public function saveinnlang()
    {
        if (false == $this->_blUseOwnOxid) {
            return;
        }

        $soxId   = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
        $aParams = Registry::get(Request::class)->getRequestEscapedParameter("editval");
        $oProfile = $this->_getLoadedProfile($soxId, $aParams);

        $oProfile->setLanguage(0);
        $oProfile->assign($aParams);

        // apply new language
        $sNewLanguage = Registry::get(Request::class)->getRequestEscapedParameter("new_lang");
        $oProfile->setLanguage($sNewLanguage);
        $oProfile->save();

        // set for reload
        Registry::getSession()->setVariable("new_lang", $sNewLanguage);

        // set oxid if inserted
        if ($soxId == "-1") {
            $this->_sSavedId = $oProfile->getId();
        }

        $this->setEditObjectId($oProfile->getId());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseException
     */
    public function d3savecopy()
    {
        if (false == $this->_blUseOwnOxid) {
            return;
        }

        $soxId   = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
        $aParams = Registry::get(Request::class)->getRequestEscapedParameter("editval");
        $oProfile = $this->_getLoadedProfile($soxId, $aParams);
        $oProfile->saveCopy();

        // set oxid if inserted
        $this->_sSavedId = $oProfile->getId();

        $this->addTplParam("updatelist", "1");
    }

    /**
     * @param $soxId
     * @param $aParams
     *
     * @return d3modprofile
     */
    protected function _getLoadedProfile($soxId, $aParams)
    {
        // default values
        $aParams = $this->addDefaultValues($aParams);

        /** @var d3modprofile $oProfile */
        $oProfile = oxNew($this->_sD3ObjectClass);
        $oProfile->setLanguage($this->_iEditLang);

        if ($soxId != "-1") {
            $oProfile->load($soxId);
        } else {
            $aParams[$oProfile->d3GetFieldLongName('oxid')] = null;
        }

        return $oProfile;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3exportProfile()
    {
        /** @var d3modprofile $oProfile */
        $oProfile = oxNew($this->_sD3ObjectClass);
        $oProfile->setEnableMultilang(false);
        $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
        $oProfile->load($soxId);
        $oProfile->exportItem('sql');
    }

    /**
     * @param $sStatus
     * @param $oSet
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogStatus($sStatus, $oSet = false)
    {
        return $this->d3GetSet()->getLogStatus($sStatus, $oSet);
    }

    /**
     * @return string
     */
    public function getUserMessages()
    {
        return $this->_aMessages;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkD3Log()
    {
        if ($this->d3getLog()) {
            return true;
        }

        return false;
    }

    /**
     * @return d3_cfg_mod
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogSet()
    {
        return $this->d3getLog()->getLogSet();
    }

    /**
     * @return string
     */
    public function d3GetMenuItemTitle()
    {
        return $this->_sMenuItemTitle;
    }

    /**
     * @return string
     */
    public function d3GetMenuSubItemTitle()
    {
        return $this->_sMenuSubItemTitle;
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getHelpURL()
    {
        $sUrl = $this->d3GetSet()->getHelpURL();
        /** @var $oFS d3filesystem */
        $oFS = oxNew(d3filesystem::class);

        if ($this->_sHelpLinkMLAdd) {
            $sUrl .= $oFS->unprefixedslashit(Registry::getLang()->TranslateString($this->_sHelpLinkMLAdd));
        }

        $aFileName = $oFS->splitFilename($sUrl);

        // has no extension
        if (false == $aFileName['ext']) {
            $sUrl = $oFS->trailingslashit($sUrl);
        }

        return $sUrl;
    }

    /**
     * @return bool
     */
    public function getHasDebugSwitch()
    {
        return $this->_blHasDebugSwitch;
    }

    /**
     * @return string
     */
    public function getDebugHelpTextIdent()
    {
        return $this->_sDebugHelpTextIdent;
    }

    /**
     * @return bool
     */
    public function getHasTestSwitch()
    {
        return $this->_blHasTestModeSwitch;
    }

    /**
     * @return string
     */
    public function getTestModeHelpTextIdent()
    {
        return $this->_sTestModeHelpTextIdent;
    }

    /**
     * @param $sLogType
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogTypeTranslation($sLogType)
    {
        return $this->d3getLog()->getLogTypeTranslation($sLogType);
    }

    /**
     * @return string
     */
    public function d3getModId()
    {
        return $this->_sModId;
    }

    /**
     * exampleItem:     array('new' => array(
     *                      'sScript' => 'top.oxid.admin.editThis( -1 );return false;',
     *                      'sTranslationId' => 'foo',
     *                  )
     * @return array
     */
    public function getNaviItems()
    {
        return $this->_aNaviItems;
    }

    /**
     * @return array
     */
    public function d3getAdditionalFormParams()
    {
        return array();
    }

    public function fakeBottomMenu()
    {
        $myAdminNavig = new \stdClass;
        $myAdminNavig->ordermanager_new = 1;
        $this->addTplParam('bottom_buttons', $myAdminNavig);
    }

    /**
     * @return mixed
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getFolderList()
    {
        /** @var d3modprofile $oProfile */
        $oProfile = oxNew($this->_sD3ObjectClass);
        return $oProfile->d3getFolderList();
    }

    /**
     * Sets default values for empty article (currently does nothing), returns
     * array with parameters.
     *
     * @param array $aParams Parameters, to set default values
     *
     * @return array
     */
    public function addDefaultValues($aParams)
    {
        return $aParams;
    }
}
