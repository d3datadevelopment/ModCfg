[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{assign var="sRedirectUrl" value=$oView->buildRetUrl($oView->getRedirectStep())}]
[{if $sRedirectUrl}]
    </body>
        <head>
            <meta http-equiv="refresh" content="0; URL=[{$sRedirectUrl}]">
        </head>
    <body>
[{/if}]


<style type="text/css">
<!--
    div.box{border:none;}
    ul li{list-style-type: disc; background: none; margin-left: 5px;}
-->
</style>

<script type="text/javascript">
<!--

function _groupExp(el) {
    var _cur = el.parentNode;

    if (_cur.className === "exp") _cur.className = "";
      else _cur.className = "exp";
}

-->
</script>


[{capture name=protokoll_items}]
    [{if $sLogURI}]
        [{oxmultilang ident="D3_INSTALL_PROTOKOLLURI"}]<br><a href="[{$sLogURI}]" target="installLog">[{$sLogURI}]</a><br><br>
    [{/if}]
    [{if $oView->getInstallProtokoll()}]
        <ul>
            [{foreach from=$oView->getInstallProtokoll() item="oProtokoll"}]
                [{assign var="sMarkerIdent" value="D3_INSTALL_PROTOKOLLITEM_"|cat:$oProtokoll->Marker}]
                <li style="color:[{if $oProtokoll->Status}]darkgreen[{else}]darkred[{/if}];">[{if $oProtokoll->Status}][{oxmultilang ident="D3_INSTALL_PROTOKOLL_SUCCESSFULL"}][{else}][{oxmultilang ident="D3_INSTALL_PROTOKOLL_NOTSUCCESSFULL"}][{/if}] - [{oxmultilang ident=$sMarkerIdent}] - [{$oProtokoll->addText}]</li>
            [{/foreach}]
        </ul>
    [{/if}]
[{/capture}]

<h3 style="font-weight: bold; text-decoration: underline;">[{if $blNonExistingFunction}][{$oView->getActStep()}][{else}][{oxmultilang ident=$oView->d3getActTitleMLIdent()}][{/if}]</h3>

[{if $oView->getActStep() == 'finished' && !$oProtokoll->Status && !$oView->hasAlternateConnect()}]
    <div style="background-color: #EFF0FF; border: 1px solid #BBCCEE; color: #999999; margin-bottom: 10px; padding: 0 5px;">
        [{oxmultilang ident="D3_INSTALL_FTPINFO_DISABLED"}]
    </div>
[{elseif $oView->hasAlternateConnect()}]
    <div style="background-color: #EFF0FF; border: 1px solid #BBCCEE; color: #999999; margin-bottom: 10px; padding: 0 5px;">
        [{oxmultilang ident="D3_INSTALL_FTPINFO_ENABLED"}]
    </div>
[{/if}]

[{if $oView->getActStep() != 'init' &&
     $oView->getActStep() != 'finished' &&
     $oView->getActStep() != 'error' &&
     $oView->getActStep() != 'showDescription' &&
     !$blExpertMode}]

    <div id="mask" class="on"></div>
    <div id="popup" class="on">
        <i class="fas fa-spinner fa-4x fa-pulse fa-pull-left"></i>
        <span>[{oxmultilang ident="D3_CFG_PLEASEWAIT"}]</span>
    </div>
[{/if}]

<div style="position: absolute; right: 70px; top: 15px;">
    [{if !$blClrTmp}]
        [{strip}]
            [{oxmultilang ident="D3_INSTALL_PROGRESS"}]&nbsp;
            <div style="background-color: rgb(180, 210, 245); float: right; border:1px solid #000000; width:100px; height:15px; margin: auto auto auto 10px; text-align: left;">
                <div style="background-color:#1a4782; width:[{$oView->getProgressStatus()}]; height: 15px;" id="balken"></div>
                <div style="line-height:15px;text-align:center; position: absolute; top: 0; width: 100px;">
                    <span style="font-size: 9px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif;">[{$oView->getProgressStatus()}]</span>
                </div>
            </div>
        [{/strip}]
    [{/if}]
</div>

<div style="float: none; clear: both; font-size: 0; line-height: 0.1pt;"></div>

[{if $blNonExistingFunction}]
    <div>[{oxmultilang ident="D3_INSTALL_NONEXISTINGSTEP"}]<br><br></div>

    <form action="[{$oViewConf->getSelfLink()}]" method="post" style="float: left;" id="nonExistingStep">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
        <input type="hidden" name="nextStep" value="[{$oView->getNextStep()}]">
        <span class="d3modcfg_btn icon d3color-red">
            <button type="submit">
                <i class="fas fa-times-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_EXPMODENXTSTEP"}]
            </button>
        </span>

    </form>
