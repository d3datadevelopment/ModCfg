<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Modul-Connector @version 6.1.2.0 SourceGuardian (05.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3DD210E10AAQAAAAhAAAABKgAAACABAAAAAAAAAD/8Dq8WzyEotnp5Z7pyKz6H0ko0Wie/4Wv4tUwm0AzaSGOcHA4X6CLynHlFrBgdiiYUJy/RIfz4O3mNalu1T9xXAN/Q+LRQ8kAAY86up9WmqNBDLHvkgc+RXW4/Rg5MDDRSseT75qYOQ1m6Tjkd46nMoKoVabGbxpp3viUQKPBwBt4cDCDzOg4/RgnPV/lc/AsuE7OkQSDLRt2VS5eRkx3rSWYu6W2OPNICAAAAAAYAADjhkIV16Tt1UNhsA+hhWpCYHuZVtt5r8y/vFwtd+2qH1F6Qq4E2qyr3pubaz12fyLc5qYt05vCmH9FBrTr44JAaWT2vXpgZWflZoM2GmZFvS00Obgo1VpuiZDUOdFiTesGGw2hYRaw/GgBvrpPkUQ3jW0h/CAvVy4i/x61zBba0Prbu5Xvpnxj0XR3Z6fedQc6QOCIV0uAhCA3YZxyWJ7ATg/Nz42lbnJyXzwWBxdrm+cirsUIHIHB140vSU48jAhTpPlCyHpN1YS5vtvLSoi5RWv/vjASFCqt6H36DGGfFFzXcKn05qNu6MwDmjGnow4KfP74S9XA14YG89pGDnAvYi/ClRAHXbCHbUEdVKan41Rv8hRONfAGb/QRBHZq4eG3aJCclz6KaVnCGWVcRxvydSxpaPvu13vp/Hph+mITKECBrMKkCmQHYjBdWJI9/Rj0wQox9hIkXFRvNB3RTUwinV55H8laxKZg4UmUOLD+xzclrJ6Mm1bi2uwrY1omOMwG7szrbuctUyW9BFr3LL7iwVw5RcbNhVFpRYbObYhdWHLi7TDk+RtCVeGTdjuHAw2bORfmlgN1kFLCIsNK7yQZO0+1Z1B6h1hGoehwyJLlAdgZ+2ZKWfdUVloGhMMa5i4xdcrX3y66qrHRSU3eQOacyFt7d+rmVfZmY/XE1qGL9LO2MqDFKhumJcMTNGtxFHAwmUzZH6rRQOLGUWU3qpt1X6q/KH7u888xxSkVqkm/qEk2L2MxE1eqdoGeXTl2hGK01F9oFWDIsebN3CO74GMESlBUIXozCPNJxOHH2ajTJIjwjmut+ymbdE56S/BnpjengKQFMuskBKn4IRLqHNuoDbnZb41LTOg/QCpHCvCMQb26f3btDwyyAhFe9BMe+Y6Z3HphQZPtC9eS8XqcPf27bT4YuvzQcEKmwZk7gwnIKyjyqqnK6hfmTnQTWV1tWvv9qQsckEs0QlJm5bb2vGVstUfxCo00AJRzfFEVd8R32FdPc/S8707b6xJe2zBnvz8JFtdbufrFn+VvGr0I4LpaJHcOlonNC//gnGunW08IRFSCcA1XLqpH/C6l0eVV0aJ470oqaID5O2D9QWkTzYmSvGnBz1bxCyvdv9UexioYCOlU8tv7aBhg/QtdYvxMoAlT1Gdw2aW4Be9azu3H2IYoPJaXlnDdVF7XBxtkh2+/fZeClVhTkuIHZHbiPPfjeHQ6QI1qc6PkggDNc7pvUtmvzkZjMRYdZNwGcLuREaMzw8eiwWm2jF3YK00mETFGS622aZnWRQLqsozZESrLSVBbg/bGOf7HAbh02MfA78OZ6XtW5XNT77foDQjhB1AKw4vVqw3MpvUtrHUiN9jV9oDpV9GKBkXDsUKsZJ4AOrEjkrgTJUIi0gvM447EbtabNcENOgFYS5Y6JZFJq5qbXPvD4pnf1uFb1pOWT27wAwusZIBKzkn8OVlsKMEnTIlFKtvNfe5AxFAhO5Xa+K8eUqFg0iWmVs+zEH/yWIbRHRQynYXmKbgqOeJft5DfZVdiPeiMDLPAZQMScZbS9GbK4yIU4bP3rQNQVLODdyFDvb0hoVhW+CUGNu8aBDObooWqrHJ6MWCeTiw8uubUmbhyHqoVGCKqGKrns8YgznuK1EBgELLaLfVc7H9C+rh1SFy6BUBoaQT3gelscEzPuvC+xh65M+yneP42HBic6akFuzpHZvnr0z5fgIavJYwPxOFdcF7IVdxVd8DYZicxAOZG7bJNLaY8HBq/qs5OHVxbYCz+vnpCgPgjUiqzMt93aQ1bP5A8pXgY9NxeHR6wAQurAttxEPMo3CxTgraK2WUq0r7tCg9rA/PCbJCPIPV1gsSnEiwCYLhqGV6v2f+/eKOpDo+SI2ZG+0RgM+QHKGD9g85HaJ6rrOzM7RTeuUA5IzotKFtzcKnW3+iQNmmTvB/wsOFfdkFlHlKwcuZakZL2KKDNuJPVBwgjlThofWE0KyIXJvIhXC2USX02/zX5i6mn3NnywTsnBULE/nhIy4IY2FKcmhT1JpDWUVtSKmDw4KSK/8bF8wGZuXb72ro67LDxkLax+/e5nBGYI8/NDNX2O45jYp9BiUOMSLCjpv9rrMZWOspU0htP8NzP+03afkCzAqL951tGch4GPiKsrTwxutPGGbkLmmNpdsyU3ITMT5+s5gIYvU0/gYMqnkY/q8Eux4IQJceNEW41L7ZtmlfsdatRbkAaYIrcHtO4wh18vLRqjzVh9UsXdeFMDtN9YBvN+6BBJY57YbnC0mi5bTGcyt85oiledtsSfRGv2WhueA1Waw5GkSP+WOCxOj2qR4j+XANJ675WfHl/kjE6iPvqTJKb8FUlUk7BLTC+RPlY3P9SO1wXpYSodgIT4b1/ZjTBQeLtrKcu1AHq2cl5eFvqZbG8qd6XQfKFtKJtMneD6OYRkATu2a6s8d8DDU3G+5Qle7IuqB7ivQkEEVdgaQ4VeCyPV4tY4xBppltQVCK0JnvGwv5woI/scx6M+IhPhaH/GGJhm6SquI0cH7NhkxIyJxoz6UYvLsSQRaJgGr3uvLbvfe9YA21VQdCF0TFWeINvxtkTINiK1ofuc+XNzh5KV/yCXdPMj2Pz1rRtz2NaMFa9okLNWePK+WJvARyCUPcptd4jLBr2QrlqMWycgcaNSA4AV5Einu285ZtvYFzR7Mjf16kPnSPfKXUB6/kqVo64ZNrMVCZfjC+AxbspIMYENt0ye0ahm6OCUDd4otcfNmgzF3VY5vgJikrn6IlZ6VZRywx3/tOl45JmAjHJUnV/BEpVYWQWsGSA2lywGdpVmU6WrKgZiE9FSYVslRcFEtKUIQpaFejWwyWNhUOTryX/NyjpwF4oc04Jl7Xdoqe+ANM9uq0ct/liPOwuZnMujs+guAVEU5ws/SSbUXtGDo2x36M+O5wJEVtRuB+3m/AxjHcx0SgZKEmRl7Wl9dFucX1mc5PJlIR5wPuDo9tXFxgc9xFLRgSeTxD1Oi8ZeB2WH2eeohMszL8uPmI1VXBKg4Ms4W1r8XAxqDdlp0xezdXZKfQg4olTVgmabKjT+AbfKFN2+wLrFPHvczrF2F1UNtMe16qkqCOFtlS+bd9jNDVh/lLQJZGkO6To/bzd3vCN5/MlqjxbaqgWCfj1LUq2DpEuhQocbvN9QQAAdBXgY4DVasofkBsiyqyN3yLGtg1r0kPHsDI78sEt07SgtK8C8riNZOmruKgTYyp2g9wPGKK2MwSJHUD+V1XkGMZIrDbJ+UUToXWCH2T5RXmRmMBTZgYivBQ80lLRMnUy7nZW7TQBVRsiHhc3q3O2Ko8vEcqS9ZmLX6x4QLVwJhrT/JcFA7mL4xhLHyTyxC6l0c+lV8BO1rm6VoK7FNOyuxH73U9zr5hKxPCy+zqY50FN6uuL0pQHdozXdmd01VY8Au9Xly0mRFiwdtgMAor7PdvvZ1f09dZgO1FmBldIgjJ45bHeWvz0qLd2ePoKzFT7OpuHmm1RgCty2C/9rW5fAYpf1gN+SC4rEn7bNSqx76wrydza9ML60ek2KD4N1Uyee69Oa+ldiynDPLRqxT2kFr2UPOqxRf3RTNUeNyjslKpVhunt6KqGkommG1wIcQoLDM7h2mfGFS4y8j28rhd79MLukA5LpDgcQ215VB/XU2VVPtlJ9Kv4MQFxb/JjvuLfDh2Ot179PiHI1gAM8RWly2N1qbPL1FW2TkKvKq5eJgP8nyv8GjeJ00SVs4776ZYJy6XmXmSrtYDGCDp/6yudDbiPo+wVKjYoR3baEFxxtbEcZPpDZZTjkKr80St14ORoMGU0ytDTtQc2+1RHDh5IsDfuOAD89Dg1aPS2R8qphJ0iigRfAebjR93T0Lv5u4q/6B0sM4RPmgfA3Sro7U85gJqBUMAiq4MUQ1xDV1nFVSAvUt/IFFmoNfKnpz0j+Zp19AdIjNgKzC4oRoL247z5uzP938gIgM1hp/otDU0Ck0bSx7qjFpuRL+ocKDWP0zyyvcdOmgmCJ2Gw0g21hDXmCpOpvDdsf0hY62JyIdd5IHq/G1KtOMVBuVAkHffjdVSEkDzdNeD3jnWMCMbSx6WIMhbin0U7YbS6kZ4h1VSCokoLZV1cqjuyGV18Ip87GozV/oR3A91OPuXQdreOiDJRdEaWNfbVAhu6wdCPryh1l362wGUWVcNxy0t6FzI7Uq4Hxv1EkzDLcKL/u6h9mXK5ly2yzaG5b5h/Y/N1CiS2YQbWJWMAbtDracHbGWu+mp9IQyMbniaNrT3OozBQvpV5NHj+MqjKnu6j4/nDBvtHBjI+vHkngA/UeQ7zDZeDcG1bP9QVlJMJO4FbXKFWkYpmgPdqK5NPHwvlyZBn+GIf+qarTDrAueCbsOMFmF6bGf8RBjdDdnCjEbbrb/ndI5FhbWplwzFHt+afP4+K8HvElgi+O3vziINN3IoGnJAi8FD08G40ELOSyBzUUSw31rez3XFeceQyq49c0Hl2fpAzL30sUhYA7uOx0g4q9Jy7jgLGZ+18Cw9CRW4l1jktUW13EXYB0XGN5dQCCiheUokFI+bW3usaSeXEssqDj61kKMKmkv1bf+yqbhpUpjo1dThRcMSHctyYj2dJi7Ap9oVOUfWfi5iPLPjDn64KjHLAyzq4UAPqoBGBFdMqOaspL8k8CdPwSJ4ui4V7tP+MRktMyADnyAldnvhT4s51PP9GpqUd9BD1IhdCdHYnhNVqTP18m+GJvMTTAMDNi93UGx4gb6hmY6Xpfoi6dBkw8cvXiruirEKGXKSK1/8h4wtEdwtFkgSYLkASS65JIOgVGY4BStlqb5aXJAMLKD5drUDDVJ0RdwcNb8rZi9lajVifFg02u87KNTEQn8dng8JkAqMJ5XjeZzoxZ18prpvoFU4rkgpvaGfmzKbK81rH8PDYlno1L2PP4Zikq07NJaCGYPuFqLdagRidKrkNimdqBq9UqGtyrV8txAvwOrfkz49B4XAyUycR2fst8vPeGn9eBsulb3GCqQqwzxijPLD943F8EkZEZSK0Bu2Jt9GQC6HPweONYCEhGVHdXa3krKbbzCPnGRNOnR79VXuzql9rH6uBzFTYFl9+R3/6NTd6E+6BXsHZqCfz65nXoH8tfaKhYcWNjJBDKsHRjNYfcriqCZEFpJPA3koHhVM0BVu7U5rP30KDWrwKMvOPzYOdQ3wa3A6iq3tkhzkdvCzhfIxBrPc8dbqzgkCVBs7M7hiv0Pwx1/IBndJkU6nLsbtY0iGNBP76V5H1WPOPGhmaUqKgPVURAFDh9f8+uZtaGQOXYqJBhaGhCmXl5sHekrGbhKNeyAiO4KrjfZZqNb/Xu+NIj2u5rlBKyr6Ped28lS7GW5+9x0GHAiTXVY4R7bPbIal/7tA2EvUl1r1z2ChDK+OYB5cuEu+g96g2rGHZZd6fgMpDta0sauBX2gCz2+9KkBRaZ1htLH/huxo5lQbi3NFwSPwJtqlmzGtbcb6RTonsnlx9y0HK09cADQGjYslmCvzyyrNG/vhIpdFtnWx2I+StuQxrs6RFs5y/mR8QvRTXDNDvDmxxOadYukqeNew5uBYCWPJi1AGmXgnQ8PDJv8diaZFyLb2wNVP6PfRcwxSIE9HnBLC07F8TQ1nQmr/ILsfg8Mutwz1M+B1ye9TpRN2oBjlcfsOM8w8p7wU7RNWvNyS8AbwhY/MEz5Dpi6mYKoQuaLc2ihq8EG/HJj/6MKgXdYNzygcGKNwjz1f6m2sj3x9Ng1giUxKrHBbg8MSRtUHm5NxRky77EJGp69tRovq/sNPlne8453DbyWEnk3A//olMc+v3+ZajU6kvQWwYrHWQx2NbSD2SU9sffaJNCz0oWY/tqxiqnLXrZM5zKPkMG6FefOlp3fvpyWt9GFl71QM4yqY0PluIWCz9de9Xz3TUqV8fmmqhfWeBEG0zkKVU/GKKS0JFWkApkS3dJKIR5+gvMbF1svjbuKJpAhcInKEDjEygKFYm3DN0Ic2Yt0EQPhod4F7+3VIA/JSxH0TJLLimU87RX4irSJlrmktL2hnHfTMFB3tVFQ0sTUt8pntkB+1DnpY68Ee7mqa/KEy0I9TzsYSsxFpV797bAy4a+R3JPnsgjm1h9i/n8FFo6NcRHWG9wD7DsIam0kaxe2O6q5ObNt40Vkjb5MhunM+B/H+fff9yobrE96WrU8/LYfWTwGtgGZdv97ph1/Jjt6kTK86nQxBud4Tw2nmcLHcyBGZbMVKe1KK2t9TQFTDThY396IeUJ3yil6uCmZ/76dq6AKErkqLqI12LpftXYgCKx5P01kkXaXKRJENC8ctrCC/Hi7pJVlWQZXRLkpCJYjbt/vK0Lx3DF6lEL6OhSEPZ9K8MktzmohzQQzFg0UMpx0kjN5efCY0xzpI3KiHRcHekQoxHfZZApqPV3dH+3E4HiHfbiV5Emgtc78VAw3RnuEJ4G+fbXK6Z/WZcFzaB20FvxA00uZf1oc8eCb6ruStXDIE1u6CTp9fielCgqr5+yz8EhWURd69LD2tG1GjeDxsWUSQE3rEgJ1fKz0u0g+7PnnIEPyiHERDn776izvCDyJq+8TYl2abwa9j8d0zjT7Dv97hinrfBuO5IH0vfuMnUPR/5Kfr1vVs5zqku5977Lr6zlSADBYjWEeMpruVVMrEq6vjrbbNwsoK3eodfRTTdbEUgztp46iDBJp61CmAZJJD/SbTvzMZyWelDY/wR7jpYgn8o66JBq8838SvLQjQBmR0k4Mi2bhWLCsfxrD84vlneA8jYOAObXaRz2U8ePaasHAwxgk0IJKLJIdGbDmnTBMUfGQAi5k9UVRWAYGoBPqZ10znOyFPB+v6OeiWgGV854TyBZ6t28D82QcR4HVTm2MrB5HgFvtVH7x2TENMzXDxt2EaFKCuIjWxX2tv0bout5xw+JnlIJNmR6viGvJEMrJEVsRAj7mzHTUnvYeiYnp3OzTaZmECs1sO/+9zfXtbereH910laZ2FZoPgfOHSh3rGfpxjTWxhqm3RUfur6sYXYcGFi9OFTefjvglomJD/tEczWk/uFXH7LrpBQiXmqVRdNUjciR/sSnEm1pP5qymDYmXNfOJZnMzV1iS3cL/Y1FeB5qQ4Ym4fYRb36X1vYP9V4Sn23K7ojs2xgyka8C2qYWn52T61suaymbWFpEOWlCeTLK/a7X72FeayvKqU8h/612/2K8YgYSeU7n2TNdRbjJn4Mju0cUIxLiY1Is/GdhGNxdq8yE8c/yJqg5RxUGX18htIpELYrSpgcFaZxaiZQ4zcRbVBeyUSWh4IiYr5BLp4Bo5oyqcq+vTp+Vv63OPl4Sge+QA3BWn07S1/Kib0CUPd4R3xW4cG9yBDu3WgXROfiYBtzt5raINX2N+oCHNAiTnuxmrlraXBSfwzdO5nRqiNphFYxtEVzb1gqDRAz+xZjrHJ1YWkKhiBhJiVycRKzjawpV3/PXLkFIT2DvL0tvuN2z943tsA6T6sFMbgdfyRNSr+65VQJJ5VsxWO2O+OSYUlYlCy82Co1jIOIo68qRt2DGh6tXNi6RvSwSS/PLUL/W4NKmQwM7DCgVZB4Ja0QJY9zyfqnKC/SK+99+B7dflAdcVyOkwE6Xj81pYdMfDoZXmxm2OOPZu/2Yk/n23bfmIMjM9/gXQTYvJ63M/Q6nNEcfjDpDjnFWRRMEN+8mINcQrOb2l6rYVawAa7XW5Bypg9hpvfOzGhlmIJjy3Rq1Ei07Me5x+uFKqYXyowMXJQHGkHbYk18PRyB2lxKgt/lV/6gPIcr4RqD+/GFfHshMXguq1nduqmbPSmpIFhcY14OZMPTvJ1fZyHzDlx1MbPMEFy7XHwYwhYYpA4Mdz5BkIcOjZLB56fKCTm/Eo05jzlojWoaRUdEJ31ZHqjXp1Nhp9ZCquqhgYC8Zdw2R27ubrI9ObDKTDR1mUC+uF4WX5GHTeb3N+6HaaiW0rskQMBumQ69b+SmZBoOi2Is2M7xZ3wVVBxt8uPUefAYeMbgYBZIGvTqAkxEhUcDvAzH1LE++2KHs+gbRlncw3lesSq8BJ3HqO+cNgnC3JCAiyAhrwG3vQb5e5lR8SD3S+UKvLPBVg71GemM19mTQxFi57xDRpqY1tSSsaOlbjZgz9iKac/s1EYI0fR3oCV6YXOp9t0/Gff9cErmykG6jqBD404lZ0/N8CZa/MLVER4Qzk4cQlhRAAAA8BcAAEKix+HpXYsAMWZ5E2+USV5ifqpNF5QoTw72f60lzzzvuJNNFjABY3R+lVqDVK2YdspBzI2kzoupI6/7b9sTO5D86Yo0pFRqxEyhS0CWBLkqTUABgKBEk/jqfVtSTCr3lGM+KTSmSUKXkuZz0pMT/kQXx6CPPyJrFzl9qsu5LNvHuHYhWh13NNotkwpGnQBbYUK8aOdF0DUf46fqg/jEALZnG0wLMf9Ru/sCxVFbxl2BUqhLI4AJXndmzlR+Ro8JUihuEt4vXOkbLdW7iIizZ77a5NyFX/jV9kdv/svFRGvg6gVOjivWLMHhdmYTBVxf+XFOGiAOVuIigoetxCa9+pV0b5wl1GZCzQOA+4SLy1qMnyLGaxSraWp/JJTZeSjVI7UIeCAWghgGYnjtulGoHJPTj+UKecjFEptCVe43k3Sr2GBgrQwQhoDslWH5A4qBoseaF/7GcUixpRxfJ7oKAj6OYxiPLiS7qYSUn32PxsdfGyGse+06K5XNlPl0iVrHOO8Q0VbghqYYCMfu2e52aHB2Z2/2rXe/sYh+ysJy4enmNvBeaHNp5/r5H+2CgluF5mmcdsl8Th6glhj8hq7uUrcGrtUblnAMo5sKr4RwUE/ESuBX7xm1lusXhjzDTxc/sVjBJnOfYGCrhclS0C/m8CtmJ1GneX5DKNOWqA5EbgSOQUDcWYLFN43y6N0hv079PHDlDV+r/ytjb9RSs3U/U4ym+5iLo8kllS4w+bb/ztQNy8rYU72BAA331Y0SEBj+2XU9UYtPY5XLQPN6Q2LYSH9N7WPRglIx27o9hxzMYhShtpmd451xTnPG48V/ajnZGcdedmVpndMRqgbv9Oq5HBVl77+VGPW20ZtZJ9lIgRLCG2MGF+CS9I2QMAEMtitSemUhaB2/KiLTguQf6BxgSzJxIbmEXQQukiG5MKUNeMVyvNFi7+YM/va1QyUXJv2iS7kFaZJiKFUJhbp8KxYOy6c0b961qSo4ySIY6IOrIBdbFefi5X5cN1LbD5x4c3vWhdlLi8pk3kihc4twfFmdL8vynlWZ4FgXez7gx4pcXB2hjfwrH2WSAukAawlmqQigVi/QyDRfG9YjYrCe9M8EOw/s2syGWD2+n78AOP53+BeNC1sB1jAnL/IOCinz7aNVPlZe9Isw7Vc5OczTSEe/AbnDxaxv+OGdWrKotJkyy73v5+jRVXu60yJ4ciOM7qJzfCDhjSdOtx6Hy86+z6jcm94hfxOsNHLdKDyDU7h48Az4rCEC6JgBEG4VClS/Fpuo6z1r2AqrOshdDVO9j3VScznk7k2AVgePADqBBnYuYLKaQjMY1Gqsq/sq0hEf/Bbdn+XMlhfVvcMg4FXukc0S9lKeaPQCfTQixS258653+6IvB2Ai4c9S7G1AfttXYJvv8AkIMzZPWWOOzNDD2pd0HevF5s7fufZeR73H+SnqrG/FDwKFOoqodwD/lhQqPWIVOxIjeAPlgLzzYudJKAIF19Pi1dPanGY3S3qhhTXgHiMnlK76E/bi0HkM5v2s9ZgU6RrMVvbEHeNR0Sr9rDtw2h+GmXUtbo27laj3IgL++GG+knFi9em04VArAEakwjLPdBZQPT06sd4hXq5BVGE6hU6yysdSlJ693lAwBZ9/mInCnzpe/qhgw4/PCZyZ/JgEfTfXVsJvfZtAeSm7X6yYosLWQCB0LSu1abKgCDTaApEW9M9pdCaoxok1EWZGseCD2z/wwSg3l3hLUsMkzbJntawbBwtik+QE9oy9neOOO7Qu1d6V1jym+kJyFZ0ebeV7mseuiGq3CXjjSBdbVRzdW+OVaJa7ag7N/9j83MZzMZSdYt8FJ4ik7cp6xl7SSO42mbzUbgEjTBZUXVywKGjzHdMThd4Uf6OOY2q9oKEeNtJmUjlZUrkQhK0ftVolIwKWxMD55oRzuJfN9f5SiWewPcluwboIG7E5+9oMhBHeSqwXwGAVA1FehgQ+0LR5gjus2WWR473+QE5OJJPMIoq7zq44NWrcTXYOMdY0kkXnOLcL1AeX5Avz697d5FsGT0qM6Xu4MbIWJmlwljk/BthocBkw7q6xh9ND/MtXr//B9DfWodOsIS68oem/a5qMijanq8tP9czG55faZ7rrQNwBLyPOQgPEYK1c4X/xIbb8x0QTNE9zLy9UqGyTLdaJ2zo+a6Nb0bcONps7mPLhOAl0pT8oLxmtlErqyUJwTlImLm3ji89lVzHa7qleF8QykW9sLxsc9fDrVl4naTuoP4vNSrJy+qd9XqmQYrnd4Mv5m3OEJHmLOEJDOMf788qwSCg6PZ08MlNWojeLEN7G4zBgq0qFc0db64/Z5aMkWgCBI/dlKGsN/LHWn7wVPrv9sfkcte/ZI5kQsxxfI8Z2N2pPUF7ZPT+tozW+RMWiQQf6rBOJApCQQ44wPD7rp7LWKPbnk8IsXA9Bz5Setb2QayD6hcD465Yu7Hrd0pb+udaaEQn9sbIJJLQhb/4yw7FnNK/kbLPF9orcq9Zd5SZN0Xw2MhN5N4Zw+YGwngg6cZz62kQqcA4tbJEG3SZ0dKpQg7IVZo0UhY4VPN9vF+riD7GqKAo5Mc9r254G9iMfth5KUbHIYqf6FtNfD+SGU2E4l7YL/FXfqUq3qA1JLNhibBieQrFdyn3T3yh0s9q9fGJBFrDGAQei+oTxGdMQhR53N8KPXKtsRKLU/4z6ce1zeOWi89xuISzuQYiFDkYKfJkvoSDdvNi3ad9YPE8eTaW9J4Hk34uxattjnKh7fo7n0MvVp5/Hzb157h71hFGut+ELVty253G512eU8F2KaLAwhJiO4qHplu+OWrPT24yqKQfcwcSNZH1exNJMgqJ33QvrIg6jUev5wKsHrqOJ8mdebLKwLZvEWMfFnh8W0XVBsq1tmIXhJ4NSFhl8hLOKCPnBqMq/OSp7KN9lJmpJw/Jj1NzUknVGD1fGtzxfw99Es1ci5mvFC1KygCVe2szW/srScXyWQX3Yh9VpBY0418Ue5LDKOTpDTq2BhH/3hV23ZcneB1VYGsmI35Gb70+f6IWd7k/zYIu2fyTXPTMCLbbNHKjrFH/Q46v5hWxNXLE+5+jRQ7rAIwucNYNf9TKRBICjfP9aWGR1uvIjfLekmtHCKWqSLsoOf2/l4IOzQUbPjiSRpZYpyMtgQ72gjYgJpiCHeaenaZ2jxNt1jy4bUY6pBngCcAN6Wg4hDTEhcPZewkamOz1j3A4iLb6Mlz224noIdvUSERQ1wdmuTws8bWdqEfLNrfMgs+Hu61sZiWve5+UhQt0XK/F8EDnhq7Q3kATxJ4uXP8t47nLoRZgwqj6Hn2wj9XKghqBp0u4IWD0yykaEvEenq5IjuHq7QOgy14ykkf8JlzG7ATAsi5V+xZvrTS9g2f7BSz4tdeEpNaA6FtP3kOcuiwfSAkoU0ssaE7eFQJ/YQm2hdSMMgKn3PJEC+LTiTAOmKj8pOqFQM5FplBiHn370Xmr8Rlesz7gzQ7m66V59Sjbd9ej5/2wsibHAIzQrm1vxOGx27TPVMAG5xMVYBbJWxrrp8XPisRThRvb/6qVo6LixvKGJihdaZBYx+VdagvR65Pu8xfBrB6p+uyKuHbqLaU8SokzK6qfA/vDzcOa76Kd65+7RoP12/g1jLvoWQeX+7/OIBLBAwMzhcuEBBf/KLt8l9HOlSub75dQGcWYWHxbpWSIcr6DfndAcr6Qs1hgmKGmzVYHflL3izrHgYZBT7fhLNCyqtV3uPXxYemzkyMXa/IejRuCdCpUmSG+tZ12fK2EV57B3uHOG8YQD5huacBxeAo1ZR2tWPSlY8bp3Fnrwc46fl2oWTg9JZl13u90n9FCT2UBqi2ptpA/OGg7rafZKNqrimw0z+G8upSFiQP9Yf7VXQpj03yHG4NTaMFVezwh9Z02Qk4FDyJetB9AFjXnrBS/CwdsJsHRW+1pfP+4EFcDiPmptdWh2Wv2WWTDrSYd3b0GfWd2TutXZsiXpdXEwJQXG7Q8EEs/quA0O8KYJ+46X9Ca25vjvwfrwzcp9kv1Y07skWlGJd/TEvVoAcJ/oFRo6341igAHlP9ad4QLHhP817v3Z1/DzQGR8MxgxCQ1Zlin5HWniHsxrrylg5S7htQDYVZyrzVzspHfMdnmAJp5v/JXpUslMIMNw8H/PtTlkgMjo9tOtK+Lc0qWYUE7Wj+AIgP3zba0EBvnCeeBPD04Jiad+WA+9a4sNX8r5pYCBVGsLNddMewmv6S/33X6gbjFyLkOLchqqF7vKezyEujYI0sTwF8qjctvnTun/6xrHBhkVCa2e6ZmoUH2U8BYKVnbw3pX238LnrcpC7vIyBrZj1W5bLnYeSoiPj3EqMlCVE8aoSlOzJ9fKh2CC77Yo72gTcD0zQvh82lK/qPwDpnl2CzBXlmdfTJAyyi6R8mtbfrUHoTYxkiY0iX60Q4rWEEj60wZ2XjLRsVErmMPjZnOr3VdgivWbJeWgGqGNKcF3sUTSkjv2fs2KU5B5Xo6AF8JUKh3wHpoaVxNx/ZXW5V+Kvxq+gz0wVHMPtEBwLdzFminiBt25OvPoaybB3uXrcmb7e/Pjq8WXglWkraHNRJ0BZzoq7jtREkkV+MS0MSEXWsjSje6DeT9j/fk4FwQpsI4RIqrpWaTRg+KTAShRhTTrzP/9xgAjZDZ/59B52A8Pn+UBoJBIHz1bsUAV/nqDlvsdGcjaBDBQW42Lv06Ud8LtObuhNUhAaOMgjXX2OR/SlqEx8l9qaNVyfevhEYMAJTYkQ8AXNDIhedt/GnrJyfZ6H6CSioWfoIWhHuaY7ascItMNr2jbUUAcKgC2zeDpY6MWzC+YGhrS/mI5+ceKxrRbKNmdvT7Am3EsYVgfWqhxL+VrYaGSJQiFV8nksQ8slS5Z1SYn4SAUj+V1/aIn+rVtV3rnJ5VT9b7juC3R523Owb0Pew49YbIB89bLl2QGPqeq7bJo8MgJudh9ene11fPppOKq29Wix2rO32hSDs9LZpx5yFyHhF5FqW7bFOiUjKcwfAIENiy4UVcCdT0GNqpLQa2lq35J7GnH2kU/O5shWPYRdgcLRoaAkgM+2t4lRrtIUdL5YfIwsxpdPVL2r6vERUtYB/dkRtn+dPz6KiN9bZzoDpyFltSkYfLlqH4EtUhzKPo+YcETiReyN8A3u4D8mWqRJWyKmQWlYTJjoDOiCWKVa0+e7doPbomSBnXj5QNP7fKuM8n5yS5AmBxRuS5AsTEabw2kw6rMbtJJiASAwreq18fCwhNRoHa3gWvVfRfGNAXlFWD5yKd9ZaFEtA/uFFpRrqKkcty5GLINvaIC+TxDN7kpGlDsLy/qHqJbeCqaq3bu8muheuBkRBQehNu0zjanHPWxx1tJiGv210QrGmDSjiFlsQESDXX0tCIr2UBgzjErvDTpeQu4m6rWl7YJ4ZUD6n3ki0rTo1Ewe0uyF0KdOIHS2Zto1HrhQOJ3Ic3ssf74BQXO3z/qKMwWueb885xmJrtdwEZVdr3qdEPbTTTweO0xMEvUGpPwKNXxmoa5NQlgj+gQbfv8lZYxDPg1t7GzkiHeXpk4/VFpO2s6+fihc/UhiuAKEUOvWPeSmN9emP5CFpHjNCHRpPXiLa9qASW68Ht1FXZbESYx9Md4ELNi92PdmD/so4hPX/aiDEU9t7eeoM5BjuzppGaHvz8b4fcXu0T/8WJq0zO08+3eNbb1ksxf5Mkss7Rtop3vZCdqbgUAAMzOmauc2KEgj5Mt7VEY8SeTRueEJZhAEHsuH1Pd6zlL5SuHFIVHDWsoliAS2bf3+fD7YRQhDfHf4EYqAxdD92b3eiAH/87MrB3G5JCtSLoGzy0ZT+CV/aynWRR44cVLKrOFtkY+0lycw9UIIFOy0ND5l2eNTu+L5l/p0szTyk++Yi93foatxhQcSerA2AnE7zpSvnAoWHBMEsC5FKXin0sfQX53e12NXNQUxUoFUvh1moM5+Dj7OChd5XzrQj4xl2IVvFXDAhKOSjqGQCG7qyIjlgKqUhtuacIfMRQoJ48uDvHet6DcjxeuHpEt4iXI+8XLZwCiGOF5l6uxy5nEkuLT3CDS6ok0KDyXbe0kgLnWEF25jMufzLX91ybkThqFfD0SdborGYnGIuCnD98rK2dd4YF/8G1HbhBjEU6+IfCi1Av+qlFTyqsmHEAsrPpMUrS4mMNCn90GjsJ6HFperoMAvLQKmmJic3U+kX4vBIEGJcuvsjcX0H+ASglIGoufdRFjoINDCVxXwAJODooeXhnxlEr43xgsVDDKHVm6dgL+6mXJGQuvCFGrzPA/PKj5cQWZqL/i3dmzRT3oiwt+BtVhs+Dtv9ROTGg8QDP/TFDsmm6nAuweUTP+yjHjxPw+TclzmxEd2096zPBXUHYCK41fGi874zAEpRgrnbgCEYK/A7jptsbdQNGvrt6XH442IeG1FFSB8grYGpDWteWfDewTmo6FIIYyahT8GRd5wgXWh1CKJagrkKUQwWr61ZkhM9Vufxcn2dM7lijs6B0Ak1NJL0Di9eCxZGP5cQF+5uXo0zisARYzcnlBwIC67wvVVeL4aXTub8gBa3D3JQ5cCBOTkvAPPL6wN3jgyARShVGQ1sDsm852RaDh1tT/TmEUzYGRF/y6dMxHzD+bJGlvTZf7sWBt7mq/pqtTlKHx/APKoxqKAPZVfHLSE/9VHwVioY/xEsQZx2oTnXpYMJhmmkcE3ATFiLST68ZtLRgBz7f+Rx24o4JbIYmNOPy+gXtWg4iMo1FGWwz5ph4pR6C7mbXinmvgw/bWIKFPBWqazzFjV+Vu7XweM0ZkleRv8ejMcP4aOnnTbdxHX7bASrIUabNB+t+nQzQUVt9wWFwkHNf7Yn7GTO/6G1UncFHLyuOoXmZvqrnItKmnACpCPZrKgMbiBpOlohye7CQvn2CiKFhuE4rKwrnxu9+u2O8Vkvs0hLgiCN+lNDViWiqo5lOBJ+nivsGiYArsl5YhjvLVxQk+8ozFEtAyho7FLaV/tqP0ph3YBCMrNVCWUEdT8ZB25HbU83+el3Fl/5t0PMVIhv/6B/witwtJVsL5oa3/AqmitSH0uO5oWQdlbH07rYvwIb3HYzGtUv8UhUZ2rNUVFOk/cqhpiQZ1ZQesGLc9vik+a0kK0ZYia5exQdyy3b7mnINthVIhNt6PAeN7G9D3CK2bXPeXpt9RvSLecgx3h8D9SLwY7KZyASrwz1nMbWZAzt/AXgstJ98jHNde3n88Khx4tjPq6WX2bMdAOdr441t0nA8rByjwhdCgTxWVQBbGceUkaRo9WhIbf+ppjfZIrdjVjAKHvGxcBPVyW1gKzZ5EK9So9dUz8Kj/pLU1JxY0L+trMjBj0jGH84SHe0ic9jUv8O41/QtQfHqcg+RqPqq/mojZ12J9UIDRHpHkj2fJR3DdOvUSZNs2Ofmkcn/lu6sHlCJYgpebTDrhUxn3CKmfsELctWUHBKODszPkA2/l4MCPKvX1QOnqMpezR/e6zI6mIhHVIafQXxcuvZkcROx7FchosBAmr/Yy9RZ2cEWQ6nZQdJOUys5g6kzom3WublCxet2BJ9PsI4buY1Tr2ZYbhKWLpFUhDWcKy52fdyI+JqB+Gp7SGPf6He64+aeKqZTNAJEXKEIKxscSNQWvreyp/zlqRPe8nozfTiM4Te6AepSLtVNMaVzJ6gMx1SE7A+EZb1oEMi7gZmJyTjUOrrKYRO9u/dekcf9wMTfO1aHo1o8oo57wnj4bEf3Y68X7y0dRrVFV+TczUAv7ONNjSslLppyp5IDo9IyzcL/lEA3cmmeLqOVy+A7oI9CPlZzaV7y4hlDRagWF/yhPa2c2myDrO8t3yKA6qlGjM0amvHPLyaE5Tf7+MmWpqtdk0zEG9rsj6Ceu/VyL9v8UEwzh4J+wQO2i7pgSme4t6ZJlIxVYpAvrxUxAJYkzuUjUKSho0xm+JS/qC7EZwBEny0mVExZ3mXDMUqpzwwpAEEaK2IF9tOA/RVp4HUlOwWKXi7Dh5iteBd9hnEEJzbC377lr32Ld1yEIExF08VCIA6AiIizXlxWMbtrpc4zIqv9KSfH+4vovyAcdOQNvz2rgQD06ejs5nnbk36QePJdixKF/cJblm0M59rvjO3CLJFHLlD2tjESsXfR2yhZNqhz5icTG/6cXThwJx8xCUgAAANgXAAAXGBPucp71syFc8UQ7UzO5T0zV20NnRYD0WcKi4j5hahMB3R6kGEzeVHr7MNMIu2yGdvnnL7jokc/Kow3xYK/b9KglwSe+oOECM1tVHaPjwK8WAeOoLM6tpZaGWmECuFuMLphU821x2HtPCr8NwVKe3PvBzpuF07i1o/oktvU34+icGaNI+HlFZKraKRx+7RDOwjEZvJZrRiJib7bWX+gy/T5AkQws6Tv7ST7sYVGnzvNEto9I5qd8/x9IOhtNQqID4hZv0ewcgFhAEWPdS6cCzAqrOEEvQA0b5RXg4GAmLHaXva7Xc27kkBHM+L3wFj8aMsS7x2upE18Xil3tJPyAAs+A+wGK3PAJOgfyl9TguCJqRZbSybb7gdBs00oofJYcpehf9N5TxX2lnShnj5H4xrT/ngykTOagClLwCZLMqAfScQcNW1lcy/wFBSgtjMRnM9oOa0nvgWUxBFY2h1TNf2b7MFX8DTPu+5suZNqlI1SmJcqWmD2tUykwlV2dw+doh9q3G1htBpg4cysqL304SRPC/ipDXizIFznZ0iQXn3AEorQFdB1iS3mmFGruOsv5yQ2rurCY2cuwWV334EMxfzf4FKrB5nP/baslr5rMASxlVt04bSJYhjct4CtU4zGhet+4jc5xHYirXghvfS7gdg/Z3+clLKQEn61darS1etGRhJJEmH7ijKD0tEo9Vr0DF7frosq0+xmXJxhlCsmvym+WMZ/VdYD8/eCD8AqCCLwX04Vf4ccq/OzJLsX6EFFgIBP3Cwd+9kbKKxlG3xzmteOPcGhg4pCVdIuTlrMQ8uoUVrEy6FXq3m2kGrV6c68VfaieAyui7Yq0Mmn94KvykgTE7A9WP0/jUIGPbXob9iiJFB6pHP4z7+tIYhkf3QP85vtMEm7IWlKPtPDiGEAE5wQlxiZoHYNGeBIS32AHDTInRIN2dBKRMUdySYTt9WbFkuSLYmGdWtF2QGk3nghVOQOP3BHum6W/RizjqvuCS8KhDjd8891LNbZBYKpOGBYJH57kzVO4QhHde9yRO5uGTh7qV1NYaDyV0sOkzc+c8chMGgUyohXic/agZplE7QlId/VIQJLapEbgGlsGQGszDaaSpCkB4WNZWTYQf3oqvJglF6lnZhxc59E9dHNY6XhT8lEqFYTUamVPfuTAtDu7Q8j3T90ExqBwm2jytr5IfLq7wWy1sboP8dJ2DthC3wxxzVKbbogTR2wfv+0MI7+QZ4ykizcejFbyoCR6L5VNkBiyz67WH8wNQ9/9GMyu5H96MnLGNinEq++3qnUO4bl2D+NGGlRxj8A/BQaIoc2mejgf2pABzwOPNufiobFSdvHK5Uw5PX7g6Jf1FvfTKgPALymGtg2qZIIqK36lPB3SYqsZq0QoE8QJiNjXTL1NUAHH6GAWPZTv+9L7Q0WKrRlRroVKhigz6MOIE7uLUJ7LmG3SnoOuNRnoO43s5m+DYBJQQF2hbwwnpxd2GGqw95R2FtLhx886gW2onpVV+Ub7xc3UZl85FF9nhLkKa6EaL2HtuHrjeFWaAEvD9gAiSwHtrUV3oMvlQXuQaOziiqLU86wDSPUB7RdsJODRk3Too9/3w3H3m0f5mkWtQzSINy09lt22+4dXHaj6kFM8InIN+zwR909unjU64rSfwIGm2aiSL12gb+QexNL5/c8aSxw7lBUsuSJ+NBo7/1TJh9zY+28eAqI8axaly3/f5fGxkAnYsHcf6n67SDX/yBP0uL+z0qyfW/xiGiz+/FiYVPAH+xIEy11F+dqhoDVBJFEBWU9agAIbBHuAC82GRSupfjPfimVD3JbWG2j7Dn3K3jaFamIqSDhBhu4NA0Or8IyijFC9/jIiax35jFoJtae+eVKRUvUjbdxVLAyvkbb8feapkqio0HAHEO1D/SRRX4jHryqRZBruv8UsthWAFthBZcg2ykBFDHzQ9at4gTzLj7fGPdQo4jOn1JBNSUBk9//Tjh7hzm0B4EZpaUfZtZ/OyTOcjA54q2khiekT3fYvFr/E+88D7LDPDo0pvjzSBaIitAPJYc4INvwelOHvHGRtvN1Z/LvBM7MMnk6v/+4Fn8GKv9JrkWjd2gDL0/Oas8FD5UPDAkWkh2g+kfkwYm5LTgUaSUQvJsnRBnNmi6UU1LbQMP9mBvTZVCVgUsiZQfaAYb2zIdee4StsiG565Nb3oEttvaprHcZqvyOXgpL9upeoN0jf6c4k6g9/NbvYSmPUXmDbLX1JIaap+6T0KEjptxw4Dt0Unfq6U6v8aGziVr5qXFLj6QnnXgJ0ZZc5c1lttd38su5uEA8xrUpa/hLSPiMIr6ePqt7EeLjVPT5mB5WOZ/mGKsxq4iCh5bdxGIbfKjVGrqecYss9xK7D8QzZ+Se21dDaBwbG8sBMdA9IaWl3NMhqbLzlMbNsW9AvS75zCPp0anZovjFjgI09jDoVw7lHQ6nPQw6O/fRCI0NHTkoCSuh6Q1/A0zgiJtQ26PJRBilVJc/IiLHVvtnaj4V3SQfu08CKnn9atjJ2rCZe8OZXtloU6+HlDNBmxmY1MxSlGViU0SMDUYHSFdIrrOkGVl7RGfhFjV/DCZl+mO8CNFHTNVjArRsjtDbciExtv+veKFgw0t884KKefl1m97poQ+5g+DoKgCtBnQDaTKzTHPYl2LgBO7I44j1r5iQ4tZRwZho3jmZNBzmpQKeaSu6XkVzoMTMw6jevs7Woh4i8oVDIortMd7N256XWTn9/MkwDXElLSYc+++hA35Ra8dJRr37z4LKH+KzqSGC51Py9siVGjKGCy3VSUOEelrVYf7iadCINzohiiVQ3IqXMjnoVM88wvq3euEAETf1Y3VnI1I5K0dgvEtMr6jzrrdCz5uLGtCPTixjG4qt7pyO8UXYTqDyvaOox5n4ghA0HfHY3TYXReh/ViYQDTC4DZt1iE3+W36ABOdOXQkd6VeCx0iH02ue+UiI7IxjwIWTICAc7R+J3jMP1ELKQqIpq/BmMwFm5k1KAqhOhLerKWR/XbRnYqeijwubcxbshzv1J1rGm7gTdYnGRGtCpmHv01wnSCV/nqsDnKttfdJeOkXDCYzYKwlK/pn2FtTdRvXYQzrIDYnUhceQ5RozL1tSNCwaJ7VY3Lh1ExemoOalXmobguhTQZcIbvrVqs0Gw64FD9lVrmwYzoVwoxXEMXAEzIvc8C9UtIAONeZqHpdkas/rSWOzTfaFXsjiKT57Hh4KjQ7s7XaEVe9xyuonsfhbpNdCqdJ9PTmjrsPx6xk/LexurYCbnNOAjy6DZ+skkvdlUgsPWNTssh34lJcrSlRh9/BPIZ5s0PCMnUFr1Ybt2Q1vs/wWx02KhqetMKkH5vFxOaLSxQoiiFEafKFfHi7SXM2fzgAp/HbLTtFtlRXbtLs1nwe2mwQm4gpq9TN1FHguChVcFp5am5/oWmHCo098VYZRvOPOZkdOChTLWd5rmW3JRk+upmUk4yMfHxmj66RuGKpvpSUUGPD4qErHk/eNE354VBTaW74vEdL2df69M8X9GtXaaNcJhcFpa1fckYKyfAm5UMS2Lvc2ojptoQUDS9Fm2WwX751pToRt6jPUNxzO6wkLarFQrKVyOZ1QB6gda/lwUXS4mPjz4R/YF7YTbkhNQmyK2T4oMjy0MN7Vy1j7Yev2n91IXnhT0/SkfVwp0PRYw67sqT/E69lTWvfguDYYBjhX6nCu2iOqHc1dmdfhIH7txSmGC7lXOVAVxgGwClclLFoWZsAVDi56rQ21K+EAP2wEiLSFQTxMnmSxOZSQqAtcbYW4WB+ACEBDbhsE4ybYOEkTU2Q61qnnmODvZYu5UVPg2GTh+Q60tAJ+NH8otDgV2UMa8VOWz0FbwOlIC2BrSzTgM6VZYcECBC+dT0qDghrpbLiPcgYEMQKgFwbTkk6NLv9Nu2XuI05tEyHtG7kVjGgflZkr7/mD7kvRlA+nq3vHt87d75oqlfJ21ii1THRZS2/TrUlZ/HyKKbA4MB6sSk5NrphiAiVA78696o89d5XjmC6hQ6424uWsX2tMQKCoLyxXXUOQc9rR+GR1/qDoaql/V8aV45O/P2yZEN6nrTOvbDMyMmBMK8HfyzJAimRhJD9/T8kdH1GdENKa+o0vYsoOHwFxw0RevKPva+TKzJ3oeqcJgJKdpLOYXvwFQa3Ddb6gS39oSbCvzVyN55i9SxMqZfkz9I//hUdfq3zvpQYe/+CQ2Mcag26kr0Sks/AfqebbNSH/jbmgBnDaMKplbb/Q9GiiUNfm9SAEnw4oHqUhk3rP+CzwidJWcYCLtWgZjVIjF0kEAwsy/FYQtnldIG70go5hHZXtR/F8qqrFmfg0WBudwyV27NNN1/QYrRGSZ9KIP3R7zC/mCf4jDP8o9xBTQFsqgzZQPvGtFuhTfUiRFOeOfgIfVPdVBcpeiZfBQtbY+BwU2/ioJOYAbxXZliAchj7zk+tHmS5xUcIW/EeP2M+jldWfvyFLgpDjIa2YigWI8Sr8feJvJwJmW2OxCrDfNuw2LCWDvNyw6mISnNIySP85YlJse8xAKhwT9fRnSuDSZ4Hcf7yZO34n7L7khlIZz4l9ZVmO1zlbDx50TmAmUlsuyIejBjzFV5QKHiqIz/s/ZCrSm6PWX475ArYmG1ueQFsFr+lFv/kOiT7rPe+y6or96yKaxRu3s8ZF066KxubbhiRvctq5u1QfTd68ZIQylU8HWqCnAISujqkr0+5PEwglceBr00oKQo6CLeN7keeA47DHVWclcowfBuUDZpUNgty0tFNL6xSs3DWTdN9NXkeGiskFBKOYHXG80av2D2x130cK/1p1RehdFRmdQzSHfO1z4L+6O8vydTcpB56Nfqz3AdSoSy/EBpEaXfue7eN0TtqPaNPjY0UqVKWPWbSLFovj9ibDpoANb/LcKJCR0sDFM4LMawAX4OdiFx+aY0sx1jR4jROwDvXAeDF6+WNTKKurp4FYOk42i8R1UdBCZTHEh84LS4or5Oo4BH0t3T295DMRJLtHDn+vYkrMlTT6z2mL/plkaQDsh+3p29K26vy/Th+8CywzdVfS9iPqpb6ONiuMJeKkJAl5AgNQgq/A47yWpMQohiu2BxLSA2WagRHRC3TB3ipcaaYBM/12JTGHnAu+Q7pOWM5P7EXzSYGnQqkxeADqAA2A+UIOChWp8veUWY6mc8pNWzze41gWDs9HuCy1SZlk6eDsLfxrNjNSLYOwXj9bkhyMyLD6zJZ7ENqgIH1RXlFUrDzdUq6V5GJgDjyVGBu6igXEoZEikmIzJuj8AV6riXrrjo5ODFd2EKxZU8xMTbZd275EAtLcP1fADvlmU4ZuMdY6gIQHT1LyRE2LKKYVxD0Vkw1gLWx/g0n/w7NFxPTLXU5K0pHCTUtO6kZy/WNgfDggUhurl3l8vG8Mpq4/jWItf+Z+fPErb2hGwWW65u3APPA95ugOyOmqww2uKlEbJdBSywB19WW3rkhOGjuW4FWxX9sj89+4oht/cgw3EV5asJ2TQhxc6/vzk7KxviXwtaaNCOWFBoahQlxHwPH+iLsKvWa1u6CfMx/6HuFZSlHFGgV6UiGcaZU1jkGPvmXo+zSHEUEtcXBVHuTeGpEximdMbeP4RDptbtE+zZF69oSspltvdgXPXdUl3so072z3phiSm0doMBDXQjpGSwyKPV8pxyyUtRXU0MOysmT03pqYWHjoyPFAbfMJi+gkxMt45V26BxKMjUUl0YaE41jUsvOwxros+fmGocDgWiqvbCX/EAGnOKmUGrqYHjEpec883ylp5F5n+TIc2umdgrh594Vb24iiCvI5zbaVegxxHXNkE975cd3BF3kTveWCK4C6uzXOjqyZ0vLdKEXAaW3+65l59gBd2ipPo7jfMRWRwedUfPIGQ0Nh35i5GbCF1W8lRPCBsPlfsd66h2GBgNi2s++o1ZX3+fv2yRsSaRVrwKgTE1F95kjK5lRD6XRI+P5gxIyUtT0Cd/zFOXUOL9xmNXDN5P8QfDLU54xg/2WA5MZ21uJ94X8+dJT943SFt8/N3bEE0TLVSIYFgPotV2fL+HbzECSrc17TQzmHja6EFI30DnpHwjeXWUkAvFhkbyqK24/nsA6hdq617+MBZ21kcubDZzGuC2BcONRUYDsM4TPB9KJmpqbQOOGZcBdXE7PiZ+KUo5j5T2cJ/LVE49fHQsu2phw/9bIWx7eQT1/0S076h03n6BfwFUyD3K2JzofVB4I4UoW49WjDapP3vLyHkrkoCI2D132+iXRWve7caUiKKLfmeroilOo6VmORQCKdjwzEgFlvWgQctjmMRFJ2rvRKMaKJ8bckgLT/DlsX+MhmuTX/llm+rzEzje4DaSeGEB04FrpBwkX8tuXGsXFhBSqDczBaRmwmMyiTD45Z7u0nCKa7PfK9TP/vgBWKCws5t7BCp31IMVvy7OwGQclbFfO9Fx8ZLRz+GEpoAuRKKMahWm0ItM/Ow+Jpp9ad23MsvYgyNPZLu+I8nM0NFW1CIoZAM2dZtnzjx9ek9YS0r1daPyGal40t53rpRX3ALu5/FRjlLKwpuZA/asg5qxk82VpXLe12Wrh9Rqy0yw1H1DNiA9JkL3lSMKeTcQmXZG+MKk7QaU69qXG1tVP6rNBBWRW7RpfM63y+LWdjN6JF51EBxVuficGbAtbpZ6jQiwHEHwxSj6BIdBGauGTPEmNSldcsiOFybwgu4B2AYvTMqtTgmh31RXgTAm9ln8pQqKh6pi7W2dho0bbyJCNo9ECuuN5MITv6lBV5LAu52y8GlrPnJNGeVSxYX896s2jXQbtp69PzIJsmO6KwiQHlecGE06LNy01NTr0NOO47FFXcTEzflTgpPycQ2EkfUo8sQi/6BsQEl76Ju3V4yG8a3PZdtXs0a6cFUBxXE6iSeYywA22/Mdw0I4b4Mfd5rQjqMT6JwEPpTzQv5kTwWEvr12M6Zmaj6DT9U9006xdcc/zWyhDU68dcTk912I2jV1NBNwntqm6JAjEZpi5borv6gfg57ys6ChFh96Fqdfk7MDYpzsZca7xDEwnqumIy+Epog5+mn1g6q8A60pxZKOPq7T+1zG0T//0i9yqg5YC0d/T1C+sjv0j8mrrE6vqDeCEi6YVUsh7hwClJ1j2u6OKyV+1/9UG6CwncIzVpKH7U2jkl5k7MV4GsdpffDoaa6a/vGZfNZl2IhhuDdKwHc80YuMRiTWJ8vIDi5xd7O9yWYjvJR/rVYBe/5u4laQRpmfsroW5yRcvj+6aFSEo9YaC06wSZbKmpZA7gnrdMaU4TfrNPWVpjvhRx1dL23LzKwkatXEQDSVQ3UE5ZmcpHwUJF3G9unHOx7WCIZ+kiWfpD6kVzM+wg4E8RqsNdlqHHSr8yGa5YGiCy1fhYJcgsrx4cD/+LeNFakVtJDmGfF6HEvjX7pO78pT/w31BbPkaO52j57tFOBoqX3wa0BMFmJMirYgGrFKxFk3yP704ALq9AMYtfb0tbXAf4S4MhC8XlQPlYZkjgJMkdv9Al/DloLjnXuXUcLoecsDDWevjV6YxFp4oGF9LdRu4ioxxn6TUt4SRbmH9pgr7+M/x+XhPW2NpBhXAbQHU5YOI0gZgctglVNiSK6NnR59rq8/H9NaxoGYF32wnGHFafflqc245K1kT0TJDNo9yGDV8ke2n//0yz9gCs5qoUIe8PmTwI81ynPan1Jukj/7IKZeak4ox+BObpv5cPHDJW0sb2B57GVgjxuzbKfH/lpfuWYSDnc3QQv3oaTFQimTgWhq6HZK57GA7esS3utD2ByKN7kfdXV8lNTGHuXYTgpdKl00TpOPUtpp90fpSevq+AwvyKpURV/USWaZYnAmqf1DXVr4rsFwUZ/EW36IRmbdPp/O2O6isyu2l2dUcg/dDKd2V96qNPYajY/7z6DejhIS/81a/dKDRuSQoOaC1kEVg5JueH5yFRLn4vz+Ukai0XIa/oqZ1Y8B3w5ZJgZmtzPGOfANuHuUIlSg+8wj56VxtLhoK/5voTX/MbCiDPeU29pTObPdgoT7/QEzSNMvLezIFNECGJb4sRFxUHnP5JdIffpjnrYPDIQKcS0edJWTRyPrFDB9LcfjmTO76+YaI9KWTg9dq4u7564fS+KDst6EwAAAAA=');
