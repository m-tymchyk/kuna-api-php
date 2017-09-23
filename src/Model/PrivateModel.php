<?php

namespace Kuna\Model;

use Kuna\Constant;
use Kuna\Service\PrivateRequest;

/**
 * Class PrivateModel
 * @package Kuna\Endpoint
 */
class PrivateModel extends ModelAbstract
{
    /**
     * @return array
     */
    public function me():? array
    {
        $request = new PrivateRequest("members/me");
        $result = $this->client->execute($request);

        return $result;
    }

    /**
     * @param string $market
     *
     * @return array
     */
    public function trades($market = Constant::MARKET_BTCUAH):? array
    {
        $request = new PrivateRequest('trades/my', ['market' => $market], 'GET');
        $result = $this->client->execute($request);

        return $result;
    }

    /**
     * @return OrderModel
     */
    public function order(): OrderModel
    {
        return new OrderModel($this->client);
    }
}
