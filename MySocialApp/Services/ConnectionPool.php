<?php

namespace MySocialApp\Services;

/**
 * Class ConnectionPool
 * @package MySocialApp\Services
 */
class ConnectionPool
{
    /**
     * @var double
     */
    protected $timeout;

    public function __construct($timeoutInMinutes) {
        $this->timeout = ($timeoutInMinutes !== null)? $timeoutInMinutes*60 : null;
    }
}
