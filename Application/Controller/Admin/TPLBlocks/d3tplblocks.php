<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
