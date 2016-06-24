<?php namespace Kuna\Model;


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
	 * @return MemberModel
	 */
	public function member()
	{
		static $member;
		if(empty($member))
		{
			$member = new MemberModel($this->client);
		}

		return $member;
	}

}