<?php

namespace MySocialApp\Models;

/**
 * Class RideShareRide
 * @package MySocialApp\Models
 */
class RideShareRide extends Base {
    /**
     * @var string
     */
    protected $ride_id;

    /**
     * @var \DateTime
     */
    protected $last_update;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $device_id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $favorite;

    /**
     * @var bool
     */
    protected $distance;

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

    /**
     * @return \DateTime
     */
    public function getLastUpdate() {
        return $this->last_update;
    }

    /**
     * @param \DateTime $last_update
     */
    public function setLastUpdate($last_update) {
        $this->last_update = $last_update;
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
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isFavorite() {
        return $this->favorite;
    }

    /**
     * @param bool $favorite
     */
    public function setFavorite($favorite) {
        $this->favorite = $favorite;
    }

    /**
     * @return bool
     */
    public function isDistance() {
        return $this->distance;
    }

    /**
     * @param bool $distance
     */
    public function setDistance($distance) {
        $this->distance = $distance;
    }
}