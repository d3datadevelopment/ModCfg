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

use D3\ModCfg\Modules\Application\Controller\Admin\d3_navigation_modcfgupdate;
use D3\ModCfg\Modules\Application\Model\d3_oxshop_modcfg;
use D3\ModCfg\Modules\Application\Controller\d3_oxshopcontrol_modcfg_extension;
use D3\ModCfg\Modules\Core\d3_oxtheme_modcfg;
use D3\ModCfg\Modules\Application\Controller\Admin\d3_roles_bemain_rolesrights;
use D3\DIContainerHandler\definitionFileContainer;
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Modules\ModCfgServices;
use OxidEsales\Eshop\Core as OxidCore;
use OxidEsales\Eshop\Application\Controller\Admin as OxidAdminController;
use OxidEsales\Eshop\Application\Model as OxidModel;
use D3\ModCfg\Application\Controller\Admin\Configuration as ModuleAdminCnfController;
use D3\ModCfg\Application\Controller\Admin\Install as ModuleAdminInstallController;
use D3\ModCfg\Application\Controller\Admin\Log as ModuleAdminLogController;
use D3\ModCfg\Application\Controller\Admin\Maintenance as ModuleAdminMntController;
use D3\ModCfg\Application\Controller\Admin\TPLBlocks as ModuleAdminTplController;

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

$sModuleId = Constants::OXID_MODULE_ID;
$sLogo = '<img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> ';

