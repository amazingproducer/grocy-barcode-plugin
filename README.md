# grocy-barcode-plugin

UPC search plugin for grocy; connects to upc.shamacon.us.

## Installation

- Copy `ShamaconBarcodeLookupPlugin.php` to the `data/plugins/` directory of your grocy installation.
- Configure the `STOCK_BARCODE_LOOKUP_PLUGIN` setting in `data/config.php`:
  `Setting('STOCK_BARCODE_LOOKUP_PLUGIN', 'ShamaconBarcodeLookupPlugin');`

## Usage

Used by the grocy API, this plugin searches upc.shamacon.us for product names for a given barcode, then returns an associative array which can be used to add a product to grocy's stock.
