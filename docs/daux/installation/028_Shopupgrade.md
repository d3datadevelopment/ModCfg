---
title: Shopupgrade
---

Möchten Sie ein Upgrade Ihres Shops durchführen (z.B. von Version 4 / 5 auf 6), erfordert dies auch ein Upgrade des Modul-Connectors. Führen Sie hierzu die folgenden Schritte aus. Die sonst üblichen Updateschritte funktionieren darin leider nicht.

* Deaktivieren Sie alle Module im Adminbereich unter [ Erweiterungen ] -> [ Module ], die den D3 Modul-Connector erfordern.
* Deaktivieren Sie den D3 Modul-Connector im Adminbereich unter [ Erweiterungen ] -> [ Module ]
* Löschen Sie die Ordner der D3-Module und des D3-Modul-Connectors aus Ihrem Shop bzw. verschieben Sie diese außerhalb des modules-Ordners
* Bestätigen Sie im Adminbereich Ihres Shops unter [ Erweiterungen ] -> [ Module ] das Entfernen der registrierten Module
* Führen Sie das Shopupgrade durch.
* Zur Anpassung der bestehenden Datenbank-Einträge führen Sie diese Abfragen in der Shopdatenbank aus:
    ```mysql
    UPDATE d3modprofile SET oxshopid = 1 WHERE oxshopid = 'oxbaseshop';
    UPDATE d3modprofile2shop SET oxshopid = 1 WHERE oxshopid = 'oxbaseshop';
    UPDATE d3transactionlog SET oxshopid = 1 WHERE oxshopid = 'oxbaseshop';
    UPDATE d3_cfg_mod SET oxshopid = 1 WHERE oxshopid = 'oxbaseshop';
    UPDATE d3_d3log_oxobject2d3transactionlog SET oxshopid = 1 WHERE oxshopid = 'oxbaseshop';
    ```
* Installieren Sie den D3 Modul-Connector.
* Aktivieren Sie den D3 Modul-Connector im Adminbereich unter [ Erweiterungen ] -> [ Module ].

