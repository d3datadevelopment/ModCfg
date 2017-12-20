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
        var oTransfer = parent.edit.document.getElementById("transfer");
        oTransfer.oxid.value=sID;
        oTransfer.cl.value='[{if $actlocation}][{$actlocation|escape:"javascript"}][{else}][{$default_edit|escape:"javascript"}][{/if}]';

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();

        var oSearch = document.getElementById("search");
        oSearch.oxid.value=sID;
        oSearch.submit();
    }
//-->
</script>

<div id="liste">

<form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">
[{include file="_formparams.tpl" cl=$oViewConf->getActiveClassName() lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <colgroup>
        [{block name="admin_d3tplblocks_list_colgroup"}]
        	<col width="3%">
            <col width="30%">
            <col width="30%">
            <col width="30%">
            <col width="5%">
            <col width="2%">
        [{/block}]
    </colgroup>
    <tr class="listitem">
        [{block name="admin_d3tplblocks_list_filter"}]
        	<td valign="top" class="listfilter first" align="right">
				<div class="r1"><div class="b1">&nbsp;</div></div>
	        </td>
            <td valign="top" class="listfilter" height="20">
                <div class="r1"><div class="b1">
                &nbsp;&nbsp;<input class="listedit" type="text" size="30" maxlength="128" name="where[oxtplblocks][oxmodule]" value="[{$where.oxtplblocks.oxmodule}]">
                </div></div>
            </td>
            <td valign="top" class="listfilter" height="20">
                <div class="r1"><div class="b1">
                &nbsp;&nbsp;<input class="listedit" type="text" size="30" maxlength="128" name="where[oxtplblocks][oxtemplate]" value="[{$where.oxtplblocks.oxtemplate}]">
                </div></div>
            </td>
            <td valign="top" class="listfilter" height="20">
                <div class="r1"><div class="b1">
                <input class="listedit" type="text" size="32" maxlength="32" name="where[oxtplblocks][oxblockname]" value="[{$where.oxtplblocks.oxblockname}]">
                </div></div>
            </td>
            <td valign="top" class="listfilter" height="20">
                <div class="r1"><div class="b1">
                <input class="listedit" type="text" size="4" maxlength="4" name="where[oxtplblocks][oxpos]" value="[{$where.oxtplblocks.oxpos}]">
                </div></div>
            </td>
            <td valign="top" class="listfilter" height="20">
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
        	<td class="listheader first" height="15" width="30" align="center"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxactive', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="GENERAL_ACTIVTITLE"}]</a></td>
            <td class="listheader" height="15">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxmodule', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLMODULE"}]</a></td>
            <td class="listheader">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxtemplate', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLTEMPLATE"}]</a></td>
            <td class="listheader"> <a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxtplblocks', 'oxblockname', 'asc');document.search.submit();" class="listheader">[{oxmultilang ident="D3TPLBLOCKNAME"}]</a></td>
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
                [{assign var="listclass" value=listitem3}]
            [{else}]
                [{assign var="listclass" value=listitem$blWhite}]
            [{/if}]
            [{if $listitem->getId() == $oxid}]
                [{assign var="listclass" value=listitem4}]
            [{/if}]
            <td valign="top" class="[{$listclass}][{if $listitem->getFieldData('oxactive') == 1}] active[{/if}]" height="15"><div class="listitemfloating">&nbsp</a></div></td>
            <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxmodule')}]</a></div></td>
            <td valign="top" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxtemplate')}]</a></div></td>
            <td valign="top" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxblockname')}]</a></div></td>
            <td valign="top" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxpos')}]</a></div></td>
            [{*<td valign="top" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxfile')}]</a></div></td>*}]
            <td class="[{$listclass}]">
            [{if !$readonly}]
            <a href="Javascript:top.oxid.admin.deleteThis('[{$listitem->getId()}]');" class="delete" id="del.[{$_cnt}]" alt="" [{include file="help.tpl" helpid=item_delete}]></a>
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
[{include file="pagenavisnippet.tpl" colspan="6"}]
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