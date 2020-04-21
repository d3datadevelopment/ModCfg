---
title: Changelog
---

## 5.3.1.0 (2020-04-21)

### Added
- Instanz des DIC-Handlers kann entfernt werden
- ContainerMockCreator hinzugefügt

### Changed
- d3metadata wird vom Kompilieren ausgenommen
- Hinzufügen und Entfernen zusätzlicher Logtypes übernimmt die Änderung automatisch in die aktuelle Loginstanz
- ModprofileList verwendet Parameter von Prepared Statements

### Fixed
- Modprofile View-Tabellenname wird bei Nicht-Multilangfeldern subshopabhängig vergeben

---

## 5.3.0.0 (2020-03-31)

### Added
- Kompatibilität zu OXID 6.2 hergestellt

---

## 5.2.2.0 (2020-03-25)

### Added
- CLI-Aufruf, um TMP-Ordner gezielt zu leeren

### Changed
- Anforderungen von oxideshop-metapackage zu oxideshop-ce für Projekte ohne Metapackage geändert
- Standardsortierung für Log-Eintraäge im Admin angepasst

### Fixed
- typografische Anführungszeichen in der Dokumentation ersetzt

---

## 5.2.1.0 (2019-11-07)

### Added
- Support für MariaDB 10.2.x eingefügt

### Changed
- Quellen für die Assetgenerierung eingefügt
- HelpCenter-Links angepasst
- Dokumentation angepasst

### Fixed
- passend registrierte Moduldateien werden nicht mehr als überzählig gemeldet
- Abbrüche bei Command Line Aufrufen entfernt
- fehlerhaften Datenbanktabellennamen in der Installationprüfung korrigiert

---

## 5.2.0.2 (2019-07-16)

### Added
- UnitTests eingefügt

### Changed
- veraltetete Bibliothek (guzzle/http) ersetzt

### Fixed
- Anzeige verfügbarer Modulversionen im Admin korrigiert
- fehlenden Tabellenindex (Datenbank) für unique oxmapid-Felder eingefügt
- Datenbankabfrage für multilangbeschränkte modprofile-Objekte korrigiert

---

## 5.2.0.1 (2019-05-13)

### Fixed
- Exception bei OpenSSL Decrypt-Meldungen verhindert, da dies unerwartetete Abbrüche verursacht

---

## 5.2.0.0 (2019-05-07)

### Added
- integriert Unit-tests für eigene Testabdeckung und als Basis für andere Module
- Dependency Injection Container hinzugefügt
- Wave-Theme zum Theme-Mapping hinzugefügt
- Commandline Modulsetup Task hinzugefügt

### Changed
- Datenablage optimiert, verhindert Fehlzuweisung in Multimandanten-Installationen
- Lizenzverarbeitung optimiert
- Prepared Statement SQL Generator ergänzt
- Featurebit-Berechnung angepasst
- Klassenkombinationen aufgelöst

---

## 5.1.1.7 (2018-12-14)

### Changed
- Installationsprozess verhindert unnötigen Multishoptabellenprüfung in Nicht-Enterprise-Shops
- Dokumentation angepasst
- Systemprüfung entfernt

---

## 5.1.1.6 (2018-11-29)

### Changed
- prepared statement Query-Generator für Doctrine named parameters erweitert

### Fixed
- Lizenzdatenspeicherung für Mandantenwechsel innerhalb eines Prozesses angepasst
- korrigiert veraltete metadata-Informationen in passendem Mandanten (anstatt nur im 1.)

---

## 5.1.1.5 (2018-10-23)

### Added
- Unterstützung für Feldtyp "set" in mySQL-Datenbanken

### Changed
- Expired-Info-Mail wird erst nach erfolgreichem Ermitteln des Aktiv-Status verwendet (verursachte in seltenen Fällen eine Endlosschleife)
- Erweiterungsregistrierung des Benutzerrollen-Backends verwendet FQNS

---

## 5.1.1.4 (2018-09-17)

