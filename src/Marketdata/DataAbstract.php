<?php namespace Kuna\Marketdata;


/**
 * Class DataAbstract
 * @package Kuna\Marketdata
 */
class DataAbstract
{

	/**
	 * @var array
	 */
	protected $propertyMap = [];

	/**
	 * DataAbstract constructor.
	 *
	 * @param array $property
	 */
	public function __construct(array $property = [])
	{
		foreach ($this->propertyMap as $key)
		{
			if (array_key_exists($key, $property))
			{
				$this->{$key} = $property[$key];
			}
		}
	}

	/**
	 * @param $key
	 *
	 * @return null
	 */
	public function __get($key)
	{
		return property_exists($this, $key) ? $this->{$key} : null;
	}

	/**
	 * @param $key
	 * @param $value
	 *
	 * @return bool
	 */
	public function __set($key, $value)
	{
		$this->{$key} = $value;
		return true;
	}


}