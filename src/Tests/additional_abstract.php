<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.0.0 SourceGuardian (29.08.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
