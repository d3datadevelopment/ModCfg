<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
