---
title: zusätzliche Config-Einstellungen
---

Zusätzlich zu den im Adminbereich verfügbaren Einstellungen können selten genutzte
Steuerungsparameter auch direkt in der Datei `config.inc.php` hinterlegt werden:

* `$this->blD3IsDemoShop = true;`

  deaktiviert alle systemnahen Funktionen für Einsatz in öffentlichem Demoshop
Beachten Sie, dass dann z.B. automatisierte Modulupdates nicht durchgeführt werden
können.

* `$this->blD3IgnoreAutoUpdate = true;`

  deaktiviert die Prüfung auf Modulupdates
  
* `$this->blD3PreventRemoteConnections = true;`

  verhindert Abfragen von externen Diensten (Shoprevisionsprüfung, Modulupdatestatus)

* `$this->blD3DontSendExceptionMail = true;`

  sendet keine Infomail über Exceptions (Lizenzprobleme) an den Shopbetreiber
  
* `$this->sD3ExceptionMailRecipient = “me@mydomain.de“;`
  
  sendet Infomail über Exceptions (Lizenzprobleme) an diese Mailadresse, sonst über im
Shop hinterlegte Infomail

* `$this-> blD3IgnoreAutoMetaRefresh = true;`

  deaktiviert den automatisch durchgeführten Metarefresh von installierten Modulen.
  
* `$this->sLogInfoMailFromAddress = “myaddress@myshop.com“;`

  sendet LogInfo-Mails von dieser Adresse, sonst von Bestell-E-Mail-Adresse

* `$this->blD3CheckUpdatesForCurrentShopOnly = true;`

  (nur Enterprise Edition (EE) mit mehreren Mandanten):
  
  prüft und installiert D3-Modul-Aktualisierungen nur für den aktuell gewählten
Mandanten, sofern mandantengetrennte Installation möglich ist

  Zur Prüfung und Durchführung nötiger Installationen in anderen Mandanten wechseln
Sie innerhalb des Adminbereiches in diese Subshops.