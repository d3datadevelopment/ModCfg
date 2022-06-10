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
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Configuration;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Controller\Admin\Install\d3_mod_install;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\d3str;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\Shopcompatibility\d3ShopCompatibilityAdapterHandler;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\ShopVersion;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\DatabaseException;

class d3mod_status extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3modlib_status.tpl';
    /**
     * additional multilang item, which will added as last part to help url
     *
     * @var string
     */
    protected $_sHelpLinkMLAdd = 'D3MODCFG_LIB_HELPLINK_STATUS';
    public $aModuleSets = array();
    /** @var d3install */
    public $oInstall;
    public $aRemoteLibs = array();
    public $selectedModId;
    protected $_blRefreshModList = false;
    protected $_aHiddenModules = array();
    public $sErrorMessage = false;

    /**
     * d3mod_status constructor.
     */
    public function __construct()
    {
        $this->addTplParam('sInstallModId', false);
        $this->addTplParam('blGetRemoteUpdateStatus', false);
        $this->addTplParam('sErrorMLMsg', false);

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
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        $this->aModuleSets = d3_cfg_mod::loadAll($this->getModuleType());

        $this->oInstall = d3install::getInstance();
        $this->oInstall->init();

        $sRet = parent::render();

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

        return $sRet;
    }

    /**
     * @return string
     */
    public function getModuleType()
    {
        return 'lib';
    }

    public function getRemoteModList()
    {
        $this->_blRefreshModList = true;
        $this->addTplParam('blGetRemoteUpdateStatus', true);
    }

    /**
     * @param $sModId
     * @param bool $blForceRefresh
     * @return array|bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws Exception
     */
    public function getRemoteModuleData($sModId, $blForceRefresh = false)
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        $oUpdateServer = d3install::getInstance()->getFromUpdateServer();
        $this->sErrorMessage = false;

        try {
            if (d3_cfg_mod::isAvailable(($sModId)) && d3_cfg_mod::get($sModId)->getLicenseData('modversion')) {
                $oUpdateServer->setParameter('sLicModVersion', d3_cfg_mod::get($sModId)->getLicenseData('modversion'));
            }
            $oUpdateServer->setParameter('sModId', $sModId);
        } catch (d3_cfg_mod_exception $oEx) {
            $this->sErrorMessage = $oEx->getMessage();
        }

        /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
        $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        $sShopEdition = $oShopVersionConverter->fixEditionToDefaultEdition(
            $this->getShopEdition()
        );
        $sShopVersion = $oD3CompatibilityAdapterHandler->getWOBetaShopVersion(
            $oShopVersionConverter->fixVersionToDefaultEdition(ShopVersion::getVersion())
        );

        $oUpdateServer->setParameter('sEdition', $sShopEdition);
        $oUpdateServer->setParameter('sShopVersion', $sShopVersion);
        if ($blForceRefresh || $this->_blRefreshModList) {
            $oUpdateServer->forceUpdate();
            $aModData = $oUpdateServer->getRemoteModuleVersion();
        } else {
            $aModData = array();
        }

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

        return $aModData;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws DatabaseException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getAllRemoteModuleData()
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

        $oUpdateServer = d3install::getInstance()->getFromUpdateServer();
        $oUpdateServer->setParameter('sModType', $this->getModuleType());

        if ($this->_blRefreshModList) {
            $oUpdateServer->forceUpdate();
        }

        $aModData = $oUpdateServer->getAllRemoteModules();

        $aModData = $this->_unsetHiddenModules($aModData);

        if (false == count($aModData)) {
            $aModData = array();
        } else {
            foreach ($aModData as $sIdent => $aModInfo) {
                $aModData[$sIdent]['modtitle'] = iconv("UTF-8", "ISO-8859-15", $aModInfo['modtitle']);
            }
        }

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);

        return $aModData;
    }

    /**
     * @param $aModuleList
     *
     * @return array
     */
    protected function _unsetHiddenModules($aModuleList)
    {
        foreach ($aModuleList as $sKey => $aModuleData) {
            if (in_array($aModuleData['modid'], $this->_aHiddenModules)) {
                unset($aModuleList[$sKey]);
            }
        }
        return $aModuleList;
    }

    /**
     * @param $sModId
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function isInstalled($sModId)
    {
        /** @var $oSet d3_cfg_mod */
        $oSet = oxNew(d3_cfg_mod::class);
        foreach ($oSet->getModuleList() as $aModCfg) {
            if (strtolower($aModCfg['id']) == strtolower($sModId)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $aLib
     * @param $sVarName
     * @return mixed
     */
    public function getRemoteModVar($aLib, $sVarName)
    {
        if (isset($aLib[$sVarName . '_' . $this->getLangId()]) && $aLib[$sVarName . '_' . $this->getLangId()]) {
            return $aLib[$sVarName . '_' . $this->getLangId()];
        } elseif (isset($aLib[$sVarName . '_de']) && $aLib[$sVarName . '_de']) {
            return $aLib[$sVarName . '_de'];
        }

        return $aLib[$sVarName];
    }

    /**
     * @return string
     */
    public function getLangId()
    {
        $sLangId = strtolower(Registry::getLang()->getLanguageAbbr());

        if ($sLangId != 'de' && $sLangId != 'en') {
            $sLangId = 'en';
        }

        return $sLangId;
    }

    /**
     * @param $sVersion1
     * @param $sVersion2
     * @param $sCompareOperator
     * @return mixed
     */
    public function version_compare($sVersion1, $sVersion2, $sCompareOperator)
    {
        // convert 4 digit version to 3 digit version, because version_compare get different informations
        $sVersion1 = preg_replace('@.0$@', '', $sVersion1);
        $sVersion2 = preg_replace('@.0$@', '', $sVersion2);
        return version_compare($sVersion1, $sVersion2, $sCompareOperator);
    }

    /**
     * @param $sShopVersion
     * @return bool
     * @throws Exception
     */
    public function check4ShopUpdate($sShopVersion)
    {
        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        return version_compare(
            $oShopVersionConverter->fixVersionToDefaultEdition(ShopVersion::getVersion()),
            $sShopVersion,
            "<"
        );
    }

    /**
     * @param $sModId
     * @param $sModVersion
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function check4LicenseUpdate($sModId, $sModVersion)
    {
        /** @var $oStr d3str */
        $oStr = oxNew(d3str::class);
        if (d3_cfg_mod::get($sModId)->getLicenseData('modversion')) {
            if ($oStr->versionToInt($sModVersion, 999) >
                $oStr->versionToInt(d3_cfg_mod::get($sModId)->getLicenseData('modversion'), 999)
            ) {
                return true;
            }
        }

        return false;
    }

    public function installMod()
    {
        $sLibId = Registry::get(Request::class)->getRequestEscapedParameter('modid');
        $this->addTplParam('sInstallModId', $sLibId);
    }

    /**
     * @return mixed
     */
    public function getInstallModiFrameLink()
    {
        $aParams = array(
            'cl'    => d3_mod_install::class,
            'modid' => Registry::get(Request::class)->getRequestEscapedParameter('modid'),
            'shp'   => Registry::getConfig()->getShopId()
        );
        $sURL    = Registry::get(d3utils::class)->getAdminClassUrl($aParams);

        return $sURL;
    }

    /**
     * @return array
     */
    public function getInstalledModuleList()
    {
        return $this->aModuleSets;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function saveModCfg()
    {
        $aParams = Registry::get(Request::class)->getRequestEscapedParameter('editval');
        $oSet    = d3_cfg_mod::get(Registry::get(Request::class)->getRequestEscapedParameter('oxmodid'));
        $oSet->setLogData();
        $oSet->assign($aParams);
        $oSet->save();
    }

    /**
     * @return array|mixed
     */
    public function getRemoteMods()
    {
        if (Registry::getSession()->hasVariable('d3RemoteLibs')) {
            $this->aRemoteLibs = Registry::getSession()->getVariable('d3RemoteLibs');
        }

        return $this->aRemoteLibs;
    }

    /**
     * @return bool
     */
    public function getInstallClass()
    {
        if (class_exists(d3install::class)) {
            return true;
        }
        return false;
    }

    /**
     * schreibt Lizenzkey in Modulconfig
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function submit_licensekey()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            /** @var $oSet d3_cfg_mod */
            $oSet = d3_cfg_mod::get(Registry::get(Request::class)->getRequestEscapedParameter('oxmodid'));
            $oSet->setSerial(Registry::get(Request::class)->getRequestEscapedParameter('licensekey'));
            $oSet->save();
        }
    }

    /**
     * @return bool
     */
    public function hasConnectionError()
    {
        return $this->oInstall->blConnectError;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function filedownload()
    {
        $sDownloadUrl = $this->_getDownloadUrl();

        /** @var $oFS d3filesystem */
        $oFS = oxNew(d3filesystem::class);
        // default timeout (1 sec.) isn't enough for downloading module zip files via curl
        $oFS->setCurlTimeOut(25);

        if (false == Registry::get(d3utils::class)->hasDemoshopMode() &&
            $sDownloadUrl &&
            $oFS->checkAvailability($sDownloadUrl)
        ) {
            $oFS->startDirectDownload($sDownloadUrl);
        } else {
            $this->addTplParam('sErrorMLMsg', 'D3_CFG_LIB_DOWNLOAD_UNAVAILABLE');
        }
    }

    /**
     * @return false|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _getDownloadUrl()
    {
        $aLibInfo = $this->getRemoteModuleData(Registry::get(Request::class)->getRequestEscapedParameter('modid'), true);

        if ($aLibInfo &&
            is_array($aLibInfo) &&
            $aLibInfo['availableversion'] &&
            is_array($aLibInfo['availableversion'])
        ) {
            if ($aLibInfo['availableversion'][$this->getPhpVersionDownloadField(true)]) {
                return $aLibInfo['availableversion'][$this->getPhpVersionDownloadField(true)];
            } elseif ($aLibInfo['availableversion'][$this->getPhpVersionDownloadField(false)]) {
                return $aLibInfo['availableversion'][$this->getPhpVersionDownloadField(false)];
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function getSelectedModId()
    {
        return $this->selectedModId;
    }

    /**
     * @param $sModName
     * @return bool|string
     */
    public function getModuleCfgTplPath($sModName)
    {
        try {
            $sTplPath = Registry::getConfig()->getTemplatePath($sModName . '_cfg.tpl', $this->isAdmin());
        } catch (Exception $oEx) {
            return false;
        }

        if ($sTplPath) {
            $this->selectedModId = $sModName;
            return $sTplPath;
        }

        return false;
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
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $oModCfg = d3_cfg_mod::get(Registry::get(Request::class)->getRequestEscapedParameter('modid'));
            $oModCfg->prepareSaveData();
            $oModCfg->save();
        }
    }

    /**
     * @return bool
     */
    public function checkD3Log()
    {
        if (class_exists(d3log::class)) {
            return true;
        }

        return false;
    }

    public function isExecAvailable()
    {
        if (function_exists('exec') && exec('echo EXEC') == 'EXEC') {
            return true;
        }

        return false;
    }

    /**
     * @param bool $blForceIonCube
     * @return bool|string
     */
    public function getPhpVersionDownloadField($blForceIonCube = false)
    {
        return d3install::getInstance()->getPhpVersionDownloadField($blForceIonCube);
    }

    /**
     * @param      $sStatus
     * @param d3_cfg_mod|bool $oSet
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogStatus($sStatus, $oSet = false)
    {
        return $oSet->getLogStatus($sStatus, $oSet);
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
     * @param $sModId
     * @return mixed
     */
    public function getLicenceFrameUrl($sModId)
    {
        $aParams = array(
            'cl'  => 'd3mod_activation',    // don't use d3mod_activation::class
            'modid' => $sModId
        );
        return Registry::get(d3utils::class)->getAdminClassUrl($aParams);
    }

    /**
     * @param d3_cfg_mod $oSet
     * @return bool|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getExpireSpanString($oSet)
    {
        if ($oSet->isExpired()) {
            return Registry::getLang()->translateString('D3_CFG_MOD_STATUS_EXPIRED');
        }

        return sprintf(
            Registry::getLang()->translateString("D3_CFG_MOD_STATUS_EXPIRES_IN"),
            $oSet->getExpireTimeSpan()
        );
    }

    /**
     * @return bool
     */
    public function showNoUpdateMessage()
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

    /**
     * @return string
     */
    public function getTitleIdent()
    {
        return 'D3_MOD_LIB_INSTALLED';
    }

    /**
     * @param d3_cfg_mod $oModule
     * @param $aRemoteModData
     * @return bool
     */
    public function moduleIsNewestVersion($oModule, $aRemoteModData)
    {
        return $this->checkModuleVersion($oModule, $aRemoteModData, '>=');
    }

    /**
     * @param d3_cfg_mod $oModule
     * @param $aRemoteModData
     * @return bool
     */
    public function hasNewerModuleVersion($oModule, $aRemoteModData)
    {
        return $this->checkModuleVersion($oModule, $aRemoteModData, '<');
    }

    /**
     * @param d3_cfg_mod $oModule
     * @param $aRemoteModData
     * @param $sCompare
     * @return bool
     */
    public function checkModuleVersion($oModule, $aRemoteModData, $sCompare)
    {
        return (
                isset($aRemoteModData['newestversion'])
                && $aRemoteModData['newestversion']['version']
                && $this->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData['newestversion']['version'], $sCompare)
            ) || (
                (
                    false == isset($aRemoteModData['availableversion']) ||
                    !$aRemoteModData['newestversion']['version']
                )
                && isset($aRemoteModData['availableversion'])
                && $aRemoteModData['availableversion']['version']
                && $this->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData['availableversion']['version'], $sCompare)
            );
    }

    /**
     * @param d3_cfg_mod $module
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function getModTitle(d3_cfg_mod $module)
    {
        try {
            $sModTitle = $module->getModTitle();
        } catch (d3_cfg_mod_exception $oEx) {
            $sModTitle = $module->getModBaseTitle();
        }

        // can not use utf8_decode, because it contains encoded and unencoded chars
        $aSpecialChars = array( 'Ã¼'=>'ü', 'Ã¤'=>'ä', 'Ã¶'=>'ö', 'Ã–'=>'Ö', 'ÃŸ'=>'ß', 'Ã '=>'à', 'Ã¡'=>'á', 'Ã¢'=>'â', 'Ã£'=>'ã', 'Ã¹'=>'ù', 'Ãº'=>'ú', 'Ã»'=>'û', 'Ã™'=>'Ù', 'Ãš'=>'Ú', 'Ã›'=>'Û', 'Ãœ'=>'Ü', 'Ã²'=>'ò', 'Ã³'=>'ó', 'Ã´'=>'ô', 'Ã¨'=>'è', 'Ã©'=>'é', 'Ãª'=>'ê', 'Ã«'=>'ë', 'Ã€'=>'À', 'Ã'=>'Á', 'Ã‚'=>'Â', 'Ãƒ'=>'Ã', 'Ã„'=>'Ä', 'Ã…'=>'Å', 'Ã‡'=>'Ç', 'Ãˆ'=>'È', 'Ã‰'=>'É', 'ÃŠ'=>'Ê', 'Ã‹'=>'Ë', 'ÃŒ'=>'Ì', 'Ã'=>'Í', 'ÃŽ'=>'Î', 'Ã'=>'Ï', 'Ã‘'=>'Ñ', 'Ã’'=>'Ò', 'Ã“'=>'Ó', 'Ã”'=>'Ô', 'Ã•'=>'Õ', 'Ã˜'=>'Ø', 'Ã¥'=>'å', 'Ã¦'=>'æ', 'Ã§'=>'ç', 'Ã¬'=>'ì', 'Ã­'=>'í', 'Ã®'=>'î', 'Ã¯'=>'ï', 'Ã°'=>'ð', 'Ã±'=>'ñ', 'Ãµ'=>'õ', 'Ã¸'=>'ø', 'Ã½'=>'ý', 'Ã¿'=>'ÿ', 'â‚¬'=>'€' );

        return str_replace(array_keys($aSpecialChars), $aSpecialChars, $sModTitle);
    }

    /**
     * @param d3_cfg_mod $module
     * @param $value
     * @return array|bool|null|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function getLicenseData(d3_cfg_mod $module, $value)
    {
        try {
            $data = $module->getLicenseData($value);
        } catch (d3_cfg_mod_exception $oEx) {
            $data = false;
        }

        return $data;
    }

    /**
     * @param d3_cfg_mod $module
     * @param $value
     * @return array|bool|null|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function getFormatedShopEditionList(d3_cfg_mod $module)
    {
        try {
            $data = $module->getFormatedShopEditionList();
        } catch (d3_cfg_mod_exception $oEx) {
            $data = null;
        }

        return $data;
    }

    /**
     * @param d3_cfg_mod $module
     * @param $value
     * @return array|bool|null|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function getFormatedShopIdList(d3_cfg_mod $module)
    {
        try {
            $data = $module->getFormatedShopIdList();
        } catch (d3_cfg_mod_exception $oEx) {
            $data = null;
        }

        return $data;
    }

    /**
     * @param d3_cfg_mod $module
     * @param $value
     * @return array|bool|null|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function getConfigInfoData(d3_cfg_mod $module)
    {
        try {
            $data = $module->getConfigInfoData();
        } catch (d3_cfg_mod_exception $oEx) {
            $data = null;
        }

        return $data;
    }

    /**
     * @return bool|string
     */
    public function getErrorMessage()
    {
        return $this->sErrorMessage;
    }
}
