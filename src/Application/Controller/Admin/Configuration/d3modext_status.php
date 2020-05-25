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

namespace D3\ModCfg\Application\Controller\Admin\Configuration;

class d3modext_status extends d3mod_status
{
    /**
     * additional multilang item, which will added as last part to help url
     *
     * @var string
     */
    protected $_sHelpLinkMLAdd = 'D3MODCFG_EXT_HELPLINK_STATUS';
    protected $_sRemoteUpdateSessionVarname = 'd3RemoteExtList';
    protected $_sRemoteModuleSessionVarname = 'd3RemoteExt';
    protected $_sMenuSubItemTitle = 'd3mxextensions';
    public $aRemoteMods = array();
    protected $_sClassName = self::class;

    /**
     * @return string
     */
    public function getModuleType()
    {
        return 'ext';
    }

    /**
     * @return array|mixed
     */
    public function getRemoteMods()
    {
        return array();
    }

    /**
     * @return bool
     */
    public function getShowNewItems()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTitleIdent()
    {
        return 'D3_MOD_EXT_INSTALLED';
    }

    /**
     * @return bool
     */
    public function getIsOrderStep()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function getLink()
    {
        return '';
    }
}
