<?php

namespace Kuna;

/**
 * Class Constant
 * @package Kuna
 */
class Constant
{
    const HOST = 'https://kuna.io';
    const BASE_PATH = "api/v2";

    const MARKET_BTCUAH = 'btcuah';
    const MARKET_ETHUAH = 'ethuah';
    const MARKET_GBGUAH = 'gbguah';
    const MARKET_GBGGOL = 'gbggol';
    const MARKET_KUNBTC = 'kunbtc';
    const MARKET_BCHBTC = 'bchbtc';
    const MARKET_WAVESUAH = 'wavesuah';

    const SIDE_SELL = 'sell';
    const SIDE_BUY = 'buy';

    /** @var array $markets */
    public static $markets = [
        Constant::MARKET_BTCUAH   => [
            'base'  => 'BTC',
            'quote' => 'UAH'
        ],
        Constant::MARKET_ETHUAH   => [
            'base'  => 'ETH',
            'quote' => 'UAH'
        ],
        Constant::MARKET_GBGUAH   => [
            'base'  => 'GBG',
            'quote' => 'UAH'
        ],
        Constant::MARKET_GBGGOL   => [
            'base'  => 'GBG',
            'quote' => 'GOL'
        ],
        Constant::MARKET_KUNBTC   => [
            'base'  => 'KUN',
            'quote' => 'BTC'
        ],
        Constant::MARKET_BCHBTC   => [
            'base'  => 'BCH',
            'quote' => 'BTC'
        ],
        Constant::MARKET_WAVESUAH => [
            'base'  => 'WAVES',
            'quote' => 'UAH'
        ]
    ];
}
