<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.0.0 SourceGuardian (29.08.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
