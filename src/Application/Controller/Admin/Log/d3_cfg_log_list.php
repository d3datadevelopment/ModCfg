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
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Controller\Admin\Log;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_list;
use D3\ModCfg\Application\Model\Log\d3log;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\UtilsDate;

class d3_cfg_log_list extends d3_cfg_mod_list
{
    protected $_sListClass = d3log::class;

    protected $_sDefSortField = 'oxcounter';

    protected $_blDesc = true;

    protected $_sThisTemplate = 'd3_cfg_log_list.tpl';

    // enable language depended configuration
    protected $_blD3ShowLangSwitch = false;

    protected $_blShowListItems = true;

    /**
     * @return null
     */
    public function render()
    {
        $sPwrSearchFld = Registry::get(Request::class)->getRequestEscapedParameter("pwrsearchfld");

        if (false == isset($sPwrSearchFld)) {
            $sPwrSearchFld = "oxaction";
        }

        /** @var d3log $oD3Log */
        $oD3Log = null;
        $oList  = $this->getItemList();

        $this->_aViewData["art_category"] = null;
        $this->_aViewData["_act"] = null;
        $this->_aViewData["readonly"] = false;
        $this->_aViewData["folder"] = false;

        if ($oList) {
            foreach ($oList as $key => $oD3Log) {
                $sFieldName = "d3log__" . strtolower($sPwrSearchFld);

                // formatting view
                if (false == Registry::getConfig()->getConfigParam('blSkipFormatConversion')) {
                    $oConvertInstance = Registry::get(UtilsDate::class);
                    if ($oD3Log->$sFieldName->fldtype == "datetime") {
                        $oConvertInstance->convertDBDateTime($oD3Log->$sFieldName);
                    } elseif ($oD3Log->$sFieldName->fldtype == "timestamp") {
                        $oConvertInstance->convertDBTimestamp($oD3Log->$sFieldName);
                    } elseif ($oD3Log->$sFieldName->fldtype == "date") {
                        $oConvertInstance->convertDBDate($oD3Log->$sFieldName);
                    }
                }

                $oD3Log->pwrsearchval = $oD3Log->$sFieldName->value;
                $oList[$key]          = $oD3Log;
            }
        }

        $sRet = parent::render();

        // load fields
        if (false == $oD3Log && $oList) {
            /** @var $oD3Log d3log */
            $oD3Log = $oList->getBaseObject();
        }

        $this->addTplParam('pwrsearchfields', $oD3Log->getSearchableFields());
        $this->addTplParam('pwrsearchfld', strtoupper($sPwrSearchFld));

        if ($this->getViewDataElement('where')) {
            $oTmp       = $this->getViewDataElement('where');
            $sFieldName = "d3log__" . strtoupper($sPwrSearchFld);
            if (isset($oTmp->$sFieldName)) {
                $this->addTplParam('pwrsearchinput', $oTmp->$sFieldName);
            }
        }

        $aFilter = $this->getListFilter();
        $this->addTplParam('pwrsearchinput', isset($aFilter["d3log"][$sPwrSearchFld]) ? $aFilter["d3log"][$sPwrSearchFld] : null);

        $this->addTplParam('default_edit', d3_cfg_log_main::class);

        return $sRet;
    }

    /**
     * @return array
     */
    public function buildWhere()
    {
        $this->_aWhere = parent::buildWhere();
        if (false == is_array($this->_aWhere)) {
            $this->_aWhere = array();
        }

        $this->_aWhere['d3log.oxshopid'] = Registry::getConfig()->getShopId() ?
            Registry::getConfig()->getShopId() :
            Registry::getSession()->getVariable("actshop");

        if ((false == isset($this->_aWhere['d3log.oxmodid']) || false == $this->_aWhere['d3log.oxmodid'])
            && Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId')
        ) {
            $this->_aWhere['d3log.oxmodid'] = '%' . Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId') . '%';
        } elseif ((false == isset($this->_aWhere['d3log.oxmodid']) || false == $this->_aWhere['d3log.oxmodid'])
            && $this->_sModId
        ) {
            $this->_aWhere['d3log.oxmodid'] = '%' . $this->_sModId . '%';
        }

        return $this->_aWhere;
    }

    /**
     * @param string $sModId
     *
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getLogTypeList($sModId = '')
    {
        if (Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId')) {
            $sModId = Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId');
        }

        /** @var $oLog d3log */
        $oLog = oxNew(d3log::class);

        return $oLog->getLogTypeList($sModId);
    }

    /**
     * @param string $sModId
     *
     * @return array
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getModIdList($sModId = '')
    {
        if (Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId')) {
            $sModId = Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId');
        }

        /** @var $oLog d3log */
        $oLog = oxNew(d3log::class);

        return $oLog->getModIdList($sModId);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function deleteentry()
    {
        /** @var $oLog d3log */
        $oLog = oxNew(d3log::class);
        $oLog->delLog();
    }

    /**
     * @return array
     */
    public function d3getAdditionalFormParams()
    {
        $aParams = parent::d3getAdditionalFormParams();

        if (Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId')) {
            $aParams['sD3ModId'] = Registry::get(Request::class)->getRequestEscapedParameter('sD3ModId');
        }

        return $aParams;
    }
}
