<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (05.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
