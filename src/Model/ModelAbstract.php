<?php

namespace Kuna\Model;

use Kuna\Client;

/**
 * Class ModelAbstract
 * @package Endpoint
 */
abstract class ModelAbstract
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $error;

    /**
     * ModelAbstract constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client = null)
    {
        if ($client) {
            $this->setClient($client);
        }
    }

    /**
     * @param Client $client
     *
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
}