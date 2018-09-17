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

namespace D3\ModCfg\Application\Controller\Admin\TPLBlocks;

use D3\ModCfg\Application\Model\d3oxtplblocks;
use D3\ModCfg\Application\Model\d3module;
use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\UtilsView;

class d3tplblocks_extend extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3tplblocks_extend.tpl';
    protected $_aNonIndexedFields = array('oxartnum');
    protected $_sSavedId = null;
    protected $_blUseOwnOxid = true;
    public $sSearchTerm;
    public $sAction;
    public $sSynsetId;
    public $aSynList;
    protected $_aNaviItems = array(
        'new' => array(
            'sScript' => 'top.basefrm.list.EditThis( -1 );return false;',
            'sTranslationId' => 'D3TPLBLOCKS_MAIN_NEWBLOCK',
        ),
    );

    protected $_sMenuItemTitle = 'mxextensions';

    protected $_sMenuSubItemTitle = 'd3mxtplblocks';

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

        /** @var $oTplBlock d3oxtplblocks */
        $oTplBlock = oxNew(d3oxtplblocks::class);
        $this->addTplParam('edit', $oTplBlock);

        if (method_exists($this, 'getEditObjectId')) {
            $soxId = $this->getEditObjectId();
        } else {
            $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
            $this->addTplParam("oxid", $soxId);

            // check if we right now saved a new entry
            if ($this->_sSavedId) {
                $soxId = $this->_sSavedId;
                $this->addTplParam("oxid", $soxId);

                // for reloading upper frame
                $this->addTplParam("updatelist", "1");
            }
        }

        if ($soxId && $soxId != "-1") {
            // load object
            if (!$oTplBlock instanceof d3oxtplblocks && !($oTplBlock->load($soxId))) {
                $soxId = '-1';
                $this->addTplParam('oxid', $soxId);
            } else {
                $oTplBlock->load($soxId);
            }
        }

        return $sRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function hasTplBlocks()
    {
        $aBlockModules = $this->getTplBlockModules();

        if ($aBlockModules && count($aBlockModules)) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getTplBlockModules()
    {
        /** @var Module $oModule */
        $oModule = oxNew(Module::class);

        /** @var d3module $oD3Module */
        $oD3Module = oxNew(d3module::class, $oModule);

        return $oD3Module->d3GetTplBlockModules();
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearTplBlocks()
    {
        startProfile(__METHOD__);

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->clearTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_REMBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        stopProfile(__METHOD__);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     */
    public function refreshTplBlocks()
    {
        startProfile(__METHOD__);

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->refreshTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_REFBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        stopProfile(__METHOD__);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deactivateTplBlocks()
    {
        startProfile(__METHOD__);

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->deactivateTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_DEACTBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        stopProfile(__METHOD__);
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function activateTplBlocks()
    {
        startProfile(__METHOD__);

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->activateTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_ACTBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        stopProfile(__METHOD__);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearDuplicates()
    {
        startProfile(__METHOD__);

        /** @var d3oxtplblocks $oTplBlocks */
        $oTplBlocks = oxNew(d3oxtplblocks::class);
        $oTplBlocks->clearDuplicates();

        Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_CLEARDUPLICATES_SUCC'));
        $this->addTplParam("updatelist", "1");

        stopProfile(__METHOD__);
    }
}
