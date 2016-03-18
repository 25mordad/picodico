<?php

/**
 * Project: PicoDico
 * File:    crawler.php
 *
 */

//google
$googleHtml = file_get_html("https://www.google.com/search?q=$clearText&tbm=isch");
foreach($googleHtml->find('img') as $gi)
{
	$src = $gi->src;
	insertToPic($db,$idWord,$src,"google");
}
$pdTemp->assign('googleImages', $googleImages);

//yahoo
$yahooHtml = file_get_html("https://images.search.yahoo.com/search/images?p=$clearText");
$i=0;
foreach($yahooHtml->find('img') as $yi)
{
	if ($i % 2 == 0 && $i < 40 && $i > 0 )
	{
		$src = $yi->src;
		insertToPic($db,$idWord,$src,"yahoo");
	}
	$i ++;
}   
$pdTemp->assign('yahooImages', $yahooImages);

//bing
$bingHtml = file_get_html("http://www.bing.com/images/search?q=$clearText");
$i=0;
foreach($bingHtml->find('img') as $bi)
{
	if ($i >0 && $i < 21)
	{
		$src = $bi->src;
		insertToPic($db,$idWord,$src,"bing");
	}
	$i ++;
} 

   
$pdTemp->assign('bingImages', $bingImages);

