# D³ Modul Connector - Changelog
All notable changes to this project will be documented in this file.

## Table of Contents
- [Unreleased](#cUnreleased)
- [5.1.1.1](#c5111)
- [5.1.1.0](#c5110)
- [5.1.0.1](#c5101)
- [5.1.0.0](#c5100)
- [5.0.0.0](#c5000)
- [4.5.0.0](#c4500)
- [4.4.1.0](#c4410)
- [4.4.0.0](#c4400)
- [4.3.7.0](#c4370)
- [4.3.6.2](#c4362)
- [4.3.6.1](#c4361)
- [4.3.6.0](#c4360)
- [4.3.5.0](#c4350)
- [4.3.4.1](#c4341)
- [4.3.4.0](#c4340)
- [4.3.3.7](#c4337)
- [4.3.3.6](#c4336)
- [4.3.3.5](#c4335)
- [4.3.3.4](#c4334)
- [4.3.3.3](#c4333)
- [4.3.3.2](#c4332)
- [4.3.3.1](#c4331)
- [4.3.3.0](#c4330)
- [4.3.2.2](#c4322)
- [4.3.2.1](#c4321)
- [4.3.2.0](#c4320)
- [4.3.1.1](#c4311)
- [4.3.1.0](#c4310)
- [4.3.0.0](#c4300)
- [4.2.2.0](#c4220)
- [4.2.1.0](#c4210)
- [4.2.0.1](#c4201)
- [4.2.0.0](#c4200)
- [4.1.0.1](#c4101)
- [4.1.0.0](#c4100)
- [4.0.2.0](#c4020)
- [4.0.1.0](#c4010)
- [4.0.0.2](#c4002)
- [4.0.0.1](#c4001)
- [4.0.0.0](#c4000)

## Unreleased<a name="cUnreleased"></a>

## 5.1.1.1 - 2018-06-06 - #7578<a name="c5111"></a>
### Fixed
- Einstellungs-Überladung korrigiert - verwendet Einstellungen der Hauptsprache, wenn in aktueller Sprache keine Einstellungen gespeichert wurden

### Changed
- kleine Textänderungen in der Installationsroutine

## 5.1.1.0 - 2018-05-15 - #7481<a name="c5110"></a>
### Added
- Datenbank-Query-Cache-Check hinzugefügt
- sh-Vorlagen-Templates für PHP 7.1 und 7.2 bei Profihost hinzugefügt

### Changed
- Freigabe für OXID eShop 6.2
- FontAwesome auf Version 5 aktualisiert
- Lizenzformulare im Admin werden erst auf Anforderung geladen 
- zusätzliche Admin-Bedienelemente werden nur bei aktiviertem Connector dargestellt
- vendormetadata entfernt

### Fixed
- Speicherung mehrsprachiger Konfigurationseinstellungen korrigiert (#7476)
- getSqlActiveSnippet verwendet ForceCoreTable-Parameter
- fehlende Templates in Metadata nachgetragen

## 5.1.0.1 - 2018-04-26 - #7403<a name="c5101"></a>
### Changed
- Klassenname von d3counter korrigiert (#7393)

## 5.1.0.0 - 2017-12-18 - #7482<a name="c5100"></a>
### Added
- composerfähige Installation
- Migrationsqueries (von OXID 4.10 / 5.x)
- Bereinigung der genierten Bilder auch für andere Objekttypen

### Changed
- als deprecated markierten Code entfernt

## 5.0.0.0 - 2017-11-23 - #6951<a name="c5000"></a>
### Added
- Log-Export auch für modulspezifische Log-Auswertungen möglich
- Template-Block-Verwaltung eingefügt
- Versionsnummern-Konverter für sauberes Handling mit der B2B-Edition integriert

### Changed
- Umarbeitung für OXID 6

## 4.5.0.0<a name="c4500"></a>
- Icon-Bibliothek Font Awesome auf Version 4.7.0 aktualisiert
- Admin-Url-Generator korrigiert (verhindert seltenes Logout beim Verwenden dieser URLs)
- Filter für Transactionlog eingefügt
- #5718 + #5717: zusätzliche Indizes für d3tranactionlog und zugehörige Tabellen gesetzt
- #5740: Tabellenengines auf InnoDB umgestellt
- #5684: Log-Exporttyp "CSV" entfernt
- ClearTmp-Infobereich umgestellt
- Modul auf ionCube-Verwendung angepasst
- Dashboard zeigt Informationen zu relevanten Expire-Dates der installierten Module
- Testlizenzen werden im Modulnamen entsprechend dargestellt
- cURL folgt Redirect-Angaben
- Lizenz prüft Shop-Edition
- Feature-Bits integriert
- Zeichensatz-Vorbelegung für Update-Dateien eingefügt
- Remotecache optimiert
- Hinweis bei versuchter Deaktivierung des Modul-Connectors eingefügt
- Protokoll von allgemeinen Shop-Exceptions werden nicht dem Connector zugeordnet
- Update- und Lizenzserver werden über https angesprochen
- Modul-Titel in UTF-8-Installationen korrigiert
- SQL-Exporte korrigiert
- #6329: fehlerhafte Datenbankstruktur bei lückenhaften Sprach-IDs korrigiert

## 4.4.1.0<a name="c4410"></a>
- Meldung über unerfüllte Connector-Abhängigkeit kann temporär übergangen werden
- "Lizenzdetails" zeigt auch kompletten Lizenzschlüssel
- automatische Installation: Interaktion mit Backenduser für kundenspezifische Installation (#5549)
- Theme-Mapping auf modulspezifische Variablennamen umgestellt
- Code-Optimierungen, um Notices zu vermeiden

## 4.4.0.0<a name="c4400"></a>
- verarbeitet mCrypt-vermeidende Lizenzinformationen
- Theme-Mapping eingefügt
- konfigurierbare Mandantenunabhängigkeit bei relevanten Installationsaufgaben eingefügt
- d3log-Tabellenstruktur optimiert
- Logtyp-Listen werden nach Priorität sortiert
- für Einsatz mit ionCubeLoader (anstelle von Zend Guard) angepasst (#5489)
- veraltete Methodenaufrufe ersetzt
- .htaccess-Änderungen für Apache 2.4 korrigiert

## 4.3.7.0<a name="c4370"></a>
- Installationsassistent: Funktion zur Änderung der Tabellen-Engine eingefügt
- .htaccess-Änderungen für Apache 2.4 eingefügt

## 4.3.6.2<a name="c4362"></a>
- Lizenzablehnungsgründe werden in Log-Tabelle geschrieben
- Hintergrund-Logo in Adminbereichen entfernt

## 4.3.6.1<a name="c4361"></a>
- Fehlerbehebung für nicht verfügbares Objekt während Neuinstallation

## 4.3.6.0<a name="c4360"></a>
- Methode zur Ermittlung der Parent-Theme-Id eingefügt
- Systembefehle können als klickbare Wartungsaufgaben eingerichtet werden (Ausführbarkeit via PHP vorausgesetzt)
- "TMP leeren" ist als "ausblendbar" konfigurierbar
- Connector-Versions-Prüfung für Module optimiert
- "TMP leeren"-Optik an eShop 4.10.x angepasst
- Downloads berücksichtigen PHP 5.5 und 5.6
- Admin-Layout für optimale Darstellung der Module angepasst (deaktivierbar)
- D3-Logo im Backend wird via SSL geladen, wenn SSL aktiviert
- Menüicons eingefügt
- Log für Lizenzabfrage eingefügt
- Seitentitel korrigiert

## 4.3.5.0<a name="c4350"></a>
- Kompatibilität für OXID 4.10.x / 5.3.x eingefügt
- nicht funktionierenden Entwicklermodus korrigiert
- Icons auf FontAwesome-Schriftarten umgestellt
- Modulinstallation prüft auf vordefinierte Connectorversion (sofern im Modul angegeben)
- fehlende Templateparameter ergänzt

## 4.3.4.1<a name="c4341"></a>
- "verfügbare Module"-Liste überarbeitet
- Laden vom ModCfg-Instanzen bei Mandantenwechsel optimiert
- Bugfix für gelöschte Multishop-Tabellen-Standardeinträge
- vermeidet Initialisierung eines undefinierten List-Objektes in Adminlist

## 4.3.4.0<a name="c4340"></a>
- zusätzliche Indizes zu log2transactionlog-Tabelle eingefügt
- vermeidet die Verwendung mehrerer oxconfig-Instanzen
- Shoprevisionsprüfung korrigiert
- Portnummernprüfung in Domaincheck eingefügt (#4875)
- Bugfix für Install/Update von ModCfg-Einträgen in Multishopinstallationen
- Aktualisierung der Metadaten überarbeitet

## 4.3.3.7<a name="c4337"></a>
- Mandantenwechsel in automatischer Installation für überladene oxconfig-Klasse angepasst
- Prüfen-Funktion in Wartung integriert
- ModCfgExceptions um zusätzliche Debug-Daten ergänzt
- Navigationslinks in PageNavigation um Sprachparameter des Frontends ergänzt
- fehlendes oxtimestamp-Feld nachgetragen
- Multimandanteninstallation über config-Parameter deaktivierbar (nur EE)

## 4.3.3.6<a name="c4336"></a>
- Beschreibungstext für Installationsschritte eingefügt
- Multishop-Installation optimiert
- Fehler bei Standard-Datenbankfeldwerten = null korrigiert
- unbekannte (unbenutzte) Lizenzoptionen werden ausgeblendet

## 4.3.3.5<a name="c4335"></a>
- Lizenzprüfung optimiert
- Bugfix für wechselnde Installationsmethode bei Meldungsaktion
- Bugfix für fehlerhaft zusammengestellte SQL-Queries bei primary indexes
- Bugfix für Fehlermeldung bei differierenden Modulversionsnummern im Support-Tab

## 4.3.3.4<a name="c4334"></a>
- Eingabefeld für Aktivierungsident und Lizenzschlüssel zusammengefasst
- Installationstemplates optimiert
- Auflistung der Updatescripte prüft auf Existenz der Verzeichnisse innerhalb der OXID-Verzeichnisliste
- Bugfix für unvollständige Datenbankabfrage bei individuellen oxartextends-Felder innerhalb der Wartungsaufgaben
- Installationsassistent: Endlosschleife bei "Meldung bestätigen" in bestimmten Konstallationen korrigiert
- Deinstallationsanleitung in Dokumentation aufgenommen

## 4.3.3.3<a name="c4333"></a>
- Bugfix für falsche Methodendefinition in 4.7/4.8
- Admin-Templates optimiert

## 4.3.3.2<a name="c4332"></a>
- Wartungsaufgaben von Nicht-Shop-Standardfeldern bereinigt
- Installationsassistent: Index-Cache-Nutzung bei "Tabelle erstellen" optimiert
- Installationsassistent: Ausführung im Debug-Modus korrigiert
- Installationsassistent: Prüfung auf veraltete Indizes
- Installationsassistent: Metarefresh wird nur für registrierte Module ausgeführt
- Installationsassistent: veraltete Parameter entfernt
- Installationsassistent: temporäre Aktion wird generell zurückgesetzt
- Update-Scriptliste optimiert
- Fehler bei nicht sofort verfügbarer oxmodule-Erweiterung unterbunden
- Installationsassistent: "Meldung bestätigen" korrigiert
- Precheck auf aktuelle Version angepasst
- Endlosschleife bei Updates von alten Connector-Versionen beseitigt
- Exceptionbehandlung für Fehler beim Laden des Konfigurationsobjektes eingefügt
- Notices werden in Scriptdurchlauf vermieden

## 4.3.3.1<a name="c4331"></a>
- Moduldownloads für automatische Updates an Serveränderungen angepasst
- Fehlerprotokoll für abgebrochene curl-Verbindungen eingefügt
- Precheck angepasst

## 4.3.3.0<a name="c4330"></a>
- SH-Generator um neue PHP-Versionen vervollständigt
- Bugfix in Installationsautomatik bei Installation des FileUpload-Moduls
- unnötige Index-Konvertierungen beim Anlegen neuer Tabellen korrigiert

## 4.3.2.2<a name="c4322"></a>
- verhindert noch nicht verfügbares Update unter PHP 5.5 / PHP 5.6

## 4.3.2.1<a name="c4321"></a>
- keine "Ungültige Lizenz"-Ausnahmebehandlung bei inaktiven Modulen in Modulverwaltung (z.B. beim Ersteintrag des Lizenzschlüssels)
- Installationsoption "Indizes prüfen" prüft auf passende Feldliste
- Sprachermittlung aus Datenbankfeldnamen korrigiert

## 4.3.2.0<a name="c4320"></a>
- Konfigurationsvariante integriert
- Fehlerbehandlung optimiert
- Datenbankabfragen optimiert
- Installationsassistent: Eintragskonvertierung für Multilang-Tabellen angepasst
- Installationsassistent: Update-Queries werden um nicht definierte Felder vervollständigt
- Installationsassistent: Einfüge-Operation versucht nicht, bisherige Datenbankeinträge zu laden
- Installationsassistent: Update-Query vervollständigen Multilang-Tabellen
- Installationsassistent: Suchalgorithmus für Setup-Anweisungsdateien optimiert
- Installationsassistent: case insensitivity in Enum-Feldtypprüfung integriert

## 4.3.1.1<a name="c4311"></a>
- Abbruch von Modulinstallation durch fehlerhaft generierte Datenbankabfrage beseitigt

## 4.3.1.0<a name="c4310"></a>
- veraltete Moduldateien werden gelöscht
- fehlerhafte Vervollständigung zu aktualisierender Datenbankeinträge korrigiert
- Dateilisten-Cache optimiert
- Prüfung auf nicht genutzte Dateien verwendet "block"-Einträge aus metadata
- konfigurierbare Pagination
- Installationsoption "confirmMessage" optimiert

## 4.3.0.0<a name="c4300"></a>
- Verwendung von Multilang- und Multishop-Tabellen (via View-Tabellen) statt interner Anpassung
- Installationsoption: Anzeige unregistrierter Moduldateien
- Installationsoption: DB-Strukturänderungen (Felder / Indizes) können einzeln aktualisiert werden
- Installationsoption: confirmMessage speichert Confirmation
- nicht mehr verwendete Installsteps (Version 1) entfernt
- übersprungene Installationsschritte gelten nur noch für spezifische Modulversion
- Blog Feed Caching integriert
- (optionale) Modulaktivierung in automatische Installation eingefügt

## 4.2.2.0<a name="c4220"></a>
- Kompatibilitätshandling für oxmodule::getModuleFullPath eingefügt
- Anpassung der Lesereihenfolge für Remoteaufrufe

## 4.2.1.0<a name="c4210"></a>
- erweitertes Caching für Updateinformationen integriert (#3267)
- SH-Generator integriert (#3236)
- Multishop-Registrierung (EE) für automatische Installation integriert (#3248)
- Modulprofile erhalten Multishophandling (ab EE 5.2.0)
- fehlertolerantere Abfrage auf "duplicated tpl blocks"

## 4.2.0.1<a name="c4201"></a>
- nicht verwendete Klassen aus metadata entfernt
- Precheck um weitere Anforderungen ergänzt
- Remote module data werden gecached
- Modulupdates werden nur für den aktuellen Mandanten geprüft (nur EE)
- Shopbit-Berechnung nach d3bit verschoben

## 4.2.0.0<a name="c4200"></a>
- Umsetzung für OXID 4.9 / 5.2 (abwärts kompatibel bis 4.7 / 5.0)

## 4.1.0.1<a name="c4101"></a>
- Bugfix für nicht ausführbares TMP leeren während Connector-Installation integriert

## 4.1.0.0<a name="c4100"></a>
- Wartungsfunktionen eingefügt
- Modulprofile können Datentyp wechseln
- Empfänger für Lizenzhinweis-Mails ist anpassbar
- Schnellzugriff für TMP leeren integriert
- Modulauflistungen werden sortiert
- TMP leeren kann vordefinierte Dateien vom Löschen aussparen
- Installationsoption "alte Moduldateien löschen" integriert

## 4.0.2.0<a name="c4020"></a>
- fehlende Klassenregistrierung "d3_cfg_log_cleanup" nachgetragen
- Installationsoption "einmalige Hinweismeldung" integriert
- Mehrfachmeldungen bei veralteter Lizenz korrigiert

## 4.0.1.0<a name="c4010"></a>
- Ablösung der manuell gepflegten Anforderungsprüfung zur automatischen Installationsprüfung
- Bugfix für d3log-Exception bei Fehler 404-Seite eingefügt

## 4.0.0.2<a name="c4002"></a>
- Cache-Liste downloadbarer Bibliotheken wird bei Update bereinigt
- Update-Assistent wird bei Ausführung des Installationsassistenten unterdrückt

## 4.0.0.1<a name="c4001"></a>
- Prüfung auf existierende Parent-Methode korrigiert

## 4.0.0.0<a name="c4000"></a>
- 4 Basisbibliotheken werden in einer Gesamtbibliothek zusammengefasst
- Prüfung auf existierende Parent-Methoden prüft nun auch in Modul-Erweiterungen (optional)

---

# ModCfg

## 3.10.3.0
- Bibliothek-Module werden nicht als "inaktiv" markiert, wenn sich Extensions ändern
- Parameter-Container korrigiert

## 3.10.2.1
- Metadaten korrigiert

## 3.10.2.0
- Parameter-Container eingefügt
- Kurzbeschreibungsfeld für Profile gekürzt

## 3.10.1.0
- interne Strukturänderungen

## 3.10.0.2
- Modul-Meta-Refresh deaktiviert nicht die betroffenen Module
- Admin-Profilliste filtert nach Gruppen
- Profile um Kurzbeschreibungsfeld ergänzt
- Aktiv-Prüfung für Profile ist Admin-Liste korrigiert
- Methodenreichweite verändert (_d3getFolderTitle() -> public)
- Vermeiden von Notices

## 3.10.0.1
- Layoutfehler korrigiert

## 3.10.0.0
- Umstellung auf "automatische Installation"
- Seitennavigation enthält Shop-Parameter (EE)

## 3.9.0.7
- "lokale Verwendung" der Lizenzschlüssel korrigiert
- Verwendung der Revisionsnummer gegen Versionsnummer getauscht

## 3.9.0.6
- inkompatibler Templateaufruf bereinigt
- isAvailable-Check korrigiert

## 3.9.0.5
- Aktivierung korrigiert, wenn Admin unter SSL läuft
- inaktive Listeneinträge werden in Admin gezeigt
- fehlendes pagenavigation-Template eingefügt

## 3.9.0.4
- Lizenzschlüsselprüfung korrigiert

## 3.9.0.3
- Verfügbarkeitsprüfung prüft auf korrekte Anzahl der Basis-Bibliothek-Einträge
- Lizenzcache korrigiert
- "Eintrag duplizieren" speichert keine Einstellungen

## 3.9.0.2
- problematisches "on update current_timestamp" aus Struktur entfernt

## 3.9.0.1
- Fehler beim Speichern der Log-Einstellungen korrigiert

## 3.9.0.0
- Modulprofile eingefügt

## 3.8.0.0
- PHP 5.4 Überprüfung angepasst
- Fehlerbehandlung erweitert
- Erweiterbarkeit verbessert

## 3.7.0.1
- Feldvererbung korrigiert (Moduleinstellungen waren nicht in Sprache >0 abrufbar

## 3.7.0.0
- Übersicht über verfügbare (nicht installierte) Module eingefügt
- erweiterte Counter integriert

## 3.6.0.0
- Enterprise Edition: Rechte&Rollen auch für D3-Module nutzbar

## 3.5.0.0
- Verwaltung weiterer Keysets integriert (Nutzung der Serials durch andere Partner)

## 3.3.0.0
- Lizenzaktivierung über D3-Server aktiviert

## 3.2.0.0
- Template-Includes vereinheitlicht

## 3.1.0.0
- Aktivierungs-Assistent eingearbeitet

## 3.0.0.4
- Autoupdate korrigiert
- Smarty-Plugins in Modul-Verzeichnis verschoben

## 3.0.0.3
- Fehler in der ModCfg-Instanz-Verwaltung behoben

## 3.0.0.1
- Lizenzprüfung für lokale Installtionen korrigiert

---

# Install

## 2.6.1.0
- Fehlermeldung in Installation entfernt
- Ausführung in CLI stoppt Ausführung nicht
- UTF-DB-Inhalte werden vor Update konvertiert
- Installationsassistent prüft auch in "setup"-Verzeichnis auf Install-Scripte
- Behandlung für Erweiterung von ENUM-Feldern eingefügt

## 2.6.0.1
- verhindert weitere Meta-Refresh-Aktionen

## 2.6.0.0
- Bibliotheken verwenden "automatische Installation"
- Collation-Cache korrigiert
- Modul-Prüfungen werden auf Versionsnummern anstatt Revisionsnummern durchgeführt
- zeigt Hinweis, wenn Bibliotheken automatisch deaktiviert werden
- DB-Index-Typen korrigiert
- manueller Installationsstart setzt SkipFlag zurück

## 2.5.0.1
- PRIMARY INDEX Query angepasst

## 2.5.0.0
- Kollationshandling in automatische Installation eingefügt

## 2.4.1.0
- RegExp-Generator implementiert

## 2.4.0.1
- Groß-/Kleinschreibungsabhängiger Feld-Cache eingefügt
- genereller SQL- und CSV-Export eingefügt
- Installation bricht bei fehlenden Methoden ab
- simpleXML erweitert
- Datenverschiebefunktion für automatische Installation eingefügt
- NULL-Handling bei automatischer Installation verbessert
- Admin-Navigation wird nach Installation aktualisiert

## 2.4.0.0
- weitere Methoden für automatische Installation eingefügt
- PHP 5.4-Überarbeitungen

## 2.3.0.2
- Verlinkung geändert
- zusätzliche DB-Feld-Eigenschaften implementiert

## 2.3.0.0
- Performance-Optimierung
- Installation stellt Anzahl der Steps dar

## 2.2.0.3
- Bug in Rename-Job beseitigt

## 2.2.0.2
- Performance-Optimierung
- oxconfig-Methoden eingefügt

## 2.2.0.1
- fehlerhafte Query-Generierung bei Rename-Updates korrigiert

## 2.2.0.0
- Feature in Updateinstallation: Informationsseite

## 2.1.0.8
- Kommunikation zum Updateserver sehr langsam: behoben

## 2.1.0.7
- Löschen- und Entfern-Methoden eingefügt, Cache-Behandlung korrigiert

...

## 2.0.0.2
- ModCfg-Instanz-Handler angepaßt
- Demoshopmodus anzeigen lassen, wenn Funktionseinschränkungen aktiv sind
- DB-Index-Installation eingefügt
- Lizenz-Aktivierung eingearbeitet

## 2.0.0.1
- falsche Weiterleitung bei automatischer Installation korrigiert

---

# Logging

## 2.4.1.0
- gruppierte Loglevel definiert
- Infomail liefert aufschlussreichere Daten
- Smarty-Fehler können geloged werden
- leere Logs werden nicht geschrieben
- Log-Textfeld auf Typ "Text" vergrößert

## 2.4.0.0
- verwendet automatische Installation

## 2.3.0.2
- Transactionlog neue Methode hinzugefügt

## 2.3.0.1
- Error-Info-Mail korrigiert
- Transaction-Log nutzbar integriert

## 2.3.0.0
- Transaction-Log umgearbeitet

## 2.2.0.0
- Transaction-Log integriert
- Log speichert nun Profil-ID

## 2.1.0.1
- DB-Struktur für bessere Performance verändert
- verwendet zentrale Export-Methoden
- löscht nur Log-Einträge des gewählten Mandanten
- Export ist nach Klassen und Sessions selektierbar
- Exceptions immer anzeigbar (optional)
- Exceptions werden in Log geschrieben

## 2.1.0.0
- Log-Übersicht kann modulspezifisch in andere Erweiterungen integriert werden

## 2.0.0.6
- SQL-Export liefert alle Zeilen
- DB Struktur verändert (auto increment index)

## 2.0.0.5
- Log-Bit-Beschreibung geändert
- oxshopcontrol::start() übergibt komplette Parameterliste

## 2.0.0.4
- Tabellentyp eingefügt
- Level-Benennung geändert

...

## 2.0.0.1
- Testmodus implementiert
- DB-Indizes korrigiert

---

# ClearTmp

## 2.1.0.0
- verwendet "automatische Installation"

## 2.0.0.4
- Methodendeklaration korrigiert
- Templates angepasst

## 2.0.0.3
- Methodendeklaration korrigiert
- Frontend-Clear-TMP eingefügt, kann z.B. Views ohne Adminbereich aktualisieren

## 2.0.0.2
- verwendet registrierte Template anstelle von festen Pfadnamen

## 2.0.0.1
- ModCfg-Instanz-Handler aktualisiert
