<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B32D210F11AAQAAAAhAAAABKgAAACABAAAAAAAAAD/zmjqhvvBlbQvRmj77WZ001lJKo3p+4S4UA5hPW5fGMu+eKOG09unFipH2nhbURnSHU6oJNzy5XbElULxaTtGIA2uEnXKa/BY1Gm/GSobDVw2tHmmyppcBTFojhxh+7flzv9WeDThmzL4PcsrcqPbExvuN+sVlLyKtRTyPjCuisePF5A+jgzSaNOVTbrFd3zKcOWDESmqgCHub7BfzxlU5J8p0+HdmbxMCAAAAIABAADDLSkcg9U6D42ytn03+bZcdZasgO0e7YBixfk8s905damlt+ow6QTK0jkWxzP78BmZxIFy2nFQE/y6qjIGXuRHs0QQtInaLHNi0bW+JbcDi9jLhA45BEtgKEdhiz9WgQ0VWO1IYEj7Qb6VYKfWlf8k+mk60XWNEt2rHbLw7cBn4iGHSUUbA8/bMQOLom1kfX07exnqSK3lcsRCeRZJJfYbvcCi3gENbUlvSvDFaaCwP58Ox5/JshEUGcb0rTQ+dqHqByuYuzG+Lak8cPKGDFWMa9l3jSsKC9Vhl3kUByQ0vPpbN5+JMgtmNK5kjO68QjwB5pKghBr7W9nuJ3NTc91E0zIUXBoVfgUOGMqot0gyPYpKYvMUsLUYHOEW3nbvRzKM44OTjefjbHyMG5jgEYB6nfyrPOdMKL//MXiAopc8yTcG/ZrLQP0wfsG9UaCp7Xq2zTDkZH8qhjhy+VofTrJkra/twWxWdf+krN2j7aCRuQpApIB34xUOF0zNBuoyRldRAAAAeAEAACHDyn8/bsMV+Xpl02WGASXvqchVTZnDtmv7TPMVYE8dKomn20TUMCSF1CmEAjWSJkW/pAok3GdIFPZby20z0tsV09LlhC5yDccGQpddUX27qYgo+nQ+YUUTgfewGhugy9QyDTWt/jWnmD/5vl/mCWcAbgovJVtY0JURN1NTo90ZyFWzmaTDfN3iJMbz0/tq4Y/yf4iDm6IjtnM9M4PF8IzjFQoAdq2aMvdvS6GG6ncmE8WWU7pRJvT+zSrr3JirqiCZfV6pTbznYANvOvKfRWrtt3Sqqqpy80a2Zq3UxjDbGji3gvIP1iy3kTeuhQVlmj8c4v6AqroAiMR6Urt9lTe4wohSpOPV0Qvk1GY9p5gdsmjlJjyJiUJQLptuQVd5eHK94rh5iNAVp/mknrQzEEhMQKW9AJuFdPDcEABySWxNmcdKSyfYcG+U9ZlMyVkcvKsD2fnnhY73ludt4eAjuRp3GuiB1gMmTpga5uOjb/FRpjFks+WlIlRSAAAAeAEAAHzVeRJUXyfgPRvj5cFtLR8TBKW9ITMx5DdNCRiDjKZqw9zh33lGlerM4HZ0KyeZFgjtaxU6acFwKcEfN8TU9zIt2cGI73SHpb3qIvSxlwPSbbGMhcRC6a/Usf/em6LceLlMsEPQ5xr/6pWD6lLBy8TmYlnCUD/RjoOe9WtVgTFvY8LFWUmdam3yFf56p91ZGVv/0nEgCHiABXk6r/lajtHICjwk8OApxP+2paQDg0ghI2eOHtj7YevujgUxmOvcK9ccGRYsiYfywlaevaMTJwF3wDAH+x1Gcnd6saYg/CEgoKSzzOmd2Ry1xqMV1p6baIG2DaRAF8PHvlp84/eXRVpFyU31guwL5VExlJW7GdtYLS0CDOlF2ix8Yky/AlsxVFOPoDgEa33C7wESHFyzit4/RRHs9p6f711UgPgPy3RpQxm74gapjHrKiFsDinY/W4NHCQCnIc9iKzqkmbCsog7gvh2g3DNtFfKHF6ekpx52kPb3/rkotL8AAAAA');
