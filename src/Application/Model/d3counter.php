<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
