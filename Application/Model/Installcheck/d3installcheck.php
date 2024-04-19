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

use D3\ModCfg\Application\Model\Parametercontainer\d3ParameterContainer;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Model\ListModel;

class d3installcheck extends ListModel
{
    /** @var d3ParameterContainer */
    public $oParameterContainer;
    public $aInstallCheckItems = [
        d3InstallCheckModuleVersionsIdentical::class,
        d3InstallCheckExtendItemsAreActive::class,
        d3InstallCheckBlockItemsAreActive::class,
        d3InstallCheckHasNoInstallItem::class,
    ];

    /**
     * d3installcheck constructor.
     * @param d3_cfg_mod $oModCfg
     * @throws d3ParameterNotFoundException
     */
    public function __construct(d3_cfg_mod $oModCfg)
    {
        parent::__construct();

        $this->oParameterContainer = oxNew(d3parameterContainer::class);
        $this->oParameterContainer->set('oSet', $oModCfg);

        $this->setInstallCheckList();
    }

    /**
     * @throws d3ParameterNotFoundException
     */
    public function setInstallCheckList()
    {
        if (is_array($this->aInstallCheckItems) && count($this->aInstallCheckItems)) {
            foreach ($this->aInstallCheckItems as $sClassName) {
                $this->offsetSet($sClassName, $this->_getCheckItemObject($sClassName));
            }
        }
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        if ($this->count()) {
            /** @var d3InstallCheckInterface $oInstallCheckItem */
            foreach ($this->getArray() as $oInstallCheckItem) {
                if (false == $oInstallCheckItem->hasCheckPassed()) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param $sClassName
     * @return BaseModel
     * @throws d3ParameterNotFoundException
     */
    protected function _getCheckItemObject($sClassName)
    {
        return oxNew(
            $sClassName,
            $this->oParameterContainer->get('oSet')
        );
    }
}
