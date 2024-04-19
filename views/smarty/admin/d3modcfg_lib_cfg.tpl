<style>
    div.box h3 {
        margin: 30px 0 10px 14px;
    }
    #d3modcfg_lib_cfg {
        width: 98%;
    }
    #d3modcfg_lib_cfg table {
        width: 100%;
    }
    #d3modcfg_lib_cfg table td {
        width: 50%;
    }
</style>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="modid" value="[{$oView->getSelectedModId()}]">
    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

    <h3>[{oxmultilang ident="D3MODCFG_LIB_TRANSL"}]</h3>

    <table style="border: none" id="d3modcfg_lib_cfg">
        <tr>
            <td style="vertical-align: top" class="edittext">

                [{assign var="blD3HasLog" value=$oView->checkD3Log()}]
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="blModCfg_noAdminHomeInfo">[{oxmultilang ident="D3_CFG_MODCFG_CFG_HIDEADMINHOMEINFO"}]</label>
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="hidden" name="value[blModCfg_noAdminHomeInfo]" value="0">
                            <input id="blModCfg_noAdminHomeInfo" type="checkbox" name="value[blModCfg_noAdminHomeInfo]" value="1" [{if $value->d3_cfg_mod__blModCfg_noAdminHomeInfo}] checked[{/if}] [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="d3modcfg_btn icon d3color-green">
                                <button type="submit" name="save" [{$readonly}]>
                                    <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_SAVE"}]
                                </button>
                            </span>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>

<h3>[{oxmultilang ident="D3LOG_LIB_TRANSL"}]</h3>
[{include file="@d3modcfg_lib/admin/log/lib_cfg.tpl"}]

<h3>[{oxmultilang ident="D3INSTALL_LIB_TRANSL"}]</h3>
[{include file="@d3modcfg_lib/admin/install/lib_cfg.tpl"}]

<h3>[{oxmultilang ident="D3CLRTMP_LIB_TRANSL"}]</h3>
[{include file="@d3modcfg_lib/admin/maintenance/lib_cfg.tpl"}]