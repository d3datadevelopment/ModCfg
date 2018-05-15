<style type="text/css">
    #d3log_lib_cfg {
        width: 98%;
    }
    #d3log_lib_cfg table {
        width: 100%;
    }
    #d3log_lib_cfg table td {
        width: 50%;
    }
    #d3log_lib_cfg table table td {
        width: auto;
    }
</style>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="modid" value="[{$oView->getSelectedModId()}]">
    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

    <table border="0" id="d3log_lib_cfg">
        <tr>
            <td valign="top" class="edittext">

                [{assign var="blD3HasLog" value=$oView->checkD3Log()}]
                <table cellspacing="0" cellpadding="0" border="0">
                    [{if $blD3HasLog}]
                        <tr>
                            <td class="edittext ext_edittext">
                                [{oxmultilang ident="D3_LOG_CFG_USEEXTLOG"}]
                            </td>
                            <td class="edittext ext_edittext" align="left">
                                <input type="hidden" name="value[blLog_useExtendedLogging]" value="0">
                                <input type="checkbox" name="value[blLog_useExtendedLogging]" value="1" [{if $edit->getValue('blLog_useExtendedLogging')}] checked[{/if}]>
                                       [{oxinputhelp ident="D3_LOG_CFG_EXTENDED_LOGGING_HELP"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                [{oxmultilang ident="D3_LOG_CFG_ENABLE_ERR_REPORT"}]
                            </td>
                            <td class="edittext ext_edittext" align="left">
                                <input type="hidden" name="value[blLog_enableErrorReporting]" value="0">
                                <input type="checkbox" name="value[blLog_enableErrorReporting]" value="1" [{if $edit->getValue('blLog_enableErrorReporting')}] checked[{/if}]>
                                       [{oxinputhelp ident="D3_LOG_CFG_ENABLE_ERR_REPORT_HELP"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext">
                                [{oxmultilang ident="D3_LOG_CFG_ENABLE_EXC_REPORT"}]
                            </td>
                            <td class="edittext ext_edittext" align="left">
                                <input type="hidden" name="value[blLog_enableExceptionReporting]" value="0">
                                <input type="checkbox" name="value[blLog_enableExceptionReporting]" value="1" [{if $edit->getValue('blLog_enableExceptionReporting')}] checked[{/if}]>
                                       [{oxinputhelp ident="D3_LOG_CFG_ENABLE_EXC_REPORT_HELP"}]
                            </td>
                        </tr>
                    [{/if}]
                    <tr>
                        <td class="edittext ext_edittext">
                            [{oxmultilang ident="D3_LOG_CFG_ENABLE_ADMINPROFILING"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blLog_enableAdminProfiling]" value="0">
                            <input type="checkbox" name="value[blLog_enableAdminProfiling]" value="1" [{if $edit->getValue('blLog_enableAdminProfiling')}] checked[{/if}]>
                                   [{oxinputhelp ident="D3_LOG_CFG_ENABLE_ADMINPROFILING_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext">
                            [{oxmultilang ident="D3_LOG_CFG_SHOWALLEXCEPTIONS"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blLog_showAllExceptions]" value="0">
                            <input type="checkbox" name="value[blLog_showAllExceptions]" value="1" [{if $edit->getValue('blLog_showAllExceptions')}] checked[{/if}]>
                                   [{oxinputhelp ident="D3_LOG_CFG_SHOWALLEXCEPTIONS_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset style="margin: 10px 3px;">
                                <Legend>[{oxmultilang ident="D3_LOG_CFG_MAILMESSAGING"}]</Legend>

                                <table style="width: 100%;">
                                    [{foreach from=$oView->getUsedMailMessageSlots() item="iMailMessageId"}]
                                        <tr>
                                            <td>[{$iMailMessageId}].</td>
                                            [{assign var="sFieldName" value="sLog_messageadr"|cat:$iMailMessageId}]
                                            <td>[{oxmultilang ident="D3_LOG_CFG_MAILADDRESS"}]: <input type="text" size="20" maxlength="80" name="value[[{$sFieldName}]]" value="[{$edit->getValue($sFieldName)}]"></td>
                                            <td>
                                                [{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL"}]:
                                                [{assign var="sFieldName" value="sLog_messageerrlevel"|cat:$iMailMessageId}]
                                                <select class="edittext" name="value[[{$sFieldName}]]">
                                                    <option style="background-color: silver;" value="" [{if $edit->getValue($sFieldName) == ''}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_NOERR"}]</option>
                                                    <option style="background-color: darkred; color: white;" value="emergency" [{if $edit->getValue($sFieldName) == 'emergency'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_EMERGENCY"}]</option>
                                                    <option style="background-color: #C00; color: white;" value="alert" [{if $edit->getValue($sFieldName) == 'alert'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_ALERT"}]</option>
                                                    <option style="background-color: red;" value="critical" [{if $edit->getValue($sFieldName) == 'critical'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_CRITICAL"}]</option>
                                                    <option style="background-color: #FAA;" value="error" [{if $edit->getValue($sFieldName) == 'error'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_ERROR"}]</option>
                                                    <option value="warning" [{if $edit->getValue($sFieldName) == 'warning'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_WARNING"}]</option>
                                                </select>
                                                [{oxinputhelp ident="D3_LOGTYPE_DESC"}]
                                            </td>
                                            <td>
                                                [{oxmultilang ident="D3_LOG_CFG_INTERVAL"}]:
                                                [{assign var="sFieldName" value="sLog_messageinterval"|cat:$iMailMessageId}]
                                                [{oxmultilang ident="D3_LOG_CFG_INTERVALMAX"}] <input type="text" size="3" maxlength="4" value="[{if $edit->getValue($sFieldName)}][{$edit->getValue($sFieldName)}][{else}]1[{/if}]" name="value[[{$sFieldName}]]">
                                                [{assign var="sFieldName" value="sLog_messageintervaltype"|cat:$iMailMessageId}]
                                                <select class="edittext" name="value[[{$sFieldName}]]">
                                                    <option value="day" [{if $edit->getValue($sFieldName) == 'day'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_DAYS"}]</option>
                                                    <option value="hour" [{if $edit->getValue($sFieldName) == 'hour'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_HOURS"}]</option>
                                                    <option value="minute" [{if $edit->getValue($sFieldName) == 'minute'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_MINS"}]</option>
                                                </select>
                                            </td>
                                            <td>
                                                [{assign var="sFieldName" value="sLog_messagetimestamp"|cat:$iMailMessageId}]
                                                [{oxmultilang ident="D3_LOG_CFG_MAILLASTSEND"}]: [{if $edit->getValue($sFieldName)}][{$edit->getValue($sFieldName)|date_format:"%d.%m.%Y %H:%M"}][{else}]--[{/if}]
                                            </td>
                                        </tr>
                                    [{/foreach}]
                                </table>
                            </fieldset>
                        </td>
                    </tr>
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