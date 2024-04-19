[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
[{if $updatelist == 1}]
    UpdateList('[{$oxid}]');
[{/if}]

function UpdateList( sID)
{
    let oSearch = parent.list.document.getElementById("search");
    oSearch.oxid.value=sID;
    oSearch.fnc.value='';
    oSearch.submit();
}

function transferFields()
{
    let oSearch;
    oSearch = top.basefrm.list.document.getElementById('search');
    oSearch.delete_oxfromtime.value = document.getElementById('myedit').delete_oxfromtime.value;
    oSearch.delete_oxtotime.value = document.getElementById('myedit').delete_oxtotime.value;
    oSearch.delete_oxtype.value = document.getElementById('myedit').delete_oxtype.value;
    oSearch.delete_oxmodid.value = document.getElementById('myedit').delete_oxmodid.value;
}

//-->
</script>

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

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0;margin: 0;height:0;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="delete">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">
    [{foreach from=$oView->d3getAdditionalFormParams() key="key" item="formparam"}]
        <input type="hidden" name="[{$key}]" value="[{$formparam}]">
    [{/foreach}]

    <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse; width:98%;">
        <tr>
            <td class="edittext" style="vertical-align: top; padding-top:10px;padding-left:10px;">
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_CLEAN_DEL1"}]&nbsp;
                        </td>
                        <td class="edittext">
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            <label for="delete_oxmodid">[{oxmultilang ident="D3_CFG_CLEAN_DEL_MODULE"}]</label>
                        </td>
                        <td class="edittext">
                            <select name="delete_oxmodid" id="delete_oxmodid" class="editinput" [{$readonly}]>
                                <option value="">[{oxmultilang ident="D3_CFG_CLEAN_DEL_MODULE_ALL"}]</option>
                                [{foreach from=$oView->getModIdList() item="item"}]
                                    <option value="[{$item}]">[{$item}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="delete_oxfromtime">[{oxmultilang ident="D3_CFG_CLEAN_DEL_FROMTIME"}]</label>
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="32" maxlength="[{$edit->d3log__oxtime->fldmax_length}]" id="delete_oxfromtime" name="delete_oxfromtime" value="[{'1970-01-01'|date_format:"%Y-%m-%d %H:%M:%S"}]" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="delete_oxtotime">[{oxmultilang ident="D3_CFG_CLEAN_DEL_TOTIME"}]</label>
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="32" maxlength="[{$edit->d3log__oxtime->fldmax_length}]" name="delete_oxtotime" id="delete_oxtotime" value="[{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}]" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="delete_oxtype">[{oxmultilang ident="D3_CFG_CLEAN_DEL_TYPE"}]</label>
                        </td>
                        <td class="edittext">
                            <select name="delete_oxtype" id="delete_oxtype" class="editinput" [{$readonly}]>
                                <option value="">[{oxmultilang ident="D3_CFG_CLEAN_DEL_TYPE_ALL"}]</option>
                                [{foreach from=$oView->getLogTypeList() item="item"}]
                                    <option value="[{$item}]">[{$item}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><br><br>
                            <span class="d3modcfg_btn icon d3color-orange">
                                <button type="submit" name="deleteItem" onClick="transferFields(); top.oxid.admin.deleteThis('');" [{$readonly}]>
                                    <i class="fas fa-trash fa-inverse"></i>[{oxmultilang ident="D3_CFG_CLEAN_DELETE"}]
                                </button>
                            </span>
                        </td>
                    </tr>

                </table>
            </td>

    <!-- Anfang rechte Seite -->
            <td class="edittext" style="text-align: left; vertical-align: top; height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">

            </td>
    <!-- Ende rechte Seite -->
        </tr>
    </table>
</form>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]
