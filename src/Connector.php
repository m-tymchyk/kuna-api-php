<?php namespace Kuna;


use Endpoint\EndpointAbstract;
use GuzzleHttp\Exception\ClientException;
use Kuna\Exception\EmptyResultException;
use Kuna\Exception\EndpointException;
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
	 * @param Request $request
	 * @param EndpointAbstract|null $endpoint
	 *
	 * @return array|null
	 */
	public static function execute(Request $request, EndpointAbstract $endpoint = null)
	{
		
		if( $endpoint && method_exists($endpoint, "beforeExecude") )
		{
			if( $endpoint->beforeExecude($request) !== true )
			{
				throw new EndpointException($endpoint->getError());
			}
		}
		
		$http = new \GuzzleHttp\Client();
		try
		{
			$response = $http->request($request->getMethod(), $request->getUri(), [
				'query' => $request->buildParams()
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
}