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
 * @copyright (C) D3 Data Development, Thomas Dartsch
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Installcheck;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;

class d3InstallCheckModuleVersionsIdentical implements d3InstallCheckInterface
{
    protected $_blResult;
    protected $_sPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALSOK';
    protected $_sNotPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALSNOK';
    protected $_sCheckDescML = 'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_DESC';
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
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                startProfile(__METHOD__);
            }
            if (false == $this->_oSet->getMetaModuleId()) {
                return true;
            }

            /** @var Module $oModule */
            $oModule = oxNew(Module::class);
            $oModule->load($this->_oSet->getMetaModuleId());
            $this->_blPassed = $this->_compareModuleVersions($oModule->getInfo('version'));
            if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
                stopProfile(__METHOD__);
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
     * @return string
     */
    public function getCheckDescMultiLangItem()
    {
        return $this->_sCheckDescML;
    }

    /**
     * @param $moduleVersion
     *
     * @return bool
     */
    protected function _compareModuleVersions($moduleVersion)
    {
        $moduleVersions = $this->_setErrorCase($moduleVersion);

        if (isset($moduleVersion) &&
            $moduleVersion == $this->_oSet->getModVersion()
        ) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function getDetails()
    {
        if (false == $this->hasCheckPassed()) {
            if ($this->_aDetails == null) {
                $oModule = oxNew(Module::class);
                $oModule->load($this->_oSet->getMetaModuleId());
                $metaDataModuleVersion = $oModule->getInfo('version');

                $metaDataModuleVersion = $this->_setErrorCase($metaDataModuleVersion);

                $this->_aDetails[] =
                    Registry::getLang()->translateString('D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_MDV', null, true) .
                    " ".$metaDataModuleVersion;
                $this->_aDetails[] =
                    Registry::getLang()->translateString('D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_MCV', null, true) .
                    " ".$this->_oSet->getModVersion();
            }
        }

        return $this->_aDetails;
    }

    /**
     * @param $aMetaData
     *
     * @return array
     */
    protected function _setErrorCase($aMetaData)
    {
        if ($this->_blForceError) {
            $aMetaData[$this->_oSet->getMetaModuleId()] = '900.0.0.0';
        }

        return $aMetaData;
    }
}
