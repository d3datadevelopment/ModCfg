<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
