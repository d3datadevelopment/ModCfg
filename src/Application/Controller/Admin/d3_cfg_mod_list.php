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

namespace D3\ModCfg\Application\Controller\Admin;

use D3\ModCfg\Application\Model\Configuration\d3modprofile;
use D3\ModCfg\Application\Model\d3database;
use Doctrine\DBAL\DBALException;
use DOMAttr;
use DOMElement;
use OxidEsales\Eshop\Application\Controller\Admin\AdminListController;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Model\ListModel;
use OxidEsales\Eshop\Core\StrMb;
use OxidEsales\Eshop\Core\TableViewNameGenerator;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\StrRegular;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Str;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;

class d3_cfg_mod_list extends AdminListController
{
    protected $_sThisTemplate = 'd3_cfg_mod_list.tpl';
    protected $_sModId = '';
    protected $_sMenuItemTitle = 'd3mxcfg';
    protected $_sMenuSubItemTitle = 'd3mxlibs';
    protected $_blUpdateMain = null;
    // enable language depended configuration
    protected $_blD3ShowLangSwitch = true;
    protected $_blShowListItems = false;
    protected $_sListClass = d3modprofile::class;
    protected $_sDefSortField = 'oxsort';
    protected $_blDesc = false;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->addTplParam('actlocation', false);
        $this->addTplParam('Errors', false);
        $this->addTplParam('box', 'box');
        $this->addTplParam('readonly', false);
        $this->addTplParam('shop', Registry::getConfig()->getActiveShop());
        $this->addTplParam('art_category', null);
        $this->addTplParam('_act', null);
        $this->addTplParam('readonly', false);
        $this->addTplParam('lstrt', false);
        $this->addTplParam('updatenav', false);
        $this->addTplParam('delshopid', false);
        $this->addTplParam('issubvariant', false);

        parent::__construct();

