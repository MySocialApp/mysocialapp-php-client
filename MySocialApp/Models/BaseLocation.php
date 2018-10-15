<?php

namespace MySocialApp\Models;

/**
 * Class BaseLocation
 * @package MySocialApp\Models
 */
class BaseLocation extends Base {
    /**
     * @var double
     */
    protected $latitude;
    /**
     * @var double
     */
    protected $longitude;
    /**
     * @var float
     */
    protected $accuracy;

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
    public function getAccuracy() {
        return $this->accuracy;
    }

    /**
     * @param float $accuracy
     */
    public function setAccuracy($accuracy) {
        $this->accuracy = $accuracy;
    }
}