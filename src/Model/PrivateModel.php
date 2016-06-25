<?php namespace Kuna\Model;


use Kuna\Constant;
use Kuna\Marketdata\Trade;
use Kuna\Service\PrivateRequest;


/**
 * Class PrivateModel
 * @package Kuna\Endpoint
 */
class PrivateModel extends ModelAbstract
{

	/**
	 * PrivateMethod constructor.
	 *
	 * @param \Kuna\Client $client
	 */
	public function __construct($client)
	{
		parent::__construct($client);
	}

	/**
	 * @return array|null
	 */
	public function me()
	{
		$request = new PrivateRequest("members/me");
		$result = $this->client->execute($request);

		return $result;
	}

	/**
	 * @return array|null
	 */
	public function trades($market = Constant::MARKET_BTCUAH)
	{
		$request = new PrivateRequest('trades/my', ['market' => $market], 'GET');
		$result = $this->client->execute($request);

		return $result;
	}

	/**
	 * @return OrderModel
	 */
	public function order()
	{
		static $order;
		if(empty($order))
		{
			$order = new OrderModel($this->client);
		}

		return $order;
	}


}