<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
