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
use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\DatabaseException;
use OxidEsales\Eshop\Core\UtilsView;

class d3tplblocks_Main extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3tplblocks_main.tpl';
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

    public function init()
    {
        $this->sSearchTerm = Registry::get(Request::class)->getRequestEscapedParameter('searchterm');
        $this->sAction     = Registry::get(Request::class)->getRequestEscapedParameter('action');
        $this->sSynsetId   = Registry::get(Request::class)->getRequestEscapedParameter('synsetid');
        parent::init();
    }

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
     * @throws DatabaseConnectionException
     * @throws DatabaseException
     */
    public function save()
    {
        startProfile(__METHOD__);

        if (method_exists($this, 'getEditObjectId')) {
            $soxId = $this->getEditObjectId();
        } else {
            $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
        }

        $aParams = Registry::get(Request::class)->getRequestEscapedParameter("editval");

        // default values
        $aParams = $this->addDefaultValues($aParams);

        /** @var d3oxtplblocks $oTplBlock */
        $oTplBlock = oxNew(d3oxtplblocks::class);

        if ($soxId != "-1") {
            $oTplBlock->load($soxId);
        } else {
            $aParams['oxtplblocks__oxid']      = null;
        }

        $oTplBlock->assign($aParams);
        $oTplBlock->save();

        Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_MOVEFIRST_SUCC'));

        if (method_exists($this, 'setEditObjectId')) {
            $this->setEditObjectId($oTplBlock->getId());
        } elseif ($soxId == "-1") {
            $this->_sSavedId = $oTplBlock->getId();
        }

        stopProfile(__METHOD__);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseException
     * @throws DBALException
     */
    public function moveToFirst()
    {
        startProfile(__METHOD__);

        if (method_exists($this, 'getEditObjectId')) {
            $soxId = $this->getEditObjectId();
        } else {
            $soxId = Registry::get(Request::class)->getRequestEscapedParameter("oxid");
        }

        if ($soxId != "-1") {
            /** @var d3oxtplblocks $oTplBlock */
            $oTplBlock = oxNew(d3oxtplblocks::class);
            $oTplBlock->load($soxId);
            $oTplBlock->assign(
                array(
                    'oxpos' => $oTplBlock->getNextFirstPosition()
                )
            );
            $oTplBlock->save();

            if (method_exists($this, 'setEditObjectId')) {
                $this->setEditObjectId($oTplBlock->getId());
            }

            Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3TPLBLOCKS_MOVEFIRST_SUCC'));
            $this->addTplParam("updatelist", "1");
        }

        stopProfile(__METHOD__);
    }
}
