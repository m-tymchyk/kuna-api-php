<?php

class KunaApiException extends Exception
{
}

/**
 * Class KunaApi
 */
class KunaApi
{
	/**
	 * Kuna PHP API Client
	 */
	const VERSION = "1.0.0";

	/**
	 * Kuna Host
	 */
	const HOST = 'https://kuna.io';

	/**
	 * API V2 Base Path
	 */
	const BASE_PATH = "api/v2";

	/**
	 * Market List
	 */
	const MARKET_BTCUAH = 'btcuah';

	/**
	 * @var string
	 */
	protected $publicKey;

	/**
	 * @var string
	 */
	protected $secretKey;

	/**
	 * @var string
	 */
	protected $userAgent = "Kuna API Client/" . self::VERSION;

	/**
	 * @var int
	 */
	protected $timeout = 30;


	/**
	 * KunaApi constructor.
	 *
	 * @param array $options
	 */
	public function __construct(array $options = [])
	{
		if(isset($options['publicKey']))
		{
			$this->publicKey = $options['publicKey'];
		}

		if(isset($options['secretKey']))
		{
			$this->secretKey = $options['secretKey'];
		}

		if(isset($options['timeout']))
		{
			$this->timeout = $options['timeout'];
		}
	}

	/**
	 * @return int
	 */
	private function getTonce()
	{
		return intval(microtime(true) * 1000);
	}

	/**
	 * @param $path
	 * @param array $params
	 * @param string $method
	 */
	public function request($path, $params = [], $private = false, $method = "GET")
	{
		$method = strtoupper($method);
		$isPost = ($method == 'POST');
		if(!$isPost)
		{
			$method = 'GET';
		}
		$path = strtolower(trim($path, "/"));

		if($private)
		{
			$params = $this->subscribeRequest($path, $params, $method);
		}

		$url = implode("/", [self::HOST, self::BASE_PATH, $path]);

		$result = $this->curlGetContent($url, $params, $method);

		if(empty($result))
		{
			throw new KunaApiException("Content is empty.");
		}
		$object = json_decode($result, true);
		if(empty($object))
		{
			throw new KunaApiException("JSON decode failed, content: " . $result);
		}
		return $object;
	}

	/**
	 * @param $path
	 * @param $params
	 * @param $method
	 *
	 * @return array
	 */
	private function subscribeRequest($path, $params, $method)
	{
		if( empty($this->publicKey) )
		{
			throw new KunaApiException("Public key not set");
		}

		if( empty($this->secretKey) )
		{
			throw new KunaApiException("Secret key not set");
		}

		$tonce = $this->getTonce();

		$subscribedParams = array_merge($params, [
			'tonce' => $tonce,
			'access_key' => $this->publicKey
		]);

		ksort($subscribedParams);

		$fullPath = "/" . self::BASE_PATH . "/" . $path;

		$signStr = implode("|", [
			$fullPath,
			http_build_query($subscribedParams),
			$method
		]);

		$signature = hash_hmac('SHA256', $signStr, $this->secretKey);

		$subscribedParams['signature'] = $signature;

		return $subscribedParams;
	}


	private function curlGetContent($url, $params = null, $method = "GET")
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

		switch($method)
		{
			case "GET":
			{
				$url .= (empty($params) ? "" : "?" . http_build_query($params));
				break;
			}

			case "POST":
			{
				if(!empty($params))
				{
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
				}
				break;
			}

			default:
			{
				throw new KunaApiException("Invalid method - '$method'");
			}
		}

		curl_setopt($ch, CURLOPT_URL, $url);


		$result = curl_exec($ch);
		$curlErrorNumber = curl_errno($ch);
		$curlError = curl_error($ch);
		curl_close($ch);
		if($curlErrorNumber > 0)
		{
			throw new KunaApiException("cURL Error ($curlErrorNumber): $curlError, url: {$url}");
		}

		return $result;
	}




	public function me()
	{

	}


}