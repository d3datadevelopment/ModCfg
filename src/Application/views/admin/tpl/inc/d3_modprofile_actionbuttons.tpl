<tr>
    <td class="edittext" colspan="2" style="padding-top: 20px;">
        <span class="d3modcfg_btn icon d3color-green">
            <button type="submit" class="edittext" name="saveArticle" onClick="document.myedit.fnc.value='save'" [{$readonly}]>
                <i class="fas fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_GENERAL_MODPROFILE_SAVE"}]
            </button>
        </span>
    </td>
</tr>

<tr>
    <td class="edittext" colspan="2"><br>
        <span class="d3modcfg_btn icon d3color-blue" style="margin-right: 10px;">
            <button type="submit" name="save" class="saveinnewlangtext" onClick="document.myedit.fnc.value='d3savecopy'" [{if $oxid == '-1'}] disabled[{/if}] [{$readonly}] [{$readonly_fields}] [{$custreadonly}]>
                <i class="fas fa-plus-square fa-inverse"></i>[{oxmultilang ident="D3_GENERAL_MODPROFILE_COPY"}]
            </button>
        </span>

        <span class="d3modcfg_btn icon d3color-blue">
            <button type="submit" name="save" class="saveinnewlangtext" onClick="document.myedit.fnc.value='d3exportProfile'" [{if $oxid == '-1'}] disabled[{/if}] [{$readonly_fields}] [{$custreadonly}]>
                <i class="fas fa-download fa-inverse"></i>[{oxmultilang ident="D3_GENERAL_MODPROFILE_EXPORT"}]
            </button>
        </span>
    </td>
</tr>