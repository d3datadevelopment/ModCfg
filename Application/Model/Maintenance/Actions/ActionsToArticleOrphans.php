<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
