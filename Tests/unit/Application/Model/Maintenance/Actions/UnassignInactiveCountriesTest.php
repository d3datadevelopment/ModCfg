<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');