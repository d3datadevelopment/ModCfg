<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
