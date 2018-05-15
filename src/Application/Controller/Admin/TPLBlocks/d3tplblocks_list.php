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

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_list;
use D3\ModCfg\Application\Model\d3oxtplblocks;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;


class d3tplblocks_list extends d3_cfg_mod_list
{
    protected $_blD3ShowLangSwitch = false;
    protected $_sThisTemplate = 'd3tplblocks_list.tpl';
    protected $_sListClass = d3oxtplblocks::class;
    protected $_blEmployMultilanguage;
    protected $_sDefSortField = 'oxmodule';
    protected $_sDefSortOrder = 'asc';
    protected $_blShowListItems = true;

    /**
     * @return null|string
     */
    public function render()
    {
        $sRet = parent::render();

        $this->addTplParam("default_edit", "d3tplblocks_main");
        // assign our list
        //$this->addTplParam('mylist', $this->getItemList());
        return $sRet;
    }

    /**
     * @param array $aWhere
     * @param string $sqlFull
     * @return mixed|string
     * @throws DatabaseConnectionException
     */
    protected function _prepareWhereQuery($aWhere, $sqlFull)
    {
        $query = parent::_prepareWhereQuery($aWhere, $sqlFull);

        $sSearch = '';
        $oProfiles = $this->d3getListItemObject();
        $sSqlActiveSnippet = $oProfiles->getSqlActiveSnippet();
        if ($sSqlActiveSnippet) {
            $sSearch .= " AND (".$sSqlActiveSnippet.") ";
        }

        $query = str_replace($sSearch, '', $query);

        return $query;
    }
}
