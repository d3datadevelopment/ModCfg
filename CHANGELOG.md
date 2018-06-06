# D� Modul Connector - Changelog
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
- Einstellungs-�berladung korrigiert - verwendet Einstellungen der Hauptsprache, wenn in aktueller Sprache keine Einstellungen gespeichert wurden

### Changed
- kleine Text�nderungen in der Installationsroutine

## 5.1.1.0 - 2018-05-15 - #7481<a name="c5110"></a>
### Added
- Datenbank-Query-Cache-Check hinzugef�gt
- sh-Vorlagen-Templates f�r PHP 7.1 und 7.2 bei Profihost hinzugef�gt

### Changed
- Freigabe f�r OXID eShop 6.2
- FontAwesome auf Version 5 aktualisiert
- Lizenzformulare im Admin werden erst auf Anforderung geladen 
- zus�tzliche Admin-Bedienelemente werden nur bei aktiviertem Connector dargestellt
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
- composerf�hige Installation
- Migrationsqueries (von OXID 4.10 / 5.x)
- Bereinigung der genierten Bilder auch f�r andere Objekttypen

### Changed
- als deprecated markierten Code entfernt

## 5.0.0.0 - 2017-11-23 - #6951<a name="c5000"></a>
### Added
- Log-Export auch f�r modulspezifische Log-Auswertungen m�glich
- Template-Block-Verwaltung eingef�gt
- Versionsnummern-Konverter f�r sauberes Handling mit der B2B-Edition integriert

### Changed
- Umarbeitung f�r OXID 6

## 4.5.0.0<a name="c4500"></a>
- Icon-Bibliothek Font Awesome auf Version 4.7.0 aktualisiert
- Admin-Url-Generator korrigiert (verhindert seltenes Logout beim Verwenden dieser URLs)
- Filter f�r Transactionlog eingef�gt
- #5718 + #5717: zus�tzliche Indizes f�r d3tranactionlog und zugeh�rige Tabellen gesetzt
- #5740: Tabellenengines auf InnoDB umgestellt
- #5684: Log-Exporttyp "CSV" entfernt
- ClearTmp-Infobereich umgestellt
- Modul auf ionCube-Verwendung angepasst
- Dashboard zeigt Informationen zu relevanten Expire-Dates der installierten Module
- Testlizenzen werden im Modulnamen entsprechend dargestellt
- cURL folgt Redirect-Angaben
- Lizenz pr�ft Shop-Edition
- Feature-Bits integriert
- Zeichensatz-Vorbelegung f�r Update-Dateien eingef�gt
- Remotecache optimiert
- Hinweis bei versuchter Deaktivierung des Modul-Connectors eingef�gt
- Protokoll von allgemeinen Shop-Exceptions werden nicht dem Connector zugeordnet
- Update- und Lizenzserver werden �ber https angesprochen
- Modul-Titel in UTF-8-Installationen korrigiert
- SQL-Exporte korrigiert
- #6329: fehlerhafte Datenbankstruktur bei l�ckenhaften Sprach-IDs korrigiert

