<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
