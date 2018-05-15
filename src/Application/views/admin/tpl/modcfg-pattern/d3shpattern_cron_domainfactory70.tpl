#!/bin/bash

env -i /usr/local/bin/php7-70STABLE-CLI -f [{$sScriptPath}] [{foreach from=$aParameters item="sParameter"}][{$sParameter}] [{/foreach}]

[{* https://www.df.eu/forum/threads/79588-Cron-Shell-PHP-Kann-PHP-Version-der-Auftragseinstellung-angesprochen-werden?styleid=36 *}]