<?php
// setup the URL and read the CSS from a file
$url = 'https://cssminifier.com/raw';
$css = file_get_contents('styles.css');

// init the request, set various options, and send it
$ch = curl_init();

curl_setopt_array($ch, [
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
	CURLOPT_POSTFIELDS => http_build_query([ "input" => $css ])
]);

$minified = curl_exec($ch);

// finally, close the request
curl_close($ch);

// output the $minified css
echo $minified;

?>