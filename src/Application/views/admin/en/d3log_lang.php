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

$sLangName = "English";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                               => 'UTF-8',
    'd3mxlog'                               => 'Logging',
    'd3mxlog_main'                          => 'Analysis',
    'd3tbcllog_main'                        => 'Details / Export',
    'd3tbcllog_cleanup'                     => 'Service',

    'D3LOG_LIB_TRANSL'                      => 'Logging',
    'D3LOG_LIB_HELPLINK'                    => 'Modul-Connector/Logging/',

    'D3_CFG_LOG_LOGTYPE'                    => 'priority',
    'D3_CFG_LOG_TIME'                       => 'time',
    'D3_CFG_LOG_COUNTER'                    => 'counter',
    'D3_CFG_LOG_MODULE'                     => 'module',
    'D3_CFG_LOG_TEXT'                       => 'recorded data',
    'D3_CFG_LOG_SESSID'                     => 'session ID',
    'D3_CFG_LOG_ACTION'                     => 'action',
    'D3_CFG_LOG_CLASS'                      => 'class',
    'D3_CFG_LOG_FUNCTION'                   => 'method name',
    'D3_CFG_LOG_LINE'                       => 'line',
    'D3_CFG_LOG_WRAP'                       => 'no line wrap',
    'D3_CFG_LOG_ACTITEMS_MODULES'           => '<b>At the moment you only see the log entries of the module "%s". To see all log entries, to export or delete them, please use the view under "Module-Connector => Logging"</b><br><br>',
    'D3_CFG_LOG_ACTITEMS'                   => 'Currently there are ',
    'D3_CFG_LOG_ACTITEMS1'                  => ' entries stored in the D3 log.',
    'D3_CFG_LOG_ACTITEMS2'                  => ' entries stored in the D3 log. Deactivate unnecessary log settings or delete the entries.',
    'D3_CFG_CLEAN_DEL1'                     => 'Delete all entries with the following conditions:',
    'D3_CFG_CLEAN_DEL_MODULE'               => 'Module',
    'D3_CFG_CLEAN_DEL_MODULE_ALL'           => 'Entries of all modules',
    'D3_CFG_CLEAN_DEL_FROMTIME'             => 'Entries from date',
    'D3_CFG_CLEAN_DEL_TOTIME'               => 'Entries until date',
    'D3_CFG_CLEAN_DEL_TYPE'                 => 'Priority',
    'D3_CFG_CLEAN_DEL_TYPE_ALL'             => 'Entries of all priorities',
    'D3_CFG_CLEAN_DELETE'                   => 'Delete',
    'D3_CFG_EXPORT_SHOWDIALOG'              => 'show export form',
    'D3_CFG_EXPORT_EXP1'                    => 'Export all entries with the following conditions:',
    'D3_CFG_EXPORT_EXP_MODULE'              => 'Module',
    'D3_CFG_EXPORT_EXP_MODULE_ALL'          => 'Entries of all modules',
    'D3_CFG_EXPORT_EXP_MODULE_DEF'          => 'Entries of the module "%1$s"',
    'D3_CFG_EXPORT_EXP_TIME'                => 'Entries from date',
    'D3_CFG_EXPORT_EXP_SESSID'              => 'Entries of this session (optional)',
    'D3_CFG_EXPORT_EXP_CLASS'               => 'Entries of this class',
    'D3_CFG_EXPORT_EXP_CLASS_ALL'           => 'Entries of all classes',
    'D3_CFG_EXPORT_SQL'                     => 'Export as SQL',
    'D3_CFG_EXPORT_CSV'                     => 'Export as CSV',
    'D3_CFG_EXPORT_FILEMESSAGE'             => 'Exported to:',
    'D3_CFG_EXPORT_MAILMESSAGE'             => 'and sent by mail',
    'D3_CFG_EXPORT_EXP_MAIL'                => 'send to e-mail address (optional):',
    'D3_LOG_MAIL_SUBJECT'                   => 'log data',
    'D3_LOG_MAIL_NOTSEND'                   => 'Mail could not be sent. File to send: %s',

    'D3_CFG_FIELDTITLE_OXID'                => 'internal ID',
    'D3_CFG_FIELDTITLE_OXSHOPID'            => 'Shop ID',
    'D3_CFG_FIELDTITLE_OXSESSID'            => 'Session ID',
    'D3_CFG_FIELDTITLE_OXLOGTYPE'           => 'Priority',
    'D3_CFG_FIELDTITLE_OXCOUNTER'           => 'Counter',
    'D3_CFG_FIELDTITLE_OXTIME'              => 'Time',
    'D3_CFG_FIELDTITLE_OXMODID'             => 'Module ID',
    'D3_CFG_FIELDTITLE_OXCLASS'             => 'Class name',
    'D3_CFG_FIELDTITLE_OXFNC'               => 'Function name',
    'D3_CFG_FIELDTITLE_OXLINE'              => 'Line number',
    'D3_CFG_FIELDTITLE_OXACTION'            => 'Action',
    'D3_CFG_FIELDTITLE_OXTEXT'              => 'Log text',
    'D3_CFG_FIELDTITLE_OXTIMESTAMP'         => 'Time stamp',
    'D3_CFG_FIELDTITLE_OXPROFILEID'         => 'Profile ID',

    'D3_LOG_CFG_USEEXTLOG'                  => 'use advanced logging settings',
    'D3_LOG_CFG_EXTENDED_LOGGING_HELP'      => 'The shop operator usually selects combined log groups. With this option, each log mode can be set individually.',
    'D3_LOG_CFG_ENABLE_ERR_REPORT'          => 'Write ErrorReporting to internal log',
    'D3_LOG_CFG_ENABLE_ERR_REPORT_HELP'     => 'In normal operation, PHP messages are not output for security reasons. With this setting messages are transferred to the internal log. This setting has no effect on the output of this data on the screen.',
    'D3_LOG_CFG_ENABLE_EXC_REPORT'          => 'Write exceptions to internal log',
    'D3_LOG_CFG_ENABLE_EXC_REPORT_HELP'     => 'Exceptions are stored in the EXCEPTION_LOG.txt. For easier evaluation, you can also log these in the internal log as well. <br> All general exceptions that are intercepted via oxshopcontrol::process() are logged. Exceptions to the module connector are logged based on its log settings. Exceptions that are intercepted elsewhere can not be made accessible to the log.',
    'D3_LOG_CFG_ENABLE_ADMINPROFILING'      => 'Show profiling in the admin area too',
    'D3_LOG_CFG_ENABLE_ADMINPROFILING_HELP' => 'The admin section does not normally display the profiling, which can be activated via the file "config.inc.php".',
    'D3_LOG_CFG_SHOWALLEXCEPTIONS'          => 'Show all exceptions',
    'D3_LOG_CFG_SHOWALLEXCEPTIONS_HELP'     => 'In normal operation, errors are suppressed and only written in the background. To quickly detect any errors, set this switch. Deactivate it again afterwards!',
    'D3_LOG_CFG_MODULELOGGING'              => 'Scope of error reportings',
    'D3_LOG_CFG_MAILMESSAGING'              => 'Mail notifications (optional)',
    'D3_LOG_CFG_MAILADDRESS'                => 'Mail address',
    'D3_LOG_CFG_MAILERRLEVEL'               => 'from error level',
    'D3_LOG_CFG_MAILERRLEVEL_NOERR'         => '- no mailing -',
    'D3_LOG_CFG_MAILERRLEVEL_EMERGENCY'     => 'Emergency',
    'D3_LOG_CFG_MAILERRLEVEL_ALERT'         => 'Alert and above',
    'D3_LOG_CFG_MAILERRLEVEL_CRITICAL'      => 'Critical and above',
    'D3_LOG_CFG_MAILERRLEVEL_FATALERR'      => 'Fatal Error',
    'D3_LOG_CFG_MAILERRLEVEL_ERROR'         => 'Error and above',
    'D3_LOG_CFG_MAILERRLEVEL_ALLERROR'      => 'all "error" containing status',
    'D3_LOG_CFG_MAILERRLEVEL_WARNING'       => 'Warnings and above',
    'D3_LOG_CFG_INTERVAL'                   => 'Interval',
    'D3_LOG_CFG_INTERVALMAX'                => 'maximum every',
    'D3_LOG_CFG_INTERVALMAX_DAYS'           => 'day(s)',
    'D3_LOG_CFG_INTERVALMAX_HOURS'          => 'hour(s)',
    'D3_LOG_CFG_INTERVALMAX_MINS'           => 'minute(s)',
    'D3_LOG_CFG_MAILLASTSEND'               => 'Last mailing',
    'D3_LOG_CFG_SAVE'                       => 'Save',
    'D3_LOG_CFG_MODULELOGGING_ALL_DESC'     => 'Attention: generates large amounts of data!',

    'D3_CFG_LOG_TYPE_NONE'                  => 'no log items',
    'D3_CFG_LOG_TYPE_ERROR'                 => 'errors only',
    'D3_CFG_LOG_TYPE_WARNING'               => 'errors and warnings',
    'D3_CFG_LOG_TYPE_NOTICE'                => 'errors, warnings, notices',
    'D3_CFG_LOG_TYPE_INFO'                  => 'all error and info levels',
    'D3_CFG_LOG_TYPE_USERDEFINED'           => 'user defined',

    'D3_LOGTYPE_EMERGENCY'                  => 'escalating errors (Emergency)',
    'D3_LOGTYPE_ALERT'                      => 'alarming errors (Alert)',
    'D3_LOGTYPE_CRITICAL'                   => 'critical errors (Critical)',
    'D3_LOGTYPE_ERROR'                      => 'general errors (Error)',
    'D3_LOGTYPE_WARNING'                    => 'warnings',
    'D3_LOGTYPE_NOTICE'                     => 'notices',
    'D3_LOGTYPE_INFO'                       => 'general informations (Infos)',
    'D3_LOGTYPE_DEBUG'                      => 'debug informations (Debug)',
    'D3_LOGTYPE_TEST'                       => 'test informations (Test)',
    'D3_LOGTYPE_DESC'                       => '<h4>Log level</h4><ul><li>Emergency (error) - System is unusable (Ex: all PHP crashes between FATAL ERRORs and WARNINGs, no module configuration found) </li><li>Alert (error) - measures must be taken immediately (eg: requirements not fulfilled, required authorizations not available)</li><li>Critical (error) - Critical condition (eg access data missing, important configuration errors)</li><li>Error (error) - erroneous condition, other reaction that can trigger unexpected process-relevant reactions</li><li>Warning - eg: Incorrect configurations, input errors on the view level</li><li>Notice - normal, but important condition, essential information on the traceability of actions (logging of start / end / rough process outline)</li><li>Info - extended information on the traceability of actions, statistical data</li><li>Debug - Information on the traceability of actions including data of the action (queries, transaction data)</li><li>Test - limited or specially manipulated function for module tests</li><li>User-defined - a log combination was set via the extended logging settings (can be activated in the log library), which is not available as a group. Change the group or activate the extended logging settings again.</li></ul>',

    'D3_LOGMAIL_SUBJECT'                    => 'Loginfo from %s (%s)',
    'D3_LOGMAIL_HEADLINE'                   => 'These log items were in the shop set since last info mail:',
    'D3_LOGMAIL_INMODULE'                   => ' in module "%s"',
    'D3_LOGMAIL_DESC'                       => 'Details and causes of these log entries can be viewed in the admin area of your shop under "D³ Modules -> Module Connector -> Logging". There you can also delete irrelevant or clarified log entries.',
    'D3_LOGMAIL_LEGENDE'                    => '<hr><h3>Legend:</h3>',

);
