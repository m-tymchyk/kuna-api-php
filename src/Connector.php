<?php namespace Kuna;


/**
 * Class Connector
 * @package Kuna
 * @author   https://github.com/reilag/kuna-api
 * @link     https://github.com/reilag/kuna-api
 *
 * Created by PhpStorm.
 * User: Tymchyk Maksym
 *
 */
class Connector
{
	

	/**
	 * @param $path
	 * @param array $params
	 * @param string $method
	 */
	public static function execute($path , array $params = [], $method = "GET")
	{
		$path = trim($path, '/');
		$uri = implode('/', [Config::HOST, Config::BASE_PATH, $path]);

		$http = new \GuzzleHttp\Client([
			'base_uri' => $uri
		]);

	}


}