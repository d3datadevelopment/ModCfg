<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.0 SourceGuardian (02.09.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
