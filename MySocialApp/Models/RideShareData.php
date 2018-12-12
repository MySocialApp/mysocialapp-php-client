<?php

namespace MySocialApp\Models;

/**
 * Class RideShareData
 * @package MySocialApp\Models
 */
class RideShareData extends Base {
    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $ride_id;

    /**
     * @var double
     */
    protected $latitude;

    /**
     * @var double
     */
    protected $longitude;

    /**
     * @var double
     */
    protected $altitude;

    /**
     * @var float
     */
    protected $accuracy;

    /**
     * @var bool
     */
    protected $moving;

    /**
     * @var int
     */
    protected $battery_level;

    /**
     * @var string
     */
    protected $flag;

    /**
     * @return int
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
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

    /**
     * @return float
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getAltitude() {
        return $this->altitude;
    }

    /**
     * @param float $altitude
     */
    public function setAltitude($altitude) {
        $this->altitude = $altitude;
    }

    /**
     * @return float
     */
    public function getAccuracy() {
        return $this->accuracy;
    }

    /**
     * @param float $accuracy
     */
    public function setAccuracy($accuracy) {
        $this->accuracy = $accuracy;
    }

    /**
     * @return bool
     */
    public function isMoving() {
        return $this->moving;
    }

    /**
     * @param bool $moving
     */
    public function setMoving($moving) {
        $this->moving = $moving;
    }

    /**
     * @return int
     */
    public function getBatteryLevel() {
        return $this->battery_level;
    }

    /**
     * @param int $battery_level
     */
    public function setBatteryLevel($battery_level) {
        $this->battery_level = $battery_level;
    }

    /**
     * @return string
     */
    public function getFlag() {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag($flag) {
        $this->flag = $flag;
    }
}