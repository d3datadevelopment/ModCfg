<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');