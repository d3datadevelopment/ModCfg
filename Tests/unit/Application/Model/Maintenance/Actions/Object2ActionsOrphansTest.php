<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 7.1.1.1 SourceGuardian (24.10.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B357210ED1AAQAAAAhAAAABKgAAACABAAAAAAAAAD/IrTWX2vB5uwm/jmnWiTeZDN5OF3H9j61sBrBt3NnEFM7oR88PQIbI313jpsuYvZI5fUUFa2vkTdbXk8JUPKxlf+J81MZletXunuX8v3O/F+bzkrzpvf0eCn4uG5SgcF1ElESMErvNJf9sayE41fbYD+0SdUpexKAG/XnTIoRTYypAuwkvHGi63S2EgShKxUQDJptv63tQtGnCb6ZtvZZnIOFqJsnc/knCAAAAJgNAACPAGCXWNvgj7UeM9HkTWNkhCSoCKkQyJN90Ttjs8AvurAWDVD321MWE+E1A5J4lqEImrctA02dX9OfZvxx6mzch5H3fCc5dv2YwR5f4D4FqxYoOwVzLsWGvnGkKRc7BqqumdxwNT5c5+MSGpd8+5HVWYJAj/QHqT8IIUikowirMiCgPcNV5eGvohNNtyyAl4najDhayHeL4TTpcv+Tl6brnL8NjsjPPRqT6ThXudANeQPTxA1gmeU/Uds9NtqUK9jvv18PUcbhUSxXEUh/oKNV02CiWB4Mm4rSfO6FCs508w32PVxrA6uhf4gS6enUI4s9qzg/2UgurRKIuMK3nGgv+a9hChRrK8Cvq8jzlV7eGSFN9bNkK92Q5SnQlg2ZqJPuX7qtovAxaYYd8gxyfBnA4GANzsNyc7YcPbCDb0PVChyR+o/LzwmEFj7GdZGeURrBis0J6u8xgk3sJMdAOpydMmM+zWkG84FGBkkbzShbHQSRKtEOgiVdDvFxNajijFLmmzOzRoBE4W/U3gz8YtpgSat070nJvyjp6htd6dmCVt2e3u3nK4Tn34JQG2WQayn8FZYjVdmZkzBCawswHUJk9jSed1Ir6gfk/Kfvseibj+QjeLdWsPU+xFpEj7+Pr6I9ujXBdJ3j0sbCZ9fuOkbE+5+8oRnV1CAl94z085DSs/LEoImK86VNmkwYKzx5K1PwGzRch2I1a1aNIoAsXq7shjkOZ3zdcp79BmSyr+3rswiiD/3mYINR6VNZz0OS0VmU2ijkJGVC4BB/bbLgYCjk1HGw9991s+Pa9lpT+zMQ9pK0nA0XmNUGU18fQWWF1HfLVddidtJAy58IcgneVNdApbDpMbcQAN7gNmQXD8ikOcWoxc4hI1EnWLXnFyNU2qvcE/7tFFLWwFstgIjM4vIxAUO4xeV7KdIuADS7fKzxfunIidH9uK4Fu6k/uJ06N2qVbWgdOP8EEzpMClmuhzu+iZkxEtscqowPs6wWysU2UlMiYPLOzTqQnrRZdiuwEKUJLjFrMkSvSlRr9iZiZSjCJ1PgVvKkcEi3EPzOifxQmlDVHzy6YshNkfSP5DxA7+xjQZCtP0bXeL4EHcAKSB01QIYDm7prIbRw6KHNZJTLl9b6ysUplJujxhdjP+wLK7DYLQas5rMywoTI0j0qLS6ek1vul2LtWs4TJrXslDa3beDjKx0vKS2EYiyG3O+8/QrXyv5NTRsnxXwUexXYepIhLv9NXL2AzNjnnUxmRmeghfV9TW5IjzrzokekTT24454QdHdsTUg54s7w5P9ANj42KsuAORS6WglTjwz0Vc2v9dEwQwAK1G2TJBmunSG1vgT/toOAeUfBmLNtNR1+IItomcwZmogHeSq4Tp5vG0HAJTqsetvpVdHaVEjXfJP5Aflk8ebHVWaB5X7rSIvgcNhsdLKX3MbojcRaIhw0R/1NI8WPQB2ZVslx/IfXkdtGY8OjFOd4PzrbmUXLexvoirQI45hlX+lpQ6CGiwkyoZrQIH7mTCf7BUQCheWnwIEZ3YN96AZLiDdplNpwoBK6kAMUKDBzEI9DJHzKtEpLMY2wGU8E2ZMlAS0QX0bm4Mx9OoAmmwC0TH/xkXLr0zuAgWPZxrr9aIg5V5L0slvluZDvVPyjynf4BdMtdaRwqNinywodP3alXz0Ke068tOcoKno7OhcvHPChGhG/FDG1YzbS1yjE6dqIqq5lYBfsQlyM7XAkJ5FmapWVgBaeBa00iKrGPQ4LNjlluT8/PXKcKuyTwifkC44sozMhj1aBLRqRFsyK9EHYZPoxgDRhoOWDjLWESrq0AJuzymlyp5poBM17Q7rqTJwrJkrDQ0HWbiVFRlnlemMzc17/iBy9+AmL7m/tJUUouctI2RU9Iur3bj94vx1RYvzwBm9POSdxoLjuuwL8H2lZPErRLH+dqd7yzZEANT6l9ThfUdDd0aQ9f18UOdq5y3VHAabsKtdVEXHcKakIOX++VlZ0IZXSin08gg+w/rUywhj3uklkoPvXfT4bTEtjyNOuL9BEa6f4BSCjZeec2tyJcTYvv59ZiMyE2/amBrypXRsxIwngnaxJdbKotbaSnPoaZeNbBh6mfkhU9m8rXruSAHwbanF1SIkwScNf4wsSIMM1lUZTPBqNUCanNJVv4gLONNBO3Iez5t/tF0aokA3UAtYlQczWAPtSm6tkBlAW5fgGBHravEr9ogYnhnWCpBtJIB6h8VRXKB1VFsQIV8R06BIL+Gs8nG66dZN2jDD+7FpCK4lYa9FhyllMYpf1vHNoudDXVAhO6PX5s0iEE6h6qZAY55NYPQH0tLA5gT7oB6hpi+XIbKgD6gHGBbAX1UKaoAVLKiuH7PP9O0LpYXr2tAJs9E5dwYy76gbxhV5Ovryo22c3/yw0hG4ZhMq8eCf3132ByXz2I5uNMOcDbVCPKb8FU43UxLZ4RF3OZY+oCv4GPkXKy+bxHcgmNDeUzDgW6Bqk538hIB6bSC22MiawRsHx+4TYuKL2hgSW5dtjPzlQJSDeCM3DKKoBc4PBDL/S3o02hn2C6DIcDOkWlQ1eUatzwA0KoOETcDlwOEAS+yuOgjnwBaPhPHmtr05r7cfqUwasMBis1JF/jqg4DEGVXDsvosuoVReMEr3k2nFAWBL5H5YgwmDRfAp1bxq0LqpEC0zLhzhoSXNmNpPPFsl8kKUvJQbHelfepztmtC4pJ0LTSs1Ya4Btpc5z/Mk8ve6NGlBBSIw8dYw0t6DU8DJR5+2Y5nEA6A9KaudUdEHZDbU47jqixMzQrf15iwDOVwz9RWf0JPbk3XIs053CeTY8Hgmg11SLIpNNUVyuy3vyrsk1+K7jbZPg6e7LlNzIJ850wo2XqGbDV0gqkOVaoOz0rNUTOHN9BmfzaeFX2/QexSWW2ySCd9HAkXkuoZav4+GMimR3IcrVzhueHcM1ZB1VcO2Ivz5C4oD+YkLWFTAzlzmJrD6PT/yGk3PQHl+1HoFCDP/h0wGGtj+C0bL7CJVSDZ1NNfl1bCuVo3hU3xJAa4kUp0HLvRDR077cvM0r+EC10NIWL6MY0BfiXjntMZx089AMXHYb2Qke2x8QbypCN9znDHAl/uYgAQpSuCOqJk6XYc1qvjo+cnDt2tsD4YkFCW2Lvxen4dwhhHEH3CEkD+P9segcQUsGHnXCkEDMq9G+4RQ7AgFfDIed03pNbxOM/6UhFeIi25DC8c0Om0kNUzopQmYFPabOz/HGWdXey3r2knIR3YXlu+uEdIeaOVD8KnRhcSVDj8t8siAzZ4/Ng/E9yVpB3I5k7Ks96zUH7GuTinrXrllyXiZiQa7Ojyl/HWd9fH0tqtoI64NUXO/tu8074s10NTyCX8gvuTdkK1WGDF7OUQTxWn31Dm0aAGSBnBdV+MazASTe9UEqm3RzZu8pKlVsQoc74K2ItIhMWAxZsn4WBDv47fsqdNSdYIGDtZMqrhyPP39nOEebCTTVejIZLX16dyaMAlpqXb2rTp8HN5Vp7GiNGQ47B3MqUKXsUiVYS7U4vgkUH1xtA6MvUBHpD9Zlmmo2lNJ5hirH9tnb+G61yJIRbH5H/2sIMhfvzWSt/oAj1tVfCQq1u3nJSeHFSLWIRwGS70zdlaDNC0FDwRE4FH3xH+ZLPgpwA6NMUFHhGkr2J9OSx3lAqctOF1qe3c7SZgfcWSKwuhoXuDYqUdiyLZtyNR1fHgK3XtCTMw4aXeUErJenqjSreVW09ioztkhS1DliujlNOb1zZp8sMLEqNAOn79rnBv4L2slvUNJU/JB4s257J2Eg6rLxDH30JdrgMk/Qd80K6ACFqm1IfaQBAwY2TMicxqB/N7C2gezmqfeWYv3hsm/t8UE8RTryDbzn6uEElHuAuVwQCTzHcu5e9YaYnjfA+XkUj5aa/mgg/Rpj7WS8vc4C4HIpseZsPBVwMYAMvSpSNJK/VodXczEXjWwdKS5BYgmCgkkcBY86ZYLMUJSoWjhbWEpAWJURDJRHdRRUiR7gGGcxq5afH5MB0Ag4YkrJeYJbKdEwGwG3AG/BSpiZaE8q6g4CoezP/q+2patMmn7O0IVXNHo52RHP6kPbLcoN/88zQ3NpiTwgJRZv+/QGpsAhVyqdRjgwjUfMon7VSA29ZX4LFQ+BuSJYaAj2a5fcxTgNfpkWP/6wU6c4ArAShZUY1S06cXz1tuz6cgZRPQqPTGf3t6eAB9pZVWgWWfIcMwED71k4yJzZwiYPSx1vJcgDA9JGKCCumDO1SNWcM3ZT/A8WX5tDw30Iy1bjCFGJW4RqSVB/V9vt7GFnjqGTNeQeSi1ujppsrBVhlLYc/jtduYDosao7As4t9PGOGJP3wtrKUZG32pt6Dh5MU4271Gl1sdp50fZGtrTWCo/V+P/mSdtWGDhIQxhlwXcjcEZEVmozKDrL2ICoPz5o0016SHd+mQEIKbvdr4HBedgljdHahP0DnNhetYmi9WBNm8yck1XAGTkkJ4sE9PeEGKv1L8a3MfiSX9dMmiJTUkOwMS+rHY0yMfwjiN/rwKO+jGdWv7WKyHLYGH1kz8Z75JB4+gcaz7ce8ypprphvVKtUuTi9NNG3o4TXGn5gvjEk182zNnmpprBy3ANalfMR+uPa9kL6NrTXEAPuWU1RAAAAkA0AANfMAksotEdTM4JYRD7FeUELD8oKEO1ZeiwhMQJHA8qZ8HYYF3wnOAOJ21VaBrvuX5+KHz46s02/7qBh82AOij2UqP9528WTy3uXn+SWqQ3DX0MlSLvIn3DBvuuU0HjV3tlWxdY+/H/0Jwee7afYRYBqTfmY9RMMnjqj/v9B/v2zrvQvCXUnDAr8elCkyiShVVTTjAvKsPqSevSvGBxzeuzlFK8ehIemevbVllb+xxEgQQzQzlKeORlk3XMGRAvuqvtdLU6PeI/KHwxQXRNBBbZFp9b1S7ARYH7Y8vC2M5OyCRNqlvY4C69/+lOXGItQF7sujjfDJaEl+zy5QVa06GylEdhMSENAN4lBIsj3TW3XRqr83PaP6pjaHQhEovh3U04gYZe7JoSPOM+TfiBV2ivkLW9czz6kDLtEWib+PcH9fmnNS2QkkEXPZWQm73di9SHPV2c21GAKicfQeV/ovKbBYVw05Cqf4PC5VTGwlQ4c3Uj9qOQcugRw9yO/ykCy0ehLR38naRdu6Ocgu1RLEZC+xqrKGw+YbnpAslV0cFqiZtOKeJ/AIO7cpqgrjRoAKwJ4pip8g0UDmcxq7u7OIcdnqabm3y0ZxFiAlbxm6w3fFq1iqPhH3Mf210dKxsseje78ODtTyyC1Ou5O5HfwyQnhFrPpD5ttC8UW/JcMNN+0YAd+mYGtYiTSYJubU6CtoPCQP/5nmPuiULIcqQ0Eh/oM/BhdtGcTkw9fdbLD8vRotA6mlbSnKgbyJy1QTvofndt5CGsyhqiMIZp2LoO+sQQBHNcdiKIyv/a7FFGXwb8oM9PUQvTedt+9hYwaHXInEpkqNE8NRMpMBSYhm7HiHkDr5ip0bU7VEteZiXeyCq4EI+U/ULf9wo6bTfhUND5KR3VCNm7QBfQtcyGTPpvCIhAYytHuEv0nHa7PtWz3w2zwPjwkoPzz8M24SeRz/JC/nzl84vkMBuquiEKlPgT0751RYDSZhj///iNUNgbCXsHcbGHXETz5KTrwCRKzYCg/9Bib2mag1R2/3PZT7lcNoAznYE2B6e6PrOuK3Gs7dt8fBYamqJcKWk2zj6x1Ih5xy4ubtJo3WPaOTnjMme711cJ6D//0B6hb8Zc1LPwVA1CH/+Lrg16G/zoyNjT16vLlFgZKnc44ZBLXC0oD2Hcdiw+FPLTVFw2ftBDDH3PWbBRSW2ElUp5T/YEkGd1pGUDF8vLbNGE3XRBp/tHISpTl9QOTkX0V924mutYYQZ8tiLWqAl+LVZkfK+p+2FrXf4pALjAQh76oQSrHDu4buw29pvgifI0jj/xHZoTK4J3cppiieimXBkfrIhE7c/wYFAtcxEUgBun+d1m9P+ky8LyuHzZxdo8EAVxmtj3OWRhYt76V32emC6O2Tz/4ZUr7B/wxXTkN8D7Gt+zvufS1MifCgK82mLo4zjSkXVhs/4GNci2tk0Bclpn2O3DAu9sSJwzkvc6wx2a/Vheuu2oUsDoteiCRLcVuXh6hgiQAD/yy0Xz2X3BA7C7Qfqhl3GIPNljvgzqp9yjdSQa62MmhbCQq1t+7XN0bmqS7/BuDmEl7Q3Dhq3wowHUExrchT4HLX6WZqUxh0plDoTuDtnea5YBsfrvdsi06LI6BEoD4zaEDprWPxxhO0paLqHBgT5rmgYRBcJBjwZiExDZNW7sNFjkIlPMfrmQDdErl5UVPcz2Nz9U8rERA1jPadx8WfzSmPyG7cpoM0gTtJmWU+4VypcAdBXL/d+mn5hTA/9r0TyY6TBZ9Z7Veo3GpOeSQtG+JK6im8Xtvu8oHC30RT+v6uZJPFctTlYZdu4n848shJ/mj1GbRturLb2vS4S+dII3IjdpLzDYqRhB8Jj3xs5uUzGAbtAtNRY9Ru2Q9OyNa1hB/N6BJzZ37cVFb5YLRlT68p7piLHOxGa1SkCHGeFJYBp9PQs3qe3Z0JHE5nhhZD5qdJlUxZ0QTGqUTSxWcYZKJc9gFXgLIU9XzambCTWuDOJgvBHaFJ1Rq5FRJ0VFr3xi6IFIl3RWq7eadAFPFV6QHOdumFJFGWmmlPvBuNvbf1HeOYOw5MnqRyOmJCZKbkARqYhDCGC83JZ6Q0e4nUpLwESvf2qZsywhErEeM78NRMDaMli9o/8bAQ/u+P1Qng6ROgIA66N721NSs8YRohUuFOGZSpTOQgs/VSbKQHlKkqDhE1VSp3MEBg/mfiMk7sss/T8/E/j9HfGbsLY1zmD6cYYGto/brZt6yvoNFs7dPmkLxkrktnyRe6W/dxzC8Y8qOwWzKOWg0R7nRvlu4EDNK5xsUvlSLFR7rdIrWgXvbXZnl09LU0D+hd34GGpm8SSag8eATPJPYi0QZOTPV71xawRDxr8yb9ZY/773VacW3e0DYvuFy0Uqeu5NVnyJYSF2DH4TsBBziDd18CM/VxUSwZB9j72FMIpIi0hzxfpZbLojip+l0WQiIuZLU6hxFYd8C+5wuxUDTYCmhqFxfwYBpeiIZqyxqfiqayUueP0qRIz0m7MguKbVbDLhvEbg9pzDYfNzH9cjuG/t55sQJNtlU3eUzt26grRpgFVT72rNCZYz7jtvh7cwG81xyjSufZonq/AJIQdC1fIHZXMuvVkymFPpCJ1bMDNFbHYis2MdoJUp422NJ1Rp1GSf0NduNiofary8UvK7iROaED6UqXj3AUb/vcD3/t+WM5JZyahc+wCOwhjnqzSu8s1vCrB4ZjZH1JTEtDPfnOhZamtGL04Vti6kJhUzIdlxsL/uq/YUvLD7lVAgGsRYSbXP7OdvdcMRHad3QlRFwQjw2i6WUPqdaJNtl807xg8KETFmlu8KeTvxd6tnzY5nVRjvYECNgAyXD2WZ7RDtXUesiJAngVyzsnHLQAxG2JZzrPAwLs5YwNTsAAUszeQxTs3o3RWGcayWwi7AMZNUURRx71jdIxVK2y5ww+I8n4PPbl2A6Ylq6D70rS22c5Mc1TQ46o6SVLySM2UgyixcRB2f3UoFzmpF699lry1kW9R2T6GsWoyYe4MvCPG+tGR5Gc+skQnzOBAf7VWHrEFSZSNc1af6MO9pgfvvP+5AX/drWeRdKxhwgMc/jIh5uKT01mTXStQsW+dpDRrEji22J6hhj/2El27RB92DN0aiaM11+RjMm/oPvbHP6IDe84fXIx1lfVv2DNqSdoCVqV4ub2riIm3kYPJ2FzWrjhJ0a9j0j0UczODJiz2Df7lR8Sn8hlkpJnNJcNJY0XlQhUverrMThD+aYf5dRFetuEgHHafDZbKMpKaOkNCfufndNJHJpBUEKJLWlpXf3imaIyylZi+Gerj4ysJuiResgBnOVmEqZV7ZAbCcnqjIhlNS6ygbgUi0yzXdHQcNuInZ0pQew8/v3+EXS9jc1wq6e7BcdgIf3vgWQxQqemxTNeTX0985wRMGoalwHzwbA1hzcHsXZgT6cQ4rJCOM309p94lILcQNcitJIx0AeQ7wex4sQMPgA/oCjacygo/a9jms7QirlaUvOEXWGN25rKfVUw5hQiTHAgG8jDdJSM7VePQAn52qkzmRA0FbeWufbnn9G5UMofh2u6G9X3B8WY9tNwdaUhN1x7RfN4VdzBUOktV6HH/W/vaRV4RNWo/K1X3s8pLqb1Sjs0sYL+Me6bMXoIlNyX2TbIX1yQ970NgEfsM43kaYH19wVuYY0nxMX4+F+jujm3P73DnSqas04ac6bNPFdA/AGrP/1XKKbZ+Asmq4cUONriqezyo+D8PCgUhQT8b5E3xr0rXXM4b1T/YPYVXRRAFztpwZ6KK9nbPoGEtnkXGsL0oFY1wdjz8hCxHoDobVVVEmu9aMGkQ/x7DJP54z6zANlY1Iez3NH3zvIw+Nox5a9Ua054LSVvs5F1Qeo+E/wxdEeOjNHZR14NCO7e3KtQRphHAxSo9aBZSbE70hPnonSYdXiQMx7EQOMAarJi/NWXaX4hkvHHWshdIHmXHzrcegeemSrVJQzH2DcIqyE1ju5ZZ65IVM1uCpxyIkORsmEOMq0Ega5s4wIDM/Hj15qJWCX+13sDX9RBxLVFKqJLMax6QAvXvo1eu0EOu4r/U8vRxG9IoEAYKwEXXJHixNnV9sMSxqEwRHxsw6m+dBULAV06OvTxibLO1jyMdzNaFDE7i1lZu1RQhSCOgtFblfrOVmf6HfPsED5RisnV9BArycYMEdHlx/UBL1s3oocAUU/I6Oq9zoMnzX6lXZrR7BtWALMylXYkUX7IECAi6cdDGd+PWyKJnKi5gxaJX5/kd3f3NRYfOdztwCySr5q0F+B4LmjbMwzfQV898Meir2gt4m6ts7DpabsQ37SC7lUiAkDWTx1SJUqFz4FFUHx3IxZZFyCDzpwJ3VtmaDt4jAWJZWkhby7Cr4XVtbes8I/W+T+OMH8jyqP2756o34PHSBFnceRKYqDFAOAmiNaFBwHhvKwL9Sk1Qv647T8k6dARzHpNjVdJECMh8+aEtYop24z9N9XWCmqXNcteVMKdpaPP7mPhgNnAwmaVga4aAKZzGXdFhB0ezoHTkUp/t3U1HwcZdtvaG4VAAzblwhoyPdXt6PTxg0v8MB27Vz4u4xgM94ruSn9Yv3GCons3byS/7Lue62mxMYdz+KhdMjLfXRSAAAAeA0AAFEX6Kzrh6Yi7KlVEjhe/Ci/yLw3vnQ96t0sCWcLSgZr3CO2VNpRuvKXvWHLxrViwQTgkcI6gJ/8Vazj9lN/zUUZndIrvGGlsOBGwyGZVQ6IwZHSdhHjoSd6lnYV3AA1hPzls8+7cxJuz9IcfLmr9ieU0omOSMwqLMFj3gWabn/BjCKTEThRinx9hkDmhTruq5MafC5G3x0VyKZO/X3L5V4H1Jl4G7P9aCSZj0OC8F4N6EkuLz9bsIqtUH+fF9ZfygaVPxV7auPilmjyEP4pGLgXA7RwToyoQBCOFbccwHszbAqZ2UTxa5BTUSgkmzKQq6jL0GecFZrSz8WshMGRs8SY6e9NLFK9WXf27HvYl+RZB6pKk/K/3Tw8C1CNrlaHXX0T+X0eZIs+5kAz+1nTEAVJAp9o5pnzd9yibz4NqElQBOSbhW1Aj0aC4qoGvqzTADN7cENeB3H7WvP2rMNZP+ncNz/qQ5TXuvv6CkcQEtLP6fTyS7Xw0wZ1CDWRSYnjBayJjpOmkedVMMQXDSzbpUHjfvqGY+P+LOvpNvz1t4jbEEuK4+CImh2B3+w9hu5crsD9g9t5RmHWcq4jW0kjpL0y3hm4FaQVO0eFeXGy2/+S1N2YKkwu+f4OkS7awCS16kPvp1/lA6ufOXkrAvE05ZyJdOLY6jQ4y39nuw7ho98E2Vi3bXax84Z2Z4xPMtjhBW/SC8vCiec0n853dcxunuy813Z2Q2FihQmRldGBC2xx4uqZdg40ymGqXb/TKPPfXvqJy2AqPxfDLyAxfd9wx8FsEvwHsXHQ3EajeVV8zhLijLmkEU7sjMnTt9y6nGokoRcGGbs5e26+81ywUZFZsSV/AD/w7NVoamnGUSlsjRoBXN0jFOJDny0RuRVpHKvOPVbDuKmn1XWciBMylGh6sQbyQLDDReuSI7mkXfk0vIfPQOVgUde+kdb+wOwPBzTzi52RYJDYZcHNcYYI2WTUY5MmYpLGjdZ6jR7KL6wjidOlOLGqEuzO+aiifO8lktOL1Jgi5+w6mF79gLNErXb7dw4Jmn9cCofJA0eJIHQ6gjIZU58CW56tmPJh71WjDGarzfVrVjwI5ws+tL5ykFuMsjcFpPyLGAcww6Gyq85vqqcL07txxKycZPzo6StlwhWJsqdEJxVeES12KVLYLQ2emdCBdQ5eCzDwC3itF2fkLQj4Mg/PAw5U5jIuTunLogT3kJbkKWqpMH6GNNsiiEGEFULVEz+fDPM9rRpZ5bPLTj9d3ryVh4VaKPKj4SlUiaB4bozceJV67Ou2VT4y6MOh7H7VmGQYa53/gTFPN3Z8fp+B6m6q2Dt6tXxVBjUJM4M+fA5QaSNQJE0vUyRp3o+m8kPcHivw5Hl+TkbJR/Xs/AoNJo/ZpCaDIQ8U9a+qpgyh4lb86jAjqgCrsg6VMBZ1+7+1UMPw/JFMYODGn49NwxP1EOpTE0PK/RyQkQ0niivkkLOzpax/wITFDq/d2brhJTBTgL9SI9xQbsEunspvH2Fmusw9J/s585s5MYCbiTHIcGMa0f6qQdYVe3wxkpYFZLASnOInIDte81bQss2Fp03eMmZpdk0mMHXcxaJMgzdHIj6r4fRD31xb4NZ/QQo8SsR25qD8zBOCXiLIflGq5VC3D4woUjrO5ug2RyQx3UX80QIzq9+JpIfOaeT36AKFjTp6Z0xpxRtNfnLZD7EoCJC+Q1Hj/tSGt662k5/x4f5Qpu+QJ2NsP5WWaiXJOLr+C6XzhCP9hZLq8F65IPT3WTFgVXnz5D2HfP9LprlXAlOJUvkrZD2hwfZGkugMkxLRIRkAP8bMmpYNnkvsvdkp1naZwvDl6iNc7ZxxVzgAhmGSb4ldBTnIVleJDu8gfMETX1EFhTcF5JyQRiQ/KtewuM9ntyK7zvTccloUtLZCpY+J0yk94LlxvfHW0R8Y1aVLlslRhYVAB0ej8nI504A/srYWrM2V6x4UCM6DE7K1WBUP6YL1t65LLSFE/YmrVF7L1C5seGL9Fj799KlzOuR2PKxXpBSAdwCQaauK4mUKh4Sifs544Yo+1abAQPb6yJ8PyAu3TF/PNEuqy89WF3YGaCRwMWTCwIiua1BfdfF7tClz6gKCfpmMNvipABzRJzQRDoiRDI/pyl0f3WmfUtiewvNCZrH5XTKa7G5xu1Hq6ZxQOWRPL1oUsiDK72lj+UkXj2Sy3dLXiHW3fKz2ricHuC9guRGtWurd8n48cM92qHuMsDqxEtBckM7AKudSsjYmFOE/j/3MTR55ahJab/4hHOlzLs2MX9JBN6Njj5tvoyW79HsAV45q2tMOBbMS6Mk3i2fnZgFsSHeDrBicYl/RU0uFaM68xUaA+kqkVEOmh04bbDMFPqjeg2Oab7BdvyE4mqbwVzC59phFZSX6qnFNrv2tefHz7nssYwiUnUe3iQ1pawwIw/xgPsl2jdc1czwfmVbJTX2AdC1RXrFJsRjPVPH91cTeN1Kh9uOpmwgLR0iD1oZjlPlV2Lm+nR0KM4F7L7l3kKPMn1wmsO4tsAhriRqmiiBXD2RIRqNu6ui2x+WIOKmDs5I1UbjSxsRMsuxjvvyLKCp335KY3i07WNL3ac/s/W2gSLgWoZeD52L/y6mlntNdJXatgbneVhRkLQhtPgtwuAjEAEuFhp5bYIZNsoutbgpHJDEEJKqdZi2iUnAiYBLwMYrqUblLLnUZ1QSV1SkZUWeKMeP+vUfmaqsG8TDb1o2gN4C163Ri/s57sCaJxolDgQ9ceDcepf05D9UFIqRs7Qa57zoTq2Jf2aasvN16YvDY0Eb61cOvlgP5HcQiZqBJUs71H98lZByed+HCRTiugffSSaw1P4rYB1gKpuVj6X9Z4AsjIiCmYpIAngs8KBA1D078zBLGefVnnC+hwS7DUFGrEEOUtJBd0NJmDHOkUsnU8V+4Qo/+0qV7mqsUvGMq44uYXoonujUrPemhPWUoIdr87MSk6zZvu5O6fb4Zm71Efe+LeAqyut121+Y/u3u6in+mCfh+cBGpIq4azomwyg9RGW/fOReYiN8nDn8fp6gLWspy7Uens1y9/ACZh0HMEwk309sJSTB6dl+0JoRsfrzw6RGrATqBb7N/pyjlLdxrMQO5GRJ3oQgl2zAwoIt472F62sr0DqyAJYHGZEzlQSDvhIvIVciOxC40Sn7TuB59cuzTUzu4BisqwYGUu60bg26iJsd8dtc2ZqNWs5R6bfG26dPt3N8dSoyaL/Gm1tPHcGjhjuBad2tvqaPWr+fuzvx26FaAJu0UXL9oFiYd3OO7fF8+jeZOUHgoe4mRlhKlvm7lM2eWNXigdi5GoNYLnJY/6Z+ruAOK4VBNyJLTffyP4Y5t5lxJ8FLlP96nY+EfFo8pWB50pcHioLUEVrYnGOU8IxdvoXtYGpDhNx6VKAR9DRb6N667CSY65u08dt2lJW3uj5CvrIsNfmC5dEr2BS3/1CWyjOuDw+HGHChJW7ZeJ0OejLytWnk3ahelc4ynUlSvknS4c+gaPpkU4106UyN9zKul0dEXiYNASGcR8Z1yWaW2ksmdZaszY1LRXqTAn6tD8ctc2Gva6uw1qkbJ/U22AVVYpvVzRBYovOtjTZwwLAm4UdsRi59fYdz7tlXoN/X92r7TRzJqlGxnrQldjdyNn0F4cSzR5vJrm4jqWY6bL2zXbY8tMhs9UvZ3/5s+RhbHJJa8k0X5ia92QxrzleZZr2RS9lGS9PbFBpYf0JW89kO+xpoxHElqd/kctOlyKXXpgJosTBj9P+u1sUSAaLuXd5zTfUZMYX4E3od2ZuHseIccrWdF2AAkEr0k3d6IryUg3q1DrCukHW5jnjC/JIICbHQVaYYxFHbcLjGMOLx3fM9Nmt9gzRIxLQxwgfgZPUViEzakA5mXUXeZT+sIkuKIqKm/O47DhnxxPVx2TsG0te8U0do1+4p5L0PxOClVo+4mQcghZiKhG5msk/y9wXXCabXv2NT/CAXXF/eEgwlCDy3CP40wSXhOvF8hGE21/qKXwr0SABjHeVKC0inXaQBqk+h6STfypVI9b3Sph1dg6I0SVzNT9gIfM9RtChcuE2ybpXlLNsSMJGOFIqfL2S/CyBtsBf5JVcHN2xdfGCQD8HO6erb+MHWJhtuYBTpg55vaXPE1p3cdc2jroGn9QpfcrYezSuy4QOW52EYhifgQsNjgMH4ecFXqIN59UKZO2ytV7GExrlo0Ao6Myy0JR4EH2MShWoxUJABqwNcEEnE6cknPzdugWrOsIV5hdiduKK4LT2ZqXB7VshaqeCRAUU+fYzzh+FM6JtTl/WQyXPask1P3Wlrt7OTnJxWVEUy0zC9XrgCDGWIJ5bamxFMSfz7Bi/onzEy6v6o5OMPvMkNt3vLK8/CQ14FeicxWZh0ZpjnhpAXZFxUBbN4ktq6sKxqP4AvtojNbK05+DXCr5MdLp6oKbEgom9gqeVf2AO9lDprF75hqxhhKKH7dI5IIoqQdN82G/dzivBBI/X8mxG49sNVKw7T+FnsumMmKEqXUkP9QCyLR5Yd5lGmOeZ1VJy11fPE9DRO6sNgzmIEK7FdU96umjU4YbHe03YVg0Hyittb28A8AAAAA');