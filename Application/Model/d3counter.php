<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');