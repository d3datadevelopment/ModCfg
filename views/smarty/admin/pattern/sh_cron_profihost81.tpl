#!/bin/bash

/usr/local/php8.1/bin/php [{$sScriptPath nofilter}][{foreach from=$aParameters item="sParameter"}] [{$sParameter nofilter}][{/foreach}]

[{* https://wissen.profihost.com/wissen/artikel/wie-lauten-die-pfade-zu-perl-php-und-python-auf-dem-server/ *}]
