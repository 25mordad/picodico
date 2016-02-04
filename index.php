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
require 'files/getPicture.php';

//find OK picture
if (isset($_GET['ok']))
    require 'files/okPicture.php';

//find popular
$db->groupBy ("word");
$db->orderBy("cnt","DESC");
$pdTemp->assign('popularSearch', $db->get('words', 15 , Array ( "word", "count(*) as cnt" )));

//If page eq Statistics
if (isset($_GET['page']) and $_GET['page'] == "Statistics")
{
    //find recent
        $db->groupBy ("word");
        $db->orderBy("id","DESC");
        $pdTemp->assign('recentSearch', $db->get('words', 50));
}


//insert to DB
if (isset($_GET['q']))
    require 'files/search.php';

//Display temp
$pdTemp->display('index.tpl');
