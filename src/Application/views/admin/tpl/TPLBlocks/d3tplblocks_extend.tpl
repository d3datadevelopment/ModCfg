[{include file="headitem.tpl" title="D3TPLBLOCK_MAIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<style type="text/css">
    .d3modcfg_btn.icon button {
        min-width: 300px;
    }
</style>

<script type="text/javascript">
    [{if !$oxparentid}]
        window.onload = function ()
        {
            [{if $updatelist == 1}]
                top.oxid.admin.updateList('[{$oxid}]');
            [{/if}]
        }
    [{/if}]
</script>

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>
<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[oxtplblocks__oxid]" value="[{$oxid}]">

    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <colgroup><col width="30%"><col width="5%"><col width="65%"></colgroup>
        <tr>
            <td valign="top" class="edittext" width="50%">
                <table cellspacing="0" cellpadding="0" border="0">

                    [{block name="admin_d3tplblocks_extend_form"}]

                        [{if $oView->hasTplBlocks()}]
                            <tr>
                                <td class="edittext" valign="top" rowspan="4" style="padding: 10px 20px 10px 0; vertical-align: middle;">
                                    <label for="cleartplblockslist">[{oxmultilang ident="D3TPLBLOCKS_MODULE"}]</label>
                                    <select name="tplblockmodule" size="1" id="cleartplblockslist">
                                        <option value="">[{oxmultilang ident="D3TPLBLOCKS_CHOOSEMODULE"}]</option>
                                        [{foreach from=$oView->getTplBlockModules() item="sModuleId"}]
                                            <option value="[{$sModuleId}]">[{$sModuleId}]</option>
                                        [{/foreach}]
                                    </select><br>
                                </td>
                                <td class="edittext" style="vertical-align: top; height: 30px; padding: 10px;">
                                    <span class="d3modcfg_btn icon d3color-orange">
                                        <button id="sumbitbtn" type="submit" name="save" onClick="document.myedit.fnc.value='clearTplBlocks';">
                                            <i class="fas fa-times-circle fa-inverse"></i>[{oxmultilang ident="D3TPLBLOCKS_REMBLOCKS"}]
                                        </button>
                                    </span> [{oxinputhelp ident="D3TPLBLOCKS_REMBLOCKS_DESC"}]
                                    [{*<br>
                                    <span style="font-size: 9px; display: block; padding-top: 10px;">[{oxmultilang ident="D3_CFG_CLRTMP_TPLBLOCKS_REQUACT"}]</span>*}]
                                </td>
                            </tr>
                            <tr>
                                <td class="edittext" style="vertical-align: top; height: 30px; padding: 10px;">
                                    <span class="d3modcfg_btn icon d3color-blue">
                                        <button id="sumbitbtn" type="submit" name="save" onClick="document.myedit.fnc.value='deactivateTplBlocks';">
                                            <i class="fas fa-minus-circle fa-inverse"></i>[{oxmultilang ident="D3TPLBLOCKS_DEACTBLOCKS"}]
                                        </button>
                                    </span> [{oxinputhelp ident="D3TPLBLOCKS_DEACTBLOCKS_DESC"}]
                                </td>
                            </tr>
                            <tr>
                                <td class="edittext" style="vertical-align: top; height: 30px; padding: 10px;">
                                    <span class="d3modcfg_btn icon d3color-blue">
                                        <button id="sumbitbtn" type="submit" name="save" onClick="document.myedit.fnc.value='activateTplBlocks';">
                                            <i class="fas fa-plus-circle fa-inverse"></i>[{oxmultilang ident="D3TPLBLOCKS_ACTBLOCKS"}]
                                        </button>
                                    </span> [{oxinputhelp ident="D3TPLBLOCKS_ACTBLOCKS_DESC"}]
                                </td>
                            </tr>
                            <tr>
                                <td class="edittext" style="vertical-align: top; height: 30px; padding: 10px;">
                                    <span class="d3modcfg_btn icon d3color-blue">
                                        <button id="sumbitbtn" type="submit" name="save" onClick="document.myedit.fnc.value='refreshTplBlocks';">
                                            <i class="fas fa-sync fa-inverse"></i>[{oxmultilang ident="D3TPLBLOCKS_REFBLOCKS"}]
                                        </button>
                                    </span> [{oxinputhelp ident="D3TPLBLOCKS_REFBLOCKS_DESC"}]
                                </td>
                            </tr>
                        [{else}]
                            <tr>
                                <td>[{oxmultilang ident="D3TPLBLOCKS_NOBLOCKS"}]</td>
                            </tr>
                        [{/if}]
                    [{/block}]
                </table>
            </td>
            <td>&nbsp;</td>
            <!-- Anfang rechte Seite -->
            <td valign="top" class="edittext" align="left">
                <table cellspacing="0" cellpadding="0" border="0">
                    [{block name="admin_d3tplblocks_extend_editor"}]
                        [{if $oView->hasTplBlocks()}]
                            <tr>
                                <td class="edittext" style="vertical-align: top; height: 30px; padding: 10px;">
                                    <span class="d3modcfg_btn icon d3color-blue">
                                        <button id="sumbitbtn" type="submit" name="save" onClick="document.myedit.fnc.value='clearDuplicates';">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3TPLBLOCKS_CLEARDUPLICATES"}]
                                        </button>
                                    </span> [{oxinputhelp ident="D3TPLBLOCKS_CLEARDUPLICATES_DESC"}]
                                </td>
                            </tr>
                        [{/if}]
                    [{/block}]
                </table>
            </td>
            <!-- Ende rechte Seite -->
        </tr>
    </table>
</form>

[{include file="d3_cfg_mod_inc.tpl"}]
