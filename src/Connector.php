<?php namespace Kuna;


use Kuna\Exception\EmptyResultException;
use Kuna\Exception\ModelException;
use Kuna\Model\ModelAbstract;
use Kuna\Service\PrivateRequest;
use Kuna\Service\Request;

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
	 * @var \GuzzleHttp\Client
	 */
	protected $httpClient;

	/**
	 * @var string
	 */
	protected $publicKey;

	/**
	 * @var string
	 */
	protected $secretKey;

	/**
	 * Connector constructor.
	 */
	public function __construct(array $options = null)
	{
		$this->publicKey = isset($options['publicKey']) ? $options['publicKey'] : null;
		$this->secretKey = isset($options['secretKey']) ? $options['secretKey'] : null;

		$this->httpClient = new \GuzzleHttp\Client();
	}

	/**
	 * @param Request $request
	 * @param ModelAbstract|null $model
	 *
	 * @return array|null
	 */
	public function execute(Request $request)
	{
		if($request instanceof PrivateRequest)
		{
			$request
				->setOption('publicKey', $this->getPublicKey())
				->setOption('secretKey', $this->getSecretKey());
		}

		if($request->prepareRequest() !== true)
		{
			throw new ModelException($request->getError());
		}

		$response = $this->httpClient
			->request($request->getMethod(), $request->getUri(), [
				'query' => $request->buildParams()
			]);

		if($response->getStatusCode() !== 200)
		{
			return null;
		}

		$body = $response->getBody();
		$contents = $body->getContents();

		return self::jsonDecode($contents, true);
	}

	/**
	 * @param $json
	 * @param bool $assoc
	 *
	 * @return mixed
	 */
	protected static function jsonDecode($json, $assoc = false)
	{
		if(empty($json))
		{
			throw new EmptyResultException("Can't json_decode empty string [{$json}]");
		}
		$data = json_decode($json, $assoc);
		if($data === null)
		{
			throw new EmptyResultException("Failed to json_decode [{$json}]");
		}

		return $data;
	}

	/**
	 * @param string $key
	 *
	 * @return $this
	 */
	public function setSecretKey($key)
	{
		$this->secretKey = $key;

		return $this;
	}

	/**
	 * @param string $key
	 *
	 * @return $this
	 */
	public function setPublicKey($key)
	{
		$this->publicKey = $key;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getSecretKey()
	{
		return $this->secretKey;
	}

	/**
	 * @return string
	 */
	public function getPublicKey()
	{
		return $this->publicKey;
	}

}