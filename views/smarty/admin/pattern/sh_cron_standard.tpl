#!/bin/bash

/usr/bin/php [{$sScriptPath nofilter}][{foreach from=$aParameters item="sParameter"}] [{$sParameter nofilter}][{/foreach}]
