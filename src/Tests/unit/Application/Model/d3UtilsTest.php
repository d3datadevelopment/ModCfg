<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');