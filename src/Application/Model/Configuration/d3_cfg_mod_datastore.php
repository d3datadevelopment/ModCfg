<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.2.1.0 SourceGuardian (11.07.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3F5210DB8AAQAAAAhAAAABKgAAACABAAAAAAAAAD/Xke+SJfnMm2l7VLsgTomF+x9Kit2HP7vZiD8uVtoTYWvOcYtCdijWdBUDyvOez2TNMtIpaHPjyiTQmY1Fp+ODydj0gmJiFQaNbk2CjbIZxh5ZW+eikWx2vrtqLmQj2m8x23FyZ7fEPZJTlv+H2NzefloimQT4Hj2uiQt2Ve3NI3PuaXh1grb16vnc/TMj4LmvHd0bVg6VXyATYIvppas7rcOOuoPfl6eCAAAALgGAADGek5vSsqx0pWgRD3k1l/YE9n9wHLJhhnE51qfA6Z2SrUqIdsFuGxlAStoY3efkrKobg4ButQIVMHRMgPl/oZcmus5/oBOpgdxPfZvlons24XPE149nj2b3tkppKtucI5RczYfWnr4+Zu8bIPuArBgGp/U5EOXEUmifwuEHkoTzak6ofVl5LZGrkpqsTlFO+/i21Q9Z7857VPQw3+ztQSxv9qQXifHPoFRVFQdtjgY3U31mfAWj4FKcS6aVwt3e29+kzuZN6WEM4Y/GD2GebeUPFViaLEh2YvQplQ/fgxbtOzxuUaUYBYxCr1dVhrpUoOE2xZd8tDb5tGTdN2OD4zH2GfTvBTBsxo1QQj6P5j2RqoTY+qJvL/LXG8ZXfy+JfCgb5qI6GzNo0dPtn4vraUPsrQi3y9gxF2rOCkPUAHu4Dq6TFlfa92kO0CW3xPAitM9hpIBxPeNeBH8TUEl11yBKItTLEBcWWT6MA1SCSyhZdntsYk83R9Tpl9A3xsnfW4ekrXfmI6FP24ScIfrIKIpQrIqYgUY0C4ux4toYlURZbfABJ7WwpvsKRSQFwOzuvPFleIeTt5PRYxGp6Df+sGXp+YG3gdqmAbAWqnrt/fzygyhFTSwQSAjt3H0TBf/QrKIid1clfllhI5fjOnRav6/au2lse8Lp7dyTIkh1GZv64TGGHtbyHvNNdkiGFOWfNWrh9f/68bvLjArHnw5Q3Cl+TcrFPkNqNxdpwNbf860eX/dI7o83mPq6ZdLWVlDF5qEC08gN7GoCSNKid3F2Z1xf/M385+22yHQRuwnhxAX2CT2xZUby0lP5Svf4aacR0Mj6+fspmygkkNCeAzdnKOMIFvYgON1tbnw0CRmp2b4bsqbbXDOHM/jhW8ShTERrFOG7Y5FXQfIu1S9TI4AnlGey9rhw81e3pX+jsfZZ0JuCGH8Qy1/Mixw4tDjLYklgQY2Q3ESBz2QQWPQqF2auYi+J0ToovjHkQlVRkrKTQHsqfQOPYvO102NELD0UDm4aiSh40EYP9TFyJC8Rp44tJ/Mfsf+kEEnv9zVOZnR++cXnZis18yKsnXUeFTkrhTiFKQSQBn/9jpPNVMs2V4dNWOGA/Hd4b4MwTTdHdlHlur4Y0vE7zhH9tTAXgjeKW9IXufLTw2G6yNMvjRjq/4OwZmuX4qi7fdTwlcsgMTzaBbI2xk73eq72M25FgZQljo1W5lGc2NrvoFTBMGDvWjUg8Ve50oOtx0Jdud+3pD2enZJXUPRE8Q9QwV93Nsqenze4hJu0/35Y/U7Xt2y1Dq+5MnqvD+b3/uhCAF4yhJdZI92dC3GMRhi/Tehyz7qlBAuxhZA7MLvDo3TBodNkEUvXfmunt2MVCS6vARSpk5mHSJEmwMeBQfVe0QTTBOMWjtn2hjlEnKrG0o8d0k2MrQ2V+bXF/108HG9k8bZC+k5P/VDsWGKWH9cKB1nio7CiM2HK3LcVD0O1Nt85NQY9XNLpVUZFI9/5TX69xIoz0GyUqq8+Ve8C+hOL5O+gXPzAmEMydyhz9dJJoixCLDnOT1CCFEPbx+mq/havKYbEyX6nhXWp7RChani/LJlx0sk9tjei1l/DUUpk+uGAiKlWSoe5Uib0dfYOqOD+LBQqSjyxbCBqF8DxgvFrzA6MAyvVfpuCIl9caKDfVt3Pkp2yoSLsPVFp7gKN9ur62z5Oa7ijb64KAe3+b7tE860bVN7lG3vdSTBOy4Nv2jszZ1+gBF4SeZ1NeHIzPGY0yh8mCjbBPF4CB9TXuIWPdF5mQ0dtPDNh8/5EqA2iyharcuHZ97LsdMNxy4RVO9Q6dKyVC6zeuQ770eLJd8NXSxYE4uqK+7/1pdEdS8QmEnnU/Qzlu7BTATewrGKf4Qsls59wcJvIc1FF585LzMjoRfk0sbkXj8+05Qcz50XWAKOPMYVNqO2F8/vvG9dOvInDB+HU4NNo6bJutLXj+vLvIhvMmFG0V21x1ZtJwfN298TsVwH4hVQDWA3uAw6+YCjhdSfgD9ai5lH/W1OXN+Nz3MHgIkIp60TuS21u8My4gJzJzQx1PhaArxfGLXjqIzZGk8rp/KfzDXzVGoQPrU35y1B4G5GqN6zEZbUxZhJG2XTlTJeRZ8Xh2AX82BtCnsB1i3uU0J2zSqnNxETzogDbj/V1cHWCj0NHQ4ITYQlQ2rW46JcVPnk1+VZVWMRgJiysULKFumbWoJGYIRkLtRU39fTG1vXpgiCXMowhyKV8NjNcDCsC2XRiNlZMbkL40ESvM7z7uUBu1tSBcDwF2KrV81AUQAAAMAGAAAf+b9s7drOZnQAdF6FgEUsYKZ4nqk1JstiFx1D0sw4TJ8h1+Vv+PWGM2tnf9mESQbvMW/wGsS28CPIuLDVZXzdVuACdDq4ZPFYp7utadAOVP/KoGPeohoEhdhE/QbIR1fWPuU091gMcaMqbsGPvHEU56uhoZIQNVXAqrqgai7a+jlQK/v+8K0fhjWCLzx9qxF/ex4mmkcg5dNIGfOkorgh7cf/4JOSOKdbv4yxL1YDxJMKuBg1P1HYUMU7Hzxd/y2idYvOGPdhJob9u0af6W3O6M0MGOA2mSU102ES2G7iIVsK6AjuQqTZ9chLIWUadaXSFgftnrAjhfZlw4t5SF4/JEx/RIWBmUoaI9G8cFOmIupmT9hp9lROrZyUn2k3GLvMte21jnZwCqn6E02DBpwyyoUC464KxdNFLMj/+U1U5INAj61c9P685ATxrclr/5J5pSGc+1gtUYEUOalu5yZ+ca8oOl+cos3GaOP7HM11K0w1b+xmC3whvdNVwIJYAjN7AIJYtuSb8tM1Nd7asGexdd3vd6t3/r6s1CyH07SbPuSic1S0kzzuKkn1HdvuS88r59+G7+vab84sl5a+lBFEpaffayq+DdHz15AX8/jfzg1wHcZ24xrW5DTpIY1EkEZo7z0jsIZNj4fjZBigAqAD/JXBjli7yg9VsBTz6dXj1S1AVQBqP5CLw2yACeNcQGd0FemN5Nbjew7WTVZyWvdnBYqeUipjQU21q7HBidR/4ICGx2nlq1rBUIlnQ4AyJjWNC6CA9xnrRWKUMKIIXLJL0rFRKqGe8doqWkhmwbSyb7HrusZDB3yRFDuTOjw/qQQcHZo9xlsMsOyM2MBU/kyopjPiHMtNC7XOPfjWY6vrV8VPN5rD+ja1AgGmXOzSSxRK4TWWFoJ9xiIVchFMMameSYzJubJ1dHfet4nDMZGNDUUmGqO03vYISElrEoWXHkx/VIIcLKHNDX4iOAteAgiKcHgL3evIRO/lcoALkNDsMzZIPI6YmqB0H0pc9jUtfA3/5p0Wb5YvC3oBzQko0wc69n1WqhlRXXnwVmwrtcTNV4fiVaJHDrdQpkgYBqx2u0PQPkI1PRHm27mupX0GayXrrfv0MMevDEFS9nPFx1P+PzOZsr56gjKIxMZexp4bQpbjzSQaWqz+HlT/2tx/gc34zxIWR+ALoJJyM5pIpesGXLPQsY6rti5d98nxihGuGYpzQo6/uJdxnM1NimMPupodpZ5RlBsEQLNVlNjd5Rh5v3ZGqn4FlZEsbaofH/xY/ndVeR8S7RPE3RuvzBOjwPPblnSgf6dVTy9vz6p6xa+cSJUyEzPJFcJsOjHozkb/UvNsaWS0dTAngce3QWiTqob4fFQMnSbGXQ9w/xlAX2pSrOb9rHxZkjuzaU/Rqam3t2zkWE60knI9JWFyH+qTplbBMr8i7UikcmnSVfq6cUivbYfkqUhFniv9F+J7T4jNhjK/0/iVdCXTDX66d6Un/4Bfl7AH4w7SA+2S0oNFMBZ8Wj0voCbVA4YVbdQaZr5MSp3an+ejDE3kRx/vCbfN7HF2O6ioIkJ/2klpBBzezj9JpKdQ/Af66+cia0FEUkr1bcL4HCMYjL8CjzkuDCXI62dnRSZLvNr6aatiSyi1WaxiDc0nqAEvA5bBi4Y313BaeiV0ihEAKn4TQW3nceIJIv0etyDGXlVqBoGQczx6HRLBQulDmK+nJ8cae+mpzJYhQpyV+LceI2KZAnUfBpS0wiO/fSZNc6o0kxWYpIALicThALbBNSBIwKofFEXcqf6PHlYWx/CnMhRKsPc304H1TV52v8wfM09tHAidN72zIv8IxkaC665TFqqgGSumNZoMVaLqaR/F8UyUPh/coh5yTQtCFzaQ0abde1ZUE685qF9nhEgGTndRXIbiwLGUzCXnagmxETfNiYrac/xZfBs2/thrcbPoSG47ATwpO2AK3UwhEPWLdHAmMZlw+vjjHlbc8cQn0OnRvhC6V2Hkca1/ppNuZGgOXQb5RQH0oxYiXGjqbpOtCSSGc5a/fM1/gLhU5z/U1PFX3Y3SymbQY8qvQ25ZjMOMUHySyf4N9HFGIX1wifyDLdIr1K3KNE+6lY/IuyawNQ1lRrpdiYn2o6cT7aw30f5d3hS21qaRDJUswXwtHFwjk2BDmtzEv/fE7BGf8cZPO41U3qyG5rXlekco7RUT+j1hCb3c4O8X4wGcEhk9n1WGsZBDQ3xumKcLCHu0yPsOdCixs9g6p6w1LuevQlHuj7Odl3fn0lyhfXJl9S1oZKb9OW+0yN+Sh43XB0fPfyhSAAAAuAYAAD3JBAZLzGklsHBTsCQ4z2EC1+zvKplo+UObF6Vkd6qJHQtxTlf3K/X66lRN72AsTP0mhoYx/te/f1TUY1NL6IXhjlFW6tUoJIlvB2411/fGgAQVHJBthzxHCKQEfp1WGpVGO2FBTfeOcwbY0/XMeul89zuyveJYfL4X2cKrHTnkYw72gl6rns45ACRIq/0SIskp9CKIXusScV8+hUkgCrJHnc6Isg4xM5IfbmIECYFakmWAgr1Ingp3sgU/pQ8Rnbv2KFDYQY8Uppimbm2X/q/8hebM0egCtAPDK2J4EVRQdUvYezvlNwqvpqnISMEOz0gMaYXzVySaAN/ODdriwbSKuS3gtW5K2tlqY34MONHHWKepZPwwylMofNkgkA/hgKem92qYz0Slg5m5nA5Q7LrDIsl0HmEX5HOyOzVoaqhqidQtMD5ddT/yRDiQgPr/vI4EcMZtjAl0puQwCW1TOhipQ1Ti7eZdN+7kUswerDPNOhTaV5XjSoDSsQQY9sqWQN6IG74e6PeJgoGSiuGLs92jEumMHBpkt/+RoDU7v/aVnP63TycE2w0wFOTyLwpYsgJSZRD2hTcOPcdxYzYVHnXNbsVWJ5WaGM3dkYfBrNfvc6zYUzb4zTtzD8C3/W5Z7qINodECxTJhR+dkWINz4RP/UHAwFBEW1MM3qfNegXg5OS8tePPGIAGHz6nthvRmsWRegkP13Y1DK4ZknV1QU/so3REm5pgV0PXFzTeK4erPvIUMT7mIaXOUwFcyzeiiq6wKEMr9n5uXGhKfvxAsYh8ED/48t+T3/i6dMbm+htPfvK2hsPnfCVfZqkRlKFD4Fac4W4UWkVENbFTH/bbNkogjT3HZj5PQYPsSlvwdnu2sYYsynZtLBtvY+8HekRsMqc7xaiOba22gyyJXQn58qJlWUaz+RYh7BgRanjLebcYysC8H60SI0oN5x6y35klSQ5+fcyKxtAKdSM/OKsnslYj4FZ2KE6JdLeAVjs2P+jUKuBseEboC85ppbyRux7MeHG9CvSzl5Iiip1lmzfXl8LcE0rFQ2SOAsaesHbUmHHLCLUPF0Ty2FNjigzDR5t1uXrhK1UaZ0J4gTRQEtQYdS2JqGkNzjmUztqUuQ/o2Q9Q/72+b4JoIlOXI6xXfxH/OgtomyKZG6gY+mmYRLNxfSWhsWAVqj8M6gMnbdb+6pauAG5ekalxmESrwrdKzamFSEaYSk40fCvRygqjtt9ti7ySN0NmAFkWs6dQJO0hqhzjC5CEfl6YZGQiPMG88q8iOInGkXZV+cp8nvmuUP9WeC2+Yt9IC7ps6XE3ftdmVJ69h+11Qo0/mA82l5c8q6QE4gaQsJVcdBKQH0KrjC9Hlge05eu3XbdMJqz5OA512vwI9YXvaePuAJNskWLRIBcoGapr0IG3X+F3uB/rDMamnBRpMQ43UgkRQzL9TV3xfp+An74SG5yzvTq3n+916FFtNQDER2iisOF4owU1Eqwf6f8LgTFnq6X+I62dc6tVXtOc+NK9Fu9FR5yCrEoh08shO0//R6R4edLw7aB18MUOPyioHr37fPd8eSyGvEyzi4OormUmlr7HWO39Gnx8NHRsth5RBnliBJjek3cW2L2sWgd8Mj434/DOQ8Qr3+8ws2NTKdqY/O0A4KGxOTUnt99u1LDs8UzmSNSZlR4gyXD+76tEnsxFOIHBbohveUtHWWSOrjA4edaKmKkeXjt+zYq/CQjx6aquPwOP/fWdibN0qItBnPuVT7GeX/Ici5/bfa3Q0HxyuJaax18J6S5rrLwYw5SsNoFVk7i5clprLqaEAgHk0GrjE3MdW4RfQK4OaewdkwipY3fO9qgFL9Bqd0CXCfMo9uGry+jl5kEMNModvJgXkAvVKuKX7dJoMhwHmyfASsR2FMbCxvAIMBOV9NB2PxQRsU0rjBCOPdLB484XaZgFJO+LPujdu42Jd1mspBTQ3wbnAW3TOLVsqoXWASRtMS/o8PS4czkXFlRpa44WcYTft8ezMx/oAIqhY7As/b1rElDxVDyVShmJsdRdSL/SSFzyqycKxhKFf1CPYC+oBzvA+r7tlrDlG3NFE74wC3bWutIGWMD4WvtdnqDVilsFfZNk/m1KC6XJ6z3eYL0OILwQEBE3GhlSYhVdwrVAUh0ElJVPAH9thd+2R73SvL+2Z4LmGNwX25cNo+YdT/BW0R+jt71e3QdBRCMfwOx3+JeqCYbHNm5Dm9ExSZTRpyaxKZSIK251sP8bXIlNOghjQFvFiUNok6I+P/TtiuY/fLfF9uiF3Yru59e0AAAAA');
