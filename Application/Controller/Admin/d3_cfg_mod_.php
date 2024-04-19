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

use D3\ModCfg\Application\Model\Constants;
use OxidEsales\Eshop\Application\Controller\Admin\AdminController;

class d3_cfg_mod_ extends AdminController
{
    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/base_';
    protected $_sModId = '';
    protected $_hasListItems = false;
    protected $_sListItemFrameRelation = '40%,*';

    /**
     * @return string
     */
    public function render()
    {
        return parent::render();
    }

    /**
     * @return bool
     */
    public function hasListItems()
    {
        return $this->_hasListItems;
    }

    /**
     * @return string
     */
    public function d3getModId()
    {
        return $this->_sModId;
    }

    /**
     * @return string
     */
    public function d3getAdditionalUrlParams()
    {
        return '';
    }

    /**
     * @return string
     */
    public function d3getListItemFrameRelation()
    {
        return $this->_sListItemFrameRelation;
    }

    public function getAdditionalHeadContent()
    {
        return '';
    }
}
