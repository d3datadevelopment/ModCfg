<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (05.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
