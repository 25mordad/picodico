<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    {include file="tpl/head.tpl"}
    {include file="tpl/analytics.tpl"}
</head>
<body>
{include file="tpl/navbar.tpl"}
<div id="header">
    <div class="container">
        {if $smarty.get.page}
            {include file="page.tpl"}
        {else}
            {include file="tpl/resultMessage.tpl"}
            {if $smarty.get.search}
            {include file="tpl/smart.tpl"}
            {else}
            {include file="tpl/searchForm.tpl"}
            {include file="tpl/result.tpl"}
            {/if}
        {/if}
    </div>
</div>
    {include file="tpl/footer.tpl"}
     <script src="web/assets/js/production.min.js"></script>
</body>
</html>
