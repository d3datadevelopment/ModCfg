[{include file="headitem.tpl" title="D3_CFG_MOD"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{if $updatelist == 1}]
        UpdateList('[{$oxid}]');
    [{/if}]

    function _groupExp(el)
    {
        let _cur = el.parentNode;

        if (_cur.className === "exp") _cur.className = "";
        else _cur.className = "exp";
    }

    -->
</script>

<style>
    <!--
    fieldset {
        border:           1px inset black;
        background-color: #F0F0F0;
    }

    legend {
        font-weight: bold;
    }

    dl dt {
        font-weight: normal;
        width:       100%;
    }

    strong.version {
        border:           1px solid black;
        margin:           5px;
        padding:          5px 10px;
        background-color: white;
        color:            black;
    }

    strong.version.error {
        background-color: #FF3600;
        color:            white;
    }

    .ext_edittext {
        padding: 2px;
    }

    ul li.syscheck {
        background:     none;
        white-space:    normal;
        padding-bottom: 10px;
        padding-left:   34px;
        text-indent:    -24px;
    }

    ul li.syscheck div.desc {
        text-indent: 0;
        margin:      5px 20px;
    }

    ul li.syscheck i {
        margin: 0 0 0 23px;
        height:       20px;
    }

    div.desc ul li {
        list-style: inside;
        background: none;
    }

    div.desc ul li ul li {
        padding-left: 18px;
    }

    .extension_error {
        margin-bottom: 10px;
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

[{assign var="sDownloadField" value=$oView->getPhpVersionDownloadField()}]

<table style="border: none; width: 100%">
    <tr>
        <td style="vertical-align: top">

            [{if $edit->getErrorMessage()}]
                <div class="extension_error">
                    [{$edit->getErrorMessage()}]
                </div>
            [{/if}]

            <div class="groupExp">
                <div class="exp">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_VERSION"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <div style="border-bottom: 1px solid silver;">
                                <div>
                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_TEXT1"}][{$edit->getModTitle()}][{oxmultilang ident="D3_CFG_MOD_VERSION_TEXT2"}] [{$edit->getFieldData('oxshopversion')}]
                                </div>
                                <div style="margin: 23px 0;">
                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_INSTALLEDV"}]
                                    <strong class="version [{if $oView->checkModuleVersion() != 'OK'}]error[{/if}]">
                                        [{$edit->getModVersion()}]
                                    </strong>
                                    [{if $oView->checkModuleVersion() != 'OK'}]
                                        <i class="fas fa-exclamation-triangle d3fa-17x d3fa-color-red" style="display:inline-block;"></i>
                                        [{oxmultilang ident="D3_CFG_LIB_INSTALLEDVERSIONNOTCONGRUENT"}]
                                    [{/if}]
                                </div>
                            </div>

                            [{if $oView->hasUpdate()}]
                                [{if $oView->getAction() == 'versionCheck'}]
                                    <div style="margin: 10px 0;">
                                        <strong>[{oxmultilang ident="D3_CFG_MOD_VERSION_RESULT"}]</strong>
                                        [{if $oView->getUpdateData('version')}]
                                            <div style="margin: 23px 0 10px; padding-bottom: 10px; border-bottom: 1px solid silver;">
                                                [{oxmultilang ident="D3_CFG_MOD_VERSION_AVAILVERSION"}]
                                                <strong class="version" style="border-color: green;">
                                                    [{$oView->getUpdateData('version')}]
                                                </strong>
                                                [{if $oView->getUpdateData('infourl')}]
                                                    <a href="[{$oView->getUpdateData('infourl')}]">[{oxmultilang ident="D3_CFG_MOD_VERSION_MODINFO"}]</a>
                                                [{/if}]

                                                [{if $oView->getUpdateData($sDownloadField)}]
                                                    <div style="padding: 20px 0 [{if $oView->getUpdateData('autoupdate') > 0 && $oView->getInstallClass()}]35px[{else}]0[{/if}];">
                                                        [{if $oView->getInstallClass()}]
                                                            <form name="myedit" id="installMod" action="[{$oViewConf->getSelfLink()}]" method="post">
                                                                [{$oViewConf->getHiddenSid()}]
                                                                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                                                <input type="hidden" name="oxid" value="[{$oxid}]">
                                                                <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                                                <input type="hidden" name="fnc" value="installMod">
                                                                <input type="hidden" name="modid" value="[{$edit->d3getModId()}]">
                                                        [{/if}]
                                                        [{assign var="classparam" value="cl="|cat:$oViewConf->getActiveClassName()}]
                                                        <div>
                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD1"}]
                                                            <a href="[{$oViewConf->getSelfLink()|oxaddparams:$classparam|oxaddparams:"fnc=filedownload"}]">
                                                                <strong style="text-decoration: underline;">
                                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD2"}]
                                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD3"}]
                                                                </strong>
                                                            </a>
                                                            [{if $oView->getInstallClass()}]
                                                                    [{if $oView->getUpdateData('autoupdate') > 0}]
                                                                        [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD4"}]
                                                                        <div class="d3modcfg_btn icon d3color-blue" style="margin: 10px 0 0 0;">
                                                                            <button type="submit">
                                                                                <i class="fas fa-question-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD5"}]
                                                                            </button>
                                                                        </div>
                                                                    [{/if}]
                                                                </form>
                                                            [{/if}]
                                                        </div>
                                                    </div>
                                                [{/if}]
                                            </div>
                                        [{else}]
                                            <div>
                                                [{oxmultilang ident="D3_CFG_MOD_VERSION_NONEWVERSION"}]
                                            </div>
                                        [{/if}]
                                    </div>
                                    [{if $oView->getNewestModuleData('version')}]
                                        <div style="padding-top: 10px;">
                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION"}]
                                            <strong class="version" style="border-color: yellow;">
                                                [{$oView->getNewestModuleData('version')}]
                                            </strong>
                                            [{if $oView->getNewestModuleData('infourl')}]
                                                <a href="[{$oView->getNewestModuleData('infourl')}]">
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_MODINFO"}]
                                                </a>
                                            [{/if}]
                                            <div style="padding-top: 20px;">
                                                [{if $oView->check4ShopUpdate($oView->getNewestModuleData('fromshop'))}]
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_1"}]
                                                    [{$oView->getNewestModuleData('fromshop')}]
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_2"}]<br>
                                                [{/if}]
                                                [{if $oView->check4LicenseUpdate($edit->d3getModId(), $oView->getNewestModuleData('version'))}]
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_LIC"}]<br>
                                                [{/if}]
                                            </div>
                                            [{if $oView->getNewestModuleData($sDownloadField)}]
                                                [{assign var="classparam" value="cl="|cat:$oViewConf->getActiveClassName()}]
                                                <div>
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD1"}]
                                                    <a href="[{$oViewConf->getSelfLink()|oxaddparams:$classparam|oxaddparams:"fnc=filedownload"|oxaddparams:"type=newest"}]">
                                                        <strong style="text-decoration: underline;">
                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD2"}]
                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD3"}]
                                                        </strong>
                                                    </a>
                                                </div>
                                            [{/if}]
                                        </div>
                                    [{/if}]
                                [{else}]
                                    <div style="padding: 15px 0 40px;">
                                        <form name="myedit" id="check_update" action="[{$oViewConf->getSelfLink()}]" method="post">
                                            [{$oViewConf->getHiddenSid()}]
                                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                            <input type="hidden" name="fnc" value="checkUpdate">
                                            <input type="hidden" name="oxid" value="[{$oxid}]">
                                            <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

                                            <div>
                                                [{oxmultilang ident="D3_CFG_MOD_VERSION_CHECKTXT"}]
                                            </div>
                                            <div class="d3modcfg_btn icon d3color-blue" style="margin: 10px 0 0 0;">
                                                <button type="submit" [{$readonly}]>
                                                    <i class="fas fa-question-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_VERSION_STARTCHECK"}]
                                                </button>
                                            </div>
                                        </form>
                                        <div></div>
                                    </div>
                                [{/if}]
                            [{/if}]

                            [{oxmultilang ident="D3_CFG_MOD_VERSION_AVAILLIST"}]
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_DEV"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <div style="float: right; margin: 20px;">
                                <i class="fab fa-d3 d3fa-color-blue" style="font-size: 6em;"></i>
                            </div>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_TEXT1"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR1"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR2"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR3"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR4"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR5"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_WEBLINK"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_MAILLINK"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_MODULELINK"}]<br>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_1"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_2"}]<br>
                            [{*[{oxmultilang ident="D3_CFG_MOD_SUPPORT_3"}]<br>*}]
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_4"}]
                            <a href="mailto:[{oxmultilang ident="D3_CFG_MOD_SUPPORT_MAIL"}]">
                                [{oxmultilang ident="D3_CFG_MOD_SUPPORT_MAIL"}]
                            </a><br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_5"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_6"}]
                            <br>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            [{if $edit->isLicenseRequired()}]
                [{if $edit->getFieldData('oxserial')}]
                    <div class="groupExp">
                        <div class="">
                            <a class="rc" onclick="_groupExp(this); return false;" href="#">
                                <span style="font-weight: bold;">
                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS"}]
                                </span>
                            </a>
                            <dl>
                                <dt>
                                    <table>
                                        [{if $edit->getLicenseData('result')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_GENERALVALID"}]
                                                </td>
                                                <td>
                                                    [{assign var="translKey" value="D3_CFG_MOD_STATUS_"|cat:$edit->getLicenseData('result')|upper}]
                                                    [{oxmultilang ident=$translKey}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('domain')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDDOMAIN"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('domain')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('allow_local')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL"}]
                                                </td>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                    [{oxinputhelp ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL_DESC"}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('startdate')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFROMDATE"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('startdate')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('enddate')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDTODATE"}]
                                                </td>
                                                <td>
                                                    [{if $edit->getExpireSpan() > 756864000}]
                                                        [{oxmultilang ident="D3_CFG_MOD_STATUS_NEVER_EXPIRES"}]
                                                    [{else}]
                                                        [{$edit->getLicenseData('enddate')}] ([{$oView->getExpireSpanString()}])
                                                    [{/if}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('modid')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODID"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('modid')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('modversion')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODVERSION"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('modversion')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getFormatedShopEditionList()}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORSHOPEDITION"}]
                                                </td>
                                                <td>
                                                    [{$edit->getFormatedShopEditionList()}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getFormatedShopIdList()}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORSHOPID"}]
                                                </td>
                                                <td>
                                                    [{$edit->getFormatedShopIdList()}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('isdemo')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_ISTEST"}]
                                                </td>
                                                <td>
                                                    [{if $edit->getLicenseData('isdemo')}][{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                    [{/if}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getConfigInfoData()}]
                                            [{foreach from=$edit->getConfigInfoData() key="sKey" item="mValue"}]
                                                [{if $edit->getLicenceOptionTranslation($sKey)}]
                                                    <tr>
                                                        <td>
                                                            [{$edit->getLicenceOptionTranslation($sKey)}]
                                                        </td>
                                                        <td>
                                                            [{$mValue}]
                                                        </td>
                                                    </tr>
                                                [{/if}]
                                            [{/foreach}]
                                        [{/if}]
                                    </table>
                                </dt>
                                <dd class="spacer"></dd>
                            </dl>
                        </div>
                    </div>
                [{/if}]

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{if $oView->hasLicenseKey()}]
                                [{oxmultilang ident="D3_CFG_MOD_CHANGEKEY"}]
                                [{else}]
                                [{oxmultilang ident="D3_CFG_MOD_ACTIVATE"}]
                                [{/if}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <iframe src="[{$oView->getLicenceFrameUrl($edit->d3getModId())}]" style="width: 99%; height: 293px; border: none;"></iframe>
                            </dt>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            [{/if}]

            [{if $oView->hasNewsletterForm()}]
                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_CFG_MOD_STAYINFORMED"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
                                    [{$oViewConf->getHiddenSid()}]
                                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                    <input type="hidden" name="fnc" value="setInfoMail">
                                    <input type="hidden" name="oxid" value="[{$oxid}]">
                                    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                    <input type="hidden" name="service[bl_updateinfo]" value="0">
                                    <input class="edittext ext_edittext" id="bl_updateinfo" type="checkbox" name="service[d3_cfg_mod__bl_updateinfo]" value='1' [{if $service->d3_cfg_mod__bl_updateinfo->value == 1}]checked[{/if}]>
                                    <label for="bl_updateinfo">[{oxmultilang ident="D3_CFG_MOD_STAYINFORMED_1"}]</label><br>
                                    <label for="s_updateinfomail">[{oxmultilang ident="D3_CFG_MOD_STAYINFORMED_2"}]</label>
                                    <input type="text" class="editinput" id="s_updateinfomail" size="30" maxlength="255" name="service[d3_cfg_mod__s_updateinfomail]" value="[{if $service->d3_cfg_mod__s_updateinfomail}][{$service->d3_cfg_mod__s_updateinfomail}][{else}][{$actshopobj->oxshops__oxinfoemail->value}][{/if}]">
                                    <br>
                                    <div class="d3modcfg_btn icon action_mail" style="margin: 10px 10px 0 0;">
                                        <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_SAVE"}]">
                                        <div></div>
                                    </div>
                                </form>
                            </dt>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            [{/if}]

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_SYS_CHECK"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <ul>
                                <li class="syscheck">
                                    [{if $oView->d3CheckCurl()}]
                                        <i class="fas fa-check-circle d3fa-17x d3fa-color-green" style="display: inline; margin: 0;"
                                           title="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLOK"}]"></i>
                                        &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_CURLOK"}]
                                    [{else}]
                                        [{if $oView->d3ModUseCurl()}]
                                            <i class="fas fa-times-circle d3fa-17x d3fa-color-red" style="display: inline; margin: 0;"
                                               title="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLREQ"}]"></i>
                                            &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_CURLREQ"}]
                                        [{else}]
                                            <i class="fas fa-exclamation-triangle d3fa-17x d3fa-color-orange" style="display: inline; margin: 0;"
                                               title="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLNOK"}]"></i>
                                            &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_CURLNOK"}]
                                        [{/if}]
                                    [{/if}]
                                </li>
                            </ul>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            [{assign var="oInstallCheck" value=$oView->getInstallCheck()}]
            <div class="groupExp">
                <div class="[{if $oInstallCheck->hasErrors()}]exp[{/if}]">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_INSTALLCHECK"}] "[{$edit->getModTitle()}]"
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <ul>
                                [{foreach from=$oInstallCheck->getArray() item="oCheckItem"}]
                                    <li class="syscheck">
                                        [{if $oCheckItem->hasCheckPassed()}]
                                            <i class="fas fa-check-circle d3fa-17x d3fa-color-green"
                                        [{else}]
                                            <i class="fas fa-times-circle d3fa-17x d3fa-color-red"
                                        [{/if}]
                                        title="[{oxmultilang ident=$oCheckItem->getCheckMessageMultilangItem()}]"></i>

                                        &nbsp;[{oxmultilang ident=$oCheckItem->getCheckMessageMultilangItem()}]
                                        [{oxinputhelp ident=$oCheckItem->getCheckDescMultiLangItem()}]
                                        [{if $oCheckItem->getDetails()}]
                                            <ul>
                                                [{foreach from=$oCheckItem->getDetails() item="sDetailItem"}]
                                                    <li style="text-indent: 0;">[{$sDetailItem}]</li>
                                                [{/foreach}]
                                            </ul>
                                        [{/if}]
                                    </li>
                                [{/foreach}]

                            </ul>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            <div class="groupExp">
                <div class="[{if $oView->hasBlogContent()}]exp[{/if}]">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_NEWS_NEWS"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            [{if $oView->hasBlogContent()}]
                                <ul>
                                    [{foreach from=$oView->hasBlogContent() item="oBlog"}]
                                        <li class="syscheck">
                                            <i class="fas fa-arrow-circle-right d3fa-17x d3fa-color-blue" style="display: inline; margin: 0;" title="[{$oBlog->title|replace:'"':''}]"></i>
                                            <a href="[{$oBlog->link}]" target="blog">
                                                [{$oBlog->date|date_format:"%d.%m.%Y %H:%M"}] -
                                                <span style="font-weight: bold;">[{$oBlog->title}]</span>
                                            </a>
                                        </li>
                                    [{/foreach}]
                                </ul>
                                <hr>
                                [{oxmultilang ident="D3_CFG_MOD_NEWS_FURTHER1"}]
                                <a href="[{$oView->getBlogBaseUrl()}]" target="blog">
                                    <span style="font-weight: bold;">[{$oView->getBlogBaseUrl()}]</span>
                                </a>
                            [{else}]
                                [{oxmultilang ident="D3_CFG_MOD_NEWS_FURTHER2"}]
                                <a href="[{$oView->getBlogBaseUrl()}]" target="blog">
                                    <b>[{$oView->getBlogBaseUrl()}]</b>
                                </a>
                            [{/if}]
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

        </td>
    </tr>
</table>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl" blChangeTitle=false blHideLinkBar=false}]
