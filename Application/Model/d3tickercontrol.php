<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
