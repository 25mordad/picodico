<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="PicoDico is an open source online dictionary base on pictures ">
<meta name="author" content="25Mordad">
<link rel="shortcut icon" href="web/assets/img/favicon.png">

<title>PicoDico is an open source online dictionary based on pictures </title>

<!-- Bootstrap -->
<link href="web/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="web/assets/css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="web/assets/css/font-awesome.min.css">
<!-- style -->
<link href="web/assets/css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };
    google.load('search', '1');

    var imageSearch;
    var q = getUrlParameter('q');
    function addPaginationLinks() {

        // To paginate search results, use the cursor function.
        var cursor = imageSearch.cursor;
        var curPage = cursor.currentPageIndex; // check what page the app is on
        var pagesDiv = document.createElement('div');
        pagesDiv.setAttribute("class", "showPages");
        for (var i = 0; i < cursor.pages.length; i++) {
            var page = cursor.pages[i];
            if (curPage == i) {

                // If we are on the current page, then don't make a link.
                var label = document.createTextNode(' ' + page.label + ' ');
                pagesDiv.appendChild(label);
            } else {

                // Create links to other pages using gotoPage() on the searcher.
                var link = document.createElement('a');
                link.href="javascript:imageSearch.gotoPage("+i+");";
                link.innerHTML = page.label;
                link.style.marginRight = '2px';
                link.setAttribute("class", "nextPage");
                pagesDiv.appendChild(link);
            }
        }

        var contentDiv = document.getElementById('content');
        contentDiv.appendChild(pagesDiv);
    }

    function searchComplete() {

        // Check that we got results
        if (imageSearch.results && imageSearch.results.length > 0) {

            // Grab our content div, clear it.
            var contentDiv = document.getElementById('content');
            contentDiv.innerHTML = '';

            // Loop through our results, printing them to the page.
            var results = imageSearch.results;
            for (var i = 0; i < results.length; i++) {
                // For each result write it's title and image to the screen
                var result = results[i];

                var imgContainer = document.createElement('div');
                imgContainer.setAttribute("class", "showPic");
                imgContainer.setAttribute("id", "pic_"+i);

                var title = document.createElement('div');
                title.setAttribute("class", "showTitle");
                title.setAttribute("id", "title_"+i);

                var btt = document.createElement('div');
                btt.setAttribute("class", "showBtt");
                btt.setAttribute("id", "btt_"+i);

                var originalContextUrl = document.createElement('div');
                originalContextUrl.setAttribute("class", "showOriginalContextUrl");
                originalContextUrl.setAttribute("id", "originalContextUrl_"+i);

                var url = document.createElement('div');
                url.setAttribute("class", "showUrl");
                url.setAttribute("id", "url_"+i);

                var googleUrl = document.createElement('div');
                googleUrl.setAttribute("class", "showUrl");
                googleUrl.setAttribute("id", "googleUrl_"+i);

                // We use titleNoFormatting so that no HTML tags are left in the
                // title
                btt.innerHTML = "<small><a href='javascript:validPic("+i+")'>Yes</a>, this is OK</small>";
                title.innerHTML = result.titleNoFormatting;
                originalContextUrl.innerHTML = result.originalContextUrl;
                url.innerHTML = result.url;
                googleUrl.innerHTML = result.tbUrl;
                var newImg = document.createElement('img');

                // There is also a result.url property which has the escaped version
                newImg.src=result.tbUrl;
                imgContainer.appendChild(btt);
                imgContainer.appendChild(title);
                imgContainer.appendChild(originalContextUrl);
                imgContainer.appendChild(url);
                imgContainer.appendChild(googleUrl);
                imgContainer.appendChild(newImg);

                // Put our title + image in the content
                contentDiv.appendChild(imgContainer);
            }

            // Now add links to additional pages of search results.
            addPaginationLinks(imageSearch);
        }
    }

    function OnLoad() {

        // Create an Image Search instance.
        imageSearch = new google.search.ImageSearch();

        // Set searchComplete as the callback function when a search is
        // complete.  The imageSearch object will have results in it.
        imageSearch.setSearchCompleteCallback(this, searchComplete, null);

        // Find me a beautiful car.
        imageSearch.execute(q);
        // Include the required Google branding
        google.search.Search.getBranding('branding');
    }
    google.setOnLoadCallback(OnLoad);
</script>
<script>
    function validPic(id)
    {
        var title              = $('#title_'+id);
        titleInput = "<input type='hidden' name='title' value='"+title.html()+"'>";

        var originalContextUrl = $('#originalContextUrl_'+id);
        originalContextUrlInput = "<input type='hidden' name='originalContextUrl' value='"+originalContextUrl.html()+"'>";

        var url                = $('#url_'+id);
        urlInput = "<input type='hidden' name='url' value='"+url.html()+"'>";

        var googleUrl          = $('#googleUrl_'+id);
        googleUrlInput = "<input type='hidden' name='googleUrl' value='"+googleUrl.html()+"'>";

        $('<form action="?ok=true&q={$smarty.get.q}" method="post">'+titleInput+originalContextUrlInput+urlInput+googleUrlInput+'</form>').appendTo('body').submit();
        console.log(titleInput);


    }
</script>