### Added
- Query Generator für prepared statements (nur für Debugging)

### Changed
- konkrete Klassennamen durch fully qualified namespaces ersetzt
- Pagenavigation Generator aktualisiert
- fängt Ausnahmen in automatischer Installation ab und zeigt deren Meldung an
- CSV-Generator optimiert

---

## 5.1.1.3 (2018-08-30)

### Added
- Stylesheets werden aus LESS-Dateien erzeugt
- Zufallsgenerator für Zeichenketten hinzugefügt

### Changed
- vollständige Kompatibilität zur OXID Compilation 6.1.0 hergestellt
- Dokumentation zu HTML-Format geändert
- Moduldateiliste kann aus Namespaceklassennamen der Metadata generiert werden

---

## 5.1.1.2 (2018-08-10)

### Added
- Migrationsdatei zu Oxid 6.x hinzugefügt (docs/migration_to_OXID_6.x.md)

### Changed
- Kompatibilität zu Oxid Shop 6.0.3 und der Oxid Compilation 6.1.0 hergestellt

---

## 5.1.1.1 (2018-06-06)

### Fixed
- Einstellungs-Überladung korrigiert - verwendet Einstellungen der Hauptsprache, wenn in aktueller Sprache keine Einstellungen gespeichert wurden

### Changed
- kleine Textänderungen in der Installationsroutine

---

## 5.1.1.0 (2018-05-15)

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

---

## 5.1.0.1 (2018-04-26)

