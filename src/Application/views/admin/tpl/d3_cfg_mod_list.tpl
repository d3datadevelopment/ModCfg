[{include file="headitem.tpl" title="d3mxcfg"|oxmultilangassign box="list"}]
[{assign var="where" value=$oView->getListFilter()}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<script type="text/javascript">
    <!--
    function EditThis( sID)
    {
        let oTransfer = parent.edit.document.getElementById("transfer");
        oTransfer.oxid.value=sID;
        oTransfer.cl.value='[{if $actlocation}][{$actlocation|oxescape:"javascript"}][{else}][{$default_edit|oxescape:"javascript"}][{/if}]';

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();

        let oSearch = document.getElementById("search");
        oSearch.oxid.value=sID;
        oSearch.submit();
    }

    function DeleteThis( sID)
    {
        let blCheck;
        blCheck = confirm("[{oxmultilang ident="GENERAL_YOUWANTTODELETE"}]");
        if( blCheck === true)
        {
            let oSearch = document.getElementById("search");
            oSearch.oxid.value=sID;
            oSearch.fnc.value='deleteentry';
            oSearch.actedit.value=0;
            oSearch.submit();

            let oTransfer = parent.edit.document.getElementById("transfer");
            oTransfer.oxid.value='-1';
            oTransfer.cl.value='[{$default_edit|oxescape:"javascript"}]';

            //forcing edit frame to reload after submit
            top.forceReloadingEditFrame();
        }
    }

    function ChangeEditBar( sLocation, sPos)
    {
        let oSearch = document.getElementById("search");
        oSearch.actedit.value=sPos;
        oSearch.submit();

        let oTransfer = parent.edit.document.getElementById("transfer");
        oTransfer.cl.value=sLocation;

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();
    }

    function ChangeLanguage()
    {
        let oSearch = document.getElementById("search");
        oSearch.language.value=oSearch.changelang.value;
        oSearch.editlanguage.value=oSearch.changelang.value;
        oSearch.submit();

        let oTransfer = parent.edit.document.getElementById("transfer");
        oTransfer.innerHTML += '<input type="hidden" name="language" value="'+oSearch.changelang.value+'">';
        oTransfer.innerHTML += '<input type="hidden" name="editlanguage" value="'+oSearch.changelang.value+'">';

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();
    }

    window.onLoad = top.reloadEditFrame();
    -->
</script>

<style type="text/css">
    <!--
    .d3notallowed,
    .d3notallowed a {
        color: silver;
    }
    -->
</style>

[{if $oView->d3getShowListItems()}]

    <div id="liste">
        <form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">
            [{include file="_formparams.tpl" cl=$oViewConf->getActiveClassName() lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]

            <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse; width: 100%">
                <colgroup>
                    [{block name="admin_d3modprofile_list_colgroup"}]
                        <col style="width: 3%">
                        <col style="width: 15%">
                        <col style="width: 47%">
                        <col style="width: 20%">
                        <col style="width: 15%">
                    [{/block}]
                </colgroup>
                <tr class="listitem">
                    [{block name="admin_d3modprofile_list_filter"}]
                        <td style="height: 20px; vertical-align: middle" class="listfilter first" nowrap>
                            <div class="r1"><div class="b1">&nbsp;</div></div>
                        </td>
                        <td style="height: 20px; vertical-align: middle" class="listfilter" nowrap>
                            <div class="r1">
                                <div class="b1">
                                    <input class="listedit" type="text" size="10" maxlength="128" name="where[[{$listTable}]][oxsort]" value="[{$where.$listTable.oxsort}]"
                                    [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                                </div>
                            </div>
                        </td>
                        <td style="vertical-align: top" class="listfilter" nowrap>
                            <div class="r1">
                                <div class="b1">
                                    <input class="listedit" type="text" size="25" maxlength="128" name="where[[{$listTable}]][oxtitle]" value="[{$where.$listTable.oxtitle}]"
                                    [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                                </div>
                            </div>
                        </td>
                        <td style="height: 20px; vertical-align: middle" colspan="2" class="listfilter" nowrap>
                            <div class="r1">
                                <div class="b1">
                                    <div class="find">
                                        [{if $blShowLangSwitch}]
                                            <select name="changelang" class="editinput" onChange="ChangeLanguage();">
                                                [{foreach from=$languages item="lang"}]
                                                    <option value="[{$lang->id}]" [{if $lang->selected}]SELECTED[{/if}]>[{$lang->name}]</option>
                                                [{/foreach}]
                                            </select>
                                        [{/if}]
                                        <input class="listedit" type="submit" name="submitit" value="[{oxmultilang ident="GENERAL_SEARCH"}]" onClick="document.search.lstrt.value=0;">
                                    </div>

                                    <select name="folder" class="folderselect" onChange="document.search.submit();" [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                                        [{foreach from=$oView->getSelectableFolderList() key="sMLIdent" item="sTranslation"}]
                                            <option value="[{$sMLIdent}]" [{if $sMLIdent == $folder}]SELECTED[{/if}]>[{$sTranslation}]</option>
                                        [{/foreach}]
                                    </select>
                                </div>
                            </div>
                        </td>
                    [{/block}]
                </tr>
                <tr>
                    [{block name="admin_d3usermanager_list_sorting"}]
                        <td class="listheader first" height="15">&nbsp;
                            <a href="Javascript:top.oxid.admin.setSorting( document.search, '[{$listTable}]', 'oxactive', 'asc');document.search.submit();" class="listheader">
                                [{oxmultilang ident="GENERAL_ACTIVTITLE"}]
                            </a>
                        </td>
                        <td class="listheader" height="15">&nbsp;
                            <a href="Javascript:top.oxid.admin.setSorting( document.search, '[{$listTable}]', 'oxsort', 'asc');document.search.submit();" class="listheader">
                                [{oxmultilang ident="D3_GENERAL_MODPROFILE_SORT"}]
                            </a>
                        </td>
                        <td class="listheader">
                            <a href="Javascript:top.oxid.admin.setSorting( document.search, '[{$listTable}]', 'oxtitle', 'asc');document.search.submit();" class="listheader">
                                [{oxmultilang ident="D3_GENERAL_MODPROFILE_TITLE"}]
                            </a>
                        </td>
                        <td class="listheader" colspan="2">
                            <a href="Javascript:top.oxid.admin.setSorting( document.search, '[{$listTable}]', 'oxfolder', 'asc');document.search.submit();" class="listheader">
                                [{oxmultilang ident="D3_GENERAL_MODPROFILE_FOLDER"}]
                            </a>
                        </td>
                    [{/block}]
                </tr>

                [{assign var="blWhite" value=""}]
                [{assign var="_cnt" value=0}]
                [{foreach from=$mylist item="listitem"}]
                    [{assign var="_cnt" value=$_cnt+1}]
                    [{if $listitem->getLicenseActive()}]
                        [{assign var="formatclass" value=""}]
                    [{else}]
                        [{assign var="formatclass" value="d3notallowed"}]
                    [{/if}]
                    <tr id="row.[{$_cnt}]">
                        [{block name="admin_d3modprofile_list_item"}]
                            [{if $listitem->blacklist == 1}]
                                [{assign var="listclass" value="listitem3"}]
                            [{else}]
                                [{assign var="listclass" value="listitem"|cat:$blWhite}]
                            [{/if}]
                            [{if $listitem->getId() == $oxid}]
                                [{assign var="listclass" value="listitem4"}]
                            [{/if}]
                            <td style="vertical-align: top; height: 15px" class="[{$listclass}] [{$formatclass}] [{if $listitem->getFieldData('oxactive') == 1}] active[{/if}]">
                                <div class="listitemfloating">
                                    &nbsp;
                                </div>
                            </td>
                            <td style="vertical-align: top; height: 15px" class="[{$listclass}] [{$formatclass}] ">
                                <div class="listitemfloating">&nbsp;
                                    <a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">
                                        [{$listitem->getFieldData('oxsort')}]
                                    </a>
                                </div>
                            </td>
                            <td style="vertical-align: top; height: 15px" class="[{$listclass}] [{$formatclass}] ">
                                <div class="listitemfloating">&nbsp;
                                    <a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">
                                        [{$listitem->getFieldData('oxtitle')|truncate:200:"..":false}]
                                    </a>
                                </div>
                            </td>
                            <td style="vertical-align: top; height: 15px" class="[{$listclass}] [{$formatclass}] ">
                                <div class="listitemfloating">&nbsp;
                                    <a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">
                                        [{if $listitem->getFieldData('oxfolder')}][{oxmultilang ident=$listitem->getFieldData('oxfolder')}][{/if}]
                                    </a>
                                </div>
                            </td>
                            <td class="[{$listclass}] [{$formatclass}] ">
                                [{if !$readonly}]
                                    <a href="Javascript:DeleteThis('[{$listitem->getId()}]');" class="delete" id="del.[{$_cnt}]" title="" [{include file="help.tpl" helpid=item_delete}]></a>
                                [{/if}]
                            </td>
                        [{/block}]
                    </tr>
                    [{if $blWhite == "2"}]
                        [{assign var="blWhite" value=""}]
                    [{else}]
                        [{assign var="blWhite" value="2"}]
                    [{/if}]
                [{/foreach}]
                [{include file="pagenavisnippet.tpl" colspan="5"}]
            </table>
        </form>
    </div>

[{else}]
    <form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">
        [{include file="_formparams.tpl" cl=$oViewConf->getActiveClassName() lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]

        [{if $blShowLangSwitch}]
            <label for="changelang">[{oxmultilang ident="D3_CFG_MOD_LIST_SETTLANG"}]</label>
            <select id="changelang" name="changelang" class="editinput" onChange="top.oxid.admin.changeLanguage();">
                [{foreach from=$languages item="lang"}]
                    <option value="[{$lang->id}]" [{if $lang->selected}]SELECTED[{/if}]>[{$lang->name}]</option>
                [{/foreach}]
            </select>
        [{/if}]
    </form>
[{/if}]

[{include file="pagetabsnippet.tpl"}]

<script type="text/javascript">
    [{assign var="rawMenuItemTitle" value=$oView->d3GetMenuItemTitle()}]
    [{assign var="rawMenuSubItemTitle" value=$oView->d3GetMenuSubItemTitle()}]
    if (parent.parent) {
        parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{$rawMenuItemTitle|oxmultilangassign|strip_tags}]";
        parent.parent.sMenuSubItem = "[{$rawMenuSubItemTitle|oxmultilangassign|strip_tags}]";
        parent.parent.sWorkArea    = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>
</body>
</html>
