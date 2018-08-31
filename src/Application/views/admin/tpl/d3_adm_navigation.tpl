[{capture name="sOxidContent"}][{strip}]
    [{include file="navigation.tpl"}]
[{/strip}][{/capture}]

[{capture name="sSearchContent"}][{strip}]
</head>
[{/strip}][{/capture}]

[{capture name="sModuleContent"}]
    [{oxstyle include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/d3_mod_cfg.min.css')}]
    [{oxstyle}]

    [{oxscript include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/js/fontawesome-all.min.js')}]
    [{oxscript include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/js/fa-v4-shims.min.js')}]
    [{oxscript}]

</head>
[{/capture}]

[{$smarty.capture.sOxidContent|replace:$smarty.capture.sSearchContent:$smarty.capture.sModuleContent}]