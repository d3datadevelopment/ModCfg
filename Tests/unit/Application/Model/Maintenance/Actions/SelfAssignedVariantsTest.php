<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');