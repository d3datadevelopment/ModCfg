<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.1.0 SourceGuardian (02.01.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
