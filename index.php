<?php

/**
 * Project: PicoDico
 * File:    index.php
 *
 * Project`s name is PicoDico - {2015-08-06}{1394-05-15}
 *
 * @link https://github.com/25mordad/picodico
 * @copyright 2015 25Mordad
 * @author Bahman R <25Mordad at gmail dot com> <++98 912 552 1340 >
 * @version Beta (This is the version of PicoDico)
 *
 *
 */

//Now start the code ;)
session_start();
require 'files/require.php';

//find Message
if (isset($_SESSION['resultMessage']))
{
    $pdTemp->assign('resultMessage', $_SESSION['resultMessage']);
    unset($_SESSION['resultMessage']);
}

//find picture
//require 'files/getPicture.php';

//find OK picture
//if (isset($_GET['ok']))
//    require 'files/okPicture.php';



//If page eq Statistics
if (isset($_GET['page']) and $_GET['page'] == "Statistics")
{
    //find recent
        $db->groupBy ("word");
        $db->orderBy("id","DESC");
        $pdTemp->assign('recentSearch', $db->get('words', 50));
        //find popular
		$db->groupBy ("word");
		$db->orderBy("cnt","DESC");
		$pdTemp->assign('popularSearch', $db->get('words', 15 , Array ( "word", "count(*) as cnt" )));
}


//if q
if (isset($_GET['q']))
{
	$clearText = $_GET['q']; //trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($_GET['q']))))));
	require 'files/search.php';
	require 'files/simple_html_dom.php';
	
	//google
	$googleHtml = file_get_html("https://www.google.com/search?q=$clearText&tbm=isch");
	foreach($googleHtml->find('img') as $gi)
       $googleImages[] = $gi->src  ;
	$pdTemp->assign('googleImages', $googleImages);
	
	//yahoo
	$yahooHtml = file_get_html("https://images.search.yahoo.com/search/images?p=$clearText");
	$i=0;
	foreach($yahooHtml->find('img') as $yi)
	{
		if ($i % 2 == 0 && $i < 40 && $i > 0 )
			$yahooImages[] = $yi->src  ;
		$i ++;
	}   
	$pdTemp->assign('yahooImages', $yahooImages);
	
	//bing
	$bingHtml = file_get_html("http://www.bing.com/images/search?q=$clearText");
	$i=0;
	foreach($bingHtml->find('img') as $bi)
	{
		if ($i >0 && $i < 21)
			$bingImages[] = $bi->src  ;
		$i ++;
	} 
	
       
	$pdTemp->assign('bingImages', $bingImages);
	
	
}

//Display temp
$pdTemp->display('index.tpl');
