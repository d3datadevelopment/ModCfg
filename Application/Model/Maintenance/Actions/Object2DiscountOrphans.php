<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
