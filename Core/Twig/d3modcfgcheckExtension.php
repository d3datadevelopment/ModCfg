<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
