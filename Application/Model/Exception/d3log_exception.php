<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
