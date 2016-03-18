<?php
    $apiKey = 'AIzaSyAVDMvtsA7nLoxJYz5fd0vtNk_lgUums9c';
    $url = 'https://www.googleapis.com/language/translate/v2?q=pescado&target=en&key=' . $apiKey;

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);     //We want the result to be saved into variable, not printed out
    $response = curl_exec($handle);                         
    curl_close($handle);
	echo "<pre>";
	
    print_r(json_decode($response, true));
    echo "</pre>";
?>
