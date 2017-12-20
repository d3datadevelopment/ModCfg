#!/bin/bash

/home/httpd/cgi-bin/php70-fcgi-starter.fcgi [{$sScriptPath}] [{foreach from=$aParameters item="sParameter"}][{$sParameter}] [{/foreach}]

[{* https://wiki.hetzner.de/index.php/KonsoleH:Cronjob-Manager#Interpreter *}]