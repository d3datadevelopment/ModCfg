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

namespace D3\ModCfg\Application\Model\Maintenance;

use D3\ModCfg\Application\Model\Maintenance\Actions\AccessioreToArticleOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\ActionInterface;
use D3\ModCfg\Application\Model\Maintenance\Actions\ActionsToArticleOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\ArticleExtendsOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\CategoryToAttributeOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\ClearGeneratedArticleImages;
use D3\ModCfg\Application\Model\Maintenance\Actions\ClearGeneratedCategoryImages;
use D3\ModCfg\Application\Model\Maintenance\Actions\ClearGeneratedManufacturerImages;
use D3\ModCfg\Application\Model\Maintenance\Actions\ClearGeneratedVendorImages;
use D3\ModCfg\Application\Model\Maintenance\Actions\ClearGeneratedWrappingImages;
use D3\ModCfg\Application\Model\Maintenance\Actions\ClearVariantsWithoutParent;
use D3\ModCfg\Application\Model\Maintenance\Actions\DeactivateEmptyCategories;
use D3\ModCfg\Application\Model\Maintenance\Actions\DeliveryToDeliverySetOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\DisableVariantsWithInactiveParent;
use D3\ModCfg\Application\Model\Maintenance\Actions\InsertMissingArticleExtends;
use D3\ModCfg\Application\Model\Maintenance\Actions\NewsSubscribedOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2ActionsOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2ArticleOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2AttributeOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2CategoryOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2DeliveryOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2DiscountOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2GroupOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2ListOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2PaymentOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Object2SelectlistOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\Price2ArticleOrphans;
use D3\ModCfg\Application\Model\Maintenance\Actions\SelfAssignedVariants;
use D3\ModCfg\Application\Model\Maintenance\Actions\UnassignInactiveCountries;
use OxidEsales\Eshop\Core\Registry;
use ReflectionClass;
use ReflectionException;

class d3maintenanceactions
{
    public array $aCheckResults = [];

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getActionList(): array
    {
        $actions = [];

        foreach ([
            AccessioreToArticleOrphans::class,  //        'ClearAcc2Art',
            ActionsToArticleOrphans::class,     //        'ClearAct2Art',
            ArticleExtendsOrphans::class,       //        'ClearArtextends',
            CategoryToAttributeOrphans::class,  //        'ClearCat2Attrib',
            DeliveryToDeliverySetOrphans::class,//        'ClearDel2Delset',
            NewsSubscribedOrphans::class,       //        'ClearNewssubscribed',
            Object2ActionsOrphans::class,       //        'ClearObj2Action',
            Object2ArticleOrphans::class,       //        'ClearObj2Art',
            Object2AttributeOrphans::class,     //        'ClearObj2Attrib',
            Object2CategoryOrphans::class,      //        'ClearObj2Cat',
            Object2DeliveryOrphans::class,      //        'ClearObject2Delivery',
            Object2DiscountOrphans::class,      //        'ClearObj2Disc',
            Object2GroupOrphans::class,         //        'ClearObj2Group',
            Object2ListOrphans::class,          //        'ClearObj2List',
            Object2PaymentOrphans::class,       //        'ClearObj2Payment',
            Object2SelectlistOrphans::class,    //        'ClearObj2Sellist',
            Price2ArticleOrphans::class,        //        'ClearPrice2Art',
            UnassignInactiveCountries::class,   //        'UnassignInactiveCountries',
            DeactivateEmptyCategories::class,   //        'DeactivateEmptyCategories',
            InsertMissingArticleExtends::class, //        'OxArtextendsItems',
            SelfAssignedVariants::class,        //        'VariantParentAsVar',
            ClearVariantsWithoutParent::class,  //        'ClearVariantsWithoutParent',
            DisableVariantsWithInactiveParent::class,   //        'VariantActive',
            ClearGeneratedArticleImages::class, //        'clearGenArticleImgs'
            ClearGeneratedCategoryImages::class,//        'clearGenCategoryImgs'
            ClearGeneratedManufacturerImages::class,    //        'clearGenManufacturerImgs'
            ClearGeneratedVendorImages::class,  //        'clearGenVendorImgs'
            ClearGeneratedWrappingImages::class,//        'clearGenWrappingImgs'
        ] as $actionClassName) {
            $actions[(new ReflectionClass($actionClassName))->getShortName()] = $actionClassName;
        }

        return $actions;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getCheckResults(): array
    {
        $aResults = Registry::getSession()->getVariable('aD3ShopMaintenanceResults') ?? [];

        foreach (array_keys($this->getActionList()) as $sActionIdent) {
            $aResults[$sActionIdent] ??= 0;
        }

        return $aResults;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function checkAllActions(): array
    {
        $aCheckResults = [];

        foreach ($this->getActionList() as $ident => $actionClass) {
            /** @var ActionInterface $action */
            $action = oxNew($actionClass);
            $aCheckResults[$ident] = $action->getAffectedRows();
        }

        Registry::getSession()->setVariable('aD3ShopMaintenanceResults', $aCheckResults);

        return $aCheckResults;
    }
}
