<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
