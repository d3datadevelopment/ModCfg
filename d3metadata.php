<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
