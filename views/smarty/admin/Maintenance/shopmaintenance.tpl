[{include file="headitem.tpl" title="d3tbclclr_mtn"|oxmultilangassign}]

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
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">
</form>

<script type="text/javascript">
    function sendForm(sFncName)
    {
        let oForm;
        document.getElementById('mask').className='on';
        document.getElementById('popup2').className='d3loader-2 on';
        oForm = document.getElementById('delform');
        oForm.action.value = sFncName;
        oForm.submit();
    }
    function sendCheckForm()
    {
        let oForm;
        document.getElementById('mask').className='on';
        document.getElementById('popup2').className='d3loader-2 on';
        oForm = document.getElementById('delform');
        oForm.fnc.value = 'checkitems';
        oForm.submit();
    }
</script>


<style>
    td.edittext {
        white-space: normal;
    }

    #popup2 {
        display: none;
    }

    .innerTbl {
        width: 100%;
    }

    .innerTbl td {
        padding: 5px 2px;
    }

    .innerTbl td:nth-child(2) {
        width: 185px;
    }

    form fieldset {
        margin-bottom: 20px;
    }

    form fieldset legend {
        font-weight: bold;
    }

    .innerTbl tr:nth-child(2n + 1) td {
        background-color: #fafafa;
    }

    .d3modcfg_btn.d3ShowItem {
        border: 1px solid red;
    }

    .d3modcfg_btn.d3color-green button {
        width: 150px;
    }

    .d3modcfg_btn.d3color-green.d3ShowItem button {
        width: auto;
        min-width: 150px;
    }
</style>

<form name="delform" id="delform" action="[{$oViewConf->getSelfLink()}]" method="post" onsubmit="document.getElementById('mask').className='on';document.getElementById('popup2').className='d3loader-2 on'; return;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="action" value="clearTmp">
    <input type="hidden" name="fnc" value="tidy">


    <span class="d3modcfg_btn icon d3color-blue" style="margin-left: 17px;">
        <button id="sumbitbtn" type="button" name="save" onclick="sendCheckForm();" [{$readonly}]>
            <i class="fas fa-info-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_CHECKALL"}]
        </button>
    </span>

    <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse; width: 100%; margin-top: 15px">
        <tr>
            <td style="vertical-align: top; width: 50%" class="edittext">
                [{block name="d3cleartmp_form"}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGN"}] [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGN_DESC"}]</legend>
                        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.AccessioreToArticleOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignacc2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNACC2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNACC2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('AccessioreToArticleOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.AccessioreToArticleOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ActionsToArticleOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignact2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNACT2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNACT2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('ActionsToArticleOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ActionsToArticleOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ArticleExtendsOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignartextends">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNARTEXTENDS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNARTEXTENDS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('ArticleExtendsOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ArticleExtendsOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.CategoryToAttributeOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassigncat2attrib">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('CategoryToAttributeOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.CategoryToAttributeOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.DeliveryToDeliverySetOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassigndel2delset">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNDEL2DELSET"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNDEL2DELSET_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('DeliveryToDeliverySetOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.DeliveryToDeliverySetOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.NewsSubscribedOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignnewssubscribed">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('NewsSubscribedOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.NewsSubscribedOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2ActionsOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2action">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2ACTION"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2ACTION_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2ActionsOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2ActionsOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2ArticleOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2ArticleOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2ArticleOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2AttributeOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2attrib">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2AttributeOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2AttributeOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2CategoryOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2cat">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2CAT"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2CAT_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2CategoryOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2CategoryOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2DeliveryOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixoldoxdeliveryassignments">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2DEL"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2DEL_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2DeliveryOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2DeliveryOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2DiscountOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2disc">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2DISC"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2DISC_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2DiscountOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2DiscountOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2GroupOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2group">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2GROUP"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2GROUP_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2GroupOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2GroupOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2ListOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2list">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2LIST"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2LIST_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2ListOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2ListOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2PaymentOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2payment">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2PaymentOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2PaymentOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Object2SelectlistOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignobj2sellist">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Object2SelectlistOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Object2SelectlistOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.Price2ArticleOrphans}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixassignprice2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNPRICE2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNPRICE2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('Price2ArticleOrphans')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.Price2ArticleOrphans}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                [{/block}]
            </td>
            <td style="vertical-align: top; text-align: left;" class="edittext">
                [{block name="d3cleartmp_info"}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_INACTIVE"}]</legend>
                        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.UnassignInactiveCountries}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="unassigninactivecountries">[{oxmultilang ident="D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('unassignInactiveCountries')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.UnassignInactiveCountries}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.DeactivateEmptyCategories}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="inactivecategories">[{oxmultilang ident="D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('DeactivateEmptyCategories')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.DeactivateEmptyCategories}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_MISSING"}]</legend>
                        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.InsertMissingArticleExtends}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixoxartextends">[{oxmultilang ident="D3_CFG_CLRTMP_OXARTICLECONSIST"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_OXARTICLECONSIST_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('InsertMissingArticleExtends')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.InsertMissingArticleExtends}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_VARIANTS"}]</legend>
                        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.SelfAssignedVariants}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixvariantparentisvar">[{oxmultilang ident="D3_CFG_CLRTMP_VARIANTPARENTISVAR"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_VARIANTPARENTISVAR_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('SelfAssignedVariants')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.SelfAssignedVariants}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearVariantsWithoutParent}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixvariantswithoutparent">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('ClearVariantsWithoutParent')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearVariantsWithoutParent}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.DisableVariantsWithInactiveParent}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="fixDisableVariantsWithInactiveParent">[{oxmultilang ident="D3_CFG_CLRTMP_VARIANTACTIVE"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_VARIANTACTIVE_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('DisableVariantsWithInactiveParent')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.DisableVariantsWithInactiveParent}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_OTHER"}]</legend>
                        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse" class="innerTbl">
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="cleargeneratedarticlepictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('ClearGeneratedArticleImages')}" [{$readonly}]>
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="cleargeneratedcategorypictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENCATIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENCATIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('ClearGeneratedCategoryImages')}" [{$readonly}]>
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="cleargeneratedmanufacturerpictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENMNFIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENMNFIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('ClearGeneratedManufacturerImages')}" [{$readonly}]>
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="cleargeneratedvendorpictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENVNDIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENVNDIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('ClearGeneratedVendorImages')}" [{$readonly}]>
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top" class="edittext">
                                    <label for="cleargeneratedwrappingpictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENWRPIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENWRPIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('ClearGeneratedWrappingImages')}" [{$readonly}]>
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                [{/block}]
            </td>
        </tr>
    [{***
      https://d3data.local:81/FAQ/Datenbank/Abfragen/Variantenanzahl-mit-hinterlegtem-Wert-am-Vaterartikel-vergleichen.html
      https://d3data.local:81/FAQ/Datenbank/Daten-AEnderungen/Anzahl-verkaufter-Artikel-nachtragen.html
      https://d3data.local:81/FAQ/Datenbank/Daten-AEnderungen/Alte-Selectlisten-loeschen.html
      https://d3data.local:81/FAQ/Datenbank/Daten-AEnderungen/Vaterartikel-ohne-Varianten-finden.html
      ***}]
    </table>
</form>

<div id="mask" class=""></div>
<div id="popup2" class="d3loader-2">
    <div class="d3loader-spinner">
        <div class="d3loader-circle-1"></div>
        <div class="d3loader-circle-2"></div>
        <div class="d3loader-circle-3"></div>
    </div>
</div>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]