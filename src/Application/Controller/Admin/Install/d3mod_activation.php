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

namespace D3\ModCfg\Application\Controller\Admin\Install;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\Shopcompatibility\d3shopversionconverter;
use D3\ModCfg\Application\Model\d3str;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\ShopVersion;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Application\Model\Shop;

final class d3mod_activation extends d3_cfg_mod_main
{
    protected $_sNextStep = 'getActivationType';
    protected $_sActivationType;
    protected $_sThisTemplate = 'd3mod_activation.tpl';
    protected $_blSubmitStatus = false;
    protected $_sModSerial = '';
    protected $_sNotSuccessMessage = '';
    protected $_sValidTo = '';
    /** @var d3_cfg_mod */
    protected $_oModule;

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function init()
    {
        parent::init();

        $this->_oModule = d3_cfg_mod::get(Registry::get(Request::class)->getRequestEscapedParameter('modid'));
        $this->_sActivationType = Registry::get(Request::class)->getRequestEscapedParameter('activationtype');
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
        $this->addTplParam('oModule', d3_cfg_mod::get(Registry::get(Request::class)->getRequestEscapedParameter('modid')));

        return parent::render();
    }

    /**
     * @return mixed
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function isLicenseRequired()
    {
        $blRet = true;

        try {
            $blRet = $this->_oModule->isLicenseRequired();
        } catch (d3_cfg_mod_exception $oEx) {}

        return $blRet;
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

        return $sModTitle;
    }

    public function setStep1()
    {
        $this->_sNextStep = 'getActivationData';
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws Exception
     */
    public function setStep2()
    {
        $aLicData = array();
        $this->_sNextStep = 'submitData';

        $sKey = trim(Registry::get(Request::class)->getRequestEscapedParameter('licencekey'));
        if ($this->getActivationType() == 'boughtoxidmodule'
            && strlen($sKey) > 32
        ) {
            $this->_saveSerial($sKey);
        } else {
            /** @var d3shopversionconverter $oShopVersionConverter */
            $oShopVersionConverter = oxNew(d3shopversionconverter::class);
            $oLicServer = d3install::getInstance()->getFromLicenceServer();
            $oLicServer->setParameter('sModId', $this->_oModule->d3GetModId());
            $oLicServer->setParameter('sModVersion', $this->_oModule->getModVersion());
            $oLicServer->setParameter('sDomain', $this->getSubmitLicenceDomain());
            $oLicServer->setParameter('sShopEdition', $this->getSubmitShopEdition());
            $oLicServer->setParameter('sShopId', $this->getSubmitLicenceShop()->getId());
            $oLicServer->setParameter('sShopVersion', $oShopVersionConverter->fixVersionToDefaultEdition(
                ShopVersion::getVersion()
            ));

            if ($this->getActivationType() == 'usedemo') {
                $aLicData = $oLicServer->getDemoLicence();
            } elseif ($this->getActivationType() == 'boughtoxidmodule') {
                $oLicServer->setParameter('sActIdent', $sKey);
                $aLicData = $oLicServer->getModuleLicence();
            }

            $this->_sModSerial         = $aLicData['sSerial'];
            $this->_blSubmitStatus     = $aLicData['iError'];
            $this->_sNotSuccessMessage = $aLicData['sErrMsg'];
            $this->_sValidTo           = $aLicData['sValidTo'];

            if ($this->_blSubmitStatus === '0' && $this->_sModSerial) {
                $this->_oModule->setSerial($this->_sModSerial);
                $this->_oModule->save();
            }

            $this->_sActivationType = "";
        }
    }

    /**
     * @param $sLicKey
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _saveSerial($sLicKey)
    {
        $sModId  = Registry::get(Request::class)->getRequestEscapedParameter('modid');

        if ($sLicKey) {
            d3_cfg_mod::get($sModId)->setSerial($sLicKey);
            d3_cfg_mod::get($sModId)->save();
            $this->_sNextStep = 'saveSerialSuccess';
        }
    }

    /**
     * @return string
     */
    public function getNextStep()
    {
        return $this->_sNextStep;
    }

    /**
     * @return mixed
     */
    public function getActivationType()
    {
        return $this->_sActivationType;
    }

    /**
     * @return string
     */
    public function getSubmitLicenceDomain()
    {
        $oD3Str = oxNew(d3str::class);
        $aUrl = parse_url(strtolower(Registry::getConfig()->getConfigParam('sShopURL')));
        if ($oD3Str->isIPNum($aUrl['host'])) {
            $sRegDomain = $aUrl['host'];
        } else {
            $sPattern = '@'.preg_quote('.'.$oD3Str->getTLD($aUrl['host'])).'$@';
            $sCustDomain = preg_replace($sPattern, '', $aUrl['host']);
            $aCustDomain = array_slice(explode('.', $sCustDomain), -1, 1);
            $sRegDomain = $aCustDomain[0].'.'.$oD3Str->getTLD($aUrl['host']);
        }

        return $sRegDomain;
    }

