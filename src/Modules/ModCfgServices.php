<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');