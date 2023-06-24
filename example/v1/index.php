<?php
	if(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
	}

	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$real_ip_adress = $_SERVER['REMOTE_ADDR'];
	}

	$cip = $real_ip_adress;
	$url = 'https://freeipapi.com/api/json/'.$cip;
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$contents = curl_exec($ch);
	if(curl_errno($ch))
	{
		error_log(curl_error($ch));
		$data = '';
	}
	else
	{
		curl_close($ch);
		$data = json_decode($contents, true);
	}

	$lang = 'en';

	if(isset($data['countryCode']))
	{
		if($data['countryCode'] == 'RO')
		{
			$lang = 'ro';
		}
	}

	require("lang/".$lang."/index.php");
?>
