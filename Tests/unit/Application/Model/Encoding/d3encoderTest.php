<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
