[{$smarty.block.parent}]

[{if $oModCfg}]
    [{oxstyle include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/d3_mod_cfg.css')}]
    [{oxstyle}]

    [{oxscript include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/js/fontawesome-all.js')}]
    [{oxscript include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/js/fa-v4-shims.js')}]
    [{oxscript}]

    [{if $oModCfg->getValue('sClrTmp_systemaction2command')}]
        <li class="sep">
            <a href="[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;fnc=d3ExecCommand1&amp;item=header.tpl&amp;" onclick="this.style.color = 'red';" id="commandLink1" class="rc" style="float: left;"
               title="[{$oModCfg->getValue('sClrTmp_systemaction1name')}]">
                <b>
                    [{if $oModCfg->getValue('sClrTmp_systemaction1icon')}]
                        <i class="fa [{$oModCfg->getValue('sClrTmp_systemaction1icon')}]"></i>
                    [{/if}]
                    [{$oModCfg->getValue('sClrTmp_systemaction1name')}]
                </b>
            </a>
        </li>
    [{/if}]

    [{if $oModCfg->getValue('sClrTmp_systemaction1command')}]
        <li class="sep">
            <a href="[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;fnc=d3ExecCommand2&amp;item=header.tpl&amp;" onclick="this.style.color = 'red';" id="commandLink2" class="rc" style="float: left;"
               title="[{$oModCfg->getValue('sClrTmp_systemaction2name')}]">
                <b>
                    [{if $oModCfg->getValue('sClrTmp_systemaction2icon')}]
                        <i class="fa [{$oModCfg->getValue('sClrTmp_systemaction2icon')}]"></i>
                    [{/if}]
                    [{$oModCfg->getValue('sClrTmp_systemaction2name')}]
                </b>
            </a>
        </li>
    [{/if}]

    [{if false == $oModCfg->getValue('blClrTmp_showcleartmpoptions')}]
        <li class="sep">
            <a href="[{$oViewConf->getSelfLink()}]&cl=d3ClearTmp&amp;" id="clrTmpLink" target="_blank" class="rc" style="float: left;"
               title="[{oxmultilang ident="d3mxd3cleartmp2_desc2"}]">
                <b>[{oxmultilang ident="d3mxd3cleartmp2"}]</b>
            </a>

            <a style="float: left;" class="rc">
                <form target="header" action="[{$oViewConf->getSelfLink()}]" method="post">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                    <input type="hidden" name="fnc" value="d3ClearTmp">
                    <input type="hidden" name="clearall" value="1">
                    <input type="hidden" name="item" value="header.tpl">
                    <select size="1" name="d3clrtmpcachetype" style="font-size: 10px;" title="d3mxd3cleartmp2">
                        <option value="all" [{if $clearAll}] selected[{/if}]>[{oxmultilang ident="d3navclrtmp_typeall"}]</option>
                        <option value="tpllang" [{if $clearTplLang}] selected[{/if}]>[{oxmultilang ident="d3navclrtmp_typetpllang"}]</option>
                        <option value="tpl" [{if $clearTpl}] selected[{/if}]>[{oxmultilang ident="d3navclrtmp_typetpl"}]</option>
                        <option value="lang" [{if $clearLang}] selected[{/if}]>[{oxmultilang ident="d3navclrtmp_typelang"}]</option>
                    </select>
                    <input type="submit" onclick="this.style.background = 'red';" id="d3clrtmpbtn" value="[{oxmultilang ident="d3navclrtmp_clear"}]" style="font-size: 10px;">
                </form>
            </a>
        </li>
    [{/if}]
[{/if}]