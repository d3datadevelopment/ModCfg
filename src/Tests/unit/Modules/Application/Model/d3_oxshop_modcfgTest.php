<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (03.03.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
