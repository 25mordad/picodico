<?php

/**
 * Project: PicoDico
 * File:    okPicture.php
 *
 */

//find duplication
$db->where ('picUrl', trim($_POST['url']));
$db->where ('word', trim($_GET['q']));
$results = $db->get ('pictures');

if (isset($results[0]['id']))
{
    $dataUpdate = Array (
        "count"     => ++$results[0]['count']
    );
    $db->where ('id', $results[0]['id']);
    $db->update ('pictures', $dataUpdate);
}else{
//Insert
    $dataWords = Array (
        "title"     => trim($_POST['title']),
        "siteUrl"   => trim($_POST['originalContextUrl']),
        "picUrl"    => trim($_POST['url']),
        "googleUrl" => trim($_POST['googleUrl']),
        "word"      => trim($_GET['q']),
        "ip"        => $_SERVER['REMOTE_ADDR'],
        "date"      => date("Y-m-d H:i:s"),
        "count"     => 1
    );
    $id = $db->insert ('pictures', $dataWords);

}
$_SESSION['resultMessage']="Thank you";
exit( header("location: ?q=".trim($_GET['q'])) );