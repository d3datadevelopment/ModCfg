[{capture name="sOxidContent"}][{strip}]
    [{include file="navigation.tpl"}]
[{/strip}][{/capture}]

[{capture name="sSearchContent"}][{strip}]
</head>
[{/strip}][{/capture}]

[{capture name="sModuleContent"}]
    [{oxstyle include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/d3_mod_cfg.css')}]
    [{oxstyle include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/font-awesome.min.css')}]
    [{oxstyle}]
</head>
[{/capture}]

[{$smarty.capture.sOxidContent|replace:$smarty.capture.sSearchContent:$smarty.capture.sModuleContent}]