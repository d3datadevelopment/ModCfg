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
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Module\ModuleList;

class d3InstallCheckClassItemsAreAvailable implements d3InstallCheckInterface
{
    protected $_blResult;
    protected $_sPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKCLASSITEMSOK';
    protected $_sNotPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKCLASSITEMSNOK';
    protected $_sCheckDescML = 'D3_CFG_MOD_INSTALLCHECKCLASSITEMS_DESC';
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
            $this->_blPassed = true;
            if ($this->_oSet->getMetaModuleId()) {
                /** @var Module $oModule */
                $oModule = oxNew(Module::class);
                $oModule->load($this->_oSet->getMetaModuleId());

                /** @var ModuleList $oModuleList */
                $oModuleList = oxNew(ModuleList::class);
                $aAllModuleFiles = $oModuleList->getModuleConfigParametersByKey(ModuleList::MODULE_KEY_FILES);

                if (is_array($oModule->getInfo('files'))) {
                    $this->_blPassed = $this->_checkAllModuleClassesExist(
                        $oModule->getInfo('files'),
                        $aAllModuleFiles[$this->_oSet->getMetaModuleId()]
                    );
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
     * @param $aMetaFiles
     * @param $aRegisteredFiles
     *
     * @return bool
     */
    protected function _checkAllModuleClassesExist($aMetaFiles, $aRegisteredFiles)
    {
        $aMetaFiles = $this->_setErrorCase($aMetaFiles);

        if (count($aMetaFiles) != count($aRegisteredFiles)) {
            return false;
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
     * @return array|null
     */
    public function getDetails()
    {
        if (false == $this->hasCheckPassed()) {
            if ($this->_aDetails == null) {
                $aMissingClasses = array();
                $sMetaModuleId = $this->_oSet->getMetaModuleId();

                if ($sMetaModuleId) {
                    /** @var Module $oModule */
                    $oModule = oxNew(Module::class);
                    $oModule->load($sMetaModuleId);
                    $aMetaFiles = $oModule->getInfo('files');

                    $aMissingClasses = $this->_getNonAvailableMetaClasses($sMetaModuleId, $aMetaFiles);
                }

                $this->_aDetails = $aMissingClasses;
            }
        }

        return $this->_aDetails;
    }

    /**
     * @param $sMetaModuleId
     * @param $aMetaFiles
     *
     * @return mixed
     */
    protected function _getNonAvailableMetaClasses($sMetaModuleId, $aMetaFiles)
    {
        $aMetaFiles = $this->_setErrorCase($aMetaFiles);

        /** @var ModuleList $oModuleList */
        $oModuleList = oxNew(ModuleList::class);
        $aAllModuleFiles = $oModuleList->getModuleConfigParametersByKey(ModuleList::MODULE_KEY_FILES);

        foreach ($aAllModuleFiles[$sMetaModuleId] as $aModuleFile) {

            foreach ($aMetaFiles as $sKey => $sMetaFile) {
                if ($sMetaFile == $aModuleFile) {
                    unset($aMetaFiles[$sKey]);
                }
            }
        }

        return $aMetaFiles;
    }

    /**
     * @param $aMetaData
     *
     * @return array
     */
    protected function _setErrorCase($aMetaData)
    {
        if ($this->_blForceError) {
            $aMetaData['myfile'] = 'myfolder/file.php';
        }

        return $aMetaData;
    }
}
