<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.0.0 SourceGuardian (28.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3ED210FD0AAQAAAAhAAAABKgAAACABAAAAAAAAAD/XkBmnhn7DaKgczwXqY8PNrediEzkY7ZwJ5IPXWDM3viFY/KhCaoWeGur/bnkSmIo650Ep1j6a3RWkZsk3qEiXXNOiSIy3f4BfSDqWvPHrkpyeryYNbg+xgbL/q505BpUA/XW35kxk4LK6D91r3YDsIPS3HUy36KqbUmtS4abxpXyhpjnYDQeBatHPsu4VJhaXRR6QUYkQBBieqD9oNonYW0jZ9CaHgkYCAAAAPAGAADOfhvUCL6KK1qZkz1M3Fogy57weCNA76wKwbdqrNLyNjG+Cv3T0BXpu1j8YFLt7RbT5JSy+sCyox9U2jh3i1vWyMF1aTL5kN6Ibj7e8NyHMiKCc+e6o02EQtPDTvztwV6Ledtrx2MwaYMhwRzjwMcmhaAc4Ptb4GMHwXpMDVL02rSdQpLln2IKRAA8g1qvQ0zvsSYpKj8s3A6H45BXxlByBIpraKh26IgGejS2mCG1gceN5D1Jc9JpyIOGQ5vFhCWRL11/I0g7p46tlkCxrBfLzRo4xCNvSTO72ZwnvFQwlnXImBXy/SRo5xOMktpY2LTZZxElDk912ZSKN/YV0uYaMsGZ4eBjnz0HCSFvUD2iAmWaV1BWkQecKTt/uP9CphRqV69mZlcGTPKHmPou+2bhNdBkjc7mQ0ZwlxZDbYStX+1P2gQvIbqQghn0BVOHe/GA0VZ1BNXhqrI958I+gBOWb06l1U+6NjDF6lBHjWbTLiUKiLJ3HplCJjVhrXHHLE9cxoPox9p9XC+Cuq9X7OGyAi6/3/pYItlDfL4ep/VdLLpCX/DvE5MI1/QuOmoVjcasFUK83xi2QBJyWlEOZr7usJJ6qqeTu8dSXn4jTN4D4supxyEbUiFQzNLkrLXULTvf3SeRuweWQFW8la2je4E90wMH6YbUV1uPaboRx6v/WuZa+45rk7fqw1OKvvxIXObobnyGliqBiauwjx2w8Vhwf0+5cYV8CXYOz+d5gnxNae8ouuRCUJ2ypfgMzt+lcN+w7X9d7BF5GFwOQTr6kAD98TwzIp39OximozeycgA7zaQsB9a0yuhkp9P9M3mzQSIsQhtTRcrkHGax05IA9CTKKb2CyRChHFUrcXjYcH/oOut5S3bJkUSA4HxCAIIs9rLrndTUJsTwIQ2W3ysNOx03Iuqm9IcQJr80UnEK/J9EfB+H0VQsBQya8Z1CiViNd+d9QG0hCL6xRGktXeDo0n7f39ybZpLMdQcnj7o8BEjWPljeXdalpIpt5RXP/GW/qIEPJuy7vXjNADgQstOUi950Piubz4y2OMWyppOSG81/aBd1ZohRI5yGGR9h5M/zfhwbVJ9Lfuj0Veb+cvjkX7cz2bDyvFDm+3FvPJ4FMvi9hllQVKKLD0+bIn8IaVosIIPwaWAjimqfyonGiQwPWKPQNOc9cJaGN39Ka882N9HSShxsEC2A7gfSePqhnYltuBgjAFhfrrpqvfvzcLix14iUMSsEXEanMjmvrsxgVxDnqIjuhHr55flWaR8uR349mSbr/0fk/uISvkOpBy40jVMSk7CHs/zezvk+usRyCkGQr6LQvP8fN9Z4C66CRqefocNpg/2X1LKtdqYyOq13YkDR6BpwWx8lpTtBi4lsdikXku7/889nTRwljEZ90FdqdsSVVM678C7brTodELgXpLUanjE/X5dy5wzAHmctbP36L446qumT6r2Ja4Z4x2Ad37uZmHd/Z8hm3UcJlxNZhNY09HKixgZ/yVdjM7kYGfVNzMu2aRsD9tqaViceUHbyIiYKFuAUdBIMk+b9PQHV9KWOnk6w3uzz7RBO+RLpE6AgA8Sd1K4FXXzS1NNAKvoonveFezxo9wmPnRyljpGzMsQUCDLD6X+N6lo80ca2GzNPRzUIM2d+GWbLw15UkcoRJ13YLiMjgJGKRT2NXuWwfOva5e6plSA7Uto99FFL0HSKE4Wj9aXs6nJKvG+Li1N3db2kOzQnq4Y92RS1Zq4pdYruvQXv+luHOl2Jq082oe/T/bPlPfa/YyX3L2xUIWAbpE6ZH/KMhPu24VKj6QIOX+fGB3KAZ54zoDoz9xw0gMtGj4O9VUpOTFw4iRkz+KiuMj12Xpvcc3k4Hqpy9G34cE3mftEfRUm4xqOhsh1brwO5AtGfrWivaSjYgv0bTY8Wh5pNsvfQKDFoywYWPOsSUrBWt4swEmb/R3qNCBNl6T7zm7VF9eWvIhVvUXSit9jTu8qxfZB/Wke7mm+hvMAPmDg4WB7DhmfDdFh8Ppg2WXpSbmk2VGdeFaP1OUaJD730cFPs5JksBeMU4XenZ81HaHcEx4Y4TxQuObiQvkrJ2iEIBDEWfezM6FZVw9Q+ar4hjx2Ftxy61rx2xGjmagy6vV+MTZzGDbg+FQ7vSscbU7JiAN7vW1MqOja5T5SG0qUmKRi+tcpNNbC9+ISbfN0nLsLnzr7uclOB/eY3+rcreXB9s0ZcuixJvEVuyziHdsrTMiuODv58Fvefm8CoH7W3dR2ORSWJousgkFFTQBGjVEfearnRhh2UachxUeHX4MTIUUE6TP+g7cAepm2ilvzPmYkuErglYTvDrrzCEn49W2Buf9k8JutKQJY606CKxCK1nPZRAAAA6AYAAG/Ocuzv9M4PKCKbfxxUGm6CFX2qjtmIge/snb9rH9I2JIgTZEsykZ0gb2Kici9DHO50NjZiLjIFO0P6xNAP3QZvU6X2Dbic2LCM75TS+k77buCC8wwpR32m0M4MIOWqIOa3fVqaiqa2OOoY8shp51TY0ZBfIz3cPKOBrkywPwd1A36rgxBUj27jizXXprzhPC9E5MuLFepWQwKDn/QuA+Dl4jQGLVMaiKuOkIJbbblNv0bOgTElYZ2RtAh6MIKtFeiu/bUT20GSap6sb1kts2HkEQuMX9AN3SnccMRpS5Z/UAraz5o8Tn6slc3Gscx5GApDIBUh4aGXamUQcPJNj1Ft+uPDWTyhDTvN16FP1pgby1jFf/+6Z5/flZVeDsjJHt1vKAGuPNcDS1hHdGYzx8SndkN2IFpuF943FiIAr+DUo4W79BIE+GBVgiQGaxS9a2tfRDsKFs/tsEDtSFjkj9OB2uSkFD0NyCbGalRI2nhheHdOZ2wCla74lwxmDc6I/bLiSYlNrrOgWFOPKVt7J9Iu/apWE0L72oOJOnei/ECZ9pLXsq0w83vT/HaJ8s0DZ3/Fkhrm5n0+HtNs8ZYVQjGMmmxDq7IWmjuCGarj9CQDjORj+ppkAYQoIjGg/RpO8R9m380368QqYuuH1tp+qqPtcYYZlHc/X5X3hLHnm28jYPwEgt4pTjm/hY7YIRWkBoY2hKFgqdwEAVsZy+03IK7xwmigWUfwKY57aVXKkW64jzl9Y1mEc7lc+tdPDmOjOMNPc3d8H/j11/7g4CbDtWLBfnrvHL6nhJaYxFBVAN8LMi0Q92GzxreoFFmUsQZdazgXAErbdPg78jJTm9v1pz33fqnvpe39KgKNuRjYETQdk/rJsPYWRhUQhl6knEC5cPiGyIKHMMLLdCPADHT74lHBgeXl9gYbF6Q0NICkw8mfgiPwwS841D3b+DAxbe1eeDMOJnzbY1ITvMAIcXHY1PVoP/1tu0uecMPE8RAEo7ucOLZerkZdBdp1v2dyayKFnILtxwk+XrDEIukfHrI2Nm6tkIwdn8Oo+csFqg8gDoR7+sE0UV+kmpl+qXovUB5PRWgCB8D7iePxfpEe3T+aOwv1BOqQmfWWNYrVCSjKc+Sa/6vO699WHl0bDOaoxV/6qgIc7JBBLOm8jV9d/yn2WVlSuNPdLhlrZbPPZdrFZ8anNnK8hbzrMBTh8YrQEcJn/GZT7b1uv2dz025BBguWMb7QOXulFez0wbI5KbiUkekbIR2K+U19w5OABaCp6NxTN0yv/yZaj2FUSVLoQ733rKcr7ZQtUORLLdmx7IUge8qwVk1cVGtJZGJT6ZC3ERlk7QWkgwl9Eu3UX+GWmekIb2+Fsa1SIH4y895+R8UDkYsSexTef1w+LaA9uyOsALo2OsBAAOwaELz3x1wYkgdSN0n/4/VOX9nfYlAda2bldmP64t5WGFasXvwR6kHSiEKsXIYk/e1lpELQUb9tfod8HChphHC+cLMb6ZlowzDx+8lZFeX82wodUgSVERBGEDMip2Aq75uCsN7Zmo/ija+MokzowqvNeKzD/C9cNDPIvwY4hjJT39rxOUzfmHVd3hRAeButbdsVL2zmcsJx5R6Q/bc9TkhQ1JTCBZ7AD6KCXzR28gUgX9vDZL1HQo+gU4Qby1tiW0wJH9tk8gouNZaVESS7/o3WYVyD5iScBU+aL04iLdGBnG7L1fxzT/TQEUYs7hZgSyVBDbMH2oKqOSHT8143rzI0rYdeQf7NuQniFwMBzEgw1SR0t2UWm8w+MVozPUxYDwU2m3A3/fY5eqvSa+5A3QM5OP9luEq/WWGsdOkoGTjjeQQklel6hRPN8pQP3uJmESB5KrdmE98D2RSu1Nu+8GrAwHrnOE7kum0xqm/a7TjgP1bXCtlyI9PyzG9cBzBGoO+8jChtmDkXg5N5LKRVk4pfy9p485fO+kPfyjUzumpu6Qq+C4omRuVsoqqYWusR70sg4tJZRzwNEQKixRKS+G+SqgTAUtZ88yiHo3ge7qgewHHmvbe65VbcOyMNZHXQGNelrsF2j1NPAbCLK7+Iji7mgLySWmBDl0QfoyBNHbV65GehewVxOcD+qB1VDMYO3Cd585305HSpFry+hJZBAWzCredolHvaODsmic0BaC6tsUS238wATkO08Jl1sa4GZydG/b9VxYcf0Nubr+KRpb8xYfYtSkeHfYGpu44XdhyNmgmPe6Wdmw0yFBXSQVH8GvvQZMHhBZqpBYg0jGxeAkGFz/NtJr9NyTaxaawju2Rn3GVlB2ucAXFOCQK+M5aeA49vdWcjIe9FLrMJSAedKiicunQGOQvwM0Guy9zKosteX5UMvENSAAAA2AYAAK09q/icdRU/quGxFOlfzDgcoVyCe/H+kVwYLv/gTZfISwqKf0aWD3XkM2TLSFdNYp1mc0fKOCLCcf1ucAH8RT+zdxvVzTCWx4h8VoJagqmSo4Fz2C7nmEmYtUURgguAs+dxGgrAGeSdy5g+LtxJbFR/+T04tzRGeUawSCODDR+wkdBXjDxOz12Ee/7iuSy4HpbOpEnMuayXUMe/O1maKJkG84AVsaGiLAti9EciTYHcotzr9ECybcqfqoJCgBdgeAlO+AP1AwV4F2PY/TymTJoHeiNST+vk+XPbV8qU605rgTRM+9/qICrWpEi7bcFmM+97VI3qNvCjzzkVEa36nnYPjukTY2g3tIMEH39h25p3t5VrSXuLDTxZcFxKNlQqmLa9FOoCKFho3o3183lYEp5Qk0CYu5ZNGOlRCMEjLzkSVirV/6q0MXK2X1l4SqqlNhg0undnwFnkbiC8EnAboDRbDnSGf/FIjRUcDVfnLSv62m8F2xFCZmt7yH7AfM0SXgPXKMa0T4IO8A0jPqPO1vhXtTjyrei3lX322T+sKXm0gBsuVN2Cqu3MCMDMG9PcJFd/z4sZRVmztb2FVFBA7U2YgrRbFZZax0A6EhjkJEhrptInt4BEF87vVpWzWCNcTQ+4l7msToX1Qfr/Ddi7GYLaNHBk5XCrwdEIRe1rcD+d6jwE2E51Xe3lH89/BbakxmLkepgAChn9QqIH+9Rj5dFgp/cg7bO6/J+zydDWODa0C9DS8MHnD6AeGzU0Sec9n+vk5krGwwOBmYha2BbwMl6UZeUc+zxbVuTAew1RZmpnNMmlgwNmFf68GPg+yWjFPZt8OwVvBfzKDKIsnVANu5ijD2bo8aERJE6OtfvLt1rOvg92JDMK/XrD+I37MHEySaGjNfGeuxDc26oEBLIOPYpAigk9+0txS30Q/Iaa+RwFc+mEgNH260dvHZr61p6U5fvBKnPX0n+HeZKW3G4zzuvbNjuaq86YeUbfmtNR4QM0h6vY6jiDOOp03AdW6xDKMLIEH6GXcDDcIigoRtKfbjeRPv2Aqq89E7ax/JIc8ZAdCALwnGtn4RywdOcR3WTuQDnXeTUkPIr+bijgDoxGZhsOHHi4CYP5t9cLy7R17yUWVK6BU8dyVho1pyR+tHkuERmHK77vkCxgNypmUrUQiUUJ0apBaX+sJ69vXne4SYgkWnisZr7IhFstsIOcW8KgW52lzMIGNVo39qNEOKsce/g7UHkELTN2eNL2fsdIc8dogXexv7f1uTSrFBtVKLz5FtU+F9qM2EweWA8HW/7T1wcrcwf3/qZ9ptdvumS4Ab9l/j6UWqV3mKYBl1fG2BVZ1Yu6BGabAIcb2CoQvGTfFSeE9kfR+8WESqLQy/lK3PPyKS9MbikGW7Wrlme2iHbl+QnbanFHvJJBi3mdL4kcWKfR8W5T3Alue9pAvEfCJzUeodiTK4oUr5cXx58YnpAMYeedsnr2ZZSqvPDvIHHPDSRZ7sjfRzKVbBxdztnHRikPAhejkNRXPGitE79LXCu3OseEWQ59Ydh4Kwlt9cIsUGDItkPMpMWbFEam2cgOy4tLNtxa3llh9Go934A2W7VhbZczVsQGpPskUxTl0wpmmphbHTjCcoaSR+NmOKDb6FmArK8dp8cTCzqX51UE6Mm/zMG3uAGCqthIt418vZl5fc8ep6j+Yc62BMvH3CPLhqIlhAPHQezUnZlATi3f4RHcZ2cSPiObayfda5SfXE4FqEETl0O2UTD9YT2KCR7gptGNzemBX+I1RC3wgUYqBuPGGmaaAX7/SCkVrED2P2WKHZoej+1yTFrS9EBg8AgRjdBV2X9IoF/d2JR6oxKVKTouSCg4aY0fegmMSz9bLuzhCkse4062xfHu4mI87TbVqDmv0cfAHGceblr+DI7NRV8lKzeMclTUssp4O3QV/SfxUYGXGad71phgMuTPnLLUzEnAHvqnHkw8p4vuDfqc6MHZo6jzwhGJi31NZcFiTEmM6lDNkmuywpD35iDNznMwoHj1wKhcShCF/E4YuALebgJLDauytBiVze2biDSsvInk4/a2M3pZ42MF99hUOJnJB+WOIMfGic4TNWrLtkNKr+UfxYA22j6tCtPDUlz0w2b7zjxTscY7kIjCb/YW2yyqYXbFfjHYaONnNCoBqnbICsEzVIp1d0l8PAd/cNojcsnl5hfiLHzVl2eXV+xUfjXAMqpKbo5aWuqHk9MrlNyaCGyhbIY1/Jw8DckZNAaJnA+QKsIUc4ooJLGsPoOnvvbhklg9A1JImj7LkMWz48crGnnJ8VUsv79/1ce3qMN2TL2EsgYyoXFLwSP+xQAAAAA=');
