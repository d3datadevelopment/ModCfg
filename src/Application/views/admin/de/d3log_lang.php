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

$sLangName = "Deutsch";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                               => 'UTF-8',
    'd3mxlog'                               => 'Logging',
    'd3mxlog_main'                          => 'Auswertung',
    'd3tbcllog_main'                        => 'Details / Export',
    'd3tbcllog_cleanup'                     => 'Wartung',

    'D3LOG_LIB_TRANSL'                      => 'Logging',
    'D3LOG_LIB_HELPLINK'                    => 'Modul-Connector/Logging/',

    'D3_CFG_LOG_LOGTYPE'                    => 'Priorität',
    'D3_CFG_LOG_TIME'                       => 'Zeit',
    'D3_CFG_LOG_COUNTER'                    => 'Zähler',
    'D3_CFG_LOG_MODULE'                     => 'Modul',
    'D3_CFG_LOG_TEXT'                       => 'Aufzeichnungsdaten',
    'D3_CFG_LOG_SESSID'                     => 'Sitzungs-ID',
    'D3_CFG_LOG_ACTION'                     => 'Aktion',
    'D3_CFG_LOG_CLASS'                      => 'Klasse',
    'D3_CFG_LOG_FUNCTION'                   => 'Methode',
    'D3_CFG_LOG_LINE'                       => 'Zeile',
    'D3_CFG_LOG_WRAP'                       => 'kein Zeilenumbruch',
    'D3_CFG_LOG_ACTITEMS_MODULES'           => '<b>Sie sehen derzeit nur die Logeinträge des Moduls "%s". Um alle Logeinträge zu sehen, diese zu exportieren oder zu löschen, nutzen Sie bitte die Ansicht unter "Modul-Connector => Logging"</b><br><br>',
    'D3_CFG_LOG_ACTITEMS'                   => 'Derzeit sind ',
    'D3_CFG_LOG_ACTITEMS1'                  => ' Einträge im D3-Log gespeichert.',
    'D3_CFG_LOG_ACTITEMS2'                  => ' Einträge im D3-Log gespeichert. Deaktivieren Sie unnötige Logeinstellungen bzw. löschen Sie die Einträge.',
    'D3_CFG_CLEAN_DEL1'                     => 'Lösche alle Einträge mit folgenden Bedingungen:',
    'D3_CFG_CLEAN_DEL_MODULE'               => 'Module',
    'D3_CFG_CLEAN_DEL_MODULE_ALL'           => 'Einträge aller Module',
    'D3_CFG_CLEAN_DEL_FROMTIME'             => 'Einträge ab Datum',
    'D3_CFG_CLEAN_DEL_TOTIME'               => 'Einträge bis Datum',
    'D3_CFG_CLEAN_DEL_TYPE'                 => 'Priorität',
    'D3_CFG_CLEAN_DEL_TYPE_ALL'             => 'Einträge aller Prioritäten',
    'D3_CFG_CLEAN_DELETE'                   => 'Löschen',
    'D3_CFG_EXPORT_SHOWDIALOG'              => 'zeige Exportformular',
    'D3_CFG_EXPORT_EXP1'                    => 'Exportiere alle Einträge mit folgenden Bedingungen:',
    'D3_CFG_EXPORT_EXP_MODULE'              => 'Module',
    'D3_CFG_EXPORT_EXP_MODULE_ALL'          => 'Einträge aller Module',
    'D3_CFG_EXPORT_EXP_MODULE_DEF'          => 'Einträge des Moduls "%1$s"',
    'D3_CFG_EXPORT_EXP_TIME'                => 'Einträge ab Datum',
    'D3_CFG_EXPORT_EXP_SESSID'              => 'Einträge dieser Session (optional)',
    'D3_CFG_EXPORT_EXP_CLASS'               => 'Einträge dieser Klasse',
    'D3_CFG_EXPORT_EXP_CLASS_ALL'           => 'Einträge aller Klassen',
    'D3_CFG_EXPORT_SQL'                     => 'Exportieren als SQL',
    'D3_CFG_EXPORT_CSV'                     => 'Exportieren als CSV',
    'D3_CFG_EXPORT_FILEMESSAGE'             => 'Exportiert nach:',
    'D3_CFG_EXPORT_MAILMESSAGE'             => 'und per Mail versandt',
    'D3_CFG_EXPORT_EXP_MAIL'                => 'an Mailadresse versenden (optional):',
    'D3_LOG_MAIL_SUBJECT'                   => 'Logdaten',
    'D3_LOG_MAIL_NOTSEND'                   => 'Mail konnte nicht versandt werden. Zu versendende Datei: %s',

    'D3_CFG_FIELDTITLE_OXID'                => 'interne Identnr.',
    'D3_CFG_FIELDTITLE_OXSHOPID'            => 'Shop Identnr.',
    'D3_CFG_FIELDTITLE_OXSESSID'            => 'Session-ID',
    'D3_CFG_FIELDTITLE_OXLOGTYPE'           => 'Priorität',
    'D3_CFG_FIELDTITLE_OXCOUNTER'           => 'Zähler',
    'D3_CFG_FIELDTITLE_OXTIME'              => 'Zeit',
    'D3_CFG_FIELDTITLE_OXMODID'             => 'Modulident',
    'D3_CFG_FIELDTITLE_OXCLASS'             => 'Klassenname',
    'D3_CFG_FIELDTITLE_OXFNC'               => 'Funktionsname',
    'D3_CFG_FIELDTITLE_OXLINE'              => 'Zeilennummer',
    'D3_CFG_FIELDTITLE_OXACTION'            => 'Aktion',
    'D3_CFG_FIELDTITLE_OXTEXT'              => 'LogText',
    'D3_CFG_FIELDTITLE_OXTIMESTAMP'         => 'Zeitstempel',
    'D3_CFG_FIELDTITLE_OXPROFILEID'         => 'Profil-ID',

    'D3_LOG_CFG_USEEXTLOG'                  => 'erweiterte Logging-Einstellungen verwenden',
    'D3_LOG_CFG_EXTENDED_LOGGING_HELP'      => 'Der Shopbetreiber wählt im Regelfall aus zusammengefassten Loggruppen. Mit dieser Option kann jeder Logmodus einzeln eingestellt werden.',
    'D3_LOG_CFG_ENABLE_ERR_REPORT'          => 'ErrorReporting in internes Logging schreiben',
    'D3_LOG_CFG_ENABLE_ERR_REPORT_HELP'     => 'Im Normalbetrieb werden PHP-Meldungen aus Sicherheitsgründen nicht ausgegeben. Mit dieser Einstellung werden Meldungen in das interne Logging übernommen. Auf die Ausgabe dieser Daten am Bildschirm hat diese Einstellung keine Auswirkung.',
    'D3_LOG_CFG_ENABLE_EXC_REPORT'          => 'Exceptions in internes Logging schreiben',
    'D3_LOG_CFG_ENABLE_EXC_REPORT_HELP'     => 'Ausnahmebehandlungen werden in der EXCEPTION_LOG.txt hinterlegt. Zur einfacheren Auswertung können Sie diese zusätzlich auch im internen Logging mitprotokollieren.<br>Es werden alle allgemeinen Ausnahmen protokolliert, die über oxshopcontrol::process() abgefangen werden. Ausnahmen vom Modul-Connector werden auf Basis dessen Logeinstellungen protokolliert. Ausnahmen, die an anderer Stelle abgefangen werden, können für das Log darüber nicht zugänglich gemacht werden.',
    'D3_LOG_CFG_ENABLE_ADMINPROFILING'      => 'Profiling auch im Adminbereich zeigen',
    'D3_LOG_CFG_ENABLE_ADMINPROFILING_HELP' => 'Der Adminereich stellt das Profiling, welches über die Datei "config.inc.php" aktiviert werden kann, normalerweise nicht dar.',
    'D3_LOG_CFG_SHOWALLEXCEPTIONS'          => 'alle Ausnahmebehandlungen zeigen',
    'D3_LOG_CFG_SHOWALLEXCEPTIONS_HELP'     => 'Im Normalbetrieb werden Fehler unterdrückt und nur im Hintergrund mitgeschrieben. Um eventuelle Fehler schnell zu erkennen, setzen Sie diesen Schalter. Deaktivieren Sie diesen im Anschluss unbedingt wieder!',
    'D3_LOG_CFG_MODULELOGGING'              => 'Umfang des ErrorReportings',
    'D3_LOG_CFG_MAILMESSAGING'              => 'Mailbenachrichtigungen (optional)',
    'D3_LOG_CFG_MAILADDRESS'                => 'Mailadresse',
    'D3_LOG_CFG_MAILERRLEVEL'               => 'ab Fehlerlevel',
    'D3_LOG_CFG_MAILERRLEVEL_NOERR'         => '- kein Mailversand -',
    'D3_LOG_CFG_MAILERRLEVEL_EMERGENCY'     => 'Emergency',
    'D3_LOG_CFG_MAILERRLEVEL_ALERT'         => 'Alert und höher',
    'D3_LOG_CFG_MAILERRLEVEL_CRITICAL'      => 'Critical und höher',
    'D3_LOG_CFG_MAILERRLEVEL_FATALERR'      => 'Fatal Error',
    'D3_LOG_CFG_MAILERRLEVEL_ERROR'         => 'Error und höher',
    'D3_LOG_CFG_MAILERRLEVEL_ALLERROR'      => 'alle "Error" enthaltenden Status',
    'D3_LOG_CFG_MAILERRLEVEL_WARNING'       => 'Warnungen und höher',
    'D3_LOG_CFG_INTERVAL'                   => 'Intervall',
    'D3_LOG_CFG_INTERVALMAX'                => 'maximal alle',
    'D3_LOG_CFG_INTERVALMAX_DAYS'           => 'Tag(e)',
    'D3_LOG_CFG_INTERVALMAX_HOURS'          => 'Stunde(n)',
    'D3_LOG_CFG_INTERVALMAX_MINS'           => 'Minute(n)',
    'D3_LOG_CFG_MAILLASTSEND'               => 'Letzter Versand',
    'D3_LOG_CFG_SAVE'                       => 'Speichern',
    'D3_LOG_CFG_MODULELOGGING_ALL_DESC'     => 'Achtung: erzeugt große Datenmengen!',

    'D3_CFG_LOG_TYPE_NONE'                  => 'kein Protokoll',
    'D3_CFG_LOG_TYPE_ERROR'                 => 'nur Fehler',
    'D3_CFG_LOG_TYPE_WARNING'               => 'Fehler und Warnungen',
    'D3_CFG_LOG_TYPE_NOTICE'                => 'Fehler, Warnungen, Notizen',
    'D3_CFG_LOG_TYPE_INFO'                  => 'alle Fehler- und Infolevel',
    'D3_CFG_LOG_TYPE_USERDEFINED'           => 'benutzerdefiniert',

    'D3_LOGTYPE_EMERGENCY'                  => 'eskalierende Fehler (Emergency)',
    'D3_LOGTYPE_ALERT'                      => 'alarmierende Fehler (Alert)',
    'D3_LOGTYPE_CRITICAL'                   => 'kritische Fehler (Critical)',
    'D3_LOGTYPE_ERROR'                      => 'allgemeine Fehler (Error)',
    'D3_LOGTYPE_WARNING'                    => 'Warnungen (Warnings)',
    'D3_LOGTYPE_NOTICE'                     => 'Hinweise (Notices)',
    'D3_LOGTYPE_INFO'                       => 'allgem. Informationen (Infos)',
    'D3_LOGTYPE_DEBUG'                      => 'Debug-Informationen (Debug)',
    'D3_LOGTYPE_TEST'                       => 'Test-Informationen (Test)',
    'D3_LOGTYPE_DESC'                       => '<h4>Log-Level</h4><ul><li>Emergency (Fehler) - System ist unbenutzbar (Bsp: alle PHP-Abbrüche zwischen FATAL ERRORs und WARNINGs, keine Modulkonfiguration gefunden) </li><li>Alert (Fehler) - es müssen sofort Massnahmen ergriffen werden (Bsp: Anforderungen nicht erfüllt, erforderliche Berechtigungen nicht vorhanden)</li><li>Critical (Fehler) - kritische Bedingung (Bsp: Zugangsdaten fehlen, wichtige Konfigurationsfehler)</li><li>Error (Fehler) - fehlerhafte Bedingung, sonstige Reaktion, die unerwartete ablaufrelevante Reaktionen auslösen können</li><li>Warning	- Bsp: Falschkonfigurationen, Eingabefehler auf View-Ebene</li><li>Notice - normale, jedoch bedeutsame Bedingung, essentielle Informationen zur Nachvollziehbarkeit von Aktionen (Protokollierung von Start / Ende / grobe Ablaufskizzierung)</li><li>Info - erweiterte Infos zur Nachvollziehbarkeit von Aktionen, statistische Daten</li><li>Debug - Infos zur Nachvollziehbarkeit von Aktionen inkl. Daten der Aktion (Queries, Transaktionsdaten)</li><li>Test - eingeschränkte oder speziell für Modultests manipulierte Funktion</li><li>Benutzerdefiniert  - über die erweiterten Loggingeinstellungen (aktivierbar in der Log-Bibliothek) wurde eine Log-Kombination eingestellt, die als Gruppe nicht verfügbar ist. Ändern Sie die Gruppe oder aktivieren Sie die erweiterten Loggingeinstellungen erneut.</li></ul>',

    'D3_LOGMAIL_SUBJECT'                    => 'LogInfo von %s (%s)',
    'D3_LOGMAIL_HEADLINE'                   => 'Diese Log-Eintraege wurden seit der letzten Informationsmail im Shop gesetzt:',
    'D3_LOGMAIL_INMODULE'                   => ' in Modul "%s"',
    'D3_LOGMAIL_DESC'                       => 'Details und Ursachen dieser Protokolleinträge können Sie im Adminbereich Ihres Shops unter "D³ Module -> Modul-Connector -> Logging" einsehen. Dort können Sie unrelevante oder geklärte Logeinträge auch löschen.',
    'D3_LOGMAIL_LEGENDE'                    => '<hr><h3>Legende:</h3>',

);
