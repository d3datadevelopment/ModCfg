<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (05.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
