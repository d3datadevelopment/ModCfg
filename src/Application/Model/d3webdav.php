<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.4.2.1 SourceGuardian (10.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B33F210D79AAQAAAAhAAAABKgAAACABAAAAAAAAAD/PaS9xT/zmYJJ+4JAFIBvtdU2UvgQcqLqpq/W14yfd5yNI4aExwmmlLQWTe7BtK8jywtaYk7oohx0DocvAKHlCu+13/dBxzbL33TxH9R+5LM1F4lDwJR3ZSnF8tUZfCFVFXIPjF+wPbMdmxE/lJFwS+cie+jVy1MuzZv/plSzJJQCtJndxKMKOid6zDMKV+du6t2c6J4J3zMrWbkCRGVKgUSPPIfPa8srCAAAAGgBAABJutGTPsQRTPlFC/KdVqsPTlnrh2XwU/dYTJfhImEvWVBWcz0Ao/BU4rIdr2zsI55WqYKr5O+P/31cTcd4fhTCXJiS+9f48kGC1p/g4j4/pUm7F452HEvLdL/6sAoITU4pIV/5c9Qyb78K0dhqsLSEe/vlK5hRKmjVtVRVqNetSdoYSAX+kThIdf9IFWjEcX632+eUV8vJZwRx1iuMNnfU48B6Oa4dzXh/LtQP6H/quqz5mahtMT62BKYAiGb1zZ68z0QsXCUelRF5f5rL7ThXKPGb2cF3QRS5C/OHf0xKvrlFSBx3CsTPj5Jcw9GDTtKMTNA+7a3NtCwD9swlz6xLV4OpAc7zxGRVw2ku4qZb8v4dgBhivgiuLT6TtMxa5AGFiq+WguXG5ZsbvkBMUTVO7pQKKLJHjfqrHrIlbyMCUElbcx/1/6T7ydHY1pZojVscjI8o/cmDLhBRwYpOgd/m3PLxKjARNBFRAAAAYAEAANVgcEhF07CiT1CCQjeQrrF1918adxp228mJhntrsXP8X9FhCvedCUyINpepvMvIgKxubs96dIExd1BdVjN/or3mroXksSbrcW4nT4TEnmBwCd36ILtn9gwF1yQT6PAa5JCi9TOaM2+ZY2phamQ/vK+5VmKotsRs3Stgp/iwvmxo5Z1LncFVU/VDJbvS9gPId9WomfhyigigVIE2roWratP4CQkfEn8DRA968Yp1IpqhA5FXygdSEL7OuOkJ5jyRu5HKr7dmkfmTCOnBrafFOOWFh+BsUvXmsrctjlETTvt+gt90XO2ugCQcrhzkNRhJrQlNHsx8KjxQYH2SroVK3fSZ15GkDg9vHHk7IUQR8Jk4clejrdcgm5w2j7n8dvOr2dQerrxBw69nBMwi6DaXRcXA4r/+wDU6K3r6QL/zEBjr6oxfuT8LydG5xpNUmiKC0ja+9aoI5NhAhBsiw7I4TD5SAAAAYAEAAGkckVgtAqhJkh2PfoGfhzQIaeDh4fUDSAwLxhK0cbe+mqpyTQghCg6IhKxedQKTsudqItvcm3J1Ab237oUNP6Ds5G43UdUtI8kar/31tGaKP4lXewXBKxJZ0CWlB8vGER+dHdua6hZ6DYHjC1pMq36Nht8A+rIpqTnhGWkDjZUQtcUQ/RNIKJwauG+IXDakMo4DHzWrZ9DHCY2wE7rP4+0saIhfB5Sed/RdhLesoAoc7+MCuFEFk9tzZt8E8q1d7R1/r9QeaoqXSOtOfgKCWm0ZyNl0HpArzo/7rFQ3/jGGQ1NTTypZyMvvNQjD7CNLyr3UjDRvIDZs9vmFxN5GpgPxynaPrz6wJamYDYfOnZFdlQfTAhlcxY4D2aa1y/g3w9TsH2fPc3EgcRy9Q3JowoBnOG3E7WErJ7iWyMoAGktl84YJzFx8Dk5jKa00OTDu6kC694FyjI68wKgHHqbTDdsAAAAA');
