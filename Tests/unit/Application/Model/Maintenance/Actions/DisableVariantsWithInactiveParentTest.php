<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
