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

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;

/**
 * Smarty plugin
 * -------------------------------------------------------------
 * File: block.d3modcfgcheck.php
 * Type: string, html
 * Name: block_d3modcfgcheck
 * Purpose: Output content snippet if modcfg exists and is active
 * use [{d3modcfgcheck modid="myModId" [optionvar="sMyOption" [optionvardefault="defaultValue"]]}][{/d3modcfgcheck}]
 *
 * returns this smarty variables
 * - [{$mod_myModId}] active check result (bool)
 * - [{$mod_myModId__sMyOption}] option value, if optionvar is used (mixed)
 * - [{$oModCfg_myModId}] d3_cfg_mod instance
 *
 * -------------------------------------------------------------
 *
 * @param $params
 * @param $sContent
 * @param $smarty \Smarty
 *
 * @return string|null
 * @throws DBALException
 * @throws DatabaseConnectionException
 * @throws DatabaseErrorException
 * @throws StandardException
 * @throws d3ShopCompatibilityAdapterException
 * @throws d3_cfg_mod_exception
 */
function smarty_block_d3modcfgcheck($params, $sContent, &$smarty)
{
    $sIdent     = isset($params['modid']) ? $params['modid'] : null;
    $mOptionVar = isset($params['optionvar']) ? $params['optionvar'] : null;
    $mOptionVarDefault = isset($params['optionvardefault']) ? $params['optionvardefault'] : null;

    if (!$sIdent) {
        $smarty->trigger_error("unset modid");
        return null;
    }

    if (d3_cfg_mod::isCallable() && d3_cfg_mod::isAvailable($sIdent)) {
        $oSet = d3_cfg_mod::get($sIdent);

        $sSmartyVar = 'mod_' . $sIdent;
        $sModCfgVarName = 'oModCfg_' . $sIdent;
        $sOptionVar = $sSmartyVar . '__' . $mOptionVar;

        if ($oSet->isActive()) {
            $smarty->assign($sOptionVar, $oSet->getLicenseConfigData($mOptionVar, $mOptionVarDefault));
            $smarty->assign($sSmartyVar, true);
        } else {
            $smarty->assign($sOptionVar, false);
            $smarty->assign($sSmartyVar, false);
        }
        $smarty->assign($sModCfgVarName, $oSet);

        if ($oSet->isActive() &&
            (false == isset($params['optionvar']) ||
                (isset($params['optionvar']) && $oSet->getLicenseConfigData($mOptionVar, $mOptionVarDefault))
            )
        ) {
            return $sContent;
        }
    }

    return null;
}
