[{include file="headitem.tpl" title="d3mxsysitems"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<script type="text/javascript">
    <!--
    function _groupExp(el) {
        let _cur = el.parentNode;

        if (_cur.className === "exp") _cur.className = "";
        else _cur.className = "exp";
    }
    -->
</script>

<style>
    .groupExp dl dt {
        font-weight:  normal;
        width:        55%;
        padding-left: 10px;
    }
</style>

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="getNewModPreview">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">

    <table style="border: none; width: 98%">
        <tr>
            <td style="vertical-align: top" class="edittext">
                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_CFG_MAINTENANCE_MODULES"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_CFG_MAINTENANCE_REPAIRMODULES"}]
                            </dt>
                            <dd>
                                <div class="d3modcfg_btn fixed icon d3color-blue" [{$readonly}]>
                                    <button type="submit" name="save" onclick="document.getElementById('myedit').fnc.value = 'repairModuleDbItems'; document.getElementById('myedit').submit(); return false;" [{$readonly}]>
                                        <i class="fas fa-question-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MODITEM_PREVIEW"}]
                                    </button>
                                </div>
                            </dd>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</form>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]
