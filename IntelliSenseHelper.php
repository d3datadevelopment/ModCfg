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

namespace {
    use Symfony\Component\DependencyInjection\Container;

    class d3CacheContainer extends Container
    {
        public function __construct()
        {
            parent::__construct();
        }
    }
}

namespace D3\ModCfg\Modules {
    use D3\DIContainerHandler\definitionFileContainer;

    class ModCfgServices_parent extends definitionFileContainer
    {
    }
}

namespace D3\ModCfg\Modules\Application\Controller
{
    use OxidEsales\Eshop\Core\ShopControl;

    class d3_oxshopcontrol_modcfg_extension_parent extends ShopControl
    {
    }
}

namespace D3\ModCfg\Modules\Application\Model
{
    use OxidEsales\Eshop\Application\Model\Shop;

    class d3_oxshop_modcfg_parent extends Shop
    {
    }
}

namespace D3\ModCfg\Modules\Application\Controller\Admin
{
    use OxidEsales\Eshop\Application\Controller\Admin\NavigationController;
    use OxidEsales\Eshop\Application\Controller\Admin\RolesBackendMain;

    class d3_roles_bemain_rolesrights_parent extends RolesBackendMain
    {
    }

    class d3_navigation_modcfgupdate_parent extends NavigationController
    {
    }
}

namespace D3\ModCfg\Modules\Core
{
    use OxidEsales\Eshop\Core\Theme;

    class d3_oxtheme_modcfg_parent extends Theme
    {
    }
}
