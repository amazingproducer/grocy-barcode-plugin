<?php
$barcode = '070470290614';
$upc_api_url = 'https://upc.shamacon.us/lookup/'.$barcode;
/*
echo 'getting results from '.$upc_api_url;
*/
$upc_api_response = file_get_contents($upc_api_url);

echo $upc_api_response;
/*
echo 'parsing results';
*/
$upc_search_result = json_decode($upc_api_response);
echo $upc_search_result;
echo 'done';
?>
