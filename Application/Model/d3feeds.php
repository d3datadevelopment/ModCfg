<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');