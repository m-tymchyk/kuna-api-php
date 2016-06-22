<?php namespace Kuna\Service;

/**
 * Class PrivateRequest
 * @package Kuna\Service
 */
class PrivateRequest extends Request
{
	/**
	 * @param array $option
	 *
	 * @return bool
	 */
	public function prepareRequest(array $options = [])
	{

		$options = array_merge_recursive($options, $this->options);

		$publicKey = isset($options['publicKey']) ? $options['publicKey'] : null;
		if (empty($publicKey))
		{
			$this->error = 'Public KEY is empty';
			return false;
		}

		$secretKey = isset($options['secretKey']) ? $options['secretKey'] : null;
		if (empty($secretKey))
		{
			$this->error = 'Secret KEY is empty';
			return false;
		}
		
		$this->subscribeSignature($publicKey, $secretKey);
		return parent::prepareRequest($options);
	}

}