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
	 * @var \Kuna\Model\PrivateModel
	 */
	protected $privateModel;

	/**
	 * @var \Kuna\Model\PublicModel
	 */
	protected $publicModel;

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
	 * @return \Kuna\Model\PrivateModel
	 */
	public function private ()
	{
		if (empty($this->privateModel))
		{
			$this->privateModel = new \Kuna\Model\PrivateModel($this);
		}

		return $this->privateModel;
	}

	/**
	 * @return \Kuna\Model\PublicModel
	 */
	public function public ()
	{
		if (empty($this->publicModel))
		{
			$this->publicModel = new \Kuna\Model\PublicModel($this);
		}

		return $this->publicModel;
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