[{/if}]

[{if $blExpertMode == true}]
    [{oxmultilang ident=$oView->d3getActDescMLIdent()}]<br>
    <br>
    [{if $aStepDetails}]
        <fieldset>
            [{foreach from=$aStepDetails item="oDetail"}]
                [{$oDetail}]<br>
            [{/foreach}]
        </fieldset>
    [{/if}]
    <hr><br>
    [{oxmultilang ident="D3_INSTALL_EXPMODEQUESTION"}]<br>
    <br>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" style="float: left; margin-right: 10px;" id="expModeExecAuto">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
        <input type="hidden" name="expconf" value="1">
        <input type="hidden" name="nextStep" value="[{$oView->getActStep()}]">
        <span class="d3modcfg_btn icon d3color-green">
            <button type="submit">
                <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_EXPMODEEXECAUTO"}]
            </button>
        </span>

    </form>
    <form action="[{$oViewConf->getSelfLink()}]" method="get" style="float: left;" id="expModeNextStep">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
        <input type="hidden" name="nextStep" value="[{$oView->getNextStep()}]">
        <span class="d3modcfg_btn icon d3color-red">
            <button type="submit">
                <i class="fas fa-times-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_EXPMODENXTSTEP"}]
            </button>
        </span>

    </form>
[{elseif $oView->getActStep() == 'init'}]

        [{oxmultilang ident="D3_INSTALL_STARTSETUP"}]<br><br>
        [{oxmultilang ident="D3_INSTALL_SETUPSTEPS"}]<br>
        <ul>
            <li>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_LOADDESC"}]</li>
            <li>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_COPYFILES"}]</li>
            <li>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_MODSTEPS"}]</li>
            <li>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_DBITEMS"}]</li>
        </ul><br>
        [{oxmultilang ident="D3_INSTALL_STARTSETUP1"}][{$oView->getModName()}][{oxmultilang ident="D3_INSTALL_STARTSETUP2"}]<br>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" target="edit" style="float: left; margin-right: 13px;" id="d3install_no">
        <input type="hidden" name="cl" value="d3modlib_status">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">

        <span class="d3modcfg_btn icon d3color-red">
            <button type="submit">
                <i class="fas fa-times-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_NO"}]
            </button>
        </span>
    </form>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" style="float: left; margin-left: 3px; margin-right: 3px;" id="d3install_yes">
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="installtype" value="express">
        <input type="hidden" name="nextStep" value="[{$oView->getNextStep()}]">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">

        <span class="d3modcfg_btn icon d3color-blue">
            <button type="submit">
                <i class="fas fa-question-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_YES"}]
            </button>
        </span>
    </form>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" style="float: left; margin-left: 3px; margin-right: 3px;" id="d3install_yesexpert">
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="installtype" value="expert">
        <input type="hidden" name="nextStep" value="[{$oView->getNextStep(1)}]">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">

        <span class="d3modcfg_btn icon d3color-blue">
            <button type="submit">
                <i class="fas fa-question-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_YESEXPERT"}]
            </button>
        </span>
    </form>
    <div style="float: none; clear: both;"></div>
    <div style="margin-top: 15px;">[{oxmultilang ident="D3_INSTALL_SETUPDESC"}]</div>
[{elseif $oView->getActStep() == 'showDescription'}]
    [{$sDescriptionContent}]
    <br><br>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" id="d3install_desccontinue">
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="nextStep" value="[{$oView->getNextStep(1)}]">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
        <input type="hidden" name="confirmDesc" value="1">
        <span class="d3modcfg_btn icon d3color-green">
            <button type="submit">
                <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_DESCCONTINUE"}]
            </button>
        </span>
    </form>
