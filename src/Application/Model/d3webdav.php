<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3F5210DB8AAQAAAAhAAAABKgAAACABAAAAAAAAAD/LKuFW7S6vulcaFEK5mGjqbWRM5IU4kH8u91zeXhQUU21i8++4AZ2zRt5nshfW5/kWYf3kEC1UIKf34wuwpMt39+jMJBE+Xda9wlzZBvK9uOMAAV6bYPHBqnOR0YnJ3kuop7MiHjdM/YkLtqIA4oAYqukqaxOCUEVzy41yhgHVNFmHg+BBUog0p390+MBALVMiEDkj/Kn3RmdPEaAe6PoO+Si4JRyqGvqCAAAAGgBAABrSbbs5ES47a4ChSBwZ4NgWkIWDCivE+QTZ1hOSvxqLshdwd4WQWUklSgoJ9qurWVWSyBUDJ+Iy9got2QjfNLWuUR1AcnmtmB0HQANZvDH05GPgR/V+pWQTnxyrqdfeWejEtIv+cfa5f9ESJpMbxHA/z4963WBsAlsxye4LGmH3xb2eA4Q5foMtrL79UlXFN/9VbydFhba+Aj42yfp9LvM5tdzEB9FTnducUUHRCGcGhl7/wjEPDsCvZ84jJRF0JpCN0Mq7+yHPj6dPRtGv5FXB7X7ONXQydzXEza7dEEQlPKIdIcdAiylo9WUaO1hPLCH7dWm+rMiBDveLEJCuZj6Ug3yWiLofqV90PeuhokiPyaEZWh9jw+xXb5gdQKQeMpbuPcRLUrmWt9+wg8ePsdAdKr31DpNo76bknLnoLSxt/osYVWPUIL5d/aniLTuquEogVw+f5INfiA2L0Tw7NmsNS2gimQjY69RAAAAYAEAAC2N2tx1QiQeTK2I/XI7GyoKPvEIki/rJq+Hh++sZelRjdIlg6ogF17aO9sP/MRQbijU2m2761+g1KW+fa6QFqsoggKKMeS6FjysS2f+8qfSCl5Vh0PRYzxFoGuNyTx5VFtoo2SSblyDfme5pQFywfMY7qCUwm0GgyxQ1VTbuV69kg6gDmfC4IbenO+pZxjr1/Pwn5WITUpvbV1Rb004TA4FJF0R4+zqlp2CA6sX+PyYTwpVjMSJm3rYjVA1seCelIEWXYfszG9RXPx4tBWUDfDIPSd+vMd0EsveT78/aZMQT8qZ6xRkhj/scFWe0GErH0LBArv/udriVZzmrWSRdjxMYugKmmqQnniIjSAwybOl4SvtQh/Iu4mTUOB/5+imooVy3ym4yF7A8kKNTrdW6fJTGEq/lEVY33rWGi3Jll5KVqpb2jaYsc7NHALIfhKajGbjj94CBBq6dBnxk77XGwVSAAAAYAEAAG28yiCMjmjp++EJ+LEOTPP7rzU8UEWOdzoCKueTCVYJbm7bXEp2hEfKofhhuiRWClC1S2+ykOknwbTvU7BwzpCbyWKPJz4IFp8TYz+rW+xKxswpCDK766U+ZhlrNYI0+vwiAtS0psd8EEGWv4gX88IMv/vJPiTgKgxc/3BSQ7e5soSWFLRMud53W3v2SPYRkufW6bkrUHvGIIod/Ni655teRuG+6PLJaf1jTWrsaym/UG5UjpwHv0FSSfXArdmBwgiRYtIcTGu3L0PooJYRdnt8W11qIxNnArHaOfl8dNGXXeNrMJLybOkZxH1L6srK+jFGDxjzOney6Hnn6+29mPvLXM8sugqqsE/4HIXUpIRXu5TDvvqqhucCy0/qnuqSmtaUf+c0jpTmD6luwxZiF4kCSgem5YbAmYBLtsm3upk/9QfJt8x/se2ToQsqrGfHQdYbv9u7AFATKXd3tyxoiMwAAAAA');
