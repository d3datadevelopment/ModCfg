<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');