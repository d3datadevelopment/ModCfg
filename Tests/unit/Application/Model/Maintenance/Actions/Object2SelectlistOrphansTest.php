<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.1.0 SourceGuardian (19.04.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
