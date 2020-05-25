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
        document.getElementById('mask').className='on';
        document.getElementById('popup').className='on';
        oForm = document.getElementById('delform');
        oForm.fnc.value = sFncName;
        oForm.submit();
    }
</script>


<style type="text/css">
    td.edittext {
        white-space: normal;
    }

    #popup {
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

<form name="delform" id="delform" action="[{$oViewConf->getSelfLink()}]" method="post" onsubmit="document.getElementById('mask').className='on';document.getElementById('popup').className='on'; return;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="clearTmp">


    <span class="d3modcfg_btn icon d3color-blue" style="margin-left: 17px;">
        <button id="sumbitbtn" type="button" name="save" onclick="sendForm('checkItems');">
            <i class="fas fa-info-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_CHECKALL"}]
        </button>
    </span>

    <table cellspacing="0" cellpadding="0" border="0" style="width: 98%; margin-top: 15px;">
        <tr>
            <td valign="top" class="edittext" width="50%">
                [{block name="d3cleartmp_form"}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGN"}] [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGN_DESC"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearAcc2Art}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignacc2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNACC2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNACC2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearAcc2Art');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearAcc2Art}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearAct2Art}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignact2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNACT2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNACT2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearAct2Art');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearAct2Art}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearArtextends}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignartextends">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNARTEXTENDS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNARTEXTENDS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearArtextends');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearArtextends}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearCat2Attrib}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassigncat2attrib">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearCat2Attrib');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearCat2Attrib}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearDel2Delset}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassigndel2delset">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNDEL2DELSET"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNDEL2DELSET_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearDel2Delset');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearDel2Delset}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearNewssubscribed}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignnewssubscribed">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearNewssubscribed');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearNewssubscribed}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Action}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2action">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2ACTION"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2ACTION_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Action');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Action}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Art}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Art');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Art}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Attrib}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2attrib">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Attrib');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Attrib}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Cat}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2cat">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2CAT"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2CAT_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Cat');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Cat}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObject2Delivery}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixoldoxdeliveryassignments">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2DEL"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2DEL_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObject2Delivery');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObject2Delivery}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Disc}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2disc">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2DISC"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2DISC_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Disc');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Disc}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Group}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2group">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2GROUP"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2GROUP_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Group');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Group}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2List}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2list">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2LIST"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2LIST_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2List');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2List}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Payment}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2payment">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Payment');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Payment}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearObj2Sellist}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignobj2sellist">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearObj2Sellist');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearObj2Sellist}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearPrice2Art}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixassignprice2art">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNPRICE2ART"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNPRICE2ART_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearPrice2Art');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearPrice2Art}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                [{/block}]
            </td>
            <td valign="top" class="edittext" align="left">
                [{block name="d3cleartmp_info"}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_INACTIVE"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.UnassignInactiveCountries}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="unassigninactivecountries">[{oxmultilang ident="D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('unassignInactiveCountries');}">
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
                                <td valign="top" class="edittext">
                                    <label for="inactivecategories">[{oxmultilang ident="D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('deactivateEmptyCategories');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.DeactivateEmptyCategories}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_MISSING"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.OxArtextendsItems}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixoxartextends">[{oxmultilang ident="D3_CFG_CLRTMP_OXARTICLECONSIST"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_OXARTICLECONSIST_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('fixOxArtextendsItems');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.OxArtextendsItems}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_VARIANTS"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" class="innerTbl">
                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.VariantParentAsVar}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixvariantparentisvar">[{oxmultilang ident="D3_CFG_CLRTMP_VARIANTPARENTISVAR"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_VARIANTPARENTISVAR_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('fixVariantParentAsVar');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.VariantParentAsVar}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.ClearVariantsWithoutParent}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixvariantswithoutparent">[{oxmultilang ident="D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CLEARDB"}]')) {sendForm('clearVariantsWithoutParent');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.ClearVariantsWithoutParent}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>

                            [{assign var="blShowItem" value=false}]
                            [{if $aCheckResults.VariantActive}]
                                [{assign var="blShowItem" value=true}]
                            [{/if}]
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="fixvariantactive">[{oxmultilang ident="D3_CFG_CLRTMP_VARIANTACTIVE"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_VARIANTACTIVE_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENERAL_CHANGEDB"}]')) {sendForm('fixVariantActive');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}][{if $blShowItem}] ([{$aCheckResults.VariantActive}])[{/if}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_OTHER"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" class="innerTbl">
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="cleargeneratedarticlepictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('clearGenArticleImgs');}">
                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="cleargeneratedcategorypictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENCATIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENCATIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('clearGenCategoryImgs');}">
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="cleargeneratedmanufacturerpictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENMNFIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENMNFIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('clearGenManufacturerImgs');}">
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="cleargeneratedvendorpictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENVNDIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENVNDIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('clearGenVendorImgs');}">
                                            <i class="fas fa-check-circle d3fa-17x fa-inverse"></i>[{oxmultilang ident="D3_CFG_MNT_SUBMIT"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="edittext">
                                    <label for="cleargeneratedwrappingpictures">[{oxmultilang ident="D3_CFG_CLRTMP_GENWRPIMGS"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_GENWRPIMGS_DESC"}]
                                </td>
                                <td>
                                    <span class="d3modcfg_btn fixed icon d3color-green[{if $blShowItem}] d3ShowItem[{/if}]" style="">
                                        <button id="sumbitbtn" type="button" name="save" onclick="if(confirm('[{oxmultilang ident="D3_CFG_CLRTMP_GENIMGS_WARN"}]')) {sendForm('clearGenWrappingImgs');}">
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
      http://d3data.local:81/FAQ/Datenbank/Abfragen/Variantenanzahl-mit-hinterlegtem-Wert-am-Vaterartikel-vergleichen.html
      http://d3data.local:81/FAQ/Datenbank/Daten-AEnderungen/Anzahl-verkaufter-Artikel-nachtragen.html
      http://d3data.local:81/FAQ/Datenbank/Daten-AEnderungen/Alte-Selectlisten-loeschen.html
      http://d3data.local:81/FAQ/Datenbank/Daten-AEnderungen/Vaterartikel-ohne-Varianten-finden.html
      ***}]
    </table>
</form>

<div id="mask" class=""></div>
<div id="popup" class=""><i class="fas fa-spinner fa-4x fa-pulse fa-pull-left"></i><span>[{oxmultilang ident="D3_CFG_PLEASEWAIT"}]</span></div>

[{include file="d3_cfg_mod_inc.tpl"}]