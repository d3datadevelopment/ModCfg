<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
