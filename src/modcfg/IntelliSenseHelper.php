<?php

namespace D3\ModCfg\Modules\Application\Controller
{
	class d3_oxshopcontrol_modcfg_extension_parent extends \OxidEsales\Eshop\Core\ShopControl {}
}

namespace D3\ModCfg\Modules\Application\Model
{
	class d3_oxmoduleinstaller_activecheck_parent extends \OxidEsales\Eshop\Core\Module\ModuleInstaller {}

	class d3_oxshop_modcfg_parent extends \OxidEsales\Eshop\Application\Model\Shop {}
}

namespace D3\ModCfg\Modules\Application\Controller\Admin
{
	class d3_roles_bemain_rolesrights_parent extends \OxidEsales\Eshop\Application\Controller\Admin\RolesBackendMain {}

	class d3_navigation_modcfgupdate_parent extends \OxidEsales\Eshop\Application\Controller\Admin\NavigationController {}
}

namespace D3\ModCfg\Modules\Core
{
	class d3_oxemail_log_parent extends \OxidEsales\Eshop\Core\Email {}

	class d3_oxtheme_modcfg_parent extends \OxidEsales\Eshop\Core\Theme {}

	class d3_oxutilsview_modcfg_parent extends \OxidEsales\Eshop\Core\UtilsView {}
}