<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
