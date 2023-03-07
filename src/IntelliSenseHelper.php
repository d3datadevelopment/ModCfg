<?php

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

    class ModCfgServices_parent extends definitionFileContainer {}
}

namespace D3\ModCfg\Modules\Application\Controller
{
    use OxidEsales\Eshop\Core\ShopControl;

    class d3_oxshopcontrol_modcfg_extension_parent extends ShopControl {}
}

namespace D3\ModCfg\Modules\Application\Model
{
    use OxidEsales\Eshop\Application\Model\Shop;
    use OxidEsales\Eshop\Core\Module\ModuleInstaller;

    class d3_oxmoduleinstaller_activecheck_parent extends ModuleInstaller {}

	class d3_oxshop_modcfg_parent extends Shop {}
}

namespace D3\ModCfg\Modules\Application\Controller\Admin
{
    use OxidEsales\Eshop\Application\Controller\Admin\NavigationController;
    use OxidEsales\Eshop\Application\Controller\Admin\RolesBackendMain;

    class d3_roles_bemain_rolesrights_parent extends RolesBackendMain {}

	class d3_navigation_modcfgupdate_parent extends NavigationController {}
}

namespace D3\ModCfg\Modules\Core
{
    use OxidEsales\Eshop\Core\Email;
    use OxidEsales\Eshop\Core\Theme;
    use OxidEsales\Eshop\Core\UtilsView;

    class d3_oxemail_log_parent extends Email {}

	class d3_oxtheme_modcfg_parent extends Theme {}

	class d3_oxutilsview_modcfg_parent extends UtilsView {}
}