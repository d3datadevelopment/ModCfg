<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
