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
