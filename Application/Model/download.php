<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');