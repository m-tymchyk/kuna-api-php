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
	 * @param Order $order
	 *
	 * @return bool|Order
	 */
	public function create(Order $order)
	{
		$params =
			[
				'side' => $order->side,
				'volume' => $order->volume,
				'market' => $order->market,
				'price' => $order->price
			];
		$request = new PrivateRequest('orders', $params, 'POST');
		$result = $this->client->execute($request);

		if (array_key_exists('id', $result))
		{
			return new Order($result);
		}

		return false;
	}

	/**
	 * @param Order $order
	 *
	 * @return bool|Order
	 */
	public function delete(Order $order)
	{
		$request = new PrivateRequest('order/delete', ['id' => $order->id], 'POST');
		$result = $this->client->execute($request);

		if (array_key_exists('id', $result))
		{
			return new Order($result);
		}

		return false;
	}

	/**
	 * @param string $market
	 *
	 * @return Order[]|bool
	 */
	public function list($market = Constant::MARKET_BTCUAH)
	{
		$request = new PrivateRequest('orders', ['market' => $market], 'GET');
		$result = $this->client->execute($request);

		if ($result)
		{
			$list = [];
			foreach ($result as $ord)
			{
				$list[] = new Order($ord);
			}

			return $list;
		}

		return false;
	}

	/**
	 * @param string $market
	 *
	 * @return Trade[]|bool
	 */
	public function trades($market = Constant::MARKET_BTCUAH)
	{

		$request = new PrivateRequest('trades/my', ['market' => $market], 'GET');
		$result = $this->client->execute($request);
		if ($result)
		{
			$list = [];
			foreach ($result as $ord)
			{
				$list[] = new Trade($ord);
			}

			return $list;
		}

		return false;
	}

}