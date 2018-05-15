[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
[{if $updatelist == 1}]
    UpdateList('[{$oxid}]');
[{/if}]

function getDetails(sElemId, sDisplayType)
{
    if (!sDisplayType) sDisplayType = 'table-row';

    oElem = document.getElementById(sElemId);
    if (oElem.style.display === sDisplayType)
        oElem.style.display = 'none';
    else
        oElem.style.display = sDisplayType;
}

function getUpdateStatus()
{
    document.getElementById('getRemote').submit();
}
-->
</script>

<style type="text/css">
<!--
body {
[{if $oView->getBgColor()}]
    background-color: [{$oView->getBgColor()}];
[{else}]
    background-color: #FAFAFA;
[{/if}]
    margin: 0;
}
div.box {
    border: 0 none transparent;
    height: 92%;
    [{if $oView->getBgColor()}]
        background: none [{$oView->getBgColor()}] !important;
    [{else}]
        background: none #FAFAFA !important;
    [{/if}]
}
div.actions {
    display: none;
}
fieldset{
    border: 1px inset black;
    background-color: #F0F0F0;
}

legend{
    font-weight: bold;
}

dl dt{
    font-weight: normal;
    width: 55%;
}

.ext_edittext {
    padding: 2px;
}

td.edittext {
    white-space: normal;
}

td.noaction,
a.noaction{
    color:#AAA;
}

td.noaction img,
td.action img {
	border: none;
}

.box td.listitem2,
.box td.listitem
{
    padding: 2px 5px;
}

td.listitem.action,
td.listitem2.action,
td.listitem.noaction,
td.listitem2.noaction {
   padding-left: 5px;
   padding-right: 5px;
}

td.listitem img,
td.listitem2 img,
td.listitem .image,
td.listitem2 .image {
	height: 20px;
}

.d3install_btn {
	background
}

.statusyellow {
	width: 5px;
    background-color: #FFCC00;
}

.statusgreen {
    width: 5px;
    background-color: #00CC22;
}

.statusblue {
    width: 5px;
    background-color: #0000FF;
}

.box td.listitem.itemerror,
.box td.listitem2.itemerror {
    color: darkred;
}

.box td.listitem.itemdisabled,
.box td.listitem2.itemdisabled {
    color: #888;
}

dl {border-top: none;}

dl dt {
    float: left;
    width: 270px;
    clear: both;
}

dl dd {
    float: left;
}

h4 {
    margin-top: 0;
}

-->
</style>

<div>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" id="activationform">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="modid" value="[{$oModule->d3GetModId()}]">

        [{if $oModule->isLicenseRequired() && $oView->getNextStep() == 'getActivationType'}]
            <input type="hidden" name="fnc" value="setStep1">
            <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_HEADLINE"}]</h4>
            <table style="border-style: none;" cellspacing="0" cellpadding="0">
                [{assign var="listclass" value="listitem2"}]
                <tr>
                    <td class="edittext [{$listclass}]">
                        <input id="boughtoxidmodule" value="boughtoxidmodule" type="radio" name="activationtype">
                    </td>
                    <td class="edittext [{$listclass}]">
                        <label for="boughtoxidmodule">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_OXIDMODULE"}]</label>
                    </td>
                    <td class="edittext [{$listclass}]">
                        [{*oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_OXIDMODULE_DESC"*}]
                    </td>
                </tr>

                [{assign var="listclass" value="listitem"}]
                <tr>
                    <td class="edittext [{$listclass}]">
                        <input id="boughtforeign" value="boughtforeign" type="radio" name="activationtype">
                    </td>
                    <td class="edittext [{$listclass}]">
                        <label for="boughtforeign">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN"}]</label>
                    </td>
                    <td class="edittext [{$listclass}]">
                        [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN_DESC"}]
                    </td>
                </tr>


                [{assign var="listclass" value="listitem2"}]
                <tr>
                    <td class="edittext [{$listclass}]">
                        <input id="usedemo" value="usedemo" type="radio" name="activationtype">
                    </td>
                    <td class="edittext [{$listclass}]">
                        <label for="usedemo">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_DEMO"}]</label>
                    </td>
                    <td class="edittext [{$listclass}]">
                        [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_DEMO_DESC"}]
                    </td>
                </tr>

                [{assign var="listclass" value="listitem"}]
                <tr>
                    <td class="edittext [{$listclass}]">
                        <input id="wantbuy" value="wantbuy" type="radio" name="activationtype">
                    </td>
                    <td class="edittext [{$listclass}]">
                        <label for="wantbuy">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_BUY"}]</label>
                    </td>
                    <td class="edittext [{$listclass}]">
                        [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_BUY_DESC"}]
                    </td>
                </tr>

                [{assign var="listclass" value="listitem2"}]
                <tr>
                    <td class="edittext [{$listclass}]">
                        <input id="notlisted" value="notlisted" type="radio" name="activationtype">
                    </td>
                    <td class="edittext [{$listclass}]">
                        <label for="notlisted">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_NOTLISTED"}]</label>
                    </td>
                    <td class="edittext [{$listclass}]">
                        [{*oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_NOTLISTED_DESC"*}]
                    </td>
                </tr>
            </table>
            [{assign var="blBackStep" value=false}]
            [{assign var="blNextStep" value=true}]
        [{elseif $oModule->isLicenseRequired() && $oView->getNextStep() == 'getActivationData'}]
            <input type="hidden" name="fnc" value="setStep2">
            <input type="hidden" name="activationtype" value="[{$oView->getActivationType()}]">
            [{if $oView->getActivationType() == 'boughtoxidmodule' || $oView->getActivationType() == 'usedemo'}]
                [{assign var="oShop" value=$oView->getSubmitLicenceShop()}]
                <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_HEADLINE"}]</h4>
                <table style="border-style: none;" cellspacing="0" cellpadding="0">
                    [{assign var="listclass" value="listitem2"}]
                    <tr>
                        <td class="edittext [{$listclass}]">
                            [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_MODULE"}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{$oModule->d3GetModId()}] ([{$oModule->getModTitle()}])
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_MODULE_DESC"}]
                        </td>
                    </tr>

                    [{assign var="listclass" value="listitem"}]
                    <tr>
                        <td class="edittext [{$listclass}]">
                            [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_MODVERSION"}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{$oModule->getModVersion()}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_MODVERSION_DESC"}]
                        </td>
                    </tr>

                    [{assign var="listclass" value="listitem2"}]
                    <tr>
                        <td class="edittext [{$listclass}]">
                            [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_DOMAIN"}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{$oView->getSubmitLicenceDomain()}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_DOMAIN_DESC"}]
                        </td>
                    </tr>

                    [{assign var="listclass" value="listitem"}]
                    <tr>
                        <td class="edittext [{$listclass}]">
                            [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_SHOP"}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{$oShop->getId()}] ([{$oShop->getFieldData('oxname')}])
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_SHOP_DESC"}]
                        </td>
                    </tr>

                    [{assign var="listclass" value="listitem2"}]
                    <tr>
                        <td class="edittext [{$listclass}]">
                            [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_EDITION"}]
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{$oView->getSubmitShopEdition(0)}] ([{$oView->getSubmitShopEdition(1)}])
                        </td>
                        <td class="edittext [{$listclass}]">
                            [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_EDITION_DESC"}]
                        </td>
                    </tr>

                    [{if $oView->getActivationType() == 'boughtoxidmodule'}]
                        [{assign var="listclass" value="listitem"}]
                        <tr>
                            <td class="edittext [{$listclass}]">
                                <label for="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER"}]</label>
                            </td>
                            <td class="edittext [{$listclass}]">
                                <textarea id="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER" class="editinput" cols="82" name="licencekey" style="font-family: Courier, monospace; height: 60px; font-size: 10px;"></textarea>
                            </td>
                            <td class="edittext [{$listclass}]">
                                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER_DESC"}]
                            </td>
                        </tr>
                    [{/if}]
                </table>

                [{if $oView->getActivationType() == 'usedemo'}]
                    <div class="clear"></div>
                    <p>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_DEMO_DESC"}]</p>
                [{/if}]
                <div class="clear"></div>
                [{assign var="blBackStep" value=true}]
                [{assign var="blNextStep" value=true}]
            [{elseif $oView->getActivationType() == "boughtforeign"}]
                <input type="hidden" name="activationtype" value="">
                <input type="hidden" name="fnc" value="">
                <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_FOREIGN_HEADLINE"}]</h4>
                <p>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_FOREIGN_DESC"}]</p>
                <div class="clear"></div>
                [{assign var="blBackStep" value=true}]
                [{assign var="blNextStep" value=false}]
            [{elseif $oView->getActivationType() == 'wantbuy'}]
                <input type="hidden" name="activationtype" value="">
                <input type="hidden" name="fnc" value="">
                <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_BUY_HEADLINE"}]</h4>
                [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_BUY_DESC_1"}]
                http://www.oxidmodule.com/index.php?cl=search&searchparam=[{$oModule->d3GetModId()}]
                [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_BUY_DESC_2"}]
                <div class="clear"></div>
                [{assign var="blBackStep" value=true}]
                [{assign var="blNextStep" value=false}]
            [{elseif $oView->getActivationType() == "notlisted"}]
                <input type="hidden" name="activationtype" value="">
                <input type="hidden" name="fnc" value="">
                <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_NOTLISTED_HEADLINE"}]</h4>
                [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_NOTLISTED_DESC"}]
                <div class="clear"></div>
                [{assign var="blBackStep" value=true}]
                [{assign var="blNextStep" value=false}]
            [{/if}]
        [{elseif $oModule->isLicenseRequired() && $oView->getNextStep() == 'submitData'}]
            <input type="hidden" name="fnc" value="">
            <input type="hidden" name="activationtype" value="[{$oView->getActivationType()}]">
            [{if !$oView->getSubmitStatus()}]
                <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_HL"}]</h4>
                <p>[{$oView->getExpirationMessage()}]</p>
                <textarea style="width: 600px; height: 130px; font-family: Courier, monospace;">[{$oView->getModuleSerial()}]</textarea>
                [{assign var="blBackStep" value=true}]
                [{assign var="blNextStep" value=false}]
            [{else}]
                <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_NSUCCESS_HL"}]</h4>
                <p>[{$oView->getNotSuccessMessage()}]</p>
                [{assign var="blBackStep" value=true}]
                [{assign var="blNextStep" value=false}]
            [{/if}]
        [{elseif $oView->getNextStep() == 'saveSerialSuccess'}]
            <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_HL"}]</h4>
            <p>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SAVESERIALSUCC"}]</p>
            [{assign var="blBackStep" value=false}]
            [{assign var="blNextStep" value=false}]
        [{/if}]

        [{if $blBackStep}]
            <span class="d3modcfg_btn icon d3color-blue" style="margin: 10px 0 0 0; margin-right: 23px;">
                <button type="button" onclick="aElems = document.getElementsByName('activationtype'); aElems[0].value = ''; aFElems = document.getElementsByName('fnc'); aFElems[0].value = ''; document.getElementById('activationform').submit();">
                    <i class="fas fa-reply fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_BACK"}]
                </button>
            </span>
        [{/if}]
        [{if $blNextStep}]
            <span class="d3modcfg_btn icon d3color-green" style="margin: 10px 0 0 0;">
                <button type="submit">
                    <i class="fas fa-check-circle fa-inverse"></i>[{$oView->getSubmitText()}]
                </button>
            </span>
        [{/if}]
    </form>

    [{include file="d3_cfg_mod_inc.tpl"}]

    [{include file="bottomitem.tpl"}]