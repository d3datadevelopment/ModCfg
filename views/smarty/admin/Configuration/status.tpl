[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{if $updatelist == 1}]
    UpdateList('[{$oxid}]');
    [{/if}]

let sOldElemId = false;

function getDetails(sElemId, sDisplayType, blCollapseOld)
{
    if (!sDisplayType) sDisplayType = 'table-row';

    if (blCollapseOld) {
        if (sOldElemId && sOldElemId !== sElemId) {
            getDetails(sOldElemId, sDisplayType);
        }

        sOldElemId = sElemId;
    }

    let oElem = document.getElementById(sElemId);
    if (oElem.style.display === sDisplayType) {
        oElem.style.display = 'none';
    } else {
        oElem.style.display = sDisplayType;
    }
}

    function showLicForm(sElemId, URI)
    {
        let sFormElemId = sElemId + '__licform';
        let oElem = document.getElementById(sFormElemId);

        let sDisplayType = 'block';
        getDetails(sFormElemId, sDisplayType, true);
        if (oElem.style.display === sDisplayType) {
            document.getElementById(sElemId + '__licensefrm').src = decodeURIComponent(URI);
        }
    }

    function getUpdateStatus()
    {
        document.getElementById('getRemote').submit();
    }
    -->
</script>

<style>
    <!--
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

    .clickable {
        cursor: pointer;
    }

    dl {
        border-top: 0 none;
        padding-top: 0;
        margin-top: 0;
    }

    dl dt {
        clear: both;
        float: left;
    }

    dl dt.listitem,
    dl dd.listitem,
    dl dt.listitem2,
    dl dd.listitem2
    {
        min-height: 21px;
        padding: 2px 4px;
    }

    dl dt.listitem2,
    dl dd.listitem2
    {
        background-color: #F0F0F0;
    }

    .licframe {
        width: 99%;
        height: 293px;
        border: 0 none transparent;
    }

    -->
</style>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="actshop" value="[{$shop->id}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

[{if $sInstallModId}]
    [{oxmultilang ident="D3_CFG_MOD_VERSION_INSTALLSTATUS"}]
    <iframe src="[{$oView->getInstallModiFrameLink()}]" style="width: 100%; height: 95%; border: none; overflow: hidden" name="d3_mod_install">
    </iframe>
    <style>
        div.box{background-image: none !important;}
    </style>

