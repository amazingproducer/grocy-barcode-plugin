<?php
$barcode = '070470290614';
$upc_api_url = 'https://upc.shamacon.us/grocy/'.$barcode;

$upc_api_response = file_get_contents($upc_api_url);
$upc_search_result = json_decode($upc_api_response, true);

if (array_key_exists('error', $upc_search_result)) {
	return null;
}
else {
	$barcode_name = $upc_search_result["product_name"];
	return array(
		'name' => $barcode_name,
		'location_id' => $this->Locations[0]->id,
		'qu_id_purchase' => $this->QuantityUnits[0]->id,
		'qu_id_stock' => $this->QuantityUnits[0]->id,
		'qu_factor_purchase_to_stock' => 1,
		'barcode' => $barcode
	);
}
?>
