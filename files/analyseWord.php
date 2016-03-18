<?php

/**
 * Project: PicoDico
 * File:    translator.php
 *
 */

$apiKey = 'AIzaSyAVDMvtsA7nLoxJYz5fd0vtNk_lgUums9c';
$url = "https://www.googleapis.com/language/translate/v2?q=$_GET[q]&target=en&key=" . $apiKey;
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);     //We want the result to be saved into variable, not printed out
$response = curl_exec($handle);                         
curl_close($handle);
$googleTranslator =  json_decode($response, true);

//Insert
$dataWords = Array (
    "word"        => $clearText,
    "translation" => $googleTranslator['data']['translations'][0]['translatedText'],
    "language"    => $googleTranslator['data']['translations'][0]['detectedSourceLanguage'],
    "ip"          => $_SERVER['REMOTE_ADDR'],
    "date"        => date("Y-m-d H:i:s")
);
$idWord = $db->insert ('words', $dataWords);




