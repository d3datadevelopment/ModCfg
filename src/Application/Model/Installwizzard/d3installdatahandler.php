<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
