<?php

/**
 * Project: PicoDico
 * File:    dirtword.php
 *
 */
$dirtword = false;
$dirtContents = file_get_contents("./files/dirtword.txt");
if (strpos($dirtContents, strtolower($pictures[0]['translation']))) 
	$dirtword = true;
$pdTemp->assign('dirtword', $dirtword);

