<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
