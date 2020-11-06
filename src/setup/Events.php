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

namespace D3\ModCfg\setup;

use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;

class Events
{
    public static $_ConfirmParamName = 'd3confirm';

    /**
     * @throws DatabaseConnectionException
     * @throws StandardException
     * @throws SystemComponentException
     * @throws DBALException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     */
    public static function onActivate()
    {
        /** @var Request $request */
        $request = Registry::get(Request::class);

        if (
            (
                $request->getRequestEscapedParameter('cl') === 'module_config'
                && $request->getRequestEscapedParameter('fnc') === 'save'
            )
        ) {
            return;
        }

        d3install::checkUpdateStart();
    }

    public static function onDeactivate()
    {
        /** @var Request $request */
        $request = Registry::get(Request::class);

        if (defined('OXID_PHP_UNIT')
            || (bool) $request->getRequestEscapedParameter(self::$_ConfirmParamName) == true
            || php_sapi_name() === 'cli'
            || (
                $request->getRequestEscapedParameter('cl') === 'module_config'
                && $request->getRequestEscapedParameter('fnc') === 'save'
            )
        ) {
            return;
        }

        $sConfirmUrl = self::getConfirmUrl();
        $sCancelUrl = self::getCancelUrl();

        echo "
        <script type='text/javascript'>
            if (confirm(
                decodeURIComponent(
                    'Der D3-Modul-Connector stellt Basisfunktionen f%C3%BCr andere D3-Module bereit.\\nDeaktivieren Sie diesen daher nur dann, wenn Sie alle anderen D3-Module zuvor ebenfalls unter \\'Erweiterungen -> Module\\' deaktiviert haben.\\nAnsonsten kann es zum Ausfall des Shops im Frontend oder Backend kommen.\\nSoll der Modul-Connector wirklich deaktiviert werden?\\n\\n'
                    +
                    'The D3 module connector provides basic functions for other D3 modules.\\nTherefore, disable the D3 module connector only, if you have previously deactivated all other D3 modules in \\'Extensions -> Modules\\'.\\nOtherwise, the shop may fail in the frontend or backend.\\nShould the module connector be disabled?'
                    )
                )
            ) {
                window.location.href = '{$sConfirmUrl}';
	        } else {
		        window.location.href = '{$sCancelUrl}';
	        }
        </script>";

        die();
    }

    /**
     * @return string
     */
    public static function getCurrentUrl()
    {
        /** @var d3filesystem $oFS */
        $oFS = oxNew(d3filesystem::class);
        return $oFS->getCurrentUrl();
    }

    /**
     * @return string
     */
    public static function getConfirmUrl()
    {
        return self::getCurrentUrl().'&'.self::$_ConfirmParamName.'=true';
    }

    /**
     * @return string
     */
    public static function getCancelUrl()
    {
        $aUrl = parse_url(self::getCurrentUrl());
        parse_str($aUrl['query'], $aParams);
        $aParamsKeys = array_keys($aParams);
        $aLowerKeys = array_map('strtolower', $aParamsKeys);
        $iKey = array_search('fnc', $aLowerKeys);
        $sSearch = $aParamsKeys[$iKey]."=".$aParams[$aParamsKeys[$iKey]];
        $aUrl['query'] = str_replace($sSearch, '', $aUrl['query']);
        $sPort = $aUrl['port']?':'.$aUrl['port']:'';
        $sCurrUrl = $aUrl['scheme'].'://'.$aUrl['host'].$sPort.$aUrl['path'].'?'.$aUrl['query'];

        return $sCurrUrl;
    }
}