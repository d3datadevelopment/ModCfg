<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
