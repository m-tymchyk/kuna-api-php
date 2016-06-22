<?php namespace Kuna;


/**
 * Class Constant
 * @package Kuna
 *
 * User: Tymchyk Maksym
 */
class Constant
{
	
	const HOST = 'https://kuna.io';
	const BASE_PATH = "api/v2";

	const MARKET_BTCUAH = 'btcuah';

	const SIDE_SELL = 'sell';
	const SIDE_BUY = 'buy';

	/**
	 * @var array
	 */
	public static $markets =
		[
			Constant::MARKET_BTCUAH =>
				[
					'base' => 'BTC',
				    'quote' => 'UAH'
				]
		];

}