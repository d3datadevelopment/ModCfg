<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3F5210DB8AAQAAAAhAAAABKgAAACABAAAAAAAAAD/jIYldynB8rKzvJjwxl8imCnH78xTRL7353cnTh1z8cMbY35LOu//r2et5STiPogY2kIrFbL3UEGRhMSWqXJrkJpx+F4DRl+aPu7vSIoUK+2FCGejbTbnvMjBsDwdg11tgiOoKHBXgIkZTrT7N2+zdqZfIFNZkc9lCp7hX1vaHX765jPbRWypDMdycmF8zKIXNga/90mAy5k3CeUkd3Du9MvzC2xm2b+RCAAAAFAbAADCrIffvOG2JD4k8Bk+XJBjHOKglCKHdf4QPluHNFPV6tajtx0GFUleh3lgJAu3hIVC7wgiZKAZOPMWVO81bvegV7ylsv/6ZLLE1HGJYMBcmLzgTitV/4RBF+kxka8850qMc/OfKm/TiyZR7k5pbBhIyQHu0S+65btaKQoMzHaStemymbOItFh497t8hChguETTgCk1mtwplYPT5gob+bBGFurxWMiYuuNCEMqmnf42HaOrfbsse5OLookbcKLxCfbdTnvbUcaq+QtOmpGBtlgMl6dtzflAIIQfLTtH/yF3xQdkw/Q9St5dL0ASOM/Jom7HtLO0xAGl0Weh+dx+vT8W4gZMGxCN95q4TLyQPprXW4DkHx+hfBrvYWg3YY7j3MFBUvygmhRD2i+vr2/NfK+Pops9s2tgZdLVKhfv0Ul2qK8AM3pCMMgoPbVO8nI0wR0dhVuiPAJVVM8lhPv+8Jfcl3HLr6ZqSwbAckT8mO5Zeyz4+nKIuCWnHD1M29DOmVFWz+FOUhbZr2RKu+CMXOgIXcsXv7+ndN54nGqXrkCiqYl3H5snKACtxsiM6DzF2JnXHjurZ+PtSSiYnpLCc0/a3mDFbycKfhTkLLTqD3Njp2WcfQejdzcwgpXr0S7SUN/f6/h9QNAoDiwVJrcGoJNOQeoO/DGm2I4kIZpaTnHPocgc3C0OC/zPa8nu82ei2rVtoz8c3LV0enNKd3f2Q+DofVo5glggSr4wsyPZF6cCUzmVts4AQPfFmup6ywFOvqo/f7Xe3jmVTJWdlflrK/kB74/+984n1bUZRfin7ks7hemgX4eCUU7VItPBrQrB/EhfU+Kz9faF0P0nKB3vqFGWHbPgXys2w20sQ2MpvepzlDToAv1yKwSTsQl2mqTvQDcJg6YCEV4sNeUCREqvrJJbf4Jkp+pdxNRP20hb8ot+KZOwQ4cAO5Dn4GgvbcouQJO9D8FA+YIzzvvtvWSAI+m2xBImaGfwhhAi9XyQ9L3BqBc+z7PAVO/8gjN2JVqXBNYhrDHGINpZjPy6OYyzm8ea0NTe9PkNtmyxvTcBCP8IYXGNwmwRJOND/GrBf1XAk01lGKxuELbwZEopEtIALyZpoPfv1uDq/5dzERXJudq+gfVJDLxneBCn1LuHzy4eUCWqJfVikxu9QDXVaEdy5MySWMtS1ddaFQlXPhFuKWmqN9L0fKegelUJldXYLTUj3AS+v8ehK+YqUzOpxJcKxKPcDhNrK4+WJNBiIJJ6vG3UGfrlI7kFQ/ZhVxcVZ9XJzg1VdfvFGFap5+m3BDPJfRML61cb9KyY2wyhfIo3r32cC8tp1cp/Loma/DAs0gs7Yf9fImSjfu3VO5eB6jYfezZDxT50oU5sk6eJD1h0tPSpWmBFO1Oil2LNeEIhxPKvle1RrMvUc2VvGZxCIO4O4VeMC107kRe+JCW63g+Pay9IVKMSJKUi+OdQnd8Z02jEB7Xp6xYJ1BZtL1qeWRC/e+gMVISER3OrVcvNArnQTvphKKXmVpW3+zEqFtCuZptQXVEmCQFghzmJe/x5v+7ucVm214Hk8yffQ74Xa/TTsFExQz+cjtlPVkBTptAq+q+iuDViLudc07xjlI4kYx9MbQjheQUtNK3rN893zsNUWol+2mz8QcKcIj12/HQ2u3Hz/iaGI0eBern1S7l0mkSIsiRbpggCs/Q7wzKKLLKgHBZbN6YXD3cJjt+u8+dIq0C4W5Es/lKOmnozmC5RkJ72Konwmn/hTgcbEVLkbblDouGbJIirm9USarpTsT1sfq3cFwHr9tLsGvhAvKBOt7zNNb2lCQweaNqFnf72qJKSwpSsfVK47ZJgeGaeVgRnArp0MHqxGvGgjZtI68Gkc10syWEIxnntgV1RRNVdnbZ98eooGb8uDG7tKDp39tBdAR1gvfGaZ8oHc5/xqdFqgPFpxzFrkCD3R1atfdQmULITLqyD/4/xlmeoWnx7Yl8wM4z1x8CfPfodPzsovHCX/ZO4AO9y1S9+JjSEWfNTm5TB+uU87QgQuVbdIhWdpiO3RCNUqJuqi6puAvbZInFG5YM0ajFN3pz+aKTUlA0tUalsQXqutMwJuf+w4BG/UmFS4CCgOZpx7M9LOSjBMluzr7nk6RJROn3fNccCgYusSI8nOqC2pEtgTl8bNdY7EWyDnDna7OOJ4kVJQvZDdmnTSqdOGwiqr9oXLJk1ljY3YBqkwLFepgcRVim4sXPCmJu5QSG0CDLAY96GYUOmw9su0IF/coono/+V6XWPUfWWG728KpnSIWqXvKLEWw+wpvj4TsOHZhKhSjVi/N3mhieGJ677AIuRD37oehT1+iYzoe8JI/U2+2v60ptAMiXkxCmTGDUxnH2cDEAxYUwK7pwZWGH9jps1ZP9sjfIco1Iufb7esRR9lV9+xLlXI9BI5S3dsxbcoSw0nMX+cSLPD3REQDm+oJ1LLJC0WUrAhqxqYpe6y9fB8ToqRG9zxaVPKxwS894aiUFTj0a/hhk5iiqj4vx0Nc4h+WVZA5vQvVV1P6g9finUiGj9uf28d+rH3U743Ft3dG45n8gAC1CskSyznPeUCpJ1uHEUHEj0ZfKkNsNCnX2nx1SsIR0SiKin/tSKeR8uWSQdrZRmYRlDPKqnMdZtnvQ/S4n1yyYue1/9O2hW6Dla1vWRBkTzNGbB4j/mLrokNawnAKhoF0Tzp7APk1YbVFthu6woHSvnlIalBVO9F+7Krd8nnTm+e3QBtLOeKkXjylvyKNMHPlv5aZUa4Tt98MbSctnT86Y44TDCSuQ7UdbI1yxl2xSVpNq3AoW0TLIMHyt9u++d4QZLqMeP933J+WkydH4HUvfgiDWheuFzP3wmjUIltN/Z/ORvr4eFa/TA9x6nxeTceSqU1DdeJUKNoo4gmdCdQjwWshJZObj9shU+Z+8Eq1XzwqxDFoQqCuAX2nGz2alKwj6QmUdElx97s+HKivlNvpMXvH34RTDVmoFK49KTt38+xyGPnCP0sopsNfMuu9DKyTC3gcl5cUdlXrKQsEpeQscmy56B0x2/r+ASQbz9Kam1rb83Te5H8FOY5WSFCjbpJleq8TiigsON7EqiIKeJ2jcUMIptwxEEdlg9OLMbjpxbVzHhpqnZTs+k2CDpzssq7CVY4JR2WxqEOMPrcfFRNXec2Mfujd559JZakbV7Nq2hY6cgrhWxQEFskKIgyDVMf9FGBrVIAv4dYzjaIM6mBJgpChmOk0GjsEOzqwlIHTHPz1UTunwWaeSVJBQyoCRocgX5wtRyFzRRAQSWYmRmje1xD+Y8YuoS8+L83POLjVNxNV1HHfMVZoPc+ZhdKNTif4BtLONym38d4Ux6ReQCecdv6IRr13icUJUmUA47MlNzFU16IC1ZekgVo9pMPDZdAKXvXbm7zIgQNg98SoE5HgHtLUf9pcGxn1sAxrTbIzSrs+iiZn+MngMk88gk47qWTnk5shK2mz2gHhtytMtxPqABv7008OkRLeAfWf30jGyZ0ecX47dV7g5xZSBM6Xddp0jTinL4Qpc8j6l6NBM/F9OGs9y50WtE971RU0p4jmW2i644gtebno9SOYyWBTuM1KQl4HjrFGkw6LkdjDXdx98fcGs5hUVxz2lwTDxNOKl5zrPt+3Gn+ZRDckO273Dz6Uf4/nqis+KosQ/q9lI3YxzeOcWDe7O2UehX6rVsRyVqF1nWMmSZXv/bHg6+GtsnT8lZDa6qXfKayjkkFyjF7OPsvKtT9igP5LZ7RBp3XVuOi+FzUJkrDvUOfa0XPUrfR0tEgNMo9/4tk5EnzOkbWmhvjJ3clWvy01mH6ZT78wPquLfKvz184JQd6p6xCtatEZL21P7JmRbf1pDUu6hf6nQpgt120omx1HMzef+mO12cxhtAJzPEPZeG/ykcN+IGm5nwxiKBrUbx7Oqicg5kcQqad31C43o1wFGjjceXcoRi7giNyFFDrM+51X1nKFZs/xixAYmKleJ7SQ2Qtkr5BRSaRRgT/QQWAmWapmOmeDHKeStTvC+66/mY+tCGRhHooEqh+XJp1+JWFQdFtcppkJN+KcHcxcF/FA8exVLnaETI1B3l+qiPtipHvlYiZ+iBR7r3LYyvdliD0U2f3NGiUzsf6H1JcdPMGWhEN7vZ/1QncaAhHX/efkj0nlGBvYhD9DnbOAA1w3U3YHwDje6z65uEhSTgwO9Y0YCEZMtx/n/E0mJKntxwdw0oAMiCxGkki4zn2SLgB9WhgFci2xOjSEONQsCJyGHK8oeT+I8KknYdJl0T486tnuYNdhNbjjYjK04AlTpKzI6rr5FoVieYHsVHxflx6Shv3OWA2L5ZEzr+FV4Mp3y5UmRvF/PijUx2nMyi9am1ranZpDuY1ef9TWuBjO68kszRfuFgX7H7CDlWKCkmy6zmA/VgDSoZ7qj+ZHDpnwZetNz4bWQmuF2KGbRnyUYMtoOQQe26DIUg+OS4VUlSAwLVSVflLdT0MeSHBuPxz1hzGUI66Wf8Pi4yX0bVVv9jeLLslpXzUwWingQaBjzSF556GdH8DDaiCRkq3Ng7hjwuPs+UblQmFeXjLtYFHw79oy7774TNYFQQ0Ih0oREEahg1KQTuBGA92omBfgV+Z9WHcLbN2QwcG2deagZm1rIRBEhjrC+FyALfbOzE4QzHfAbszdbu9flKGfwK2u/jLd5KeG+PK4WxUsraYt9x1Uk7jKtAslKZjaZti0opMrGAIbtrI4DCTdliB60bsx8CJKPQHoqpiHx1RV5y5ezhG8Qz8eM4119SojXEZyn5fpNpG/CKyf3QuTGhj8Ga65Pte+ULOHMpXP3oKdF9TX8Q7S+Y9ScEdBYx0yxlEZZAmHqCw4LuBytMvZdTd9e/95ElDJAdeLDO3FWFUYEwX9Of6pe9f2WYZD+R4Cb4gLACthWPd/rFQeiMxpdoRMkoBHWK0U+iSgkHhWOkAnGcp4ISgW3wBodDbTeghxpx5sAqU5Ao56uuSRvKBBfjr7Vo0CAn2YBELsuxi0EUbyIfmZ19gJP20LnJfItY4aBNyU7Ea28Y6L97cZnj58BPLtjMLR0gBcQ2iJNls0ouj8cnn5cANS1fBjNywREx3lykS32Z7D00QSUliRemNFJ9KQrM2HcIbYUHkltRzLMraaqI0cWU0TXmp/AGqP8YB4xrq6BQ0EaJJxnhz1Sham+xVhvu+ceK3yhkhmQMOmoLUfoLtRytDm9AqJxg8foL6cMCVW+3CjfLcWt5fOZViQgdj/IBiPWk0XLlrEU4PqYB8zBcXgW5qBwsIERwk/HV+oVwUCJvBcbEoC839wBYaRMKAUm5JNkLbmCELkqLIojE71Kp89SV2o+br5ljeWa5S4kgJWD55OR6e2vYzM1fB63nZ1k93LVEEfuf8Bw6hyv49uhqNqJymwG3xlvKg3sbtiUy+CyEw5rUJODXwXr6SjAB+w5pfA331mnAxOaQQ95ZskyFHKWH2eYnKRMEePRifSeWK9GwtyH3jxiyYojXttRZzlju0qSvBOXi3lFqQSF3HoqPU+ojt3uhaxNa5Hvj6OKqLpNTFFM0WL2cEkBJg3SQ/RuFhJ9acl7nLyexEq08utjrwxtNUvqMAttEXmxq4AvJhwap00iV8yx3QY73ffukD0oGB0Q3juKtbh7in19bB9VVwhAcl6HX5kl+wvUNyluRTHSkavgsd639tuczgSYW9f9xDMzwdaxRB9XALseQ+3R7MfqlVwOu7oFcdvKe6H9ferVj+9E//4xetaPOihpxHnivL+yWvNku13FOg9U+/WO6Ha15TYRrVPnLMbuYl7dIT9Q9fCgY5cfzEmTC0mx+2sodBZbBe9utthJmtwh/kZLGEWQASweHbaZ9T+mcetVk5uKsZE/qWy8QcvOlSnXEX5PF2zoqxvZTC149magvCukYef5XP91JK5ZGyqtAML6yJjAzL3QiVOObhV6g7piYAg8gPvpahJGS5JCikLCTQSGtbH/V0ywqiIl+QZE/Lp2XrO4w51yIWdNHbsXXrMjcPaQlk0hNUiniA0Vh2B+TlMIkC44S8uwVzCnwM+CUYopJy0Fs01Qrv+ZZ15x3fOHv7ZyzcC275MFtu4orpgI2c9Ss0UPEqz3r4QEC0K7HjMUT4zXgzfzobfDkhIyAYOT54Nteu1atZpepDFV6NpC6wq0jA0cMG418OfjTqTLe4NI3ensAdby5GUr8vNNFRLngPvI0YsBb6Ld37lVJYqn9beh1caTD+5/xyEagDvCVoTZ8eGcuRGjJHSINE/wTntsZgoE+O3gcgjZK0XvNDCEjadpFCDY6TRU9qdKM38wOLUdtRgu9YazHVz1KgSet+J1qSxnx0+kn3a57CfsXdnccUMlxpv2dm3gfBQLDE193XJvxmRZl6LnfuuHmUjz9dmUsEGRVDSViLclRDoOXIEZ80ja9ljXU8noi5YGUkJID3zU9VSlIcwxH/FtItd8eRneO2jKDLeStbJp9eUFt9BthanOw76IJVEwExrldvKZTlLsAeCKsP8Cr6LAe0Ljpe58bczkZ0SI+OlMwUpRo9pVufTG7d9tW0kMUSFYOaf2LzdQFbQ4c390jcdjB0ZNrW0Ue7s19xjbktoWd6enq2Kh+lWmH7ODcewjnOa03s+DwqBk0CtCt+3JzpZK+2lgBHYAb5DV/9fESIQG/GPf3GA5V4385pVol35sieuYEmRSuD7SGBHV62V1qruYmZRtxoBd1v+FgCbAA7oERMunv9GMVdDScmmomV9q2bf25Yzzo13TY0eCHcIGnuLco0Yr5b34y/DSaTd+yNCRc8f28s/frZtQPz8hHWJeW8/0iklOFIGx3wBFfkSHd7QG/h78MbXp/9XlmxkhU4szB7XsQcY39SyCdEHN3skqponK+YXJZuDVI5ICiat83GUW+lYfnW0TmkrTHNNcC4j+rd8vudZIJIhyN85IpTa5Ul9N9Uje+yXCzBnpMwcu8ViRp5B8187+tvZfxQAlVrmQmrkbCaiWIYVX7o1uwBFZh8Lz2/oYRzLV+7dTpJudwZJDApQAnuTxzy2Sijmu6M/lyEawU7G+AExbGwXbIM7OuJknTag9tM51faaj22TjmXY/YGkVHE7ikXP+2KoUJG+vNnBSWTuSHpr+4vyCoLF4ErqDASnGbv1W8zgWNlNQDCh2QEMKkyOK6f4Uh/xoILvYkwzteF+bIdujC6fj5TTDCnRSqZa/E4++yFB4TsOnL417mBlC/1zsTIh4FXkOQfhPbxweYSe3llIbt3wN3ReEFL07jM+c0EZgtY/tDP4aOp9C+y5aIaO0xisurv4oGcN/S6ZMm0cdpF24u7cPphM6J7U+Gh+geXrXLUt4PVYkpIQMHCGPUJNukqLCzkrRCjGhPO3CC9XOt8g53LDLvCUkW6hfOALXFELGKcfcYJMfJbzty5tUH5DdncL2pz4NuhhMVYh8pNQC+vqDPbMqpQcyvMWy74lYUvSaD6fX0ba4dbqqYp5So5KwzOCyrNqW4YU5k6lnlkcu2b6xfhZAVTRd1q5IvtULVsXryJxAflSY8ZBGkH3EOIljHz0EEa7Y2CXzsgcocth6aZ5X5nBWz9VUY6Bb32eyUL7Vd+62QMYmvL8Xf+BkshLH/J/7fkUG2z05GJ8B19MHqM4271ijPWQznIuUkuweRo3HZBg5ONNaN8nLIu+lykRJB/ukiBQ8S0Q4POIdhojYe3Uk6Jyvi24qQ+iyGI9YEqkMZ03uHfyeW2C2FG/gHEFj1PdWvCWjRJI/50U4v8mlmbl9LFydkPrEl5hdQRGl4XF5ptcrVMUWU/fWKSgddZ5qpnuyk3smpkQmTAgvworsZpZBfYIFgRxtDKSHfkC4aGoKkdcnkbF+pQ/6BOV0nthh35ghdkEVsfXXHbsySeGZ/UtGqb/YPsUegC4+jyrXzOWkJcstXh76kQCJ/u58yrX6tf44+TWm4BKh9WR9JUfOEzB2+8m1KXwPwABJzZJp848HcXH149pivsi5DCZZbr/b12mFcEg0N+cmetiMBU4wFaP/bkKXAS96yiBoOlNySdg2okYF6NZX7YWsP1xGC8aqSRDJ7arrjqQUql0OdtdQnzs90G0/7i/yXsInoMdzrwI9AqqE7GrkBnKPczUeGJ4+t8GUwh7QGkhp4nkaVZWnD86Y+ddL5xGCgs/tQZipck9k3tNLCVJmJ8fDMeH9Kn5Fvq08BjtK2P6nRjpp68lmFOIjq7SLWPLtY+4Uk+rjSOulZvUP9A2PoDWTbCduOoALU44fZO+3uVikcR91UhuFmbeohseuYrSz4PxHFoBcGuSs48YMlwCZpnsU4si4FMyg2PXVynTlsInW4x+dtOHnlpC44Ckjy8vU7msJ3xLaGQo/CUsxGQyRh8lx/AaFA04dT2PT+ZgO/9b91voT2DwTbrLUxo88ogjk7n4IZPPFfkJ8FkBzryqD1iH/Lt4JUv4YeZYlk9xNXL5dviiTh4YkauenegGVk/WqnM/kyfqI8Skm9QUXZqBcL8XORxseh0W11ZE2LmGX85/SBxUJjhfcsp6JVA/4IYob81sbZrKxcjHSLwDOJEhiR/979NLuU3K0uiEeRCEug5xECCeYMsZawvtDr2Q5YPKcfIARysbvi6JY1v5moUqqGORrj8ZafxWPEmbzXk0YjEUBEcDcOEj0ABQPGx4VM7zY/4Q1pJ3TbWgylYGGriB/2q2vay9ODyAAX09i6XnPrsQ9FlE1903SexqpeZ/41rFM9f5TX/hP8w+4AeG/HlzB0gEns6rNe9/cKP2vMqUXGkyA7HCRZrdl23eztACFOPSF5JgXdTXmHvOBBrxdtNCNj3mZcml+//ycA+4K+3VMjA6ofX26oCt+KdmPqUcsKjmOOjUxw3srJm9rDxBPEsnljSRUaHnD4VJl5FMX9BlPwNycCBXwGFuM7VxwMw3vFrvU3zV70waa/gIj+QPw/g9+YPtui69FzZHItEvv6ZtBRs+otlZrraAo4Z5pm5iNlrG5Kl0pHcTuDgKvmSuDB7ZSXGDMi/RLbZVkiQ6TfhYcQPfsIpAkukjphp1hfYB2KnjQWfRY1yrWIXcL3lY3+rYcOZUsdqUZQkdQyNQQt3MwtSqr50q8KF6101c6yNo3qNE6e9/rKVu2CUhA4uEBvO6aJyZ6E5hE4FET2vxUDZooguVLLk6QIJ0s/3LTnuXmTLXxkZKS9xeoHO9HDmjzphM4N3/g9IAssKLqydlbMKbXwLyPndNVRU9A/inIS6uT7Ag9LekQRdv3M++LmxCvqO8VYkofoF6b5NivIY3FCx7t3zRFmuDpESMF2WN0HPSu4icFTWxHKh3uiklEAAABQGwAAhJRUcNoV/p3s83e3P/1kTlL145QjaztIEjeU/+XAuthzHSOBjZc8pFHc20vpK4VuoQSW2deOPFZ3kW4UPZFpQd+bj7Vf1lqokaX5bxUXkkmLrExxaq0ouHtthDEfRPegOdEZKng9h1ZbROuIRagvg+OuYqZFz7sIMU9QwGO8p4QzZT8zOmpgBi6gwyKP3z6c9gDey92VHyq/d3tyb5jjMhAH/RseOEWXKMBkVMSEg/1veT8JQNBxVETdr5xPr5R1opGMyg2u8BbdIEO+NUUu+cFuF1izhxQrZgvGpNojfKB7JvnX/7hBiUiOOUd07eeY+XtcROPA3CgPdCQabFGryK9G+G/xcAkWnz8tG48TJOE47TR8nhbIARt5zVqDToecai5+xMN7sCuuxHca1V8jgnmvkusm7x16skZfmIhOcMLQN7JuGR23XjDhZUDsZf7lzFVqnwqPoFr4jrQkuTgUoftGGrBJSSO0xYyjKfH45crgXmhbWYjnqzA5LUWZVcSJSSOXu3dSEGLNlLTExxo2t8kkkzzUv1iYVZPlRJCniepnZhEMh6QpvrqQIzVZNkym1s/IxVd3fW+yIQn/fnpWI1p5Dv0sKuL2yd1Q3lbBU5KuP0wgvTDxvTME1h6OKOEgiOXUgjUTITUB9BTCjWNzEWk+geiAalddIwuBoZwncUx0FtjIU+W7KfvV67fC12ghf4Gqe48OkGxrbar7njgWlabIaA308DdVUwOvXS+com4eoxxkLe7K64Es8ojRbmViLo0/fMtYmfAG2yPYO0r3FazWqTK4LIDlfRA/mhyNNkAJwU1DZPZAWToNqpDjSKD81Ju7dzvmm72rCrDlDTjvQ+vT3MS3008xlevAE9reeH4wV+t0sejNro90g8BbYFiKKT2z96LZxMj5ONrDlyrs4X5N1S/ZRRgwc5MHcfHZmpVAdiEf3VqiEqfcIIrjUcWBpetQuPOAJfH/BlgGozUpVfGR6EszABi2v6s/3iQC94HeOOebQF1uOOr7rRFnYlTr54nR2EEpEWz9Ri0y3E9p5smVq1zO7A17Mx94lUuq149A/ppWb4KIL8De+WyLONoTYjXeEca0jTt7RlQfjWU0ce3riNd3KeXbsMgxDfiH0a5XqO6mhBX92JY8vmJTADIg2t46ZTuPpWpTtRBW+MMX8QQH9csTv88nVvjG0/3jyKENvrCkTUQtriC5K2fGa8U5kaAIAhrTl+0e0p+Ytk/JTbBsN1EeEEzuObSqyY33yBmZDKHNWhd0HFDJWnA0YCe32+i8FuWxXvqOp0L83ZQNrehX7gJsKmFbSGAjOGGhIz1YI73Ni68iI/X3dsY1YOz+HTQMOG3O8JMMXNrgCtdf6DDNsI7vDjGRzhbmvZxRpSKOUTbibOjCYmDO5OdxB7NN9yYkgeRnxWM1JSj99TNF0kOxY/3sJsUOrvBd1rhhP/fVCjZrRB9m0DYbQNlbOGAV3aeVWUZZqRxakBIgdrpwv5pJ2bc3fJQpGib6hX6xhRhrDGMFElDCGMWDRgr1z03Pzpeqqhw2JPW3ZJI0qbfFInWyINvEKb+ZriZFEe3DaInKKKm2M6qhbOQ7kpBe+HgjEknynv1IqmXN1LHvWcAL4bV17HdmYNZgfNu3Bd7CbIX+ZIm6QE/dFi7OG7+/uRv4RTQFtCN9vM8YobCzjmYFalLvVBES0m5IG9FFv/QPs0Th/bh044Zkw/+1FPUh30F4g/fJzhYMATbPMn0ZTl6AFfL6gUE0JPDHLE5lCXcxDBkdrABjc8/jDTS6E2rsWiOECrBNZ3LY4iwhmg95TD6M6HREcM4oGn9ZTw8nMym1+015Jr0U1egAH53co4QMC2zl86yyfdyCmmG1ZOhzuZ+w+zfO8+mPsahtdb2qqUNrDvFBbySFH0Uuoczvc3kdlpwcnfrkOOgvPlOBTlMn0/0LaFk6HHiwQ4mrP5GjpmGYeseOg09LRJVU3VXYvTDYFsbVsZSLQ8lqVVrzkI/mk9V4eGPCVcl5H6nyiLvErWFizf0iHjFaZE0AerQxhx6ry0xlmWF+K1Cne/5TJHpriZh1EGkNH1L+NI+6/z35a/RUpBvT6L9Ttm+6Y6mrKNk6UkefEiQRAVL4lmk1qiba1guCQ6xwEH6gJJkTxH4nBT81mIeLFmyT6Fz+Ck+Voy87h5yu39H+t6n6zxy4y2/q+olwmrsBIKQbAdFgiKvHD5zMEuhEBTG8U8CPUTsAVbdLj3Lduu4GjEJda97qC+4+whAZ2FAGNbMUaNp4/UYMOnHzly8TzKLMLpxGUjznWdN5tSXxO0CNfiCNjnj3dbfJX/Lf4OAz9BX1dKy8JpOD4epfvRiVr9sK9cCZNs/nZ8KoMdYGAu70DA5lTwsCNCFwZQJ+SVIH6ukQRpDlCUefEe0zsp/6c0H2ZZdZ3A3jZEWwSyr2yYrFKtfwZzgtd0oPjs3sG/0NtSWsN2KWxZuJpxep6jl6XHG1a4b8SBQnAoS+6qXgl75hEB9SSjKhOz3HrO+xHGwwsL8CMMqid9VkanOa3F3G2vPCuFPjBIIjVSh7F2B+JF2smS5a5B1385NNCmNQAtmxo9IRNCsojezMPuYF8pE6fE2ZvLxUTMVrYRgQu7J7VBXHPJD7lgQx4E6IbuJKnkXIyptuOvqT8vm8emiSf7BZUXYaArCEV9a/oycDQ1EWnCPOoQBGUF+U+aA5vNdpsWmiKY25ySA/1XoS/DCq9w2RjglrgcEBar7JBi6gsvk3W+15ksMtG1krN9/j7dvA6Fva+n//ifLvaJZ0vGtX/vBSlZIIrykfXqDoqfdxmJopzcH3ZQIXmVH7vS0qK3XK1N5JJLzV9I75Ntm/kwcF6OqeBtcg9gxdzFvuTteaQdgQvFvuXRj4hmmndQ/JbmfitpI8tsBAbkgJaaPD9TqyrjRY0VUvpBxkr5trbSpBUIir0XlkCQHIGRwZnGDBXCbwh83miOayEyqyKSjbZ5/t2ZMlgzqnQoV9mZTHPl/5wasrvgWF1wJZ0xWSW4LjZJfjHcNQVZZjOIcnyq4UK/oByxFXLr/Q6KSDa5hHatxGMZvDUrsLyEJjXWX0cArloM/yaEeqiXJaHwoavI6tRXl59MkdTcKph6qYYiz++jVXahYk0QiHvF1OEzJEl78tOBbExp8Bhbh5pezNiNLDx/EJ8eQQVFW8uKYuJtPHyBgrjZjijj7++kS01ABUCsNfMCsqB1gQt6xOv4Lg+vBP6tn8o8q2sCjcPpIRhcKBK/ENewG2IaH31DWM/xRYvkVh/L3SC9JvTvtFMvEmpvf0dWP6nwNu2kMlmr8zISAStSft0CGIul/YVqtKEyidNzy95Bop4hfYNvEEzSpKqbKTlGtQDfy7CF9rDT2vGtW5JBIxsFL8KggszXwmO4PPO3l4RTl4kLvF7bIvhcZGJP8tWUxvJbVQJH1+9X0k6koIFHvxubCu2DWfmMfs0GIehmDtcV7QWRJ3JY/32kvU/nKOpdDa05/HCzSjQ2mmJ3awHM7cW30Mj6uFS+7fkX0RhkP9tkq29eIOGYH0AMeTDa0A7j7NfnEzzyciwTgPcZBTQ55U9JIVXToshWJ8feBS6olvc5/NDgLGLnj3/S55xYoWczVghVMt+ESDvP+ksxHcTRwKnmIM53s+q7zdT2k42+PfAUj6Q350kqqJJ/OuA7fzuUsI4XBUICZ9HYbvG+LikiYlfJQ8K5HaXuezdxW0Nfd7/YKbulY1y+9J4vmfDGmoTfO1P/fGO4ExzPqRVDhmDZroQIJIPDKR62VTeXuK1BqbynTKJhfEG1LiQjqkGbLUPntbyPxzYMXf74lOW6E9kN/Z6x/cwriVnZ7QsN8oFxyJpqpQIZ+cg2x+yVxZSIOqaEyZLaY7rlD8mkk0y8caoPBPib5YZ163oHTk6q70VqsBQWf1cpoAk85fXzrE+cihdmdy5soD1ZayZGDGGIT5dGjdhsBXiv6QNdlUbyHYTLocnfU6yv42W85Y8qjjXtBimEoElP7cmpY4r6FMGQtK4qpf6Wv2vMGAL4puBvy31UYuoYHNre9QUWq0vYpYhiYbXfRhNjkqfX1FoyChEmUa9RbLYxrhPWEJM/i4cvWL9vFaRXtMmwsOYGwazHnYNJxhsCCRR8Pxc5rj3Ji0EGtmH4Ge2iVjyVvbfcku/hXKL4MINzYXM17HWx9BkMvFwxP/OVZFTEWaS+U0qR9mjNjX4K29NKYn+n8S/ve//+qJIT7CfbG8B6Z0QWuZ/XDdduIAiXSdyfZ7XNKglUekMpM/DYuqkZvPVenfmkd6ag9jB79+FcKcSLFBAT1xZnWxSus0Byiaa+vkqClQSKh+rwUPPArsVc6UL0Xmw3PqPnH4Bip38NPCTvhKW0pFPSFKfFdVR7ada6tjNMh2eUXKOqJhCcgFAds+PGWrCHhXQHVEJSvaCtvDuFLN7qldzV9EjecE/uUcZsyuONWqzivLPUb52jhA2UfakM4wUTRU6Vb6UPcmh7Lv5y+2+V8sF3U22r0MM4mEUbp+CQOFD65jacLtSp/xY/3A2rCMYZlshBNvM9s08L0sI8sO3xP1sCf3CoReivhFyTHoqqLY1o+yTKNpOGa5Xm086HpPRuGCXZ85VTfk6jBskZ3KjMZvvxicJ1v8IP582ZRDmM4WTanPmNMRXWTTLTqZEpa2Mhh3v4Xu8R+uZ7gXSw1FfXVzI8lzy4Z6eCRp1X5a8RdRpW2uul+T1Bbi6gJj2Cytj+7ttU+0+QmmWaDvLKk0VMI+nJKhnKyV/QVcS5uqPcCQCzeEeFkI2ImJYiU+t9Iy1e6o3HHBkyiQxbGcp5ikc/B3arDUPfMLmXk53pyN7tqPGjTZRikH4uYUbtCrcDWkaCauKp3BPRRSxMOi1TonkhjFFhEUW3Qucze9mIPq0ZOuClwpDapZwFgb+DDlBps+8ANTM6RGRRky1iR8364su8YpA5US2Y1hhh8rE0EuBlJZZJvGe3OBSYooxebAqFCs3goJsKWSwu2SrWw0K4dODcg9tLQLScv8wf2rfWgkSqEk7ESvG42aI8ANQ5jTJoUCAKKipQPdQZSyETDA84KFjknTdoMa0iA56F+s9QEeMOPS1tFhPC8g5mDFrM6P8M3KoyZhr0t0fUYkinw8hCOqv1sAn6SpfEfQaq5KwgSMqt+wEGV8cWVXrWP73D+HpCpUUeAWMyfploLAMejRjhfptDGFdneyOJBzUv0OlWpsHpDEUoNDO4S8nvzgCjD9Ew8e3tokXpRgKhXaTN5Md1Ihw0VFr/gUePAgC5cmbWZdBlEPQ0rGy1RRBYqEeH8YniVEwyL4h7izZqH5SgzfJ5OFlERPmVo5fOEUy+XKStnfz08frctg35Xy+UWWAh5SV1JcDzKugHB0OhXYU4qsPXEH3RS0LB7jGe7M48mOF2kZW3DDZ1QVdSBsDxCTGTN3+HzFSaXuVZ6wFrlkpzUyjAsmD0yKUFcoYcHfpGHhSdSWItPt/vPcTJ6IoJYGVTNyt0nxhC802h9tOaM6ArP0SnBUG21M8RuiOoDs/84OwpLkom0Ic0EqQnUi+5mY0NPgrzOjpIs+AtMInSYuWHlVB9wfg4/9dzxCu9A7gLRqpm5w8NiFzdmFvtA3n45HtTWl3Ws7eOQE/GBUzu5VPodcsN2xuMEZ+NKjLbTFf3x/fi0u/1UTM7IE1IvFesQHPe7jZ/4EehJ3QwNqS8F1/7m8Nt4Sk14cB6BLHuHvIb5pjMHso0RsT/7a+15LgJJedX5fHXEy+FPzc7M41IqPPyxrK+spZLSch9sV5CzZIrk158aPhRyGwJHxKiSWF8rw/oR5BHkVrv7VEVIeZzekGngCbEX5zidlgO596pI83VU0blbaj/9lmp7ypqwkbIQSB5ouPi0QanAY/Rh+oygbxOHokBWGHJvHI8V4SpUp2+rxhT4ORQlnPQZZ/uJUQSeEfgwZlzxe3oA4LNV0EPzYTV3bEnM4bpgKrkuMM6a8Dk8Cq2NthFR8mDK88kB4wOdZ50fsbZCfVdRZUINrYr6868mdw3a/+Z61MrCy1yRocpJQtka5KO9GPQCHcb/WrHvlYzsQ/omL9jEuR9QU3a7SS88rfXToKttTrd+O1dezisaBCaVCp1CpyC+8CLrouE5Wv9yBEooiCiBtT3iZSXEe2lktyaOsWfmCTms4rmgONN7F0iFkLZ0d6Sgv2Uj1DimZTCOhG5mum3dVbAtTp6rPM5XlXyEIWE+e8i9B0ynM9b+pJZv4vzEsB/opWWX+pllQeIWLwwYqELJYaqhX2JsMqKFtnTcf9nDm1jNmzPtEE2baMNA5rWBSLu9ht7Ack/3NyFbGM5bJWnLHZxlI4B0YiGbPJ+sYJ7bM4g+pcyQcjAkDhyf63/6v4fZVcIR09AvHWRe5iwimaK87WhjygTvYXmdg0DR8zoxwOc1spG1zfmGsRWkwiL16vUKmo+949bXKtnIdOgnmSRYLCn9yCK5HKZ5BI7h++efASNFIdfWmEGlfjBFDxjBypE5izO7hWcN3t60280kq2iffLVggkVN19SSLnidI5K40mY4PoVVyTCdk55aBu1OQfsYS3Ls/jaPMNbec9T2RjUb8vRS59E7T5JxPo65rvFA+u0mXTEnVkQ5ghM4rZRE5jPrul93WKevsQJA4BJ9DUJL/dnEZKiB3tXjT3EjouKyYSGbGR0xWyXTj/amyLK2mERPeJQg1w+VaW7KTPCp5XLnHNkbNQH/bRlWm4aOQgecjcLN8gCYYJ0vSTq7PLIc3FydvEQNKLyXSmw1EAyHlX17yfsUbwCJ6cx2rBrOLgNQFA63gOcc1KiUDnw2V/XHfw6I/XvhkXwYj9uAXczrEXUxTWvRcU8189YUhdV0CXfn/OfpnON1zspGspypgjCEVIDqYK6gpo1vewJ+o6S8IVn/6Btjj9v2/92tieZcP54KX8D1wFOH347v8r2ifan1qBZ+5Hvo9Go8fL9ALMjNn1vMSi8gDlrX1j0d3VVWK+V/vcXmjlaaH49qGk1wqOm+Gwplg7kUPfg+sW9GTThlgmxP7djx6hoCKviM9TRBmzIQyy4+It8U2Jot6RMA1LkO9z6ofXlS59SwG+/jsQikyhlHeX5KwDqKQkM7n8rDHHC6oSI+CG/8myBhd5TgktgvCptY2TsrcT/sxNHl9rSNAyF4RPQCFD/J5Bi80vciHr1qdLsAosoyyvjk+XClwehc1yovv4AEhgsL2jRItIa1q4KWbBdhY/F38sAyKlTW70XKH8JSoiUAtwS6TTDcUAwf9HvdhwREZ10iVorCFa38hwFM9K4V0sLTJ5k/y2a6H6eE1Lol0jHfTmIsTVdf0XBIaPIaYbFvOERgAQynYgxJPBYUee3PvLWaXniUF35tf/Di2D6OBKN0jKg/BbhxrItHMk3R80dHHAGAhamwUE0oaKCix0xeCaVEjkBiKAXreqPP5oDNmimkdl5mPfgtuoHWHv3/7p5+Dlp7+msecVWZDaPNSp7r/AD7VZPsfIBFqosEbOJXqcc2lkTP5V+6iRzwe5yhucvh4wJPl6lzrO5v5BzV/tLOcRi0G5B5guqHNoA+kD0je84GbhMEe23WdJq4Fi0p6NgmKpdQWiEAaicy1B1Kd1IAmUNSUvrIXnXrQDoImgxScURWiMr01dMiBiSctb2PyXvdpjnJH56xDA50klMchj69HDNMmID38hnAXmrm2zRhiICoB8ZBcghvIedV4fz+FJyevLCPJt4hjqxlUGP320Z8szxWLm5IolndoDGKnEtBbigVnlbp3gIBsA7fEn7FEM591qewTDc8rJ3cfXkHzsOQzphDjJJ+LMAo+ee7TJv2xh66R4rSvcfunUj1+jSnSb9o64B9gWZyWJkDzFGyZXu0r5QFNpa75WvuEMeWUMB7X/fwAqJBrN22SQQ//IL/VqNO+fk66I/iH9FcWRTlne4Q9xy4++zdlEP9oGi1FR1w3xlYlTGLOo46lTeSqPQodc1mTf4CSDM3IRr0iZwv4OgBpCTx3BEbxlJySAHDZY07TsLWCgaVb/wdeqMWLIBBeNCBLvFteGGw6oAy9+n1+pO1pnTDWXC/NFsMdu7n6ZMdddVHeIuMP3i4GNWQMBfTKSa2BMQk8OHqjISeevXlKuW450Q2vqnJVOE5EtXBYxTRPV18gxts2F4GYbW6HkDChXX37q2AzVsdW721z5/cnG0Ky3db+y/klERR++t4frtDzR/yyS0Tfc17LA4ha78cjrWfve3Wxt1RtbqSCYMWNKxX9XsZXvQ/Ka21W3GQaGxZSGyFhFTM/7Js/ghEzjeJr/1a6sR4e8VF8qOeyeR+6fS5HN2r8+/A/NqIQib0vIMO9HGCvMt0K64uBxNANNfamIcGdjuELGIMdJa6GSKePI7FIqMkQvQ/675J2TWTzgmAhTl0kXG5NzG4yO7QJYEIBPpmtiKQsxL3wqxR1JWtyWYAh294wCVRuCTjoxpsJ7usO6HxNJ5yguHS8JDaMX+gU90eAH5ia4mYhvPxhKbbJ4lVsLBp0EurIupGLwpi0X9XSrGazm048meQ9Ioi4BK04tJyWophpNKoq/bkD62DWb1XRg/jkEOfHxzHWTjyKiXgr2Cka+ZK/65HKoQVa72ie9sL9OD0DqKDJIZY1a+bz4Bv2dDfJIxl5ED7Z7vJsgOV81iAJFAEt4TfNrS6Asli9Epql0LogPEPD2tZO33V4cFT3KXGgEd2fTgmgbTtnpVw3Qh3AtuS19byPsN2eN7y2nMDQbfXyBanX7pnIKZtW68tOE3ue14AHdgECQVanfSAQIbK9UeqvFDnMOCzYMLy1MR5FyTbWeyT+mAMKwAYQRRalBFk79r5deBqvwUvi4k3rriPNFF8FmqNpYRNKYkQOd65/9+pt1cXqh1l8B7/Et4Ab1RFWcBrJ/uFQX+IbjZyZDkDfZQjugJqMRPDk/U1PXXUaFpS6N8o/u3nUoYn6ae4Obx88SiJT8H9V2yiXcFsdzpc9GFGNBBBLxQBJ0Ad85ps9fvYk5m70P4bvJYqXxRcD1+rffBsVVKscireQXYZpKoEN5wAgqFx6hzrJroCSBC50/YahfyjsFVosP+OeIzdZcuRA7u36t/cFHrhavcpuVai+f2KfBTJZfCZ7pcwJko8dLJhb2MkCuKDE25mc2Aq8xH0kQEaU8gVp+6qyFAMqqvjREV/XF83MGRVHpnw3I7A7uNAxzHAqtvGDwcM0w+z+1mT0hqVKTorn2I3/FbeYeRjNJ9AhLXCdXsBQ0zfY7vDfO5e54/Oyz5YVVUwoRLmuiHTxhtP99sncMXdsWH4BafADnwCVBgVSAAAAKBsAANdluQlVcby/EEMksZ/6wOkmsNi5FkQcIePE9IyJBCJPPiOS/wW3DpX27Qu1fJ2Z/3bNhfkZW+ihHTOzBd47sEDz4OSq1ckCuiTNP8yc/ETJfFtJWR0Ft27JpSH90x0nCo+fLo1np+6XIjMMzMM6P5CFGMbXs6Td86JqLkxAkAXKELHawTQ3nhhsJ55SwBealkSsy+hNLZUS1cEHvgiz6MOHHqBTqigtRE8Ts6Q0ez0OG91bQ7OIhsfsexRxAJKv70QoGAb+YCG2qLUCw0il4amibpcaFr20qWZvejai0YCJohNQsRB82tO/4d226gid4B8DEZfDuSnn8rFNf2bM+krxU+JQEAuXnmz83v9QCxKHIjzaUeu4T1bhfjnAxTBcW3cg2eaLx1fMt3sJ4imC2eRpKFbfbGZsMQnSmXPlf30Lhfh0EJvPjY/VB8Beh57j390Tj1wZMVrS+1B6W7mLDd0RuQzPLAGWG43GlTuwewL8ZFwWYUYN/AADPGmDL0Qq3ujLS6o1KRqJ4LG6T/+4iotMIeqVsT6kgooXy7Z8HyQkLJjpAO1u9XiJJYjm63WRI4fjQIKW7drpATesFxeslPEohtg9mJsyI9aV0yG7cWegLXc7mxDVO9o2eghgr9onOMSa4/JaVor6+ud8+6WLcUjPDHnKlvQCKEM0mx+cuNRYQmyC+DGWLtjEBnOyvzxT6pj3Ss0fn/RYFFIUTGCbhICa5LI08WmUtnI8DDomKWyqUBu0xJjFHOooD7QMou3DgIUnDK7RWUJIi1wAjAUCfubwW1UV/J9u8b0BtuiUqRtxj74QaCtmZilsBgH5ivov6wxoemaKyLWEgx/c7YgjDnYYfhQQxm0+2gK6LA7WZGzhSZSUOO6QiwqnyuIwhPa9gGR/4CSqydRBQqKwVZdnW7ERLojEBW1ht+WxXWVZLYqjszxM8AU09mglN27iQ21iz5HoMOkfikQuIRJtt2fCzIqEUD0B+MITDsLvbWuactyeBw4YTH1pWT6KJU+36CO7XLIuUj0NCcsVUoiyPVJtByB1aiDj0LvQ+FPwDnRQlQI64Z4o+Od5yZi/ONE2mfs2vvlp5UlGbyklhE0Kxei3OXzu4A8kcJ0ga9t+oHSQmQDeZdwQmxn/kj/Z9Yds112QuRWgQj7ejjI/4M7AcsbNerrxVVRRBqeft/muPw0GuPZhnMODsWreQVTsusUlagJBcvH24j+UtmkIus6liWwcxoQZPjFzrEjYD5oYPqEGOWLbO8RG78mePXBz785nD/EKV+j5IE+UmkqiWrSrImxNJDfMbYG9lPMXXYnKGWtSdnUJZdsvfg0wRulBTVAlgw1M35f4EanWD0y9CQ4L9fgA8WrhPuGj/Iv0EIcu+1gDlzQ0ZtUAaGEDX+8qYLksWvq4XYPi/z+FtWSGYrXXl5qTROBkisIkmorXdts5+qVlkvPyYr7sd8lATJr50eC7j/73jwfAL/e9nbq4QRkPRl6P5NgmZ/Q/dMN06hfsZVEPP7q4sZM/xuPa8KCQuY46D6GELWJwLPW+Q6Pu8bbnSHyRoKYlqomaKSN1CCRbdspjL2om+QuBqyNPBxVMfI2CTBaz8BWjb60CK304ZP6Qko8YDodn5y0G233cf6IkZL25xNWwrMyE/SFocNkjmbQUzQVdud+kHCniHYkcsAi2zOYfKX2Hqa9utYBi2aeGcmMYlNyiqWvEFjgKO5lh3TtnsP7Buv+rfEQHJiVwHYJw0i2G89SWPBv3bSyiB+4URU0r8Dza9y1PiO0nw5FrBBOiEgch9hzN6ajZKG87jAhZpkOEZX9wibDBR0QGym/XdQChC5ihSpLjqqIQ/Ag9g2UHjHBDSjWp5GJkKGui6woZjFy/FYHdQCDJxb/PFLlHH6okhK5NuipYChocq6rpdUxRTNcSprlxSngLulZYHqqV/LK9mk+9jjxYjNEj0f2mLxyo3XEB1mqyj+3TftR67ZpJhFcZzO6ZXGz9EaKw37XVLiRymZNc9HQ6evYbUSDtZCr5oBEqlktQsr/ocGLC4ksuXs5X4qaLn1LwIxlFtiHN9bW0Wsi63Hvj4afzUvq8Eaf9AYjQYoUIxVY4euyNJeFM+z24Y+RlOAwkE1d00t3Wq2fE4asGUUDJMYrYGyx6YnX/Z9l+hhiofQuEsyV/d5KwGa1La9uzTqpDmc+baSFL+tnIGzUbRErHHbHjQzYjsMRUY131NASQzHERAFOrbaAbIcjMAQVWcR4OaPNNgdhMIM3fPi9GL+7hsckju+Y9s5upZ6cvJqLagsH4Np2TgL19VmFekpx+icjzX97alSDrMbBHAH6WV0t7doQzYAWbq5Z7tYn8OHrvXX9hV7h2oQHr/dxZf3mJGfpNkeXlQLN1rw1g3WoyfLIFeq4Yjj6O6Sl2SZTHMIok/Dqw5iJ4GJXIloGG/TdZEUFT6E+tfEwcQ/DwJFJHmoPQ6ypO3SdgukZqj3HK8zy2e0IAGZege3S847/HIP261loelnk4QFhNLblPNV9Hqd8sIJILhwJezNpme7C7KTjNFiDsVeaNy1m+NgwCV4FZZLEyiwkEjNe/KibSvvtRAuWzWniVKzBguJdAmXz49997h+X4aR79Ewy+3BfDZtat+x0ZKg2I1YYicVt/6LKeUWiwxPuJ5DrJvFSujXIASia5fLNNhn4P8oQ3Rb4yjZHqThC8kgmpzGIJgbj282sYK44+KrJJOPCEmd84ETD+AX+UKh141dE/G1oTgd1Lxxa5z27Z0q7D1LMKfn0E9cpPRu/kyzp3JiQk6i1nL15FC04BFZOO6pVleWmh1ENbkw/hVTLc5L18qgOavIaGixePD0GDdS6I+rmXXHvYqx++Eb9NnisW+pFIJKAgNg1btNHwkdlwTPGyO+PZrfEsA6pN4rVCK83CxrIWWsib7rdUgaoTohFv8+PU3lpfJX5K+aIp+NuJcBIUn8aM6kHsHlV2Y6Ssnbh9WLqXv2QTm7ncnxNgANOLdEMGFqsZygb7Jvhm7ls+diWR6ByjzJvb0G2U7IEBy9PCWkMLDM5P9F7eVJ9U6OUjlFCPyhYzOmect8dxEAFgQp+KhtXrx96m6RrkazAg6hLmEKfZdC/sRdXjb80O63B6amwRkmq87ZWyZEWERPQMvIltIhlr13+eNyHYK5dRssbFslYUns1g2DvZ5XTWEQlcdeSRTz9Erl8k81gOdk7BFlsWg3j51VpjLw1WuIFGcp9jT1/ucTEjnrPuDQhHxCwX/omuE8r4TlZBWZrldSAlgp7Hw3kNEItBlUQTXpr7ATo4iEQF1HvXID7CpyDt47m6u2b5661xiQKJSaK9WXSXKpluLwHYADgSbUu8U8TmCErLx2REUhaawXW/4FM//WaoysFud1P4W8BIJIfeFFlDIXFHdumYCdj15HkfPREwtG3ZWE0IZREydIq+y2Dd+OR9/8dMNOjuii/vgt0JtfuWEihrR38TPnZMIK7w8IUnh+LaweFZy+BEyx2X0SuR6zl5sGnJ6ROv5bHEWI5Yp7HubNoANhwowXWd7kZrb23fwDrnYnwYTtTlp9vTas7otIeoDzaDCrOmcQag9Qsv9NaJnrg6CnNO+ccAVTk1VPqpqAg42s475HqLBrKYskN41pjaubndm3ZJSd1BO9DnMwUH18IAB8NOK/FoEiZ4NujWIVgtgAk4/5l+g6TVvaAF/CHlRDiohwP9n4XHDwSdPCvXt7/9AAHu5pJJOBddiO3sPs8zbO/ZEcaa7SKS8MaOYyN3fDUvOx6JkXaY0UfHb6MkGY9HqdYRUalURLx/FRcW8M+5wOnszKuIoBOGlYp9f2DbFKOtZMkVR2W3QEsomLx4y+MLa4D1YLcatYoyaDBGWuSuSdSTfwd07xxuMb1tvyMUxP31cY6UrYOF9Kj9sq3ppET4lNG/S6CeQTJ4CU4zZRL9erfl5PNIDt0Zmq9iPnxTDDay/aOlWZV4a3v5RI3z7B3pAA6rPbZ49Rut/2tdMN+EXHLNSAJ3WUJCTJStjXsxhIbRwkRvgKcEhTh5gh0I+nEoZVa+MYBxUTU4l4kQKMqRWmRHEQs4h8TWhjn6A6lt306Qme+hxY/R8Se/BR//+3dlGYJoq0zjEdc7LNnFtu/BWoXGuD3pH1uhewqEkhxB1qFeFbhyIJUMesIkax0AHHr2QJfcYraa2K3UAz8bOaBCETnbWUiCK/ZmVp9v5gY73zFqUH1JB4OAWZT16yi0qPeNetPoXBDszrJ9HWVFfqmCjSHCdPPmQjO/i4Sj9Y67sXPtnYSkQrYMoXKwJQJ2noFmLhyWoAC4PRXOgGtc3RqVL/v+bsd0LbkV0whP9/fK+R5lngU5nnZGw44fxBS3CGVbs67EfPkjMf5QT4fUTo0Yr0ounTndrXNrxMCck8NDHJeI6zY6UnPOVkYnixcN2EiggytzUWQTv+PS0DwT5bg1OQWC3YEbgxUEi4FGIQvrdGov/WWp28ycELOT4hX7MGLGUuKr2/mfuMqVxxmBGfJy+6+ozhUi5ZTVMXYOONNJzeSO1vk64PsHPJw14oy07LPNqG5dWxXNVH0/zS2zn2LDITLTmlSULsZumw+IYdq+EIitdktby9odHuT12tlBkgT4UgKKZ2edfhoawyc2mOPI5qdgiyclbu7eRp10WUF0wCdjVw1YyAOJueTdqs2SFzil6A26ms5i8E9LKBOhJBcpfjAo6eBrLEKSFg+Fn7D6HHl3GpWoH+5HQm4eIzSf2vq6qYgmxzSiIrQEKOu6PSOVYZPx/bKstIJyW32PB5PH7lkVI4HPJ5if9MSSxgQP7P2edjNQCNmGri0gaq2pyK58VWF7qDVsC0FL8+vELL6cMdWWJhBJtdYT08aHsttNpaN6cR7ndYhcAc+VlNz8Ycvgpa+20n/EmC7WNfeRUDdE/7mj6VSVgr0EHrAQpgOciNM1h3lA9XDu5xR8XSxNIPBpdQzc0RYAhYKZYWVCxaU+FT3Ou6dYiJEkylKSVwjrI3zQuLjK033fEBA0x7byTKWuGDpxp9O4NFUOjV61qxMAtu7grRLSSDUF3vxxljWkxJxXyQJyGPdu7gu1U1uoBdpYvklW460Mu+/rcPec9T9CoMoOxikuMLisrBcZWzVyATs6R/y3OtcctF1uQEoWF4oO+kxLLGwIQl5mdAe/tshtD55djMDyPDz1BEh4cz5Hx6Dy2NmomhwzIBT0h1uWj85OIVkMJ266DFgCYJZLhAh89HDq/m2IpwU+fDspD6CsfSUqCOgE+oiokYnYXtNk+825DTOJtaNQ8FvbT6MPOmWIU17MyfljuvynRTV24jtTwIZXj187gN4TPhL6JkYO2PnEHOGCNwOscoUuxScVx5nR2LSUO/PZknl46K4xkOkcrV+VZGAsk7Kr1RDpTvDpKgkc4EJYKkbhGJmvxHdj4XbFNaiSf4F5GaPgxaJm1/kwOh/QxNyzAgqiSm/a1e1egI38YKX12AoS9UvrO+GSO8KwXy1doDzdwCwhTUIh/wcAgb6mZZztcqe1XBvu9Ssq8fIK4WvYzWLCMWu/8CtwOY5Kr87EC1pJ2pIqR7Z4P4pcRjpqYavfonRrM7B8GUIcdajGZPMKoyNvbZNtBp9HO3CyEbITuFM0CnPtOc58S9nBS19WZnr/sUJuIBtSQQRIDmDkRtpV2Yakvk5EXjRzUtkW7sn4cvzWPGZ6VEn2AO25mrNJfRHHi/CSXDMOUI9TxOoA4j0oYhMO7pwjsHr8uaPS6l4VuE+zLQj3096CC7aFO33OPgFBpzAoA474DYsqkIp7kJPJs1CUuarq1YXt8n2bi1zA3Q9WJk9CAvKHCDHZT9e9mFqymVnfdzqO4zzQ4gzbt7A4iomxpp+w7IfH8q5U1NL9qk5JLtLdgn9Y+qn5dqbSqDC1seHYoxgHYEBPEd2ZhTiwVq1zxjW6FDj6XccRlan33jKayzNgQGW9XLREcB5EvYpIvklFhtiyt2elRts52+njLfqIOeDAwg36aWH7WSVGei3xwPhCpcpWMt9OT5UJ6JgmUFaepDD9YWI5LZKs+WgL9bvuFHQHmiubYvFJh6rn+pjANfNaRjbD5ihI8XZ8pANY94U8x2NHfbBE4luokfaXiMr0YK11jTR2y+J8MTIPk5yLmZsA4uZnRtBlx7VBp703jpyp2RHnlwEod19MuxMYsMyzfxaarkvk1rBSZipsQiX/I+ndOY+dYWrrfRUHvkrmCvYTAVlF/1hQeJ3NNZIvK1bjaJRn0Nk+YtDgduJHrJe3kgdKGdYtvmBzTf26TqIgf3mbAwXUU8G2b89mtgQQHu+fXRTytHsiJVrevIF8WOA4YHr2LscMvbl+jQbcJIK7T6lD1/Yd9Mgr1AoP5sTuB+XdO2y7iF0uEebjW53DmchVqgf0u4zbRK9pH2C/rvK5Hv08lpC5hn8AuLAbksAdpywD7gADtHEJ6btS0ZEXJzWA9uPYqY5VMlxhAPJK+xXcV4OL+0ABAwXpQsRxdljnQQEsG6BjCdAhrzti+UtuQES7VzXpMorwPW6MULnKcRRy0ikydWmenrFbgFYU8jPTYZF+Tteyzcg8++unnY99RraYI529PI06cLQdlZEuegF0rXETSFk/V6qU0BqC88y3dKDZI44ESIfD3jQhp/m0G5osl0kY2+mjkTRG9YPlHiXGnFSDYjQiXVyI9yWhIqgWf0NSGCFQXsKZEqaTZwVrCnblPctwHIZczjLLc/Bf4L+Al8KHWwskOo4RVu4g5Bz2ejo6gsZsuxu1zsPwbJbq7L+QygMTpzWRLuFTLdyR7rl0UNdmV7abh4EovDQjOBhwugnD4pSWzKiFgKEPmEM4TGUZr2bwIFwh2yi6XBXKSNQ3MG/77Aj52TuD9WAEWZCFBJlO4Qrb44mORrI5VfECcShrAkEFRKd7/Zrb6N5FXKlms8OnG8WmHAfUi4qkhX7bb0ggOkj4Bf3T1CjQ6n9nRqJEidnA1/ma0RRGhpmFOon/b3etWLHqM5s+MJ0qDlUocm0QK2g5HKhVvUSPt9XS/2s9YCq5ofK0bh0ScXq6tj8PkAVXvIFMv4RDeADhtC+p/7Yp+RbCiNsxvqXhpNhs38ApHk+FS01+wFQ0cDkCnrowsqIorS86+MIf+cMsk5Jh14RSE5HOkIWvBAaJXhGNJptFpbw91DkpmsU4v69I3/KVKXPuGkE7vuHy0MH8M7dXxQiTuiOTqS1/SM+y03q3hKJhUW4etFW4mT3G/w80TPR5Lft1N7icbiacn/LxPmoLMQLegJzZaCV7hSMipOMCaFpx4YYkpPyljSBygwyb2mvP4gSs9i7FgocE2czI+APwZVfq2ChKoe3IeQlzxQSBG2ezhE/SVcfeJGvs5Y5SQxo4aE5/DxFC2rRF9BF8TbaMjObFKzqSbfz5PQlY/oeEVb295O5n9AAtMf+XUyAwIzJr8uq6OYaQYDZbikvjscWj6OPkatISTQO6yFNNEtQA+5v0KmYhptalbl/Fj4wkNfbPTajckP4ZlpaRBgDiMx120ahV4K34sJo+C3m8vYFr4GvT86mFwQU1czu+Q4rh2yV/+kRWeSzUlpvzoQpK741YLMwb/WjOkZz0aobNUO98AvxHx2AzaLbHJXJApgIVEo2JLBn+6vVY9XOAuD4yap9PKpy67S23NjqVJ4AGDhQSUF6HM0n/BNOuMVtJkXbu03Gl0sCjs91ErRLDiaVG3g7IorkVJilmJIcXpBLVU94SR7I7+5z0bzM/RB60OGDbvh85dzRV0FdS872MMBIEpPIl8DmMdPUkVk6SLz33YFCNhbQIMHyW6VlT/6zyt3gKvNOaVCcK+aFvO9ot39jacg/vg2TwjtFRVqtYKCpwMO2mzGCVUDiSy0GNmg4NdzREmqVRTTXhXT6Ul+rlcfMJWmBvHkrjho3juhNQf17neO+T0BFiW5tlqdc/4B3qk5ZjuESr1VuIMjDO0WfEAMMTzNUx9C/4QIdw3Wl/rWQKnFRzrPCVAb0tou/QsKJBgEwSb0xyB/i7d1HNgJAwqoilld4DWpuKM1LJDnhSIh6iuAhBUYd9fh9jBmUYElKFaDrsG1CutMsEV1ouVNTpTFjOBelqBJ963YQNTPTIwbJwc8j9mkY7DOfoUsNVzto6Gs7SabDIMaLY5/y7C3aKSBLMcJRwUC17fDljjanHkt7a7AX/x2C3uZpH/JBuc8VnimmOxWYjNn0lfBii91ZHmdPDuvsfuj4ZDmKICuXgsbeKUKbE4KyRba7hN77Qhc5UGWYAxOvQ2gtxSgB2IWkLBIo6SWyUjtCMGy12SKlDRNmVXvcfB5upmL+JGpmRnmaOBjh1r4UvMI22hL96+Cgv7IZOxgs86CrI0QET/KxGvrnePgcHDr3nGTBZyEPzgVMLPO7xQQH9zG4VjKi60v0ZCerdVKJn2y+AwLIwtsbxL7hc9OAIlwIOncqNKIm7jWM+BPP3FJMI1f6/SvLjfdzG7l64AiYeOfoTdK5Ijb1LRiN6eEwA06NakattL6J+nja1g0e+2TBnTcy++P4rjcNe0D4I3pmDrTamHLS+qdZT5JyFwQE0QyvVkaWup1GuNPAxlABGcEe376TVtxyf7etFJ3I2OPz0ZJO1KLfrh4NUZPVMSvyKsydhGROsD5MIFOH5hGUCXO87/+fdq3yfkXQJv/qIILMued+PECCobSndUPUDj8/AxYKD4mYrrzuf+ezzh9HnDQaw3bITi0F0+3DGJgUmusEB7JeMIREr6PmVmQcXW9lGHGyJn158V6GUWJHn5WqrU1xNn0nRpYdHvzGlPw3C7DoCyWx6oNrowyHncVOvWWeQQageuJH4ybw9vFytB8b7xEglMIZKxPo2ce0qKeAJvT74A18QaOVOjYTmrwp+nKz30ako9xPTij1twAh+uu5MujYUmGKBqBMgX4lUKmllDx0kZyJZ7ugt8oHBqQYUuCl7rfxgfTzY8NsfE8E4jSpdnxGHBAlB8ip+lxhyzrtenWEmy0dH2N49LC2UA2quYB/HjNRtQ3EgeV8IQZxkdQCbtL7kPVhMrwxxTTK7mKKzOKSqAFkcUJ1th+P/THnTYHr/HzLEdv1QphQo15t9IBWS0d+CFoKs5rc9xKCs7qx13GtGjX9D1B9uFQds5WncQLm5wj9Rbq9Wq/6Jl/PPiECpqtJc4+VYBG0WOz/IyHpShX6jvOWUl9xeF7gTG7J2aOSCoULT/R0b8ZcMZLuvAqnt11cDN+b7uD/xWnN2EHz5nWImvp7GJv8Fj8ipl7XumPEAAAAA');
