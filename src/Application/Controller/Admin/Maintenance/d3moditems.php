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

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Shopcompatibility\d3ShopCompatibilityAdapterHandler;
use D3\ModCfg\Application\Model\Install\d3install;
use D3\ModCfg\Application\Model\d3str;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\d3utils;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Module\ModuleList;

class d3moditems extends d3_cfg_mod_main
{
    public $_sThisTemplate = 'd3moditems.tpl';
    protected $_sMenuSubItemTitle = 'd3mxsysitems';
    public $isPreview = false;

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function init()
    {
        $this->addTplParam('aModPreview', $this->getModuleStructure());
        $this->addTplParam('newMods', false);
        $this->addTplParam('sD3Msg', false);

        parent::init();
    }

    /**
     * @return string
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws DBALException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render()
    {
        if (false == $this->isPreview) {
            $this->addTplParam('aModPreview', $this->getModuleStructure());
        }

        return parent::render();
    }

    public function activateitem()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $sSelClassName   = trim(strtolower(Registry::get(Request::class)->getRequestEscapedParameter('actClass')));
            $sSelCIExtension = trim(Registry::get(Request::class)->getRequestEscapedParameter('extension'));
            $sSelExtension   = strtolower($sSelCIExtension);

            $this->_removeOldDeactiveItems($sSelClassName, $sSelExtension);
        }

        return;
    }

    public function deactivateitem()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $sSelClassName   = trim(strtolower(Registry::get(Request::class)->getRequestEscapedParameter('actClass')));
            $sSelCIExtension = trim(Registry::get(Request::class)->getRequestEscapedParameter('extension'));
            $sSelExtension   = strtolower($sSelCIExtension);

            $this->_removeOldDeactiveItems($sSelClassName, $sSelExtension);
        }

        return;
    }

    /**
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function activateallmoditems()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $oModule = $this->getModuleByParameter();

            /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
            $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
            $oD3CompatibilityAdapterHandler->call('oxmodule__activate', array($oModule));
        }
    }

    /**
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function deactivateallmoditems()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $oModule = $this->getModuleByParameter();

            /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
            $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
            $oD3CompatibilityAdapterHandler->call('oxmodule__deactivate', array($oModule));
        }
    }

    /**
     * @return mixed|Module
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    protected function getModuleByParameter()
    {
        if (false == Registry::get(Request::class)->getRequestEscapedParameter('moduleid')) {
            $sSelCIExtension = trim(Registry::get(Request::class)->getRequestEscapedParameter('extension'));
            $aModId          = explode('/', $sSelCIExtension);
            $sModId          = $aModId[0];
        } else {
            $sModId = Registry::get(Request::class)->getRequestEscapedParameter('moduleid');
        }

        /** @var $oModule Module */
        $oModule = oxNew(Module::class);

        /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
        $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
        $oModule = $oD3CompatibilityAdapterHandler->call('oxmodule__loadModule', array($oModule, $sModId));

