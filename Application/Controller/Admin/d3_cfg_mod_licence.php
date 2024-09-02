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

namespace D3\ModCfg\Application\Controller\Admin;

use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\Exception as DBALException;
use Exception;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\Installcheck\d3installcheck;
use D3\ModCfg\Application\Model\d3utils;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\d3str;
use D3\ModCfg\Application\Model\d3feeds;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Exception\DatabaseException;
use stdClass;

class d3_cfg_mod_licence extends AdminDetailsController
{
    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/base_license';
    protected $_sModId = Constants::OXID_MODULE_ID;
    protected $_hasLicence = false;
    protected $_hasUpdate = true;
    protected $_hasNewsletterForm = false;
    protected $_modUseCurl = false;
    protected $_sMenuItemTitle = 'd3mxcfg';
    protected $_sMenuSubItemTitle = 'd3tbcllib_support';
    protected $_sBlogFeed = "https://blog.oxidmodule.com/index.php?/feeds/index.rss2";
    protected $_sLogType = d3log::EMERGENCY;
    protected $_oInfoMail;
    public $mBlogContent;
    public $sHelpURL;
    public $oUpdateData;
    public $oNewestData;
    public $sAction;
    protected $_aMessages = [];
    /**
     * @var string
     */
    protected $_sDefaultHelpLinkAdd = 'Modul-Connector/';
    /**
     * additional multilang item, which will added as last part to help url
     *
     * @var string
     */
    protected $_sHelpLinkMLAdd = 'D3MODCFG_LIB_HELPLINK_SUPPORT';

    /**
     * @return string
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function render()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $sRet = parent::render();

        $this->addTplParam('edit', $this->d3GetSet());
        $this->addTplParam('oxid', $this->d3GetSet()->getId());

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return $sRet;
    }

    /**
     * @return d3_cfg_mod
     */
    /**
     * @return d3_cfg_mod
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3GetSet()
    {
        return d3_cfg_mod::get($this->d3getModId());
    }

    /**
     * @return string
     */
    public function d3getModId()
    {
        return $this->_sModId;
    }

    /**
     * ruft oxutils-Funktion auf, die vom Template aus nicht verfuegbar ist
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     * @throws StandardException
     * @throws d3_cfg_mod_exception
     */
    public function save()
    {
        $this->d3GetSet()->prepareSaveData();
        $this->d3GetSet()->save();

        return;
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
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws Exception
     */
    public function checkUpdate()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        $oInstall      = d3install::getInstance();
        $oUpdateServer = $oInstall->getFromUpdateServer();

        $oModCfg = $this->d3GetSet();
        if ($oModCfg->getModCfgError()) {
            return false;
        }

        if ($this->d3GetSet()->getLicenseData('modversion')) {
            $oUpdateServer->setParameter('sLicModVersion', $this->d3GetSet()->getLicenseData('modversion'));
        }

        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        $oUpdateServer->setParameter('sModId', $this->d3getModId());
        $oUpdateServer->setParameter(
            'sEdition',
            $oShopVersionConverter->fixEditionToDefaultEdition($this->getShopEdition())
        );
        $oUpdateServer->setParameter(
            'sShopVersion',
            $oShopVersionConverter->fixVersionToDefaultEdition($this->getShopVersion())
        );
        $aUpdateData = $oUpdateServer->getRemoteModuleVersion();

        $this->sAction = 'versionCheck';

        if (version_compare(
            $aUpdateData['availableversion']['version'],
            $oInstall->getInstalledModVersion($this->d3getModId()),
            '>'
        )) {
            $this->oUpdateData = $aUpdateData['availableversion'];
        }

        if ($aUpdateData['newestversion'] &&
            is_array($aUpdateData['newestversion']) &&
            count($aUpdateData['newestversion'])
        ) {
            $this->oNewestData = $aUpdateData['newestversion'];
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }

        return false;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->sAction;
    }

    /**
     * @param $sPart
     * @return mixed
     */
    public function getUpdateData($sPart)
    {
        return $this->oUpdateData[$sPart];
    }

    /**
     * @param $sPart
     * @return mixed
     */
    public function getNewestModuleData($sPart)
    {
        return $this->oNewestData[$sPart];
    }

    /**
     * request newsletter form
     */
    public function setInfoMail()
    {
        $this->_oInfoMail = new stdClass();
        $oInfoMailXML     = false;
        $iError           = false;

        //        $aParams = oxConfig::getParameter("service");

        //        $sEMail   = trim($aParams['d3_cfg_mod__s_updateinfomail']);
        //        $blActive = (bool)$aParams['d3_cfg_mod__bl_updateinfo'];
        /*
                if (strlen($sEMail) && !d3_oxUtils_cfg::getInstance()->D3checkEmail($sEMail))
                {
                    $this->_oInfoMail->iError = 1;
                    return false;
                }
        */
        //d3_oxUtils_cfg::getInstance()->setModInfoMail($this->soxId, $oInfoMailXML, $iError, $sEMail, $blActive);

        $this->_oInfoMail->iError = $iError;

        $this->_oInfoMail->oXML = $oInfoMailXML;
        //if ($iError) return;

        // is removed
        //        d3_oxUtils_cfg::getInstance()->SaveModCfg($this->soxId);
        //$this->d3GetSet()->d3_cfg_mod__importer_supdateinfomail = new oxField($sEMail, oxField::T_RAW);
        //$this->d3GetSet()->d3_cfg_mod__importer_blupdateinfo = new oxField($blActive, oxField::T_RAW);
        //$this->d3GetSet()->Save();
        //dumpvar($_POST);
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
        if (false == $this->hasDemoShopMode()) {
            $this->d3GetSet()->setSerial(Registry::get(Request::class)->getRequestEscapedParameter('licensekey'));
            $this->d3GetSet()->save();
        }
    }

