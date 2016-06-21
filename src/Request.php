<?php namespace Kuna;


/**
 * Class Request
 * @package Kuna
 */
class Request
{
	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var array
	 */
	protected $options;

	/**
	 * @var string
	 */
	protected $method;

	/**
	 * @var integer
	 */
	protected $tonce;

	/**
	 * Request constructor.
	 *
	 * @param string $path
	 * @param array $params
	 * @param string $method
	 */
	public function __construct($path, $params = [], $method = "GET")
	{
		$this->path = trim($path, "/");
		$this->params = $params;
		$this->method = $method;

		// only support GET & POST
		$method = strtoupper($method);
		$is_post = ($method == 'POST');
		$this->method = $is_post ? "POST" : "GET";

		$this->tonce = $this->getTonce();
	}


	/**
	 * @return integer
	 */
	protected function getTonce()
	{
		return intval(microtime(true) * 1000);
	}

	/**
	 * @return array
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param bool $sort
	 *
	 * @return string
	 */
	public function buildParams($sort = false)
	{
		if ($sort)
		{
			ksort($this->params);
		}

		return http_build_query($this->params);
	}

	/**
	 * @return string
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param $key
	 * @param $value
	 */
	public function setParam($key, $value = null)
	{
		$add = [$key => $value];
		$this->params = array_merge_recursive($this->options, $add);

		return $this;
	}

	/**
	 * @param string $publicKey
	 * @param string $secretKey
	 *
	 * @return bool
	 */
	public function subscribeSignature($publicKey, $secretKey)
	{
		$this
			->setParam("access_key", $publicKey)
			->setParam("tonce", $this->tonce);

		$prm =
			[
				$this->getMethod(),
				Constant::BASE_PATH . "/" . $this->getPath(),
				$this->buildParams(true)
			];

		$signature = bin2hex(hash_hmac('SHA256', implode("|", $prm), $secretKey));

		$this->setParam('signature', $signature);

		return true;
	}

	/**
	 * @return mixed
	 */
	public function getUri()
	{
		return implode('/', [Constant::HOST, Constant::BASE_PATH, $this->path]);
	}

}