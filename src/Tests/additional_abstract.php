<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
