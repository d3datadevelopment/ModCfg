<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