    /**
     * @return Shop
     */
    public function getSubmitLicenceShop()
    {
        return Registry::getConfig()->getActiveShop();
    }

    /**
     * @param bool $blFull
     * @return string
     */
    public function getSubmitShopEdition($blFull = false)
    {
        if ($blFull) {
            return Registry::getConfig()->getFullEdition();
        } else {
            /** @var d3shopversionconverter $oShopVersionConverter */
            $oShopVersionConverter = oxNew(d3shopversionconverter::class);
            return $oShopVersionConverter->fixEditionToDefaultEdition($this->getShopEdition());
        }
    }

    /**
     * @return string
     */
    public function getModuleSerial()
    {
        return $this->_sModSerial;
    }

    /**
     * @return bool
     */
    public function getSubmitStatus()
    {
        return $this->_blSubmitStatus;
    }

    /**
     * @return string
     */
    public function getNotSuccessMessage()
    {
        $sIdent = "D3_CFG_MOD_ACTIVATION_ERR";

        switch ($this->getSubmitStatus())
        {
            case '1':
                $sIdent .= "MISSINGPARAMS";
                break;
            case '2':
                $sIdent .= "UNKNOWNMODULE";
                break;
            case '3':
                $sIdent .= "TOMUCHTESTLIC";
                break;
            case '4':
                $sIdent .= "NOORDER";
                break;
            case '5':
                $sIdent .= "WRONGEDITION";
                break;
            case '6':
                $sIdent .= "DIFFERENTSHOPS";
                break;
        }

        return Registry::getLang()->translateString($sIdent);
    }

    /**
     * @return string
     */
    public function getSubmitText()
    {
        $sTranslIdent = "D3_CFG_MOD_ACTIVATION_SUBMIT_NEXT";

        switch ($this->getActivationType())
        {
            case "boughtoxidmodule":
                $sTranslIdent = "D3_CFG_MOD_ACTIVATION_SUBMIT_ACTNOW";
                break;
            case "boughtforeign":
                $sTranslIdent = "D3_CFG_MOD_ACTIVATION_SUBMIT_BACK";
                break;
            case "usedemo":
                $sTranslIdent = "D3_CFG_MOD_ACTIVATION_SUBMIT_SETDEMO";
                break;
            case "wantbuy":
                $sTranslIdent = "D3_CFG_MOD_ACTIVATION_SUBMIT_BACK";
                break;
            case "notlisted":
                $sTranslIdent = "D3_CFG_MOD_ACTIVATION_SUBMIT_BACK";
                break;
        }

        return Registry::getLang()->translateString($sTranslIdent);
    }

    /**
     * @return string
     */
    public function getLicenceExpireDate()
    {
        // unable to use date, because date in far future can't handle with php

        $sDay = substr($this->_sValidTo, 8, 2);
        $sMonth = substr($this->_sValidTo, 5, 2);
        $sYear = substr($this->_sValidTo, 0, 4);

        $sHour = substr($this->_sValidTo, 11, 2);
        $sMinute = substr($this->_sValidTo, 14, 2);
        $sSecond = substr($this->_sValidTo, 17, 2);

        return "$sDay.$sMonth.$sYear $sHour:$sMinute:$sSecond";
    }

    /**
     * @return bool
     */
    public function hasNoExpiration()
    {
        if ($this->_sValidTo == '2099-12-31 23:59:59' ||
            $this->_sValidTo == '2090-12-31 23:59:59'
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getExpirationMessage()
    {
        if ($this->hasNoExpiration()) {
            return Registry::getLang()->translateString("D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_NOEXP").
                Registry::getLang()->translateString("D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_2");
        } else {
            return Registry::getLang()->translateString("D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_1")."<b>".
                $this->getLicenceExpireDate()."</b>".
            Registry::getLang()->translateString("D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_2");
        }
    }

    /**
     * @return bool|string
     */
    public function getBgColor()
    {
        if (Registry::get(Request::class)->getRequestEscapedParameter('bgcolor')) {
            return Registry::get(Request::class)->getRequestEscapedParameter('bgcolor');
        }

        return false;
    }

    /**
     * @return bool
     */
    public function d3GetMenuItemTitle()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function getIsOrderStep()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function getLink()
    {
        return '';
    }
}
