<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');