[{else}]
    [{if $sErrorMLMsg}]
        <div class="extension_error">
            [{oxmultilang ident=$sErrorMLMsg}]
        </div>
    [{/if}]
    <table style="border: none; width: 98%">
        <tr>
            <td style="vertical-align: top" class="edittext">
                [{assign var="aRemoteMods" value=$oView->getRemoteMods()}]
                [{assign var="sDownloadField" value=$oView->getPhpVersionDownloadField()}]
                <fieldset>
                    <legend>
                        [{oxmultilang ident=$oView->getTitleIdent()}]
                    </legend>
                    <table style="width: 100%;">
                        <colgroup>
                            <col style="width: 35px">
                            <col style="width: 40px">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col style="width: 40px">
                        </colgroup>
                        <tr>
                            <th>[{oxmultilang ident="D3_CFG_LIB_STATUS"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_UPDATE"}]</th>
                            [{if $oView->getModuleType() == 'lib'}]
                                <th>[{oxmultilang ident="D3_CFG_LIB_LIBRARY"}]</th>
                            [{else}]
                                <th>[{oxmultilang ident="D3_CFG_LIB_EXTENSION"}]</th>
                            [{/if}]
                            <th>[{oxmultilang ident="D3_CFG_LIB_INSTALLDATE"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_INSTALLED"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_AVAILABLE"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_INFO"}]</th>
                        </tr>

                        [{assign var="blWhite" value=""}]
                        [{foreach from=$oView->getInstalledModuleList() item="oModule" key="sKey"}]
                            [{assign var="listclass" value="listitem"|cat:$blWhite}]

                            [{if !$oModule->getId()}]
                                [{assign var="formatclass" value=""}]
                                [{assign var="iconclass" value="far fa-plus-circle d3fa-17x d3fa-color-disabled"}]
                            [{elseif $oModule->getErrorMessage()}]
                                [{assign var="formatclass" value="itemerror"}]
                                [{assign var="iconclass" value="fas fa-exclamation-triangle d3fa-17x d3fa-color-red"}]
                            [{elseif !$oModule->isActive()}]
                                [{assign var="formatclass" value="itemdisabled"}]
                                [{assign var="iconclass" value="fas fa-check-circle d3fa-17x d3fa-color-disabled"}]
                            [{else}]
                                [{assign var="formatclass" value=""}]
                                [{assign var="iconclass" value="fas fa-check-circle d3fa-17x d3fa-color-green"}]
                            [{/if}]

                            [{assign var="aRemoteModData" value=$oView->getRemoteModuleData($oModule->d3GetModId())}]

                            [{if $oView->moduleIsNewestVersion($oModule, $aRemoteModData)}]
                                [{assign var="updateicon" value="fas fa-check-circle d3fa-17x d3fa-color-green"}]
                                [{assign var="icondesc" value="D3_MOD_LIB_NOACTION"|oxmultilangassign}]
                            [{elseif $oView->hasNewerModuleVersion($oModule, $aRemoteModData)}]
                                [{assign var="updateicon" value="fas fa-exclamation-triangle d3fa-17x d3fa-color-orange"}]
                                [{assign var="icondesc" value="D3_MOD_EXT_REFRESH"|oxmultilangassign}]
                            [{elseif $blGetRemoteUpdateStatus}]
                                [{assign var="updateicon" value="far fa-question-circle d3fa-17x d3fa-color-disabled"}]
                                [{assign var="icondesc" value="D3_MOD_LIB_NOUPDATEINFO"|oxmultilangassign}]
                            [{else}]
                                [{assign var="updateicon" value="far fa-question-circle d3fa-17x d3fa-color-disabled"}]
                                [{assign var="icondesc" value="D3_CFG_LIB_GETLIBLIST"|oxmultilangassign}]
                            [{/if}]
                            <tr>
                                <td class="[{$listclass}] [{$formatclass}] clickable" style="height: 24px; text-align: center;" onClick="getDetails('[{$sKey}]'); return false;">
                                    <label class="[{$iconclass}]" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]"></label>
                                </td>
                                <td class="[{$listclass}] [{$formatclass}] clickable" style="height: 24px; text-align: center;" onClick="getUpdateStatus(); return false;">
                                    <label class="[{$updateicon}]" title="[{$icondesc}]"></label>
                                </td>
                                <td class="[{$listclass}] [{$formatclass}] clickable" style="background-image: url('[{$oViewConf->getResourceUrl()}]bg/grouping.gif'); background-repeat: no-repeat; background-position: 0 -37px; padding: 5px; padding-left: 15px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    <b>[{$oView->getModTitle($oModule)}]</b> ([{$oModule->getFieldData('oxmodid')}])
                                </td>
                                <td class="[{$listclass}] [{$formatclass}] clickable" style="padding: 5px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    [{$oModule->getFieldData('oxinstalldate')|date_format:"%d.%m.%Y %H:%M"}]
                                </td>
                                <td class="[{$listclass}] [{$formatclass}] clickable" style="padding: 5px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    [{$oModule->getFieldData('oxversion')}] [{$oModule->getFieldData('oxshopversion')}]
                                </td>
                                <td class="[{$listclass}] [{$formatclass}] clickable" style="padding: 5px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    [{if isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.version}]
                                        [{$aRemoteModData.newestversion.version}]
                                    [{elseif isset($aRemoteModData.availableversion) && $aRemoteModData.availableversion.version}]
                                        [{$aRemoteModData.availableversion.version}]
                                    [{else}]
                                        [{oxmultilang ident="D3_CFG_LIB_VERSIONUNKNOWN"}]
                                    [{/if}]
                                </td>
                                <td class="[{$listclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                    [{if isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.infourl}]
                                        <a target="modinfo" class="" href="[{$aRemoteModData.newestversion.infourl}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                            <span class="fas fa-info-circle d3fa-17x d3fa-color-blue"></span>
                                        </a>
                                    [{elseif isset($aRemoteModData.availableversion) && $aRemoteModData.availableversion.infourl}]
                                        <a target="modinfo" class="" href="[{$aRemoteModData.availableversion.infourl}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                            <span class="fas fa-info-circle d3fa-17x d3fa-color-blue"></span>
                                        </a>
                                    [{else}]
                                        <label class="fas fa-info-circle d3fa-17x d3fa-color-disabled" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></label>
                                    [{/if}]
                                </td>
                            </tr>
                            [{if (isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.note) || (isset($aRemoteModData.availableversion) && $aRemoteModData.availableversion.note)}]
                                <tr>
                                    <td colspan="7" class="[{$listclass}] [{$formatclass}]" style="padding: 5px; text-align: center;">
                                        [{if isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.note}]
                                            [{$aRemoteModData.newestversion.note}]
                                        [{elseif $aRemoteModData.availableversion.note}]
                                            [{$aRemoteModData.availableversion.note}]
                                        [{/if}]
                                    </td>
                                </tr>
                            [{/if}]
                            <tr id="[{$sKey}]" style="display: [{if $oModule->getErrorMessage() || $oView->getErrorMessage()}]table-row[{else}]none[{/if}];">
                                <td colspan="7" class="[{$listclass}]" style="height: 30px; border: 1px solid #CCC; border-top-style: none; padding: 5px; padding-bottom: 10px;">
                                    [{if $oModule->getErrorMessage() || $oView->getErrorMessage()}]
                                        <div class="extension_error">
                                            [{$oModule->getErrorMessage()}]
                                            [{if $oModule->getErrorMessage() && $oView->getErrorMessage()}]<br>[{/if}]
                                            [{$oView->getErrorMessage()}]
                                        </div>
                                    [{/if}]

                                    <form action="[{$oViewConf->getSelfLink()}]" method="post">
                                        [{$oViewConf->getHiddenSid()}]
                                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                        <input type="hidden" name="fnc" value="saveModCfg">
                                        <input type="hidden" name="editval[oxid]" value="[{$oModule->getId()}]">
                                        <input type="hidden" name="oxmodid" value="[{$sKey}]">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="width:50%; border-right: 1px solid #999; vertical-align: top;">
                                                    <table style="width: 100%; border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                                                        <tr>
                                                            <td class="edittext ext_edittext">
                                                                <label for="[{$oModule->getId()}]_active">[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULEACTIVE"}]</label>
                                                            </td>
                                                            <td class="edittext ext_edittext">
                                                                <input type="hidden" name="[{if $oView->getModuleType() != 'lib'}]editval[oxactive][{/if}]" value='0'>
                                                                <input id="[{$oModule->getId()}]_active" class="edittext ext_edittext" type="checkbox" name="[{if $oView->getModuleType() != 'lib'}]editval[oxactive][{/if}]" value='1' [{if $oModule->getFieldData('oxactive') == 1}]checked[{/if}] [{$readonly}]>
                                                                [{oxinputhelp ident="D3_CFG_MOD_GENERAL_MODULEACTIVE_DESC"}]
                                                            </td>
                                                        </tr>
                                                        [{assign var="oLog" value=$oModule->d3getLog()}]
                                                        [{assign var="oLogSet" value=$oLog->getLogSet()}]
                                                        <tr>
                                                            <td class="edittext ext_edittext">
                                                                <label for="loglevelelement">[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING"}]</label>
                                                            </td>
                                                            <td class="edittext ext_edittext">
                                                                [{include file="@d3modcfg_lib/admin/inc/loglevel_form.tpl" oLogSet=$oLogSet oModule=$oModule}]
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="width:50%;">
                                                    [{if isset($aRemoteModData.newestversion) || isset($aRemoteModData.availableversion)}]
                                                        <table style="width: 100%; border: none; padding: 0; border-spacing: 0; border-collapse: collapse" >
                                                            [{if $aRemoteModData.availableversion.version}]
                                                                <tr>
                                                                    <td>
                                                                        [{oxmultilang ident="D3_CFG_MOD_VERSION_AVAILVERSION"}]
                                                                    </td>
                                                                    <td>
                                                                        [{$aRemoteModData.availableversion.version}]
                                                                    </td>
                                                                </tr>
                                                            [{/if}]
                                                            [{if isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.version}]
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <hr>
                                                                    </td>
                                                                <tr>
                                                                    <td>
                                                                        [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION"}]
                                                                    </td>
                                                                    <td>
                                                                        [{$aRemoteModData.newestversion.version}]
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" style="padding-top: 10px;">
                                                                        [{if $oView->check4ShopUpdate($aRemoteModData.newestversion.fromshop)}]
                                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_1"}] [{$aRemoteModData.newestversion.fromshop}] [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_2"}]<br>
                                                                        [{/if}]
                                                                        [{if $oView->check4LicenseUpdate($oModule->d3GetModId(), $aRemoteModData.newestversion.version)}]
                                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_LIC"}]<br>
                                                                        [{/if}]
                                                                    </td>
                                                                </tr>
                                                            [{/if}]
                                                        </table>
                                                    [{/if}]
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <br>
                                                    <span class="d3modcfg_btn icon d3color-green">
                                                        <button type="submit" name="save" [{$readonly}]>
                                                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]
                                                        </button>
                                                    </span>
                                                    [{if $oModule->isLicenseRequired()}]
                                                        <span class="d3modcfg_btn icon d3color-blue" style="margin-left: 20px;">
                                                            [{assign var="licFrameUrl" value=$oView->getLicenceFrameUrl($oModule->d3GetModId())}]
                                                            <button type="button" onClick="showLicForm('[{$sKey}]', '[{$licFrameUrl|oxescape:"url"}]'); return false;" [{$readonly}]>
                                                                <i class="fas fa-tag fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_ADDKEY"}]
                                                            </button>
                                                        </span>

                                                        [{if $oModule->getFieldData('oxserial')}]
                                                            <span class="d3modcfg_btn icon d3color-blue" style="margin-left: 20px;">
                                                                <button type="button" onClick="getDetails('[{$sKey}]__licinfo', 'block', true); return false;" [{$readonly}]>
                                                                    <i class="fas fa-info-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_SHOWKEY"}]
                                                                </button>
                                                            </span>
                                                        [{/if}]
                                                    [{/if}]
                                                    <br><br>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                    [{if $oModule->isLicenseRequired() && $oModule->getFieldData('oxserial')}]
                                        <div id="[{$sKey}]__licinfo" style="padding-left: 10px; display: none;">
                                            <hr>
                                            <h4>[{oxmultilang ident="D3_CFG_MOD_LICDETAILS"}]</h4>
                                            [{assign var="itemno" value="2"}]
                                            <dl>
                                                [{if $oView->getLicenseData($oModule, 'result')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_GENERALVALID"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{assign var="resultKey" value=$oView->getLicenseData($oModule, 'result')|upper}]
                                                        [{assign var="translKey" value="D3_CFG_MOD_STATUS_"|cat:$resultKey}]
                                                        [{oxmultilang ident=$translKey}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'domain')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDDOMAIN"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oView->getLicenseData($oModule, 'domain')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'allow_local')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                        [{oxinputhelp ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL_DESC"}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'startdate')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFROMDATE"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oView->getLicenseData($oModule, 'startdate')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'enddate')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDTODATE"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{if $oModule->getExpireSpan() > 756864000}]
                                                            [{oxmultilang ident="D3_CFG_MOD_STATUS_NEVER_EXPIRES"}]
                                                        [{else}]
                                                            [{$oView->getLicenseData($oModule, 'enddate')}] ([{$oView->getExpireSpanString($oModule)}])
                                                        [{/if}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'modid')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODID"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oView->getLicenseData($oModule, 'modid')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'modversion')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODVERSION"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oView->getLicenseData($oModule, 'modversion')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getFormatedShopEditionList($oModule)}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORSHOPEDITION"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oModule->getFormatedShopEditionList()}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getFormatedShopIdList($oModule)}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORSHOPID"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oView->getFormatedShopIdList($oModule)}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getLicenseData($oModule, 'isdemo')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_ISTEST"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{if $oView->getLicenseData($oModule, 'isdemo')}]
                                                            [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                        [{/if}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oView->getConfigInfoData($oModule)}]
                                                    [{foreach from=$oView->getConfigInfoData($oModule) key="sLicDataKey" item="mValue"}]
                                                        [{assign var="translation" value=$oModule->getLicenceOptionTranslation($sLicDataKey)}]
                                                        [{if $translation}]
                                                            [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                            <dt class="listitem[{$itemno}]">
                                                                [{$translation}]
                                                            </dt>
                                                            <dd class="listitem[{$itemno}]">
                                                                [{$mValue}]
                                                            </dd>
                                                        [{/if}]
                                                    [{/foreach}]
                                                [{/if}]
                                                [{if $oModule->getFieldData('oxactident')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]"><label for="actident">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_ACTIDENT"}]</label></dt>
                                                    <dd class="listitem[{$itemno}]">[{$oModule->getFieldData('oxactident')}]</dd>
                                                [{/if}]
                                                [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                <dt class="listitem[{$itemno}]"><label for="licencekey">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_LICKEY"}]</label></dt>
                                                <dd class="listitem[{$itemno}]">
                                                    [{strip}]
                                                        <textarea id="licencekey" style="width: 300px; height: 100px;">
                                                            [{$oModule->getFieldData('oxserial')}]
                                                        </textarea>
                                                    [{/strip}]
                                                </dd>
                                            </dl>
                                        </div>
                                        <div class="clear"></div>
                                    [{/if}]
                                    [{if $oModule->isLicenseRequired()}]
                                        <div id="[{$sKey}]__licform" style="display: none; padding-left: 10px;">
                                            <hr>
                                            <div class="licframe" style="display: flex; justify-content: center; align-items: center; position: relative">
                                                <div class="d3loader-2 small" style="position: absolute">
                                                    <div class="d3loader-spinner">
                                                        <div class="d3loader-circle-1"></div>
                                                        <div class="d3loader-circle-2"></div>
                                                        <div class="d3loader-circle-3"></div>
                                                    </div>
                                                </div>
                                                <iframe id="[{$sKey}]__licensefrm" class="licframe" src="" style="border: none; position: absolute"></iframe>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    [{/if}]

                                    [{if $oView->getModuleCfgTplPath($sKey)}]
                                        <hr>
                                        [{include file=$oView->getModuleCfgTplPath($sKey)|cat:".tpl" oxid=$oModule->getId() edit=$oModule value=$oModule->oValue}]
                                    [{/if}]
                                </td>
                            </tr>
                            [{if $blWhite == "2"}]
                                [{assign var="blWhite" value=""}]
                            [{else}]
                                [{assign var="blWhite" value="2"}]
                            [{/if}]
                        [{/foreach}]

                        [{if $oView->getShowNewItems()}]
                            [{assign var="aAllRemoteModuleData" value=$oView->getAllRemoteModuleData()}]
                            [{if $aAllRemoteModuleData}]
                                <tr><td class="[{$listclass}]" colspan="9"><hr style="margin: 3px 0;"></td></tr>
                            [{/if}]
                            [{foreach from=$aAllRemoteModuleData item="oModule"}]
[{******************}]
                                [{if !$oView->isInstalled($oView->getRemoteModVar($oModule, 'modid'))}]
                                    [{assign var="listclass" value="listitem"|cat:$blWhite}]

                                    [{assign var="formatclass" value=""}]
                                    [{assign var="iconclass" value="fas fa-question-circle d3fa-17x d3fa-color-disabled"}]
                                    [{assign var="aRemoteModData" value=$oView->getRemoteModuleData($oView->getRemoteModVar($oModule, 'modid'))}]

                                    [{if $aRemoteModData.availableversion.$sDownloadField}]
                                        [{assign var="updateicon" value="fas fa-plus-circle d3fa-17x d3fa-color-green"}]
                                        [{assign var="icondesc" value="D3_MOD_LIB_INSTALL"|oxmultilangassign}]
                                    [{else}]
                                        [{assign var="updateicon" value="fas fa-question-circle d3fa-17x d3fa-color-disabled"}]
                                        [{assign var="icondesc" value=""}]
                                    [{/if}]

                                    <tr>
                                        <td class="[{$listclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                            <label class="[{$iconclass}]" title="[{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]"></label>
                                        </td>
                                        <td class="[{$listclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                            <label class="[{$updateicon}]" title="[{$icondesc}]"></label>
                                        </td>
                                        <td class="[{$listclass}] [{$formatclass}]" style="padding: 5px; padding-left: 15px;" title="">
                                            <b>[{$oView->getRemoteModVar($oModule, 'modtitle')}]</b> ([{$oView->getRemoteModVar($oModule, 'modid')}])
                                        </td>
                                        <td class="[{$listclass}] [{$formatclass}]" style="padding: 5px;" title="">
                                            [{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]
                                        </td>
                                        <td class="[{$listclass}] [{$formatclass}]" style="padding: 5px;" title="">
                                            [{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]
                                        </td>
                                        <td class="[{$listclass}] [{$formatclass}]" style="padding: 5px;" title="">
                                            [{if isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.version}]
                                                [{$aRemoteModData.newestversion.version}]
                                            [{elseif $aRemoteModData.availableversion.version}]
                                                [{$aRemoteModData.availableversion.version}]
                                            [{elseif $aRemoteModData.formerversion.version}]
                                                <span style="white-space: nowrap">[{oxmultilang ident="D3_CFG_LIB_FORMERVERSION"}] [{$aRemoteModData.formerversion.version}]</span><br>
                                                <span style="white-space: nowrap">[{oxmultilang ident="D3_CFG_LIB_USEABLETO"}] [{$aRemoteModData.formerversion.toshop}]</span>
                                            [{else}]
                                                [{oxmultilang ident="D3_CFG_LIB_VERSIONUNKNOWN"}]
                                            [{/if}]
                                        </td>
                                        <td class="[{$listclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                            [{if isset($aRemoteModData.newestversion) && $aRemoteModData.newestversion.infourl}]
                                                <a target="modinfo" class="" href="[{$aRemoteModData.newestversion.infourl}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                                    <span class="fas fa-info-circle d3fa-17x d3fa-color-blue"></span>
                                                </a>
                                            [{elseif $aRemoteModData.availableversion.infourl}]
                                                <a target="modinfo" class="" href="[{$aRemoteModData.availableversion.infourl}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                                    <span class="fas fa-info-circle d3fa-17x d3fa-color-blue"></span>
                                                </a>
                                            [{elseif $aRemoteModData.formerversion.infourl}]
                                                <a target="modinfo" class="" href="[{$aRemoteModData.formerversion.infourl}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                                    <span class="fas fa-info-circle d3fa-17x d3fa-color-blue"></span>
                                                </a>
                                            [{else}]
                                                <label class="fas fa-info-circle d3fa-17x d3fa-color-disabled" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></label>
                                            [{/if}]
                                        </td>
                                    </tr>
                                    [{if $blWhite == "2"}]
                                        [{assign var="blWhite" value=""}]
                                    [{else}]
                                        [{assign var="blWhite" value="2"}]
                                    [{/if}]
                                [{/if}]
[{****************}]
                            [{/foreach}]
                        [{/if}]
                    </table>
                    [{if $oView->getInstallClass() && !$oView->hasConnectionError()}]
                        <hr>
                        <form name="getRemote" id="getRemote" action="[{$oViewConf->getSelfLink()}]" method="post">
                            [{$oViewConf->getHiddenSid()}]
                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                            <input type="hidden" name="oxid" value="[{$oxid}]">
                            <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                            <input type="hidden" name="fnc" value="getRemoteModList">
                            <span class="d3modcfg_btn icon d3color-blue">
                                    <button type="submit" [{$readonly}]>
                                        <i class="fas fa-question-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}]
                                    </button>
                                </span>
                            <br>
                        </form>
                    [{/if}]
                    [{if $oView->hasConnectionError()}]
                        <script type="text/javascript">alert('[{oxmultilang ident="D3_CFG_LIB_CONNECTERROR"}]');</script>
                    [{/if}]
                </fieldset>
            </td>
        <tr>
    </table>

    [{if $oView->showNoUpdateMessage()}]
        <script type="text/javascript">
            alert('[{oxmultilang ident="D3_CFG_LIB_NOINSTALLNOTICE"}]');
        </script>
    [{/if}]
[{/if}]

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]

[{include file="bottomitem.tpl"}]
