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
				<a href="?search=smart&word={$smarty.get.word}&o=a"> -- Order By Approve -- </a> | 
				<a href="?search=smart&word={$smarty.get.word}&o=s"> -- Order By Similarity -- </a>
				
				<br><br>
				<div class="row" >
					{if $smarty.get.o == "s"}
					{if isset($findPix)}
					
						{foreach $findPix as $row}
						
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="hovereffect">
								<img src="{$row['similar']}" class="img-responsive" width="200" >
								
							</div>
						</div>
						
						{/foreach}
					
					{/if}
					{else}
					{foreach $findPix as $row}
					{if !isset($smarty.get.o)}
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<img src="{$row['url']}" class="img-responsive" width="200" >
					</div>
					{else}
					
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="hovereffect">
							<img src="{$row['url']}" class="img-responsive" width="200" >
							<div class="overlay">
								{$lng = {get_word id_word=$row['id_word']}}
							   <a class="info not" href="?search=smart&word={$smarty.get.word}&o=a&disapprove={$row['aprid']}"><i class="fa fa-check"></i> Wrong image </a><br>
							   <a class="info" href="similar.php?from=0&source={$row['url']}&word={$smarty.get.word}&language={$lng}" target="_blank" ><i class="fa fa-search-plus"></i> Find similar </a><br>
							   <h2 ><br>
								<p>
									<b>Source: {$row['source']} | {$lng}</b><br><br>
								</p>
							   </h2>
							   
							</div>
						</div>
					</div>
					{/if}
					
					{/foreach}
					{/if}
				</div>
				{/if}
				
				
				
				
				
            </div>

        </div>

        
    </div>

</div>

   
<style>
.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
  filter: grayscale(1) blur(3px);
  -webkit-filter: grayscale(1) blur(3px);
  -webkit-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 12px;
  padding: 0px;
  margin:0px;
  background: rgba(0, 0, 0, 0.6);
}

.hovereffect a.info {
  display: inline-block;
  text-decoration: none;
  padding: 0px 5px 0px 5px;
  border: 1px solid #ffffff;
  margin: 5px auto;
  background-color: green;
}

.hovereffect a.not {
  background-color: red;
}

.hovereffect a.info:hover {
  box-shadow: 0 0 5px #fff;
}

.hovereffect a.info, .hovereffect h2 {
  -webkit-transform: scale(0.7);
  -ms-transform: scale(0.7);
  transform: scale(0.7);
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
  opacity: 0;
  filter: alpha(opacity=0);
  color: #fff;
  text-transform: uppercase;
}

.hovereffect:hover a.info, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}
</style>
