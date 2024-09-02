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
