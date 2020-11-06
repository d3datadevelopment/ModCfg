<style type="text/css">
    #d3clrtmp_lib_cfg {
        width: 98%;
    }
    #d3clrtmp_lib_cfg table {
        width: 100%;
    }
    #d3clrtmp_lib_cfg table td {
        width: 50%;
    }
</style>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="modid" value="[{$oView->getSelectedModId()}]">
    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

    <table style="border: none" id="d3clrtmp_lib_cfg">
        <tr>
            <td style="vertical-align: top" class="edittext">

                [{assign var="blD3HasLog" value=$oView->checkD3Log()}]
                <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="blClrTmp_showcleartmpoptions">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_SHOWCLEARTMPOPTIONS"}]
                            </label>
                            [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SHOWCLEARTMPOPTIONS_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="hidden" name="value[blClrTmp_showcleartmpoptions]" value="0">
                            <input id="blClrTmp_showcleartmpoptions" type="checkbox" name="value[blClrTmp_showcleartmpoptions]" value="1" [{if $edit->getValue('blClrTmp_showcleartmpoptions')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="blClrTmp_shownoheaderform">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SHOWNOHEADERFORM"}]</label>
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="hidden" name="value[blClrTmp_shownoheaderform]" value="0">
                            <input id="blClrTmp_shownoheaderform" type="checkbox" name="value[blClrTmp_shownoheaderform]" value="1" [{if $edit->getValue('blClrTmp_shownoheaderform')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="iClrTmp_tickerThreshold">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_TICKERTHRESHOLD"}]</label>
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input id="iClrTmp_tickerThreshold" type="text" size="6" maxlength="6" name="value[iClrTmp_tickerThreshold]" value="[{if $edit->getValue('iClrTmp_tickerThreshold')}][{$edit->getValue('iClrTmp_tickerThreshold')}][{else}]5000[{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>


                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="blClrTmp_nohtaccess">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_CREATE_NOHTACCESS"}]
                            </label>
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="hidden" name="value[blClrTmp_nohtaccess]" value="0">
                            <input id="blClrTmp_nohtaccess" type="checkbox" name="value[blClrTmp_nohtaccess]"
                                   value="1" [{if $edit->getValue('blClrTmp_nohtaccess')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="blClrTmp_nofolderremove">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_REMOVEFOLDERS"}]
                            </label>
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="hidden" name="value[blClrTmp_nofolderremove]" value="0">
                            <input id="blClrTmp_nofolderremove" type="checkbox" name="value[blClrTmp_nofolderremove]"
                                   value="1" [{if $edit->getValue('blClrTmp_nofolderremove')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="blClrTmp_noviewupdate">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_NOUPDATEVIEWS"}]
                            </label>
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="hidden" name="value[blClrTmp_noviewupdate]" value="0">
                            <input id="blClrTmp_noviewupdate" type="checkbox" name="value[blClrTmp_noviewupdate]"
                                   value="1" [{if $edit->getValue('blClrTmp_noviewupdate')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="sClrTmp_excluderegexp">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_EXCLUDEREGEXP"}]
                            </label>
                            [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_EXCLUDEPATTERN_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input id="sClrTmp_excluderegexp" type="text" size="40" maxlength="255" name="value[sClrTmp_excluderegexp]"
                                   value="[{$edit->getValue('sClrTmp_excluderegexp')}]">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext ext_edittext">
                            [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_1"}] [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_USERACTION_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left"></td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="sClrTmp_useraction1name">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_NAME"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_USERACTION_NAME_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="text" size="40" maxlength="100" id="sClrTmp_useraction1name"
                                   name="value[sClrTmp_useraction1name]"
                                   value="[{if $edit->getValue('sClrTmp_useraction1name')}][{$edit->getValue('sClrTmp_useraction1name')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="sClrTmp_useraction1pattern">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_PATTERN"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_USERACTION_PATTERN_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="text" size="40" maxlength="150" id="sClrTmp_useraction1pattern"
                                   name="value[sClrTmp_useraction1pattern]"
                                   value="[{if $edit->getValue('sClrTmp_useraction1pattern')}][{$edit->getValue('sClrTmp_useraction1pattern')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_2"}] [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_USERACTION_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left"></td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="sClrTmp_useraction2name">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_NAME"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_USERACTION_NAME_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="text" size="40" maxlength="100" id="sClrTmp_useraction2name"
                                   name="value[sClrTmp_useraction2name]"
                                   value="[{if $edit->getValue('sClrTmp_useraction2name')}][{$edit->getValue('sClrTmp_useraction2name')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            <label for="sClrTmp_useraction2pattern">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_PATTERN"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_USERACTION_PATTERN_DESC"}]
                        </td>
                        <td class="edittext ext_edittext" style="text-align: left">
                            <input type="text" size="40" maxlength="150" id="sClrTmp_useraction2pattern"
                                   name="value[sClrTmp_useraction2pattern]"
                                   value="[{if $edit->getValue('sClrTmp_useraction2pattern')}][{$edit->getValue('sClrTmp_useraction2pattern')}][{/if}]">
                        </td>
                    </tr>
                    [{if $oView->isExecAvailable()}]
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_1"}] [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left"></td>
                        </tr>
                        [{******}]
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction1name">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_NAME"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_NAME_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="text" size="40" maxlength="100" id="sClrTmp_systemaction1name"
                                       name="value[sClrTmp_systemaction1name]"
                                       value="[{if $edit->getValue('sClrTmp_systemaction1name')}][{$edit->getValue('sClrTmp_systemaction1name')}][{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction1clrtmpreplace">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_CLRTMPREPLACE"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_CLRTMPREPLACE_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="checkbox" id="sClrTmp_systemaction1clrtmpreplace"
                                       name="value[sClrTmp_systemaction1clrtmpreplace]"
                                       value="1" [{if $edit->getValue('sClrTmp_systemaction1clrtmpreplace')}]checked="checked"[{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction1icon">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_ICON"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_ICON_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="text" size="40" maxlength="100" id="sClrTmp_systemaction1icon"
                                       name="value[sClrTmp_systemaction1icon]"
                                       value="[{if $edit->getValue('sClrTmp_systemaction1icon')}][{$edit->getValue('sClrTmp_systemaction1icon')}][{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction1command">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_COMMAND"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_COMMAND_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="text" size="40" maxlength="150" id="sClrTmp_systemaction1command"
                                       name="value[sClrTmp_systemaction1command]"
                                       value="[{if $edit->getValue('sClrTmp_systemaction1command')}][{$edit->getValue('sClrTmp_systemaction1command')}][{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                [{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_2"}] [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left"></td>
                        </tr>
                        [{******}]
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction2name">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_NAME"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_NAME_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="text" size="40" maxlength="100" id="sClrTmp_systemaction2name"
                                       name="value[sClrTmp_systemaction2name]"
                                       value="[{if $edit->getValue('sClrTmp_systemaction2name')}][{$edit->getValue('sClrTmp_systemaction2name')}][{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction2clrtmpreplace">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_CLRTMPREPLACE"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_CLRTMPREPLACE_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="checkbox" id="sClrTmp_systemaction2clrtmpreplace"
                                       name="value[sClrTmp_systemaction2clrtmpreplace]"
                                       value="1" [{if $edit->getValue('sClrTmp_systemaction2clrtmpreplace')}]checked="checked"[{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction2icon">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_ICON"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_ICON_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="text" size="40" maxlength="100" id="sClrTmp_systemaction2icon"
                                       name="value[sClrTmp_systemaction2icon]"
                                       value="[{if $edit->getValue('sClrTmp_systemaction2icon')}][{$edit->getValue('sClrTmp_systemaction2icon')}][{/if}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                <label for="sClrTmp_systemaction2command">[{oxmultilang ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_COMMAND"}]</label> [{oxinputhelp ident="D3_CFG_CLRTMP_CFG_SYSTEMACTION_COMMAND_DESC"}]
                            </td>
                            <td class="edittext ext_edittext" style="text-align: left">
                                <input type="text" size="40" maxlength="150" id="sClrTmp_systemaction2command"
                                       name="value[sClrTmp_systemaction2command]"
                                       value="[{if $edit->getValue('sClrTmp_systemaction2command')}][{$edit->getValue('sClrTmp_systemaction2command')}][{/if}]">
                            </td>
                        </tr>
                    [{/if}]
                    <tr>
                        <td>
                            <span class="d3modcfg_btn icon d3color-green">
                                <button type="submit" name="save">
                                    <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_SAVE"}]
                                </button>
                            </span>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>