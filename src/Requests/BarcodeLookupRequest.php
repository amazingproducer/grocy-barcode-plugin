<?php

namespace GrocyPlugins\BarcodeScanner\Requests;

use Exception;

class BarcodeLookupRequest
{
    private $barcode;
    private $config;

    public function __construct(string $barcode)
    {
        $this->barcode = $barcode;
        $this->config = require_once __DIR__ . '/../config.php';
    }

    public function execute()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->config['baseUrl'] . '/' . $this->barcode);

        $result = curl_exec($ch);
        $info = curl_getinfo($result);

        /**
         * Ideally you'd process the contents of $info here and determine whether the request
         * was successful or not, throwing exceptions and the like before moving on
         */
        return [
            'data' => json_decode($result, true),
            'info' => $info
        ];
    }
}