## 4.4.1.0<a name="c4410"></a>
- Meldung �ber unerf�llte Connector-Abh�ngigkeit kann tempor�r �bergangen werden
- "Lizenzdetails" zeigt auch kompletten Lizenzschl�ssel
- automatische Installation: Interaktion mit Backenduser f�r kundenspezifische Installation (#5549)
- Theme-Mapping auf modulspezifische Variablennamen umgestellt
- Code-Optimierungen, um Notices zu vermeiden

## 4.4.0.0<a name="c4400"></a>
- verarbeitet mCrypt-vermeidende Lizenzinformationen
- Theme-Mapping eingef�gt
- konfigurierbare Mandantenunabh�ngigkeit bei relevanten Installationsaufgaben eingef�gt
- d3log-Tabellenstruktur optimiert
- Logtyp-Listen werden nach Priorit�t sortiert
- f�r Einsatz mit ionCubeLoader (anstelle von Zend Guard) angepasst (#5489)
- veraltete Methodenaufrufe ersetzt
- .htaccess-�nderungen f�r Apache 2.4 korrigiert

## 4.3.7.0<a name="c4370"></a>
- Installationsassistent: Funktion zur �nderung der Tabellen-Engine eingef�gt
- .htaccess-�nderungen f�r Apache 2.4 eingef�gt

## 4.3.6.2<a name="c4362"></a>
- Lizenzablehnungsgr�nde werden in Log-Tabelle geschrieben
- Hintergrund-Logo in Adminbereichen entfernt

## 4.3.6.1<a name="c4361"></a>
- Fehlerbehebung f�r nicht verf�gbares Objekt w�hrend Neuinstallation

## 4.3.6.0<a name="c4360"></a>
- Methode zur Ermittlung der Parent-Theme-Id eingef�gt
- Systembefehle k�nnen als klickbare Wartungsaufgaben eingerichtet werden (Ausf�hrbarkeit via PHP vorausgesetzt)
- "TMP leeren" ist als "ausblendbar" konfigurierbar
- Connector-Versions-Pr�fung f�r Module optimiert
- "TMP leeren"-Optik an eShop 4.10.x angepasst
- Downloads ber�cksichtigen PHP 5.5 und 5.6
- Admin-Layout f�r optimale Darstellung der Module angepasst (deaktivierbar)
- D3-Logo im Backend wird via SSL geladen, wenn SSL aktiviert
- Men�icons eingef�gt
- Log f�r Lizenzabfrage eingef�gt
- Seitentitel korrigiert

## 4.3.5.0<a name="c4350"></a>
- Kompatibilit�t f�r OXID 4.10.x / 5.3.x eingef�gt
- nicht funktionierenden Entwicklermodus korrigiert
- Icons auf FontAwesome-Schriftarten umgestellt
- Modulinstallation pr�ft auf vordefinierte Connectorversion (sofern im Modul angegeben)
- fehlende Templateparameter erg�nzt

## 4.3.4.1<a name="c4341"></a>
- "verf�gbare Module"-Liste �berarbeitet
- Laden vom ModCfg-Instanzen bei Mandantenwechsel optimiert
- Bugfix f�r gel�schte Multishop-Tabellen-Standardeintr�ge
- vermeidet Initialisierung eines undefinierten List-Objektes in Adminlist

## 4.3.4.0<a name="c4340"></a>
- zus�tzliche Indizes zu log2transactionlog-Tabelle eingef�gt
- vermeidet die Verwendung mehrerer oxconfig-Instanzen
- Shoprevisionspr�fung korrigiert
- Portnummernpr�fung in Domaincheck eingef�gt (#4875)
- Bugfix f�r Install/Update von ModCfg-Eintr�gen in Multishopinstallationen
- Aktualisierung der Metadaten �berarbeitet

## 4.3.3.7<a name="c4337"></a>
- Mandantenwechsel in automatischer Installation f�r �berladene oxconfig-Klasse angepasst
- Pr�fen-Funktion in Wartung integriert
- ModCfgExceptions um zus�tzliche Debug-Daten erg�nzt
- Navigationslinks in PageNavigation um Sprachparameter des Frontends erg�nzt
- fehlendes oxtimestamp-Feld nachgetragen
- Multimandanteninstallation �ber config-Parameter deaktivierbar (nur EE)

## 4.3.3.6<a name="c4336"></a>
- Beschreibungstext f�r Installationsschritte eingef�gt
- Multishop-Installation optimiert
- Fehler bei Standard-Datenbankfeldwerten = null korrigiert
- unbekannte (unbenutzte) Lizenzoptionen werden ausgeblendet

## 4.3.3.5<a name="c4335"></a>
- Lizenzpr�fung optimiert
- Bugfix f�r wechselnde Installationsmethode bei Meldungsaktion
- Bugfix f�r fehlerhaft zusammengestellte SQL-Queries bei primary indexes
- Bugfix f�r Fehlermeldung bei differierenden Modulversionsnummern im Support-Tab

## 4.3.3.4<a name="c4334"></a>
- Eingabefeld f�r Aktivierungsident und Lizenzschl�ssel zusammengefasst
- Installationstemplates optimiert
- Auflistung der Updatescripte pr�ft auf Existenz der Verzeichnisse innerhalb der OXID-Verzeichnisliste
- Bugfix f�r unvollst�ndige Datenbankabfrage bei individuellen oxartextends-Felder innerhalb der Wartungsaufgaben
- Installationsassistent: Endlosschleife bei "Meldung best�tigen" in bestimmten Konstallationen korrigiert
- Deinstallationsanleitung in Dokumentation aufgenommen

## 4.3.3.3<a name="c4333"></a>
- Bugfix f�r falsche Methodendefinition in 4.7/4.8
- Admin-Templates optimiert

## 4.3.3.2<a name="c4332"></a>
- Wartungsaufgaben von Nicht-Shop-Standardfeldern bereinigt
- Installationsassistent: Index-Cache-Nutzung bei "Tabelle erstellen" optimiert
- Installationsassistent: Ausf�hrung im Debug-Modus korrigiert
- Installationsassistent: Pr�fung auf veraltete Indizes
- Installationsassistent: Metarefresh wird nur f�r registrierte Module ausgef�hrt
- Installationsassistent: veraltete Parameter entfernt
- Installationsassistent: tempor�re Aktion wird generell zur�ckgesetzt
- Update-Scriptliste optimiert
- Fehler bei nicht sofort verf�gbarer oxmodule-Erweiterung unterbunden
- Installationsassistent: "Meldung best�tigen" korrigiert
- Precheck auf aktuelle Version angepasst
- Endlosschleife bei Updates von alten Connector-Versionen beseitigt
- Exceptionbehandlung f�r Fehler beim Laden des Konfigurationsobjektes eingef�gt
- Notices werden in Scriptdurchlauf vermieden

## 4.3.3.1<a name="c4331"></a>
- Moduldownloads f�r automatische Updates an Server�nderungen angepasst
- Fehlerprotokoll f�r abgebrochene curl-Verbindungen eingef�gt
- Precheck angepasst

## 4.3.3.0<a name="c4330"></a>
- SH-Generator um neue PHP-Versionen vervollst�ndigt
- Bugfix in Installationsautomatik bei Installation des FileUpload-Moduls
- unn�tige Index-Konvertierungen beim Anlegen neuer Tabellen korrigiert

## 4.3.2.2<a name="c4322"></a>
- verhindert noch nicht verf�gbares Update unter PHP 5.5 / PHP 5.6

## 4.3.2.1<a name="c4321"></a>
- keine "Ung�ltige Lizenz"-Ausnahmebehandlung bei inaktiven Modulen in Modulverwaltung (z.B. beim Ersteintrag des Lizenzschl�ssels)
- Installationsoption "Indizes pr�fen" pr�ft auf passende Feldliste
- Sprachermittlung aus Datenbankfeldnamen korrigiert

## 4.3.2.0<a name="c4320"></a>
- Konfigurationsvariante integriert
- Fehlerbehandlung optimiert
- Datenbankabfragen optimiert
- Installationsassistent: Eintragskonvertierung f�r Multilang-Tabellen angepasst
- Installationsassistent: Update-Queries werden um nicht definierte Felder vervollst�ndigt
- Installationsassistent: Einf�ge-Operation versucht nicht, bisherige Datenbankeintr�ge zu laden
- Installationsassistent: Update-Query vervollst�ndigen Multilang-Tabellen
- Installationsassistent: Suchalgorithmus f�r Setup-Anweisungsdateien optimiert
- Installationsassistent: case insensitivity in Enum-Feldtyppr�fung integriert

## 4.3.1.1<a name="c4311"></a>
- Abbruch von Modulinstallation durch fehlerhaft generierte Datenbankabfrage beseitigt

## 4.3.1.0<a name="c4310"></a>
- veraltete Moduldateien werden gel�scht
- fehlerhafte Vervollst�ndigung zu aktualisierender Datenbankeintr�ge korrigiert
- Dateilisten-Cache optimiert
- Pr�fung auf nicht genutzte Dateien verwendet "block"-Eintr�ge aus metadata
- konfigurierbare Pagination
- Installationsoption "confirmMessage" optimiert

## 4.3.0.0<a name="c4300"></a>
- Verwendung von Multilang- und Multishop-Tabellen (via View-Tabellen) statt interner Anpassung
- Installationsoption: Anzeige unregistrierter Moduldateien
- Installationsoption: DB-Struktur�nderungen (Felder / Indizes) k�nnen einzeln aktualisiert werden
- Installationsoption: confirmMessage speichert Confirmation
- nicht mehr verwendete Installsteps (Version 1) entfernt
- �bersprungene Installationsschritte gelten nur noch f�r spezifische Modulversion
- Blog Feed Caching integriert
- (optionale) Modulaktivierung in automatische Installation eingef�gt

## 4.2.2.0<a name="c4220"></a>
- Kompatibilit�tshandling f�r oxmodule::getModuleFullPath eingef�gt
- Anpassung der Lesereihenfolge f�r Remoteaufrufe

## 4.2.1.0<a name="c4210"></a>
- erweitertes Caching f�r Updateinformationen integriert (#3267)
- SH-Generator integriert (#3236)
- Multishop-Registrierung (EE) f�r automatische Installation integriert (#3248)
- Modulprofile erhalten Multishophandling (ab EE 5.2.0)
- fehlertolerantere Abfrage auf "duplicated tpl blocks"

## 4.2.0.1<a name="c4201"></a>
- nicht verwendete Klassen aus metadata entfernt
- Precheck um weitere Anforderungen erg�nzt
- Remote module data werden gecached
- Modulupdates werden nur f�r den aktuellen Mandanten gepr�ft (nur EE)
- Shopbit-Berechnung nach d3bit verschoben

## 4.2.0.0<a name="c4200"></a>
- Umsetzung f�r OXID 4.9 / 5.2 (abw�rts kompatibel bis 4.7 / 5.0)

## 4.1.0.1<a name="c4101"></a>
- Bugfix f�r nicht ausf�hrbares TMP leeren w�hrend Connector-Installation integriert

## 4.1.0.0<a name="c4100"></a>
- Wartungsfunktionen eingef�gt
- Modulprofile k�nnen Datentyp wechseln
- Empf�nger f�r Lizenzhinweis-Mails ist anpassbar
- Schnellzugriff f�r TMP leeren integriert
- Modulauflistungen werden sortiert
- TMP leeren kann vordefinierte Dateien vom L�schen aussparen
- Installationsoption "alte Moduldateien l�schen" integriert

## 4.0.2.0<a name="c4020"></a>
- fehlende Klassenregistrierung "d3_cfg_log_cleanup" nachgetragen
- Installationsoption "einmalige Hinweismeldung" integriert
- Mehrfachmeldungen bei veralteter Lizenz korrigiert

## 4.0.1.0<a name="c4010"></a>
- Abl�sung der manuell gepflegten Anforderungspr�fung zur automatischen Installationspr�fung
- Bugfix f�r d3log-Exception bei Fehler 404-Seite eingef�gt

## 4.0.0.2<a name="c4002"></a>
- Cache-Liste downloadbarer Bibliotheken wird bei Update bereinigt
- Update-Assistent wird bei Ausf�hrung des Installationsassistenten unterdr�ckt

## 4.0.0.1<a name="c4001"></a>
- Pr�fung auf existierende Parent-Methode korrigiert

## 4.0.0.0<a name="c4000"></a>
- 4 Basisbibliotheken werden in einer Gesamtbibliothek zusammengefasst
- Pr�fung auf existierende Parent-Methoden pr�ft nun auch in Modul-Erweiterungen (optional)

---

# ModCfg

## 3.10.3.0
- Bibliothek-Module werden nicht als "inaktiv" markiert, wenn sich Extensions �ndern
- Parameter-Container korrigiert

## 3.10.2.1
- Metadaten korrigiert

## 3.10.2.0
- Parameter-Container eingef�gt
- Kurzbeschreibungsfeld f�r Profile gek�rzt

## 3.10.1.0
- interne Struktur�nderungen

## 3.10.0.2
- Modul-Meta-Refresh deaktiviert nicht die betroffenen Module
- Admin-Profilliste filtert nach Gruppen
- Profile um Kurzbeschreibungsfeld erg�nzt
- Aktiv-Pr�fung f�r Profile ist Admin-Liste korrigiert
- Methodenreichweite ver�ndert (_d3getFolderTitle() -> public)
- Vermeiden von Notices

## 3.10.0.1
- Layoutfehler korrigiert

## 3.10.0.0
- Umstellung auf "automatische Installation"
- Seitennavigation enth�lt Shop-Parameter (EE)

## 3.9.0.7
- "lokale Verwendung" der Lizenzschl�ssel korrigiert
- Verwendung der Revisionsnummer gegen Versionsnummer getauscht

## 3.9.0.6
- inkompatibler Templateaufruf bereinigt
- isAvailable-Check korrigiert

## 3.9.0.5
- Aktivierung korrigiert, wenn Admin unter SSL l�uft
- inaktive Listeneintr�ge werden in Admin gezeigt
- fehlendes pagenavigation-Template eingef�gt

## 3.9.0.4
- Lizenzschl�sselpr�fung korrigiert

## 3.9.0.3
- Verf�gbarkeitspr�fung pr�ft auf korrekte Anzahl der Basis-Bibliothek-Eintr�ge
- Lizenzcache korrigiert
- "Eintrag duplizieren" speichert keine Einstellungen

## 3.9.0.2
- problematisches "on update current_timestamp" aus Struktur entfernt

## 3.9.0.1
- Fehler beim Speichern der Log-Einstellungen korrigiert

## 3.9.0.0
- Modulprofile eingef�gt

## 3.8.0.0
- PHP 5.4 �berpr�fung angepasst
- Fehlerbehandlung erweitert
- Erweiterbarkeit verbessert

## 3.7.0.1
- Feldvererbung korrigiert (Moduleinstellungen waren nicht in Sprache >0 abrufbar

## 3.7.0.0
- �bersicht �ber verf�gbare (nicht installierte) Module eingef�gt
- erweiterte Counter integriert

## 3.6.0.0
- Enterprise Edition: Rechte&Rollen auch f�r D3-Module nutzbar

## 3.5.0.0
- Verwaltung weiterer Keysets integriert (Nutzung der Serials durch andere Partner)

## 3.3.0.0
- Lizenzaktivierung �ber D3-Server aktiviert

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
- Lizenzpr�fung f�r lokale Installtionen korrigiert

---

# Install

## 2.6.1.0
- Fehlermeldung in Installation entfernt
- Ausf�hrung in CLI stoppt Ausf�hrung nicht
- UTF-DB-Inhalte werden vor Update konvertiert
- Installationsassistent pr�ft auch in "setup"-Verzeichnis auf Install-Scripte
- Behandlung f�r Erweiterung von ENUM-Feldern eingef�gt

## 2.6.0.1
- verhindert weitere Meta-Refresh-Aktionen

## 2.6.0.0
- Bibliotheken verwenden "automatische Installation"
- Collation-Cache korrigiert
- Modul-Pr�fungen werden auf Versionsnummern anstatt Revisionsnummern durchgef�hrt
- zeigt Hinweis, wenn Bibliotheken automatisch deaktiviert werden
- DB-Index-Typen korrigiert
- manueller Installationsstart setzt SkipFlag zur�ck

## 2.5.0.1
- PRIMARY INDEX Query angepasst

## 2.5.0.0
- Kollationshandling in automatische Installation eingef�gt

## 2.4.1.0
- RegExp-Generator implementiert

## 2.4.0.1
- Gro�-/Kleinschreibungsabh�ngiger Feld-Cache eingef�gt
- genereller SQL- und CSV-Export eingef�gt
- Installation bricht bei fehlenden Methoden ab
- simpleXML erweitert
- Datenverschiebefunktion f�r automatische Installation eingef�gt
- NULL-Handling bei automatischer Installation verbessert
- Admin-Navigation wird nach Installation aktualisiert

## 2.4.0.0
- weitere Methoden f�r automatische Installation eingef�gt
- PHP 5.4-�berarbeitungen

## 2.3.0.2
- Verlinkung ge�ndert
- zus�tzliche DB-Feld-Eigenschaften implementiert

## 2.3.0.0
- Performance-Optimierung
- Installation stellt Anzahl der Steps dar

## 2.2.0.3
- Bug in Rename-Job beseitigt

## 2.2.0.2
- Performance-Optimierung
- oxconfig-Methoden eingef�gt

## 2.2.0.1
- fehlerhafte Query-Generierung bei Rename-Updates korrigiert

## 2.2.0.0
- Feature in Updateinstallation: Informationsseite

## 2.1.0.8
- Kommunikation zum Updateserver sehr langsam: behoben

## 2.1.0.7
- L�schen- und Entfern-Methoden eingef�gt, Cache-Behandlung korrigiert

...

## 2.0.0.2
- ModCfg-Instanz-Handler angepa�t
- Demoshopmodus anzeigen lassen, wenn Funktionseinschr�nkungen aktiv sind
- DB-Index-Installation eingef�gt
- Lizenz-Aktivierung eingearbeitet

## 2.0.0.1
- falsche Weiterleitung bei automatischer Installation korrigiert

---

# Logging

## 2.4.1.0
- gruppierte Loglevel definiert
- Infomail liefert aufschlussreichere Daten
- Smarty-Fehler k�nnen geloged werden
- leere Logs werden nicht geschrieben
- Log-Textfeld auf Typ "Text" vergr��ert

## 2.4.0.0
- verwendet automatische Installation

## 2.3.0.2
- Transactionlog neue Methode hinzugef�gt

## 2.3.0.1
- Error-Info-Mail korrigiert
- Transaction-Log nutzbar integriert

## 2.3.0.0
- Transaction-Log umgearbeitet

## 2.2.0.0
- Transaction-Log integriert
- Log speichert nun Profil-ID

## 2.1.0.1
- DB-Struktur f�r bessere Performance ver�ndert
- verwendet zentrale Export-Methoden
- l�scht nur Log-Eintr�ge des gew�hlten Mandanten
- Export ist nach Klassen und Sessions selektierbar
- Exceptions immer anzeigbar (optional)
- Exceptions werden in Log geschrieben

## 2.1.0.0
- Log-�bersicht kann modulspezifisch in andere Erweiterungen integriert werden

## 2.0.0.6
- SQL-Export liefert alle Zeilen
- DB Struktur ver�ndert (auto increment index)

## 2.0.0.5
- Log-Bit-Beschreibung ge�ndert
- oxshopcontrol::start() �bergibt komplette Parameterliste

## 2.0.0.4
- Tabellentyp eingef�gt
- Level-Benennung ge�ndert

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
- Frontend-Clear-TMP eingef�gt, kann z.B. Views ohne Adminbereich aktualisieren

## 2.0.0.2
- verwendet registrierte Template anstelle von festen Pfadnamen

## 2.0.0.1
- ModCfg-Instanz-Handler aktualisiert
