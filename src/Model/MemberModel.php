<?php namespace Kuna\Model;


use Kuna\Connector;
use Kuna\Constant;
use Kuna\Request;


/**
 * Class MemberModel
 * @package Endpoint
 */
class MemberModel extends PrivateModel
{

	/**
	 * @return array|null
	 */
	public function me()
	{
		$request = new Request("members/me");
		$result = Connector::execute($request, $this);
		return $result;
	}

	/**
	 * @return array|null
	 */
	public function trades($market = Constant::MARKET_BTCUAH)
	{
		$request = new Request("trades/my", [
			'market' => $market
		]);
		$result = Connector::execute($request, $this);
		return $result;
	}

}