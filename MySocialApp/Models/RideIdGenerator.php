<?php

namespace MySocialApp\Models;

/**
 * Class RideIdGenerator
 * @package MySocialApp\Models
 */
class RideIdGenerator extends Base {
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getRideId() {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setRideId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }
}