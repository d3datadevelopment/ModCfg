<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
