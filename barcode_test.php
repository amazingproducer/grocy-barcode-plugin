<?php
$barcode = '070470290614';
$upc_api_url = 'https://upc.shamacon.us/lookup/'.$barcode;
/*
echo 'getting results from '.$upc_api_url;
*/
$upc_api_response = file_get_contents($upc_api_url);

/*
echo $upc_api_response;

echo 'parsing results';
*/
$upc_search_result = json_decode($upc_api_response, true);
//var_dump($upc_search_result);
foreach($upc_search_result["results"][0]["result"] as $key => $value) {
  echo $key . " => " . $value . "<br>";
}
echo $upc_search_result["results"][0]["result"]["product_name"];
echo "\r\n";
echo "done";
?>
