<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
