<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
