<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
