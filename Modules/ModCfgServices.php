<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
