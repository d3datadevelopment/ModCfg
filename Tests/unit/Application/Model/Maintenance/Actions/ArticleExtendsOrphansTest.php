<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
