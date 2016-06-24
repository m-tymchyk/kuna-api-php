<?php

include "../vendor/autoload.php";

use Kuna\Client;

$client = new Client([
	'publicKey' => "Your public key",
	'secretKey' => "Your secret key"
]);


/**
 * Timestamp
 */
$timestamp = $client->publicMethod()->timestamp();
echo sprintf("<h3>Timestamp:</h3> <br><pre>%s</pre>>", print_r($timestamp, true));


/**
 * Tickers
 */
$tickers = $client->publicMethod()->tickers(\Kuna\Constant::MARKET_BTCUAH);
echo sprintf("<h3>Tickers:</h3> <pre>%s</pre>>", print_r($tickers, true));


/**
 * Order book
 */
$order_book = $client->publicMethod()->order_book(\Kuna\Constant::MARKET_BTCUAH);
echo sprintf("<h3>Order book:</h3> <br><pre>%s</pre>>", print_r($order_book, true));


/**
 * Trades
 */
$trades = $client->publicMethod()->trades(\Kuna\Constant::MARKET_BTCUAH);
echo sprintf("<h3>Trades:</h3> <br><pre>%s</pre>>", print_r($trades, true));
