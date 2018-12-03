# Migration de D3 Modul-Connectors von OXID eShop 4.x.x / 5.x.x nach OXID eShop 6.x.x

Beim Update auf die Shopversion sind Vorbereitungsarbeiten an D3-Modulen notwendig, 
dass diese in der neuen Shopversion wieder aktiviert werden können. Verfahren Sie 
bitte nach der folgenden Anleitung:

im bisherigen 4.x/5.x-Shop:

- deaktivieren Sie alle Module, die den D3 Modul-Connector erfordern
- deaktivieren Sie den D3-Modul-Connector
- löschen Sie die Ordner der D3-Module und des D3-Modul-Connectors 
aus Ihrem Shop bzw. verschieben Sie diese außerhalb des modules-Ordner
- bestätigen Sie im Adminbereich Ihres Shops unter "Erweiterungen -> Module" das 
Entfernen der registrierten Module

Führen Sie nun das Shopupdate durch und führen die Migrationsanweisungen aus der 
Datei "migration_to_OXID_6.x.sql" aus diesem Ordner in Ihrer Datenbank aus. 

Installieren Sie dann den D3 Modul-Connector sowie die weiteren D3-Module 
entsprechend der jeweiligen Anleitung.
