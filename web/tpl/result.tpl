{if (isset($smarty.get.q))}
    <div class="row pageResult"  >
        <h4>Approved by users:</h4><br>
        {if isset($picodicoResults)}
        {foreach $picodicoResults as $result}
            <img src="{$result['googleUrl']}">
        {/foreach}
        {else}
            Be the first, to find the perfect photo for this word
        {/if}
        <hr>
        <h4>Found on the web:</h4><br>
        <div id="content">Loading...</div>
        <div class="clearfix" ></div>
        <div id="branding" ></div>
    </div>
{/if}