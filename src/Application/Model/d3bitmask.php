<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.0.0 SourceGuardian (29.08.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
