<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.1.0 SourceGuardian (02.01.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
