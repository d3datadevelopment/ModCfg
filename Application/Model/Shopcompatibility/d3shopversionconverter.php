<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
