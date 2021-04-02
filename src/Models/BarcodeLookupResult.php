<?php

namespace GrocyPlugins\BarcodeScanner\Models;

use Exception;

class BarcodeLookupResult
{
    /**
     * @var name string
     */
    protected $name;

    /**
     * @var locationId string
     */
    protected $locationId;

    /**
     * @var quantityUnits string
     */
    protected $quantityUnits;

    /**
     * @var quIdStock string
     */
    protected $quIdStock;

    /**
     * @var quFactorPurchaseToStock string
     */
    protected $quFactorPurchaseToStock;

    /**
     * @var barcode string
     */
    protected $barcode;

    public function __construct(array $params = [])
    {
        if ($params == []) {
            throw new Exception('No params provided!');
        }

        $this->setName($params['name']);
        $this->setLocationId($params['Locations'][0]->id);
        $this->setQuIdPurchase($params['QuantityUnits'][0]->id);
        $this->setQuIdStock($params['QuantityUnits'][0]->id);
        $this->setQuFactorPurchaseToStock($params['purchase_to_stock'] ?? 1);
        $this->setBarcode($params['barcode']);
    }

    /**
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param name $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return locationId
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param locationId $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return quantityUnits
     */
    public function getQuIdPurchase()
    {
        return $this->quIdPurchase;
    }

    /**
     * @param quIdPurchase $quIdPurchase
     */
    public function setQuIdPurchase($quIdPurchase)
    {
        $this->quIdPurchase = $quIdPurchase;
    }

    /**
     * @return quIdStock
     */
    public function getQuIdStock()
    {
        return $this->quIdStock;
    }

    /**
     * @param quIdStock $quIdStock
     */
    public function setQuIdStock($quIdStock)
    {
        $this->quIdStock = $quIdStock;
    }

    /**
     * @return quFactorPurchaseToStock
     */
    public function getQuFactorPurchaseToStock()
    {
        return $this->quFactorPurchaseToStock;
    }

    /**
     * @param quFactorPurchaseToStock $quFactorPurchaseToStock
     */
    public function setQuFactorPurchaseToStock($quFactorPurchaseToStock)
    {
        $this->quFactorPurchaseToStock = $quFactorPurchaseToStock;
    }

    /**
     * @return barcode
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param barcode $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'location_id' => $this->getLocationId(),
            'qu_id_purchase' => $this->getQuIdPurchase(),
            'qu_id_stock' => $this->getQuIdStock(),
            'qu_factor_purchase_to_stock' => $this->getQuFactorPurchaseToStock(),
            'barcode' => $this->getBarcode()
        ];
    }
}