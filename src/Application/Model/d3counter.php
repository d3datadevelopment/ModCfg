<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
