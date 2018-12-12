<?php

namespace MySocialApp\Models;

/**
 * Class Track
 * @package MySocialApp\Models
 */
class Track extends Base {
    /**
     * @var string
     */
    protected $device_id;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $ride_id;

    /**
     * @return string
     */
    public function getDeviceId() {
        return $this->device_id;
    }

    /**
     * @param string $device_id
     */
    public function setDeviceId($device_id) {
        $this->device_id = $device_id;
    }

    /**
     * @return int
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getRideId() {
        return $this->ride_id;
    }

    /**
     * @param string $ride_id
     */
    public function setRideId($ride_id) {
        $this->ride_id = $ride_id;
    }
}