<style type="text/css">
    div.box h3 {margin: 30px 0 10px 14px;}
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

    <table border="0" id="d3modcfg_lib_cfg">
        <tr>
            <td valign="top" class="edittext">

                [{assign var="blD3HasLog" value=$oView->checkD3Log()}]
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext ext_edittext">
                            [{oxmultilang ident="D3_CFG_MODCFG_CFG_HIDEADMINHOMEINFO"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blModCfg_noAdminHomeInfo]" value="0">
                            <input type="checkbox" name="value[blModCfg_noAdminHomeInfo]" value="1" [{if $value->d3_cfg_mod__blModCfg_noAdminHomeInfo}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="d3modcfg_btn icon d3color-green">
                                <button type="submit" name="save">
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
[{include file="d3log_lib_cfg.tpl"}]

<h3>[{oxmultilang ident="D3INSTALL_LIB_TRANSL"}]</h3>
[{include file="d3install_lib_cfg.tpl"}]

<h3>[{oxmultilang ident="D3CLRTMP_LIB_TRANSL"}]</h3>
[{include file="d3clrtmp_lib_cfg.tpl"}]