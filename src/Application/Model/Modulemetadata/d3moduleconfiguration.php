<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
