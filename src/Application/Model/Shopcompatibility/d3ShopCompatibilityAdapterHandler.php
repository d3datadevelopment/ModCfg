<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
