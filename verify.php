<?php
$access_token = 'VbLDGGZHAJ+ivF6l1I46NIJCVXBoJ9zV51Ar4W1uWRzvhop7/lslnT4/KIhrpWe2YjLJwnSsuV0dw2LZU+/hnYs4h6jv/H/7qh361giW2rz1p3nHcL8VgNdb2vhWzW8tSW32zv6sgBqfPBtGtdSbYgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>