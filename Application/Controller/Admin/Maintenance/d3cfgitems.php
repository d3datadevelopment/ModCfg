<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
