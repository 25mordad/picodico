<?php

/**
 * Project: PicoDico
 * File:    validation.php
 *
 */

$clearText = strtolower(trim($_GET['q'])); 
$stringArr = explode(" ", $clearText);
if (count($stringArr) > 1 ){
	$_SESSION['resultMessage']="Unacceptable word , No more than a word";
	exit( header("location: /") );	
}