$aModule = [
    'id'          => $sModuleId,
    'title'       => [
        'de'    => $sLogo.' Modul-Connector',
        'en'    => $sLogo.' Module Connector',
    ],
    'description' => [
        'de' => 'enth&auml;lt:<ul><li>Modulkonfiguration</li>'.
                '<li>Installationsassistent</li>'.
                '<li>Logging</li>'.
                '<li>TMP leeren</li></ul>',
        'en' => 'contains:<ul><li>Module Configuration</li>'.
                '<li>installation wizzard</li>'.
                '<li>Logging</li>'.
                '<li>Clear TMP</li></ul>',
    ],
    'lang'        => 'de',
    'thumbnail'   => 'picture.svg',
    'version'     => '7.1.1.1',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com',
    'extend'      => [
        definitionFileContainer::class                  => ModCfgServices::class,
        OxidAdminController\NavigationController::class => d3_navigation_modcfgupdate::class,
        OxidModel\Shop::class                           => d3_oxshop_modcfg::class,
        OxidCore\ShopControl::class                     => d3_oxshopcontrol_modcfg_extension::class,
        OxidCore\Theme::class                           => d3_oxtheme_modcfg::class,
        # see at end of file for further dynamic extensions
    ],
    'controllers'   => [
        'd3tplblocks'               => ModuleAdminTplController\d3tplblocks::class,
        'd3tplblocks_list'          => ModuleAdminTplController\d3tplblocks_list::class,
        'd3tplblocks_main'          => ModuleAdminTplController\d3tplblocks_main::class,
        'd3tplblocks_extend'        => ModuleAdminTplController\d3tplblocks_extend::class,

        'd3modext'                  => ModuleAdminCnfController\d3modext::class,
        'd3modext_list'             => ModuleAdminCnfController\d3modext_list::class,
        'd3modext_status'           => ModuleAdminCnfController\d3modext_status::class,
        'd3modext_new'              => ModuleAdminCnfController\d3modext_new::class,
        'd3_mod_update'             => ModuleAdminInstallController\d3_mod_update::class,
        'd3modlib_support'          => ModuleAdminCnfController\d3modlib_support::class,

        'd3modlib'                  => ModuleAdminCnfController\d3modlib::class,
        'd3modlib_list'             => ModuleAdminCnfController\d3modlib_list::class,
        'd3modlib_status'           => ModuleAdminCnfController\d3modlib_status::class,

        'd3sysitems'                => ModuleAdminMntController\d3sysitems::class,
        'd3sysitems_list'           => ModuleAdminMntController\d3sysitems_list::class,
        'd3cfgitems'                => ModuleAdminMntController\d3cfgitems::class,
        'd3maintenance'             => ModuleAdminMntController\d3maintenance::class,

        'd3_cfg_log'                => ModuleAdminLogController\d3_cfg_log::class,
        'd3_cfg_log_list'           => ModuleAdminLogController\d3_cfg_log_list::class,
        'd3_cfg_log_main'           => ModuleAdminLogController\d3_cfg_log_main::class,
        'd3_cfg_log_cleanup'        => ModuleAdminLogController\d3_cfg_log_cleanup::class,

        'd3cleartmp_frame'          => ModuleAdminMntController\d3cleartmp_frame::class,
        'd3cleartmp_list'           => ModuleAdminMntController\d3cleartmp_list::class,
        'd3cleartmp'                => ModuleAdminMntController\d3cleartmp::class,
        'd3shopmaintenance'         => ModuleAdminMntController\d3shopmaintenance::class,

        'd3mod_activation'          => ModuleAdminInstallController\d3mod_activation::class,
    ],
    'blocks'      => [
        [
            'template'  => 'include/header_links.tpl',
            'block'     => 'admin_header_links',
            'file'      => 'views/smarty/blocks/admin/admin_header_links.tpl',
        ],
    ],
    'settings'    => [
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToApex_'.$sModuleId,
            'type' => 'str',
        ],
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToWave_'.$sModuleId,
            'type' => 'str',
        ],
    ],
    'templates'   => [
        #d3_cfg_mod
        '@'.Constants::OXID_MODULE_ID.'/admin/adm_navigation.tpl'        => 'views/smarty/admin/adm_navigation.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/base_.tpl'                 => 'views/smarty/admin/base_.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/base_license.tpl'          => 'views/smarty/admin/base_license.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/base_list.tpl'             => 'views/smarty/admin/base_list.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/base_main.tpl'             => 'views/smarty/admin/base_main.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/pagenavigation.tpl'        => 'views/smarty/admin/pagenavigation.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/d3modcfg_lib_cfg.tpl'      => 'views/smarty/admin/d3modcfg_lib_cfg.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/inc/inc.tpl'               => 'views/smarty/admin/inc/inc.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/inc/bottom.tpl'            => 'views/smarty/admin/inc/bottom.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/inc/active.tpl'            => 'views/smarty/admin/inc/active.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/inc/actionbuttons.tpl'     => 'views/smarty/admin/inc/actionbuttons.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/configuration/status.tpl'  => 'views/smarty/admin/Configuration/status.tpl',

        #d3install
        '@'.Constants::OXID_MODULE_ID.'/admin/install/update.tpl'        => 'views/smarty/admin/Install/update.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/install/lib_cfg.tpl'       => 'views/smarty/admin/Install/lib_cfg.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/install/activation.tpl'    => 'views/smarty/admin/Install/activation.tpl',

        #d3log
        '@'.Constants::OXID_MODULE_ID.'/admin/log/cleanup.tpl'           => 'views/smarty/admin/Log/cleanup.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/log/list.tpl'              => 'views/smarty/admin/Log/list.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/log/main.tpl'              => 'views/smarty/admin/Log/main.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/log/lib_cfg.tpl'           => 'views/smarty/admin/Log/lib_cfg.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/inc/loglevel_form.tpl'     => 'views/smarty/admin/inc/loglevel_form.tpl',

        #d3cleartmp
        '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/cleartmp.tpl'  => 'views/smarty/admin/Maintenance/cleartmp.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/lib_cfg.tpl'   => 'views/smarty/admin/Maintenance/lib_cfg.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/shopmaintenance.tpl'   => 'views/smarty/admin/Maintenance/shopmaintenance.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/cfgitems.tpl'  => 'views/smarty/admin/Maintenance/cfgitems.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/maintenance/maintenance.tpl'   => 'views/smarty/admin/Maintenance/maintenance.tpl',

        '@'.Constants::OXID_MODULE_ID.'/admin/tplblocks/list.tpl'        => 'views/smarty/admin/TPLBlocks/list.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/tplblocks/main.tpl'        => 'views/smarty/admin/TPLBlocks/main.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/tplblocks/extend.tpl'      => 'views/smarty/admin/TPLBlocks/extend.tpl',

        '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost80.tpl'  => 'views/smarty/admin/pattern/sh_cron_profihost80.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost81.tpl'  => 'views/smarty/admin/pattern/sh_cron_profihost81.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost82.tpl'  => 'views/smarty/admin/pattern/sh_cron_profihost82.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_profihost83.tpl'  => 'views/smarty/admin/pattern/sh_cron_profihost83.tpl',
        '@'.Constants::OXID_MODULE_ID.'/admin/pattern/sh_cron_standard.tpl'     => 'views/smarty/admin/pattern/sh_cron_standard.tpl',
    ],
    'events'      => [
        'onActivate'    => '\D3\ModCfg\setup\Events::onActivate',
        'onDeactivate'  => '\D3\ModCfg\setup\Events::onDeactivate',
    ],
    'smartyPluginDirectories' => [
        'Core/Smarty/Plugin',
    ],
];

// EE only
// check for compatible roles_bemain class, if it's missing, extension causes some autoload errors
if (class_exists(OxidAdminController\RolesBackendMain::class)) {
    $aModule['extend'][OxidAdminController\RolesBackendMain::class] = d3_roles_bemain_rolesrights::class;
}
