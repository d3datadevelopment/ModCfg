<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
