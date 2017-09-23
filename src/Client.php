<?php

namespace Kuna;

use Kuna\Model\PrivateModel;
use Kuna\Model\PublicModel;

/**
 * Class Client
 * @package Kuna
 */
class Client extends Connector
{
    /**
     * @var PrivateModel $privateModel
     */
    protected $privateModel;

    /**
     * @var PublicModel $publicModel
     */
    protected $publicModel;

    /**
     * Client constructor.
     *
     * @param array|null $options
     */
    public function __construct(array $options = null)
    {
        parent::__construct($options);
    }

    /**
     * @return \Kuna\Model\PrivateModel
     */
    public function privateMethod(): PrivateModel
    {
        return new PrivateModel($this);
    }

    /**
     * @return \Kuna\Model\PublicModel
     */
    public function publicMethod(): PublicModel
    {
        return new PublicModel($this);
    }
}
