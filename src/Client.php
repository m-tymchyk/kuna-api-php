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
	 * @var \Kuna\Model\PrivateModel $privateModel
	 */
	protected $privateModel;

	/**
	 * @var \Kuna\Model\PublicModel $publicModel
	 */
	protected $publicModel;

	/**
	 * Client constructor.
	 *
	 * @param array|null $options
	 */
	public function __construct(array $options = null)
	{
		parent::__construct($options);
	}

	/**
	 * @return \Kuna\Model\PrivateModel
	 */
	public function privateMethod()
	{
		if(empty($this->privateModel))
		{
			$this->privateModel = new \Kuna\Model\PrivateModel($this);
		}

		return $this->privateModel;
	}

	/**
	 * @return \Kuna\Model\PublicModel
	 */
	public function publicMethod()
	{
		if(empty($this->publicModel))
		{
			$this->publicModel = new \Kuna\Model\PublicModel($this);
		}

		return $this->publicModel;
	}

}