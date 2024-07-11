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
    'charset'                              => 'UTF-8',
    'd3mxd3cleartmp'                       => 'TMP leeren',
    'd3mxd3cleartmp2'                      => '<i class="fas fa-trash"></i> TMP leeren',
    'd3mxd3cleartmp2_desc1'                => 'TMP-Ordner jetzt leeren',
    'd3mxd3cleartmp2_desc2'                => 'TMP leeren in neuem Tab öffnen',
    'd3tbclclr_main'                       => 'TMP leeren',
    'd3tbclclr_mtn'                        => 'Wartungsarbeiten',
    'd3navclrtmp_typeall'                  => 'alle Caches',
    'd3navclrtmp_typetpllang'              => 'TPL+Übersetzung-Caches',
    'd3navclrtmp_typetpl'                  => 'TPL-Caches',
    'd3navclrtmp_typelang'                 => 'Übersetzung-Caches',
    'd3navclrtmp_clear'                    => 'leeren',

    'D3TPLBLOCKS_NOBLOCKS'                 => 'Die Funktionen stehen Ihnen nicht zur Verfügung, da keine Template-Blöcke definiert sind.',
    'D3TPLBLOCKS_MODULE'                   => 'für dieses Modul ...',
    'D3TPLBLOCKS_CHOOSEMODULE'             => 'bitte Modul wählen',
    'D3TPLBLOCKS_NOMODULEMSG'              => 'Bitte wählen Sie das zu aktualisierende Modul.',
    'D3TPLBLOCKS_REMBLOCKS'                => '... alle Templatebock-Einträge entfernen',
    'D3TPLBLOCKS_REMBLOCKS_DESC'           => 'Diese Funktion löscht alle Blockeinträge des gewählten Moduls aus der Datenbank. Zum erneuten Hinzufügen der Einträge ist es erforderlich, das entsprechende Modul zu reaktivieren. Die Änderungen werden erst mit dem Leeren des TMP-Ordners aktiv.',
    'D3TPLBLOCKS_REMBLOCKS_SUCC'           => 'Die gewählten Templateblockeinträge wurden gelöscht. Reaktivieren Sie das Modul, um die Einträge erneut anzulegen. Bitte leeren Sie den TMP-Ordner.',
    'D3TPLBLOCKS_REFBLOCKS'                => '... alle Templatebock-Einträge aktualisieren',
    'D3TPLBLOCKS_REFBLOCKS_DESC'           => 'Diese Funktion aktualisiert alle Blockeinträge des gewählten Moduls in der Datenbank. Veraltete Einträge werden entfernt und neue Einträge werden hinzugefügt. <br><br>Angepasste Positions- und Aktivangaben werden rekonstruiert, sofern sich die bisherigen Einträge eindeutig den neuen Einträgen zuordnen lassen. Ansonsten werden dafür die Standardeinträge des jeweiligen Moduls gesetzt. Die Änderungen werden erst mit dem Leeren des TMP-Ordners aktiv.',
    'D3TPLBLOCKS_REFBLOCKS_SUCC'           => 'Die gewählten Templateblockeinträge wurden aktualisiert. Bitte leeren Sie den TMP-Ordner.',
    'D3TPLBLOCKS_DEACTBLOCKS'              => '... alle Templatebock-Einträge deaktivieren',
    'D3TPLBLOCKS_DEACTBLOCKS_DESC'         => 'Diese Funktion deaktiviert alle Blockeinträge des gewählten Moduls in der Datenbank. Beachten Sie, dass eine Reaktivierung des Moduls diese wieder aktiv setzt. Die Änderungen werden erst mit dem Leeren des TMP-Ordners aktiv.',
    'D3TPLBLOCKS_DEACTBLOCKS_SUCC'         => 'Die gewählten Templateblockeinträge wurden deaktiviert. Bitte leeren Sie den TMP-Ordner.',
    'D3TPLBLOCKS_ACTBLOCKS'                => '... alle Templatebock-Einträge aktivieren',
    'D3TPLBLOCKS_ACTBLOCKS_DESC'           => 'Diese Funktion aktiviert alle Blockeinträge des gewählten Moduls in der Datenbank. Die Änderungen werden erst mit dem Leeren des TMP-Ordners aktiv.',
    'D3TPLBLOCKS_ACTBLOCKS_SUCC'           => 'Die gewählten Templateblockeinträge wurden aktiviert. Bitte leeren Sie den TMP-Ordner.',
    'D3TPLBLOCKS_CLEARDUPLICATES'          => 'Duplikate entfernen',
    'D3TPLBLOCKS_CLEARDUPLICATES_DESC'     => 'Diese Funktion entfernt alle mehrfach vorhandenen Blockeinträge in der Datenbank. Die Änderungen werden erst mit dem Leeren des TMP-Ordners aktiv.',
    'D3TPLBLOCKS_CLEARDUPLICATES_SUCC'     => 'Mehrfach vorhandene Templateblockeinträge wurden gelöscht. Bitte leeren Sie den TMP-Ordner.',

    'D3_CFG_CLRTMP_ALL'                    => '<span style="font-weight: bold;">komplett</span> leeren',
    'D3_CFG_CLRTMP_TPL'                    => '<span style="font-weight: bold;">Template</span>-Cache leeren',
    'D3_CFG_CLRTMP_DB'                     => '<span style="font-weight: bold;">Datenbank</span>-Cache leeren',
    'D3_CFG_CLRTMP_LANG'                   => '<span style="font-weight: bold;">Language</span>-Cache leeren',
    'D3_CFG_CLRTMP_MENU'                   => '<span style="font-weight: bold;">Menu</span>-Cache leeren',
    'D3_CFG_CLRTMP_CLASSPATH'              => '<span style="font-weight: bold;">ClassPath</span>-Cache leeren',
    'D3_CFG_CLRTMP_STRUCTURE'              => '<span style="font-weight: bold;">Struktur</span>-Cache (Kategorien, Hersteller, Lieferanten) leeren',
    'D3_CFG_CLRTMP_TAGCLOUD'               => '<span style="font-weight: bold;">Tagcloud</span>-Cache leeren',
    'D3_CFG_CLRTMP_SEO'                    => '<span style="font-weight: bold;">SEO</span>-Cache leeren',
    'D3_CFG_CLRTMP_MODULE'                 => '<span style="font-weight: bold;">Modul</span>-Cache leeren',
    'D3_CFG_CLRTMP_VIEWS'                  => '<span style="font-weight: bold;">View-Tabellen</span> aktualisieren',
    'D3_CFG_CLRTMP_TPLBLOCKS'              => '<span style="font-weight: bold;">Template-Block</span>-Einträge entfernen',
    'D3_CFG_CLRTMP_TPLBLOCKS_REQUACT'      => 'erfordert Neuaktivierung des Moduls',
    'D3_CFG_CLRTMP_SUBMIT'                 => 'TMP leeren',
    'D3_CFG_CLRTMP_OR'                     => 'oder',
    'D3_CFG_CLRTMP_MSG1'                   => 'TMP wird geleert.',
    'D3_CFG_CLRTMP_MSG3'                   => 'Bereinigung wird ausgeführt.',
    'D3_CFG_CLRTMP_MSG2'                   => 'Bitte warten...',
    'D3_CFG_PLEASEWAIT'                    => 'Bitte warten...',

    'D3CLRTMP_LIB_TRANSL'                  => 'TMP leeren',
    'D3CLRTMP_LIB_HELPLINK'                => 'Modul-Connector/TMP-leeren/',

    'D3_CFG_CLRTMP_STAT'                   => 'Statistik',
    'D3_CFG_CLRTMP_PATH'                   => 'Pfad:',
    'D3_CFG_CLRTMP_COUNT'                  => 'Dateianzahl:',
    'D3_CFG_CLRTMP_SIZE'                   => 'physikalische Größe:',
    'D3_CFG_CLRTMP_DELFOLDER'              => 'shopfremde Ordner werden gelöscht:',
    'D3_CFG_CLRTMP_CREATEHTA'              => '.htaccess wird erstellt:',
    'D3_CFG_CLRTMP_UPDATEVIEW'             => 'View-Tabellen aktualisieren:',
    'D3_CFG_CLRTMP_CFG_TICKERTHRESHOLD'    => 'ab dieser Anzahl TMP-Dateien wird das Löschen getickert:',
    'D3_CFG_CLRTMP_NO'                     => 'nein',
    'D3_CFG_CLRTMP_YES'                    => 'ja',
    'D3_CFG_CLRTMP_SET_DESC'               => 'Diese Einstellung können Sie unter "Modul-Connector -> Bibliotheken" verändern.',
    'D3_CFG_CLRTMP_USETICKER'              => 'Tickerverwendung ab:',
    'D3_CFG_CLRTMP_USETICKERFILES'         => ' Dateien',

    'D3_CFG_CLRTMP_DEV_LEGEND'             => 'Entwicklermodus',
    'D3_CFG_CLRTMP_DEV_DESC'               => 'Der Entwicklermodus verhindert, dass Inhalte im TMP-Verzeichnis abgelegt werden. Damit lassen sich Template-Änderungen und auch Sprachanpassungen schnell kontrollieren. Beachten Sie jedoch unbedingt, dass damit eine wichtige Performance-Optimierung des Shops deaktiviert ist. Verwenden Sie den Entwicklermodus daher nicht grundlos.<span style="font-weight: bold;">Die Verwendung verursacht längere Seitenladezeiten.</span><br>Aus diesem Grund funktioniert der Entwicklermodus auch nur mit <span style="font-weight: bold;">deaktiviertem Produktivmodus</span> des Shops.<br>Während der Verwendung des Entwicklermodus können keine Updates des D3 Modul Connectors und seinen Bibliotheken durchgeführt werden.',
    'D3_CFG_CLRTMP_DEV_BTNACT'             => 'Entwicklermodus aktivieren',
    'D3_CFG_CLRTMP_DEV_BTNDEACT'           => 'Entwicklermodus deaktivieren',
    'D3_CFG_CLRTMP_DEV_DEACTPRODUCTIVE'    => 'Deaktivieren Sie für den Entwicklermodus zwingend den Produktivmodus des Shops.',

    'D3_CFG_CLRTMP_MODULELOGGING'          => 'Logging',
    'D3_CFG_CLRTMP_CFG_SHOWCLEARTMPOPTIONS'=> 'allgemeine TMP-leeren-Funktionen ausblenden',
    'D3_CFG_CLRTMP_CFG_SHOWCLEARTMPOPTIONS_DESC' => 'Wenn Ihre Serverkonstellation die temporären Dateien des Shops in einer Weise ablegt, die ein Löschen über die Erweiterung nicht ermöglicht, können Sie hierüber die Standardlöschfunktionen ausblenden. Stehen Ihnen Systembefehle zum Löschen der Dateien zur Verfügung, können Sie diese statt dessen entsprechend konfigurieren und anzeigen lassen.',
    'D3_CFG_CLRTMP_CFG_SHOWNOHEADERFORM'   => 'Schnellzugriff auf TMP-leeren im Headerbereich <span style="font-weight: bold;">nicht</span> zeigen',
    'D3_CFG_CLRTMP_CFG_CREATE_NOHTACCESS'  => '<span style="font-weight: bold;">keine</span> .htaccess-Datei erstellen',
    'D3_CFG_CLRTMP_CFG_REMOVEFOLDERS'      => 'enthaltene shopfremde Ordner <span style="font-weight: bold;">nicht</span> löschen',
    'D3_CFG_CLRTMP_CFG_NOUPDATEVIEWS'      => 'View-Tabellen <span style="font-weight: bold;">nicht</span> aktualisieren',
    'D3_CFG_CLRTMP_CFG_EXCLUDEREGEXP'      => 'RegExp-Pattern für vom Löschen auszuschließende Elemente (ohne Delimiter)',
    'D3_CFG_CLRTMP_CFG_EXCLUDEPATTERN_DESC'=> 'Geben Sie hier einen gültigen regulären Ausdruck an, der alle Dateien matched, die <b>NICHT</b> gelöscht werden sollen. Der Delimiter (%) wird durch das Script gesetzt. Klartexte sind passend gequoted einzugeben.<br>Bsp.: <ul><li><span style="font-family: Courier, monospace;">.*</span> für alle Einträge</li><li><span style="font-family: Courier, monospace;">.*\\.svn</span> für alle Dateien mit der Endung .svn</li></ul>',
    'D3_CFG_CLRTMP_HASNOEXCLUDEPATTERN'    => 'Ausschlusspattern gesetzt',
    'D3_CFG_CLRTMP_CFG_USERACTION_DESC'    => 'Mit benutzerdefinierten Löschaufgabe können Sie das TMP-leeren-Tool um eigene Löschaufgaben erweitern. Diese Aufgaben werden nur gezeigt, wenn Sie diese befüllt haben.',
    'D3_CFG_CLRTMP_CFG_USERACTION_1'       => 'benutzerdefinierte Löschaufgabe 1:',
    'D3_CFG_CLRTMP_CFG_USERACTION_2'       => 'benutzerdefinierte Löschaufgabe 2:',
    'D3_CFG_CLRTMP_CFG_USERACTION_NAME'    => 'Name',
    'D3_CFG_CLRTMP_CFG_USERACTION_NAME_DESC' => 'Unter diesem Titel wird Ihnen die Löschaufgabe in der TMP-leeren-Oberfläche gezeigt.',
    'D3_CFG_CLRTMP_CFG_USERACTION_PATTERN' => 'RegExp-Pattern (ohne Delimiter)',
    'D3_CFG_CLRTMP_CFG_USERACTION_PATTERN_DESC' => 'Geben Sie hier einen gültigen regulären Ausdruck an, der alle Dateien matched, die gelöscht werden sollen. Der Delimiter (%) wird durch das Script gesetzt. Klartexte sind passend gequoted einzugeben.<br>Bsp.: <ul><li><span style="font-family: Courier, monospace;">.*</span> für alle Einträge</li><li><span style="font-family: Courier, monospace;">.*\\.svn</span> für alle Dateien mit der Endung .svn</li></ul> Gelöscht wird ausschließlich im TMP-Ordner des Shops.',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_DESC'  => 'Mit Systembefehlen können Sie das TMP-leeren-Tool um eigene vom Betriebssystem auszuführende Wartungsaufgaben erweitern. Diese Aufgaben werden nur gezeigt, wenn Sie diese befüllt haben.',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_1'     => 'systemabhängige Wartungsaufgabe 1:',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_2'     => 'systemabhängige Wartungsaufgabe 2:',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_NAME'  => 'Name',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_NAME_DESC' => 'Unter diesem Titel wird Ihnen die Wartungsaufgabe in der TMP-leeren-Oberfläche gezeigt.',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_CLRTMPREPLACE'  => 'ist Ersatz für TMP leeren-Funktion',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_CLRTMPREPLACE_DESC' => 'Setzen Sie den Haken, wenn dieser Befehl ein Ersatz für die TMP-leeren-Funktion ist. Andere Funktionen können so auch selbsttätig den temporären Ordner bei Bedarf leeren.',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_ICON'  => 'Icon',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_ICON_DESC' => 'Innerhalb der Schalflächen und Optionen versuchen wir, zur besseren Unterscheidung Symbole anzuzeigen. Hierfür stellen wir die Symbolbibliothek von <a href="https://fontawesome.com/" target="fontawesome">FontAwesome</a> (V 5.0.6) zur Verfügung. Geben Sie eine Symbolklasse daraus oder eine eigene CSS-Klasse an. Wenn Sie kein Symbol definieren, erfolgt auch keine Darstellung des Icons.',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_COMMAND' => 'Befehl',
    'D3_CFG_CLRTMP_CFG_SYSTEMACTION_COMMAND_DESC' => 'Geben Sie hier einen gültigen Systembefehl an, der Ihre Wartungsaufgabe startet. Dieser Aufruf wird mit exec() über PHP ans Betriebssystem gesendet. Konsolenausgaben werden als Info-Status im Log abgelegt.Systembefehle müssen über PHP gesendet werden dürfen. Der Zweck und Erfolg des Befehls wird nicht von unserem Modul kontrolliert. Bitte verwenden Sie diese Option mit Vorsicht, da Systembefehle unter Umständen großen Schaden am System anrichten können.',
    'D3_CFG_CLRTMP_CFG_SAVE'               => 'Speichern',

    'D3_CFG_CLRTMP_SUCCESS'                => 'Das TMP-Verzeichnis wurde geleert.',
    'D3_CFG_CLRTMP_VIEWUPDATESUCCESS'      => 'Die View-Tabellen wurden aktualisiert.',
    'D3_CFG_CLRTMP_VIEWUPDATENOSUCCESS'    => 'Die View-Tabellen konnten nicht aktualisiert werden.',
    'D3_CFG_CLRTMP_NOVALIDFSCLASS'         => 'TMP leeren nicht möglich - bitte aktualisieren Sie die Install-Bibliothek!',

    'D3_CFG_CLRTMP_OTHER'                  => 'sonstige Wartungsarbeiten',
    'D3_CFG_CLRTMP_GENALLIMGS'             => 'alle generierten Bilder entfernen',
    'D3_CFG_CLRTMP_GENIMGS'                => 'generierte Artikelbilder entfernen',
    'D3_CFG_CLRTMP_GENIMGS_SUCC'           => 'Die generierten Artikelbilder wurden gelöscht.',
    'D3_CFG_CLRTMP_GENIMGS_DESC'           => 'Es werden alle generierten Artikelbilder gelöscht. Die originalen Artikelbilder bleiben für die Neugenerierung bestehen. Wird nun ein Artikelbild erneut angefordert, wird dieses aus dem Quellbild neu generiert. Bitte beachten Sie, dass die Originalbilder dem Shop zur Verfügung stehen müssen. Andernfalls kann die Generierung der anzuzeigenden Artikelbilder nicht stattfinden.',
    'D3_CFG_CLRTMP_GENCATIMGS'             => 'generierte Kategoriebilder entfernen',
    'D3_CFG_CLRTMP_GENCATIMGS_SUCC'        => 'Die generierten Kategoriebilder wurden gelöscht.',
    'D3_CFG_CLRTMP_GENCATIMGS_DESC'        => 'Es werden alle generierten Kategoriebilder gelöscht. Die originalen Kategoriebilder bleiben für die Neugenerierung bestehen. Wird nun ein Kategoriebild erneut angefordert, wird dieses aus dem Quellbild neu generiert. Bitte beachten Sie, dass die Originalbilder dem Shop zur Verfügung stehen müssen. Andernfalls kann die Generierung der anzuzeigenden Kategoriebilder nicht stattfinden.',
    'D3_CFG_CLRTMP_GENMNFIMGS'             => 'generierte Herstellerbilder entfernen',
    'D3_CFG_CLRTMP_GENMNFIMGS_SUCC'        => 'Die generierten Herstellerbilder wurden gelöscht.',
    'D3_CFG_CLRTMP_GENMNFIMGS_DESC'        => 'Es werden alle generierten Herstellerbilder gelöscht. Die originalen Herstellerbilder bleiben für die Neugenerierung bestehen. Wird nun ein Herstellerbild erneut angefordert, wird dieses aus dem Quellbild neu generiert. Bitte beachten Sie, dass die Originalbilder dem Shop zur Verfügung stehen müssen. Andernfalls kann die Generierung der anzuzeigenden Herstellerbilder nicht stattfinden.',
    'D3_CFG_CLRTMP_GENVNDIMGS'             => 'generierte Lieferantenbilder entfernen',
    'D3_CFG_CLRTMP_GENVNDIMGS_SUCC'        => 'Die generierten Lieferantenbilder wurden gelöscht.',
    'D3_CFG_CLRTMP_GENVNDIMGS_DESC'        => 'Es werden alle generierten Lieferantenbilder gelöscht. Die originalen Lieferantenbilder bleiben für die Neugenerierung bestehen. Wird nun ein Lieferantenbild erneut angefordert, wird dieses aus dem Quellbild neu generiert. Bitte beachten Sie, dass die Originalbilder dem Shop zur Verfügung stehen müssen. Andernfalls kann die Generierung der anzuzeigenden Lieferantentbilder nicht stattfinden.',
    'D3_CFG_CLRTMP_GENWRPIMGS'             => 'generierte Verpackungsbilder entfernen',
    'D3_CFG_CLRTMP_GENWRPIMGS_SUCC'        => 'Die generierten Verpackungsbilder wurden gelöscht.',
    'D3_CFG_CLRTMP_GENWRPIMGS_DESC'        => 'Es werden alle generierten Verpackungsbilder gelöscht. Die originalen Verpackungsbilder bleiben für die Neugenerierung bestehen. Wird nun ein Verpackungsbild erneut angefordert, wird dieses aus dem Quellbild neu generiert. Bitte beachten Sie, dass die Originalbilder dem Shop zur Verfügung stehen müssen. Andernfalls kann die Generierung der anzuzeigenden Verpackungsbilder nicht stattfinden.',
    'D3_CFG_CLRTMP_GENIMGS_WARN'           => 'Stellen Sie bitte vorab sicher, dass alle erforderlichen Bilder als Original vorliegen und neu generiert werden können.\n\nSoll die Bereinigung jetzt durchgeführt werden?',

    'D3_CFG_CLRTMP_MISSING'                => 'Zuordnungstabellen um fehlende Einträge ergänzen',
    'D3_CFG_CLRTMP_OXARTICLECONSIST'       => 'fehlende oxartextends-Einträge nachtragen',
    'D3_CFG_CLRTMP_OXARTICLECONSIST_SUCC'  => '%1$d Einträge wurden angelegt.',
    'D3_CFG_CLRTMP_OXARTICLECONSIST_DESC'  => 'Zu jedem Artikeleintrag in der Datenbank soll es einen verknüpften Eintrag geben, der Langtexte des Artikels und weitere Informationen enthält. Speziell wenn die Datenpflege außerhalb des Shops durchgeführt wird, kann es passieren, dass der korrespondierende Datenbankeintrag nicht angelegt wird. Dies kann zu Fehlverhalten innerhalb des Shopbetriebes führen. Diese Aktion legt die fehlende Einträge leer an. Bestehende Einträge werden nicht verändert.',

    'D3_CFG_CLRTMP_ASSIGN'                 => 'Zuordnungstabellen von verwaisten Einträge bereinigen:',
    'D3_CFG_CLRTMP_ASSIGN_DESC'            => 'Werden konfigurierbare Einträge (z.B. Artikel oder Versandarten) gelöscht, bleiben manchmal alte Zuordnungseinträge stehen. Diese haben zwar keinen Einfluss auf die Abfrageergebnisse, bremsen jedoch je nach Anzahl die Abfrage aus. Diese Option bereinigt nicht auflösbare Zuordnungen.',
    'D3_CFG_CLRTMP_ASSIGNACC2ART'          => 'Zubehör-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNACC2ART_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNACC2ART_DESC'     => 'Tabelle "oxaccessoire2article"',
    'D3_CFG_CLRTMP_ASSIGNACT2ART'          => 'Aktionen-Artikel-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNACT2ART_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNACT2ART_DESC'     => 'Tabelle "oxactions2article"',
    'D3_CFG_CLRTMP_ASSIGNARTEXTENDS'          => 'Artikellangtexte',
    'D3_CFG_CLRTMP_ASSIGNARTEXTENDS_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNARTEXTENDS_DESC'     => 'Tabelle "oxartextends"',
    'D3_CFG_CLRTMP_ASSIGNDEL2DELSET'       => 'Versandartenzuordnungen',
    'D3_CFG_CLRTMP_ASSIGNDEL2DELSET_SUCC'  => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNDEL2DELSET_DESC'  => 'Tabelle "oxdel2delset"',
    'D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB'       => 'Attribut-Kategorie-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB_SUCC'  => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB_DESC'  => 'Tabelle "oxcategory2attribute"',
    'D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED'       => 'Newsletteranmeldungen',
    'D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED_SUCC'  => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED_DESC'  => 'Tabelle "oxnewssubscribed"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ACTION'          => 'Aktionszuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ACTION_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ACTION_DESC'     => 'Tabelle "oxobject2action"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ART'          => 'Artikel-Artikel-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ART_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ART_DESC'     => 'Tabelle "oxobject2article"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB'          => 'Attribut-Artikel-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB_DESC'     => 'Tabelle "oxobject2attribute"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2CAT'          => 'Artikel-Kategorie-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2CAT_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2CAT_DESC'     => 'Tabelle "oxobject2category"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2DEL'          => 'Versandkostenregelzuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2DEL_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2DEL_DESC'     => 'Tabelle "oxobject2delivery"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2DISC'          => 'Diverses-Rabatt-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2DISC_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2DISC_DESC'     => 'Tabelle "oxobject2discount"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2GROUP'          => 'Diverses-Gruppen-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2GROUP_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2GROUP_DESC'     => 'Tabelle "oxobject2group"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2LIST'          => 'Artikel-Empfehlungen-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2LIST_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2LIST_DESC'     => 'Tabelle "oxobject2list"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT'      => 'Zahlartenzuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT_SUCC' => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT_DESC' => 'Tabelle "oxobject2payment"',
    'D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST'      => 'Artikel-Auswahllisten-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST_SUCC' => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST_DESC' => 'Tabelle "oxobject2selectlist"',
    'D3_CFG_CLRTMP_ASSIGNPRICE2ART'      => 'Preis-Artikel-Zuordnungen',
    'D3_CFG_CLRTMP_ASSIGNPRICE2ART_SUCC' => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNPRICE2ART_DESC' => 'Tabelle "oxprice2article"',
    'D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT'      => 'Varianten ohne Eltern löschen',
    'D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT_SUCC' => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT_DESC' => 'Variantenartikel ohne Elternartikel können im Shop nicht mehr aufgerufen werden. Die Artikel inkl. deren Langtexte werden gelöscht.',

    'D3_CFG_CLRTMP_VARIANTS'                => 'Variantenzuordnungen bereinigen',
    'D3_CFG_CLRTMP_VARIANTPARENTISVAR'      => 'Variante gleich Elternartikel',
    'D3_CFG_CLRTMP_VARIANTPARENTISVAR_SUCC' => '%1$d Einträge wurden geändert.',
    'D3_CFG_CLRTMP_VARIANTPARENTISVAR_DESC' => 'Bei unsauberen Variantenimporten kann es vorkommen, dass ein Variantenartikel sich selbst als Elternartikel hat. Dies kann im Shop nicht aufgelöst werden. Der Artikel wird dann nicht angezeigt oder verursacht sogar einen Ladefehler. Mit dieser Aktion wird die falsche Verknüpfung aufgelöst und der Artikel zu einem Einzelartikel gewandelt. Sie können diesen dann erneut bearbeiten. Hat der Artikel keinen eigenen Titel, wird dieser mit "unassigned article" benannt.',
    'D3_CFG_CLRTMP_VARIANTACTIVE'           => 'Varianten von inaktiven Elternartikel deaktivieren',
    'D3_CFG_CLRTMP_VARIANTACTIVE_SUCC'      => '%1$d Einträge wurden geändert.',
    'D3_CFG_CLRTMP_VARIANTACTIVE_DESC'      => 'Bei inaktiven Elternartikeln ergeben aktive Varianten nicht viel Sinn. Diese Option entfernt den Aktiv-Haken bei Variantenartikeln, die einen inaktiven Elternartikel haben. Diese Funktion aktiviert andere Artikel hingegen nicht. Ohne Berücksichtigung bleiben auch Datums-Zeit-Angaben für die Aktiv-Bestimmung.',

    'D3_CFG_CLRTMP_INACTIVE'                => 'inaktive Einträge aus Zuordnungen entfernen',
    'D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES'   => 'inaktive Länder',
    'D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_SUCC'     => '%1$d Einträge wurden gelöscht.',
    'D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_DESC'     => 'Bei der Einrichtung von Versandkosten werden schnell mal "alle Länder" zugewiesen. Sind diese nicht aktiv, benötigt dies nur unnötig Zeit für die Selektion. Diese Option entfernt inaktive Länder aus der Zuordnung. Werden die Länder wieder aktiviert, muss die Zuordnung erneut durchgeführt werden.',
    'D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES'   => 'leere Kategorien abschalten',
    'D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES_SUCC'     => '%1$d Einträge wurden deaktiviert.',
    'D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES_DESC'     => 'Der Shop bietet die Möglichkeit, leere Kategorien aus dem Kategoriebaum dynamisch zu entfernen. Dies wird bei jedem Seitenaufruf erneut durchgeführt und verbraucht viel Leistung. Bleiben die Kategorien auch zukünftig leer, können diese permanent deaktiviert werden. Bedingung ist, dass darin keine aktiven Artikel liegen. Der Artikellagerstand wird für die Aktivprüfung nicht berücksichtigt. Ebenfalls nicht berücksichtigt werden Kategorien, die weitere Unterkategorien enthalten.',

    'D3_CFG_CLRTMP_GENERAL_CLEARDB'        => 'Möglicherweise werden Datenbankeinträge gelöscht. Legen Sie bitte vorab zwingend eine Sicherung der Datenbank an.\n\nSoll die Bereinigung jetzt durchgeführt werden?',
    'D3_CFG_CLRTMP_GENERAL_CHANGEDB'       => 'Möglicherweise werden Datenbankeinträge verändert. Legen Sie bitte vorab zwingend eine Sicherung der Datenbank an.\n\nSoll die Anpassung jetzt durchgeführt werden?',
    'D3_CFG_MNT_CHECKALL'                  => 'alle Einträge prüfen',
    'D3_CFG_MNT_SUBMIT'                    => 'Aktion durchführen',
    'D3_CFG_MNT_SUCCESS'                   => 'Die Wartung wurde durchgeführt.',

    'D3_CFG_CLRTMP_CLI_COMMON_RUNFROMCLI'  => 'Dieses Script muss von der Befehlszeile aus ausgeführt werden.',
    'D3_CFG_CLRTMP_CLI_COMMON_NOVALIDTYPE' => 'Kein gültiger Typ definiert.',
    'D3_CFG_CLRTMP_CLI_HELP'               => 'Löscht Objekte aus dem TMP-Ordner.',
    'D3_CFG_CLRTMP_CLI_OPTION_VERSION'     => 'zeigt Version',
    'D3_CFG_CLRTMP_CLI_OPTION_QUIET'       => 'verhindert die Anzeige der Ausgabe',
    'D3_CFG_CLRTMP_CLI_OPTION_LANG'        => 'optional - Sprache der ausgegebenen Meldungen, mögliche Werte sind: "%1$s"',
    'D3_CFG_CLRTMP_CLI_OPTION_HELP'        => 'Diesen Hilfetext anzeigen und den Aufruf verlassen.',
    'D3_CFG_CLRTMP_CLI_OPTION_NOCOLORS'    => 'Verwendet keine Farben in der Ausgabe. Nützlich bei der Weitergabe der Ausgabe an andere Tools oder Dateien.',
    'D3_CFG_CLRTMP_CLI_OPTION_LOGLEVELS'   => 'Kleinstes Level der anzuzeigenden Meldungen. Standard ist "info". Gültige Stufen sind: "%1$s".',
    'D3_CFG_CLRTMP_CLI_COMMAND'            => 'Dieses Tool akzeptiert einen Befehl als ersten Parameter, wie unten beschrieben:',
    'D3_CFG_CLRTMP_CLI_COMMAND_RUN'        => 'Ausführen des Löschauftrages',
    'D3_CFG_CLRTMP_CLI_ARGUMENT_TYPE'      => 'Typen der zu löschenden Objekte, mögliche Werte sind: "%1$s"',
    'D3_CFG_CLRTMP_CLI_ARGUMENT_ENCLOSER'  => '", "',
    'D3_CFG_CLRTMP_CLI_FINISHED_SUCCFESSFULLY' => 'Das Script wurde erfolgreich beendet.',
);