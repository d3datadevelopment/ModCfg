<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
