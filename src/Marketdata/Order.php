<?php

namespace Kuna\Marketdata;

/**
 * Class Order
 * @package Kuna\Marketdata
 *
 * @property int    $id
 * @property string $side
 * @property string $ord_type
 * @property double $price
 * @property double $avg_price
 *
 * @property double $volume
 * @property string $market
 *
 */
class Order extends DataAbstract
{
    /**
     * @var array
     */
    protected $propertyMap = [
        'id',                   // order ID
        'side',                 // order side - 'sell' or 'buy'
        'ord_type',             // order type - 'limit' or 'market'
        'price',                // order price in quote currency (UAH)
        'avg_price',            // order middle price, for new - 0
        'state',                // 'wait'
        'market',               // order market - 'btcuah'
        'created_at',           // date of create order
        'volume',               // order volume in base currency (BTC)
        'remaining_volume',     // remaining volume in base currency (BTC)
        'executed_volume',      // executed volume in base currency (BTC)
        'trades_count'          // count of trades
    ];

    /**
     * @var array
     */
    protected $trades = [];
}
