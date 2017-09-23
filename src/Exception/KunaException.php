<?php

namespace Kuna\Exception;

/**
 * Class KunaException
 * @package Kuna\Exception
 */
class KunaException extends \RuntimeException
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
