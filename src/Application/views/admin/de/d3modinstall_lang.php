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

$sLangName = "Deutsch";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(
//Navigation
    'charset'                                          => 'UTF-8',
    'D3_INSTALL'                                       => 'Installation',

    'D3INSTALL_LIB_TRANSL'                             => 'Installationsautomatik',

    'D3_INSTALL_SETUPSTEPS_INIT'                       => 'Installationsstart',
    'D3_INSTALL_PROGRESS'                              => 'Fortschritt: ',

    'D3_INSTALL_STARTSETUP'                            => 'Legen Sie vor der Installation eine Kopie Ihrer Datenbank an, so daß diese ggf. wieder hergestellt werden kann. <br>Die Sicherung der Dateien übernimmt das Installationsprogramm.',
    'D3_INSTALL_STARTSETUP1'                           => 'Soll die Installation "',
    'D3_INSTALL_STARTSETUP2'                           => '" gestartet werden?',
    'D3_INSTALL_SETUPCOUNT'                            => 'Aktualisierung Schritt %s',
    'D3_INSTALL_SETUPCOUNT_DESC'                       => ' (%1$s)',
    'D3_INSTALL_SETUPSTEPS'                            => 'Folgende Schritte werden durchgeführt:',
    'D3_INSTALL_SETUPSTEPS_GETARCHIVE'                 => 'Modulpaket wird geladen',
    'D3_INSTALL_SETUPSTEPS_LOADDESC'                   => 'Modulpaket wird geladen und entpackt',
    'D3_INSTALL_SETUPSTEPS_EXTRACTARCHIVE'             => 'Modulpaket wird entpackt',
    'D3_INSTALL_SETUPSTEPS_SHOWDESCRIPTION'            => 'Beschreibung',
    'D3_INSTALL_SETUPSTEPS_COPYFILES'                  => 'Dateien werden kopiert (ggf. Sicherungen angelegt) ',
    'D3_INSTALL_SETUPSTEPS_COPYFILES_DESC'             => 'Alle Dateien aus dem "copy_this"-Ordner werden in den Shop kopiert, schon vorhandene Dateien werden dabei als Sicherung abgelegt.',
    'D3_INSTALL_SETUPSTEPS_COPYFILES_SOURCEPATH'       => 'Quellpfad',
    'D3_INSTALL_SETUPSTEPS_COPYFILES_DESTPATH'         => 'Zielpfad',
    'D3_INSTALL_SETUPSTEPS_ACTIVATEMODULE'             => 'Modul aktivieren',
    'D3_INSTALL_SETUPSTEPS_ACTIVATEMODULE_DESC'        => 'Die Erweiterung wird in Ihrem Shop registriert. Das Modul ist damit <b>nicht</b> sofort aktiv. Im Regelfall haben unsere Module eine separate Aktivierungsoption, die deren Funktionen dann erst im Shop freischaltet.',
    'D3_INSTALL_SETUPSTEPS_ACTIVATE'                   => 'Diese Erweiterung muss im Shop registriert werden: "%1$s" (%2$s)',
    'D3_INSTALL_SETUPSTEPS_MODSTEPS'                   => 'Moduleinträge werden geschrieben (modulabhängig)',
    'D3_INSTALL_SETUPSTEPS_DBITEMS'                    => 'Datenbankeinträge werden eingefügt (modulabhängig)',
    'D3_INSTALL_SETUPSTEPS_REGISTERMODULE'             => 'Module aktivieren',
    'D3_INSTALL_SETUPSTEPS_REGISTERMODULE_DESC'        => 'Folgende Module müssen aktiviert werden:',
    'D3_INSTALL_SETUPSTEPS_REGISTERMODULE_NOITEMS'     => 'keine neuen Moduleinträge vorhanden',
    'D3_INSTALL_SETUPSTEPS_SETDATA'                    => ' - Verarbeitung',
    'D3_INSTALL_SETUPSTEPS_FINISHED'                   => 'Installation beendet',
    'D3_INSTALL_SETUPSTEPS_FINISHED_DESC'              => 'Die Modulinstallation konnte erfolgreich beendet werden.',
    'D3_INSTALL_SETUPSTEPS_FINISHED_DESC2'             => 'Wir wünschen Ihnen viel Erfolg!',
    'D3_INSTALL_CLEANUP'                               => 'Nach der Installation muß das TMP-Verzeichnis geleert werden. Soll dies nun durchgeführt werden?',
    'D3_INSTALL_CLEANUPSTART'                          => 'TMP-Verzeichnis jetzt leeren',
    'D3_INSTALL_CLEANUPSUCCESS'                        => 'Das TMP-Verzeichnis wurde geleert.',
    'D3_INSTALL_CLEANUPNOTSUCCESS'                     => 'Das TMP-Verzeichnis konnte nicht (komplett) geleert werden. Bitte führe Sie dies noch einmal selbst durch.',
    'D3_INSTALL_PROTOKOLLURI'                          => 'Das folgende Installationprotokoll ist ebenfalls auf Ihrem Server abgelegt: ',
    'D3_INSTALL_YES'                                   => 'Expressinstallation*',
    'D3_INSTALL_YESEXPERT'                             => 'benutzerdefinierte Installation*',
    'D3_INSTALL_NO'                                    => 'abbrechen',
    'D3_INSTALL_SETUPDESC'                             => '* Die Expressinstalltion läuft komplett automatisiert ab. <br>Bei der "benutzerdefinierte Installation" können Sie auch einzelne Schritte überspringen und ggf. manuell durchführen. Dies empfiehlt sich für stark angepaßte Shops.',
    'D3_INSTALL_SETUPSTEPS_ERROR'                      => 'Fehler während der Installation',
    'D3_INSTALL_EXPMODEQUESTION'                       => 'Soll der Schritt automatisch ausgeführt werden oder wollen Sie mit dem nächsten Punkt fortsetzen (die Aktion sollte dann manuell durchgeführt werden)?',
    'D3_INSTALL_EXPMODEEXECAUTO'                       => 'automatisch ausführen lassen',
    'D3_INSTALL_EXPMODENXTSTEP'                        => 'mit nächstem Schritt fortsetzen',
    'D3_INSTALL_NONEXISTINGSTEP'                       => 'Die erwartete Updatefunktion steht leider nicht zur Verfügung. Ist ein Update der "Install"-Bibliothek verfügbar, installieren Sie dies bitte vorher. Versuchen Sie diese Installation dann erneut.',
    'D3_INSTALL_SETUPSTEPS_DESCCONTINUE'               => 'Installation fortsetzen',
    'D3_INSTALL_DEPENDENCIES_POSSUPDATE'               => 'Diese Bibliothek / Modul erfordert, dass zuvor eine andere Bibiothek in einer bestimmten Version installiert ist. Wahrscheinlich sind Funktionen daraus zwingend erforderlich. Installieren Sie die folgenden Bibliotheken, bevor Sie diese Installation fortsetzen:',
    'D3_INSTALL_DEPENDENCIES_REQUNEWINSTALL'           => 'Die verfügbaren Bibliotheken können auf Grund gegenseitiger Abhängigkeiten nicht aktualisiert werden. Bitte installieren Sie die "Erstinstallation" neu. Dieses Paket können Sie in unserem Shop kostenfrei laden.',
    'D3_INSTALL_DEPENDENCIES_NOINSTALLPOSS'            => 'Die Installation erfordert Bibliotheken, die aktuell nicht zur Verfügung stehen. Bitte kontaktieren Sie uns für weitere Unterstützung.',
    'D3_INSTALL_DEPENDENCIES_UNDEFERROR'               => 'Unbekannte Abhängigkeit: Bitte versuchen Sie, die Installations-Bibliothek zuerst zu aktualisieren. Alternativ verwenden Sie bitte das "Erstinstallationspaket" von unserer Seite oxidmodule.com für die Installation.',
    'D3_INSTALL_DEPENDENCIES_MINREV'                   => 'mindestens in Revision',
    'D3_INSTALL_DEPENDENCIES_MINVERSION'               => 'mindestens in Version',
    'D3_INSTALL_DEPENDENCIES_STARTINSTALL'             => '-Installation starten',
    'D3_INSTALL_SETUPSTEPS_IGNORE'                     => 'trotzdem fortsetzen',
    'D3_INSTALL_ROLLBACK1'                             => 'Während der Installation konnte eine Aktion nicht erfolgreich ausgeführt werden.<br><br>Das ist aber kein Problem. An welcher Stelle die Installation abgebrochen wurde, entnehmen Sie bitte den unten gezeigten Protokolleinträgen.',
    'D3_INSTALL_ROLLBACK2'                             => 'Sie haben die Wahl:',
    'D3_INSTALL_ROLLBACK3'                             => 'Sie führen die Installation ab diesem Punkt selbst zu Ende, dann brechen Sie hier bitte ab.',
    'D3_INSTALL_ROLLBACK5'                             => 'Das Modul können Sie hier laden.',
    'D3_INSTALL_ROLLBACK4'                             => 'Die bisherige Installation wird rückgängig gemacht, um einen neuen Versuch (manuell) zu starten',
    'D3_INSTALL_SETUPSTEPS_INITROLLBACK'               => 'Installation rückgängig machen',
    'D3_INSTALL_ROLLBACKCANCEL'                        => 'Installation abbrechen',
    'D3_INSTALL_SETUPSTEPS_ROLLBACK_COPYFILES'         => 'Dateien zurücksetzen',
    'D3_INSTALL_SETUPSTEPS_ROLLBACK_END'               => 'Zurücksetzen beendet',
    'D3_INSTALL_PROTOKOLL_SUCCESSFULL'                 => 'erfolgreich',
    'D3_INSTALL_FINISH'                                => 'Installation fertigstellen',
    'D3_INSTALL_PROTOKOLL_NOTSUCCESSFULL'              => 'Fehler',
    'D3_INSTALL_FTPINFO_DISABLED'                      => 'Bricht die Installation wegen mangelnder Rechte ab, versuchen Sie den Transfer über ein FTP-Konto.<br>Konfigurieren Sie die Einstellungen unter [D3 Module] -> [Systemeinstellungen] -> [Bibliothekseinstellungen] -> [Installationsautomatik].',
    'D3_INSTALL_FTPINFO_ENABLED'                       => 'Sie verwenden den FTP-Modus. Dateioperationen benötigen dadurch deutlich mehr Zeit.<br>Konfigurieren Sie die Einstellungen unter [D3 Module] -> [Systemeinstellungen] -> [Bibliothekseinstellungen] -> [Installationsautomatik].',
    'D3_INSTALL_FTPINFO_CONFIG'                        => 'Aktivieren Sie den FTP-Modus, wenn Bibliotheksupdates wegen mangelnder Rechte nicht ausgeführt werden können. Beachten Sie bitte, dass Dateioperationen dadurch deutlich mehr Zeit benötigen. Bevorzugen Sie nach Möglichkeit die Installation ohne FTP-Modus.',

    'D3_INSTALL_PROTOKOLLITEM_ACR'                     => 'Wiederherstellen: System aktualisieren',
    'D3_INSTALL_PROTOKOLLITEM_ACT'                     => 'System aktualisiert',
    'D3_INSTALL_PROTOKOLLITEM_RMR'                     => 'Wiederherstellen: Modulmetadaten aktualisieren',
    'D3_INSTALL_PROTOKOLLITEM_RMM'                     => 'Modulmetadaten aktualisieren',
    'D3_INSTALL_PROTOKOLLITEM_ARC'                     => 'Fehler beim Archiv laden',
    'D3_INSTALL_PROTOKOLLITEM_ARG'                     => 'Archiv laden',
    'D3_INSTALL_PROTOKOLLITEM_BFE'                     => 'kann Datei nicht archivieren',
    'D3_INSTALL_PROTOKOLLITEM_CDE'                     => 'kann Verzeichnis nicht erstellen',
    'D3_INSTALL_PROTOKOLLITEM_CFD'                     => 'kann Verzeichnis nicht erstellen',
    'D3_INSTALL_PROTOKOLLITEM_CFE'                     => 'keine Dateien zu kopieren, Archiv leer?',
    'D3_INSTALL_PROTOKOLLITEM_CFR'                     => 'Dateien wurden überschrieben, Sicherungskopien wurden angelegt',
    'D3_INSTALL_PROTOKOLLITEM_CFG'                     => 'Dateien wurden kopiert',
    'D3_INSTALL_PROTOKOLLITEM_CFM'                     => 'Dateiberechtigungen konnten nicht geändert werden',
    'D3_INSTALL_PROTOKOLLITEM_CFN'                     => 'Datei konnte nicht kopiert werden',
    'D3_INSTALL_PROTOKOLLITEM_CLE'                     => 'TMP-Ordner konnte nicht geleert werden, bitte selbst leeren',
    'D3_INSTALL_PROTOKOLLITEM_CLT'                     => 'TMP-Ordner geleert',
    'D3_INSTALL_PROTOKOLLITEM_CNE'                     => 'cURL-Anfrage ist nicht ausführbar',
    'D3_INSTALL_PROTOKOLLITEM_DNC'                     => 'Verzeichnis kann nicht erstellt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_DNC_E'                   => 'Kann folgendes Verzeichnis nicht erstellen: <b>%s</b>, bitte legen Sie dies selbst an. Möglicherweise hat das Script, die Gruppe oder der Besitzer nicht genug Rechte. Dies kann zu weiteren Fehlern führen.<br>Weitere Informationen dazu erhalten Sie unter <a href="https://faq.d3data.de/">https://faq.d3data.de/</a>',
    'D3_INSTALL_PROTOKOLLITEM_DND'                     => 'Verzeichnis kann nicht gelöscht werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_DNM_E'                   => 'Kann Schreibrechte für folgendes Verzeichnis nicht setzen: <b>%s</b>, stellen Sie dies bitte selbst ein. Möglicherweise hat das Script, die Gruppe oder der Besitzer nicht genug Rechte. Dies kann zu weiteren Fehlern führen.<br>Weitere Informationen dazu erhalten Sie unter <a href="https://faq.d3data.de/">https://faq.d3data.de/</a>',
    'D3_INSTALL_PROTOKOLLITEM_DNO'                     => 'Verzeichnis kann nicht gelesen werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FCF'                     => 'Element kann nicht kopiert werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FCG'                     => 'Gruppenzuordnung kann nicht geändert werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FCM'                     => 'Berechtigungen können nicht gesetzt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FCO'                     => 'Owner kann nicht geändert werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FGG'                     => 'Gruppenzuordnung kann nicht ermittelt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FGO'                     => 'Owner kann nicht ermittelt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FNC'                     => 'Datei kann nicht geöffnet oder erstellt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FND'                     => 'Datei kann nicht gelöscht werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FNP'                     => 'Dateizugriffsrechte können nicht gelesen werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_FNR'                     => 'Datei kann nicht gelesen werden oder ist leer: %s',
    'D3_INSTALL_PROTOKOLLITEM_FNW'                     => 'Datei kann nicht beschrieben werden oder kein Inhalt vorhanden.',
    'D3_INSTALL_PROTOKOLLITEM_FXS'                     => 'Datei existiert nicht: %s',
    'D3_INSTALL_PROTOKOLLITEM_RAG'                     => 'Modularchiv gesichert',
    'D3_INSTALL_PROTOKOLLITEM_RFE'                     => 'Wiederherstellen: keine Dateien für Restore gefunden',
    'D3_INSTALL_PROTOKOLLITEM_RFG'                     => 'Wiederherstellen: Dateien wurden zurückkopiert',
    'D3_INSTALL_PROTOKOLLITEM_RMG'                     => 'Module registriert',
    'D3_INSTALL_PROTOKOLLITEM_RMI'                     => 'Modul registriert',
    'D3_INSTALL_PROTOKOLLITEM_ROG'                     => 'oxutils-Modul registriert',
    'D3_INSTALL_PROTOKOLLITEM_RUG'                     => 'Wiederherstellen: oxutils-Modul zurückgeschrieben',
    'D3_INSTALL_PROTOKOLLITEM_RUE'                     => 'Wiederherstellen: oxutils-Modul konnten nicht zurückgeschrieben werden, Sicherung liegt vor',
    'D3_INSTALL_PROTOKOLLITEM_RRE'                     => 'Wiederherstellen: Moduleinträge konnten nicht zurückgeschrieben werden, Sicherung liegt vor',
    'D3_INSTALL_PROTOKOLLITEM_RRG'                     => 'Wiederherstellen: Moduleinträge zurückgeschrieben',
    'D3_INSTALL_PROTOKOLLITEM_SNE'                     => 'Systembefehl kann nicht ausgeführt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_SQE'                     => 'Datenbankeintrag gesetzt',
    'D3_INSTALL_PROTOKOLLITEM_SQL'                     => 'Datenbankeinträge gesetzt',
    'D3_INSTALL_PROTOKOLLITEM_SQR'                     => 'Wiederherstellen: Datenbank nicht wiederherstellbar, bitte ggf. eigene Sicherung wiederherstellen',
    'D3_INSTALL_PROTOKOLLITEM_SVG'                     => 'Benutzereingaben gespeichert',
    'D3_INSTALL_PROTOKOLLITEM_XAN'                     => 'Archiv entpacken, kein Archiv gefunden',
    'D3_INSTALL_PROTOKOLLITEM_XAO'                     => 'Archiv entpackt',
    'D3_INSTALL_PROTOKOLLITEM_XAS'                     => 'Archiv entpackt',
    'D3_INSTALL_PROTOKOLLITEM_XNP'                     => 'XML kann nicht gelesen werden',
    'D3_INSTALL_PROTOKOLLITEM_ZNF'                     => 'Größe der gepackten Datei kann nicht ermittelt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_ZNN'                     => 'Name der gepackten Datei kann nicht ermittelt werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_ZNO'                     => 'gepackte Datei %s kann nicht geöffnet werden: %s',
    'D3_INSTALL_PROTOKOLLITEM_ZNR'                     => 'gepackte Datei kann nicht gelesen werden: %s',
    'D3_INSTALL_PROTOKOLL_SUCCESS'                     => 'Installation wurde erfolgreich durchgeführt',
    'D3_INSTALL_PROTOKOLL_ERROR'                       => 'Während der Installation sind Fehler auftreten',
    'D3_INSTALL_PROTOKOLL_DETAILS'                     => '&nbsp;-&nbsp;Klick für Details',

    'D3_INSTALL_CFG_FORCEFTP'                          => 'FTP-Verbindung zum Kopieren von Dateien verwenden',
    'D3_INSTALL_CFG_FORCEFTP_HELP'                     => 'Die zu verwendende FTP-Verbindung muss über ausreichend Berechtigungen zum Löschen und Anlegen von Dateien verfügen.',
    'D3_INSTALL_CFG_FTPSERVER'                         => 'FTP-Servername',
    'D3_INSTALL_CFG_FTPPORT'                           => 'FTP-Port (optional)',
    'D3_INSTALL_CFG_FTPPATH'                           => 'Pfad zum Shoprootverzeichnis',
    'D3_INSTALL_CFG_FTPUSER'                           => 'FTP-Benutzername',
    'D3_INSTALL_CFG_FTPPASS'                           => 'FTP-Passwort (nur, wenn benötigt)',
    'D3_INSTALL_CFG_SAVE'                              => 'speichern',

    'D3_UPDATE_AVAILABLE_VERSION'                      => '<span style="margin: 10px;"><img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> <a href="%1$s" target="modupdate">Neue Modulversion für "%2$s" (Version %3$s) verfügbar.</a></span>',
    'D3_UPDATE_AVAILABLE_VERSION_NOLINK'               => '<span style="margin: 10px;"><img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> Neue Modulversion für "%1$s" (Version %2$s) verfügbar.</span>',
    'D3_UPDATE_EXPIREDMODULE'                          => '<span style="margin: 10px;"><img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> <a href="%1$s" target="_blank">Die Lizenz für "%2$s" ist abgelaufen. Die Modulfunktion steht daher nicht mehr zur Verfügung. Kontaktieren Sie uns für ein Lizenzupdate.</a></span>',
    'D3_UPDATE_EXPIRESOONMODULE'                       => '<span style="margin: 10px;"><img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> <a href="%1$s" target="_blank" style="color: #F00000; font-weight: bold;">Die Lizenz für "%2$s" läuft in %3$s ab. Die Modulfunktion wird dann nicht mehr verfügbar sein. Kontaktieren Sie uns für ein Lizenzupdate.</a></span>',
    'D3_UPDATE_REQUIRED_MODCFGUPDATE'                  => '<span style="margin: 10px;"><img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> <a href="%s" target="basefrm" style="color: #F00000; font-weight: bold;">Wichtige Installation für Modul-Connector erforderlich. Klicken Sie hier für den Assistenten.</a></span>',

    'D3_CFG_MOD_UPDATE_TITLE'                          => 'D³ Modul-Installationsassistent',
    'D3_CFG_MOD_UPDATE_DESC'                           => 'Statt der von Ihnen gewählten Ansicht sehen Sie hier den Modul-Installationsassistenten. Dieser wird gezeigt, da eines oder mehrere Ihrer D³ Module für deren ordnungsgemäße Funktion einige Einstellungen am Shop vornehmen müssen.',
    'D3_CFG_MOD_UPDATE_SELECTDESC'                     => 'Der Installationsassistent wird gezeigt, da eines oder mehrere Ihrer D³ Module für deren ordnungsgemäße Funktion einige Einstellungen am Shop vornehmen müssen.',
    'D3_CFG_MOD_UPDATE_START'                          => 'Auswahl anwenden',
    'D3_CFG_MOD_UPDATE_CHOOSESTEP'                     => 'Wählen Sie, wie Sie fortsetzen möchten:',
    'D3_CFG_MOD_UPDATE_DEMOSHOP'                       => 'Da dieser Shop im Demo-Modus läuft, sind nicht alle Optionen auswählbar. Wenden Sie sich dazu bitte an den technischen Betreuer.',
    'D3_CFG_MOD_UPDATE_STEP_AUTOINSTALL'               => 'automatische Installation',
    'D3_CFG_MOD_UPDATE_STEP_AUTOINSTALL_DESC'          => 'Die erforderlichen Installationen werden automatisch mit den Standardoptionen ausgeführt. Alle Aktionen werden protokolliert. <br><b>Diese Option ist für die meisten Shops empfohlen.</b>',
    'D3_CFG_MOD_UPDATE_STEP_MANUALYINSTALL'            => 'automatische Installation mit Rückfrage',
    'D3_CFG_MOD_UPDATE_STEP_MANUALYINSTALL_DESC'       => 'Die erforderlichen Installationen werden ausgeführt. Vor jedem Installationsschritt entscheiden Sie, ob dieser wirklich ausgeführt werden soll.<br><b>Diese Option ist für eher ungewöhnliche Servereinrichtungen empfohlen.</b>',
    'D3_CFG_MOD_UPDATE_STEP_CHECKLIST'                 => 'Liste für manuelle Installation',
    'D3_CFG_MOD_UPDATE_STEP_CHECKLIST_DESC'            => 'Der Installationsassistent erstellt Ihnen eine Liste mit den erforderlichen Aktionen. Änderungen an Ihrem Shop werden jedoch nicht vorgenommen. <br><b>Beachten Sie, dass die Installationen zur ordnungsgemäßen Funktion des Modul-Connectors und der darauf aufbauenden Module unbedingt ausgeführt werden müssen.</b>',
    'D3_CFG_MOD_UPDATE_STEP_SKIP'                      => 'Installation vorläufig überspringen',
    'D3_CFG_MOD_UPDATE_STEP_SKIP_DESC'                 => 'Sie werden zu der ursprünglich gewählten Seite weitergeleitet. Die erforderlichen Installationen werden jedoch nicht ausgeführt. <br><b>Beachten Sie, dass die Installationen zur ordnungsgemäßen Funktion des Modul-Connectors und der darauf aufbauenden Module unbedingt ausgeführt werden müssen.</b>',
    'D3_CFG_MOD_UPDATE_STEP_SKIP_RANGE1'               => 'In frühestens ',
    'D3_CFG_MOD_UPDATE_STEP_SKIP_RANGE2'               => ' werden Sie wieder daran erinnert.',
    'D3_CFG_MOD_UPDATE_MULTIDESC'                      => 'Die Installation muss in mehreren Schritten durchgeführt werden. Klicken Sie auf den Button, um die weiteren Schritte durchzuführen.',
    'D3_CFG_MOD_UPDATE_MULTICONTINUE'                  => 'Installation fortsetzen',
    'D3_CFG_MOD_UPDATE_STEPCONTINUE'                   => 'Installationsschritt ausführen...',
    'D3_CFG_MOD_UPDATE_SESSIONSKIP'                    => 'in dieser Session überspringen',
    'D3_CFG_MOD_UPDATE_SKIPEVER'                       => 'immer überspringen',
    'D3_CFG_MOD_UPDATE_MULTIBACK'                      => 'zurück zur Aktionsauswahl',
    'D3_CFG_MOD_UPDATE_JOB_SQL'                        => 'Führen Sie diese Abfrage in Ihrer Shopdatenbank aus. Leeren Sie nach Abschluss der Installation den TMP-Ordner und aktualisieren Sie die VIEW-Tabellen:',
    'D3_CFG_MOD_UPDATE_JOB_MODULE'                     => 'Aktivieren Sie diese Module:',
    'D3_CFG_MOD_UPDATE_JOB_MSG'                        => 'Beachten Sie bitte die folgenden Hinweise:',
    'D3_CFG_MOD_UPDATE_JOB_FILECONTENT'                => 'Passen Sie die Datei "%s" so an oder legen Sie diese mit dem Inhalt neu an:',
    'D3_CFG_MOD_UPDATE_ACTIVATEMODULE'                 => 'Modul "%s" (ID: "%s") im Shop "%s (%s)"',
    'D3_CFG_MOD_UPDATE_JOB_BREAK'                      => 'Die Installation wurde pausiert, da die weiteren Aktionen von den bisher gezeigten Updates abhängen. <br>Führen Sie <b>zuerst</b> die bisherigen Installationsschritte aus und setzen Sie diesen Assistenten fort. Sie sehen dann an dieser Stelle die weiteren Updateschritte.',
    'D3_CFG_MOD_UPDATE_JOB_ERROR'                      => 'Fehler bei der Installation',
    'D3_CFG_MOD_UPDATE_JOB_ERROR_DESC'                 => 'Die Installation konnte für den gezeigten Schritt leider nicht vollständig durchgeführt werden. Bitte prüfen Sie diese Ausführung manuell und setzen dann die Installation hier fort.',
    'D3_CFG_MOD_UPDATE_JOB_ERRORMSG_DESC'              => 'Die Installation konnte für den gezeigten Schritt leider nicht vollständig durchgeführt werden. Die folgende Meldung wurde zurückgegeben: <code>%s</code>. Bitte prüfen Sie diese Ausführung manuell und setzen dann die Installation hier fort.',
    'D3_CFG_MOD_UPDATE_WAIT'                           => 'Bitte warten...',
    'D3_CFG_MOD_UPDATE_NOUPDATE'                       => 'Für Ihre Shops sind keine (weiteren) Updates notwendig.',
    'D3_CFG_MOD_UPDATE_NOUPDATEBACKLINK'               => 'Klicken Sie <a href="%s">hier</a>, um zur vorherigen Seite zurückzukehren.',
    'D3_CFG_MOD_UPDATE_HASSKIPHASHES'                  => 'In Ihrem Shop sind Updateaktionen vermerkt, die übersprungen werden sollen. Sollen diese Updateschritte wieder aktiviert werden?',
    'D3_CFG_MOD_UPDATE_DELSKIPHASHES'                  => 'übersprungene Updates wieder aktivieren',
    'D3_CFG_MOD_UPDATE_MOREINFO'                       => '[ mehr ... ]',
    'D3_CFG_MOD_UPDATE_STEP_CHECK_SAVEASFILE'          => 'als Datei exportieren',
    'D3_CFG_MOD_EXC_ALLLIBSDEACTIVATED'                => 'Aus Gründen der Systemstabilität wurden mit dieser Bibliothek auch alle damit verknüpften Biblotheken deaktiviert. Beachten Sie bitte, dass Module, die den D3 Modul-Connector erfordern, nun wahrscheinlich nicht mehr funktionieren, bevor der Modul-Connector wieder komplett aktiviert wurde.',

    'D3_UPDATE_DISABLE_LOG_INSTALL_CLRTMP'             => 'Deaktivieren Sie im Adminbereich unter "Erweiterungen -> Module" die folgenden Einträge'.PHP_EOL.'- D3 Connector - Logging.'.PHP_EOL.'- D3 Connector - Installationsassistent'.PHP_EOL.'- D3 Connector - TMP leeren',
    'D3_UPDATE_DELETE_DIR'                             => 'Löschen Sie das Verzeichnis "%s" und seinen Inhalt vom Server.',
    'D3_UPDATE_DELETE_DIRONCE'                         => 'Löschen Sie das Verzeichnis "%s" vom Server.',
    'D3_UPDATE_DELETE_FILEONCE'                        => 'Die folgende Datei ist veraltet und wird von der aktuellen Modulversion nicht mehr benötigt. Bitte löschen Sie die Datei ' . PHP_EOL . '"%s"' . PHP_EOL . ' vom Server. Wenn Sie diesen Installationsschritt ausführen lassen, wird diese Datei automatisch gelöscht.',
    'D3_UPDATE_DELETE_CONFIGMODULEITEMS'               => 'Es gibt registrierte Erweiterungen im Shop, deren Verzeichnis oder Dateien nicht vorhanden sind. ' . PHP_EOL . 'Bitte bestätigen Sie das Entfernen dieser Erweiterungen. ' . PHP_EOL . PHP_EOL . 'alternativ können Sie diese Bereinigung auch später im Adminbereich unter ' . PHP_EOL . 'Erweiterungen -> Module -> Installierte Shop-Module durchführen.' . PHP_EOL . PHP_EOL . 'Betroffene Erweiterungen sind: ',
    'D3_UPDATE_REGMLTABLECONFIG'                       => 'Grundlegende Shopeinstellungen werden (sofern vorhanden) auch aus der Datei "config.inc.php" ausgelesen. <br><br>Normalerweise wird diese Option nicht verwendet. Führen Sie diese Installation dann einfach normal weiter. <br><br>Haben Sie den Eintrag "%1$s" in der Datei hinterlegt, ändern Sie dessen Inhalte dort bitte manuell auf folgenden Wert:<br><br>%2$s<br>Die Anpassungen können dann leider nicht im Rahmen der automatischen Installation vorgenommen werden.',
    'D3_UPDATE_MSG_UNREGISTERED_FILES'                 => 'In Ihrer Modulinstallation befinden sich die folgenden unregistrierten Dateien. Um die ordnungsgemäße Funktion Ihres Moduls zu gewährleisten, sollten Sie prüfen, ob diese Dateien entfernt werden können. Aus Sicherungsgründen kann dieser Installationsschritt nicht automatisch durchgeführt werden. Löschen Sie die Dateien bitte manuell und führen die Installation dann hier fort. Alternativ überspringen Sie diesen Hinweis mit den unten gezeigten "Überspringen"-Schaltflächen. <br><br>%1$s<br><br>Wenden Sie sich bei Fragen an den Modulautor.',
    'D3_UPDATE_MSG_DISABLED_MODCFGMODULE'              => 'Der D3-Modul-Connector ist durch die Shopsoftware temporär deaktiviert worden. Bitte aktivieren Sie diesen umgehend wieder, dass hierdurch keine Fehler ausgelöst werden.'.PHP_EOL.PHP_EOL.'So reaktivieren Sie das Modul:'.PHP_EOL.'- klicken Sie auf den "Ausführen"-Button auf dieser Seite (sofern vorhanden) *oder*'.PHP_EOL.'- rufen Sie dazu im Adminbereich ihres Shops den Menüpunkt "Erweiterungen -> Module" auf - Führen Sie die Reaktivierung unbedingt vor den nächsten Installationsschritten aus.'.PHP_EOL.PHP_EOL.'In einer Enterprise Edition mit mehreren Mandanten ist die Reaktivierung in jedem eingerichteten Shop nötig.',

    'D3_UPDATE_MSGADDTABLE'                            => 'Tabelle "%1$s" anlegen',
);
