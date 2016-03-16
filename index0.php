<?php


require 'files/simple_html_dom.php';
//$html = file_get_html('https://www.google.com/search?q=fish&tbm=isch');
//$html = file_get_html('http://www.bing.com/images/search?q=fish');
$html = file_get_html('https://images.search.yahoo.com/search/images?p=fish');

foreach($html->find('img') as $element)
       echo "<img src='$element->src' >"  ;

