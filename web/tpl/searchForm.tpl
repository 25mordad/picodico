<div class="row">
    <div class="col-md-12">
        <h1><a href="http://picodico.com" >PicoDico</a></h1>
        <h2 class="subtitle">Open Source Online Dictionary Based On Pictures</h2>
        <div class="row sample" >
            <div class="col-md-12" >
                Sample:
                <a href="?q=fish" >fish</a>,
                <a href="?q=ماهی">ماهی</a>,
                <a href="?q=鱼" >鱼</a>,
                <a href="?q=poisson" >poisson</a>,
                <a href="?q=سمك">سمك</a>,
                <a href="?q=fisch" >fisch</a>,
                <a href="?q=pesce" >pesce</a>,
                <a href="?q=魚" >魚</a>,
                <a href="?q=рыба" >рыба</a>,
                <a href="?q=물고기" >물고기</a>,
                <a href="?q=مچھلی" >مچھلی</a>,
                <a href="?q=balık" >balık</a>,
                <a href="?q=pescado" >pescado</a>
            </div>

        </div>

        <form action="?" method="get" class="form-horizontal">

            <div class="form-group form-group-lg">

                <div class="col-sm-10">
                    <input class="form-control input-lg "  autocomplete="off" type="text"
                           name="q" placeholder="Enter your word, like book, fish, sea..."
                           {if (isset($smarty.get.q))}value="{$smarty.get.q}"{/if}
                            >
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn input-lg btn-theme"> Search <i class="fa fa-search"></i></button>
                </div>
            </div>


        </form>

        <div class="row sample" >
            <div class="col-md-12" >
                Popular Search:
                {foreach $popularSearch as $row}
                    <a href="?q={$row['word']}" >{$row['word']}</a>{if !$row@last},{/if}
                {/foreach}

            </div>

        </div>
    </div>

</div>
