<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');