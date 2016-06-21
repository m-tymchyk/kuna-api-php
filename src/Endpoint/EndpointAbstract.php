<?php namespace Endpoint;

use Kuna\Client;
use Kuna\Request;

/**
 * Class EndpointAbstract
 * @package Endpoint
 */
abstract class EndpointAbstract
{
	/**
	 * @var Client
	 */
	protected $client;

	/**
	 * @var string
	 */
	protected $error;

	/**
	 * @param Request $request
	 *
	 * @return boolean
	 */
	public abstract function beforeExecude(Request $request);
	
	/**
	 * EndpointAbstract constructor.
	 *
	 * @param Client $client
	 */
	public function __construct(Client $client = null)
	{
		if($client) $this->setClient($client);
	}

	/**
	 * @param Client $client
	 *
	 * @return $this
	 */
	public function setClient(Client $client)
	{
		$this->client = $client;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getError()
	{
		return $this->error;
	}
}