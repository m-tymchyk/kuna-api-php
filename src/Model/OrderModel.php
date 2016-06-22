<?php namespace Kuna\Model;


use Kuna\Connector;
use Kuna\Marketdata\Order;
use Kuna\Request;

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
				'side'      => $order->side,
				'volume'    => $order->volume,
				'market'    => $order->market,
				'price'     => $order->price
			];
		$request = new Request('orders', $params, 'POST');
		$result = Connector::execute($request, $this);
		if( array_key_exists('id', $result) )
		{
			return new Order($result);
		}
		return false;
	}

}