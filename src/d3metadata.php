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

use D3\ModCfg\setup as ModuleSetup;

$aModule = [
    'd3FileRegister'    => [
        'd3/modcfg/metadata.php',
        'd3/modcfg/d3metadata.php',
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
        'd3/modcfg/Application/Model/d3bitmask.php',
        'd3/modcfg/Application/Model/d3database.php',
        'd3/modcfg/Application/Model/d3MsdManager.php',
        'd3/modcfg/Application/Model/d3feeds.php',
        'd3/modcfg/Application/Model/d3pagenavigation.php',
        'd3/modcfg/Application/Model/d3tickercontrol.php',
        'd3/modcfg/Application/Model/d3counter.php',
        'd3/modcfg/Application/Model/d3utils.php',
        'd3/modcfg/Application/Model/d3selection.php',
        'd3/modcfg/Application/Model/d3filesystem.php',
        'd3/modcfg/Application/Model/d3protocol.php',
        'd3/modcfg/Application/Model/d3remotecache.php',
        'd3/modcfg/Application/Model/d3module.php',
        'd3/modcfg/Application/Model/d3thememapping.php',
        'd3/modcfg/Application/Model/d3cliutils.php',

        'd3/modcfg/Application/Model/d3simplexml.php',
        'd3/modcfg/Application/Model/d3str.php',
        'd3/modcfg/Application/Model/d3RegexpGenerator.php',
        'd3/modcfg/Application/Model/d3stream.php',
        'd3/modcfg/Application/Model/d3webdav.php',

        'd3/modcfg/Application/Model/Configuration/d3_cfg_mod.php',
        'd3/modcfg/Application/Model/Configuration/d3_cfg_mod_datastore.php',
        'd3/modcfg/Application/Model/Configuration/d3_cfg_mod_licencecheck.php',
        'd3/modcfg/Application/Model/Configuration/d3_license_app.php',
        'd3/modcfg/Application/Model/Configuration/d3_cfg_mod_variant.php',
        'd3/modcfg/Application/Model/Configuration/d3modprofile.php',
        'd3/modcfg/Application/Model/Configuration/d3modprofilelist.php',

        'd3/modcfg/Application/Model/DependencyInjectionContainer/d3DicHandlerInterface.php',
        'd3/modcfg/Application/Model/DependencyInjectionContainer/d3DicHandler.php',
        'd3/modcfg/Application/Model/DependencyInjectionContainer/d3DicUtilities.php',

        'd3/modcfg/Application/Model/Encoding/d3decoder.php',
        'd3/modcfg/Application/Model/Encoding/d3encoder.php',

        'd3/modcfg/Application/Model/Exception/d3_cfg_mod_exception.php',
        'd3/modcfg/Application/Model/Exception/d3modprofile_exception.php',
        'd3/modcfg/Application/Model/Exception/d3log_exception.php',
        'd3/modcfg/Application/Model/Exception/d3ParameterNotFoundException.php',
        'd3/modcfg/Application/Model/Exception/d3PreventExitException.php',
        'd3/modcfg/Application/Model/Exception/d3ShopCompatibilityAdapterException.php',

        'd3/modcfg/Application/Model/Filegenerator/d3filegenerator.php',
        'd3/modcfg/Application/Model/Filegenerator/d3filegeneratorcronsh.php',

        'd3/modcfg/Application/Model/Install/d3install.php',
        'd3/modcfg/Application/Model/Install/d3licenceserver.php',
        'd3/modcfg/Application/Model/Install/d3updateserver.php',
        'd3/modcfg/Application/Model/Install/d3install_updatebase.php',
        'd3/modcfg/Application/Model/Install/d3debughandler.php',
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

        'd3/modcfg/Application/Model/Log/d3LogInterface.php',
        'd3/modcfg/Application/Model/Log/d3LogLevel.php',
        'd3/modcfg/Application/Model/Log/d3log.php',
        'd3/modcfg/Application/Model/Log/d3NullLogger.php',

        'd3/modcfg/Application/Model/Maintenance/d3maintenanceactions.php',
        'd3/modcfg/Application/Model/Maintenance/d3clrtmp.php',

        'd3/modcfg/Application/Model/Modulemetadata/d3moduleconfiguration.php',

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
        'd3/modcfg/Application/Controller/Admin/TPLBlocks/d3tplblocks_base.php',

        'd3/modcfg/Modules/Application/Controller/d3_oxshopcontrol_modcfg_extension.php',
        'd3/modcfg/Modules/Application/Controller/Admin/d3_navigation_modcfgupdate.php',
        'd3/modcfg/Modules/Application/Model/d3_oxshop_modcfg.php',
        'd3/modcfg/Modules/Application/Model/d3_oxmoduleinstaller_activecheck.php',
        'd3/modcfg/Modules/Core/d3_oxtheme_modcfg.php',
        'd3/modcfg/Modules/Core/d3_oxutilsview_modcfg.php',

        'd3/modcfg/Tests/additional.inc.php',
        'd3/modcfg/Tests/additional_abstract.php',
        'd3/modcfg/Tests/d3EmptyTestCase.php',
        'd3/modcfg/Tests/d3modcfg_config.php',

        'd3/modcfg/Tests/unit/d3ModCfgUnitTestCase.php',
        'd3/modcfg/Tests/unit/d3FixHelper.php',
        'd3/modcfg/Tests/unit/Application/Model/d3bitmaskTest.php',
        'd3/modcfg/Tests/unit/Application/Model/d3bitTest.php',
        'd3/modcfg/Tests/unit/Application/Model/d3filesystemTest.php',
        'd3/modcfg/Tests/unit/Application/Model/d3UtilsTest.php',
        'd3/modcfg/Tests/unit/Application/Model/Configuration/d3_cfg_mod_licensecheckTest.php',
        'd3/modcfg/Tests/unit/Application/Model/Configuration/d3_cfg_modTest.php',
        'd3/modcfg/Tests/unit/Application/Model/Configuration/d3modprofileTest.php',
        'd3/modcfg/Tests/unit/Application/Model/DependencyInjectionContainer/d3DicHandlerTest.php',
        'd3/modcfg/Tests/unit/Application/Model/DependencyInjectionContainer/d3DicUtilitiesTest.php',

        'd3/modcfg/Tests/unit/Modules/Core/d3_oxutilsview_modcfgTest.php',
    ],
    'd3SetupClasses'    => [
        ModuleSetup\d3_cfg_mod_update::class,
        ModuleSetup\d3log_update::class,
    ],
    'd3DICDefinitionFiles'  => [
        'd3/modcfg/Config/services.yaml',
    ]
];
