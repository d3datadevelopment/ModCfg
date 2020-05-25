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

namespace D3\ModCfg\Modules\Core;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Exception\FileException;
use \Smarty;

class d3_oxutilsview_modcfg extends d3_oxutilsview_modcfg_parent
{
    /**
     * @param Smarty $oSmarty
     * @throws FileException
     */
    protected function _fillCommonSmartyProperties($oSmarty)
    {
        parent::_fillCommonSmartyProperties($oSmarty);

        $oSmarty->plugins_dir[] =
            Registry::getConfig()->getActiveView()->getViewConfig()->getModulePath('d3modcfg_lib').
            'Core/Smarty/Plugin';
    }
}
