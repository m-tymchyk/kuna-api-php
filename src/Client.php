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

	/**
	 * @var string
	 */
	protected $publicKey;

	/**
	 * @var string
	 */
	protected $secretKey;

	/**
	 * @var Endpoint\PrivateMethod
	 */
	protected $privateEndpoint;

	/**
	 * @var Endpoint\PublicMethod
	 */
	protected $publicEndpoint;

	/**
	 * Client constructor.
	 *
	 * @param $apiKey
	 * @param $apiSecret
	 */
	public function __construct(array $options = null)
	{
		$this->publicKey = isset($options['publicKey']) ? $options['publicKey'] : null;
		$this->secretKey = isset($options['secretKey']) ? $options['secretKey'] : null;
	}

	/**
	 * @return Endpoint\PrivateMethod
	 */
	public function private()
	{
		if( empty($this->privateEndpoint) )
		{
			$this->privateEndpoint = new Endpoint\PrivateMethod($this);
		}
		return $this->privateEndpoint;
	}

	/**
	 * @return Endpoint\PublicMethod
	 */
	public function public()
	{
		if( empty($this->publicEndpoint) )
		{
			$this->publicEndpoint = new Endpoint\PublicMethod($this);
		}
		return $this->publicEndpoint;
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