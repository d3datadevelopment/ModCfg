<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
