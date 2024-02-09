#!/bin/bash

/usr/local/php8.1/bin/php [{$sScriptPath}] [{foreach from=$aParameters item="sParameter"}][{$sParameter}] [{/foreach}]

[{* https://wissen.profihost.com/wissen/artikel/wie-lauten-die-pfade-zu-perl-php-und-python-auf-dem-server/ *}]