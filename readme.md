
[<< Kuna API](https://github.com/reilag/kuna-api)

# Kuna Exchange PHP API

### WARNING! Is not released version!

## 1. Install

You can add Kuna PHP API as a dependency using the **composer.phar** CLI:

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add dependency
php composer.phar require reilag/kuna-php-api:dev-master
```

Alternatively, you can specify Kuna PHP API as a dependency in your project's existing composer.json file:

```json
{
   "require": {
      "reilag/kuna-php-api": "dev-master"
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
use Kuna\Connector;

$timestamp = Connector::timestamp(); //1466486485

```

### 2.2. Tickers

```php
use Kuna\Connector;

$tickers = Connector::tickers(Config::MARKET_BTCUAH);
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
use Kuna\Connector;

$order_book = Connector::order_book(Config::MARKET_BTCUAH);
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
		},
		...
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
		},
		...
	]
}
```

### 2.4. Trades

```php
use Kuna\Connector;

$trades = Connector::trades(Config::MARKET_BTCUAH);
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
	},
	...
]
```