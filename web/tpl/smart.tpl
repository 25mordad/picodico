<div class="row">
    <div class="col-md-12">
        <h1><a href="http://picodico.com" >PicoDico</a></h1>
        <h2 class="subtitle">Open Source Online Dictionary Based On Pictures</h2>
        <div class="row sample" >
            <div class="col-md-12" >
				
                Distinct words on PicoDico: <br>
                
                {foreach $distinctWords as $distinctWord}
                <a href="?search=smart&word={$distinctWord['translation']}" ><b>{$distinctWord['translation']}</b></a>, 
				{/foreach}
				
				<hr>
				
				{if isset($findPix)}
				<a href="?search=smart&word={$smarty.get.word}&o=a"> -- Order By Approve -- </a>
				
				<br><br>
				<div class="row" >
					SELECT * FROM `pictures` as p INNER JOIN approve as a ON a.id_picture=p.id  where id_word IN (SELECT id FROM `words` where translation='fish')
ORDER BY `a`.`approve`  DESC
					{foreach $findPix as $row}
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<img src="{$row['url']}" class="img-responsive" width="200" >
					</div>
					{/foreach}
				</div>
				{/if}
            </div>

        </div>

        
    </div>

</div>
