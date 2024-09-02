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

namespace D3\ModCfg\setup;

use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3filesystem;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install;
use Doctrine\DBAL\Exception as DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Exception\SystemComponentException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\Event\FinalizingModuleActivationEvent;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\EventSubscriber\DispatchLegacyEventsSubscriber;
use OxidEsales\Smarty\Module\TemplateExtension\TemplateBlockExtensionDaoInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Events
{
    public static $_ConfirmParamName = 'd3confirm';

    /**
     * @throws ContainerExceptionInterface
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws NotFoundExceptionInterface
     * @throws StandardException
     * @throws SystemComponentException
     * @throws d3ShopCompatibilityAdapterException
     */
    public static function onActivate()
    {
        self::runActivationEventWithoutMetadataEvents();

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
            || str_starts_with(php_sapi_name(), 'cli')
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
     * run module activation event without calling metadata events to register smarty variables
     * required for installation wizard started with metadata events
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected static function runActivationEventWithoutMetadataEvents()
    {
        $container = ContainerFactory::getInstance()->getContainer();
        $eventDispatcher = $container->get(EventDispatcherInterface::class);

        $listenersToRemove = [
            [strtolower(DispatchLegacyEventsSubscriber::class), strtolower('executeMetadataOnActivationEvent')],
        ];

        foreach ($eventDispatcher->getListeners(FinalizingModuleActivationEvent::class) as $listener) {
            $search = [strtolower($listener[0]::class), strtolower($listener[1])];

            if (in_array($search, $listenersToRemove)) {
                $eventDispatcher->removeListener(
                    FinalizingModuleActivationEvent::class,
                    [$listener[0], $listener[1]]
                );
            }
        }

        $eventDispatcher->dispatch(
            new FinalizingModuleActivationEvent(Registry::getConfig()->getShopId(), Constants::OXID_MODULE_ID)
        );

        $container = ContainerFactory::getInstance()->getContainer();

        // remove added Smarty template blocks, to prevent duplicates
        //        if ($container->has(TemplateBlockExtensionDaoInterface::class)) {
        //            $container->get(TemplateBlockExtensionDaoInterface::class)->deleteExtensions(
        //                Constants::OXID_MODULE_ID,
        //                Registry::getConfig()->getShopId()
        //            );
        //        }
    }

    /**
     * @return string
     */
    protected static function getCurrentUrl()
    {
        /** @var d3filesystem $oFS */
        $oFS = oxNew(d3filesystem::class);
        return $oFS->getCurrentUrl();
    }

    /**
     * @return string
     */
    protected static function getConfirmUrl()
    {
        return self::getCurrentUrl().'&'.self::$_ConfirmParamName.'=true';
    }

    /**
     * @return string
     */
    protected static function getCancelUrl()
    {
        $aUrl = parse_url(self::getCurrentUrl());
        parse_str($aUrl['query'], $aParams);
        $aParamsKeys = array_keys($aParams);
        $aLowerKeys = array_map('strtolower', $aParamsKeys);
        $iKey = array_search('fnc', $aLowerKeys);
        $sSearch = $aParamsKeys[$iKey]."=".$aParams[$aParamsKeys[$iKey]];
        $aUrl['query'] = str_replace($sSearch, '', $aUrl['query']);
        $sPort = (isset($aUrl['port']) && strlen((string) $aUrl['port'])) ? ':'.$aUrl['port'] : '';
        $sCurrUrl = $aUrl['scheme'].'://'.$aUrl['host'].$sPort.$aUrl['path'].'?'.$aUrl['query'];

        return $sCurrUrl;
    }
}
