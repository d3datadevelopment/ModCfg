<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
