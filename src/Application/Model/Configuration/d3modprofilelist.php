<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
