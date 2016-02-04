<div class="row pageResult" " >
    {if $smarty.get.page eq "Developers"}
        {include file="tpl/page/developers.tpl"}
    {else}
        {if $smarty.get.page eq "WhatIsPicoDico"}
            {include file="tpl/page/whatIsPicoDico.tpl"}
        {else}
            {if $smarty.get.page eq "Donate"}
                {include file="tpl/page/donate.tpl"}
            {else}
                {if $smarty.get.page eq "Statistics"}
                    {include file="tpl/page/statistics.tpl"}
                {else}
                    {include file="tpl/page/whatIsPicoDico.tpl"}
                {/if}
            {/if}
        {/if}
    {/if}
</div>