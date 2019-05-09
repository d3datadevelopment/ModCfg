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
 * @copyright (C) D3 Data Development, Thomas Dartsch
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Installcheck;

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Module\ModuleList;

class d3InstallCheckModuleVersionsIdentical implements d3InstallCheckInterface
{
    protected $_blResult;
    protected $_sPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALSOK';
    protected $_sNotPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALSNOK';
    protected $_sCheckDescML = 'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_DESC';
    protected $_oSet;
    protected $_blPassed;
    protected $_aDetails;
    protected $_blForceError = false;

    /**
     * @param d3_cfg_mod $oSet
     */
    public function __construct(d3_cfg_mod $oSet)
    {
        $this->_oSet = $oSet;
    }

    /**
     * @return bool
     */
    public function hasCheckPassed()
    {
        if ($this->_blPassed === null) {
            if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);
            if (false == $this->_oSet->getMetaModuleId()) {
                return true;
            }

            /** @var Module $oModule */
            $oModule = oxNew(Module::class);
            $oModule->load($this->_oSet->getMetaModuleId());

            /** @var ModuleList $oModuleList */
            $oModuleList = oxNew(ModuleList::class);
            $aModuleVersions = $oModuleList->getModuleConfigParametersByKey(ModuleList::MODULE_KEY_VERSIONS);

            $this->_blPassed = $this->_compareModuleVersions($aModuleVersions, $oModule);
            if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
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
     * @param $aModuleVersions
     * @param Module $oModule
     *
     * @return bool
     */
    protected function _compareModuleVersions($aModuleVersions, $oModule)
    {
        $aModuleVersions = $this->_setErrorCase($aModuleVersions);

        if (is_array($aModuleVersions) &&
            isset($aModuleVersions[$oModule->getId()]) &&
            $aModuleVersions[$oModule->getId()] == $this->_oSet->getModVersion()
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
                /** @var ModuleList $oModuleList */
                $oModuleList = oxNew(ModuleList::class);
                $aModuleVersions = $oModuleList->getModuleConfigParametersByKey(ModuleList::MODULE_KEY_VERSIONS);

                $aModuleVersions = $this->_setErrorCase($aModuleVersions);

                $this->_aDetails[] =
                    Registry::getLang()->translateString('D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_MDV', null, true) .
                    " ".$aModuleVersions[$this->_oSet->getMetaModuleId()];
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
