<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
