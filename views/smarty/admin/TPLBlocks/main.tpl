[{include file="headitem.tpl" title="D3TPLBLOCK_MAIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

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

    <table style="padding: 0; border: none; width: 98%; border-spacing: 0; border-collapse: collapse">
        <colgroup>
            <col style="width: 30%">
            <col style="width: 5%">
            <col style="width: 65%">
        </colgroup>
        <tr>
            <td style="width: 50%; vertical-align: top" class="edittext">
                <table style="padding: 0; border: none; border-spacing: 0; border-collapse: collapse">

                    [{block name="admin_d3tplblocks_main_form"}]
                        <tr>
                            <td style="width: 70px;" class="edittext">
                                <label for="oxtplblocks__oxactive">[{oxmultilang ident="GENERAL_ACTIVE"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="hidden" name="editval[oxtplblocks__oxactive]" value='0' [{$readonly}]>
                                <input class="edittext" type="checkbox" id="oxtplblocks__oxactive" name="editval[oxtplblocks__oxactive]" value='1' [{if $edit->oxtplblocks__oxactive->value == 1}]checked[{/if}] [{$readonly}]>
                                [{oxinputhelp ident="HELP_GENERAL_ACTIVE"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="oxtplblocks__oxtheme">[{oxmultilang ident="D3TPLTHEME"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="28" id="oxtplblocks__oxtheme" maxlength="[{$edit->oxtplblocks__oxtheme->fldmax_length}]" name="editval[oxtplblocks__oxtheme]" value="[{$edit->getFieldData('oxtheme')}]" [{$readonly}]>
                                [{oxinputhelp ident="D3TPLTHEME_DESC"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="oxtplblocks__oxtemplate">[{oxmultilang ident="D3TPLTEMPLATE"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="100" id="oxtplblocks__oxtemplate" maxlength="[{$edit->oxtplblocks__oxtemplate->fldmax_length}]" name="editval[oxtplblocks__oxtemplate]" value="[{$edit->getFieldData('oxtemplate')}]" [{$readonly}]>
                                [{oxinputhelp ident="D3TPLTEMPLATE_DESC"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="oxtplblocks__oxblockname">[{oxmultilang ident="D3TPLBLOCKNAME"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="100" id="oxtplblocks__oxblockname" maxlength="[{$edit->oxtplblocks__oxblockname->fldmax_length}]" name="editval[oxtplblocks__oxblockname]" value="[{$edit->getFieldData('oxblockname')}]" [{$readonly}]>
                                [{oxinputhelp ident="D3TPLBLOCKNAME_DESC"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="oxtplblocks__oxmodule">[{oxmultilang ident="D3TPLMODULE"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="28" id="oxtplblocks__oxmodule" maxlength="[{$edit->oxtplblocks__oxmodule->fldmax_length}]" name="editval[oxtplblocks__oxmodule]" value="[{$edit->getFieldData('oxmodule')}]" [{$readonly}]>
                                [{oxinputhelp ident="D3TPLMODULE_DESC"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="oxtplblocks__oxfile">[{oxmultilang ident="D3TPLFILE"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="100" id="oxtplblocks__oxfile" maxlength="[{$edit->oxtplblocks__oxfile->fldmax_length}]" name="editval[oxtplblocks__oxfile]" value="[{$edit->getFieldData('oxfile')}]" [{$readonly}]>
                                [{oxinputhelp ident="D3TPLFILE_DESC"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="oxtplblocks__oxpos">[{oxmultilang ident="D3TPLPOS"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="28" id="oxtplblocks__oxpos" maxlength="[{$edit->oxtplblocks__oxpos->fldmax_length}]" name="editval[oxtplblocks__oxpos]" value="[{$edit->getFieldData('oxpos')}]" [{$readonly}]>
                                [{oxinputhelp ident="D3TPLPOS_DESC"}]
                            </td>
                        </tr>
                    [{/block}]
                <tr>
                    <td class="edittext">
                    </td>
                    <td class="edittext">
                        <input type="submit" class="edittext" name="saveContent" value="[{oxmultilang ident="GENERAL_SAVE"}]" onClick="document.myedit.fnc.value='save'"" [{$readonly}]>&nbsp;&nbsp;
                        <input type="submit" class="edittext" name="moveToFirst" value="[{oxmultilang ident="D3TPLBLOCKS_MOVEFIRST"}]" onClick="document.myedit.fnc.value='moveToFirst'"" [{$readonly}] [{if false == $edit->getFieldData('oxmodule')}]disabled[{/if}]><br>
                    </td>
                </tr>
                </table>
            </td>
            <td>&nbsp;</td>
            <!-- Anfang rechte Seite -->
            <td style="vertical-align: top; text-align: left" class="edittext">
                [{block name="admin_d3tplblocks_main_editor"}]
                [{/block}]
            </td>
            <!-- Ende rechte Seite -->
        </tr>
    </table>
</form>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]
