<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.0.0 SourceGuardian (29.08.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
