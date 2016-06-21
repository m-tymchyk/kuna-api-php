<?php namespace Kuna\Endpoint;


use Endpoint\EndpointAbstract;
use Kuna\Connector;
use Kuna\Constant;
use Kuna\Request;

/**
 * Class PublicMethod
 * @package Kuna\Endpoint
 */
class PublicMethod extends EndpointAbstract
{

	/**
	 * PublicMethod constructor.
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



	/**
	 * @return int
	 */
	public function timestamp()
	{
		$request = new Request("timestamp");
		$result = Connector::execute($request, $this);

		return (int)$result;
	}


	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public function tickers($market = Constant::MARKET_BTCUAH)
	{
		$request = new Request("tickers/{$market}");
		$result = Connector::execute($request, $this);

		return $result;
	}

	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public function order_book($market = Constant::MARKET_BTCUAH)
	{
		$request = new Request("order_book", ['market' => $market]);
		$result = Connector::execute($request, $this);

		return $result;
	}

	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public function trades($market = Constant::MARKET_BTCUAH)
	{
		$request = new Request("trades", ['market' => $market]);
		$result = Connector::execute($request, $this);

		return $result;
	}


}