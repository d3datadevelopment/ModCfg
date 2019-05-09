---
title: Datenbank bereinigen
---
  
Das Modul legt Informationen in der Datenbank ab. Sofern diese Daten nicht mehr benötigt werden, können diese gelöscht werden. 

> [!] Legen Sie sich vorab bitte unbedingt eine Sicherung an, um die Daten im Zweifelsfall wiederherstellen zu können.
    
Für das Modul **{$modulename}** sind dies die folgende Tabellen und Felder:

* die komplette Tabelle `d3log`
* die komplette Tabelle `d3modprofile`
* sofern vorhanden: `d3modprofile2shop` und `d3modprofile_setX` *)
* die komplette Tabelle `d3_cfg_mod`
* sofern vorhanden: `d3_cfg_mod_setX` *)
* die komplette Tabelle `d3_cfg_mod_variant`
* sofern vorhanden: `d3_cfg_mod_variant_setX` *)
* die komplette Tabelle `d3transactionlog`
* die komplette Tabelle `d3_d3log_oxobject2d3transactionlog`
* die komplette Tabelle `d3cache`
  
*) `_setX` ist eine Tabellenliste, die mit `_set1` beginnen und shopabhängig auch Tabellen mit höheren Nummerierungen enthalten kann (z.B. `_set2`, `_set3`, …).

Zu einigen dieser Tabellen wurden die Config-Einträge `aMultiLangTables` (bei Enterprise Edition auch `aMultiShopTables`) um entsprechende Einträge ergänzt). Bereinigen Sie diese ebenfalls.