    /**
     * @return bool
     */
    public function hasDemoShopMode()
    {
        return d3utils::getInstance()->hasDemoShopMode();
    }

    public function image_logo()
    {
        $img_data =
            "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";
        header("Content-type: image/gif");
        echo base64_decode($img_data);
        exit;
    }

    /**
     * @return mixed
     */
    public function getLogoUrl()
    {
        $aParams = [
            'cl'  => $this->getClassKey(),
            'fnc' => 'image_logo',
        ];
        $sURL    = Registry::get(d3utils::class)->getAdminClassUrl($aParams);

        return $sURL;
    }

    /**
     * @return bool
     */
    public function hasLicense()
    {
        return $this->_hasLicence;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasLicenseKey()
    {
        if ($this->d3GetSet()->getFieldData('oxserial')) {
            return true;
        }

        return false;
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
    public function hasUpdate()
    {
        if (class_exists(d3install::class)) {
            $oModCfg = $this->d3GetSet();
            if ($oModCfg->getModCfgError()) {
                return false;
            }

            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function hasNewsletterForm()
    {
        return $this->_hasNewsletterForm;
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkModuleVersion()
    {
        if (ip2long($this->d3GetSet()->getFieldData('oxversion')) == $this->d3GetSet()->getFieldData('oxversionnum')) {
            return 'OK';
        }

        return 'NOK';
    }

    /**
     * @return bool
     */
    public function d3CheckCurl()
    {
        if (false == function_exists('curl_init')) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @return bool
     */
    public function d3ModUseCurl()
    {
        return $this->_modUseCurl;
    }

    /**
     * @param $sShopVersion
     * @return mixed
     * @throws Exception
     */
    public function check4ShopUpdate($sShopVersion)
    {
        /** @var d3shopversionconverter $oShopVersionConverter */
        $oShopVersionConverter = oxNew(d3shopversionconverter::class);
        return version_compare(
            $oShopVersionConverter->fixVersionToDefaultEdition($this->getShopVersion()),
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
        /** @var d3str $oStr */
        $oStr = oxNew(d3str::class);
        if ($this->d3GetSet()->getLicenseData('modversion')) {
            if ($oStr->versionToInt($sModVersion, 999) >
                $oStr->versionToInt(d3_cfg_mod::get($sModId)->getLicenseData('modversion'), 999)
            ) {
                return true;
            }
        }

        return false;
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
        if ($this->sHelpURL === null) {
            $this->sHelpURL = false;

            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                startProfile(__METHOD__);
            }

            $sUrl = $this->d3GetSet()->getHelpURL();
            /** @var d3filesystem $oFS */
            $oFS = oxNew(d3filesystem::class);

            if (false == $this->d3GetSet()->getHelpUrlAdd()) {
                $sUrl .= $oFS->unprefixedslashit($this->_sDefaultHelpLinkAdd);
            }

            if ($this->_sHelpLinkMLAdd) {
                $sUrl .= $oFS->unprefixedslashit(Registry::getLang()->TranslateString($this->_sHelpLinkMLAdd));
            }

            $aFileName = $oFS->splitFilename($sUrl);

            // has no extension
            if (false == $aFileName['ext']) {
                $sUrl = $oFS->trailingslashit($sUrl);
            }

            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }

            $this->sHelpURL = $sUrl;
        }

        return $this->sHelpURL;
    }

    /**
     * @return bool|mixed
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws DatabaseException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function hasBlogContent()
    {
        if ($this->mBlogContent === null) {
            $this->mBlogContent = false;

            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                startProfile(__METHOD__);
            }

            $oModCfgSet = d3_cfg_mod::get('d3modcfg_lib');
            if (! $oModCfgSet->getValue('blModCfg_noSupportBlogInfo') ||
                 ! $this->d3GetSet()->getValue('blModCfg_noSupportBlogInfo')
            ) {
                /** @var d3feeds $oFeed */
                $oFeed              = oxNew(d3feeds::class);
                $this->mBlogContent = $oFeed->getAdminSupportContent($this->_sBlogFeed);
            }

            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
            }
        }

        return $this->mBlogContent;
    }

    /**
     * @return string
     */
    public function getBlogBaseUrl()
    {
        /** @var d3feeds $oFeed */
        $oFeed = oxNew(d3feeds::class);
        return $oFeed->getBlogBaseUrl();
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
    public function getExpireSpanString()
    {
        if ($this->d3GetSet()->isExpired()) {
            return Registry::getLang()->translateString('D3_CFG_MOD_STATUS_EXPIRED');
        }

        return sprintf(
            Registry::getLang()->translateString("D3_CFG_MOD_STATUS_EXPIRES_IN"),
            $this->d3GetSet()->getExpireTimeSpan()
        );
    }

    /**
     * @return array
     */
    public function getUserMessages()
    {
        return $this->_aMessages;
    }

    /**
     * @param $sModId
     * @return mixed
     */
    public function getLicenceFrameUrl($sModId)
    {
        $aParams = [
            'cl'  => 'd3mod_activation',  # don't use d3mod_activation::class
            'modid' => $sModId,
            'bgcolor' => '#F0F0F0',
        ];
        return Registry::get(d3utils::class)->getAdminClassUrl($aParams);
    }

    /**
     * @return d3installcheck
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getInstallCheck()
    {
        $oInstallCheck = oxNew(d3installcheck::class, $this->d3GetSet());

        return $oInstallCheck;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return '';
    }
}
