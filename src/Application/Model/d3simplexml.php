<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
