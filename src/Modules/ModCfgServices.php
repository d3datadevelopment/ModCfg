<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.4.2.1 SourceGuardian (10.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
