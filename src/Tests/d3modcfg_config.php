<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3ED210FD0AAQAAAAhAAAABKgAAACABAAAAAAAAAD/mtg2DPWcfBxCPUdLvoJPsNsxkvvXMP+m+cOMQO9f1slNN+2qrZU5cQn600jPd5hFce4zlPzIeQLuiAz0903rngN6m2jIFnxz9Ubb8z8yr6BUPqocggOg85otu/1m7UhjUJt+ZJRrzkQy6O8IQRx4wIdFCfszuIsPMHbHxG2gnP9mnwrKPxJRqmUPxLqyMr4Ff6uQZBev1OJQ48W7gNUSTKwNrKKugBzCCAAAAOAAAABI0VB+WG41uJnUh9WU+bqkqhqo0epmk4OzN4HnP6wjaBYsoUMxbkdP/8rPGDyNgEY2uM8YLpz2PQujfOjRTbHFJKQik17zOLrprgq/rKq21gsfV1IeXKtNOGFQCGq8vtllrFto7tO5ZKtPqKQ/7zpUrz4JtH4EBDD+7IE5kPvcA6cZaTAsvKZ1ir9JP9dajd6GvJQZ0RSfCHRGUxUPvz0wuWNlE5SdZNXzPfayrOv/Ea5Eg4IhJzv2NV3t5sonod+klbDN69ZXBtRSpeoh5MSK8hpLC/cNMXtTI8s2DV9MCVEAAADYAAAANEmMW4Aq+RPzzcbCbXOI+EOhX/DdmZ5mPGwOy25aK24U1EipBJ41Ch4Wj+dRDqIpJ9VjTr95gmSG9iQQn0ROP+awsFnGzwPMuezCkiAQpR4NyPq9BKxAWAURIwirH3tvLG6xrfbn8oit+BjcPZlg0lyyU36WIry/GbQy5MQn/b9+ZCxxFUdEa8z7eqE2AM0GFK6ZrOAiyKJRVs6S5A9fjmhA/zxTZHDQIkWYoeFLWgvQtBOPjeC6hH0d/CP38ps6LXvpnZC4aXy5Ils6Uf/KhhPt0st/81jpUgAAANgAAABnwEIcY0YkGJUNO6H4/iGkOvIyTG1ojYStF1ppnhOwiyPpypYzdh1BnTU6S5/5FvcwhThB3tpo+XTVuoGxnDP21NWBXc6oN8fXbiH9FkL8eHsMntCEqYDlFkZdohuDVEuCsRlSHJuaEBucOKoI3Z5cenMrpx415l9+fMU4vAv5h6ZCTiOf+/0KOMU3c8z8Ib5sWDK1XNS30V0m8ubRVMlX1dXDlry7rhpLa0tlPJTk6j+w+ET6HvTivtD+uBxUsLJJ4GVs4j4nyU3+1Zy6szUgvbUBN25QazQAAAAA');
