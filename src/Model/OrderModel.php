<?php namespace Kuna\Model;


use Kuna\Constant;
use Kuna\Marketdata\Order;
use Kuna\Marketdata\Trade;
use Kuna\Service\PrivateRequest;

/**
 * Class OrderModel
 * @package Kuna\Model
 */
class OrderModel extends PrivateModel
{

	/**
	 * @param $price
	 * @param $volume
	 * @param $side
	 * @param $market
	 *
	 * @return bool|Order
	 */
	public function create($price, $volume, $side, $market)
	{
		
		
		$request = new PrivateRequest(
			'orders',
			[
				'side' => $side,
				'volume' => $volume,
				'market' => $market,
				'price' => $price
			],
			'POST'
		);
		$result = $this->client->execute($request);

		if(array_key_exists('id', $result))
		{
			return new Order($result);
		}

		return false;
	}

	/**
	 * @param $order_id
	 *
	 * @return array|null
	 */
	public function delete($order_id)
	{
		$request = new PrivateRequest('order/delete', ['id' => $order_id], 'POST');
		$result = $this->client->execute($request);

		return $result;
	}

	/**
	 * @param string $market
	 *
	 * @return array|null
	 */
	public function list($market = Constant::MARKET_BTCUAH)
	{
		$request = new PrivateRequest('orders', ['market' => $market], 'GET');
		$result = $this->client->execute($request);

		return $result;
	}

}