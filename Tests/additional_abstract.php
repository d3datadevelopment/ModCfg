<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
