<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
