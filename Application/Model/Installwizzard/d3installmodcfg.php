<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B32D210F11AAQAAAAhAAAABKgAAACABAAAAAAAAAD/uFi/0KLijfKOif8UANDWQy6okjtw/PDRiP7kSY4INi4bR8RtVo0Dyydt3LexwD4jakQeMeeH4A6GMEE6O7X8pjfs6QIxkYWZytP4sJILJjmAILYseJCJAhwCik9xnUdUR/zYHUpY/mgPRVRLE2xiE2Q2wEiazFcn4QoGTMnoFgtNdwHfc2iuAe1ISeIap0TYnSYPFPTxAhhoXUnT2zpxpou6h3Fghq0eCAAAAIAaAACWWcl5fMYKDGQNXVwe3G6XeWnfUkAwxYI/8TXq8KoJh1ZjIWhyAw6p7fATY9AnKn0SiyrEDTn/kwwk8+qx/8X0JwgkCx3uPFjaGQxxIWW5FgRRDSIiODMHRkUJ9Aq4RybqOkCmmsqgYgTo4zHClT5fEXn98C7/VN00bSXcSG4SdjyG7o2gdy5i7JoTkd43KSOJEDehRXVuzcw5XPY/3ZnJOalVaESY6WnkKHC68tmbnkOzMTocNHagoZZHNhqRccKEzA41+CydG1EGgPLHTdw9s/lcOpbNJet41sjL4A/KbmPk6hcje0RWqwb3j29cwKfcKO6PabTzZ08sIJsfCZm25imQ2ua0Xwq6xso+FXeyaxjmh2JubVGxIVD4Bp2L4teVCgj63OOyozM4PFHBgHhNPKjnUb+b8fg8Htj5xLMCD6Vn8+9qSeBI4eXvkA4QQMmgp+TsbLiGHPlubPXZ2G8g4j7DTN+BmxcfClmW25ycgELcm4T1dFEC0OL6hM9Wcnz/jZWMOJMKY9YdnGhnee8LHSOQz/mS+BYpGDTMb0aUzWiflbXS6ihyptaJUk9w0G0S1VNnPl1niTMIVh5lnOZ6IvBGYrrnp5wtgiEhU4StK68Bwx4G2OkKvbmVFy91AC7VOjY22DqHxPlKD4mPWaL1uY2wsahyDqb1PAb8FEmc0DYEKZJtLcvjPOhh7dXr/239V2265oATlCO8QHAqNCxpP36hd+4Uhvwfy+4Z1PHpMjcoaY/FKe+cFBWovN3qQzFefiLUODnb/uQo4DDrVnWoMXzmKHqvcf3siMcYMSJkniRlUDvtd7F18m634UsCCCy2RArpRXAsWQL5CEVCH8m7tBa22napXiS0+oZb3+9eKlyOWdscTMlZFx7tnHkDiEZA4gnxILPEague0PC8FcpLAsnv+bcQv6Gs1sH20wpmNf3Mxo9O/uqmzWFLJjwSMiQ3euptgd9EMcMg7SpDRPqoVgTmzQBUliy0RSdtu3SFL7f6wTXj25sR4pHy0HSwDFHx0hj+KaFsMb5e/08M5by6T342qYxv2D1UueNMqW0pfP/H/jWAYPA6z0vBrRPasf4rw65Kf4Z+8T6y6L7rhYl6pn+YfzKArKkVxS3OcxW7DG5qlX08+FbhRecaTHDRaSx0a3FCMa6zX0JX5ueZP3JWmusBOQJckpq9IWxCYAW9KGYyTG4raXSIjfY9GbCfiaRPpUIiNF11o6jpMfeXz/qEpu9JQe26YnoCgp/ztXL8oMRzQfltMoDcZ/dqa/zdG4bvEIlPCb71XZFmko6Wp7q7B7kHZ2tKKBdpsfQ9tetIwNaSnS1TdZwDJXzYSORRu/i7+CXBSKjesZ9bAcBWsGwPqRVnGuVo7CO8+4WXng6DjdGOIruMOkSbdVTRf+Xgl618dOmPOyevoBfTha4R/KUUYOEYGzftehB1db6eE7v4wvxx2/2HlREFOQsislLJf8XNgh4hUSwZjr0kqwFoW4S1bct6KCSEa/mFDOHpP7eWK4yOL/xAf4NN8h7fgx9ZoWF+sBESlmWOWKQJT7GpgHY1m4FbYdoUPjgl8ztYZzTq2VgM69aG3Tkj6Qtiyxz52dZqk9iAPXFYdyqgkcPJFJukZHImg97EkPDR0hMJ0Aj2H22uStTaXXnVn/ewvs9W5mCUHrw9kfk8vj5HZv4qq6t4cGhrwdhWYlBu2xWe9bHJ98C831ndcFStrIdqsujd82qPHZiVl/wtExHBwUzry73iUluQb0D1JOfVuXydgFbJcLIYmk7ZXTR6nVYJ5MNCWAacdcpxLiYWs6BEMq5sZoiYw35V2q7rfkYsa+S+5FKl63dp7xuIDNK51KeULDn20ypbyuaAKC/rnKdvpmXQktJfkE/tyANGGC02147X7ehnfG1Tr6Pw3rf25mT58wZxTz6FO90pbc3xUNC51K2ZpETzgrungr5lCPx1vHjyoPsIf/Gr/1+2b033j1oR6H9MNcS18t9IIeAUosV6GKOhe4hdo2C7cMLG448jTeZnqeDsk/1+S+Ey/PySICst8rojr/EP/KQNqGeoL5bo0faVEeNDmkjLYsaU1kOLD5CoHVeExdeSMTPgFp5YhMGc7ldk0FMMysiMMO+a9xp07NhR9cekGi+GisHdMwcbe82qqA2nDHCwsiBVhZRlsvW1A1ZyV3Zcg2NY3Cmoi/+MnXL+yGT04dLUo0Zht2tRgaQKmsboW0q1CHOCCW4fLlKAXNG7FdliczJ1svQVPkwie63gjJS78jLf9kyQovsMkVD7w96H+/QhdNpkHrCI9nw4MTFB/MnfwtGRBiAXFeOxZJvFMuu409AOetT2TIEs5taX2UolA/0TjbsLB1p9rhhFkrk47+uF3a0152FcAKeIGMXeCQvE9s01pFbgd3yFbJKm/qrS4d7SYf5wrQ0cFFf5ABWLQqWSRr0Fa7CpBeQcR3eydPFgU6zIdHp0giACE5jMe3MPm16AKqNv796LFhYBN2fSmhwvplAOQsi6AsNIMrOc9fwbR4w5t8RyseorV9i9eSlBx4m/RMQTiMNZUHGt1f1gaN//++T5WvsvprhsBDgS+N71STsyHXcsL8/T1qco8NuziyhHv+ilzWwkDH2VU5oF9sA7gIAYKru6rNBHgoV3QnIFajnOxpWHfS7ZdrZSXOM6rbCTLxX2KsD31U4Za9m4HdIi5dsj6fL1xWzJ61kWnK87OMJiLKoPK1WJYTHmRy+Lb7reSKK77alYpvbmI9BvgIznzQ2KB9VSPkzZfxya8koQuJmn2zBpGV+Rvi4XbN9P/H/vOYVGoZecj+4VttTj7cRJ8qgj7EozQegDtuzTgsVJw/q8DNnWu6b00IIlecibRMupx2YjxKx/i+cnbwi6GH24Tac8JcFIeiwhKJZ1LkQ96YYE56BAp6Hv60WLW7aOtpHFTqORWpnou9oH6+dWEZIEBW9sxT0sDxtfoFpjyYdWXL4Ey6LnipwIPKbZe64lUnZEuwGy0tGAUYwYR06C7Dp53i1i3uPrdfKQK/LQEhnvSFeA8rrX0JOEk+L5pp5DylfWdvVIPhs+ETpHINa4ZOmDzv1o/bYjLywO6F8xTbU8cbpIyK6k1oJHgRtwiR5kG0P+j0MlqS6yGBXR6/WqE//cOUmIFmplhmL0NFSgTgRX0UXSmmH7LqVf8NfpBFP48bqaw+07wXNPLCbbhnmtvFJS0Ntv7jI2XjRx7t1N3gk9m8cKmT8WL4zwApjzMoV7CJoVQI3eSaEujBnYRilLrBUS5QRN9fXBil9nrmW6ATv6pReP0/cow8tXhwCbKcdhDvO8ao+w4j24Kn0Of3sRfdGvWjNibncKgsFIGJ35b/eTbcakkwLjep08vcGCmHCjGvtkKScq5RGq7CiMoHfINZCU/6rfEZPs56fb9+/Iv6P+2NrFSM2z+AAfsmv0N4pA0cmQRs67qIzZJnEUTQM2o3fFiz125qeMM+wVFqnmADlucOy4iTkAWGY/YkpItsKoA91nGZbSbNvtJoORaWQE4KeZmHlGaXFS4Xai3F52PtJ69oy0p0XszZvNIqdSZe9jNmMh+mhoO+eyVnV3aws+XXo+RD9JQlI8Fk1g+ATjdNjmWwdeJzdBpRIrUQzH6aCbV86MET5ZmDOPUS3xwdvNVG6VW6oF0lMgCwSBHOlZUL/wPn+G3QpdqJacTTsZWO0WD6yEnElqm/DTUPdizGgeCNtVsACLT9+k0upmRR5YJvTIGvXGIXnby8bLNWA4AxiQsE7IfeFasEqU+OwH8hjDuZIdCszJ8ml4wC8W2jrfG+rdXeSsisGFF3D5RhcXHSjV7JTwE09PFhkQEFv3u51q2RnIolIxCwhrqOIGb6qXu00agAAJEa+dc5iA+W0a5ZGuR4OHIa0D4hEm+cQzRZb3xgSm4W5Z1XZcYu4TVqnjco1gjis+g8MZQpc/J/eStFfkZdEuVCrTXZa2aFhtwY+m0S0+K7l9/wji9ATfX67FsVEP1dgonQjFfT+/jQPAzdr8HDkobAJmUNYpf1/I8AcC+nG3J7+FhVyZDWH1Fb+8WM4hSqOYusYkzLvclYzHoYkFNyx857TZ1AH4nV+tKzi7Q8llGBvb1GZ/r1M71QuULj/iV4HEiKkq8ljk6uyVEJsehfdWQxPdBnaWKCD5LXPH9cs2IqQqXbUDExjpEfvOWHjSMjX6IPi1GzRALCI+AYYJ8WuFT/XSjbt9FlYJ/+VUkWHcdzLXdy6GcLqQRhkfQ5hjZ4t26rSM0+7cd6KEOTIm6aCD5f71gGqDHmZYiHtjEupkhSSbTwLeI0Gcd1g3pN5JaEi9fcMzJDJlQEg+nFzdlaYDF29r51Rm+IPs6pYT07TAao2NO+3ouzM2GLMXG+XSD2+7Er2e28JfNYjyvfu2x6eG8Y5/h2d8SdX6IU9vHsweKcREMGWei440O6UCyipxZxrHVzo1PmFtrFvJaLzofoZ6ilNA4Q0C/e5PBxnflyQfFbSzLKBLw4fm3PNPkKc/mhYOBUFcSi31VxVsHEtHKOSVERLvFx46FIj06Enz8zFBUsHux/O8cvNKX60XCNCXE+BNcYO489pOK77/hSS6+wrFPIELlIBTQoVxzSTk5ZMzn5elSXtDvGzV43rayAHEtjETwBO07gwouKRoH9Npo7MCOQaq5RmyGo53uzfK3aMHy31RFgU3A/OoQ1YvJNAFqCw9EEbZnUfKlamahr4BJgixe3cGRPXkTRdIBsdomjL7Q0L6btpFUjZWBWmKDtenp6buBz7ZHdrbdDdaGIuTG0n+sV6TN8b9j2O8CS/gBjFhAwtu1TpWdwmoDld4I3rJzI0oiInRVZFmMh/xEovwvQhHACCQoydO8OKEQyL64175ppALTzqNaFycQk52sF1AmSPRlbqKQjTEQf9NfAmOQYEqMuv8Ow+jkQT8qstMexp6paAlMJM3J6HsSS0WK5n441w9mmt0wUhHYXBVKRr5tqA2IPKKL9yCiMQ1ubJQenILWifNQ1yWM0tbigf0W9rFuEmoUGveQixOrChJGPpvVuEl0f+aWV4QDo3RbGozlws7hnlTLKqtWiEhVNO2eDL9k2szEyTnnhkOViMya9Oa/ulHY5bPK/Mh7pYRuppPSwC1rzDrNzR6tC2AGG90HvAI8hu42jub6mXtGeACwJfoef/iGNn/h9SBQO8deXne999WFKtiT6E9q0OxJCOXKXIAOW/8Ozn4JvutsNBdqj64fCdP10AyF7exPGZT8wdLNShnrf5nfmJVLscRIBGOxc2MGGOeG1ECmEwY/20TKApARiXAkdRSsaHdnl6UValKvhwwHjuauB50xdVVBi/Fr5VTHz9HaioiRLwlrOhB5cwOMtdzXJFaxUIMXiPHaKyOALsQkvSzsBWB6Nf5/Twr437xoiOuEgfzfPPFnbpbX1O3+Ec1mNHFCq95MdouZSnsiBurPhvctVSId1rBFMYXI1gslCyfU+wBZ4e7zeCPXI2YQPu87Qu2hJZrTwjU5NPixp7/AJGVOop938opFmFV/5zHs6DVdQ/A2I3xbl0XOwlhaGZQkAicW8STTzBrOoDEvD3kYmt6xRFou/JLgpsyX2hm6/MKS4qY9QuuzuVebVVAvPGP5WI1brIy/TZBlLcNaGAnGiI2VEg3hcsv5+J4OZGO/adeF1upgqA5gddbIdVJ1ze9DknCe8zHv6w7tlDcQXOSqkI8ig64ZQ+2NNrZSzh3Wc29u9mjLUf3UkKG0bkE0yz1HYzAgeT0NZyJAPC58xdlHyGgAdqMDh/aSjQ4OmOIrMH5X2j0RWO4z1ttbTmOemc02UOdYTHm2lzyI8GfwQxBC8UEPsyQdOIUoO/sCNxZM2DzkZsgNI5eG89CkTfhJ8GAGB2toHgsaUMVsk5eWJulKcIua6Nwpb6aFPDPoIelO5RXaJTUkxmy86e/ovJVqENwhXNJgYUYTwwB2XD/4jP3Va5yGVX8kGtRsVMWhdzkaEh/VFMz/jXFOglWR1tO0OLcmlGNs3mb5nYQpWzjGOfOJZmQs64qa7VPb5LiZubsZtmwytNYHKnTrDioqlvrwUYJuZUHqlBF43Qh4oFc0MzGHHMIQhmU7r6jGFOgBAujfcYKbXH60pHCdt97i38xmYFqOeot6+L4CIGuMgSGS9J42jeV8G7dQXFBP2NppR38f+e+fa8EKaYoE+u/xlMaU7OuaO6yEx3I6uKBPNEJ5xUZJznZ3dob9nw6RPuOH3q4O6BzRe9FK4J5wDTf7/EoClJFp7OUuXXYca+HUJgklAvmSA752WUKaIWmjyDbmci+ZNy0q7TZkmfggBPhacStFsVQNb24BtyLQwFwp+YSvSYONPXoE9dMmhh7b7fMzNTquDYRjeZWLhLq+XJdM0AvETQpst9Opa/z3IRTj2m/Kr7efnJGJPdG6yVrXUsmTsn99iElo6rrFFSA+hir/i7NBMWPdKrwZfeciTGHE9pxD7aibsFNUyyqseSSo/X6eTf0WxmyI78dTo+hlKHymP3y2ubXPihQ2p6AOiISVBV8XOQd62AWrQ85ai5Ri2Bv+gWokanCkR/1CXhBq2b9yWfsms4wjmILNV1D3/mYD6CJOjn26K2Qvx8SiStUB3H5KtCQzVB34JeD8z+smcc8h44rloavypcAXjeQIbvMxieK3Je07XAP/RhVEWdqqErsOYtILSC8yvTXoWrh0o8iG+rLilE3D+d9bQRbkYuM8XzhzoUiO2JGCMT3EqqNff+cowRDPPBohxBNTBA8c4iljHpGu4Msc4sgqkoy2sgVZ7u6Cqpl7YTb2x73YwTy4legD2bZcFdVUq+ydfA9b2M6dulOJ3jA5DwX3aGLhgcTWtcQL/72xlCbdsUJ3WL97GeVXoecFC8Z2nwnFBshEaUkLr+i0cCse+zSl2X7atDxt36Fgq7SSORjQs6NAAOWkXb6+zUs5ckGYl4txp26jIZ9fMwBJrhupgpC00KG1rz7UmvOMd1j1mkziuO4VIW6mdhmvbOIQbWmI96Wj2yTGtMIhNmfXbtWJ1byKmNmiHLmoXgCpUjmDI67+TMAIzSuUQCSlm0im3p1pxqV9yDRqDHccbfr6DSYox7+i3cq668YNDgz2HKyJPm9nsiOY3iMaOOMGMdZFvdQXHo4V4/r/iSmf41IU/JhWf8QCj0XFnqRkqf77CWBwgxbRdqERFSFBRqLDDQ9000vBhSXZXhaA5Oy8bc43EivAGAsdqn1CeqsTHjWSpRY8xjnSFD/AYZZyfvnB2d44Tcoxe+4Eg0P4WIH9IF/cKegpGlMMnMl67gwJg84js9IQ7ZPrpybK/uIcLbXME4TrRhdl/WdZzaBMz84RKvLbS6tdzhP2HknLPj1kytItQpdnGI+lh63ggnsK+ERAHtzuyns2hphOVWSlxwz0pzNCK5f5rsg9yTiAlCLxLzpYR4YFTuszPVWkwrWthEtGHcMMUG77IJahFZ8IH5+eYIImNgmKPZhxCWN/Ux7j7JWpOt90HWkQKj7Bu9e8Wk1zFIyYX5bPg/y/9dGr2x7p1K7GU3+9GaENiFnOlZ9M8HpHodxcoS2ivbKqxDv2LyMetgSWjVwkHNVzsMI8iYuAEf3IAtpI3G6wStpVoz9vN/UPfgTltbKy9F9w0pL/cEtidoFIzzLW95RGt/NS/CJIL5rfZbS+z/0v9NQHNWv9fL1pLDiCAzhpm+9y2D5Y2c5WimJi21ZQ5PgPE+69jra5PVw97ukZP6rG2hFib+08o/rlzV62AXgpda/Z07GjiUUaaTu21dgV9RpTzPqBU5jU8Q4anAHX9j4BEYAfumtUw6hFPShdYNPhhxaHVofmpZ+5z6ofElQoppKpQn7Qjg7uDyRGGOhCZhNZfzOdresMOqpha0iMKKO701V8MoNQfpwgIPPX6JYSbxX8cExYLfljXfvMiX0rBT04JLj8Y7jmSlLRyow0txU2RZcbAOnEh+uLjnjdQwcjlMeV9vV9tK12IR3s/asqTYkn9s/xZhAUekmzY867bHWt74fH8veRYJpQxSshZw/kNV2EzwiRzBJFZnWImLOv/EB/BFONDnbNyMYwCUsPvjqfZTWVyg8ccJTGvV+Z1sEdZvZJuRaXm11NaIzfVXXRcprHLycv2wi5qasUgE8T28tauL16Y6xSajnbR3yht5Mp3gCcGZfqAZupvGX1y/gfNW+zmmrXL46wD17uaLldOaccwPunVFkiGbHct182Gh//YkUQVEDckFTZsXOROn+yhKgMJbOsGkOQJxGA68MHFJOcdQ4T80rQEyLYDDeV2x3eW7saoFKmUKdk47IUrqQ0/uXvZBiHsUJEDTvKJ9a7BM57fJqwNOa28ZV+ucOH0WkCHF53GLcD0L67pbpTTI8O/jLSqGqWIIKi8kyRTlnFzbXotjmOyNqsFadbm2/LURwFLHeoXBJGP3Vv20DL/twZdBHNM7uhX6vx26rVBae7KWKo7TC++wbIoWSziTSsZvEhJZe8lt6AVo0A4sDar7VSjv9mKzqst77EprFTWZiHFJXXLTr8p2bLGHRI6UtCj2syufdyF18bw8X5TUA7MbTNJIvPL5WpYgg1A6/uBQL1BaKytdjfMv3zpfkBzVq2NGvjcGJBYvrvNfwG95E2ylALuf1WtRIyx5Nc/GSH0XeU3kgourfYH6a/6b7K7Y/oiZd1xCE1zd3HHrijcEvQveVztzGB+FeMFyznfP27AP5wUONFxy2veAQ8+5fp9EOTCro4sgiqNNvDhtEDNGd7IneiR/DydTxX6EvxmZ2orlrJ1DaTu5A+NOr+yzfeINpzt/MAxZghZwNFP5MgWY8y2KNAVUXEJw+c6tXC9uj/DaVtabUjw3OD2K02rIf1xYgOAhtFD8Lebh6naUSVZpu66xo9GqnfXSALWMlR3bqjONxIm3kSAIt7O9NH3PqzM5eKWDaJtQpE5rGKVRkjWx2x8kHGlSxK2v1DWnLJc6cdrpxV3D9LHN2pgM1nJjMnSC+RgC5s3MVJcUYXq7xbijSmUbAeiWCgeYmutdMclZPuD7ylj0F+Cxu8nwn739GGFGcUQAAAHgaAACIDg0vSXzota7TJti7v7h4g76yRlp0RDuCozNJad3VNwSjyhrI6nHjwgke0HBN3Xhgk1rNnB/V1ynL20Cmb9RAnKRcH/2++egaNdj7T/r50u5S+NZurBOe5kVNjJ3nJW1VdP9Y5wN+XnPdLHZSPOUk4W0hM2FiUxGfnW4KzFsyP1u0DvERYjQN3uMUOW2i+fmnpSg9zJJqsjHuEg/uVRWlKbrJpYlyK/85J/amCAfwsASRKKGSl4fsMtiW9uq43lKtOV8Vm0vzQMIP1ejLA3yHs+S/mQgighZi8nWeYUNoXF6vkaZF1AbfGOm97s036GAZ4kDdrSUuNBBG4vJ/9i0FuYyRYErwZ33y2IE3Iqra2yNuJ73rvuLY2e9NGQOpiZV+8xnGBEOHnc5Yxs9Vr+9J61h/JXO6vVFuX8NU8hu7X3WrBOwLHgrIsYQkYn30OvHw7DuoR1rKmPWrTbx8x+x8o9GSsrKk2k47aAYEG11OEUCZf5hrc6cEMUTZp3qS9mfaNfeCG3Lp74CldQNBBSwaGz2t6ICrytk6+mUx6i1ex/plndqf8qPIJcC00sCOlHtQAX90cUZe7zpe7dsubyZicvBZOdlEbfp9HUBppgrR8z8Y6Mct3a6gKOwd/9gm5HVDvyNiOhnQPvlcsvb7cjnju3mR5hBn29pI48FrCpy20XvGTmvNftC8+3cteAlmKtxDgpVMh6kA9U0KgJOeDwdHoN1eQ4Djy0sgcA0ypfDXHX2KkPCe/Bkxmmt+4J5UzRv5SwsZG6Q2UkWSWAUkeNgiCZ67YUCrc06ylTcB089/WT3aEXXwCDIqtJOHa8a/Y0M6eJu9NH92QTE6jfDLW2Xwqj6equdktYT5tANtVb8FT7WrB1Yd+SPlBwlgj/vXriaV0w2Jx6Yuf+r7E36UVJGjOHcVRc/UGj7UmFavq4O0l+XuX8OsPTvNWWWROwLEeEJCFMiWFTl354YoSIWax9yFFQG1nRDBzW/jxMjXRvjBNIy+La/X55KiHtBYAIVkpnCkHl/sWmRo2S2gK2yt+z411SCyDdlGnlvBY00rjZNbRdAT4gxB0ORIGPN9RZb69faRAL5ZiurliY9lSlwaIjktinVXfxh/E0Wz5LcHNLzlkCAsvitWbXAuoYXxc76AFgYKBUfwOsqZ6RasEyzx7NfBCclSIgHDmLgbBbWBKgXXpAUbQ634j4pqm1nxLvkomZ8BsNSmp7NiUBeiIv6JgWoJG8B8HCvTb4eiupQ4okhsl0KSI6+c+LqIOyY92sRLuWRYmnlhNzINn3XNT56upRNiKy/sZia2uzFH+Kbfcfp/SeavKBzgoJRvuBUM7FdScCDeb8N3ul4bujIYA6NCAUmPlHojizFI2g5BMq25Iv32MUH4z+715khBqfNrJc/gU1JJoiCbEPnxUZNdn2ZXHfjkyXdkpIC32ltWWvQamjoNe2aaoP2Qz4I7aLgXPyd4EU6jSOsaVkk26GD5BQ5FlfcC5n8cg6HlO23KmnlK3yjWqG+lpBD+CgBQ0EZNdqRq33VNJHiPo+bZwGQPY4O2sipLyhZrz2C+EhX7ZcFxtrJUJZZqOgsqWgL92iPRivdHnDLtTLKOMBJ6S1RSuZQafG3OHKUcWfBIdZt6DlmG4+QHPMZjezwI9T7zATF9ve+Lm7i1iMQvFHyLPggCj3XWYqfaoi3icDHVxVcDMyQMOhjnzGwropgfiXNP+Q0cOaHvywxbnj2vDULCd56FmG/ycAoTjd3SrV7mUPNCNuZ8H5wpSIHyAcLgcEHuosxxvNwML9EVC3hP9sw+B4azfcAxACOTJDmgDDt0DkMgHuDqVISmExeUfoErkyJJKt4GqGkwAOuK1mz3CdgJIyVtQ4NEMJZE6jtJBGJIeGqzj00IZTspIY6X9wUeMzZvaqh+KF4kxGixVr/QkA4JXUNwdxYy+5xB3gu4/cjvNdRyusuqgu+cTCDLDcIsvLJrQ9mlqvBwGvNyoiVWcUf5IgPq9u4rQG+0RS6GM7yI7MK+CUimUQW7zqrd/ia17PxIrYtK9T5EZpM68lv74nyixZq0YZ3B9/h9+E5sNsLg8IVthCSnLlaPz0NXlyV8J/VxqJ9MU6+tuQf44g4KzriEXuWEBlHL0T69eujyMpns/YXY9QRZYr0J56+fNOnphGisQgDDRxb11TwEEvhiA/2i3LIHNHRIh8/zs6ZV+ykYPGdu7v3nVoZNbs114WM58OIeKbGFKCHRmH/4GSjve7u+ffSuMNCm1q6gbHVF5xJv5b4AcZszZIibtfl9sAOzs6GUI4vXq0ej2ZI2XzpLc62qKx+AYK6WHFdzvOvrttcIp18W0o/rmaB+3FWGO/H9/MWMC2Jsryrh19U8NW49Go+t7uKVzVI3sMVEoARhpO3L5GTVmhWOPk8LO+q8+OHt2BoZVpEuUtIuryk7GgcCFqPA5HcbtkN2ODNQ4U3aG5FjPhdZAYQcfEaAb5sW0mv9BsaJv54AsRDZUU1wEmKU/3UYHwfWTr8U1N5Tw33wdhOmLawf1GUM0goRJq/IZ+9avrsAOAmafZ65K8NXlcygkv7Gp7cc6oLMEbFomkS+jd+DORFDt2gURj/xyYCJj1p6q8GuqovOzc1HGgFrfOA3yAwpzj65AKbuuaxEdtiXurel9SPRkW3WeusFRhVSxTueLzet/lNnjAc4g4OA9ngbhjdc0EcEvpGwb8FtXXVZ7dfIopv9/mIywdUuKcjZqpvPDDhIAXjRN3lNz0aNEB5dPaU1RgoANm7mZlYNWUp4XBqjFcOuPXT6G3DjkDVZHBcc3AuXl/fZK+0nCGQb9EP+T5jGrMqBvQht4t/prtm5q/QjmfCMbRdjmmrT7D6Qg+Z1+MuJdH8N6M58eyNnyfCuZ5u9CBpRMlqX4uW3g6cTfUm8/+zgMtdp9ElHuwxKfYVMBmbMX3i1KohLOHvIgTnFaTLC2Rvf3oyhSiKClJf5K/VuPSEUKtzwTSDK0+zP4d+7wyc0qwO8ElAMl51py90FDLEIZHS/KH9U3gL8ACCjfRSRNx7mLWc7DGLwXw+YNGb6bAOylOQGDMrew2Fb6rkPcrVPq/2ZF6KuUWTMinEMDxLkiCqSj89wuaqxOTEgfHxRmTVm4tUWjdYmlc2uGuzy2Zc6xpaIRrSw1bmYL/JdeXJtGxXS4/ey7Bef+hz5JVuNPhi4lB5eu0gcHJORqAUkjy+9gfqjVOZZzbcGfRbCIqUz4acGTtphDhSAEWrsYTEq4pFvMAwHx2id0K3GKHPaikUN5lQIWvV8hanJYjrUhTaaiepdyaLLPfBejMsu4MKNnxGg19UUS9/FRnS+VLy5P9zwSFt8Fi+lLNM+lw4bWlwwYPoTwayyIg0hX1o40Im8njGduHgA4zrYVdU6tXm4nAQGuiitynuCNp62DyW0X279IhlPX4wE1ZJcG6vX15wWIpcB+mLY6zMptkhwFESL8bUdgM9zfejT0V9QveYY69JmyBQIWo07ZRKlGndxrkCvJH47FA21kyXc1t5LC/7qq2LPVfIqgi/+BBHEm/VOvCEfcNqOQ+KHzfpaisPGGZkZUkFDrolqImPaMXUsaz6LYRbu7O/GtDPjdJDweGCBRoiTVPYP11P1cmf/Sj+vwFwXB8V0nietUHdNptGJ8LGYgWKAP5g6GAmk8HXIvFEhG2HyUiBLacYUtScrrYQZJ8osC4d81SW0lAco0zh694ZijTPpx1MXJ7XQmSXTj5wR46pP9Mn8G9TESOaV7E/OjEpYD7iFFRY+acJpcQJFnUYoRp0ncWGp1YAR/7neBG4CE4NQFvZp5jn8ETaBBVCcWbsjgDL75PZWhnBNpXNk0G+vI1NIiKhpmByYa/1EzqOhYXfkrYtlPYq+dIlPA2IwF4vQtF6s0/XgH1of34GghyIjZu1UUu817S+JsIk7Wqt8X86bjI5zqtwM9ykFYT68GpGeVP4+UtRrzaiTaOW6c1SLVDEFkZ1E+Stho9A37/0IsPoGc2ITce7ughmWt7AHkjXGIshWg4Bds5BHM/IEEkyXMf0Ex4IzWESZ+5hgV1uRrNA8drXlzuqHjDB2ir59EJuqW8+6aipgJE0QxJeoleyMOit6ac9/RuKu5UackC2+0doEnJaxm2wkdv260ysxaLyoqafDJJ3kXMj/IQM9vZ4Z7td1D8RFNioEQBnbdtmBarM/fFdzUUiBh+ufKf2N2i9jnHv7I2GAHc+uy5+JKJ72CqU0E5Jp6gqO1CMYx1Ow8uf1S7cDdplDcPNxuu95hpgHuT+isLSgWMqOZqEb30LCtw2iuV0ZccewYJeYYiGapahKMAxPp2WvBcDXEO4/I++qnjM4uhkOWuOERzNS4dI24ZD4g+IduKcOmkA3ooNjcS93NcQmOmazPpyRf/M/Qgt32NChHv0q2MxE6IQbqCKk9IsZutaOfGc8mvKXID46ZhitHnOpCwDl/dQRyj0oaka5zzkiCkVEGdhj07PPKHoW+tfXFGmfXJA+e90LxedwpBjnhgld1HHmE70bITbR5ZNQsv1PxQr9Y4bI6GJT+BIj4jF4gc+LKEhwRJhKfNGE6JTCfBhndXMohuHiwSuzqSthnDqloVexe9+PMaDw5jdfYz4emcUjHLHgabxhhDQr9wus2oyRfqhoOm1D5QqUm3YMOcM3WzdFah/b0nh/9ji9oveqU3ucfExeb/0ZcEUjszysCL5NOqGMjNRCFjhXUZTE0gawRpJDh4biMHY1AW6uejkoCpmDt5C6Cdcoi9H/19fdOblDCvhiAowW96toYRinxOD/OYyYel+rI6EA1uC880lnSw0wAPcaOcw2TcUInZZjwrj7b6Y8cWwfGh1oIqonJRsjI4i4ub9zYJPqeuyoF41xAF1iGUwyiIVuoayBM4pEe6Id0WlFpSjnyMCf5PIoHtVkkiHpdsDBZgDcPNKjkxsrSUEXNal1upQPkBTYrtcTUNqRcNXlnQasZ71HJMLWq0IbJnpECFhGxHx8V53dX9TakUm+sWrAUVWfQPYd3eS1FL6KcQXYjaFhYxm4K9PhERT7ddYX0x8Gsb+6dhht1ZjtbKBMxkMJ80eM9yxYEuko9uQuvi/O9TmTU1apXsQdJRqbDkPCnwtKK5rnYSOHhXNjIuXyscMgWyTAREuPqa1ca6kg/47a/KVR2DZq262BsWL3fSIK3nNCQsSnzIdxAn79JVotXKeq2pUjVH5ytClyvyLjeo9IkfO+33tVCkvEzGT1jnirw5ax37jzCXBsEpzRpXCI9visQ6ARE3EKCV62KLNbD6s19Uihq10uVcclgvz6IpUU4rT/lvTtZo8iGH3PXxpqNmGafzy4Nf8liHcxS6E/5ff2fsjcWUIMhMzhZYE8Dg6t9lR4U4ccVk6jR8eRMYChW5knwcnJdZr8OptN/pdyH6OycORklRSa0U3wHNaH2oO3QqygZ8r+ZopSMSB87zcN8EYUwZzT1T6SFyuv4sbK+Z11HCKLGcq0IQDzprKIujM6zjuraQCJlvYQEzo/sgY5hIy0XC4tThesi3ppL64beTCkA92KGzTnz1CsbdXKUJdxcjYDnATjLAPosdJkh7xiGWgp6MCkVtjTmn7h8ruZdV7e59LOPXk9o1kMT9CJyKXxG4qP27H5FqWOBg0w/1jVM0dEa8NR32WEBjCl3Zgp3EINnRmDOGpoHpTUSxY+NhjfWByOzar/sRSmlWZrWbaYeXJ5NI4IsoWprNkn5oKXe4UYAjuB4QA9h+EmQ47dO9ShIc6k/OYoCH8bqgtfIZMj22Mbbfr76YWeX1ev1P572qqORB7DuNHFywQlzrzeXZhMZl0Q2JosMF4hfi+iKMF4Yc/WwUc/MyjD3gejQXm1/5FEC5e3IjWUzMhIdqDDwNr0ww7+0a6A+MgZk+XykES1xEGK4mFyKT8EDoSev4s6MpeJ4S+lReioJfHqyRLyORHWvdKe5mHypk196ijkUk3cBisAU3FaoJD8hoBHmbXc7Xf/HezHw4cw5eQH2D3P6qJEw23i16TDh4NqGSuXEWbaJdGyDQRleW/CUZIVN+5z3GKsqSi9pB6Th1TZVWzKWX2nWYZaq/5DFEDmHBjhOWL6ox6CdmEbRVsaUrrXSzVk6ue2bLPA4InLgiLdRSv/Q8v/uV1lsGxCJjKl6ih0cmWJWmh12akqqxIIr+fvAanRW0Z5rjvUu3rswCrTrxq5Vjc+5hPKZWdc1gkxuEJuEGqbSrIHAhgOYzi2DRt4mDhdGGGoHJGDrDydI6zjB0uIlheNTmd0vzDAojqzY75AKdDyF5TZUIpO/0dTxWWtpVWdX1llpoqVGlDslGPZKmo3+9g+BJe0j6EYx8bzrwk/69g2KklOYCPQpgefttPTqM7tH10Nn+J+6JnKnRt2sb/N+edYJxQCX44QFu3W1XUgV3Rn5LWZp4T8DBKOcxAmZF4W/I4QnlcPDpfUsmpBlF7yhAFN6oQlN6KtrXQFW9122Sz4ZjumXQIDypqPiKjLq6PbF0imiMk3LTKm2yuHeh8d/RepxKrq/oNM5bGOkeNNQQDVtDXm6N0Uh7mGn0/hzY1IxtIVJ/JP1jfregbW3vs/n1rcsrGdiA74453/PFLLUJ3FNLpyDfyDFsi3FxMYtvLo45wffDdS64ChpwiDgoREw6JgSqpOGKozVdjvskqJhcigpebyaWvDM0Q9n0XTBsE65V0FhcHCMA3TPmTq4zwcVEE47+UCUY1rLFfrcPcsA5Z6j8V+M8FkPTTJPp5G138AilawI+JFFS6pbW6Kpj/703De5qfMDo5ZoFr8ffGJBiP60YIlosgdygNiwyaRr3n1goN7NetfNRe8drilC9Uh4LLFtp5ZpT/CE2C+t9Waerb74uwfjpW1Au0Lho8Y3YCzgoK9Q+SYNtJL1z5za8AYThDyL87dEkGvSJnWKrcpjjg0pISjSf2Zf+Os/5jFv28ePh/C292Y9i2hYLXAmoI626THnnvtdnTO7KJ9bhCL9Y9P3Ke9yuYhnjvDx1CwdPWSxgE6emi2I2ti7pq0FOrL/A614BnxVtGC0oiY1yro5EF9/iBdQFIi/3ER4XE8pLUT+rnq4GvaMUp+UFBqLMIPmX/b1FpyHrSaGXenzCY6C+SEnNps/LYnQMABlDa5lOxyWg8UDovmoX5fXYwdNazIxZeZtxzUObCUl4qLQCZqHM7Gf+fA5DlFt8MmqXYbDxnw8v+4VHYSVck1prHogkLhFNX+cVTZvUKFepe/7mGsMZNIb0nPX2ULeUOx/sGaf2S+BxMETyMUIo+5qidm0/UxojntQzaWmgjF0UPUt5/bBeorWcGwNUMXBcGOpxC95iglWSqhyoE+6i6IcElRWIehNJiLfq1tTKVxckO4kRifpOPq5l/w8EBSBrKo9ril5nOF9Ku/bDIjchMIohOgOPJ7JYSB84G6sqGafB1+OjWPo/ZqWzRYYU+j68Wp6BLmffW/PQUJV/ywuyeYIfSOdWwVjrcne7ONjffPBUKBOOhQf4GnCjzDEFoSyZPhUoiLaSFhqBejbDG1KtHlrE+gDVCYwYmENjZXJ5KBuW7p8wtE27Ymq+bKMc7LD4XFNDB3V0e9m7r6u1wMLZpFRMP2wwvQ6acoOb/pfls0ZXr104STbeuR2OeRtL4ERJoG8u6MvmqMgfLQeLMApgPdH+Nd9+J5xdVCz8sHCcr3KEmSJZTJA7LvZjBS+2mZ89t56juN26XwCw6OD7qZPn8xvIHCOZcY5EMV/GVzaj8lwj/W5aWnyOJbnYaVyFM+fWuhn0fBSR/94ShET1njI5pNwU1OtvGMVObrfNJ1VO4Bvwm9HJaPFAMAwCI2u6P8KLFe6kSLCjKgplyGHCH0drK6woGMpqwBB37G7toc67N1VaIs0QpKA2eRknmQKws50ft3LiL7x6hWUelc5H3LX1xfbKlB0zinj+syXC9BiDox87XGlmcLvCDP/xmxuJQcnWpd44y3mKLZb8OEGU6V2svmwqMcI+P6Y0QjHiKS16/6XFeIhAyS1XbygvXJDgg4BT3026/Q3fVrkvNu9XddJL8IiTh1nrEnvoZjbLZc6EF1CVafP5sI5K8D3o9BYV0UV4r/RHR3FifGctEQ4OdxD58wzTE1WF61R+SQICa3SDKFLY0+TUrRNhkc8NAwlGVSzBzLzOsMrLLbqxSABY/nGnjVuSnbnfD8o2J6zd0aWkeCsYL7NJU9YTUIEmh11MbMyQYGQxUieOHtdPtiea0Ji4+uq+osuTcVoHNiPluWXFhNiIkFDBG2kf6dvunr/CtstXjQ1O9yS8Qme1kRjQOZwz7nkplQkIDeaJHA97XRiLfivt1FL1aIJulCIpnDY/GinXYUK1mgd8t0FktmfuZkoZ+ZnN8mKNITxJYmIW6w3JbvYfO/7VVd9dPW7O8JPtxoPL+tFXixOBNkhKCAo0IloEh5oHCnN2TTxWvyVo0rjoQMqHeGVuHxanG3XJA5SLI1c4wSwxE4ESVmf3OQWrQNO+saUtSBxjz5Jef+eWlyobrnEf5L2zjn9s+V6W1a903IfB1RxnafulF5gWj/A7XlDsZU6Gxz9401Nl79qEEe2y7DXCBC6XAFBd1JrIJ80iFxPfrYeqjvv4NFAmo03O1mex4laPIeSHqvmKIuM5utaVZ9HphZ0grw9q5NeSvoysTXhWpei4Nx15dyJmTM2QwnMktJYPVdDsGAiB4bnZWY8/7yXZagldyYnYlR42MT5bRckk26P7vv4iRFAAlV10KaC0e5b6R6EOgTNj1gTkb53L6PP7ePKWD7v4W9GEqczDJP4vsygVXx87zNQeMYLLEcnpOiCHVfZGnzOaKm8zvKScWxy56iJWc4hws46wYHR9rjU7IPFDW6kRSviV8HTduceqtS+q5JlwCiu9ayUdmlppJgaoiXNZa660ehGmWI5xEyOYDcKrNeg0AWjLDPqngWyu3pYXygmMtliESajo3h+8Gs1C6F38eSff3vfXfumqY8QCZZOJdmdWBswQGXWT5cJsvMtOt9j76QSWuVYPVglysedEe4RMEU5VIAAABAGgAAILOiBIKXQTsuGrgxC7SD7d6BW5eH/LvsvPe2uKZqlfIiutpo+11EpAU/eXHUItfPEoaJS4rfEcnhA9UwsCT8Y87NxgjW/lf7f563MA2tz/DbgPOw8fSTdPN8EF4sUQkK0fK91DDHkV9gJIqZj5wVO/JM0/I52+NdYMCUOdemBn8mcThZpJZKg6hQPB4xIx2YNwGWOCRpxiih1uiGY2QTkAvM+K0eBkNldot7PUHuwY/i64GYTkXDBUmjC2Dqdp2IifCWjcs0WZ54YO7/R9Xd0tAy17MstiHgGvo1278NdbxeNG/w86LgTQU7SKTOcm8EQ6OEzMH6Tr97wDqk2+PZC++C/EjUSc8eu2mWJHiWxd2Pve4ODN5fsu1A2cry0Qm/9BgpdTu5QNaYeLxcjsfj45NYlv2SAcEhqyckCM8Rn7fS88a4Z5QmpCQZ6SFHNecE0if82hOJewnUB9rBkt2foKbHytVbzDS8gb0UVbDhxVNGu41fJQEZqE5E3/GmnzYLMpbZPt/xVkJC/EWFluoZGNYmrADH4bUzw/vGJeJlsquA85arwPWGpgBi27lLTGxj0kuGxDRzaiaQKFj69FRQZP8EMuackD0E9rFxALU9NLiYQIbvvfrkW7GDiNpLR01iyp2Ju6j9xtXerpINnXIj0Wj7T+HTvFHmUZMBNxPSMlr32qgo/GQC4v4A1z6TopRhJ3VzUPm5ndSr2wOQ5Uq9WuR1hOl3Uj0m7qseySvNuACWIJ6o6I1rclt37T36mfqLzC07/I47arsitEaQi+vSyqCqEfkV2JyWLHHg63BUjiCl/DdM/xC9Zv+hV4L/rsjetCkC+VxJiXL0I/I0zaC39sK7LXMOF+hGA4gaww7VZWOjwTXLhRBEFncZeW+DBT5pCuQBKClRSIMM6zrc+w1X6SbxjRXsoCxDcm5IzixUZS8wBEKeKuu4Z/zezPw9PvP4hQ1qtLaSFzWSn0XWNLiA2hfcyjMXjPSbUZDPH2BHzSOzMu4SIIkSUryqP1o85+u0twBpIBvtetnbLGUK2kGhjB4kYN5ZsFVqTRvF/ig+ED03l/zpuSsdjFkDgVO4ZKSscj/d4fRRdvX0ZpWWwvS9elk2cMUE1cXhbS+sgr485db5GBSbOKAVAeD0Nuwdfupi9DZy2pLK38rnIsbSupYjRFDEHZnaAwsv6Isinf/6aVZ2X61R2BQARSJQr9o6KlqNb28TwaIxP5EMULOkgWuX5WMXBcDp1acC+9ZQ4ELzWejZ1cizDdsyZIAZ+Sga0dOYADguHQwB2Wn0LtdtzC8RDw0f0XPwtqTBkxSRNeg+L/S0t5LKRa3cnAAKGtOpcMjxBnXqvpfej1jSHL6nnpmNIbN3w4EzWLZFjBUVw+zOXCSbShskghmQamkt3OoquiP73+eiQUneVV9LNhLxqN7I1kBh/drW5TKR1q8vMW+h+0gMiNnPMXIM7Vb1HU5Sxt2HMQLZrLHILADdbFtVCC+HncSbknaX1IFcmMYvPXoa0+j2FvyS7xTLRcrnufBsVbIWq7NNgHpFzGdGRfdLXQQKjltOfjDeeHemSSEbBSVkhpxhCVz+ajLUhLmpaKePN8UdkBTquNF4FNmPUZtumwYFYMv022XgY4gTah0vsVB4adlQjdGN2GcYsH3b3w/aH4lieC40t+BXzRL/779jcdVHtwTL4w+CHEupIBpG/JbpOGggAdqSuiOW6ZhMfdgkDPey+KotyS6l+qEK4WV8kKgXAbpJ3TiyCxt22W//q1YkvWQxfNWSIVifbsS6OCLXF9GC4oKnvcMHfev0YolK3f2O0fIsHzHlro/Jtr6cQbtiQAOMXUmZPaEuuIgb3k7tzivCryJOaED33ieWOjhVzVspt0oIYvxAB7b6H17up1sf48oBAoELgFBmnKLjE9t2DRdPdwAReiE/dT0+/jZ4sse7N5uUDaQwp/Xi4LL5qVS/MEOYSxjEEZuSeVZvxLcGoF6p2MnVRfyEkjvIS50MUpm4RmRcgqiamH90xvvkdFFZT4dcGOpW+Wjxx3wiei1RGsIxw/Lc4PYM+RzH9KIk4zuSwVukT+LwADBkM945dhbx8sO3N2nR29WCmDhobPa+k0U3WuyhSHm4xLospEdYchTweTSzECm/km2dweEk1qrkupZgC3QK+Pavqhqh+CzxZmTEJhSJOcsdR9nBhgpFKb5oa4S2/PzdPLxQC0Ywf5PZtzIDioIfewUdcQ76uHXXQs/yLTrv3lxFhwsOD1UN2C6Fntx0lRMpaHJ/vIWvaFyyqzchupvsRVbL7Edt3rXxhld5IGxB8iAmeh1Yii/CjOexsfchn+bXUeQT2uWyWj6nNJZWX9DGqOClT1B0DIjFFEr0ZooDZEsnuaJT/ROA8uh7n4iJKFfHnuflNL0gTxFueb7Jmu397WDAEFGfFcalZaJBDsPyKcLZc0u2ACJTgn3Y1T5P0DImNnoRwQU5FiU2m8qarnyG+bf66hPYcgAZY3qRyIYeOXMdL/VuCMeUuW7qPDFBVESWBsJcvJ8i/sNirZNH49v2BbPSpuHZ8WtMHI0SpoE+WR+eIkRq8t5Yeb0puBQ/csx1Oxq43mM9oP189ZvHyWs82QN0WIu9SSw/lZfQ3BuY765GBm54ekCLcGqRzP8yYOgvaabznmwF+90jgGRL0yMDl/y6q1oUH52k0dGONqIdli4oP/JMkzbiu1ou9lefBHv84xIg9ekQ/pxUgfKYeHRa9BnGwRTIOXFBimBepooCquCo24MB5JICrUivhlh1jDsFcWmcjA4jwNBGngHYhpW7tcxfQ0EmmlF0MRnMsNxLoHoCXRjqdcPOcp7hBEtG5Qg/sWsrS/pyakuBz4Ifk8eoQYGzftATYihogWuknWExUSXIbkrgfVUE6IaECqZnEbPnhzQdBVRe3GL52UMKQ1vingZI1uZojzfVPiQ5Pxbu/aUQ0wtHxO/XtP56eXPCRwrCrXbRZU1mbJXs1ucbg8Kgd1n+ubfixSUGYJ3CEmVSc0r3u07cyqIfgODWrV20kCrXLEg6ZB9QXFR5k/Dj5gEeQhMCN5IU6cmZ0VouEOnwKJFXs37XeyvQloMZ2QDYnVIhL2esJ1hNeje9uqVZWU8tOso1n0YeKNhDDE3V2IHk1yFDZQXW1TFEcpjS0fGYlwazKdPqQKz9iV2AZANENgXNIpfdPwO/MpxpWyce3UqMWNIo8x4nbOfA4KVJQhDZ219H8nGG4eg8kiED8t1xb5sqp0uXltuS3S7QLQ5zvfHxTOnP4Pyz15qtzE3MQ4aU3+SVE9QQ3hYH6A0kG+0K1U88Va6R17vnrwjxuoGp4SV/eQBa5zupVTfsL2pTrcxV85m+2Os8sScqGZwsuFkAFBU7SQqBKXr6ZeaYl19mH9dWYXGwfIETlSJZjFu+OoPR4eo31OODcLvzyCQ1+Ntsl9mwtaXDXMOrg4aUNAaadDvO/FnBKTYMmbRO386d1Qbv/Ihca/qaXavJEmVhQJCzKzviniOAuA0OwQuKvlgY0Y0nb9xoBv6UM+AcFWWJVYknOHXfY5EoDm4/AHt9uc2nKhiidfRtv8PkOypsLezAu5kciDGt6N5g4Z5J32QYbHXDOjfn61+24nuKdwNui2uCZww62/y1Z5y6H7lJPCqbgERynaTWDII0QMc2nbZXNCGclEfoMpz+gdoeOOma83WUk36uMKHL2sbumMreD3Il4wFQPatUqYmRP4ltsS4EyJ9M3WsNHHywGA1v+5U/p/Law52Q94HN8rGgCTzMufVWqYUdkQ4EXW/JErRCCv2AwEfdHUWOUkMYrjDEQXaIVwc/ORsR28nqXrSHbpXAWQ7V6E92Mtz61NVSIr7cJhNMC7jGkGyVYY1Nhw20WnXAiEonsrolHdBNv+vE8avfnDU2SW2cGAqapzvkpR2Rp5C1X/jJ32w/TV40sXJtCA2hzuCsy159SnMx2StGW5l0rC2CVLTBIGqBRfy7OYFPd2F5UBEqJvbmiK+aGorX45on1DZELmiV2huIyfg1VHrAlwHLf5w7M7HgMJTGxUotDrb2QpXWtDVRk3JNTLSZkqRXRPSRRZeZ/UM0nIOXrXy194AGE4b2ry5xyqZ0mQlQ7TAmxjmlDS7G9wurOzs0jvMoEjKmAkOykT9fGQ8a11/4/OYhgvuVQBZLxvs2+4HVEbdqCv30trV6sKoo6RKlt6X0sR9UVgnlNL6GgY3dyxK/U6hu8gP+ZXALeUflxW7wX8kOyZLpWSsFKCNujRjDxMBe5USZYx3cbD/1DHdf6kNQBKiVKIDYT+mqFgPo5XMAHstf6fij4GEprqSvjpuMxyhk0j+o4u2a47STUesmGM9ExHk19LNPAIueHE/aWdNH72U3rUQiHk76JpYNi+rupM43KFYXOFLyMY2udJRe/3/BXCcQhgvwgRRABNO4TPnNZxLJipwVmMnJX07xV4mkH7Tzrxs1ImUY7cgcqipEcKgqYJKA82b1PeaPp/5CipHrfl35bMvx97axIwcetMRy/KkBGbuhmylVt4ub2xxvxW5Tq5acphLo52L3SppAd74CioXSXSdghSg/ZpxfR6M1t95KcKHB8Vw0uA91LT06M2HIWNp77/aJXdrfDRxmjTPzdBF5LX0/Q46eVxBX2KkIiQwR9uaHGR22eCJGvyVkar/EsFr9pu9at2VFPdvBQTvkVIk1dZ4wwtb9dOC5j5sj+d9s1YdB9qfmLvSiybGBf7aHd79paG2qZsHaa+L64/OOti6PbBWj8WJVzBt793y2p1kxshcDk8RwLPuVFyLeYyoz9KE/TXHuIE3uhJiCKPv3HWvAq1vNH2Tu9ZmsWerMUcqxekMFkeQLVz7APfdnm6FlsITUIm5QgFa9RE6dRhkBDP5XmTzip/vLudfEdYwbXCkUhWaz+fbTxqemt8lAv9BZ4hognfX2LxjI2dnMARTAf/uuyyY+Ttwvep5GoCCr5KhlA5Ut7w/POYlB0PPRbuZmq7n5aN81OGdknpxn89s2XYORV8/IA5daFnvyou3Uf8zpmGczvT4EvJC0Swezd0iCIdetwv2RwJ+oNdDdcWTAkZGzTBnZRo2D9yIiA5ohQVlyfXZYJizobhhTNxgwbJ7kueL0KfQC37wdKY+EG5PjSCmpIhNwsOt8wsBzAy6MYeHCwXbetcXKUpL5Oan+6GDOiuFonqEJCvvuANCNigmyFCiznq6pXQg0G9Iq4xWQY4z3zn0fEfChAHtzOM7Dtmpwn49IDv2nUjMy3T8vL4t/dg6SCB13Q8J1MN8VK3fkO3UMbwiwIuwqphPT7hUQS74LZXkSAC7GeRnwG7S1sZCIzMKkKhyZ3ABpcYTiwYBPlhiN/QTs4ViNflyiiv632PoRWdQsiujQEJt0S9b8EJA0MOQ8P9pj2QnIPSrQmZXdM64WdLIReQLbKNUB3aQixEg96s6kZO3ccUbSBLfJ1gN7JHEF+x7TO+86pXqFtyYr9GTp9O8jdFO80UxODBokIFUTgRyPddWUbnrDy/8WXPBLTitukPjYptplmQ1Z4wN/OaxP5QNPDypdVIDt/xrMI+ml7Vi3GnTbRrd4Vt/dvA8VuGdCNBezkHggyk3GJtghO6RUB5p0emK26d+R1k5q0lkyM67nvcKFeQIGmow/wEUJ1nIGMEOm7mkEsAY/PbluXdfrNfDfREnB0avJsI9tvUmYEdCU/EgPj9wHMJfLsANoIHFX3ucVm97TyH9nMw97+6jVUFcIU4v0FVjN9jZY77+9a64KK72WgnNAH/jZJ0GGlASGvk5XumU+S/OpkS58DkFP/dx6xt/t8PdZIMK7pm1/Fqvf2cM8knBniqn+tKUyKT4R+CpBLwfgvhJtkTb21xca27nQQsPKOz00lVHVpnt44eMQVhx5svcd2ODG/9VXT2l154igg71qUM471UE2mCB/XZ5EqEEoP59OxgCqadBhj/wH7xwR2NPOiabvcs1QmsYFeZZUh7DxPClY4p3275pzvXEPU1IkAOdY/6YDV/LM1kC/owBB0UczopEKDs4VFBtLg0+EXB12jTTIX5RUCuVmD3JN/wWEQ7nDSMFUKCTV/rrVCMNJCWFVFNBu+ljk/r/bnG1X2MvDd2354Fcn0fjxSR5UczvknY0avYd43p/HXkl0WyusSV74d3vohqvpjwC+1yyRcBdIXrkxBZ7Y1fMCxVEY22VYkdhwWXugQeR0eanUDSHJgDih0ZMlsvSRhzkkrhVZWuxHvCeADhMpFa5HLmQnnZ1dAwJvYehdxTM6Sxh/PNZfS3CvtqNHxXLafPC5zHNPiqk9rfwFWBpJP49/sltVyaCBOUkkxFL7jmromMPoHFz2VWGo4DZhH2mg1LubSNk1aZA5auP2Ln7pGhCQ8WL4XOLqBCjQH4/q1w/IHg1N0jFQX+fYpr2jYicR8xoVXYhNleIju5Ql5YOqbrAUuZUgDNQWJCP559utnsElcelhkCmJhuz7JaQx3BIEeXot1PgGf82oXRvUWqidxKQ5QFJCymLQ5GmLVS77FctKh7RF5TJmJixL9IpPRo+jJskaVEpbwtzm83m+D5noec5x0My9QWTVdqYvb2JuF+s1StVFkNW28uoDPWmxGFGK1kblbxuhZiRDRTBJVPSGYxQID1sqqqtVwNJnZ1ZC3uc972YelZBNGSjjpiwgZpMTk4bvMMfYYikBtyZ+yQ1TPVGH8lL1ZeIOixa31o2bp+mZ2/8o06dFlkY2X5EBzopIPR6F+FR+Ofmb8XlASgqNacScrjtzdx54r+Usguppi9Xrl9h1PPUvGFOEO6eaVj355Qjcjqt5wO7CRTGvFLAGb9iqYfivbxpUNoKUSU+JzVO67j3WSM4y/vIBbG+oiv3LLFOz3cO5CDrWiyMp5ps3YwfoDh/Gr2gG9to+GWVE+MsmJk6lwKaq4W4/ub0PdB9bg9rLq5BPM5BR/vjOgkGgKfyIn2VWhkdesMjTxgzWHJlL03oRY2MKo/SYlg7pq5VH27ouprZ/kpMHSyUY4bvb+Sy1xrhxsBUtFGhx921CCeum5pCyxTV4jSrnCwRPPxwlpquUSp4U400yaOK9o6UjlXpK9YKK+C+yAK8R4BhaWZi8RCmptuZxp4Vx7Zce44NpYPUE+QCfN5BJyLojwVa/JhZDL+h7gXWgAwFeVPGFVbv19CyNDViPjEd1JeIm8Od3NNMvMICDkbnMiEtGpEm3gRA6sHWBv2Ka+Eziefjfe66a1/odbrJsvFMPUzYkXnlaScx07d6ttZEZLvM/CgZJYnur7wYCGajvwcGuuh+SUxnK149NDHnyRHhDQow8u9O6iduyOt9JLaJeFPrZ6FrLtmG99p6jJ7im/7kzpXWV+kGFJTGdajoFcT5Ywy03SzaikWht23aU+BwpeW+23n4HpkaA8paPo+7Xogi+eUYy168X+ULRRCfH52qQjcjywhIpStCaAbGs2d79Nt1B1gNzlAzde6pGDm1siPdpvSpMZt0feQ4EPE3ZthCiaWQlvLZdTHM2GxK0Q8CZyNRZK/lTzMRRajgKYnwDkRMX5isFfgiwwIlC0xMc40M+wLaxaZhWar/haNkYcP6jT0271SqgqnulOrqskPJw61Sww75NJOpcEzczyBRe/zScJy/9h6hqb/K1uaa8/QJRtkH5qRclsVrsiwoQd6Y9v2ijCn0knHrmmrbuq9jkNidYqDFE64oq1NvR2KrL1nujSw9fIwajsMRSV8ZeYjpYN74/HNEVvbsN1KW7aqF6kP6ZTULXr4m9SExytaWgxRNkAUGUhuIY0oq89b70iZwvypHysoZwqjIJDo/pZc6WB2KPdWavB4+GReIkH0w7pa/JqijyHHEuIzRE+qpt74SI5iGCu84VVYZBIIY+yvGoG5G/sRtgNztBZ2jxgVVHyoLqZDshCKvUH45QkC0sENnP9Ut8BQhQpJ5/paIQA126lgbfuYp8HqF/Vdy2kiVD3mIR7P854QJgTBBcBPCKZdfJzCcDx7S5HgnSEoEvusoYtFumaPZOGgJJRL+uFapiwKRiZFa+X879gRmBq0OmKBuHw4HWYr8uL++WDSvLeMCNroJbyJtPNm9WjSPYeryAJsitN+GR6Wk+9V/7mQSAT9StjNVWzA/YfqlnU3UcLaZZuJvVD23bUejO3l/PQ6x/eaYuAsRAnxxKilCIqAuOITehl2tC/GeJP7MAFdq0e091sd20H5+GtK0tM7WwoKPs8TglXt/416Sgj07lSBcm4yee/TU91s2P1ULW3DKdMDaUZIoIxk+nhEuONusrN/S7/rM0fTnLusGl5e/guL448AveQbZFYJytVQUWRX6gOcNWa5mRoDbY60vKE+/3fkZpN16WY1kj8uOAdtMVQk5wjnCmaDNn0AJP/xKWT9yq/cEb7qJoIlOoCm02y64TySPP9R2M3VNk1nDGgzuzPcylY7eaRrWFeJzJebbMGFw52EttXTt1ngSG64UuQHEildotTh/U5y7nPUpEeqWlyvZdnKPRn7Y+g2bb7vjMIXSUv0uQnkUII8lR3r2ypVD4e+miF1CYqc9aFzC84QgnJNWjC7Y7F/pmGlBcrHi90CjuPtyRPjFZHyVsEjKZzqNHmJwI3XUY8npFx4zm6JGIQoDiaspDAh/NbA7GXUJuGbgD2k1jUB1VoOiqIn0myFkAMtAzIePYuqIUoVjsNnW+aVKdwr3z9aV5AVixARJP1xB/oL2TEx6TMz+H+iUISE4ewfqDYWddfGGA0ViDUMODzEB0Doj93DEott2U+/QOHAlMN53PhlBhxwTnxb4nZ19Rv3MRcFkaK/XmPHTO53/hFnhzyTJynbvz3k3krUaDvuPtqcGBsQ9B4cQni3C2tOYT0ISQ0ob+MTu/m9247m2p6Ra9lahCf5vvehyiXFTwZ83vijfX8cuIDmVNhzcTKcDXvZD8lfn3MO8d9NtEm1pNo8qhw7G0Bi17NVI5D+QGAUxwAAAAAA==');
