<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.0.0 SourceGuardian (26.06.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
