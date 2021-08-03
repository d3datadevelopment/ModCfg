[{if $oView->getAction() == 'skip' && !$oView->getError()}]
<script type='text/javascript'>
    [{assign var="sFormerClassUrl" value=$oView->getFormerClassUrl()}]
    document.location = '[{$sFormerClassUrl|oxescape:"javascript"}]';
</script>
[{/if}]

[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<style>
    <!--
    ul li {
        list-style-type: disc;
        background:      none;
        margin-left:     5px;
    }

    .updatedesc {
        padding:       20px 0;
        border-bottom: 1px solid #c0c0c0;
        margin-bottom: 20px;
    }

    .installoption {

        padding:               5px 10px;
        float:                 left;
        width:                 350px;
        border:                none;
        margin:                5px;
        min-height:            95px;
        background:            #ddf0f6;
    }

    .installoption.checked {
        background: #a9d4f6;
    }

    .installoption label {
        cursor:                 pointer;
    }

    .installoption:nth-child(2n) {
        [{*clear: both;*}]
    }

    .installoption input {
        margin: 10px 5px;
    }

    .installoption h4 {
        display:     inline;
        font-size:   14px;
        font-weight: bold;
    }

    ol.steps {
        margin-top: 20px;
        padding-left: 55px;
    }

    ol.steps li {
        -moz-box-shadow:       3px 3px 4px #999;
        -webkit-box-shadow:    3px 3px 4px #999;
        box-shadow:            3px 3px 4px #999; /* For IE 8 */
        -ms-filter:            "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#999999')"; /* For IE 5.5 - 7 */
        filter:                progid:DXImageTransform.Microsoft.Shadow(Strength = 4, Direction = 135, Color = '#999999');
        font-size:             40px;
        color:                 #add8e6;
        padding:               5px 10px;
        width:                 80%;
        border:                1px solid #add8e6;
        -webkit-border-radius: 5px;
        -moz-border-radius:    5px;
        border-radius:         5px;
        margin:                5px;
        height:                auto;
        background-color:      white;
    }

    ol.steps li span {
        display:   block;
        font-size: 11px;
        color:     #000000;
    }

    ol.steps li span textarea {
        height:  100px;
        width:   97%;
        padding: 10px;
        margin:  10px 0;
    }

    .installnavigation {
        margin: 20px 0 20px 50px;
        height: 22px;
    }

    span.d3modcfg_btn,
    span.d3modcfg_btn:hover,
    span.d3modcfg_btn:active {
        margin-right: 20px;
    }

    .invisible {
        display: none;
    }

    .desclink {
        cursor: pointer;
        margin-bottom: 5px;
    }
    -->
</style>

<script type="text/javascript">
    <!--
    let oldElemId = '[{if $oView->hasDemoShopMode()}]option_check[{else}]option_auto[{/if}]';
    let oldElem;

    function _groupExp(el) {
        let _cur = el.parentNode;

        if (_cur.className === "exp") _cur.className = "";
          else _cur.className = "exp";
    }

    function changeElemColor(elem)
    {
        if (!oldElem && oldElemId) {
            oldElem = document.getElementById(oldElemId);
        }

        if (oldElem) {
            oldElem.className = 'installoption';
        }

        elem.className = 'installoption checked';
        oldElem = elem;
    }

    function showDescText(linkid)
    {
        //textid = linkid.replace('_desclink', '_desctext');
        let iHeight = '160px';
        document.getElementById('auto_desclink').style.display = 'none';
        document.getElementById('auto_desctext').style.display = 'block';
        document.getElementById('option_auto').style.height = iHeight;
        document.getElementById('manually_desclink').style.display = 'none';
        document.getElementById('manually_desctext').style.display = 'block';
        document.getElementById('option_manually').style.height = iHeight;
        document.getElementById('check_desclink').style.display = 'none';
        document.getElementById('check_desctext').style.display = 'block';
        document.getElementById('option_check').style.height = iHeight;
        document.getElementById('skip_desclink').style.display = 'none';
        document.getElementById('skip_desctext').style.display = 'block';
        document.getElementById('option_skip').style.height = iHeight;
    }

    function changeOption(optionid, frameelem)
    {
        document.getElementById(optionid).checked = true;
        changeElemColor(frameelem);
    }

    function showProcessing()
    {
        document.getElementById('mask').className = 'on';
        document.getElementById('popup2').className = 'd3loader-2 on';
    }
    -->
</script>

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="actshop" value="[{$actshopobj->getId()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<div id="mask" class="[{if $oView->getAction() == 'autoinstall' && $oView->requireUpdate()}]on[{/if}]"></div>
<div id="popup2" class="d3loader-2 [{if $oView->getAction() == 'autoinstall' && $oView->requireUpdate()}]on[{/if}]">
    <div class="d3loader-spinner">
        <div class="d3loader-circle-1"></div>
        <div class="d3loader-circle-2"></div>
        <div class="d3loader-circle-3"></div>
    </div>
</div>

<h2>[{oxmultilang ident="D3_CFG_MOD_UPDATE_TITLE"}]</h2>

<div class="updatedesc">
    [{if $oView->getHideSkip()}]
        [{oxmultilang ident="D3_CFG_MOD_UPDATE_SELECTDESC"}]
    [{else}]
        [{oxmultilang ident="D3_CFG_MOD_UPDATE_DESC"}]
    [{/if}]
</div>

[{if $oView->requireUpdate() && ($oView->getAction() == 'manualyinstall' || $oView->getAction() == 'autoinstall')}]
    [{$oView->getStepCountMessage()}]<br>
[{/if}]

[{if $oView->hasSkipHashes()}]
    <form action="[{$oViewConf->getSelfLink()}]" method="post">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
        <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
        <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
        [{if isset($sCheckMethod)}]
            <input type="hidden" name="sCheckMethod" value="[{$sCheckMethod}]">
        [{else}]
            <input type="hidden" name="sCheckMethod" value="">
        [{/if}]
        [{if isset($sUpdateMethod)}]
            <input type="hidden" name="sUpdateMethod" value="[{$sUpdateMethod}]">
        [{else}]
            <input type="hidden" name="sUpdateMethod" value="">
        [{/if}]
        [{if isset($sUpdateMethod)}]
            <input type="hidden" name="sUpdateClass" value="[{$sUpdateClass}]">
        [{else}]
            <input type="hidden" name="sUpdateClass" value="">
        [{/if}]
        <input type="hidden" name="fnc" value="delskiphashs">
        [{oxmultilang ident="D3_CFG_MOD_UPDATE_HASSKIPHASHES"}]<br>
        <span class="d3modcfg_btn icon d3color-green">
            <button type="submit">
                <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_DELSKIPHASHES"}]
            </button>
        </span>
    </form>
    <div style="float: none; clear: both;"></div>
<hr>
[{/if}]

[{if $oView->requireUpdate()}]
    [{if $oView->getModCfgUpdateRequiredMessage()}]

        <ol class="steps">
            <li>
                <span>
                    <textarea readonly="readonly">[{$oView->getModCfgUpdateRequiredMessage()}]</textarea>
                </span>
            </li>
            <li>
                <span>
                    <label>[{oxmultilang ident="D3_CFG_MOD_UPDATE_JOB_BREAK"}]</label>
                </span>
            </li>
        </ol>
    [{elseif !$oView->getAction()}]
        [{oxmultilang ident="D3_CFG_MOD_UPDATE_CHOOSESTEP"}]<br>

        [{if $oView->hasDemoShopMode()}]
            [{oxmultilang ident="D3_CFG_MOD_UPDATE_DEMOSHOP"}]<br>
        [{/if}]

        <form action="[{$oViewConf->getSelfLink()}]" method="post" style="float: left; margin: 20px 0; width: 800px;">
            [{$oViewConf->getHiddenSid()}]
            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
            <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
            <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
            <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
            [{if isset($sCheckMethod)}]
                <input type="hidden" name="sCheckMethod" value="[{$sCheckMethod}]">
            [{else}]
                <input type="hidden" name="sCheckMethod" value="">
            [{/if}]
            [{if isset($sUpdateMethod)}]
                <input type="hidden" name="sUpdateMethod" value="[{$sUpdateMethod}]">
            [{else}]
                <input type="hidden" name="sUpdateMethod" value="">
            [{/if}]
            [{if isset($sUpdateClass)}]
                <input type="hidden" name="sUpdateClass" value="[{$sUpdateClass}]">
            [{else}]
                <input type="hidden" name="sUpdateClass" value="">
            [{/if}]

            <div class="installoption [{if !$oView->hasDemoShopMode()}]checked[{/if}]" id="option_auto" [{if !$oView->hasDemoShopMode()}]onclick="changeOption('autoinstall', this);"[{/if}]>
                <input type="radio" name="fnc" value="autoinstall" id="autoinstall" [{if $oView->hasDemoShopMode()}] disabled [{else}] onchange="changeElemColor(parentNode);" checked="checked"[{/if}]>
                <h4>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_AUTOINSTALL"}]</h4>
                <div id="auto_desclink" class="desclink" onclick="showDescText(this.id); return false;">[{oxmultilang ident="D3_CFG_MOD_UPDATE_MOREINFO"}]</div>
                <div id="auto_desctext" class="invisible">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_AUTOINSTALL_DESC"}]</div>
            </div>
            <div class="installoption" id="option_manually" [{if !$oView->hasDemoShopMode()}]onclick="changeOption('manualyinstall', this);"[{/if}]>
                <input type="radio" name="fnc" value="manualyinstall" id="manualyinstall" [{if $oView->hasDemoShopMode()}] disabled [{else}] onchange="changeElemColor(parentNode);" [{/if}]>
                <h4>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_MANUALYINSTALL"}]</h4>
                <div id="manually_desclink" class="desclink" onclick="showDescText(this.id); return false;">[{oxmultilang ident="D3_CFG_MOD_UPDATE_MOREINFO"}]</div>
                <div id="manually_desctext" class="invisible">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_MANUALYINSTALL_DESC"}]</div>
            </div>
            <div class="installoption [{if $oView->hasDemoShopMode()}]checked[{/if}]" id="option_check" onclick="changeOption('checklist', this);">
                <input type="radio"  [{if $oView->hasDemoShopMode()}] checked [{/if}] name="fnc" value="checklist" id="checklist" onchange="changeElemColor(parentNode);">
                <h4>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_CHECKLIST"}]</h4>
                <div id="check_desclink" class="desclink" onclick="showDescText(this.id); return false;">[{oxmultilang ident="D3_CFG_MOD_UPDATE_MOREINFO"}]</div>
                <div id="check_desctext" class="invisible">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_CHECKLIST_DESC"}]</div>
                <div>
                    <input type="checkbox" id="checkasfile" name="checkasfile"><label for="checkasfile">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_CHECK_SAVEASFILE"}]</label>
                </div>
            </div>
            [{if !$oView->getHideSkip()}]
                <div class="installoption" id="option_skip" onclick="changeOption('skipupdate', this);">
                    <input type="radio" name="fnc" value="skipupdate" id="skipupdate" onchange="changeElemColor(parentNode);">
                    <h4>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP"}]</h4>
                    <div id="skip_desclink" class="desclink" onclick="showDescText(this.id); return false;">[{oxmultilang ident="D3_CFG_MOD_UPDATE_MOREINFO"}]</div>
                    <div id="skip_desctext" class="invisible">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP_DESC"}]</div>
                    <div>
                        [{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP_RANGE1"}]
                        <input type="text" name="intervalValue" size="3" maxlength="4" value="1" style="margin: 0;">
                        <select class="edittext" name="intervalType" style="margin: 0;">
                            <option value="day">[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_DAYS"}]</option>
                            <option value="hour" selected>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_HOURS"}]</option>
                            <option value="minute">[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_MINS"}]</option>
                        </select>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP_RANGE2"}]
                    </div>
                </div>
            [{/if}]

            <div style="float: none; clear: both;"></div>

    [{elseif $oView->getAction() == 'checklist' || $oView->getAction() == 'manualyinstall'}]
        [{if $oView->getCheckList()}]
            <ol class="steps">
                [{foreach from=$oView->getCheckList() item="aCheckItem" key="key"}]
                    <li>
                    <span>
                        <label for="[{$key}]">[{$oView->getCheckItemDesc($aCheckItem.type)}]</label>
                        [{if $aCheckItem.log}]
                            <br><textarea id="[{$key}]" readonly="readonly">[{$aCheckItem.log}]</textarea>
                        [{/if}]
                    </span>
                    </li>
                [{/foreach}]
            </ol>
        [{/if}]
    [{/if}]

    [{if $oView->getUpdateBreak()}]
    [{/if}]

    [{if $oView->getAction() == 'manualyinstall'}]
        <div class="installnavigation">
            <form action="[{$oViewConf->getSelfLink()}]" method="post" id="manualyinstallform">
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
                <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
                <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
                <input type="hidden" name="fnc" value="manualyinstall">
                <input type="hidden" name="exectype" value="[{$oView->getAction()}]">
                <input type="hidden" name="setExecute" value="0">
                <input type="hidden" name="sCheckMethod" value="[{$sCheckMethod}]">
                <input type="hidden" name="sUpdateMethod" value="[{$sUpdateMethod}]">
                <input type="hidden" name="sUpdateClass" value="[{$sUpdateClass}]">
                <input type="hidden" name="blReset" value="1">

                [{if $oView->getUserSelections()}]
                    [{foreach from=$oView->getUserSelections() key="iKey" item="oSelection"}]
                        <span class="d3modcfg_btn icon d3color-green">
                            <button type="submit" onclick="showProcessing(); document.getElementById('manualyinstallform').setExecute.value = '1'; document.getElementById('manualyinstallform').fnc.value = 'manualyinstall'; document.getElementById('manualyinstallform').sUpdateMethod.value = '[{$oSelection->getMethodName()}]'; document.getElementById('manualyinstallform').submit();">
                                <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident=$oSelection->getTranslationIdent()}]
                            </button>
                        </span>
                    [{/foreach}]
                [{else}]
                    <span class="d3modcfg_btn icon d3color-green">
                        <button type="submit" onclick="showProcessing(); document.getElementById('manualyinstallform').setExecute.value = '1'; document.getElementById('manualyinstallform').fnc.value = 'manualyinstall'; document.getElementById('manualyinstallform').submit();">
                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEPCONTINUE"}]
                        </button>
                    </span>
                [{/if}]
                    <span class="d3modcfg_btn icon d3color-blue">
                        <button type="submit" onclick="document.getElementById('manualyinstallform').setExecute.value = '0'; document.getElementById('manualyinstallform').fnc.value = 'sessionskip'; document.getElementById('manualyinstallform').submit();">
                            <i class="fas fa-arrow-right fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_SESSIONSKIP"}]
                        </button>
                    </span>
                    <span class="d3modcfg_btn icon d3color-yellow">
                        <button type="submit" onclick="document.getElementById('manualyinstallform').setExecute.value = '0'; document.getElementById('manualyinstallform').fnc.value = 'everskip'; document.getElementById('manualyinstallform').submit();">
                            <i class="fas fa-arrow-right fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_SKIPEVER"}]
                        </button>
                    </span>
            </form>

    [{elseif $oView->getUpdateBreak() && $oView->getAction() != 'autoinstall'}]
        <div class="installnavigation">
            <form action="[{$oViewConf->getSelfLink()}]" method="post">
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
                <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
                <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
                <input type="hidden" name="fnc" value="[{$oView->getAction()}]">
                <input type="hidden" name="sCheckMethod" value="[{$sCheckMethod}]">
                <input type="hidden" name="sUpdateMethod" value="[{$sUpdateMethod}]">
                <input type="hidden" name="sUpdateClass" value="[{$sUpdateClass}]">
                <input type="hidden" name="blReset" value="1">
                    <span class="d3modcfg_btn icon d3color-green">
                        <button type="submit">
                            <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_MULTICONTINUE"}]
                        </button>
                    </span>
            </form>
    [{elseif !$oView->getAction() && false == $oView->getModCfgUpdateRequiredMessage()}]
        <div class="installnavigation">
            <span class="d3modcfg_btn icon d3color-green">
                <button type="submit" onclick="showProcessing();">
                    <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_START"}]
                </button>
            </span>
    [{elseif $oView->getModCfgUpdateRequiredMessage()}]

        <div class="installnavigation">
            <form action="[{$oViewConf->getSelfLink()}]" method="post">
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
                <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
                <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
                <input type="hidden" name="fnc" value="skipupdate">
                <input type="hidden" name="blReset" value="1">
                <span class="d3modcfg_btn icon d3color-orange">
                    <button type="submit">
                        <i class="far fa-clock fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP"}]
                    </button>
                </span>
                <label for="intervalValue">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP_RANGE1"}]</label>
                <input type="text" name="intervalValue" id="intervalValue" size="3" maxlength="4" value="5" style="margin: 0;">
                <select class="edittext" name="intervalType" id="intervalType" style="margin: 0;">
                    <option value="day">[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_DAYS"}]</option>
                    <option value="hour">[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_HOURS"}]</option>
                    <option value="minute" selected>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_MINS"}]</option>
                </select>
                <label for="intervalType">[{oxmultilang ident="D3_CFG_MOD_UPDATE_STEP_SKIP_RANGE2"}]</label>
            </form>
    [{else}]
        <div class="installnavigation">
    [{/if}]

    [{if $oView->getError()}]
        <h2>[{oxmultilang ident="D3_CFG_MOD_UPDATE_JOB_ERROR"}]</h2>
        <div class="updatedesc">
            [{$oView->getErrorMessageText()}]
        </div>
    [{/if}]

    [{if $oView->getAction() && $oView->getAction() != 'autoinstall'}]
        <form action="[{$oViewConf->getSelfLink()}]" method="post">
            [{$oViewConf->getHiddenSid()}]
            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
            <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
            <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
            <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
            <input type="hidden" name="sCheckMethod" value="[{$sCheckMethod}]">
            <input type="hidden" name="sUpdateMethod" value="[{$sUpdateMethod}]">
            <input type="hidden" name="sUpdateClass" value="[{$sUpdateClass}]">
            <span class="d3modcfg_btn icon d3color-green">
                <button type="submit">
                    <i class="fas fa-home fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_MULTIBACK"}]
                </button>
            </span>
        </form>
    [{elseif $oView->getError()}]
        [{if $oView->getCheckList()}]
            <ol class="steps">
                [{foreach from=$oView->getCheckList() item="aCheckItem" key="key"}]
                    <li>
                    <span>
                        <label for="[{$key}]">[{$oView->getCheckItemDesc($aCheckItem.type)}]</label>
                        [{if $aCheckItem.log}]
                            <br><textarea id="[{$key}]" readonly="readonly">[{$aCheckItem.log}]</textarea>
                        [{/if}]
                    </span>
                    </li>
                [{/foreach}]
            </ol>
        [{/if}]
        <div class="installnavigation">
            <form action="[{$oViewConf->getSelfLink()}]" method="post">
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                <input type="hidden" name="formercl" value="[{$oView->getFormerClassName()}]">
                <input type="hidden" name="formeritem" value="[{$oView->getFormerItem()}]">
                <input type="hidden" name="blHideSkip" value="[{$oView->getHideSkip()}]">
                <input type="hidden" name="fnc" value="[{$oView->getAction()}]">
                <input type="hidden" name="sCheckMethod" value="[{$sCheckMethod}]">
                <input type="hidden" name="sUpdateMethod" value="[{$sUpdateMethod}]">
                <input type="hidden" name="sUpdateClass" value="[{$sUpdateClass}]">
                <span class="d3modcfg_btn icon d3color-green">
                    <button type="submit">
                        <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_UPDATE_MULTICONTINUE"}]
                    </button>
                </span>
            </form>
        </div>
    [{elseif $oView->getAction()}]
        <h2>[{oxmultilang ident="D3_CFG_MOD_UPDATE_WAIT"}]</h2>
    [{/if}]
</div>
[{else}]
    [{oxmultilang ident="D3_CFG_MOD_UPDATE_NOUPDATE"}]
    [{$oView->getBackLinkText()}]
[{/if}]

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{"d3mxcfg"|oxmultilangassign|strip_tags}]";
        parent.parent.sMenuSubItem = "[{"D3_INSTALL"|oxmultilangassign|strip_tags}]";
        [{if isset($_act)}]
            parent.parent.sWorkArea = "[{$_act}]";
        [{else}]
            parent.parent.sWorkArea = "";
        [{/if}]
        parent.parent.setTitle();
    }
</script>

[{if $oView->getAction() == 'autoinstall' && !$oView->getError()}]
    <script type='text/javascript'>
        [{if $oView->getRefreshUrl() == $oView->getFormerClassUrl()}]
            top.oxid.admin.reloadNavigation('[{$oViewConf->getActiveShopId()}]');
        [{/if}]
        document.location = '[{$oView->getRefreshUrl()}]';
    </script>
[{/if}]
