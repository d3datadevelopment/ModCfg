<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
