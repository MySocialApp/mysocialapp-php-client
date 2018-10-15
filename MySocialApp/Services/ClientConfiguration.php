<?php

namespace MySocialApp\Services;

/**
 * Class ClientConfiguration
 * @package MySocialApp\Services
 */
class ClientConfiguration {
    /**
     * @var int
     */
    protected $readTimeoutInMilliseconds;

    /**
     * @var int
     */
    protected $writeTimeoutInMilliseconds;

    /**
     * @var array
     */
    protected $headersToInclude;

    /**
     * @var bool
     */
    protected $debug;

    /**
     * ClientConfiguration constructor.
     * @param $readTimeoutInMilliseconds int
     * @param $writeTimeoutInMillisecs int
     * @param $headersToInclude array
     * @param $debug bool
     */
    public function __construct($readTimeoutInMilliseconds = 10000, $writeTimeoutInMillisecs = 10000, $headersToInclude = array(), $debug = false) {
        $this->readTimeoutInMilliseconds = $readTimeoutInMilliseconds;
        $this->writeTimeoutInMilliseconds = $writeTimeoutInMillisecs;
        $this->headersToInclude = $headersToInclude;
        $this->debug = $debug;
    }

    /**
     * @return int
     */
    public function getReadTimeoutInMilliseconds() {
        return $this->readTimeoutInMilliseconds;
    }

    /**
     * @return int
     */
    public function getWriteTimeoutInMilliseconds() {
        return $this->writeTimeoutInMilliseconds;
    }

    /**
     * @return array
     */
    public function getHeadersToInclude() {
        return $this->headersToInclude;
    }

    /**
     * @return bool
     */
    public function isDebug() {
        return $this->debug;
    }
}