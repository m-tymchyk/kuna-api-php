
[<< Kuna API](https://github.com/reilag/kuna-api)

# Kuna Exchange PHP API

[![GitHub issues](https://img.shields.io/github/issues/reilag/kuna-api-php.svg?style=flat-square)](https://github.com/reilag/kuna-api-php/issues)
[![GitHub stars](https://img.shields.io/github/stars/reilag/kuna-api-php.svg?style=flat-square)](https://github.com/reilag/kuna-api-php/stargazers)


[![PHP Version](https://img.shields.io/badge/php-5.6%2B-blue.svg?style=flat-square)](http://www.php.net/)
[![Guzzle Version](https://img.shields.io/badge/guzzle-6.2.0-green.svg?style=flat-square)](http://docs.guzzlephp.org/)
[![Packagist](ttps://img.shields.io/badge/packagist-reilag%2Fkuna--api--php-orange.svg?style=flat-square)](https://packagist.org/packages/reilag/kuna-api-php)






### WARNING! Is not stable version!

PHP 5.6+ is required.

## 1. Install

You can add Kuna PHP API as a dependency using the **composer.phar** CLI:

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add dependency
php composer.phar require reilag/kuna-api-php:0.2-alpha
```

Alternatively, you can specify Kuna PHP API as a dependency in your project's existing composer.json file:

```json
{
   "require": {
      "reilag/kuna-api-php": "0.2-alpha"
   }
}
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](//getcomposer.org).


## 2. Public methods

### 2.1. Timestamp

```php
use Kuna\Client;

$kuna = new Client();
$timestamp = $kuna->public()->timestamp(); //1466486485

```

### 2.2. Tickers

```php
use Kuna\Client;
use Kuna\Constant;

$kuna = new Client();
$tickers = $kuna->public()->tickers(Constant::MARKET_BTCUAH);

print_r($tickers);
```

Result:
```json
{
	"at":1466486520,
	"ticker":{
		"buy":"18001.0",
		"sell":"18939.0",
		"low":"18000.0",
		"high":"18999.0",
		"last":"18000.0",
		"vol":"1.6011"
	}
}
```

### 2.3. Order book

```php
use Kuna\Client;
use Kuna\Constant;

$kuna = new Client();
$order_book = $kuna->public()->order_book(Constant::MARKET_BTCUAH);

print_r($order_book);
```

Result:
```json
{
	"asks": [
		{
			"id":1182,
			"side":"sell",
			"ord_type":"limit",
			"price":"18939.0",
			"avg_price":"0.0",
			"state":"wait",
			"market":"btcuah",
			"created_at":"2016-06-21T05:09:02Z",
			"volume":"0.0326",
			"remaining_volume":"0.0326",
			"executed_volume":"0.0",
			"trades_count":0
		}
	],

	"bids": [
		{
			"id":1183,
			"side":"buy",
			"ord_type":"limit",
			"price":"18001.0",
			"avg_price":"0.0",
			"state":"wait",
			"market":"btcuah",
			"created_at":"2016-06-21T05:09:03Z",
			"volume":"0.0005",
			"remaining_volume":"0.0005",
			"executed_volume":"0.0",
			"trades_count":0
		}
	]
}
```

### 2.4. Trades

```php
use Kuna\Client;
use Kuna\Constant;

$kuna = new Client();
$trades = $kuna->public()->trades(Constant::MARKET_BTCUAH);

print_r($trades);
```

Result:
```json
[
	{
		"id":338,
		"price":"18000.0",
		"volume":"0.369",
		"funds":"6642.0",
		"market":"btcuah",
		"created_at":"2016-06-21T04:44:58Z",
		"side":null
	}
]
```