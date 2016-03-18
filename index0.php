<?php


require 'files/simple_html_dom.php';
//$html = file_get_html('https://www.google.com/search?q=fish&tbm=isch');
//$html = file_get_html('http://www.bing.com/images/search?q=fish');
//$html = file_get_html('https://images.search.yahoo.com/search/images?p=fish');
echo  file_get_html('https://www.googleapis.com/language/translate/v2?q=pescado&target=en&key=AIzaSyCWbT1_4ZE3LzYFoMeMhQ4LCFCdudi6thU');

//foreach($html->find('img') as $element)
  //     echo "<img src='$element->src' >"  ;

//$html->find('span[class=hps]', 0)->innertext = 'foo';
