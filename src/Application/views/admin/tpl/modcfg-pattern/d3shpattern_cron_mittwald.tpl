#/bin/bash

/usr/local/php/bin/php_cli [{$sScriptPath}] [{foreach from=$aParameters item="sParameter"}][{$sParameter}] [{/foreach}]

[{* https://www.mittwald.de/blog/hosting/shopware-performance-tipps *}]