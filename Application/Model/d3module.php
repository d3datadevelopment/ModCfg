<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');