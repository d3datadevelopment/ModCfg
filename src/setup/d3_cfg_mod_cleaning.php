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

namespace D3\ModCfg\setup;

use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\ModuleList;
use OxidEsales\Eshop\Core\Config;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use Doctrine\DBAL\DBALException;

class d3_cfg_mod_cleaning
{
    protected $_aSQLInstructions;
    protected $_aInstructions;
    protected $_iMaxLanguages;
    protected $_blExecute = false;
    public $oUpdateBase;

    /**
     * @param d3install_updatebase $oUpdateBase
     */
    public function __construct(d3install_updatebase $oUpdateBase)
    {
        $this->oUpdateBase = $oUpdateBase;
    }

    /**
     * @return array
     */
    public function getOldLibIds()
    {
        return array('d3install_lib', 'd3log_lib', 'd3clrtmp_lib');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldModuleFiles()
    {
        $this->_cleanOldModuleItem('aModuleFiles');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldModuleTemplates()
    {
        $this->_cleanOldModuleItem('aModuleTemplates');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldModulePaths()
    {
        $this->_cleanOldModuleItem('aModulePaths');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldModuleVersions()
    {
        $this->_cleanOldModuleItem('aModuleVersions');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldModuleEvents()
    {
        $this->_cleanOldModuleItem('aModuleEvents');
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function deleteOldLibs()
    {
        /** @var d3filesystem $oFS */
        $oFS = oxNew(d3filesystem::class);

        $sModulePath = $oFS->trailingslashit(
            $oFS->trailingslashit(Registry::getConfig()->getConfigParam('sShopDir')) . 'modules'
        );
        $aModulePaths = Registry::getConfig()->getConfigParam('aModulePaths');

        foreach ($this->getOldLibIds() as $sOldLibId) {
            $sLibPath = $sModulePath.$aModulePaths[$sOldLibId];
            if ($aModulePaths[$sOldLibId] && preg_match("@".str_replace('_lib', '', $sOldLibId)."$@", $sLibPath)) {
                if ($this->_blExecute) {
                    $oFS->del_dir($sLibPath, null, true, true);
                } else {
                    $this->_aInstructions[] = sprintf(
                        Registry::getLang()->translateString('D3_UPDATE_DELETE_DIR'),
                        $sLibPath
                    );
                }
            }
        }

        Registry::getSession()->deleteVariable('d3RemoteLibList');
        Registry::getSession()->deleteVariable('d3RemoteLibs');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldEnabledModules()
    {
        $oConfig = Registry::getConfig();
        $sCurrentShopId = Registry::getConfig()->getActiveShop()->getId();

        /** @var Shop $oShop */
        foreach ($this->oUpdateBase->getShopList() as $oShop) {
            $this->_changeToShop($oShop->getId());
            $aEnabledModules = $oConfig->getModulesWithExtendedClass();
            $aModulePaths = Registry::getConfig()->getConfigParam('aModulePaths');
            foreach ($this->getOldLibIds() as $sOldLibId) {
                if (false == isset($aModulePaths[$sOldLibId])) {
                    continue;
                }

                $sModulePath = $aModulePaths[$sOldLibId];

                foreach ($aEnabledModules as $sBaseClass => $aExtensionList) {
                    foreach ($aExtensionList as $sExtId => $sExtensionPath) {
                        if (preg_match("@^{$sModulePath}@", $sExtensionPath)) {
                            unset($aEnabledModules[$sBaseClass][$sExtId]);
                            if (empty($aEnabledModules[$sBaseClass])) {
                                unset($aEnabledModules[$sBaseClass]);
                            }
                        }
                    }
                }
            }

            /** @var ModuleList $oModuleList */
            $oModuleList = oxNew(ModuleList::class);
            $aModuleList = $oModuleList->buildModuleChains($aEnabledModules);

            $this->oUpdateBase->fixOxconfigVariable(
                'aModules',
                Registry::getConfig()->getActiveShop()->getId(),
                '',
                $aModuleList,
                'aarr'
            );

            if ($this->_blExecute) {
                $oConfig->setConfigParam('aModules', $aModuleList);
            }
        }

        $this->_changeToShop($sCurrentShopId);
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanOldDisabledModules()
    {
        $this->_cleanOldModuleItem('aDisabledModules');
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function transferSettings()
    {
        if (false == d3_cfg_mod::isAvailable('d3modcfg_lib')) {
            return;
        }

        $sCurrentShopId = Registry::getConfig()->getActiveShop()->getId();

        /** @var Shop $oShop */
        foreach ($this->oUpdateBase->getShopList() as $oShop) {
            $this->_changeToShop($oShop->getId());
            for ($iLang = 0; $iLang < $this->oUpdateBase->getMaxLanguages(); $iLang++) {
                $this->_transferLangSettings($iLang);
            }
        }

        $this->_changeToShop($sCurrentShopId);
    }

    /**
     * @param $sNewShopId
     * @throws ConnectionException
     */
    protected function _changeToShop($sNewShopId)
    {
        if (Registry::getConfig()->isMall()
            && $sNewShopId != Registry::getConfig()->getActiveShop()->getId()
        ) {
            $oActiveView = Registry::getConfig()->getActiveView();

            /** @var Config $oNewConf */
            $oNewConf = new Config();
            $oNewConf->setShopId($sNewShopId);
            $oNewConf->init();
            $oNewConf->setActiveView($oActiveView);

            // only available in mall installations
            Registry::getConfig()->onShopChange();
            Registry::getSession()->setVariable('actshop', $sNewShopId);
            Registry::getSession()->setVariable('currentadminshop', $sNewShopId);
            Registry::getConfig()->setShopId($sNewShopId);
            $this->oUpdateBase->setConfig($oNewConf);
        }
    }

    /**
     * @param $iLang
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _transferLangSettings($iLang)
    {
        $blWrite = false;

        $oModCfg = d3_cfg_mod::get('d3modcfg_lib');
        $oModCfg->setLanguage($iLang);

        foreach ($this->getOldLibIds() as $sLibId) {
            if (d3_cfg_mod::isAvailable($sLibId)) {
                $oLib = d3_cfg_mod::get($sLibId);
                $oLib->setLanguage($iLang);
                if ($oLib->getAllValues()) {
                    foreach ($oLib->getAllValues() as $sKey => $mValue) {
                        $oModCfg->setValue($sKey, $mValue);
                        $blWrite = true;
                    }
                }
            }
        }

        if ($blWrite) {
            if ($this->_blExecute) {
                $oModCfg->saveNoLicenseRefresh();
            } else {
                $sFieldName = $iLang ? 'oxvalue_'.$iLang : 'oxvalue';
                $sSql = "UPDATE {$oModCfg->getViewName()} SET {$sFieldName} = ".
                    DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote($oModCfg->getFieldData('oxvalue')).
                    " WHERE oxmodid = ".DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote('d3modcfg_lib')." AND".
                    " oxshopid = ".DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
                        Registry::getConfig()->getActiveShop()->getId()
                    )."; ";
                $this->_aSQLInstructions[] = $sSql;
            }
        }
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws ConnectionException
     */
    public function deleteSettings()
    {
        /** @var d3_cfg_mod $oModCfg */
        $oModCfg = oxNew(d3_cfg_mod::class);
        $sCurrentShopId = Registry::getConfig()->getActiveShop()->getId();

        /** @var Shop $oShop */
        foreach ($this->oUpdateBase->getShopList() as $oShop) {
            $this->_changeToShop($oShop->getId());

            foreach ($this->getOldLibIds() as $sLibId) {
                $sSearchSelect = "SELECT 1 FROM {$oModCfg->getViewName()} WHERE oxmodid = ".
                    DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote($sLibId)." AND oxshopid = ".
                    DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(Registry::getConfig()->getActiveShop()->getId()).
                    " LIMIT 1";

                if (DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($sSearchSelect)) {
                    $sQuery = "DELETE FROM {$oModCfg->getViewName()} WHERE oxmodid = ".
                        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote($sLibId)." AND oxshopid = ".
                        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote(
                            Registry::getConfig()->getActiveShop()->getId()
                        ).";";

                    if ($this->_blExecute) {
                        DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->Execute($sQuery);
                    } else {
                        $this->_aSQLInstructions[] = $sQuery;
                    }
                }
            }
        }

        $this->_changeToShop($sCurrentShopId);
    }

    /**
     * @return array
     */
    public function getSql()
    {
        return $this->_aSQLInstructions;
    }

    /**
     * @return array
     */
    public function getInstructions()
    {
        return $this->_aInstructions;
    }

    /**
     * @param $blExecute
     */
    public function setExecute($blExecute)
    {
        $this->_blExecute = $blExecute;
    }

    /**
     * @param $sItemId
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    protected function _cleanOldModuleItem($sItemId)
    {
        $oConfig = Registry::getConfig();
        $sCurrentShopId = Registry::getConfig()->getActiveShop()->getId();

        /** @var Shop $oShop */
        foreach ($this->oUpdateBase->getShopList() as $oShop) {
            $this->_changeToShop($oShop->getId());

            $aModuleInfos = (array) $oConfig->getConfigParam($sItemId);

            foreach ($this->getOldLibIds() as $sOldLibId) {
                unset($aModuleInfos[$sOldLibId]);
            }

            $this->oUpdateBase->fixOxconfigVariable(
                $sItemId,
                Registry::getConfig()->getActiveShop()->getId(),
                '',
                $aModuleInfos,
                'aarr'
            );

            if ($this->_blExecute) {
                $oConfig->setConfigParam($sItemId, $aModuleInfos);
            }
        }

        $this->_changeToShop($sCurrentShopId);
    }

    /**
     * @return bool
     */
    public function hasDisabledD3VendorItem()
    {
        $aModuleInfos = (array) Registry::getConfig()->getConfigParam('aDisabledModules');

        $iIndex = array_search('d3', $aModuleInfos);

        if (false !== $iIndex) {
            return true;
        }

        return false;
    }

    /**
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function cleanD3VendorItem()
    {
        $sItemId = 'aDisabledModules';
        $oConfig = Registry::getConfig();
        $sCurrentShopId = Registry::getConfig()->getActiveShop()->getId();

        if ($this->hasDisabledD3VendorItem()) {
            /** @var Shop $oShop */
            foreach ($this->oUpdateBase->getShopList() as $oShop) {
                $this->_changeToShop($oShop->getId());

                $aModuleInfos = (array) $oConfig->getConfigParam($sItemId);

                $iIndex = array_search('d3', $aModuleInfos);

                if (false !== $iIndex) {
                    unset($aModuleInfos[$iIndex]);
                }

                $this->oUpdateBase->fixOxconfigVariable(
                    $sItemId,
                    Registry::getConfig()->getActiveShop()->getId(),
                    '',
                    $aModuleInfos,
                    'aarr'
                );

                if ($this->_blExecute) {
                    $oConfig->setConfigParam($sItemId, $aModuleInfos);
                }
            }

            $this->_changeToShop($sCurrentShopId);
        }
    }
}
