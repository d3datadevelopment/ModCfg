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

function EditThis( sID)
{
    let oTransfer = document.getElementById("transfer");
    oTransfer.oxid.value=sID;
    oTransfer.cl.value='[{$oViewConf->getActiveClassName()}]';
    oTransfer.submit();

    let oSearch = parent.list.document.getElementById("search");
    oSearch.actedit.value = 0;
    oSearch.oxid.value=sID;
    oSearch.submit();
}

function ChangeLstrt()
{
    let oSearch = document.getElementById("search");
    if (document.search !== null && document.search.lstrt !== null)
        oSearch.lstrt.value=0;
}

//-->
</script>

[{if $readonly || $edit->isWriteProtected()}]
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
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0;margin: 0;height:0;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">
    <input type="hidden" name="editval[[{$edit->d3GetFieldLongName('oxid')}]]" value="[{$oxid}]">
    <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse; width: 98%">
        <tr>
            <td class="edittext" style="vertical-align: top; padding-top:10px;padding-left:10px;">
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    <tr>
                        <td class="edittext">
                            <label for="MainActive">[{oxmultilang ident="D3_MODPROFILE_MAIN_ACTIVE"}]</label>
                        </td>
                        <td class="edittext">
                            <input type="hidden" name="editval[[{$edit->d3GetFieldLongName('oxactive')}]]" value='0'>
                            <input id="MainActive" class="edittext" type="checkbox" name="editval[[{$edit->d3GetFieldLongName('oxactive')}]]" value='1' [{if $edit->getFieldData('oxactive') == 1}]checked[{/if}] [{$readonly}]>
                            [{oxinputhelp ident="D3_MODPROFILE_MAIN_ACTIVE_DESC"}]
                        </td>
                    </tr>
                    [{if $blUseTimeCheck}]
                        <tr>
                            <td class="edittext">
                                [{oxmultilang ident="D3_MODPROFILE_MAIN_ACTIVFROMTILL"}]&nbsp;
                            </td>
                            <td class="edittext">
                                <label for="MainActiveFrom">[{oxmultilang ident="D3_MODPROFILE_MAIN_ACTIVEFROM"}]</label>&nbsp;<input id="MainActiveFrom" type="text" class="editinput" size="27" name="editval[[{$edit->d3GetFieldLongName('oxactivefrom')}]]" value="[{$edit->getFieldData('oxactivefrom')|oxformdate}]" [{include file="help.tpl" helpid=article_vonbis}] [{$readonly}]><br>
                                <label for="MainActiveTo">[{oxmultilang ident="D3_MODPROFILE_MAIN_ACTIVETO"}]</label>&nbsp;&nbsp;<input id="MainActiveTo" type="text" class="editinput" size="27" name="editval[[{$edit->d3GetFieldLongName('oxactiveto')}]]" value="[{$edit->getFieldData('oxactiveto')|oxformdate}]" [{include file="help.tpl" helpid=article_vonbis}] [{$readonly}]>
                            </td>
                        </tr>
                    [{/if}]
                    <tr>
                        <td class="edittext">
                            <label for="MainTitle">[{oxmultilang ident="D3_MODPROFILE_MAIN_TITLE"}]</label>&nbsp;
                        </td>
                        <td class="edittext">
                            <input id="MainTitle" type="text" class="editinput" size="50" maxlength="[{$edit->d3getFieldMaxLength('oxtitle')}]" name="editval[[{$edit->d3GetFieldLongName('oxtitle')}]]" value="[{$edit->getFieldData('oxtitle')}]" [{$readonly}]>
                        </td>
                    </tr>

                    [{include file="@d3modcfg_lib/admin/inc/actionbuttons"}]

                </table>
            </td>
<!-- Anfang rechte Seite -->
            <td class="edittext" style="text-align: left; vertical-align: top; height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    <tr>
                        <td class="edittext">
                            <label for="MainSort">[{oxmultilang ident="D3_MODPROFILE_MAIN_SORT"}]</label>&nbsp;
                        </td>
                        <td class="edittext">
                            <input id="MainSort" type="text" class="editinput" size="32" maxlength="[{$edit->d3getFieldMaxLength('oxsort')}]" name="editval[[{$edit->d3GetFieldLongName('oxsort')}]]" value="[{$edit->getFieldData('oxsort')}]" [{$readonly}]>
                            [{oxinputhelp ident="D3_MODPROFILE_MAIN_SORT_DESC"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="MainFolder">[{oxmultilang ident="D3_MODPROFILE_MAIN_FOLDER"}]</label>&nbsp;
                        </td>
                        <td class="edittext">
                            <select id="MainFolder" class="editinput" size="1" name="editval[[{$edit->d3GetFieldLongName('oxfolder')}]]" [{$readonly}]>
                                <option value="" [{if '' == $edit->getFieldData('oxfolder')}] selected[{/if}]>[{oxmultilang ident="D3_MODPROFILE_MAIN_NOFOLDER"}]</option>
                                [{foreach from=$oView->getFolderList() key="sMLItem" item="sTranslation"}]
                                    <option value="[{$sMLItem}]" [{if $sMLItem == $edit->getFieldData('oxfolder')}] selected[{/if}]>[{$sTranslation}]</option>
                                [{/foreach}]
                            </select>
                            [{oxinputhelp ident="D3_MODPROFILE_MAIN_FOLDER_DESC"}]
                        </td>
                    </tr>

                    [{if $blShowLangSwitch}]
                        <tr>
                            <td class="edittext" colspan="2"><br>
                                [{include file="language_edit.tpl"}]<br>
                            </td>
                        </tr>
                    [{/if}]
                </table>
            </td>
<!-- Ende rechte Seite -->
        </tr>
    </table>
</form>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]
