<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
