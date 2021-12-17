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
$sMetadataVersion = '2.0';

$sModuleId = 'd3modcfg_lib';
$sLogo = '<img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> ';

$aModule = [
    'id'          => $sModuleId,
    'title'       => [
        'de'    => $sLogo . 'Modul-Connector',
        'en'    => $sLogo . 'Module Connector'
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
    'thumbnail'   => 'out/pictures/picture.png',
    'version'     => '6.0.2.0',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com',
    'extend'      => [
        OxidCore\Module\ModuleInstaller::class          => D3\ModCfg\Modules\Application\Model\d3_oxmoduleinstaller_activecheck::class,
        OxidAdminController\NavigationController::class => D3\ModCfg\Modules\Application\Controller\Admin\d3_navigation_modcfgupdate::class,
        OxidModel\Shop::class                           => D3\ModCfg\Modules\Application\Model\d3_oxshop_modcfg::class,
        OxidCore\ShopControl::class                     => D3\ModCfg\Modules\Application\Controller\d3_oxshopcontrol_modcfg_extension::class,
        OxidCore\Theme::class                           => D3\ModCfg\Modules\Core\d3_oxtheme_modcfg::class,
        OxidCore\UtilsView::class                       => D3\ModCfg\Modules\Core\d3_oxutilsview_modcfg::class,
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
        'd3moditems'                => ModuleAdminMntController\d3moditems::class,
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
        'd3_mod_install'            => ModuleAdminInstallController\d3_mod_install::class,
    ],
    'blocks'      => [
        'OXID 6.3'  => [
            'template'  => 'header.tpl',
            'block'     => 'admin_header_links',
            'file'      => 'Application/views/blocks/admin/admin_header_links.tpl',
        ],
        'OXID 6.4'  => [
            'template'  => 'include/header_links.tpl',
            'block'     => 'admin_header_links',
            'file'      => 'Application/views/blocks/admin/admin_header_links.tpl',
        ],
    ],
    'settings'    => [
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToWave_'.$sModuleId,
            'type' => 'str',
        ],
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToFlow_'.$sModuleId,
            'type' => 'str',
        ],
        [
            'group' => 'd3thememapping_global',
            'name' => 'd3custParentThemeMappedToAzure_'.$sModuleId,
            'type' => 'str',
        ],
    ],
    'templates'   => [
        #d3_cfg_mod
        'd3_cfg_mod_.tpl'       => 'd3/modcfg/Application/views/admin/tpl/d3_cfg_mod_.tpl',
        'd3_adm_navigation.tpl' => 'd3/modcfg/Application/views/admin/tpl/d3_adm_navigation.tpl',
        'd3_cfg_mod_inc.tpl'    => 'd3/modcfg/Application/views/admin/tpl/inc/d3_cfg_mod_inc.tpl',
        'd3_cfg_mod_bottom.tpl' => 'd3/modcfg/Application/views/admin/tpl/inc/d3_cfg_mod_bottom.tpl',
        'd3_cfg_mod_active.tpl' => 'd3/modcfg/Application/views/admin/tpl/inc/d3_cfg_mod_active.tpl',
        'd3_modprofile_actionbuttons.tpl'  => 'd3/modcfg/Application/views/admin/tpl/inc/d3_modprofile_actionbuttons.tpl',
        'd3_cfg_mod_licence.tpl'=> 'd3/modcfg/Application/views/admin/tpl/d3_cfg_mod_licence.tpl',
        'd3_cfg_mod_list.tpl'   => 'd3/modcfg/Application/views/admin/tpl/d3_cfg_mod_list.tpl',
        'd3_cfg_mod_main.tpl'   => 'd3/modcfg/Application/views/admin/tpl/d3_cfg_mod_main.tpl',
        'd3cfgitems.tpl'        => 'd3/modcfg/Application/views/admin/tpl/Maintenance/d3cfgitems.tpl',
        'd3modcfg_lib_cfg.tpl'  => 'd3/modcfg/Application/views/admin/tpl/d3modcfg_lib_cfg.tpl',
        'd3moditems.tpl'        => 'd3/modcfg/Application/views/admin/tpl/Maintenance/d3moditems.tpl',
        'd3modlib_status.tpl'   => 'd3/modcfg/Application/views/admin/tpl/Configuration/d3modlib_status.tpl',
        'd3mod_activation.tpl'  => 'd3/modcfg/Application/views/admin/tpl/Install/d3mod_activation.tpl',
        'd3maintenance.tpl'     => 'd3/modcfg/Application/views/admin/tpl/Maintenance/d3maintenance.tpl',
        'd3pagenavigation.tpl'  => 'd3/modcfg/Application/views/admin/tpl/d3pagenavigation.tpl',

        #d3install
        'd3_mod_install.tpl'    => 'd3/modcfg/Application/views/admin/tpl/Install/d3_mod_install.tpl',
        'd3_mod_update.tpl'     => 'd3/modcfg/Application/views/admin/tpl/Install/d3_mod_update.tpl',
        'd3install_lib_cfg.tpl' => 'd3/modcfg/Application/views/admin/tpl/Install/d3install_lib_cfg.tpl',

        #d3log
        'd3_cfg_log_cleanup.tpl'=> 'd3/modcfg/Application/views/admin/tpl/Log/d3_cfg_log_cleanup.tpl',
        'd3_cfg_log_list.tpl'   => 'd3/modcfg/Application/views/admin/tpl/Log/d3_cfg_log_list.tpl',
        'd3_cfg_log_main.tpl'   => 'd3/modcfg/Application/views/admin/tpl/Log/d3_cfg_log_main.tpl',
        'd3log_lib_cfg.tpl'     => 'd3/modcfg/Application/views/admin/tpl/Log/d3log_lib_cfg.tpl',
        'd3loglevel_form.tpl'   => 'd3/modcfg/Application/views/admin/tpl/inc/d3loglevel_form.tpl',

        #d3cleartmp
        'd3cleartmp.tpl'        => 'd3/modcfg/Application/views/admin/tpl/Maintenance/d3cleartmp.tpl',
        'd3clrtmp_lib_cfg.tpl'  => 'd3/modcfg/Application/views/admin/tpl/Maintenance/d3clrtmp_lib_cfg.tpl',
        'd3shopmaintenance.tpl' => 'd3/modcfg/Application/views/admin/tpl/Maintenance/d3shopmaintenance.tpl',

        'd3tplblocks_list.tpl'  => 'd3/modcfg/Application/views/admin/tpl/TPLBlocks/d3tplblocks_list.tpl',
        'd3tplblocks_main.tpl'  => 'd3/modcfg/Application/views/admin/tpl/TPLBlocks/d3tplblocks_main.tpl',
        'd3tplblocks_extend.tpl'=> 'd3/modcfg/Application/views/admin/tpl/TPLBlocks/d3tplblocks_extend.tpl',

        'd3shpattern_cron_domainfactory56.tpl' => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_domainfactory56.tpl',
        'd3shpattern_cron_domainfactory70.tpl' => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_domainfactory70.tpl',
        'd3shpattern_cron_hetzner56cgi.tpl' => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner56cgi.tpl',
        'd3shpattern_cron_hetzner56cli.tpl' => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner56cli.tpl',
        'd3shpattern_cron_hetzner70cgi.tpl' => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner70cgi.tpl',
        'd3shpattern_cron_hetzner70cli.tpl' => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner70cli.tpl',
        'd3shpattern_cron_mittwald.tpl'     => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_mittwald.tpl',
        'd3shpattern_cron_profihost56.tpl'  => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost56.tpl',
        'd3shpattern_cron_profihost70.tpl'  => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost70.tpl',
        'd3shpattern_cron_profihost71.tpl'  => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost71.tpl',
        'd3shpattern_cron_profihost72.tpl'  => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost72.tpl',
        'd3shpattern_cron_profihost73.tpl'  => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost73.tpl',
        'd3shpattern_cron_profihost74.tpl'  => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost74.tpl',
        'd3shpattern_cron_standard.tpl'     => 'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_standard.tpl',
    ],
    'events'      => [
        'onActivate'    => '\D3\ModCfg\setup\Events::onActivate',
        'onDeactivate'  => '\D3\ModCfg\setup\Events::onDeactivate',
    ]
];

// EE only
// check for compatible roles_bemain class, if it's missing, extension causes some autoload errors
if (class_exists(OxidAdminController\RolesBackendMain::class)) {
    $aModule['extend'][OxidAdminController\RolesBackendMain::class] = D3\ModCfg\Modules\Application\Controller\Admin\d3_roles_bemain_rolesrights::class;
}
