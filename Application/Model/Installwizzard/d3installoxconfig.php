<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
