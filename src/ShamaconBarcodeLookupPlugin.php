<?php

namespace GrocyPlugins\BarcodeScanner;

require_once __DIR__ . '/../vendor/autoload.php';

use \Grocy\Helpers\BaseBarcodeLookupPlugin;
use GrocyPlugins\BarcodeScanner\Requests\BarcodeLookupRequest;

class ShamaconBarcodeLookupPlugin extends BaseBarcodeLookupPlugin
{
	protected function executeLookup($barcode)
	{
		$request = new BarcodeLookupRequest($barcode);
		$result = $request->execute();

		if (array_key_exists('error', $result))
		{
			// @TODO - return something more descriptive?
			return null;
		}

		$data = $result['data'];

		return [
			'name' => $data['Locations'][0]['id'],
			'location_id' => $data['QuantityUnits'][0]['id'],
			'qu_id_purchase' => $data['QuantityUnits'][0]['id'],
			'qu_factor_purchase_to_stock' => 1,
			'barcode' => $barcode
		];
	}
}
?>