        if ($this->_sListClass) {
            /** @var d3modprofile $oListObject */
            $oListObject = oxNew($this->_sListClass);
            if (method_exists($oListObject, 'd3IsMultilang')) {
                $this->_blD3ShowLangSwitch = $oListObject->d3IsMultilang();
            }
        }
    }

    /**
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();

        // default page number 1
        $this->addTplParam('oxid', Registry::get(Request::class)->getRequestEscapedParameter('oxid'));
        if (false == $this->getViewDataElement('oxid')) {
            $this->addTplParam('oxid', 1);
        }

        if ($this->getViewDataElement('oxid') == -1 &&
            (false == $this->_sListClass or (
                    $this->_sListClass == d3modprofile::class &&
                    false == $this->d3getModId()
                )
            )
        ) {
            // wenn kein Eintrag gewaehlt und keine Liste gezeigt wird
            $this->addTplParam('oxid', 1);
        }

        // disabled because of errors while delete list items
        //$this->addTplParam('default_edit', d3_cfg_mod_main::class);
        $this->addTplParam('updatemain', $this->_blUpdateMain);
        $this->addTplParam('blShowLangSwitch', $this->_blD3ShowLangSwitch);

        /*
        if (Registry::get(Request::class)->getRequestEscapedParameter('listitems') && $this->getViewDataElement('where')) {
            $aWhere = $this->getViewDataElement('where');
        }
        */

        if ($this->d3getShowListItems()) {
            $sFolder  = Registry::get(Request::class)->getRequestEscapedParameter("folder");
            $sFolder = $sFolder ? $sFolder : -1;
            $this->addTplParam("folder", $sFolder);
        }

        $this->d3FixNamespaceNavigation();

        return $sRet;
    }

    /**
     * escape namespace slashes for javascript use
     */
    public function d3FixNamespaceNavigation()
    {
        /** @var DOMElement $oNavi */
        foreach ($this->getViewDataElement('editnavi') as $oNavi) {
            /** @var DOMAttr $oAttribute */
            foreach ($oNavi->attributes as $oAttribute) {
                if (strtolower($oAttribute->name) == 'cl'
                    && strstr($oAttribute->nodeValue, '\\')
                    && false == strstr($oAttribute->nodeValue, '\\\\')
                ) {
                    $oAttribute->nodeValue = addslashes($oAttribute->nodeValue);
                }
            }
        }
    }

    /**
     * @param array $aWhere
     * @param string $sqlFull
     * @return string
     * @throws DatabaseConnectionException
     */
    protected function _prepareWhereQuery($aWhere, $sqlFull)
    {
        $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
        $sQ = parent::_prepareWhereQuery($aWhere, $sqlFull);

        $oProfiles = $this->d3getListItemObject();

        if ($this->_sListClass != d3modprofile::class) {
            $sSqlActiveSnippet = $oProfiles->getSqlActiveSnippet();
            if ($sSqlActiveSnippet) {
                $sQ .= " AND (".$sSqlActiveSnippet.") ";
            }
        }

        $sFolder = Registry::get(Request::class)->getRequestEscapedParameter('folder');
        //searchong for empty oxfolder fields
        if ($sFolder && $sFolder != '-1') {
            $sQ .= " and ( ".$oProfiles->getViewName().".oxfolder = ".$oDb->quote($sFolder)." ) ";
        }

        return $sQ;
    }

    /**
     * Calculates list items count
     * @param string $sSql SQL query used co select list items
     * @throws DatabaseConnectionException
     * @throws DBALException
     */
    protected function _calcListItemsCount($sSql)
    {
        /** @var StrMb|StrRegular $oStr */
        $oStr = Str::getStr();

        // count SQL
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')->from('');

        $sSql = $oStr->preg_replace('/select .*? from/i', $oQB->getSQL(), $sSql);

        // removing order by
        $sSql = $oStr->preg_replace('/order by .*$/i', '', $sSql);

        $sSql .= ' LIMIT 1';

        // con of list items which fits current search conditions
        $this->_iListSize = DatabaseProvider::getDb()->getOne($sSql);

        // set it into session that other frames know about size of DB
        Registry::getSession()->setVariable('iArtCnt', $this->_iListSize);
    }

    /**
     * @return array
     */
    public function d3getAdditionalFormParams()
    {
        return array();
    }

    /**
     * @return string
     */
    public function d3GetMenuItemTitle()
    {
        return $this->_sMenuItemTitle;
    }

    /**
     * @return string
     */
    public function d3GetMenuSubItemTitle()
    {
        return $this->_sMenuSubItemTitle;
    }

    /**
     * @return string
     */
    public function d3getModId()
    {
        return $this->_sModId;
    }

    /**
     * @return bool
     */
    public function d3getShowListItems()
    {
        return $this->_blShowListItems;
    }

    /**
     * @return string
     */
    public function d3getListItemClass()
    {
        return $this->_sListClass;
    }

    /**
     * @return d3modprofile
     */
    public function d3getListItemObject()
    {
        $oObject = oxNew($this->d3getListItemClass());
        return $oObject;
    }

    /**
     * @return mixed
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getSelectableFolderList()
    {
        $oProfile = $this->d3getListItemObject();
        return $oProfile->d3getSelectableFolderList();
    }

    /**
     * @return bool
     */
    public function getIsOrderStep()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return '';
    }

    /**
     * @param null $sSql
     * bugfix for OXID error (EE521):
     * @return null|string
     * @throws DatabaseConnectionException
     */
    protected function _prepareOrderByQuery($sSql = null)
    {
        // sorting
        $aSortFields = $this->getListSorting();

        if (is_array($aSortFields) && count($aSortFields)) {

            // only add order by at full sql not for count(*)
            $sSql .= ' order by ';
            $blSep = false;

            $oListItem = $this->getItemListBaseObject();
            $iLangId = $oListItem->isMultilang() ? $oListItem->getLanguage() : Registry::getLang()->getBaseLanguage();

            $descending = Registry::get(Request::class)->getRequestEscapedParameter('adminorder');
            $descending = $descending !== null ? (bool)$descending : $this->_blDesc;

            foreach ($aSortFields as $sTable => $aFieldData) {
                if ($sTable && isset($this->_sListClass) && class_exists($this->_sListClass)) {
                    $oListObject = oxNew($this->_sListClass);
                    $sTable = $oListObject->getViewName() . '.';
                } else {
                    /** @var TableViewNameGenerator $oViewNameGenerator */
                    $oViewNameGenerator = oxNew(TableViewNameGenerator::class);
                    $sTable = $sTable ? ($oViewNameGenerator->getViewName($sTable, $iLangId) . '.') : '';
                }

                foreach ($aFieldData as $sColumn => $sSortDir) {

                    $sField = $sTable . $sColumn;
                    //add table name to column name if no table name found attached to column name
                    $sSql .= ((($blSep) ? ', ' : '')) . DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quoteIdentifier($sField);

                    //V oxActive field search always DESC
                    $this->addTplParam("nextSortDir", "desc");
                    if ($descending || $sColumn == "oxactive" || strcasecmp($sSortDir, 'desc') == 0) {
                        $sSql .= ' desc ';
                        $this->addTplParam("nextSortDir", "asc");
                    }

                    $blSep = true;
                }
            }
        }

        return $sSql;
    }

    /**
     * @return ListModel
     */
    public function getItemList()
    {
        if (false == $this->_blShowListItems) {
            $oList = oxNew($this->_sListType);
            return $oList;
        }

        return parent::getItemList();
    }
}
