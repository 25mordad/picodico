{if (isset($smarty.get.q))}
    <div class="row pageResult scroll"  >

        <h4>Approved by users:</h4><br>
        {if isset($picodicoResults)}
            <script>
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>
        {foreach $picodicoResults as $result}
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
        <h4>Found on the web:</h4><br>
        <div id="content">Loading...</div>
        <div class="clearfix" ></div>
        <div id="branding" ></div>

    </div>


{/if}