<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
