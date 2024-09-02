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

namespace D3\ModCfg\Application\Controller\Admin\TPLBlocks;

use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3oxtplblocks;
use D3\ModCfg\Application\Model\d3module;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Module\Module;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\UtilsView;

class d3tplblocks_extend extends d3tplblocks_base
{
    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/tplblocks/extend';
    protected $_aNonIndexedFields = ['oxartnum'];
    protected $_sSavedId = null;
    protected $_blUseOwnOxid = true;
    public $sSearchTerm;
    public $sAction;
    public $sSynsetId;
    public $aSynList;
    protected $_aNaviItems = [
        'new' => [
            'sScript' => 'top.basefrm.list.EditThis( -1 );return false;',
            'sTranslationId' => 'D3TPLBLOCKS_MAIN_NEWBLOCK',
        ],
    ];

    protected $_sMenuItemTitle = 'mxextensions';

    protected $_sMenuSubItemTitle = 'd3mxtplblocks';

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
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->clearTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_REMBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }
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
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->refreshTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_REFBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deactivateTplBlocks()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->deactivateTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_DEACTBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function activateTplBlocks()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        if ($sModuleId = Registry::get(Request::class)->getRequestEscapedParameter('tplblockmodule')) {
            /** @var d3oxtplblocks $oTplBlocks */
            $oTplBlocks = oxNew(d3oxtplblocks::class);
            $oTplBlocks->activateTplBlocks($sModuleId);

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_ACTBLOCKS_SUCC'));
            $this->addTplParam("updatelist", "1");
        } else {
            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_NOMODULEMSG'));
        }

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function clearDuplicates()
    {
        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            startProfile(__METHOD__);
        }

        /** @var d3oxtplblocks $oTplBlocks */
        $oTplBlocks = oxNew(d3oxtplblocks::class);
        $oTplBlocks->clearDuplicates();

        Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_CLEARDUPLICATES_SUCC'));
        $this->addTplParam("updatelist", "1");

        if ((bool) Registry::get(ConfigFile::class)->getVar('iDebug')) {
            stopProfile(__METHOD__);
        }
    }
}
