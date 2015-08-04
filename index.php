<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PicoDico is an open source online dictionary base on pictures ">
    <meta name="author" content="25Mordad">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>PicoDico is an open source online dictionary base on pictures </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- siimple style -->
    <link href="assets/css/style.css" rel="stylesheet">
    
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
              for (var i = 0; i < cursor.pages.length; i++) {
                  var page = cursor.pages[i];
                  if (curPage == i) {

                      // If we are on the current page, then don't make a link.
                      var label = document.createTextNode(' ' + page.label + ' ');
                      pagesDiv.appendChild(label);
                  } else {

                      // Create links to other pages using gotoPage() on the searcher.
                      var link = document.createElement('a');
                      link.href="/image-search/v1/javascript:imageSearch.gotoPage("+i+');';
                      link.innerHTML = page.label;
                      link.style.marginRight = '2px';
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
                  for (var i = 0; i < 4; i++) {
                      // For each result write it's title and image to the screen
                      var result = results[i];
                      var imgContainer = document.createElement('div');
                      imgContainer.setAttribute("class", "showPic");
                      var title = document.createElement('div');
                      var originalContextUrl = document.createElement('div');
                      var url = document.createElement('div');

                      // We use titleNoFormatting so that no HTML tags are left in the
                      // title
                      title.innerHTML = result.titleNoFormatting;
                      originalContextUrl.innerHTML = result.originalContextUrl;
                      url.innerHTML = result.url;
                      var newImg = document.createElement('img');

                      // There is also a result.url property which has the escaped version
                      newImg.src=result.tbUrl;
                      //imgContainer.appendChild(title);
                      //imgContainer.appendChild(originalContextUrl);
                      //imgContainer.appendChild(url);
                      imgContainer.appendChild(newImg);

                      // Put our title + image in the content
                      contentDiv.appendChild(imgContainer);
                  }

                  // Now add links to additional pages of search results.
                  //addPaginationLinks(imageSearch);
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
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://picodico.com">PicoDico.com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Help Us</a></li>
			<li><a href="#">What Is PicoDico?</a></li>
			<li><a href="#">Donate</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>PicoDico</h1>
					<h2 class="subtitle">Open Source Online Dictionary Base On Pictures</h2>
                    <form action="?" method="get" class="form-horizontal">

                        <div class="form-group form-group-lg">

                            <div class="col-sm-10">
                                <input class="form-control input-lg " autocomplete="off" type="text"
                                       name="q" placeholder="Enter your word, like book, fish, sea..."
                                    <?php if(isset($_GET['q'])){echo "  value=\"$_GET[q]\"  ";}  ?>
                                    >
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn input-lg btn-theme">Search</button>
                            </div>
                        </div>

                    </form>
				</div>

			</div>
            <?php if(isset($_GET['q'])){ ?>
                <div class="row" style="background: url('assets/img/bg.png') repeat;padding: 10px;border-radius: 5px" >
                    <div id="content">Loading...</div>
                    <div class="clearfix" ></div>
                    <div id="branding" ></div>
                </div>

            <?php } ?>
		</div>
	</div>
	<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
					<p class="copyright"> 	&copy;  2015 <a href="http://picodico.com" >PicoDico</a> Version Beta</p>
			</div>
		</div>		
	</div>	
	</div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
