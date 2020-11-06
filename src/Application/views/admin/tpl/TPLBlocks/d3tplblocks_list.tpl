[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]
[{assign var="where" value=$oView->getListFilter()}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<style type="text/css">
    .tabs .disabled .b1 a {
        color: #787878;
    }
</style>

<script type="text/javascript">
<!--
    window.onload = function ()
    {
        top.reloadEditFrame();
        [{if $updatelist == 1}]
            top.oxid.admin.updateList('[{$oxid}]');
        [{/if}]
    }

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
//-->
</script>

<div id="liste">

    <form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">
        [{include file="_formparams.tpl" cl=$oViewConf->getActiveClassName() lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
        <table style="width: 100%; border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
            <colgroup>
                [{block name="admin_d3tplblocks_list_colgroup"}]
                    <col style="width: 3%">
                    <col style="width: 22%">
                    <col style="width: 23%">
                    <col style="width: 23%">
                    <col style="width: 22%">
                    <col style="width: 5%">
                    <col style="width: 2%">
                [{/block}]
            </colgroup>
            <tr class="listitem">
                [{block name="admin_d3tplblocks_list_filter"}]
                    <td style="text-align: right; vertical-align: top" class="listfilter first">
                        <div class="r1"><div class="b1">&nbsp;</div></div>
                    </td>
                    <td style="height: 20px; vertical-align: top" class="listfilter">
                        <label style="display: none;" for="oxtplblocks__oxmodule">[{oxmultilang ident="D3TPLMODULE"}]</label>
                        <div class="r1"><div class="b1">
                        &nbsp;&nbsp;<input class="listedit" type="text" size="30" maxlength="128" id="oxtplblocks__oxmodule" name="where[oxtplblocks][oxmodule]" value="[{$where.oxtplblocks.oxmodule}]">
                        </div></div>
                    </td>
                    <td style="height: 20px; vertical-align: top" class="listfilter">
                        <label style="display: none;" for="oxtplblocks__oxtemplate">[{oxmultilang ident="D3TPLTEMPLATE"}]</label>
                        <div class="r1"><div class="b1">
                        &nbsp;&nbsp;<input class="listedit" type="text" size="30" maxlength="128" id="oxtplblocks__oxtemplate" name="where[oxtplblocks][oxtemplate]" value="[{$where.oxtplblocks.oxtemplate}]">
                        </div></div>
                    </td>
                    <td style="height: 20px; vertical-align: top" class="listfilter">
                        <label style="display: none;" for="oxtplblocks__oxblockname">[{oxmultilang ident="D3TPLBLOCKNAME"}]</label>
                        <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="32" maxlength="32" id="oxtplblocks__oxblockname" name="where[oxtplblocks][oxblockname]" value="[{$where.oxtplblocks.oxblockname}]">
                        </div></div>
                    </td>
                    <td style="height: 20px; vertical-align: top" class="listfilter">
                        <label style="display: none;" for="oxtplblocks__oxtheme">[{oxmultilang ident="D3TPLTHEME"}]</label>
                        <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="32" maxlength="32" id="oxtplblocks__oxtheme" name="where[oxtplblocks][oxtheme]" value="[{$where.oxtplblocks.oxtheme}]">
                        </div></div>
                    </td>
                    <td style="height: 20px; vertical-align: top" class="listfilter">
                        <label style="display: none;" for="oxtplblocks__oxpos">[{oxmultilang ident="D3TPLPOS"}]</label>
                        <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="4" maxlength="4" id="oxtplblocks__oxpos" name="where[oxtplblocks][oxpos]" value="[{$where.oxtplblocks.oxpos}]">
                        </div></div>
                    </td>
                    <td style="height: 20px; vertical-align: top" class="listfilter">
                        <div class="r1"><div class="b1">
                        <div class="find">
                            <input class="listedit" type="submit" name="submitit" value="[{oxmultilang ident="GENERAL_SEARCH"}]">
                        </div>
                        </div></div>
                    </td>
                [{/block}]
            </tr>
            <tr>
                [{block name="admin_d3tplblocks_list_sorting"}]
                    <td class="listheader first" style="height: 15px; width: 30px; text-align: center"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxactive', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="GENERAL_ACTIVTITLE"}]</a></td>
                    <td class="listheader" height="15">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxmodule', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLMODULE"}]</a></td>
                    <td class="listheader">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxtemplate', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLTEMPLATE"}]</a></td>
                    <td class="listheader"> <a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxblockname', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLBLOCKNAME"}]</a></td>
                    <td class="listheader"> <a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxtheme', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLTHEME"}]</a></td>
                    <td class="listheader" colspan="2"> <a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxpos', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLPOS"}]</a></td>
                [{/block}]
            </tr>

            [{assign var="blWhite" value=""}]
            [{assign var="_cnt" value=0}]
            [{foreach from=$mylist item=listitem}]
                [{assign var="_cnt" value=$_cnt+1}]
                <tr id="row.[{$_cnt}]">

                    [{block name="admin_d3tplblocks_list_item"}]
                        [{if $listitem->blacklist == 1}]
                            [{assign var="listclass" value="listitem3"}]
                        [{else}]
                            [{assign var="listclass" value="listitem"|cat:$blWhite}]
                        [{/if}]
                        [{if $listitem->getId() == $oxid}]
                            [{assign var="listclass" value="listitem4"}]
                        [{/if}]
                        <td style="vertical-align: top; height: 15px" class="[{$listclass}][{if $listitem->getFieldData('oxactive') == 1}] active[{/if}]"><div class="listitemfloating">&nbsp</a></div></td>
                        <td style="vertical-align: top; height: 15px" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxmodule')}]</a></div></td>
                        <td style="vertical-align: top; height: 15px" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxtemplate')}]</a></div></td>
                        <td style="vertical-align: top; height: 15px" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxblockname')}]</a></div></td>
                        <td style="vertical-align: top; height: 15px" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxtheme')}]</a></div></td>
                        <td style="vertical-align: top; height: 15px" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxpos')}]</a></div></td>
                        <td class="[{$listclass}]">
                        [{if !$readonly}]
                        <a href="Javascript:top.oxid.admin.deleteThis('[{$listitem->getId()}]');" class="delete" id="del.[{$_cnt}]" [{include file="help.tpl" helpid=item_delete}]></a>
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
            [{include file="pagenavisnippet.tpl" colspan="7"}]
        </table>
    </form>
</div>

[{include file="pagetabsnippet.tpl" noOXIDCheck="true"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{"mxextensions"|oxmultilangassign|strip_tags}]";
        parent.parent.sMenuSubItem = "[{"d3mxtplblocks"|oxmultilangassign|strip_tags}]";
        parent.parent.sWorkArea    = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>

</body>
</html>