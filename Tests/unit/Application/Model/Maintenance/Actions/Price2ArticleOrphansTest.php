<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');