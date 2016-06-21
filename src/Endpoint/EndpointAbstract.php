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
	public function __construct($client = null)
	{
		$this->client = $client;
	}

	/**
	 * @return string
	 */
	public function getError()
	{
		return $this->error;
	}
}