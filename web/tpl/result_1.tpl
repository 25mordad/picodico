{if (isset($smarty.get.q))}
    <div class="row pageResult scroll"  >

        <h4>Approved by users:</h4><br>
        
        {if isset($picodicoResults)}
            
            
        {foreach $tt as $result}
            <div class="showPic" >
                <a class="gray" href="{$result['picUrl']}" target="_blank" >
                    <i class="fa fa-link"
                   data-toggle="tooltip" data-placement="top" title="Picture Url"
                            ></i></a>
                <a class="gray" href="{$result['siteUrl']}" target="_blank" >
                    <i class="fa fa-external-link"
                   data-toggle="tooltip" data-placement="top" title="{$result['title']}"
                            ></i></a>
                <div class="clearfix" ></div>
                <img src="{$result['googleUrl']}">
                <div class="clearfix" ></div>

            </div>
        {/foreach}
        {else}
            Be the first, to find the perfect photo for this word
        {/if}
        <div class="clearfix" ></div>
        <hr>
        Translation is: <b>{$googleTranslator['data']['translations'][0]['translatedText']}</b> <br>
        Language: <b>{$googleTranslator['data']['translations'][0]['detectedSourceLanguage']}</b>
        <hr>
        <h4>Founded on the web:</h4><br>
        <div class="row" >
			<div class="col-md-4" >
				<h3>Google:</h3>
				{foreach $googleImages as $result}
				<div class="col-md-6" >
					<img src="{$result}" class="img-responsive" >
				</div>
				{/foreach}
				<div class="clearfix" ></div>
			</div>
			<div class="col-md-4" >
				<h3>Yahoo:</h3>
				{foreach $yahooImages as $result}
				<div class="col-md-6" >
					<img src="{$result}" class="img-responsive" >
				</div>
				{/foreach}
				<div class="clearfix" ></div>
			</div>
			<div class="col-md-4" >
				<h3>Bing:</h3>
				{foreach $bingImages as $result}
				<div class="col-md-6" >
					<img src="{$result}" class="img-responsive" >
				</div>
				{/foreach}
				<div class="clearfix" ></div>
			</div>
        </div>
        
    </div>


{/if}
