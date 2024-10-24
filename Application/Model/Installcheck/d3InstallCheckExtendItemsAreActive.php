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

namespace D3\ModCfg\Application\Model\Installcheck;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Module\ModuleList;

class d3InstallCheckExtendItemsAreActive implements d3InstallCheckInterface
{
    protected $_blResult;
    protected $_sPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKEXTENDITEMSOK';
    protected $_sNotPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKEXTENDITEMSNOK';
    protected $_sCheckDescML = 'D3_CFG_MOD_INSTALLCHECKEXTENDITEMS_DESC';
    protected $_blPassed;
    protected $_aDetails;
    protected $_blForceError = false;

    /**
     * @param d3_cfg_mod $_oSet
     */
    public function __construct(protected d3_cfg_mod $_oSet)
    {
    }

    /**
     * @return bool
     */
    public function hasCheckPassed()
    {
        if ($this->_blPassed === null) {
            $this->_blPassed = true;
            if ($this->_oSet->getMetaModuleId()) {
                /** @var Module $oModule */
                $oModule = oxNew(Module::class);
                $oModule->load($this->_oSet->getMetaModuleId());

                $oModulelist = oxNew(ModuleList::class);
                $aDisabledModules = $oModulelist->getDisabledModuleClasses();

                if (is_array($oModule->getInfo('extend'))) {
                    $this->_blPassed = $this->_checkAllModuleItemsExist($oModule->getInfo('extend'), $aDisabledModules);
                }
            }
        }

        return $this->_blPassed;
    }

    /**
     * @return string
     */
    public function getCheckMessageMultilangItem()
    {
        if ($this->hasCheckPassed()) {
            return $this->_sPassedCheckML;
        }

        return $this->_sNotPassedCheckML;
    }

    /**
     * @param $aModuleExtensions
     * @param $aDisabledModules
     *
     * @return bool
     */
    protected function _checkAllModuleItemsExist($aModuleExtensions, $aDisabledModules)
    {
        $aModuleExtensions = $this->_setErrorCase($aModuleExtensions);
        $aDisabledModules = $this->_setErrorCase($aDisabledModules);

        foreach ($aModuleExtensions as $sModule) {
            if (is_array($aDisabledModules) && in_array($sModule, $aDisabledModules)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return string
     */
    public function getCheckDescMultiLangItem()
    {
        return $this->_sCheckDescML;
    }

    /**
     * @return array|null|false
     */
    public function getDetails()
    {
        if (false == $this->hasCheckPassed()) {
            if ($this->_aDetails == null) {
                $aMissingExtensions = [];
                $sMetaModuleId = $this->_oSet->getMetaModuleId();

                if ($sMetaModuleId) {
                    /** @var Module $oModule */
                    $oModule = oxNew(Module::class);
                    $oModule->load($sMetaModuleId);
                    $aMetaExtensions = $oModule->getInfo('extend');

                    $aMissingExtensions = $this->_getNonAvailableMetaExtensions($aMetaExtensions);
                }

                $this->_aDetails = $aMissingExtensions;
            }
        }

        return $this->_aDetails;
    }

    /**
     * @param $aMetaFiles
     *
     * @return array
     */
    protected function _getNonAvailableMetaExtensions($aMetaFiles)
    {
        /** @var ModuleList $oModulelist */
        $oModulelist = oxNew(ModuleList::class);
        $aDisabledModules = $oModulelist->getDisabledModuleClasses();

        $aMetaFiles = $this->_setErrorCase($aMetaFiles);
        $aDisabledModules = $this->_setErrorCase($aDisabledModules);

        $aMissingExtensions = [];
        foreach ($aDisabledModules as $sModuleFile) {
            foreach ($aMetaFiles as $sMetaFile) {
                if ($sMetaFile == $sModuleFile) {
                    $aMissingExtensions[] = $sModuleFile;
                }
            }
        }

        return $aMissingExtensions;
    }

    /**
     * @param $aMetaData
     *
     * @return array
     */
    protected function _setErrorCase($aMetaData)
    {
        if ($this->_blForceError) {
            $aMetaData['orgClass'] = 'myfolder/extension.php';
        }

        return $aMetaData;
    }
}