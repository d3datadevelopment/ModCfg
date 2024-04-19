[{include file="headitem.tpl" title="d3mxd3cleartmp"|oxmultilangassign}]

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
    [{if $oView->getTickerUrl()}]
        window.open('[{$oView->getTickerUrl()}]', 'clrTmpTicker', 'width=300, height=300, left=100');
    [{/if}]

    function deselect_combineditem()
    {
        [{block name="d3cleartmp_js_combineditem"}]
            document.getElementById('clearall').checked = false;
        [{/block}]
    }

    function deselect_singleitems()
    {
        [{block name="d3cleartmp_js_singleitems"}]
            document.getElementById('clearfrontend').checked = false;
            document.getElementById('cleardbcache').checked = false;
            document.getElementById('clearlangcache').checked = false;
            document.getElementById('clearmenucache').checked = false;
            document.getElementById('clearclasspathcache').checked = false;
            document.getElementById('clearstructurecache').checked = false;
            document.getElementById('cleartagcloudcache').checked = false;
            document.getElementById('clearseocache').checked = false;
            document.getElementById('clearviewcache').checked = false;
            document.getElementById('clearmodulecache').checked = false;
            document.getElementById('cleargeneratedimgs').checked = false;
        [{/block}]
    }
</script>

[{assign var="oCfg" value=$oView->d3GetSet()}]
[{assign var="blDevMode" value=$oCfg->getValue('blClrTmp_notmpuse')}]

<style>
    table#statistik td {
        padding: 4px;
    }

    table#statistik td.bold {
        font-weight: bold;
    }

    #popup2 {
        display: none;
    }

    .d3modcfg_btn.commandBtn {
        margin-right: 10px;
        margin-bottom: 10px;
    }
</style>

