<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
