<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
