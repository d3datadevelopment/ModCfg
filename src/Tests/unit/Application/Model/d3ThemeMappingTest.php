<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.1.0 SourceGuardian (02.01.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
