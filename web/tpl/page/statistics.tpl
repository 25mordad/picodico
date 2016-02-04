<h1>Statistics</h1>
<div class="text-justify "   >
    <p>Recent New Words</p>
    <p>
        {foreach $recentSearch as $row}
            <a href="?q={$row['word']}" >{$row['word']}</a>{if !$row@last},{/if}
        {/foreach}
    </p>

</div>