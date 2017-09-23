<?php

namespace Kuna\Marketdata;

/**
 * Class Trade
 * @package Kuna\Marketdata
 *
 * @property integer $id
 * @property double  $price
 * @property double  $volume
 * @property double  $funds
 * @property string  $market
 * @property string  $created_at
 * @property string  $side
 *
 */
class Trade extends DataAbstract
{
    /**
     * @var array
     */
    protected $propertyMap = [
        "id",           // trade ID
        "price",        // price for base/quote
        "volume",       // volume in base currency  (BTC)
        "funds",        // volume in quote currency (UAH)
        "market",       // trade market - 'btcuah'
        "created_at",   // trade time
        "side"          // trade side
    ];
}