<?php

/**
 * Project: PicoDico
 * File:    functions.php
 *
 */

//
function insertToPic($db,$idw, $url, $src){
	$dataPictures = Array (
		"id_word" => $idw,
		"url"     => $url,
		"source"  => $src
	);
	$db->insert ('pictures', $dataPictures);
}

//
function isInOurDB($db,$wd){
	$db->where("word", $wd);
	if($db->has("words")) {
		return true;
	} else {
		return false;
	}
}

//
function distinctWords($db){
	return $db->rawQuery('SELECT DISTINCT translation FROM words');
}

//
function findPix($db,$wd){
	return $db->rawQuery("SELECT * FROM `pictures` where id_word IN (SELECT id FROM `words` where translation=? ) LIMIT 100",Array($wd));
}

//
function findPixOrderApp($db,$wd){
	return $db->rawQuery("SELECT  p.id_word, p.url, p.source, a.id AS aprid  FROM pictures as p INNER JOIN approve as a ON a.id_picture=p.id where id_word IN (SELECT id FROM words where translation=? )  and (a.approve - a.disapprove > 0) ORDER BY a.approve DESC LIMIT 100",Array($wd));
}

//
function findPixOrderSim($db,$wd,$cc){
	require 'files/image.compare.class.php';
	$appRs = $db->rawQuery("SELECT * FROM pictures as p INNER JOIN approve as a ON a.id_picture=p.id where id_word IN (SELECT id FROM words where translation=? )  and (a.approve - a.disapprove > 0) ORDER BY a.approve DESC LIMIT 10",Array($wd));
	$CI = new compareImages;
	foreach ($appRs as $row)
	{
		echo $row['url'];
		echo $CI->compare($row['url'],$row['url']);
	}
	return $db->rawQuery("SELECT * FROM pictures LIMIT 100",Array($wd));
}

/////////////////////Smarty Function
function smarty_function_get_word($params, &$smarty)
{
	//$params['id_word']
	
	return $params['id_word'];
}
