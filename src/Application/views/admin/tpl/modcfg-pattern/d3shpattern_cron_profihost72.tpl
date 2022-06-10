#!/bin/bash

/usr/local/php7.2/bin/php [{$sScriptPath}] [{foreach from=$aParameters item="sParameter"}][{$sParameter}] [{/foreach}]

[{* https://www.profihost.com/forum/skriptsprachen-(php-perl-python)/wie-lauten-die-pfade-zu-perl-php-und-python-auf-dem-server/ *}]