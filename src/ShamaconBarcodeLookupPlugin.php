<?php

namespace GrocyPlugins\BarcodeScanner;

require_once __DIR__ . '/../vendor/autoload.php';

use \Grocy\Helpers\BaseBarcodeLookupPlugin;
use GrocyPlugins\BarcodeScanner\Models\BarcodeLookupResult;
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

		$data = new BarcodeLookupResult($result['data']);
		return $data->toArray();
	}
}
?>
