<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
