<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
