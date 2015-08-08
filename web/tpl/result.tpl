{if (isset($smarty.get.q))}
    <div class="row pageResult"  >
        <h4>Approved by users:</h4><br>
        {foreach $picodicoResults as $result}
            <img src="{$result['googleUrl']}">
        {/foreach}
        <hr>
        <div id="content">Loading...</div>
        <div class="clearfix" ></div>
        <div id="branding" ></div>
    </div>
{/if}