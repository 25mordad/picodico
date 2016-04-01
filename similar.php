<?php

/**
 * Project: PicoDico
 * File:    similar.php
 *
 */

//
session_start();
require 'files/require.php';
require 'files/functions.php';
require 'files/image.compare.class.php';

//

echo '<center><img src="'.$_GET['source'].'"  width="200" ></center>';

echo "<hr>";
$results = findPix($db,$_GET['word']);
$CI = new compareImages;


for ($i=$_GET['from'];$i <$_GET['from']+5; $i++){
	$similarity = $CI->compare($_GET['source'],$results[$i]['url']);
	echo '<img src="'.$results[$i]['url'].'"  width="100" > similarity: ' . $similarity ;
	echo "<hr>";
	$data = Array (
		"word"        => $_GET['word'],
		"language"    => $_GET['language'],
		"source"      => $_GET['source'],
		"similar"     => $results[$i]['url'],
		"similarity"  => $similarity
	);
	$db->insert ('similar', $data);
}
if (isset($results[$i+1]['url']))
	echo "<a href='?from=$i&source=$_GET[source]&word=$_GET[word]&language=$_GET[language]'  > Next Page </a>";

