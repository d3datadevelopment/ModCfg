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
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\ModCfg\Application\Model\Maintenance\d3maintenanceactions;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\UtilsView;

class d3shopmaintenance extends d3_cfg_mod_main
{
    public $_sThisTemplate = 'd3shopmaintenance.tpl';
    protected $_sMenuSubItemTitle = 'd3tbclclr_mtn';
    protected $_sModId = 'd3modcfg_lib';
    protected $_sTickerUrl = null;
    /** @var d3filesystem */
    public $oFS = null;
    /** @var d3clrtmp */
    public $oClrTmp;

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
        $sRet = parent::render();
        $this->addTplParam(
            'aCheckResults',
            $this->getMaintenanceActions()->getCheckResults()
        );

        return $sRet;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearGenArticleImgs()
    {
        /** @var $oClrTmp d3clrtmp */
        $oClrTmp = $this->_getClrTmp();
        $oClrTmp->clearGeneratedProductImgs();

        Registry::get(UtilsView::class)->addErrorToDisplay('D3_CFG_CLRTMP_GENIMGS_SUCC');
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearGenCategoryImgs()
    {
        /** @var $oClrTmp d3clrtmp */
        $oClrTmp = $this->_getClrTmp();
        $oClrTmp->clearGeneratedCategoryImgs();

        Registry::get(UtilsView::class)->addErrorToDisplay('D3_CFG_CLRTMP_GENCATIMGS_SUCC');
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearGenManufacturerImgs()
    {
        /** @var $oClrTmp d3clrtmp */
        $oClrTmp = $this->_getClrTmp();
        $oClrTmp->clearGeneratedManufacturerImgs();

        Registry::get(UtilsView::class)->addErrorToDisplay('D3_CFG_CLRTMP_GENMNFIMGS_SUCC');
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearGenVendorImgs()
    {
        /** @var $oClrTmp d3clrtmp */
        $oClrTmp = $this->_getClrTmp();
        $oClrTmp->clearGeneratedVendorImgs();

        Registry::get(UtilsView::class)->addErrorToDisplay('D3_CFG_CLRTMP_GENVNDIMGS_SUCC');
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearGenWrappingImgs()
    {
        /** @var $oClrTmp d3clrtmp */
        $oClrTmp = $this->_getClrTmp();
        $oClrTmp->clearGeneratedWrappingImgs();

        Registry::get(UtilsView::class)->addErrorToDisplay('D3_CFG_CLRTMP_GENWRPIMGS_SUCC');
    }

    /**
     * @return d3clrtmp
     */
    protected function _getClrTmp()
    {
        if (false == $this->oClrTmp) {
            $this->oClrTmp = oxNew(d3clrtmp::class);
        }

        return $this->oClrTmp;
    }

    public function checkItems()
    {
        $this->getMaintenanceActions()->checkAllActions();
    }

    /**
     * @return d3maintenanceactions
     */
    public function getMaintenanceActions()
    {
        return oxNew(d3maintenanceactions::class);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     */
    public function fixOxArtextendsItems()
    {
        $this->getMaintenanceActions()->fixOxArtextendsItems();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearAcc2Art()
    {
        $this->getMaintenanceActions()->fixClearAcc2Art();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearAct2Art()
    {
        $this->getMaintenanceActions()->fixClearAct2Art();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearArtextends()
    {
        $this->getMaintenanceActions()->fixClearArtextends();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearCat2Attrib()
    {
        $this->getMaintenanceActions()->fixClearCat2Attrib();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearNewssubscribed()
    {
        $this->getMaintenanceActions()->fixClearNewssubscribed();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearDel2Delset()
    {
        $this->getMaintenanceActions()->fixClearDel2Delset();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Action()
    {
        $this->getMaintenanceActions()->fixClearObj2Action();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Art()
    {
        $this->getMaintenanceActions()->fixClearObj2Art();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Attrib()
    {
        $this->getMaintenanceActions()->fixClearObj2Attrib();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Cat()
    {
        $this->getMaintenanceActions()->fixClearObj2Cat();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Disc()
    {
        $this->getMaintenanceActions()->fixClearObj2Disc();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Group()
    {
        $this->getMaintenanceActions()->fixClearObj2Group();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2List()
    {
        $this->getMaintenanceActions()->fixClearObj2List();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Payment()
    {
        $this->getMaintenanceActions()->fixClearObj2Payment();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObj2Sellist()
    {
        $this->getMaintenanceActions()->fixClearObj2Sellist();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearPrice2Art()
    {
        $this->getMaintenanceActions()->fixClearPrice2Art();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearObject2Delivery()
    {
        $this->getMaintenanceActions()->fixClearObject2Delivery();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearVariantsWithoutParent()
    {
        $this->getMaintenanceActions()->fixClearVariantsWithoutParent();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixVariantParentAsVar()
    {
        $this->getMaintenanceActions()->fixVariantParentAsVar();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixVariantActive()
    {
        $this->getMaintenanceActions()->fixVariantActive();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function unassignInactiveCountries()
    {
        $this->getMaintenanceActions()->fixUnassignInactiveCountries();
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deactivateEmptyCategories()
    {
        $this->getMaintenanceActions()->fixDeactivateEmptyCategories();
    }

    /**
     * @return string
     */
    protected function _d3GetModId()
    {
        return $this->_sModId;
    }
}
