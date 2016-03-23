<?php

/**
 * Project: PicoDico
 * File:    approve.php
 *
 */

//find pictures    
$db->where ('id_picture', $_GET['approve']);
$pic = $db->get ('approve');

if (isset($pic[0][id]))
{

	if ( $_GET['r'] == "t" )
	{
		$dataUpdate = Array (
			"approve"     => ++$pic[0][approve]
		);
		$db->where ('id', $pic[0]['id']);
		$db->update ('approve', $dataUpdate);
	}else{
		$dataUpdate = Array (
			"disapprove"     => ++$pic[0][disapprove]
		);
		$db->where ('id', $pic[0]['id']);
		$db->update ('approve', $dataUpdate);
	}
	

}else{
	//Insert
	if ( $_GET['r'] == "t" )
	{
		$data = Array (
        "id_picture"     => $_GET['approve'],
        "approve"      => 1,
        "disapprove"    => 0
		);
	}else{
		$data = Array (
        "id_picture"     => $_GET['approve'],
        "approve"      => 0,
        "disapprove"    => 1
		);
	}
    
    $id = $db->insert ('approve', $data);
}

$_SESSION['resultMessage']="Thank you";
exit( header("location: ?q=".trim($_GET['q'])) );	



