<?php

/**
 * Project: PicoDico
 * File:   getPicture.php
 *
 */

//find picture
$db->where ('word', trim($_GET['q']));
$db->orderBy("count","DESC");
$results = $db->get ('pictures');

if (isset($results[0]['id']))
{
    $pdTemp->assign('picodicoResults', $results);
}
