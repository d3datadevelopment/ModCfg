<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
