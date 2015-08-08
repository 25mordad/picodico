<?php

/**
 * Project: PicoDico
 * File:   getPicture.php
 *
 */

//find picture
$db->where ('word', trim($_GET['q']));
$results = $db->get ('pictures');

if (isset($results[0]['id']))
{
    $pdTemp->assign('picodicoResults', $results);
}