[{elseif $oView->getActStep() == 'finished'}]
    [{oxmultilang ident="D3_INSTALL_SETUPSTEPS_FINISHED_DESC"}]<br><br>
    [{if !$blClrTmp && !$oView->hasAlternateConnect()}]
        <form action="[{$oViewConf->getSelfLink()}]" method="post" id="d3install_cleanup">
            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
            [{$oViewConf->getHiddenSid()}]
            <input type="hidden" name="nextStep" value="cleanup">
            <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
            [{oxmultilang ident="D3_INSTALL_CLEANUP"}]<br>
            <span class="d3modcfg_btn icon d3color-orange" style="margin: 0;">
                <button type="submit">
                    <i class="fas fa-exclamation-triangle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_CLEANUPSTART"}]
                </button>
            </span>
            <div class="zero_placeholder"></div>
        </form>
        <br>
    [{elseif $blClrTmpSuccess}]
        [{oxmultilang ident="D3_INSTALL_CLEANUPSUCCESS"}]<br><br>
    [{else}]
        [{oxmultilang ident="D3_INSTALL_CLEANUPNOTSUCCESS"}]<br><br>
    [{/if}]

    <div class="groupExp">
        <div class="">
            <a href="#" class="rc" onclick="_groupExp(this); return false;">
                [{if $oView->getProtokollStatus()}]
                    <i class="fas fa-check-circle d3fa-17x d3fa-color-green" style="border: 0; display: inline; margin: 0;" title="[{oxmultilang ident="D3_INSTALL_PROTOKOLL_SUCCESS"}]"></i>
                    [{oxmultilang ident="D3_INSTALL_PROTOKOLL_SUCCESS"}]
                [{else}]
                    <i class="fas fa-exclamation-triangle d3fa-17x d3fa-color-red" title="[{oxmultilang ident="D3_INSTALL_PROTOKOLL_ERROR"}]"></i>
                    [{oxmultilang ident="D3_INSTALL_PROTOKOLL_ERROR"}]
                [{/if}]
                [{oxmultilang ident="D3_INSTALL_PROTOKOLL_DETAILS"}]</a>
            <dl>
                <dt>
                </dt>
                <dd>
                    [{$smarty.capture.protokoll_items}]
                </dd>
                <div class="spacer"></div>
            </dl>
        </div>
    </div>

    <br>
    <br>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_FINISHED_DESC2"}]<br>
    <br>
    [{*** classname required in url ***}]
    [{assign var="formaction" value=$oViewConf->getSelfLink()}]
    <form action="[{$formaction|oxaddparams:"cl=d3modlib"}]" method="post" style="float: left; margin-right: 10px;" target="basefrm">
        <input type="hidden" name="cl" value="d3modlib">
        [{$oViewConf->getHiddenSid()}]
        <span class="d3modcfg_btn icon d3color-green" style="margin: 0;">
            <button type="submit">
                <i class="fas fa-lock fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_FINISH"}]
            </button>
        </span>
    </form>
[{elseif $oView->getActStep() == 'error'}]
    <br>
        [{oxmultilang ident="D3_INSTALL_ROLLBACK1"}]<br><br>
        [{oxmultilang ident="D3_INSTALL_ROLLBACK2"}]
        <ul>
            [{assign var="classparam" value="cl="|cat:$oViewConf->getActiveClassName()}]
            [{assign var="libparam" value="modid="|cat:$oView->d3GetModId()}]
            <li>[{oxmultilang ident="D3_INSTALL_ROLLBACK3"}] <a href="[{$oViewConf->getSelfLink()|oxaddparams:$classparam|oxaddparams:$libparam|oxaddparams:"fnc=filedownload"}]">[{oxmultilang ident="D3_INSTALL_ROLLBACK5"}]</a></li>
            <li>[{oxmultilang ident="D3_INSTALL_ROLLBACK4"}]</li>
        </ul>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" style="float: left; margin-right: 10px;" id="initrollback">
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="nextStep" value="rollback">
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
        <span class="d3modcfg_btn icon d3color-green" style="margin: 0;">
            <button type="submit">
                <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_SETUPSTEPS_INITROLLBACK"}]
            </button>
        </span>
    </form>
    <form action="[{$oViewConf->getSelfLink()}]" method="post" target="edit" style="float: left;" id="rollback_cancel">
        <input type="hidden" name="cl" value="d3modlib_status">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="modid" value="[{$oView->d3GetModId()}]">
        <span class="d3modcfg_btn icon d3color-red" style="margin: 0;">
            <button type="submit">
                <i class="fas fa-times-circle fa-inverse"></i>[{oxmultilang ident="D3_INSTALL_ROLLBACKCANCEL"}]
            </button>
        </span>
    </form>
    <div style="float: none; clear: both;"></div>
    <br>
    [{$smarty.capture.protokoll_items}]
[{elseif $oView->getActStep() == 'rollback_end'}]
    [{$smarty.capture.protokoll_items}]
[{/if}]

[{include file="d3_cfg_mod_inc.tpl" blHideLinkBar=true}]
