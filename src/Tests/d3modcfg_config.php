<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3F5210DB8AAQAAAAhAAAABKgAAACABAAAAAAAAAD/jIYldynB8rKzvJjwxl8imCnH78xTRL7353cnTh1z8cMbY35LOu//r2et5STiPogY2kIrFbL3UEGRhMSWqXJrkJpx+F4DRl+aPu7vSIoUK+2FCGejbTbnvMjBsDwdg11tgiOoKHBXgIkZTrT7N2+zdqZfIFNZkc9lCp7hX1vaHX765jPbRWypDMdycmF8zKIXNga/90mAy5k3CeUkd3Du9MvzC2xm2b+RCAAAAOAAAABI0VB+WG41uJnUh9WU+bqkqhqo0epmk4OzN4HnP6wjaBYsoUMxbkdP/8rPGDyNgEY2uM8YLpz2PQujfOjRTbHFJKQik17zOLrprgq/rKq21gsfV1IeXKtNOGFQCGq8vtllrFto7tO5ZKtPqKQ/7zpUrz4JtH4EBDD+7IE5kPvcA6cZaTAsvKZ1ir9JP9dajd6GvJQZ0RSfCHRGUxUPvz0wuWNlE5SdZNXzPfayrOv/Ea5Eg4IhJzv2NV3t5sonod+klbDN69ZXBtRSpeoh5MSK8hpLC/cNMXtTI8s2DV9MCVEAAADYAAAAyzAGNWzfu7tD5EZHegUADgx5poOAxOCK3fsc1epJLc+jC+3l1W4iMSGuBvazo9EHxZ2r/M7K4DSwZVtNXX5Q6uM24Z6u0Nlp6jCixaQODSB29lJnSiJDNZ9XJMhGeh+1pL0JJ8zCGSMry/EAA3yy4KIhcdLYlC6Y3GDGR2oJYDl1WRKP0tOfX0H6RIaJmWvT6ELV46KTaxVJf7pugZf9Z+TVaVJBQ+FJGFN3NHdaSSp3pi/nky+TorjvWmG/nwB29K5mpiyfs+nnTqBcGvEsO+Ic4fy8YomiUgAAANgAAABwuc5nmjtnfkFMv+/kahksbHw1rSF+ImQwdsfEG+wI0re19dxjQikZ0xF/09Di3hgqxEmm1tgXf9XgkoAzrgcMiN1dqKpkBBjYUyMn+2HBQfK73Jh8GcRhpE3Q17biJSVrS6cTGT5DoJcWSitxg/6edreq2KQhDCkju4eo11/poA6Z4K3oIyjTV7kU6GBEK4sy+sKafnqf4CahlZQvw+vHzUw/5xzUaoGPUjrftavwdJA8AUT2twERRA4kuh9lzSC0kSNShMc3HVpGCwsInkEY9xVPDzqAeIEAAAAA');
