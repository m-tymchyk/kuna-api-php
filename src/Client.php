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
		parent::__construct();
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

}