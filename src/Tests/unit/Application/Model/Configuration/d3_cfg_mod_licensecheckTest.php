<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.1.0 SourceGuardian (02.01.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
