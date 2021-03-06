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

namespace D3\ModCfg\Application\Controller\Admin\TPLBlocks;

use D3\ModCfg\Application\Model\d3oxtplblocks;
use Doctrine\DBAL\DBALException;
use Exception;
use OxidEsales\Eshop\Core\ConfigFile;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\DatabaseException;
use OxidEsales\Eshop\Core\UtilsView;

class d3tplblocks_main extends d3tplblocks_base
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
     * @throws Exception
     */
    public function save()
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

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

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseException
     * @throws DBALException
     * @throws Exception
     */
    public function moveToFirst()
    {
        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) startProfile( __METHOD__);

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

        if ((bool) Registry::get( ConfigFile::class)->getVar( 'iDebug')) stopProfile( __METHOD__);
    }
}
