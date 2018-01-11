<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
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
use D3\ModCfg\setup as ModuleSetup;

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

$sModuleId = 'd3modcfg_lib';

$aModule = [
    'id'          => $sModuleId,
    'title'       => '<img src="../modules/d3/modcfg/public/d3logo.php?cl=' . $_REQUEST['cl'] .
        '" alt="D&sup3;" title="D&sup3; Data Development"> Modul-Connector',
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
    'version'     => '5.1.0.0',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com',
    'extend'      => [
        OxidCore\Module\ModuleInstaller::class  =>
            'd3/modcfg/Modules/Application/Model/d3_oxmoduleinstaller_activecheck',
        OxidAdminController\NavigationController::class  =>
            'd3/modcfg/Modules/Application/Controller/Admin/d3_navigation_modcfgupdate',
        OxidModel\Shop::class => 'd3/modcfg/Modules/Application/Model/d3_oxshop_modcfg',
        OxidCore\ShopControl::class  => 'd3/modcfg/Modules/Application/Controller/d3_oxshopcontrol_modcfg_extension',
        OxidCore\Theme::class => 'd3/modcfg/Modules/Core/d3_oxtheme_modcfg',
        OxidCore\UtilsView::class => 'd3/modcfg/Modules/Core/d3_oxutilsview_modcfg',
// ToDo: check, if we can enable this
        // OxidCore\Email::class => 'd3/modcfg/Modules/Core/d3_oxemail_log',
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
        [
            'template'  => 'header.tpl',
            'block'     => 'admin_header_links',
            'file'      => 'Application/views/blocks/admin/admin_header_links.tpl',
        ],
    ],
    'settings'    => [
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
    ],
    'events'      => [
        'onActivate'    => '\D3\ModCfg\setup\Events::onActivate',
        'onDeactivate'  => '\D3\ModCfg\setup\Events::onDeactivate',
    ],

    'd3FileRegister'    => [
        'd3/modcfg/metadata.php',
        'd3/modcfg/IntelliSenseHelper.php',
        'd3/modcfg/Core/Smarty/Plugin/block.d3modcfgcheck.php',
        'd3/modcfg/Core/Smarty/Plugin/function.d3getobject.php',
        'd3/modcfg/public/d3logo.php',
        'd3/modcfg/Application/translations/de/d3modcfg_lang.php',
        'd3/modcfg/Application/translations/en/d3modcfg_lang.php',
        'd3/modcfg/Application/views/admin/de/d3clrtmp_lang.php',
        'd3/modcfg/Application/views/admin/de/d3log_lang.php',
        'd3/modcfg/Application/views/admin/de/d3modcfg_lang.php',
        'd3/modcfg/Application/views/admin/de/d3modinstall_lang.php',
        'd3/modcfg/Application/views/admin/de/module_options.php',
        'd3/modcfg/Application/views/admin/en/d3clrtmp_lang.php',
        'd3/modcfg/Application/views/admin/en/d3log_lang.php',
        'd3/modcfg/Application/views/admin/en/d3modcfg_lang.php',
        'd3/modcfg/Application/views/admin/en/d3modinstall_lang.php',
        'd3/modcfg/Application/views/admin/en/module_options.php',
        'd3/modcfg/Modules/Application/Controller/Admin/d3_roles_bemain_rolesrights.php', // in PE + CE it's not registered
        'd3/modcfg/Modules/Core/d3_oxemail_log.php',
        'd3/modcfg/public/d3modcfg_maintenance.php',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_domainfactory56.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_domainfactory70.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner56cgi.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner56cli.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner70cgi.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_hetzner70cli.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_mittwald.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost56.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_profihost70.tpl',
        'd3/modcfg/Application/views/admin/tpl/modcfg-pattern/d3shpattern_cron_standard.tpl',

        'd3/modcfg/Application/Controller/Admin/d3_cfg_mod_.php',
        'd3/modcfg/Application/Controller/Admin/d3_cfg_mod_licence.php',
        'd3/modcfg/Application/Controller/Admin/d3_cfg_mod_list.php',
        'd3/modcfg/Application/Controller/Admin/d3_cfg_mod_main.php',

        'd3/modcfg/Application/Controller/Admin/Configuration/d3mod_status.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modext.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modext_list.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modext_status.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modext_new.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modlib.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modlib_list.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modlib_status.php',
        'd3/modcfg/Application/Controller/Admin/Configuration/d3modlib_support.php',

        'd3/modcfg/Application/Controller/Admin/Install/d3_mod_install.php',
        'd3/modcfg/Application/Controller/Admin/Install/d3_mod_update.php',
        'd3/modcfg/Application/Controller/Admin/Install/d3mod_activation.php',

        'd3/modcfg/Application/Controller/Admin/Log/d3_cfg_log.php',
        'd3/modcfg/Application/Controller/Admin/Log/d3_cfg_log_cleanup.php',
        'd3/modcfg/Application/Controller/Admin/Log/d3_cfg_log_list.php',
        'd3/modcfg/Application/Controller/Admin/Log/d3_cfg_log_main.php',

        'd3/modcfg/Application/Controller/Admin/Maintenance/d3cfgitems.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3cleartmp.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3cleartmp_frame.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3cleartmp_list.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3maintenance.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3moditems.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3shopmaintenance.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3sysitems.php',
        'd3/modcfg/Application/Controller/Admin/Maintenance/d3sysitems_list.php',

        'd3/modcfg/Application/Model/d3bit.php',
        'd3/modcfg/Application/Model/d3database.php',
        'd3/modcfg/Application/Model/d3feeds.php',
        'd3/modcfg/Application/Model/d3pagenavigation.php',
        'd3/modcfg/Application/Model/d3tickercontrol.php',
        'd3/modcfg/Application/Model/d3counter.php',
        'd3/modcfg/Application/Model/d3utils.php',
        'd3/modcfg/Application/Model/d3selection.php',
        'd3/modcfg/Application/Model/d3filesystem.php',
        'd3/modcfg/Application/Model/d3remotecache.php',
        'd3/modcfg/Application/Model/d3module.php',

        'd3/modcfg/Application/Model/d3simplexml.php',
        'd3/modcfg/Application/Model/d3str.php',
        'd3/modcfg/Application/Model/d3stream.php',
        'd3/modcfg/Application/Model/d3webdav.php',


        'd3/modcfg/Application/Model/Configuration/d3_cfg_mod.php',
        'd3/modcfg/Application/Model/Configuration/d3_cfg_mod_variant.php',
        'd3/modcfg/Application/Model/Configuration/d3modprofile.php',
        'd3/modcfg/Application/Model/Configuration/d3modprofilelist.php',

        'd3/modcfg/Application/Model/Encoding/d3decoder.php',
        'd3/modcfg/Application/Model/Encoding/d3encoder.php',

        'd3/modcfg/Application/Model/Exception/d3_cfg_mod_exception.php',
        'd3/modcfg/Application/Model/Exception/d3modprofile_exception.php',
        'd3/modcfg/Application/Model/Exception/d3log_exception.php',
        'd3/modcfg/Application/Model/Exception/d3ParameterNotFoundException.php',
        'd3/modcfg/Application/Model/Exception/d3ShopCompatibilityAdapterException.php',

        'd3/modcfg/Application/Model/Filegenerator/d3filegenerator.php',
        'd3/modcfg/Application/Model/Filegenerator/d3filegeneratorcronsh.php',

        'd3/modcfg/Application/Model/Install/d3install.php',
        'd3/modcfg/Application/Model/Install/d3install_updatebase.php',
        'd3/modcfg/Application/Model/Install/d3updateinstaller.php',

        'd3/modcfg/Application/Model/Installcheck/d3installcheck.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckInterface.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckModuleVersionsIdentical.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckExtendItemsAreActive.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckClassItemsAreAvailable.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckTemplateItemsAreAvailable.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckBlockItemsAreActive.php',
        'd3/modcfg/Application/Model/Installcheck/d3InstallCheckHasNoInstallItem.php',

        'd3/modcfg/Application/Model/Installwizzard/d3installaction.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdatahandler.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installcleandbstructurelist.php',
        'd3/modcfg/Application/Model/Installwizzard/d3install2shoprelation.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbtable.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbtablemultilang.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbtablemultishop.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbfield.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbfieldmultilang.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbfieldcollation.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbindizes.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbrecord.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbrecordmultilang.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installconfirmmessage.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installupdatefile.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installdbcommon.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installoxconfig.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installmodule.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installmodcfg.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installskipupdate.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installskipjob.php',
        'd3/modcfg/Application/Model/Installwizzard/d3installfile.php',

        'd3/modcfg/Application/Model/Log/d3log.php',

        'd3/modcfg/Application/Model/Maintenance/d3maintenanceactions.php',
        'd3/modcfg/Application/Model/Maintenance/d3clrtmp.php',

        'd3/modcfg/Application/Model/Parametercontainer/d3ParameterContainer.php',
        'd3/modcfg/Application/Model/Parametercontainer/d3CacheHandler.php',
        'd3/modcfg/Application/Model/Parametercontainer/d3ParameterContainerInterface.php',
        'd3/modcfg/Application/Model/Parametercontainer/Registry.php',

        'd3/modcfg/Application/Model/Shopcompatibility/d3ShopCompatibilityAdapterHandler.php',
        'd3/modcfg/Application/Model/Shopcompatibility/d3ShopCompatibilityAdapterInterface.php',
        'd3/modcfg/Application/Model/Shopcompatibility/d3ShopCompatibility60Adapter.php',
        'd3/modcfg/Application/Model/Shopcompatibility/d3shopversionconverter.php',

        'd3/modcfg/Application/Model/Transactionlog/d3transactionlog.php',
        'd3/modcfg/Application/Model/Transactionlog/d3transactionloglist.php',
        'd3/modcfg/Application/Model/Transactionlog/Reader/AbstractReader.php',
        'd3/modcfg/Application/Model/Transactionlog/object2d3transactionlog.php',

        'd3/modcfg/setup/Events.php',
        'd3/modcfg/setup/d3_cfg_mod_update.php',
        'd3/modcfg/setup/d3_cfg_mod_cleaning.php',
        'd3/modcfg/setup/d3log_update.php',

        'd3/modcfg/Application/Model/d3oxtplblocks.php',

        'd3/modcfg/Application/Controller/Admin/TPLBlocks/d3tplblocks.php',
        'd3/modcfg/Application/Controller/Admin/TPLBlocks/d3tplblocks_list.php',
        'd3/modcfg/Application/Controller/Admin/TPLBlocks/d3tplblocks_extend.php',
        'd3/modcfg/Application/Controller/Admin/TPLBlocks/d3tplblocks_main.php',
    ],
    'd3SetupClasses'    => [
        ModuleSetup\d3_cfg_mod_update::class,
        ModuleSetup\d3log_update::class,
    ],
];

// EE only
// check for compatible roles_bemain class, if it's missing, extension causes some autoload errors
if (class_exists(OxidAdminController\RolesBackendMain::class)) {
    $aModule['extend'][OxidAdminController\RolesBackendMain::class] = 'd3/modcfg/Modules/Application/Controller/Admin/d3_roles_bemain_rolesrights';
}
