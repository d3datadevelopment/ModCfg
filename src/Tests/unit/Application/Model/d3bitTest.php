<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.0.0 SourceGuardian (29.08.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