        return $oModule;
    }

    /**
     * @param $aModules
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    protected function _updateModules($aModules)
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $aNewModList = $this->_prepareListToDisplay($aModules);

            /** @var $oInstall d3install */
            $oInstall = oxNew(d3install::class);
            $oInstall->writeModules($aNewModList, $this->_prepareListToDisplay($this->getModuleStructure()));
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
    public function delitem()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $sSelClassName = trim(strtolower(Registry::get(Request::class)->getRequestEscapedParameter('actClass')));
            $sSelExtension = trim(strtolower(Registry::get(Request::class)->getRequestEscapedParameter('extension')));

            /** @var $oModule Module */
            $oModule  = oxNew(Module::class);
            /** @var $oModulelist ModuleList */
            $oModuleList  = oxNew(ModuleList::class);

            /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
            $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
            $aAllModules = $oD3CompatibilityAdapterHandler->call('oxmodule__getAllModules', array($oModule));

            $aModules = $this->_clearModList($aAllModules);

            foreach ($this->getModuleStructure() as $sClassName => $aModList) {
                foreach ($aModList as $sModKey => $sModule) {
                    if ((trim(strtolower($sClassName)) == $sSelClassName) &&
                        (trim(strtolower($sModule)) == $sSelExtension)
                    ) {
                        unset($aModules[$sSelClassName][$sModKey]);
                        if (false == count($aModules[$sSelClassName])) {
                            unset($aModules[$sSelClassName]);
                        }
                    } elseif ((trim(strtolower($sClassName)) == $sSelClassName) &&
                                (false == $sSelExtension)
                    ) {
                        unset($aModules[$sSelClassName]);
                    }
                }
            }

            $aModList = $oModuleList->buildModuleChains($aModules);
            Registry::getConfig()->setConfigParam('aModules', $aModList);
            Registry::getConfig()->saveShopConfVar('aarr', 'aModules', $aModList);
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
    public function moveItemToFirst()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $sSelClassName   = trim(strtolower(Registry::get(Request::class)->getRequestEscapedParameter('actClass')));
            $sSelCIExtension = trim(Registry::get(Request::class)->getRequestEscapedParameter('extension'));
            $aModules        = $this->getModuleStructure();

            if ($aModules[$sSelClassName]) {
                $sKey     = array_search($sSelCIExtension, $aModules[$sSelClassName]);
                $sContent = $aModules[$sSelClassName][$sKey];
                unset($aModules[$sSelClassName][$sKey]);
                array_unshift($aModules[$sSelClassName], $sContent);

                $this->_updateModules($aModules);
            }
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
    public function moveItemToLast()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $sSelClassName   = trim(strtolower(Registry::get(Request::class)->getRequestEscapedParameter('actClass')));
            $sSelCIExtension = trim(Registry::get(Request::class)->getRequestEscapedParameter('extension'));
            $aModules        = $this->getModuleStructure();

            $sKey     = array_search($sSelCIExtension, $aModules[$sSelClassName]);
            $sContent = $aModules[$sSelClassName][$sKey];
            unset($aModules[$sSelClassName][$sKey]);
            array_push($aModules[$sSelClassName], $sContent);

            $this->_updateModules($aModules);
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
    public function setNewMods()
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            $aModList = $this->_getPreparedNewMods();

            if (false == count($aModList)) {
                $this->addTplParam('sD3Msg', 'noNewItem');
            }

            /** @var $oInstall d3install */
            $oInstall = oxNew(d3install::class);
            $oInstall->registerModuleExternal($aModList);

            $this->addTplParam('aModPreview', $this->getModuleStructure($aModList));
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
    public function getNewModPreview()
    {
        $this->isPreview = true;
        $aModList        = $this->_getPreparedNewMods();
        $this->addTplParam('aModPreview', $this->getModuleStructure($aModList));
    }

    /**
     * @return array
     */
    protected function _getPreparedNewMods()
    {
        $aNewMods = trim(Registry::get(Request::class)->getRequestEscapedParameter('newmoditems'));
        $this->addTplParam('newMods', $aNewMods);

        $aModList = array();
        if (strlen(trim($aNewMods))) {
            foreach (explode(chr(10), $aNewMods) as $sMod) {
                $aTmp = explode('=>', $sMod);
                foreach (explode('&', $aTmp[1]) as $sModPath) {
                    $aTmpModList = array();
                    if ($this->isPreview !== true &&
                        (substr($aTmp[0], 0, 1) == '#' || substr($aTmp[0], 0, 2) == '//')
                    ) {
                        $aTmp[0] = str_replace('#', '', str_replace('//', '', $aTmp[0]));
                        /** @var ModuleList $oModuleList */
                        $oModuleList      = oxNew(ModuleList::class);
                        $aDisabledModules = (array) $this->getConfig()->getConfigParam('aDisabledModules');
                        $aDisabledModList = $this->_clearModList($aDisabledModules);
                        if (false == is_array($aDisabledModList[trim(strtolower($aTmp[0]))]) ||
                            false == in_array(trim($sModPath), $aDisabledModList[trim(strtolower($aTmp[0]))])
                        ) {
                            $aDisabledModList[trim(strtolower($aTmp[0]))][] = trim($sModPath);
                            $aDisabledModList                               =
                                $oModuleList->buildModuleChains($aDisabledModList);
                            Registry::getConfig()->setConfigParam('aDisabledModules', $aDisabledModList);
                            Registry::getConfig()->saveShopConfVar('aarr', 'aDisabledModules', $aDisabledModList);
                        }
                    }
                    $aTmpModList['class']      = trim(strtolower($aTmp[0]));
                    $aTmpModList['modulepath'] = trim($sModPath);
                    $aModList[]                = $aTmpModList;
                }
            }
        }

        return $aModList;
    }

    /**
     * @param null $aModList
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getModuleStructure($aModList = null)
    {
        /** @var $oD3Str d3str */
        $oD3Str = oxNew(d3str::class);
        /** @var $oInstall d3install */
        $oInstall          = oxNew(d3install::class);
        $aExtractedModules = array();
        $sModules          = $oD3Str->aarrayToMultiline($oInstall->registerModuleExternal($aModList, true));

        $aModules = explode(chr(10), $sModules);

        foreach ($aModules as $sClassExtension) {
            $aTmp                                                                  = explode('=>', $sClassExtension);
            $aExtractedModules[trim(str_replace('//', '#', $aTmp[0]))] = explode('&', trim($aTmp[1]));
        }

        ksort($aExtractedModules);

        return $aExtractedModules;
    }

    /**
     * @param $sClass
     * @return bool
     */
    public function checkClassExist($sClass)
    {
        if (class_exists($sClass)) {
            return true;
        }

        return false;
    }

    /**
     * @param $sSelExtension
     * @return bool
     */
    public function checkModExist($sSelExtension)
    {
        /** @var $oFS d3filesystem */
        $oFS   = oxNew(d3filesystem::class);
        $sPath = Registry::getConfig()->getConfigParam('sShopDir') . "modules/" . $sSelExtension . ".php";

        if ($oFS->exists($sPath)) {
            return true;
        }

        return false;
    }

    /**
     * @param $sClass
     * @return bool
     */
    public function checkActive($sClass)
    {
        if (strstr($sClass, '#') || strstr($sClass, '//')) {
            return false;
        }

        return true;
    }

    /**
     * @param $sClass
     * @param $sSelExtension
     * @return bool
     */
    public function isNewModule($sClass, $sSelExtension)
    {
        foreach ($this->_getPreparedNewMods() as $aNewMod) {
            if (preg_match('@' . $aNewMod['class'] . '@i', trim($sClass)) &&
                preg_match('@' . $aNewMod['modulepath'] . '@i', trim($sSelExtension))
            ) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $sClass
     * @param $sSelExtension
     * @return bool
     */
    public function hasFurtherPossibleProblems($sClass, $sSelExtension)
    {
        $blStatus = true;

        foreach ($this->_getPreparedNewMods() as $aNewMod) {
            // check for right spelling
            if ($aNewMod['class'] == trim($sClass) &&
                $aNewMod['modulepath'] == trim($sSelExtension)
            ) {
                $blStatus = false;
            }
        }
        return $blStatus;
    }

    /**
     * @param $aModList
     * @return array
     */
    protected function _prepareListToDisplay($aModList)
    {
        $aNewModList = array();

        foreach ($aModList as $sKey => $aMod) {
            $aNewModList[$sKey] = implode('&', $aMod);
        }

        return $aNewModList;
    }

    /**
     * used in TPL
     */
    public function getDisabledModules()
    {
        return (array) $this->getConfig()->getConfigParam('aDisabledModules');
    }

    /**
     * @param $sModItem
     * @return bool
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function hasMultipleModuleItems($sModItem)
    {
        $aModItem = explode('/', $sModItem);
        if (count($aModItem) > 1) {
            /** @var $oModule Module */
            $oModule = oxNew(Module::class);

            /** @var d3ShopCompatibilityAdapterHandler $oD3CompatibilityAdapterHandler */
            $oD3CompatibilityAdapterHandler = oxNew(d3ShopCompatibilityAdapterHandler::class);
            $oModule = $oD3CompatibilityAdapterHandler->call('oxmodule__loadModule', array($oModule, $aModItem[0]));

            if (($oD3CompatibilityAdapterHandler->call('oxmodule__isExtended', array($oModule))) &&
                count($oModule->getInfo('extend')) > 1
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param      $sSelClassName
     * @param bool $sSelExtension
     */
    protected function _removeOldDeactiveItems($sSelClassName, $sSelExtension = false)
    {
        if (false == Registry::get(d3utils::class)->hasDemoshopMode()) {
            if (substr($sSelClassName, 0, 1) == '#') {
                $blUpdate = false;

                $sOrgClassName = str_replace('#', '', $sSelClassName);
                /** @var $oModuleList ModuleList */
                $oModuleList  = oxNew(ModuleList::class);
                $aModules =
                    $oModuleList->parseModuleChains(Registry::getConfig()->getConfigParam('aModules'));

                if (false == $sSelExtension && in_array($sSelClassName, array_keys($aModules))) {
                    foreach ($aModules[$sSelClassName] as $sExt) {
                        $aModules[$sOrgClassName][] = $sExt;
                    }

                    unset($aModules[$sSelClassName]);
                    $blUpdate = true;
                } elseif (in_array($sSelClassName, array_keys($aModules)) &&
                    in_array($sSelExtension, $aModules[$sSelClassName])
                ) {
                    $aModules[$sOrgClassName][] = $sSelExtension;

                    $aItemKey = array_search($sSelExtension, $aModules[$sSelClassName]);
                    unset($aModules[$sSelClassName][$aItemKey]);

                    if (count($aModules[$sSelClassName]) < 1) {
                        unset($aModules[$sSelClassName]);
                    }

                    $blUpdate = true;
                }

                if ($blUpdate) {
                    $aModules = $oModuleList->buildModuleChains($aModules);

                    Registry::getConfig()->setConfigParam('aModules', $aModules);
                    Registry::getConfig()->saveShopConfVar('aarr', 'aModules', $aModules);
                }
            }
        }
    }

    /**
     * @param $aModList
     * @return mixed
     */
    protected function _clearModList($aModList)
    {
        foreach ($aModList as $sClassName => $aExtClass) {
            foreach ($aExtClass as $sKey => $sExtension) {
                if (is_string($sExtension) && strlen($sExtension) == 0) {
                    unset($aModList[$sClassName][$sKey]);
                }
            }

            if (count($aModList[$sClassName]) == 0) {
                unset($aModList[$sClassName]);
            }
        }

        return $aModList;
    }

    /**
     * @param $sExtension
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function isDisabled($sExtension)
    {
        /** @var $oModule Module */
        $oModule = $this->getModuleId($sExtension);

        if ($oModule && false == $oModule->isActive()) {
            return true;
        }

        return false;
    }

    /**
     * @param $sExtension
     * @return Module
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getModuleId($sExtension)
    {
        /** @var $oModule Module */
        $oModule = oxNew(Module::class);
        /** @var $oD3FS d3filesystem */
        $oD3FS    = oxNew(d3filesystem::class);
        $aPath    = $oD3FS->splitPath($sExtension);
        $aModPath = explode('/', $aPath['reldir']);

        $sModId = $this->_getModuleNameByPath($aModPath);

        $oModule->loadByDir($sModId);
        return $oModule;
    }

    /**
     * @param $aPath
     * @return bool
     */
    protected function _getModuleNameByPath($aPath)
    {
        /** @var $oD3FS d3filesystem */
        $oD3FS = oxNew(d3filesystem::class);

        $sCheckPath = $oD3FS->trailingslashit(
            $oD3FS->trailingslashit(Registry::getConfig()->getConfigParam('sShopDir')) . 'modules'
        );

        foreach ($aPath as $sPathName) {
            $sCheckPath = $oD3FS->trailingslashit($sCheckPath . $sPathName);
            if (false == $oD3FS->exists($sCheckPath . 'vendormetadata.php')) {
                return $sPathName;
            }
        }

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
     * @return string
     */
    public function getLink()
    {
        return '';
    }
}
