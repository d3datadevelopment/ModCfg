<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
