[{if $d3pagenavi}]
    <style type="text/css">
        .d3pagenavigation {width: 100%; border-style: none;}
        .d3pagenavigation td {width: 33%; height: 22px;}
        .d3pagenavigation .prevPage, .d3pagenavigation .nextPage {padding-left:0.5em; padding-right:0.2em;}
        .d3pagenavigation .disabled {color: #787878;}
    </style>
    <table style="padding: 0; border-spacing: 0; border-collapse: collapse" class="d3pagenavigation">
        <tr>
            <td id="nav.site" class="pagenavigation" style="text-align: left">
                [{if $d3pagenavi->d3GetPageNaviConfig('blShowPageDropDown')}]
                    <form name="pageForm" id="pageForm" action="[{$oViewConf->getSelfLink()}]" method="post">
                        [{$oViewConf->getHiddenSid()}]
                        [{foreach from=$d3pagenavi->getAddParams() item="value" key="name"}]
                            <input type="hidden" name="[{$name}]" value="[{$value}]">
                        [{/foreach}]
                        <label for="page">[{oxmultilang ident="NAVIGATION_PAGE"}]</label>
                        <select id="page" name="page" onchange="this.parentNode.submit();">
                            [{section name=site start=$d3pagenavi->getFirstPage()  loop=$d3pagenavi->getLastPage()+1 step=1}]
                                <option value="[{$smarty.section.site.index}]" [{if $smarty.section.site.index == $d3pagenavi->getCurrentPage()}]selected="selected"[{/if}]>[{$smarty.section.site.index}]</option>
                            [{/section}]
                        </select> / [{$d3pagenavi->getLastPage()}]
                    </form>
                [{/if}]
        	</td>
            [{if $d3pagenavi->d3GetPageNaviConfig('blShowPageList')}]
                <td class="pagenavigation" style="text-align: center">
                    [{if $d3pagenavi->hasLeft()}]
                        <a id="nav.page.[{$d3pagenavi->getFirstPage()}]" class="pagenavigation" href="[{$d3pagenavi->getFirstPageLink()}]">[{$d3pagenavi->getFirstPage()}]</a>
                        [{if $d3pagenavi->getCurrentPage() > $d3pagenavi->getViewRange()-$d3pagenavi->getFirstPage()}]
                            ...
                        [{/if}]
                    [{/if}]
                    [{foreach key=iPage from=$d3pagenavi->getRangePageLinks() item="page"}]
                        <a id="nav.page.[{$iPage}]" class="pagenavigation[{if $iPage == $d3pagenavi->getCurrentPage()}] pagenavigationactive[{/if}]" href="[{$page}]">[{$iPage}]</a>
                    [{/foreach}]
                    [{if $d3pagenavi->hasRight()}]
                        [{if $d3pagenavi->getLastPage()-1 > $iPage}]
                            ...
                        [{/if}]
                        <a id="nav.page.[{$d3pagenavi->getLastPage()}]" class="pagenavigation" href="[{$d3pagenavi->getLastPageLink()}]">[{$d3pagenavi->getLastPage()}]</a>
                    [{/if}]
                </td>
            [{/if}]
            <td class="pagenavigation" style="text-align: right">
                [{if $d3pagenavi->d3GetPageNaviConfig('blShowDirectionLinks')}]
                    [{if $d3pagenavi->getPrevPageLink()}]
                        <a id="nav.first" class="prevPage" href="[{$d3pagenavi->getFirstPageLink()}]">[{$d3pagenavi->getFirstPageTitle()}]</a>
                        <a id="nav.prev" class="prevPage" href="[{$d3pagenavi->getPrevPageLink()}]">[{$d3pagenavi->getPrevPageTitle()}]</a>
                    [{else}]
                        <span class="prevPage disabled">[{$d3pagenavi->getFirstPageTitle()}]</span>
                        <span class="prevPage disabled">[{$d3pagenavi->getPrevPageTitle()}]</span>
                    [{/if}]
                    [{if $d3pagenavi->getNextPageLink()}]
                        <a id="nav.next" class="nextPage" href="[{$d3pagenavi->getNextPageLink()}]">[{$d3pagenavi->getNextPageTitle()}]</a>
                        <a id="nav.last" class="nextPage" href="[{$d3pagenavi->getLastPageLink()}]">[{$d3pagenavi->getLastPageTitle()}]</a>
                    [{else}]
                        <span class="nextPage disabled">[{$d3pagenavi->getNextPageTitle()}]</span>
                        <span class="nextPage disabled">[{$d3pagenavi->getLastPageTitle()}]</span>
                    [{/if}]
                [{/if}]
            </td>
        </tr>
    </table>
[{/if}]
