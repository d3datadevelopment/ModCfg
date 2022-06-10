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

Für die direkte Bearbeitung in der Datenbank können Sie diese Abfragen verwenden:

    ```mysql
    DROP TABLE IF EXISTS `d3log`;
    DROP TABLE IF EXISTS `d3modprofile`;
    DROP TABLE IF EXISTS `d3modprofile2shop`;
    DROP TABLE IF EXISTS `d3modprofile_set1`;
    DROP TABLE IF EXISTS `d3modprofile_set2`;
    DROP TABLE IF EXISTS `d3modprofile_set3`;
    DROP TABLE IF EXISTS `d3_cfg_mod`;
    DROP TABLE IF EXISTS `d3_cfg_mod_set1`;
    DROP TABLE IF EXISTS `d3_cfg_mod_set2`;
    DROP TABLE IF EXISTS `d3_cfg_mod_set3`;
    DROP TABLE IF EXISTS `d3_cfg_mod_variant`;
    DROP TABLE IF EXISTS `d3_cfg_mod_variant_set1`;
    DROP TABLE IF EXISTS `d3_cfg_mod_variant_set2`;
    DROP TABLE IF EXISTS `d3_cfg_mod_variant_set3`;
    DROP TABLE IF EXISTS `d3transactionlog`;
    DROP TABLE IF EXISTS `d3_d3log_oxobject2d3transactionlog`;
    DROP TABLE IF EXISTS `d3cache`;
    ```

Zu einigen dieser Tabellen wurden die Config-Einträge `aMultiLangTables` (bei Enterprise Edition auch `aMultiShopTables`) um entsprechende Einträge ergänzt). Bereinigen Sie diese ebenfalls.
    
Diese Bearbeitung lässt sich nicht direkt in der Datenbank ausführen. Die Abfrage zur Ermittlung der Einträge und zur Änderung können Sie aus diesen Beispielen individuell erstellen:

    ```mysql
    # select oxvartype,  DECODE( oxvarvalue, 'fq45QS09_fqyx09239QQ') as oxvarvalue from oxconfig where oxshopid = '1' and oxmodule = '' and oxvarname = 'aMultiShopTables';
    
    # update `oxconfig` set `oxvarvalue` = encode("INHALT",'fq45QS09_fqyx09239QQ') where `oxshopid`= 1 and `oxvarname` = 'aMultiShopTables';
    ```