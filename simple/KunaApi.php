<?php

/**
 * Class KunaApi
 */
class KunaApi
{
	/**
	 * Kuna Host
	 */
	const HOST = 'https://kuna.io';

	/**
	 * API V2 Base Path
	 */
	const BASE_PATH = "api/v2";

	/**
	 * Market List
	 */
	const MARKET_BTCUAH = 'btcuah';

	/**
	 * @var string
	 */
	protected $publicKey;

	/**
	 * @var string
	 */
	protected $secretKey;


	/**
	 * Kuna API constructor.
	 *
	 * @param string $publicKey
	 * @param string $secretKey
	 */
	public function __construct($publicKey, $secretKey)
	{
	}


}