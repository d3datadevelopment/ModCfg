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

namespace D3\ModCfg\Application\Controller\Admin\Maintenance;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Facade\ActiveModulesDataProviderBridgeInterface;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\Bridge\ModuleActivationBridge;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\Bridge\ModuleActivationBridgeInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class d3maintenance extends d3_cfg_mod_main
{
    public $_sThisTemplate = 'd3maintenance.tpl';

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function repairModuleDbItems()
    {
        $aActiveModules = ContainerFactory::getInstance()->getContainer()->get(ActiveModulesDataProviderBridgeInterface::class)->getModuleIds();

        $aRemoveFields = ['aDisabledModules', 'aModulePaths', 'aModuleTemplates', 'aModuleVersions',
            'aModuleEvents', 'aModules', 'aModuleFiles'];

        /** @var Shop $shop */
        $shop = Registry::getConfig()->getActiveShop();
        $container = ContainerFactory::getInstance()->getContainer();
        $queryBuilder = $container->get(QueryBuilderFactoryInterface::class)->create();
        $queryBuilder->delete('oxconfig')
            ->where("oxvarname IN ('".implode("','", $aRemoveFields)."'")
            ->andWhere('oxshopid = '.$queryBuilder->createNamedParameter($shop->getId()));

        $queryBuilder->execute();

        foreach ($aActiveModules as $moduleId) {
            /** @var ModuleActivationBridge $moduleActivationBridge */
            $moduleActivationBridge = $container->get(ModuleActivationBridgeInterface::class);
            $moduleActivationBridge->activate(
                $moduleId,
                Registry::getConfig()->getShopId()
            );
        }
    }
}
