<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
