[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
    [{if $updatelist == 1}]
        UpdateList('[{$oxid}]');
    [{/if}]

    function ChangeFormat()
    {
        let oOPField = document.getElementById("codeformat");
        if (oOPField.className === 'code')
            oOPField.className = 'codepre';
        else
            oOPField.className = 'code';
    }

//-->
</script>

<style type="text/css">
    td.edittext { height: 25px;}
    td.edittext table {width: 100%;}
    .code, .codepre {background-color:#EEEEEE; border:1px inset #999999; margin:10px auto; width:100%; white-space: normal;}
    .codepre {white-space: pre;}
    .code div, .codepre div {font-family: Courier, monospace; max-height:145px; overflow:auto; padding:5px;}
</style>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
    [{foreach from=$oView->d3getAdditionalFormParams() key="key" item="formparam"}]
        <input type="hidden" name="[{$key}]" value="[{$formparam}]">
    [{/foreach}]
</form>

[{if $edit->getId()}]
    <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse; width: 98%">
        <tr>
            <td class="edittext" style="vertical-align: top; padding-top:10px;padding-left:10px;">
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_MODULE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxmodid')}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_TIME"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxtime')}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_COUNTER"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxcounter')}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_LOGTYPE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxlogtype')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_SESSID"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxsessid')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_CLASS"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxclass')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_FUNCTION"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxfnc')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_LINE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxline')}]
                        </td>
                    </tr>

                </table>
            </td>

<!-- Anfang rechte Seite -->
            <td class="edittext" style="vertical-align: top; text-align: left; width: 65%; height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    [{if $edit->getFieldData('oxaction')}]
                        <tr>
                            <td class="edittext">
                                [{oxmultilang ident="D3_CFG_LOG_ACTION"}]&nbsp;
                            </td>
                            <td class="edittext">
                                [{$edit->getFieldData('oxaction')}]
                            </td>
                        </tr>
                    [{/if}]
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_TEXT"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <fieldset class="codepre" id="codeformat">
                                <div>
                                    [{$edit->getFieldData('oxtext')}]
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="wrapMessage">[{oxmultilang ident="D3_CFG_LOG_WRAP"}]</label>&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="checkbox" id="wrapMessage" onClick="ChangeFormat();" checked>
                        </td>
                    </tr>
                </table>

            </td>
<!-- Ende rechte Seite -->

        </tr>
    </table>

[{else}]

    <fieldset>
        [{$oView->getLogInfoMessage()}]
    </fieldset>

    <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0;margin: 0;height:0;">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="d3logexport_sql">
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="voxid" value="[{$oxid}]">
        [{foreach from=$oView->d3getAdditionalFormParams() key="key" item="formparam"}]
            <input type="hidden" name="[{$key}]" value="[{$formparam}]">
        [{/foreach}]

        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse; width: 50%">
            <tr>
                <td class="edittext" style="vertical-align: top; padding-top:10px;padding-left:10px;">
                    <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                        <tr>
                            <td class="edittext">
                                [{oxmultilang ident="D3_CFG_EXPORT_EXP1"}]&nbsp;
                            </td>
                            <td class="edittext">
                            </td>
                        </tr>

                        <tr>
                            <td class="edittext">
                                <label for="export_oxmodid">[{oxmultilang ident="D3_CFG_EXPORT_EXP_MODULE"}]</label>
                            </td>
                            <td class="edittext">
                                <select name="export_oxmodid" id="export_oxmodid" class="editinput">
                                    <option value="">[{$oView->getAllItemsTranslation()}]</option>
                                    [{foreach from=$oView->getModIdList() item="item"}]
                                        <option value="[{$item}]" [{if $oxmodid == $item}] selected[{/if}]>[{$item}]</option>
                                    [{/foreach}]
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="export_oxtime">[{oxmultilang ident="D3_CFG_EXPORT_EXP_TIME"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="32" maxlength="19" name="export_oxtime" id="export_oxtime" value="[{if $oxtime}][{$oxtime}][{else}][{$deftime}][{/if}]" [{$readonly}]>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="export_oxsessid">[{oxmultilang ident="D3_CFG_EXPORT_EXP_SESSID"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="32" maxlength="[{$edit->d3log__oxsessid->fldmax_length}]" name="export_oxsessid" id="export_oxsessid" value="[{if $oxsessid}][{$oxsessid}][{/if}]" [{$readonly}]>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext">
                                <label for="export_oxclass">[{oxmultilang ident="D3_CFG_EXPORT_EXP_CLASS"}]</label>
                            </td>
                            <td class="edittext">
                                <select name="export_oxclass" id="export_oxclass" class="editinput">
                                    <option value="">[{oxmultilang ident="D3_CFG_EXPORT_EXP_CLASS_ALL"}]</option>
                                    [{foreach from=$oView->getClassList() item="item"}]
                                        <option value="[{$item}]" [{if $oxclass == $item}] selected[{/if}]>[{$item}]</option>
                                    [{/foreach}]
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="edittext">
                                <label for="export_mail">[{oxmultilang ident="D3_CFG_EXPORT_EXP_MAIL"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="32" maxlength="40" name="export_mail" id="export_mail" value="[{if $mail}][{$mail}][{/if}]" [{$readonly}]>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="white-space: normal;"><br><br>
                                <span class="d3modcfg_btn icon d3color-blue" style="margin-right: 10px;">
                                    <button type="submit" name="exportItem" onclick="document.getElementById('myedit').fnc.value='d3logexport_sql';" [{$readonly}]>
                                        <i class="fas fa-download fa-inverse"></i>[{oxmultilang ident="D3_CFG_EXPORT_SQL"}]
                                    </button>
                                </span>
                                [{*
                                    &nbsp;&nbsp;
                                    <span class="d3modcfg_btn icon d3color-blue">
                                        <button type="submit" name="exportItem" onclick="document.getElementById('myedit').fnc.value='d3logexport_csv';" [{$readonly}]>
                                            <i class="fas fa-download fa-inverse"></i>[{oxmultilang ident="D3_CFG_EXPORT_CSV"}]
                                        </button>
                                    </span>
                                *}]
                            </td>
                        </tr>

                    </table>
                </td>

                <!-- Anfang rechte Seite -->
                <td class="edittext" style="vertical-align: top; text-align: left; height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">

                </td>
                <!-- Ende rechte Seite -->
            </tr>
        </table>
    </form>
[{/if}]

[{include file="d3_cfg_mod_inc.tpl"}]
