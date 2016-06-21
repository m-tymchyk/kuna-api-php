<?php namespace Kuna;


use GuzzleHttp\Exception\ClientException;
use Kuna\Exception\EmptyResultException;
use Kuna\Exception\KunaException;

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
	 *
	 * @return array|null
	 */
	public static function execute($path, array $params = [], $method = "GET")
	{
		$path = trim($path, '/');
		$uri = implode('/', [Config::HOST, Config::BASE_PATH, $path]);

		$http = new \GuzzleHttp\Client();

		// only support GET & POST
		$method = strtoupper($method);
		$is_post = ($method == 'POST');
		if (!$is_post)
		{
			$method = 'GET';
		}

		$query = http_build_query($params);

		try
		{
			$response = $http->request($method, $uri, [
				'query' => $query
			]);
		}
		catch (ClientException $e)
		{
			return null;
		}

		if ($response->getStatusCode() !== 200)
		{
			return null;
		}

		$body = $response->getBody();
		$contents = $body->getContents();

		if (empty($contents))
		{
			throw new EmptyResultException();
		}

		$obj = json_decode($contents, true);
		if (empty($obj))
		{
			throw new KunaException("JSON decode failed, content: " . $contents);
		}

		return $obj;
	}

	/**
	 * @return int
	 */
	public static function timestamp()
	{
		$result = self::execute("timestamp");

		return (int)$result;
	}


	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public static function tickers($market = Config::MARKET_BTCUAH)
	{
		$result = self::execute("tickers/{$market}");
		return $result;
	}

	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public static function order_book($market = Config::MARKET_BTCUAH)
	{
		$result = self::execute("order_book", ['market' => $market]);
		return $result;
	}

	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public static function trades($market = Config::MARKET_BTCUAH)
	{
		$result = self::execute("trades", ['market' => $market]);
		return $result;
	}





}