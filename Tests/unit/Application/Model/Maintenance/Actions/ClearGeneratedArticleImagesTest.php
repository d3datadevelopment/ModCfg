<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');