<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
