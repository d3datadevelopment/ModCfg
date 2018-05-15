[{if $oView->getUserMessages()}]
    <script type="text/javascript">
        [{strip}]alert("
        [{foreach from=$oView->getUserMessages() item="sMessage"}]
            - [{$sMessage}]\n
        [{/foreach}]
            ");[{/strip}]
    </script>
[{/if}]

[{oxstyle include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/d3_mod_cfg.css')}]
[{oxstyle}]

[{oxscript include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/js/fontawesome-all.js')}]
[{oxscript include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/js/fa-v4-shims.js')}]
[{oxscript}]

[{if false == isset($blHideLinkBar) || false == $blHideLinkBar}]
    [{include file="d3_cfg_mod_bottom.tpl"}]
[{/if}]

[{php}]
    $oView = $this->get_template_vars('oView');
    $this->assign('blChangeTitle', method_exists($oView, 'd3GetMenuItemTitle') && $oView->d3GetMenuItemTitle() ? true : false);
[{/php}]

[{if $blChangeTitle}]
    [{assign var="rawMenuItemTitle" value=$oView->d3GetMenuItemTitle()}]
    [{assign var="rawMenuSubItemTitle" value=$oView->d3GetMenuSubItemTitle()}]
    <script type="text/javascript">
        if (parent.parent) {
            parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
            parent.parent.sMenuItem    = "[{$rawMenuItemTitle|oxmultilangassign|strip_tags}]";
            parent.parent.sMenuSubItem = "[{$rawMenuSubItemTitle|oxmultilangassign|strip_tags}]";
            parent.parent.sWorkArea    = "[{if isset($_act)}][{$_act}][{/if}]";
            parent.parent.setTitle();
        }
    </script>
[{/if}]