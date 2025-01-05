<?php
	// Determine the user's IP address
	if(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$real_ip_address = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$real_ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$real_ip_address = $_SERVER['REMOTE_ADDR'];
	}

	// Assign the client's IP address to the $cip variable
	$cip = $real_ip_address;

	// Build the URL to fetch the geolocation data based on the client's IP address
	$url = 'https://freeipapi.com/api/json/'.$cip;

	// Initialize cURL session
	$ch = curl_init();

	// Set cURL options for the request
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Execute the cURL request and fetch the data
	$contents = curl_exec($ch);

	// Check for cURL errors
	if(curl_errno($ch))
	{
		error_log(curl_error($ch));
		$data = '';
	}
	else
	{
		// Decode the JSON response into an associative array
		$data = json_decode($contents, true);
	}

	// Close the cURL session
	curl_close($ch);

	// Set the default language from the configuration
	$lang = 'en';

	// Check if user's country matches
	if(isset($data['countryCode']))
	{
		if($data['countryCode'] == 'RO')
		{
			$lang = 'ro';
		}
		if($data['countryCode'] == 'MD')
		{
			$lang = 'ro';
		}
	}

	// Require the page based on region
	require("lang/".$lang."/index.php");
?>