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
    public $aRemoteMods = [];
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
        return [];
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
     * @return string
     */
    public function getLink()
    {
        return '';
    }
}
