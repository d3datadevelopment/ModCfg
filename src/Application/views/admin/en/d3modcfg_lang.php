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

$sLangName = "English";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                                  => 'UTF-8',
    'd3mxd3modules'                            => "<i class='fab fa-d3 d3fa-color-blue'></i> Module",
    'd3mxcfg'                                  => "<i class='fas fa-cogs'></i> Module Connector",
    'd3mxcfgmod_settings'                      => 'Settings',
    'd3mxextensions'                           => 'Module Administration',
    'd3tbclext_installation'                   => 'Module Installation',
    'd3tbclext_status'                         => 'installed modules',
    'd3tbclext_new'                            => 'available modules',
    'd3mxlibs'                                 => 'Libraries',
    'd3mxsysitems'                             => 'System Settings',
    'd3tbclmoditems'                           => 'Module items',
    'd3tbclcfgitems'                           => 'Config items',
    'd3tbclmaintenance'                        => 'maintenance',
    'd3tbclcfglibs'                            => 'Library settings',
    'd3tbcllib_status'                         => 'Status',
    'd3tbcllib_syscheck'                       => 'System Check',
    'd3tbcllib_support'                        => 'Support',

    'D3MODCFG_LIB_TRANSL'                      => 'Module Connector',
    'D3MODCFG_LIB_HELPLINK'                    => 'Modul-Connector/',

    'D3MODCFG_LIB_HELPLINK_STATUS'             => 'Update/',
    'D3MODCFG_LIB_HELPLINK_SUPPORT'            => 'Support/',
    'D3MODCFG_EXT_HELPLINK_STATUS'             => 'Extensions/',
    'D3MODCFG_EXT_HELPLINK_SUPPORT'            => 'Support/',

    'D3_MOD_LIB_INSTALLED'                     => 'installed libraries',
    'D3_MOD_EXT_INSTALLED'                     => 'installed modules',
    'D3_MOD_EXT_AVAILABLE'                     => 'available modules',
    'D3_CFG_LIB_GETLIBLIST'                    => 'check for available version',
    'D3_CFG_LIB_GETDETAILS'                    => 'show details / settings',
    'D3_CFG_LIB_GETNEWLIBLIST'                 => 'check for available version',
    'D3_CFG_LIB_CONNECTERROR'                  => 'Unable to connect with the connector update tool.\n\nPlease assure, that curl connections or serverspanned file connections are possible.',
    'D3_CFG_LIB_VERSION'                       => 'version',
    'D3_CFG_LIB_REVISION'                      => 'rev.',
    'D3_CFG_LIB_SHOPVERSION'                   => 'for shop version',
    'D3_CFG_LIB_INSTALLDATE'                   => 'installed at',
    'D3_CFG_LIB_NOTINSTALLED'                  => 'not installed',
    'D3_CFG_LIB_INSTALLED'                     => 'installed version',
    'D3_CFG_LIB_INSTALLEDVERSIONNOTCONGRUENT'  => 'The version declaration of the module aren\'t congruently. Maybe the installation isn\'t correct.',
    'D3_CFG_LIB_AVAILABLE'                     => 'available version',
    'D3_MOD_LIB_AVAIL_REMOTELIBS'              => 'available library',
    'D3_MOD_LIB_NOACTION'                      => 'no update required',
    'D3_MOD_LIB_INSTALL'                       => 'install module',
    'D3_MOD_LIB_REFRESH'                       => 'refresh module',
    'D3_MOD_EXT_REFRESH'                       => 'There\'s an update available for this module',
    'D3_MOD_LIB_NOUPDATEINFO'                  => 'no update informations available for this module',
    'D3_MOD_LIB_NODOWNLOAD'                    => 'no download available for this module',
    'D3_MOD_LIB_NOINSTALL'                     => 'no installation available for this module',
    'D3_MOD_LIB_OVERWRITE'                     => 'renew',
    'D3_MOD_LIB_DOWNLOAD'                      => 'download as file',
    'D3_MOD_LIB_BETA'                          => '(beta)',
    'D3_CFG_LIB_VERSIONUNKNOWN'                => 'unknown',
    'D3_CFG_LIB_FORMERVERSION'                 => 'last version',
    'D3_CFG_LIB_USEABLETO'                     => 'checked to shop',
    'D3_CFG_LIB_STATUS'                        => 'status',
    'D3_CFG_LIB_LIBRARY'                       => 'library',
    'D3_CFG_LIB_EXTENSION'                     => 'module',
    'D3_CFG_LIB_INFO'                          => 'info',
    'D3_CFG_LIB_INSTALLATION'                  => 'install.',
    'D3_CFG_LIB_DOWNLOADIT'                    => 'downl.',
    'D3_CFG_LIB_UPDATE'                        => 'update',
    'D3_CFG_LIB_MAINTENANCEMODE'               => 'Due to maintenance and update work, the update is unfortunately not available for a short time. Please try again later. Thank you for your appreciation.',
    'D3_CFG_LIB_NOINSTALLNOTICE'               => 'The used version of the module connector has been specially prepared. If you use this interface to update the connector, your files will be overwritten. Therefore, we strongly advise against an automatic update. \n\nIf you want to update the connector, please ask your supplier for a new individual version for you. \n\nYour D³ Data Development Team.',
    'D3_CFG_LIB_DOWNLOAD_UNAVAILABLE'          => 'The download is unavailable because of technical reasons. Please contact us.',

    'd3tbcl_licence'                           => 'Support',
    'D3_CFG_MOD_LIST_SETTLANG'                 => 'settings for language',

    'D3_CFG_MOD_GENERAL_MODULEACTIVE'          => 'module active',
    'D3_CFG_MOD_GENERAL_MODULEACTIVE_DESC'     => 'In contrast to shops own module registration provides this option, that module can set inoperable without deinstallation.',
    'D3_CFG_MOD_GENERAL_DEBUGACTIVE'           => 'debug active',
    'D3_CFG_MOD_GENERAL_DEBUGACTIVE_DESC'      => 'Activate the debug mode with the switch. This usually offers help with module development and troubleshooting. Which functions are available in detail with the debug mode may be found in the module documentation or may be explained to you by the module author. Be sure to disable the debug mode for live operation.',
    'D3_CFG_MOD_GENERAL_TESTMODEACTIVE'        => 'test mode active',
    'D3_CFG_MOD_GENERAL_TESTMODEACTIVE_DESC'   => 'The test mode provides the function of the module in testable version in the usual sense. Depending on the module, this may be that e.g. Actions can not be performed live or other credentials are used. For more information on the scope of the test mode, please contact the module author. Please deactivate the test mode for live operation.',
    'D3_CFG_MOD_GENERAL_MODULELOGGING'         => 'logging',
    'D3_CFG_MOD_GENERAL_MODULELOGGING_NONE'    => 'no protocoll (standard)',
    'D3_CFG_MOD_GENERAL_MODULELOGGING_ALL'     => 'log all actions ',
    'D3_CFG_MOD_GENERAL_MODULELOGGING_ERRORS'  => 'log errors only',
    'D3_CFG_MOD_GENERAL_NOCONFIG_DESC'         => 'There is no configuration available for these language.',
    'D3_CFG_MOD_GENERAL_NOCONFIG_BTN'          => 'Create configuration',
    'D3_CFG_MOD_GENERAL_SAVE'                  => 'Save',
    'D3_CFG_MOD_GENERAL_CLRTMP'                => 'Please clear the tmp folder.',

    'D3_CFG_MOD'                               => 'Support',
    'D3_CFG_MOD_VERSION'                       => 'Version',
    'D3_CFG_MOD_VERSION_TEXT1'                 => 'Module "',
    'D3_CFG_MOD_VERSION_TEXT2'                 => '", for OXID eShop',
    'D3_CFG_MOD_VERSION_INSTALLEDV'            => 'Installed module version:',
    'D3_CFG_MOD_VERSION_RESULT'                => 'Result from update check:',
    'D3_CFG_MOD_VERSION_AVAILVERSION'          => 'Available module version for your shop:',
    'D3_CFG_MOD_VERSION_NEWESTVERSION'         => 'Newest module version:',
    'D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_1'  => 'This module version is available, but it\'s not released for your used shop version. Please update your shop installation first at least to version ',
    'D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_2'  => ', to be able to use this module version.',
    'D3_CFG_MOD_VERSION_NEWESTVERSION_LIC'     => 'This module version isn\'t contained  in your license key. Please contact us for extending your license.',
    'D3_CFG_MOD_VERSION_MODINFO'               => 'Further informations you can see here.',
    'D3_CFG_MOD_VERSION_REV'                   => 'Rev.',
    'D3_CFG_MOD_VERSION_UPDLOAD1'              => 'You can get download this update',
    'D3_CFG_MOD_VERSION_UPDLOAD2'              => 'HERE',
    'D3_CFG_MOD_VERSION_UPDLOAD3'              => '',
    'D3_CFG_MOD_VERSION_UPDLOAD4'              => ' or ',
    'D3_CFG_MOD_VERSION_UPDLOAD5'              => 'install it automatical',
    'D3_CFG_MOD_VERSION_CHECKTXT'              => 'Check, if you use the latest release of these moduls.',
    'D3_CFG_MOD_VERSION_STARTCHECK'            => 'Check for newer release',
    'D3_CFG_MOD_VERSION_NONEWVERSION'          => 'There are no newer version for your shop available.',
    'D3_CFG_MOD_VERSION_INSTALLSTATUS'         => 'Installation progress',
    'D3_CFG_MOD_VERSION_AVAILLIST'             => 'Further availability informations of ouf modules in different shop versions can you see in our <a href="http://www.oxidmodule.com/Modulverfuegbarkeiten/" target="modverf">overview</a>.',

    'D3_CFG_MOD_SUPPORT'                       => 'Support',
    'D3_CFG_MOD_SUPPORT_1'                     => 'If you have questions or suggestions, we are at your disposal with the following contact options:',
    'D3_CFG_MOD_SUPPORT_2'                     => 'Phone: +49 (0)3721 268090',
    'D3_CFG_MOD_SUPPORT_3'                     => 'Fax: +49 (0)3721 265234',
    'D3_CFG_MOD_SUPPORT_4'                     => 'E-Mail:',
    'D3_CFG_MOD_SUPPORT_MAIL'                  => 'support@shopmodule.com',
    'D3_CFG_MOD_SUPPORT_5'                     => 'The most common questions about this and other modules have been compiled in our online FAQ. These can be found at <a href="https://faq.d3data.de" target="_blank" alt="Modul-FAQ"> http://faq.oxidmodule.de </a>.',
    'D3_CFG_MOD_SUPPORT_6'                     => 'Our FAQ is constantly expanding. Gladly we take also from you desired answers on. Write us!',

    'D3_CFG_MOD_DEV'                           => 'Disclaimer',
    'D3_CFG_MOD_DEV_TEXT1'                     => 'This module is developed and distributed by:',
    'D3_CFG_MOD_DEV_ADR1'                      => 'Fa. D³ Data Development',
    'D3_CFG_MOD_DEV_ADR2'                      => 'Owner: Thomas Dartsch',
    'D3_CFG_MOD_DEV_ADR3'                      => 'Stollberger Straße 23',
    'D3_CFG_MOD_DEV_ADR4'                      => '09380 Thalheim / Erzgeb.',
    'D3_CFG_MOD_DEV_ADR5'                      => 'Germany',
    'D3_CFG_MOD_DEV_WEBLINK'                   => 'Homepage: <a href="http://www.shopmodule.com/" target="_blank" alt="D³ Data Development">http://www.shopmodule.com</a>',
    'D3_CFG_MOD_DEV_MAILLINK'                  => 'E-Mail:<a href="mailto:info@shopmodule.com" alt="info@shopmodule.com">info@shopmodule.com</a>',
    'D3_CFG_MOD_DEV_MODULELINK'                => 'An overview of all our modules can be found at <a href="http://www.oxidmodule.de/" target="_blank" alt="D³ Data Development"><strong>http://www.oxidmodule.de</strong></a>',

    'D3_CFG_MOD_CHANGEKEY'                     => 'change license key',
    'D3_CFG_MOD_ADDKEY'                        => 'activate license',
    'D3_CFG_MOD_SHOWKEY'                       => 'show license details',
    'D3_CFG_MOD_ACTIVATE'                      => 'activation',
    'D3_CFG_MOD_ACTIVATE_1'                    => 'license activation:',
    'D3_CFG_MOD_ACTIVATE_2'                    => 'save license key',
    'D3_CFG_MOD_LICDETAILS'                    => 'license details',
    'D3_CFG_MOD_LICDETAILS_GENERALVALID'       => 'license valid:',
    'D3_CFG_MOD_LICDETAILS_VALIDDOMAIN'        => 'valid for domain:',
    'D3_CFG_MOD_LICDETAILS_VALIDLOCAL'         => 'usable in local test shop:',
    'D3_CFG_MOD_LICDETAILS_VALID_YES'          => 'yes',
    'D3_CFG_MOD_LICDETAILS_VALIDLOCAL_DESC'    => "The module can be used in addition to the licensed domain under the IP \"127.0.0.1\" or \":: 1\" or the domain \"localhost\" as a test installation. If you can not use the options for technical reasons, just set up the licensed domain on your host.",
    'D3_CFG_MOD_LICDETAILS_VALIDFROMDATE'      => 'valid from:',
    'D3_CFG_MOD_LICDETAILS_VALIDTODATE'        => 'valid to:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORMODID'      => 'valid for:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORMODVERSION' => 'module version:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORSHOPID'     => 'shop id:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORSHOPEDITION'=> 'shop edition:',
    'D3_CFG_MOD_LICDETAILS_ISTEST'             => 'trial version:',
    'D3_CFG_MOD_LICDETAILS_LICKEY'             => 'license key:',
    'D3_CFG_MOD_LICDETAILS_TESTLICENSE'        => '(trial license)',

    'D3_CFG_MOD_TRYORBUY'                      => 'Try or buy?',
    'D3_CFG_MOD_TRYORBUY_1'                    => 'Request demo key',
    'D3_CFG_MOD_TRYORBUY_2'                    => 'Request live key',

    'D3_CFG_MOD_STAYINFORMED'                  => 'Stay informed!',
    'D3_CFG_MOD_STAYINFORMED_1'                => 'I would like to automatically receive information about new updates to this module.',
    'D3_CFG_MOD_STAYINFORMED_2'                => 'E-mail address:',
    'D3_CFG_MOD_SAVE'                          => 'Save',

    'D3_CFG_MOD_SYS_CHECK'                     => 'System check',
    'D3_CFG_MOD_SYS_CURLNOK'                   => 'The CURL PHP extension is not available. Some modules require this. Details can be found in the respective module descriptions.',
    'D3_CFG_MOD_SYS_CURLOK'                    => 'Die CURL PHP extension is available.',
    'D3_CFG_MOD_SYS_CURLREQ'                   => 'The CURL PHP extension is not available. However, this module necessarily requires them. Enable the extension to allow the module to function properly.',
    'D3_CFG_MOD_NEWVERSION_1'                  => 'There is a new version available: ',
    'D3_CFG_MOD_NEWVERSION_2'                  => 'Download this one here: ',
    'D3_CFG_MOD_NEWVERSION_3'                  => 'or contact us for the installation of the update.',
    'D3_CFG_MOD_NEWVERSION_4'                  => 'There is no new version available.',

    'D3_CFG_MOD_INSTALLCHECK'                  => 'Module check',
    'D3_CFG_MOD_INSTALLCHECKEXTENDITEMSOK'     => 'All extension entries are active.',
    'D3_CFG_MOD_INSTALLCHECKEXTENDITEMSNOK'    => 'At least one extension entry is not active.',
    'D3_CFG_MOD_INSTALLCHECKEXTENDITEMS_DESC'  => 'In default case, our modules extend the standard functionality of the shop. For this it is necessary that the extensions are registered correctly. If these are missing, the module-specific functions can not be executed.',
    'D3_CFG_MOD_INSTALLCHECKTEMPLATEITEMSOK'   => 'All template entries are active.',
    'D3_CFG_MOD_INSTALLCHECKTEMPLATEITEMSNOK'  => 'At least one template entry is not active.',
    'D3_CFG_MOD_INSTALLCHECKTEMPLATEITEMS_DESC'  => 'For the presentation of own areas our modules use own templates. Only when they are available can the areas be displayed correctly.',
    'D3_CFG_MOD_INSTALLCHECKCLASSITEMSOK'     => 'All file entries are active.',
    'D3_CFG_MOD_INSTALLCHECKCLASSITEMSNOK'    => 'At least one file entry is not active.',
    'D3_CFG_MOD_INSTALLCHECKCLASSITEMS_DESC'  => 'The module-specific logic requires registered script files. If these are missing, the module can not work. Then activate the module again.',
    'D3_CFG_MOD_INSTALLCHECKBLOCKITEMSOK'      => 'All template block extensions are active.',
    'D3_CFG_MOD_INSTALLCHECKBLOCKITEMSNOK'     => 'At least one template block extension is not active.',
    'D3_CFG_MOD_INSTALLCHECKBLOCKITEMS_DESC'   => 'With template block extensions, the outputs of the shop can be adapted to the module without or with only minor adjustments. If not all supplied template block extensions are activated, module outputs may not be displayed.',
    'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALSOK'     => 'The module versions match.',
    'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALSNOK'    => 'The module versions between Metadata and Connector are different.',
    'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_DESC'  => 'Matching module versions are important to ensure proper functioning of the module. If the module versions are different, please check if you have installed the correct module files.',
    'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_MDV'   => 'Metadata version:',
    'D3_CFG_MOD_INSTALLCHECKVERSIONIDENTICALS_MCV'   => 'ModCfg version:',
    'D3_CFG_MOD_INSTALLCHECKINSTALLITEMSOK'    => 'The installation tasks are completed.',
    'D3_CFG_MOD_INSTALLCHECKINSTALLITEMSNOK'   => 'There are still installation tasks to be done.',
    'D3_CFG_MOD_INSTALLCHECKINSTALLITEMS_DESC'  => 'Our modules contain instructions for an automatic installation. These steps are typically performed immediately after module installation / update. If the installation could not be executed completely, shop configurations might be missing. Check the pending installation steps in the admin area under "Module Connector -> Module Management -> Module Installation".',
    'D3_CFG_MOD_INSTALLCHECK_PROBLEM'             => 'The module found installation issues that should be resolved before use. For more information, see the Support tab.',
    'D3_CFG_MOD_INSTALL_MODCFGCHECK'              => 'Installing the module "%s" requires the module connector in version "%s". Please carry out the update in advance. '.PHP_EOL.PHP_EOL.'During the selected time, you will not receive update notices and will be able to perform the software update. To finish the updates, re-enter this page after the time has expired.',

    'D3_CFG_MOD_NEWS_NEWS'                     => 'News and updates',
    'D3_CFG_MOD_NEWS_FURTHER1'                 => 'These and more information can be found in our Oxide Modules blog at',
    'D3_CFG_MOD_NEWS_FURTHER2'                 => 'For up-to-date information about us and our modules, visit our Oxide Modules blog at',

    'D3_CFG_MODITEM_NEWITEMS'                  => 'New items',
    'D3_CFG_MODITEM_PREV'                      => '<b>Editor</b> (Click on the entry for further options)',
    'D3_CFG_MODITEM_PREVIEW'                   => 'generate preview',
    'D3_CFG_MODITEM_SAVE'                      => 'save (and backup) module list',
    'D3_CFG_MODITEM_ACTIONFOR'                 => 'action for',
    'D3_CFG_MODITEM_DEACTIVE'                  => 'deactivate',
    'D3_CFG_MODITEM_DEACTIVEALLCLASS'          => 'deactivate all items of this class',
    'D3_CFG_MODITEM_ACTIVE'                    => 'activate',
    'D3_CFG_MODITEM_ACTIVEALLCLASS'            => 'activate all items of this class',
    'D3_CFG_MODITEM_ACTIVEALLMOD'              => 'activate all items of this module',
    'D3_CFG_MODITEM_DEACTIVEALLMOD'            => 'deactivate all items of this module',
    'D3_CFG_MODITEM_DELETE'                    => 'delete',
    'D3_CFG_MODITEM_DELMSG'                    => 'Do you really want to delete the module entry?',
    'D3_CFG_MODITEM_TOFIRST'                   => 'to front',
    'D3_CFG_MODITEM_TOLAST'                    => 'to back',
    'D3_CFG_MODITEM_CANCEL'                    => 'cancel',
    'D3_CFG_MODITEM_LEGEND'                    => 'Legend',
    'D3_CFG_MODITEM_LEGEND_EXISTS'             => 'module or class exist',
    'D3_CFG_MODITEM_LEGEND_NOTEXISTS'          => 'module or class couldn\'t loaded',
    'D3_CFG_MODITEM_LEGEND_INACTIVE'           => 'existing module or class is inactive',
    'D3_CFG_MODITEM_LEGEND_NEW'                => 'new module',
    'D3_CFG_MODITEM_LEGEND_NEWPROBLEM'         => 'new module, but has to check',

    'D3_CFG_CFGITEM_WRITEPROTECTED'            => '- write proteced',
    'D3_CFG_CFGITEM_NOTWRITEPROTECTED'         => '- not write protected',
    'D3_CFG_CFGITEM_EDITABLE'                  => '- editable ',
    'D3_CFG_CFGITEM_EDITABLE_QUESTION'         => 'CAUTION!\\n\\nChanges in this file can be harmful to the availability, functionality and security of this online shop. You should only continue if you are sure of what you are doing.',
    'D3_CFG_CFGITEM_SAVE_QUESTION'             => 'Do you really wanna save the changes?',
    'D3_CFG_CFGITEM_SAVE'                      => 'Remove write protection temporary and save',
    'D3_CFG_CFGITEM_SAVEWOPROTECTION'          => 'save file',
    'D3_CFG_CFGITEM_EDIT'                      => 'edit file',
    'D3_CFG_CFGITEM_DEMOTEXT'                  => "\r\r// Da dies ein Demoshop ist, werden Ihnen die Dateiinhalte hier nicht angezeigt.\r// Because of demoshop mode you can\'t see the file content here.",

    'D3_CFG_MAINTENANCE_MODULES'               => "Modules",
    'D3_CFG_MAINTENANCE_REPAIRMODULES'         => "repair modules database items",

    'D3_CFG_CFGLIBS_CHOOSE'                    => 'Please choose library',
    'D3_CFG_CFGLIBS_NOLIBAVAIL'                => 'no library settings available',

    'D3_CFG_MODCFG_CFG_HIDEADMINHOMEINFO'      => '<b>Do not</b> show module information on the admin homepage.',
    'D3_CFG_MODCFG_CFG_HIDEEXTSUPPORTINFO'     => '<b>Do not</b> show D3 news on the module support pages',

    'SHOP_SYSTEM_MODULES'                      => 'Installed modules in your eShop, <br>convenient addition / editing in the <input type="button" onclick="document.getElementById(\'myedit\').target = \'basefrm\'; document.getElementById(\'myedit\').fnc.value=\'\';document.getElementById(\'myedit\').cl.value=\'d3moditems\';document.getElementById(\'myedit\').submit();" value="Modul-Connector">',
    'D3_CFG_MSG_NONEWITEM'                     => 'No new module entries available for saving',

    'D3_MOD_LIB_METADATA_AUTHOR'               => 'D³ Data Development',
    'D3_MOD_LIB_METADATA_LOGO'                 => '<img src="../modules/d3/modcfg/public/d3logo.php" alt="D³" title="D³ Data Development">',
    'D3_MOD_LIB_METADATA_SUPPORTMAIL'          => 'support@shopmodule.com',
    'D3_MOD_LIB_METADATA_INFOURL'              => 'http://www.oxidmodule.com/',

    'D3_CFG_MOD_EXC_MODCFGNOTCALLABLE'         => 'module configuration is unavailable, because of (uncheckable) database table',
    'D3_CFG_MOD_EXC_NOMODCFGITEM'              => 'no modcfg item for this id available [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/keine-Modulkonfiguration-fuer-diese-ID-vorhanden.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_LICENSERESULT'             => 'license result is: %s [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Lizenzpruefung-ergibt.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_NOCONFKEY'                 => 'no conf key available [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/keine-Basiskonfiguration-fuer-das-Modul-vorhanden.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_UNKNOWNCONFKEY'            => 'conf key isn\'t conform (ModId, ModVersion) [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Basiskonfiguration-passt-nicht-zum-Modul-ModId-ModVersion.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_NOLICKEYFORCHECK'          => 'license key missing: license activation required [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/fehlender-Lizenzschluessel.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_NOCONFKEYID'               => 'can\'t read conf key [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Basiskonfiguration-kann-nicht-gelesen-werden.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_NOSERIALID'                => 'can\'t read license key [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Lizenzschluessel-kann-nicht-gelesen-werden.html" target="faq">more info</a>]',
    'D3_CFG_MOD_EXC_ACTIVATED'                 => 'This action also activated the module at the same time. Check the settings in the module-specific configuration area in the admin panel of your shop.',
    'D3_CFG_MOD_EXC_DEACTIVATED'               => 'In order to avoid errors in your shop, the module was also deactivated with this action. Please always edit this setting in the module-specific configuration area in the admin panel of your shop.',

    'D3_CFG_MOD_ACTIVATION_TYPE_HEADLINE'      => 'This wizard guides you through module activation. Please choose:',
    'D3_CFG_MOD_ACTIVATION_TYPE_OXIDMODULE'    => 'You have a license key or activation identifier',
    'D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN'       => 'You have already purchased the module from another vendor (for example, OXID Exchange)',
    'D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN_DESC'  => 'For all module purchases that have not been made through the Oxidmodule shop, it is necessary that we register your purchase. Only then is activation possible.',
    'D3_CFG_MOD_ACTIVATION_TYPE_DEMO'          => 'You would like to use the module free of charge as a trial version',
    'D3_CFG_MOD_ACTIVATION_TYPE_DEMO_DESC'     => 'The license for the trial version is valid for 30 days after activation. Thereafter, the module is automatically deactivated. Your shop will still be the same as before the activation.',
    'D3_CFG_MOD_ACTIVATION_TYPE_BUY'           => 'You want to buy the module',
    'D3_CFG_MOD_ACTIVATION_TYPE_BUY_DESC'      => 'You will be forwarded directly to our module shop. In the shop you can see details about this module and can also buy it. With immediately payable payment methods (for example Paypal or credit card) you will receive the activation ID immediately after.',
    'D3_CFG_MOD_ACTIVATION_TYPE_NOTLISTED'     => 'Your desired action is not listed here',
    'D3_CFG_MOD_ACTIVATION_DATA_HEADLINE'      => 'The following data is used and transmitted for the activation:',
    'D3_CFG_MOD_ACTIVATION_DATA_MODULE'        => 'Module:',
    'D3_CFG_MOD_ACTIVATION_DATA_MODULE_DESC'   => 'The module will be permanently noted in the future license. Therefore, please only use the activation ID of the corresponding module. Please note that your module purchase must also have been made for the right shop edition. Otherwise you can not activate this module. If you would like to activate the module for another module, please leave this assistant and call it in the module to be activated.',
    'D3_CFG_MOD_ACTIVATION_DATA_MODVERSION'    => 'Module version:',
    'D3_CFG_MOD_ACTIVATION_DATA_MODVERSION_DESC'=> 'The module version will be permanently noted in the future license. In addition to the expiration date, the module version decides which future updates / upgrades you can use with this license. If you are planning a module update at short notice, please clarify the procedure with us.',
    'D3_CFG_MOD_ACTIVATION_DATA_DOMAIN'        => 'Domain:',
    'D3_CFG_MOD_ACTIVATION_DATA_DOMAIN_DESC'   => 'The domain will be permanently noted in the future license. Decisive here is the main store domain, which is entered in the configuration file of the shop. Language and client-dependent domains and subdomains are not included in the license. If you would like to use this module in a shop under a different domain, please activate it only there.',
    'D3_CFG_MOD_ACTIVATION_DATA_SHOP'          => 'Subshop ID:',
    'D3_CFG_MOD_ACTIVATION_DATA_SHOP_DESC'     => 'The subshop ID will be permanently noted in the future license. The shop title will only be displayed informally. <br> For Shop Owners of the Enterprise Edition: If you would like to activate this module for another subshop, please change it and perform the activation only there.',
    'D3_CFG_MOD_ACTIVATION_DATA_EDITION'       => 'Shop edition:',
    'D3_CFG_MOD_ACTIVATION_DATA_EDITION_DESC'  => 'We need the shop edition to assign the right module to your activation.',
    'D3_CFG_MOD_ACTIVATION_DATA_VOUCHER'       => 'Activation ID / License key:',
    'D3_CFG_MOD_ACTIVATION_DATA_VOUCHER_DESC'  => 'You will receive the Ident or License key from us when you purchase your module in our shop or during manual registration.',
    'D3_CFG_MOD_ACTIVATION_DATA_DEMO_DESC'     => 'This trial license is valid for a maximum of 30 days. Thereafter, the module is automatically deactivated. Your shop will still be the same as before the activation.',
    'D3_CFG_MOD_ACTIVATION_FOREIGN_HEADLINE'   => 'Please contact us...',
    'D3_CFG_MOD_ACTIVATION_FOREIGN_DESC'       => 'Please send us your proof of purchase. (You will find our contact details in the "Support" tab above.) You will then receive from us the Ident with which you can activate your module via this assistant. If you already have the Ident, select the first item in the following selection.',
    'D3_CFG_MOD_ACTIVATION_BUY_HEADLINE'       => 'You would like to buy this module?',
    'D3_CFG_MOD_ACTIVATION_BUY_DESC_1'         => 'Via the following link you can visit our shop where you can order the module. If you choose an immediately payable payment method (for example, Paypal or credit card), you will receive the activation ID immediately after which you can complete the activation.<p style="text-align: center;"><a href="',
    'D3_CFG_MOD_ACTIVATION_BUY_DESC_2'         => '" style="font-weight: bold; text-decoration: underline;" target="oxidmodule">Oxidmodule Shop</a></p>Thank you for your order. If you have received an Activation ID when you have completed your order, you should choose the first item in the following selection.',
    'D3_CFG_MOD_ACTIVATION_NOTLISTED_HEADLINE' => 'Please contact us...',
    'D3_CFG_MOD_ACTIVATION_NOTLISTED_DESC'     => 'Our contact details can be found in the "Support" tab above. We gladly accept your request personally. <br> If we might not be available, it may help you to activate the module in advance as a trial version.',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_NEXT'        => 'Continue',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_ACTNOW'      => 'Activate module now',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_BACK'        => 'Back to overview',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SERIAL'      => 'Replace license key now',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SETDEMO'     => 'Activate trial version now',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_HL'  => 'The activation was successful.',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_NOEXP' => 'The module license is valid unlimited ',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_1'   => 'The module license is valid until ',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_2'   => ' and has already been deposited at the module. Please copy the license key for your documents. We wish you a lot of success with the module.',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_NSUCCESS_HL' => 'The activation could not be done unfortunately.',
    'D3_CFG_MOD_ACTIVATION_ERRMISSINGPARAMS'   => 'The license key can not be retrieved due to missing information. Please contact us. Our contact details can be found in the "Support" tab above.',
    'D3_CFG_MOD_ACTIVATION_ERRUNKNOWNMODULE'   => 'The module is not (yet) activatable in this version. Please contact us. Our contact details can be found in the "Support" tab above.',
    'D3_CFG_MOD_ACTIVATION_ERRTOMUCHTESTLIC'   => 'Trial versions have already been created for this module in this shop. For a new module test, please contact us. Our contact details can be found in the "Support" tab above.',
    'D3_CFG_MOD_ACTIVATION_ERRNOORDER'         => 'No suitable order or module could be found for your activation ID. Activate the module only with the corresponding Ident.',
    'D3_CFG_MOD_ACTIVATION_ERRWRONGEDITION'    => 'The purchased module can not be activated and operated under this shop edition. Please contact us.',
    'D3_CFG_MOD_ACTIVATION_ERRDIFFERENTSHOPS'  => 'You received several Activation Ident for the module. These are necessary for different subshops, for example. One of these idents has already been activated in another shop installation. If you would like to use this module in different shops, please contact us.',
    'D3_CFG_MOD_ACTIVATION_SAVESERIALSUCC'     => 'The license key was successfully entered. We wish you a lot of success with the module.',

    'D3_CFG_MOD_NOTACTIVE'                     => 'The module is not active. Check the settings in the module management.',

    'D3_CFG_MOD_STATUS_OK'                     => 'The license key is valid.',
    'D3_CFG_MOD_STATUS_TMINUS'                 => 'The license is only valid in the future.',
    'D3_CFG_MOD_STATUS_EXPIRED'                => 'The license has expired.',
    'D3_CFG_MOD_STATUS_EXPIRES_IN'             => 'The license key expires in %s.',
    'D3_CFG_MOD_STATUS_NEVER_EXPIRES'          => 'The license doesn\'t expires.',
    'D3_CFG_MOD_STATUS_ILLEGAL'                => 'The license isn\'t valid. Maybe it was created for another domain.',
    'D3_CFG_MOD_STATUS_ILLEGAL_LOCAL'          => 'The license was not created for local use.',
    'D3_CFG_MOD_STATUS_INVALID'                => 'The license key isn\'t readable.',
    'D3_CFG_MOD_STATUS_WRONG_MODULE'           => 'The license is not intended for this module.',
    'D3_CFG_MOD_STATUS_WRONG_MODVERSION'       => 'The license is not intended for this module version.',
    'D3_CFG_MOD_STATUS_WRONG_SHOPID'           => 'The license is not activated for this subshop.',
    'D3_CFG_MOD_STATUS_WRONG_SHOPEDITION'      => 'The license is not activated for this shop edition.',
    'D3_CFG_MOD_STATUS_EMPTY'                  => 'The license contains no information.',
    'D3_CFG_MOD_STATUS_CORRUPT'                => 'The license was not created by the authenticated author.',
    'D3_CFG_MOD_STATUS_404'                    => 'The license is not available.',

    'D3_CFG_MOD_NEVER'                         => 'never',
    'D3_CFG_MOD_SECOND'                        => 'second',
    'D3_CFG_MOD_SECONDS'                       => 'seconds',
    'D3_CFG_MOD_MINUTE'                        => 'minute',
    'D3_CFG_MOD_MINUTES'                       => 'minutes',
    'D3_CFG_MOD_HOUR'                          => 'hour',
    'D3_CFG_MOD_HOURS'                         => 'hours',
    'D3_CFG_MOD_DAY'                           => 'day',
    'D3_CFG_MOD_DAYS'                          => 'days',
    'D3_CFG_MOD_MONTH'                         => 'month',
    'D3_CFG_MOD_MONTHS'                        => 'months',
    'D3_CFG_MOD_YEAR'                          => 'year',
    'D3_CFG_MOD_YEARS'                         => 'years',

    'D3_MODPROFILE_MAIN_ACTIVE'                => 'active',
    'D3_MODPROFILE_MAIN_ACTIVE_DESC'           => '',
    'D3_MODPROFILE_MAIN_ACTIVFROMTILL'         => 'or active',
    'D3_MODPROFILE_MAIN_ACTIVEFROM'            => 'from',
    'D3_MODPROFILE_MAIN_ACTIVETO'              => 'to',
    'D3_MODPROFILE_MAIN_TITLE'                 => 'title',
    'D3_MODPROFILE_MAIN_SHORTDESC'             => 'short description',
    'D3_MODPROFILE_MAIN_NOFOLDER'              => 'no folder selected',
    'D3_GENERAL_MODPROFILE_TITLE'              => 'title',
    'D3_GENERAL_MODPROFILE_FOLDER'             => 'folder',
    'D3_GENERAL_MODPROFILE_SORT'               => 'sort',
    'D3_GENERAL_MODPROFILE_SAVE'               => 'save',
    'D3_GENERAL_MODPROFILE_COPY'               => 'create identical copy',
    'D3_GENERAL_MODPROFILE_EXPORT'             => 'export profile as SQL',
    'D3_MODPROFILE_MAIN_SORT'                  => 'sort',
    'D3_MODPROFILE_MAIN_FOLDER'                => 'folder',
    'D3_MODPROFILE_FOLDER_ALL'                 => 'no folder selected',
    'D3_GENERAL_MODPROFILE_COPY_PREFIX'        => 'copy from ',

    'D3_SHGENERATOR_CRON_PROFIHOST_PHP56'      => 'Profihost (PHP 5.6)',
    'D3_SHGENERATOR_CRON_PROFIHOST_PHP70'      => 'Profihost (PHP 7.0)',
    'D3_SHGENERATOR_CRON_PROFIHOST_PHP71'      => 'Profihost (PHP 7.1)',
    'D3_SHGENERATOR_CRON_PROFIHOST_PHP72'      => 'Profihost (PHP 7.2)',
    'D3_SHGENERATOR_CRON_HETZNER_PHP56_CGI'    => 'Hetzner (PHP 5.6 CGI)',
    'D3_SHGENERATOR_CRON_HETZNER_PHP70_CGI'    => 'Hetzner (PHP 7.0 CGI)',
    'D3_SHGENERATOR_CRON_HETZNER_PHP56_CLI'    => 'Hetzner (PHP 5.6 CLI)',
    'D3_SHGENERATOR_CRON_HETZNER_PHP70_CLI'    => 'Hetzner (PHP 7.0 CLI)',
    'D3_SHGENERATOR_CRON_DOMAINFACTORY_PHP56'  => 'Domainfactory (PHP 5.6)',
    'D3_SHGENERATOR_CRON_DOMAINFACTORY_PHP70'  => 'Domainfactory (PHP 7.0)',
    'D3_SHGENERATOR_CRON_MITTWALD'             => 'Mittwald',
    'D3_SHGENERATOR_CRON_STANDARD'             => 'Linux standard installation',

    'D3_SHGENERATOR_CRON_SHGENERATOR'          => 'create shell script for cronjob setup',
    'D3_SHGENERATOR_CRON_SHGENERATOR_DESC'     => 'Depending on the server, it may be that calls with parameters can not be entered directly in the cronjob. You may also need to pass additional parameters for the cron job. Alternatively, you can use a script that contains all the required data. You will find already prepared scripts for the most common providers. If your provider is not listed, use the "Default" entry. Please clarify in case of uncertainty with your provider, if the generated script can be used. Details about the content of the script and its use can be provided by your server provider.',
    'D3_SHGENERATOR_CRON_SHGENERATOR_GENERATE' => 'generate file',

    'd3mxtplblocks'                            => "<i class='fab fa-d3 d3fa-color-blue'></i> tpl blocks",
    'd3mxtplblocks_main'                       => 'Main',
    'd3mxtplblocks_extend'                     => 'Extended',
    'D3TPLMODULE'                              => 'Module ID',
    'D3TPLTHEME'                               => 'Theme',
    'D3TPLTEMPLATE'                            => 'Template',
    'D3TPLBLOCKNAME'                           => 'Block name',
    'D3TPLFILE'                                => 'File name',
    'D3TPLPOS'                                 => 'Pos.',
    'D3TPLBLOCKS_MAIN_NEWBLOCK'                => 'new template block',
    'D3TPLBLOCKS_MOVEFIRST'                    => 'putting before all other extensions of this block',
    'D3TPLBLOCKS_MOVEFIRST_SUCC'               => 'Please empty the TMP folder to apply the change.',
);