<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
    <title>[OXID Administrator]</title>
    [{$oView->getAdditionalHeadContent()}]
</head>

<!-- frames -->
[{if $oView->hasListItems()}]
    <frameset  rows="[{$oView->d3getListItemFrameRelation()}]" style="border: none" onload="top.loadEditFrame('[{$oViewConf->getSelfLink()|oxaddparams:$editurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]');">
        <frame src="[{$oViewConf->getSelfLink()|oxaddparams:$listurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]" name="list" id="list" style="border: none" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
        <frame src="" name="edit" id="edit" style="border: none" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
    </frameset>
[{else}]
    <frameset  rows="10%,*" style="border: none" onload="top.loadEditFrame('[{$oViewConf->getSelfLink()|oxaddparams:$editurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]');">
        <frame src="[{$oViewConf->getSelfLink()|oxaddparams:$listurl}][{if $oxid}]&oxid=[{$oxid}][{/if}][{$oView->d3getAdditionalUrlParams()}]" name="list" id="list" style="border: none" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
        <frame src="" name="edit" id="edit" style="border: none" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
    </frameset>
[{/if}]

</html>
