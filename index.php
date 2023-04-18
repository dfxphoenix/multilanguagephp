<?php
ini_set('allow_url_fopen',1);
if (isset($_SERVER['HTTP_CLIENT_IP']))
{
    $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
}

if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
    $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
    $real_ip_adress = $_SERVER['REMOTE_ADDR'];
}

$cip = $real_ip_adress;
$url = 'http://ip-api.com/json/' . $cip;
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);
if (curl_errno($ch)) {
  echo curl_error($ch);
  echo "\n<br />";
  $data = '';
} else {
  curl_close($ch);
  $data = json_decode($contents, true);
}

if (is_string($contents) || strlen($contents)) {
  if ($data['countryCode'] == 'RO'){
     $lang = 'ro';
  }
  else {
	 $lang = 'ro';
  }
} else {
     echo "Failed to get contents.";
     $data = '';
     $lang = 'en';
}
    require("lang/".$lang."/index.php");
