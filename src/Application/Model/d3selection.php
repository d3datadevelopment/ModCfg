<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.0.2.0 SourceGuardian (05.07.2022) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2022, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B335210E38AAQAAAAXAAAABHAAAACABAAAAAAAAAD/cNAo/verWxWwoB1OYkPc79/EUtpIsExJliza39yGZL2+TnMQh7UQORBvau3uUuPKyI1sGUXWMq95iWSFYq531t2VfPpW4smz9zjYBG88NZD1w5LzpUGuiBpWugifQDevcVYFOE7LxX6G9i8wpGNk5ggAAACwAgAAv3cRpJ4EXrS7FMZLwJsWo4Bzy1FqEx8CUqdsawhrC++9FXAS5pcl7XU07FbRBLF2ErI6gp4vXWJYl3zC7RyerqQkoZdUBTIJhBniEJboi1o6obADzwxhwyX+klms3dOqnmcUXm1DfjtL+bSSphqcZR5wZfbsbq+gbTyrumpZr+mSlZ0Qp1rXrvf2iTbgyW2FaXvhwnrWnO4HYSrnKvFiLObuGeNee8MpLQp2sw30m+DTukuZPi2IDEo6tqJjQaJza0BD7U9PM6YMD2IJOHzUZSTyGHz799B5zOD6l2lAmKRLExQJCCRs1gsvTjNw0/cTrYiAao9B67sPGfDD0iGhYWLSzLsrx6NdwhoEbeXmOUcXSr+N+mFq6WNYPUPzse4oZjJNw0r66S3s8Fh4K6O5R0MIrv6LBKpw7Hc4tXXF5l6Gn2ZMplX9Bgc2fZYWBS5RW7o3OSM2oqndPTHax6Tp4ehi+9lj9JNNstQtUPzkrcRKTTmjDoiBMMNSf+xS3AbIxD0OOChd56IO3rSCdM6oQsdkGBBRHPp+LfEzgbRu5FQQElahkk642IDyJzafdZEf6+NzQFdJKJXbL7TVCnUREFkK8Mro/Rz/nAEwlYyb26FB5Yeujh/tBBp5hY5k8n3EgVw12ychV4/dQF8LlgTTnGg8DPFDmrMJL8YD52Ej8otzxLmIv3RIzFww80tGwJj7bAbw7WsZbHZg2dHmtJCU3RP6yIm09DffgO1aArCachl4xU+zgbCCkpgArpC/gwBxcixSHWhDuhyAjLBEUtVzlsTZAgbhWkyManiz4/gA5vhIq0a89MMqIP07I4c8PQsipFXXfe1oZWrARWf+M8Hm+GbVPyBQa7SBKoK1kj3eEYQxk4qq9v/Cdb653iW0tJenhZ6M4ZNrjAUH4oOgOsV1NFEAAACoAgAAEaLPLSj2BwrV/nSSJxNeEuRQ/gdSLgREPynpcXGUITVhDdL5NdtfyNU4WT1dYxM/nJhEenQs+886tYeywzOD9T9OydrGCGgPvPAmB7RlFUPH6/hqYyyLQLSFmHyL7rk2ld0iNlNOc4WsoZLQk1oF8Ay3sZdAzl1Ts9jhjyf0msGl942SPUkjnUnlBJhJnreQ3dmZs0cPEo3XmfqGFj+umWEsytuX/UrChcmOLFN6oQ4v7sjeQKUmhn2QB1EW3GiaoWqt0Qg2s5Uqc5P505aD50M2EgHN+tTkqzkbwLUJB7HrHaZQiyGtzbYaMbiQoRv5vkhp3ycSBDpDdjWFmLv5hkb265qWv9rRW1dwNTtgsvf82Glm1fGuq9Optw6p0CK4yel/ae8Mkoq3s9mFFhl1P36GwAXMSR2b/GlIaLQAt/nGWeQD0Yogg5zq7GYmSzBhJ8B15IPLT8dsGb2ZREd5LyO2rQS+ITydOU9AKcn2/v+sEH3+z7T2s1N0OpTq6oy2VowxYQzzAnTpXmbJVrrGteOFjDIwrRugk4onV5+W7tTZHr7agEKBmZJWP941WDlc2stggu6jEtxiiDLf+pM4zAPFhnmvjc7IfV4Yi0f7Xwj3I9DrN3TlgFFpMNvFnSxz10L/0XkL5fq4H9krQk8wiJt7miSN91UqQ28ALWO4XmD2xSghPq4q6XBAjY8hXiNYqYQcvKmSYgPzpl/7zvLDEejViXNUN5CboFrXiJ4fekldDuGHlDSNwjMyY2qOrwurfyJdaAe6P/VJxfzoXXukhYkcbwNdFq9L5iL12Ig9bqdZB+kXBPYWHaVAqWfn71bHtbOtsH0OPHDxHUc+Jk5Ot3sDLXWxUQqgNuR2F23+BNEqxPLMTo+2XnycDMtcm8cVwfKyoE4jRHYAAAAA');
