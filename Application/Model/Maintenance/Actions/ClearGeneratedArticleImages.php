<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
