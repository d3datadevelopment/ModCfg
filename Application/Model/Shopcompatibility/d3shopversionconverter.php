<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
