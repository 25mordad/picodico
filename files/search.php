<?php

/**
 * Project: PicoDico
 * File:    search.php
 *
 */

//Insert
$dataWords = Array (
    "word" => trim($_GET['q']),
    "ip"   => $_SERVER['REMOTE_ADDR'],
    "date" => date("Y-m-d H:i:s")
);
$id = $db->insert ('words', $dataWords);