<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
