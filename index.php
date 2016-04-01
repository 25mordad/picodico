<?php

/**
 * Project: PicoDico
 * File:    index.php
 *
 * Project`s name is PicoDico - {2015-08-06}{1394-05-15}
 *
 * @link https://github.com/25mordad/picodico
 * @copyright 2015 25Mordad
 * @author Bahman R <25Mordad at gmail dot com> <++34 684 05 3215 >
 * @version Beta (This is the version of PicoDico)
 *
 *
 */

//Now start the code ;)
session_start();
require 'files/require.php';
require 'files/functions.php';
//find Message
if (isset($_SESSION['resultMessage'])){
    $pdTemp->assign('resultMessage', $_SESSION['resultMessage']);
    unset($_SESSION['resultMessage']);
}

//find OK picture
if (isset($_GET['approve']))
    require 'files/approve.php';



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
if (isset($_GET['q'])){
	//$srng = explode(" ", trim($_GET['q']));
	$clearText = trim($_GET['q']); 
	if (!isInOurDB($db,$clearText)){
		require 'files/analyseWord.php';
		require 'files/simple_html_dom.php';
		require 'files/crawler.php';
	}
	
	$db->join("pictures p", "p.id_word=w.id", "LEFT");
	$db->where("w.word", $clearText);
	$pdTemp->assign('pictures', $db->get ("words w"));
	
}

//if smart
if (isset($_GET['search'])){
	$pdTemp->assign('distinctWords', distinctWords($db));
	
	if (isset($_GET['word'])){
		$pdTemp->assign('findPix', findPix($db,$_GET['word']));
		if ($_GET['o'] == "a"){
			$pdTemp->assign('findPix', findPixOrderApp($db,$_GET['word']));
			if (isset($_GET['disapprove'])){
				$db->where ('id', $_GET['disapprove']);
				$pic = $db->get ('approve');
				$dataUpdate = Array (
					"disapprove"     => ++$pic[0][disapprove]
				);
				$db->where ('id', $pic[0]['id']);
				$db->update ('approve', $dataUpdate);
				$_SESSION['resultMessage']="Thank you";
				exit( header("location: ?search=smart&word=".$_GET['word']."&o=a") );
			}
		}
		if ($_GET['o'] == "s"){
			$db->orderBy("similarity","ASC");
			$db->where("word", $_GET['word']);
			$pdTemp->assign('findPix', $db->get ("similar"));
		}
	}
		
}
//Display temp
$pdTemp->display('index.tpl');
