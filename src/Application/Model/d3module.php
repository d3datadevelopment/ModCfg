<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