### Changed
- Klassenname von d3counter korrigiert (#7393)

---

## 5.1.0.0 (2017-12-18)

### Added
- composerfähige Installation
- Migrationsqueries (von OXID 4.10 / 5.x)
- Bereinigung der genierten Bilder auch für andere Objekttypen

### Changed
- als deprecated markierten Code entfernt

---

## 5.0.0.0 (2017-11-23)

**Minor version upgrade notice: there are some backward-incompatible changes to this release.**

### Added
- Log-Export auch für modulspezifische Log-Auswertungen möglich
- Template-Block-Verwaltung eingefügt
- Versionsnummern-Konverter für sauberes Handling mit der B2B-Edition integriert

### Changed
- Umarbeitung für OXID 6

---

## 4.5.0.0

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

---

## 4.4.1.0

- Meldung über unerfüllte Connector-Abhängigkeit kann temporär übergangen werden
- "Lizenzdetails" zeigt auch kompletten Lizenzschlüssel
- automatische Installation: Interaktion mit Backenduser für kundenspezifische Installation (#5549)
- Theme-Mapping auf modulspezifische Variablennamen umgestellt
- Code-Optimierungen, um Notices zu vermeiden

---

## 4.4.0.0

- verarbeitet mCrypt-vermeidende Lizenzinformationen
- Theme-Mapping eingefügt
- konfigurierbare Mandantenunabhängigkeit bei relevanten Installationsaufgaben eingefügt
- d3log-Tabellenstruktur optimiert
- Logtyp-Listen werden nach Priorität sortiert
- für Einsatz mit ionCubeLoader (anstelle von Zend Guard) angepasst (#5489)
- veraltete Methodenaufrufe ersetzt
- .htaccess-Änderungen für Apache 2.4 korrigiert

---

## 4.3.7.0

- Installationsassistent: Funktion zur Änderung der Tabellen-Engine eingefügt
- .htaccess-Änderungen für Apache 2.4 eingefügt

---

## 4.3.6.2

- Lizenzablehnungsgründe werden in Log-Tabelle geschrieben
- Hintergrund-Logo in Adminbereichen entfernt

---

## 4.3.6.1

- Fehlerbehebung für nicht verfügbares Objekt während Neuinstallation

---

## 4.3.6.0

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

---

## 4.3.5.0

- Kompatibilität für OXID 4.10.x / 5.3.x eingefügt
- nicht funktionierenden Entwicklermodus korrigiert
- Icons auf FontAwesome-Schriftarten umgestellt
- Modulinstallation prüft auf vordefinierte Connectorversion (sofern im Modul angegeben)
- fehlende Templateparameter ergänzt

---

## 4.3.4.1

- "verfügbare Module"-Liste überarbeitet
- Laden vom ModCfg-Instanzen bei Mandantenwechsel optimiert
- Bugfix für gelöschte Multishop-Tabellen-Standardeinträge
- vermeidet Initialisierung eines undefinierten List-Objektes in Adminlist

---

## 4.3.4.0

- zusätzliche Indizes zu log2transactionlog-Tabelle eingefügt
- vermeidet die Verwendung mehrerer oxconfig-Instanzen
- Shoprevisionsprüfung korrigiert
- Portnummernprüfung in Domaincheck eingefügt (#4875)
- Bugfix für Install/Update von ModCfg-Einträgen in Multishopinstallationen
- Aktualisierung der Metadaten überarbeitet

---

## 4.3.3.7

- Mandantenwechsel in automatischer Installation für überladene oxconfig-Klasse angepasst
- Prüfen-Funktion in Wartung integriert
- ModCfgExceptions um zusätzliche Debug-Daten ergänzt
- Navigationslinks in PageNavigation um Sprachparameter des Frontends ergänzt
- fehlendes oxtimestamp-Feld nachgetragen
- Multimandanteninstallation über config-Parameter deaktivierbar (nur EE)

---

## 4.3.3.6

- Beschreibungstext für Installationsschritte eingefügt
- Multishop-Installation optimiert
- Fehler bei Standard-Datenbankfeldwerten = null korrigiert
- unbekannte (unbenutzte) Lizenzoptionen werden ausgeblendet

---

## 4.3.3.5

- Lizenzprüfung optimiert
- Bugfix für wechselnde Installationsmethode bei Meldungsaktion
- Bugfix für fehlerhaft zusammengestellte SQL-Queries bei primary indexes
- Bugfix für Fehlermeldung bei differierenden Modulversionsnummern im Support-Tab

---

## 4.3.3.4

- Eingabefeld für Aktivierungsident und Lizenzschlüssel zusammengefasst
- Installationstemplates optimiert
- Auflistung der Updatescripte prüft auf Existenz der Verzeichnisse innerhalb der OXID-Verzeichnisliste
- Bugfix für unvollständige Datenbankabfrage bei individuellen oxartextends-Felder innerhalb der Wartungsaufgaben
- Installationsassistent: Endlosschleife bei "Meldung bestätigen" in bestimmten Konstallationen korrigiert
- Deinstallationsanleitung in Dokumentation aufgenommen

---

## 4.3.3.3

- Bugfix für falsche Methodendefinition in 4.7/4.8
- Admin-Templates optimiert

---

## 4.3.3.2

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

---

## 4.3.3.1

- Moduldownloads für automatische Updates an Serveränderungen angepasst
- Fehlerprotokoll für abgebrochene curl-Verbindungen eingefügt
- Precheck angepasst

---

## 4.3.3.0

- SH-Generator um neue PHP-Versionen vervollständigt
- Bugfix in Installationsautomatik bei Installation des FileUpload-Moduls
- unnötige Index-Konvertierungen beim Anlegen neuer Tabellen korrigiert

---

## 4.3.2.2

- verhindert noch nicht verfügbares Update unter PHP 5.5 / PHP 5.6

---

## 4.3.2.1

- keine "Ungültige Lizenz"-Ausnahmebehandlung bei inaktiven Modulen in Modulverwaltung (z.B. beim Ersteintrag des Lizenzschlüssels)
- Installationsoption "Indizes prüfen" prüft auf passende Feldliste
- Sprachermittlung aus Datenbankfeldnamen korrigiert

---

## 4.3.2.0

- Konfigurationsvariante integriert
- Fehlerbehandlung optimiert
- Datenbankabfragen optimiert
- Installationsassistent: Eintragskonvertierung für Multilang-Tabellen angepasst
- Installationsassistent: Update-Queries werden um nicht definierte Felder vervollständigt
- Installationsassistent: Einfüge-Operation versucht nicht, bisherige Datenbankeinträge zu laden
- Installationsassistent: Update-Query vervollständigen Multilang-Tabellen
- Installationsassistent: Suchalgorithmus für Setup-Anweisungsdateien optimiert
- Installationsassistent: case insensitivity in Enum-Feldtypprüfung integriert

---

## 4.3.1.1

- Abbruch von Modulinstallation durch fehlerhaft generierte Datenbankabfrage beseitigt

---

## 4.3.1.0

- veraltete Moduldateien werden gelöscht
- fehlerhafte Vervollständigung zu aktualisierender Datenbankeinträge korrigiert
- Dateilisten-Cache optimiert
- Prüfung auf nicht genutzte Dateien verwendet "block"-Einträge aus metadata
- konfigurierbare Pagination
- Installationsoption "confirmMessage" optimiert

---

## 4.3.0.0

- Verwendung von Multilang- und Multishop-Tabellen (via View-Tabellen) statt interner Anpassung
- Installationsoption: Anzeige unregistrierter Moduldateien
- Installationsoption: DB-Strukturänderungen (Felder / Indizes) können einzeln aktualisiert werden
- Installationsoption: confirmMessage speichert Confirmation
- nicht mehr verwendete Installsteps (Version 1) entfernt
- übersprungene Installationsschritte gelten nur noch für spezifische Modulversion
- Blog Feed Caching integriert
- (optionale) Modulaktivierung in automatische Installation eingefügt

---

## 4.2.2.0

- Kompatibilitätshandling für oxmodule::getModuleFullPath eingefügt
- Anpassung der Lesereihenfolge für Remoteaufrufe

---

## 4.2.1.0

- erweitertes Caching für Updateinformationen integriert (#3267)
- SH-Generator integriert (#3236)
- Multishop-Registrierung (EE) für automatische Installation integriert (#3248)
- Modulprofile erhalten Multishophandling (ab EE 5.2.0)
- fehlertolerantere Abfrage auf "duplicated tpl blocks"

---

## 4.2.0.1

- nicht verwendete Klassen aus metadata entfernt
- Precheck um weitere Anforderungen ergänzt
- Remote module data werden gecached
- Modulupdates werden nur für den aktuellen Mandanten geprüft (nur EE)
- Shopbit-Berechnung nach d3bit verschoben

---

## 4.2.0.0

- Umsetzung für OXID 4.9 / 5.2 (abwärts kompatibel bis 4.7 / 5.0)

---

## 4.1.0.1

- Bugfix für nicht ausführbares TMP leeren während Connector-Installation integriert

---

## 4.1.0.0

- Wartungsfunktionen eingefügt
- Modulprofile können Datentyp wechseln
- Empfänger für Lizenzhinweis-Mails ist anpassbar
- Schnellzugriff für TMP leeren integriert
- Modulauflistungen werden sortiert
- TMP leeren kann vordefinierte Dateien vom Löschen aussparen
- Installationsoption "alte Moduldateien löschen" integriert

---

## 4.0.2.0

- fehlende Klassenregistrierung "d3_cfg_log_cleanup" nachgetragen
- Installationsoption "einmalige Hinweismeldung" integriert
- Mehrfachmeldungen bei veralteter Lizenz korrigiert

---

## 4.0.1.0

- Ablösung der manuell gepflegten Anforderungsprüfung zur automatischen Installationsprüfung
- Bugfix für d3log-Exception bei Fehler 404-Seite eingefügt

---

## 4.0.0.2

- Cache-Liste downloadbarer Bibliotheken wird bei Update bereinigt
- Update-Assistent wird bei Ausführung des Installationsassistenten unterdrückt

---

## 4.0.0.1

- Prüfung auf existierende Parent-Methode korrigiert

---

## 4.0.0.0

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