<table style="width: 98%; border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
    <tr>
        <td style="vertical-align: top; width: 50%;" class="edittext">
            [{block name="d3cleartmp_syscommand1"}]
                [{if $oCfg->getValue('sClrTmp_systemaction1command')}]
                    <span class="d3modcfg_btn icon d3color-green commandBtn">
                        <button onclick="this.style.color = 'red'; window.location.href = '[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;fnc=d3ExecCommand1&amp;';" title="[{$oCfg->getValue('sClrTmp_systemaction1name')}]">
                            [{if $oCfg->getValue('sClrTmp_systemaction1icon')}]
                                <i class="fa [{$oCfg->getValue('sClrTmp_systemaction1icon')}]"></i>
                            [{/if}]
                            [{$oCfg->getValue('sClrTmp_systemaction1name')}]
                        </button>
                    </span>
                [{/if}]
            [{/block}]

            [{block name="d3cleartmp_syscommand2"}]
                [{if $oCfg->getValue('sClrTmp_systemaction2command')}]
                    <span class="d3modcfg_btn icon d3color-green commandBtn">
                        <button onclick="this.style.color = 'red'; window.location.href = '[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;fnc=d3ExecCommand2&amp;';" title="[{$oCfg->getValue('sClrTmp_systemaction2name')}]">
                            [{if $oCfg->getValue('sClrTmp_systemaction2icon')}]
                                <i class="fa [{$oCfg->getValue('sClrTmp_systemaction2icon')}]"></i>
                            [{/if}]
                            [{$oCfg->getValue('sClrTmp_systemaction2name')}]
                        </button>
                    </span>
                [{/if}]
            [{/block}]

            <div class="clear"></div>

            [{block name="d3cleartmp_form"}]
                <form name="delform" id="delform" action="[{$oViewConf->getSelfLink()}]" method="post" onsubmit="[{if !$oView->hasTicker()}]document.getElementById('mask').className='on';document.getElementById('popup2').className='d3loader-2 on';[{/if}] return;">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                    [{if $oView->hasTicker()}]
                        <input type="hidden" name="fnc" value="startTicker">
                    [{else}]
                        <input type="hidden" name="fnc" value="clearTmp">
                    [{/if}]

                    <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse">
                        [{block name="d3cleartmp_all"}]
                            [{if false == $oCfg->getValue('blClrTmp_showcleartmpoptions')}]
                                <tr>
                                    <td class="edittext" style="vertical-align: top;">
                                        <label for="clearall">[{oxmultilang ident="D3_CFG_CLRTMP_ALL"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearall" value="0">
                                        <input onClick="deselect_singleitems();" type="checkbox" value="1" class="edittext" id="clearall" name="clearall" [{if $clearAll}]checked[{/if}] [{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>
                            [{/if}]
                        [{/block}]

                        [{if false == $oCfg->getValue('blClrTmp_showcleartmpoptions')}]
                            <tr>
                                <td colspan="2" style="text-align: center;">[{oxmultilang ident="D3_CFG_CLRTMP_OR"}]</td>
                            </tr>
                        [{/if}]

                        [{block name="d3cleartmp_separated"}]
                            [{if false == $oCfg->getValue('blClrTmp_showcleartmpoptions')}]
                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearfrontend">[{oxmultilang ident="D3_CFG_CLRTMP_TPL"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearfrontend" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearfrontend" name="clearfrontend" value="1" class="edittext" name="clearfrontend" [{if $clearFrontend}]checked[{/if}] [{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="cleardbcache">[{oxmultilang ident="D3_CFG_CLRTMP_DB"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="cleardbcache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="cleardbcache" value="1" class="edittext" name="cleardbcache" [{if $clearDB}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearlangcache">[{oxmultilang ident="D3_CFG_CLRTMP_LANG"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearlangcache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearlangcache" value="1" class="edittext" name="clearlangcache" [{if $clearLang}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearmenucache">[{oxmultilang ident="D3_CFG_CLRTMP_MENU"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearmenucache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearmenucache" value="1" class="edittext" name="clearmenucache" [{if $clearMenu}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearclasspathcache">[{oxmultilang ident="D3_CFG_CLRTMP_CLASSPATH"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearclasspathcache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearclasspathcache" value="1" class="edittext" name="clearclasspathcache" [{if $clearClassPath}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearstructurecache">[{oxmultilang ident="D3_CFG_CLRTMP_STRUCTURE"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearstructurecache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearstructurecache" value="1" class="edittext" name="clearstructurecache" [{if $clearStructure}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="cleartagcloudcache">[{oxmultilang ident="D3_CFG_CLRTMP_TAGCLOUD"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="cleartagcloudcache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="cleartagcloudcache" value="1" class="edittext" name="cleartagcloudcache" [{if $clearTagcloud}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearseocache">[{oxmultilang ident="D3_CFG_CLRTMP_SEO"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearseocache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearseocache" value="1" class="edittext" name="clearseocache" [{if $clearSeo}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext" style="vertical-align: top">
                                        <label for="clearmodulecache">[{oxmultilang ident="D3_CFG_CLRTMP_MODULE"}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearmodulecache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearmodulecache" value="1" class="edittext" name="clearmodulecache" [{if $clearModule}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>
                            [{/if}]
                        [{/block}]

                        [{block name="d3cleartmp_userdefined"}]
                            [{if false == $oCfg->getValue('blClrTmp_showcleartmpoptions')}]
                                [{if $oView->getUserDefinedAction(1)}]
                                    <tr>
                                        <td class="edittext" style="vertical-align: top">
                                            <label for="clearuser1cache">[{$oView->getUserDefinedAction(1)}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="hidden" name="clearuser1cache" value="0">
                                            <input onClick="deselect_combineditem();" type="checkbox" id="clearuser1cache" value="1" class="edittext" name="clearuser1cache" [{if $clearUser1}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                        </td>
                                    </tr>
                                [{/if}]
                                [{if $oView->getUserDefinedAction(2)}]
                                    <tr>
                                        <td class="edittext" style="vertical-align: top">
                                            <label for="clearuser2cache">[{$oView->getUserDefinedAction(2)}]</label>
                                        </td>
                                        <td class="edittext">
                                            <input type="hidden" name="clearuser2cache" value="0">
                                            <input onClick="deselect_combineditem();" type="checkbox" id="clearuser2cache" value="1" class="edittext" name="clearuser2cache" [{if $clearUser2}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                        </td>
                                    </tr>
                                [{/if}]
                            [{/if}]
                        [{/block}]

                        [{block name="d3cleartmp_views"}]
                            <tr>
                                <td class="edittext" style="vertical-align: top">
                                    <label for="clearviewcache">[{oxmultilang ident="D3_CFG_CLRTMP_VIEWS"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearviewcache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearviewcache" value="1" class="edittext" name="clearviewcache" [{if $clearViews}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>
                        [{/block}]

                        [{block name="d3cleartmp_additional"}]
                        [{/block}]


                        <tr>
                            <td class="edittext">
                            </td>
                            <td class="edittext"><br>
                                <br>
                                <span class="d3modcfg_btn icon d3color-green[{if $blDevMode}]_inactive[{/if}]">
                                    <button id="sumbitbtn" type="submit" name="save" [{$readonly}] [{if $blDevMode}]disabled="disabled" [{/if}] style="width: 150px;">
                                        <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_CLRTMP_SUBMIT"}]
                                    </button>
                                </span>
                            </td>
                        </tr>
                    </table>
                </form>
            [{/block}]
        </td>
        <td style="vertical-align: top; text-align: left" class="edittext">
            [{block name="d3cleartmp_info"}]
                [{if false == $oCfg->getValue('blClrTmp_showcleartmpoptions')}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_STAT"}]</legend>

                        <table style="border: none; padding: 0; border-spacing: 0; border-collapse: collapse" id="statistik">
                            [{block name="d3cleartmp_infoitems"}]
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_PATH"}]</td>
                                    <td>[{$oView->getTmpPath()}]</td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_COUNT"}]</td>
                                    <td>[{$oView->getTmpCount()}]</td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_SIZE"}]</td>
                                    <td>[{$oView->getTmpSize()}]</td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_DELFOLDER"}]</td>
                                    <td>
                                        <span style="float: left; margin-right: 10px;"
                                        [{if $oCfg->getValue('blClrTmp_nofolderremove')}]
                                            class="fas fa-times-circle d3fa-17x d3fa-color-red" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                        [{else}]
                                            class="fas fa-check-circle d3fa-17x d3fa-color-green" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                        [{/if}]
                                        ></span>
                                        [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_CREATEHTA"}]</td>
                                    <td>
                                        <span style="float: left; margin-right: 10px;"
                                        [{if $oCfg->getValue('blClrTmp_nohtaccess')}]
                                            class="fas fa-times-circle d3fa-17x d3fa-color-red" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                        [{else}]
                                            class="fas fa-check-circle d3fa-17x d3fa-color-green" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                        [{/if}]
                                        ></span>
                                        [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_UPDATEVIEW"}]</td>
                                    <td>
                                        <span style="float: left; margin-right: 10px;"
                                        [{if $oCfg->getValue('blClrTmp_noviewupdate')}]
                                            class="fas fa-times-circle d3fa-17x d3fa-color-red" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                        [{else}]
                                            class="fas fa-check-circle d3fa-17x d3fa-color-green" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                        [{/if}]
                                        ></span>
                                        [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_HASNOEXCLUDEPATTERN"}]</td>
                                    <td>
                                        <span style="float: left; margin-right: 10px;"
                                        [{if $oCfg->getValue('sClrTmp_excluderegexp')}]
                                            class="fas fa-times-circle d3fa-17x d3fa-color-red" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                        [{else}]
                                            class="fas fa-check-circle d3fa-17x d3fa-color-green" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                        [{/if}]
                                        ></span>
                                        [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_USETICKER"}]</td>
                                    <td>
                                        [{$oView->getTickerThreshold()}] [{oxmultilang ident="D3_CFG_CLRTMP_USETICKERFILES"}]
                                        [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                    </td>
                                </tr>
                            [{/block}]
                        </table>
                    </fieldset>
                [{/if}]
            [{/block}]
        </td>
    </tr>

    <tr>
        <td colspan="2" style="padding: 15px;">
            [{block name="d3cleartmp_devmode"}]
                [{if false == $oCfg->getValue('blClrTmp_showcleartmpoptions')}]
                    <fieldset style="[{if $blDevMode}]background-color: yellow;[{/if}]">
                        <legend>[{oxmultilang ident="D3_CFG_CLRTMP_DEV_LEGEND"}]</legend>
                        <form name="delform" id="devmode" action="[{$oViewConf->getSelfLink()}]" method="post" onsubmit="[{if $blShopIsProductive && !$blDevMode}]alert('[{oxmultilang ident="D3_CFG_CLRTMP_DEV_DEACTPRODUCTIVE"}]');[{/if}] return;">
                            [{$oViewConf->getHiddenSid()}]
                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                            <input type="hidden" name="fnc" value="setDevelopmentMode">
                            <div style="margin: 5px 0 10px 0;">[{oxmultilang ident="D3_CFG_CLRTMP_DEV_DESC"}]</div>
                            <input type="hidden" name="value[blClrTmp_notmpuse]" value="[{if $blDevMode}]0[{else}]1[{/if}]">
                            <span class="d3modcfg_btn icon [{if $blDevMode}]d3color-green[{else}]d3color-orange[{/if}]">
                                <button type="submit" name="save" onclick='' [{$readonly}]>
                                    <i class="fa [{if $blDevMode}]fa-check-circle[{else}]fa-exclamation-triangle[{/if}] fa-inverse"></i>[{if $blDevMode}][{oxmultilang ident="D3_CFG_CLRTMP_DEV_BTNDEACT"}][{else}][{oxmultilang ident="D3_CFG_CLRTMP_DEV_BTNACT"}][{/if}]
                                </button>
                            </span>
                        </form>
                    </fieldset>
                [{/if}]
            [{/block}]
        </td>
    </tr>
</table>

<div id="mask" class=""></div>
<div id="popup2" class="d3loader-2">
    <div class="d3loader-spinner">
        <div class="d3loader-circle-1"></div>
        <div class="d3loader-circle-2"></div>
        <div class="d3loader-circle-3"></div>
    </div>
</div>

[{include file="@d3modcfg_lib/admin/inc/inc.tpl"}]