<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
