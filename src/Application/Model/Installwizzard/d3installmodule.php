<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.1.0 SourceGuardian (02.01.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
