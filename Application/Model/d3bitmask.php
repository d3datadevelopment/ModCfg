<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');