<?php namespace Kuna\Endpoint;


use Endpoint\EndpointAbstract;
use Kuna\Request;

/**
 * Class PrivateMethod
 * @package Kuna\Endpoint
 */
class PrivateMethod extends EndpointAbstract
{

	/**
	 * PrivateMethod constructor.
	 *
	 * @param \Kuna\Client|null $client
	 */
	public function __construct($client)
	{
		parent::__construct($client);
	}

	/**
	 * @param Request $request
	 *
	 * @return bool
	 */
	public function beforeExecude(Request $request)
	{
		return true;
	}

}