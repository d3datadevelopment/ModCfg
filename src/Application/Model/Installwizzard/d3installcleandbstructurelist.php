<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
