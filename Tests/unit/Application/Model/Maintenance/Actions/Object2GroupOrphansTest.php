<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
