<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
