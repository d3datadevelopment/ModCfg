<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
