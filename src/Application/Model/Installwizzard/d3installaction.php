<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
