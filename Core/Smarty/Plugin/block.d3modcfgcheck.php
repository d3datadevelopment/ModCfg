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

use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use Doctrine\DBAL\Exception as DBALException;
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
    $sIdent     = $params['modid'] ?? null;
    $mOptionVar = $params['optionvar'] ?? null;
    $mOptionVarDefault = $params['optionvardefault'] ?? null;

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
            (
                false == isset($params['optionvar']) ||
                (isset($params['optionvar']) && $oSet->getLicenseConfigData($mOptionVar, $mOptionVarDefault))
            )
        ) {
            return $sContent;
        }
    }

    return null;
}