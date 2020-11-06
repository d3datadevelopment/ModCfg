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
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Install\d3updateinstaller;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;

class d3InstallCheckHasNoInstallItem implements d3InstallCheckInterface
{
    protected $_blResult;
    protected $_sPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKINSTALLITEMSOK';
    protected $_sNotPassedCheckML = 'D3_CFG_MOD_INSTALLCHECKINSTALLITEMSNOK';
    protected $_sCheckDescML = 'D3_CFG_MOD_INSTALLCHECKINSTALLITEMS_DESC';
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
     * @throws d3ShopCompatibilityAdapterException
     * @throws StandardException
     * @throws SystemComponentException
     */
    public function hasCheckPassed()
    {
        if ($this->_blPassed === null) {
            $this->_blPassed = true;

            /** @var d3updateinstaller $oUpdateInstaller */
            $oUpdateInstaller = oxNew(d3updateinstaller::class);
            $aSetupClasses = $oUpdateInstaller->getSetupClasses($this->_oSet->getMetaModuleId());

            if (is_array($aSetupClasses) && count($aSetupClasses)) {
                foreach ($aSetupClasses as $sFQClassName) {
                    /** @var d3install_updatebase $oUpdate */
                    $oUpdate = oxNew($sFQClassName);
                    if ($this->_blForceError || $oUpdate->isUpdateRequired(false)) {
                        $this->_blPassed = false;
                        break;
                    }
                }
            }
        }

        return $this->_blPassed;
    }

    /**
     * @return string
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ShopCompatibilityAdapterException
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
     * @param $aFileInfos
     *
     * @return bool|mixed
     */
    protected function _isUpdateScript($aFileInfos)
    {
        $sSearchPattern = "^d3.*_update.php$";

        if ((strstr($aFileInfos['dir'], 'models') ||
                strstr($aFileInfos['dir'], 'setup')) &&
            preg_match('@'.$sSearchPattern.'@', $aFileInfos['file'])
        ) {
            return str_replace('.php', '', $aFileInfos['file']);
        };

        return false;
    }

    public function getDetails()
    {
        return $this->_aDetails;
    }
}
