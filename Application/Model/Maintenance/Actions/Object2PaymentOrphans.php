<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
