<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
