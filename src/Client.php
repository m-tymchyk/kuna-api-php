<?php namespace Kuna;


/**
 * Class Client
 * @package Kuna
 * 
 * 
 * Created by PhpStorm.
 * User: Tymchyk Maksym
 * 
 */
class Client extends Connector
{

	protected $api_key;
	protected $api_secret;

	/**
	 * Client constructor.
	 *
	 * @param $api_key
	 * @param $api_secret
	 */
	public function __construct($api_key, $api_secret)
	{
		$this->api_key = $api_key;
		$this->api_secret = $api_secret;
	}

	/**
	 * @return int
	 */
	protected static function tonce()
	{
		return intval(microtime(true) * 1000);
	}
	
}