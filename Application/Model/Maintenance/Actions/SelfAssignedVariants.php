<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
