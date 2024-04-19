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

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_list;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3oxtplblocks;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Model\BaseModel;
use OxidEsales\Eshop\Core\Registry;

class d3tplblocks_list extends d3_cfg_mod_list
{
    protected $_blD3ShowLangSwitch = false;
    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/tplblocks/list';
    protected $_sListClass = d3oxtplblocks::class;
    protected $_blEmployMultilanguage;
    protected $_sDefSortField = 'oxmodule';
    protected $_blShowListItems = true;

    /**
     * @return string
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
     * @return BaseModel
     */
    public function d3getListItemObject()
    {
        /** @var d3oxtplblocks $listObject */
        $listObject = parent::d3getListItemObject();

        return $listObject;
    }

    /**
     * @param array $aWhere
     * @param string $sqlFull
     * @return mixed|string
     * @throws DatabaseConnectionException
     */
    protected function prepareWhereQuery($aWhere, $sqlFull)
    {
        $aWhere = array_merge(
            $aWhere,
            [$this->d3getListItemObject()->getViewName(true).'.oxshopid' => Registry::getConfig()->getShopId()]
        );

        $query = parent::prepareWhereQuery($aWhere, $sqlFull);

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
