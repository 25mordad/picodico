<h1>Statistics</h1>
<div class="text-justify "   >
    <p>Recent New Words</p>
    <p>
        {foreach $recentSearch as $row}
            <a href="?q={$row['word']}" >{$row['word']}</a>{if !$row@last},{/if}
        {/foreach}
    </p>

</div>
<div class="row sample" >
	<div class="col-md-12" >
		Popular Search:
		{foreach $popularSearch as $row}
			<a href="?q={$row['word']}" >{$row['word']}</a>{if !$row@last},{/if}
		{/foreach}

	</div>

</div>
