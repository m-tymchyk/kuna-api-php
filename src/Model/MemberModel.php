<?php namespace Kuna\Model;


use Kuna\Connector;
use Kuna\Constant;
use Kuna\Service\PrivateRequest;


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
		$request = new PrivateRequest("members/me");
		$result = $this->client->execute($request);
		return $result;
	}

	/**
	 * @return array|null
	 */
	public function trades($market = Constant::MARKET_BTCUAH)
	{
		$request = new PrivateRequest("trades/my", [
			'market' => $market
		]);
		$result = $this->client->execute($request);
		return $result;
	}

}