<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
