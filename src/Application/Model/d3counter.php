<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.4.2.1 SourceGuardian (10.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
