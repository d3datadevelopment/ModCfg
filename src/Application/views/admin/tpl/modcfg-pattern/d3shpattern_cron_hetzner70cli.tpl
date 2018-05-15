#!/bin/bash

/usr/bin/php70 [{$sScriptPath}] [{foreach from=$aParameters item="sParameter"}][{$sParameter}] [{/foreach}]

[{* https://wiki.hetzner.de/index.php/KonsoleH:Cronjob-Manager#Interpreter *}]