<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (05.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
