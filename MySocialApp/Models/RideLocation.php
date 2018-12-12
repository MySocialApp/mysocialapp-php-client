<?php

namespace MySocialApp\Models;

/**
 * Class RideLocation
 * @package MySocialApp\Models
 */
class RideLocation extends Location {
    /**
     * @var int
     */
    protected $position;

    /**
     * @var double
     */
    protected $altitude;

    /**
     * @var int
     */
    protected $ride_id;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var string
     */
    protected $location_type;

    /**
     * @return int
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position) {
        $this->position = $position;
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
     * @return int
     */
    public function getRideId() {
        return $this->ride_id;
    }

    /**
     * @param int $ride_id
     */
    public function setRideId($ride_id) {
        $this->ride_id = $ride_id;
    }

    /**
     * @return string
     */
    public function getNote() {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note) {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getLocationType() {
        return $this->location_type;
    }

    /**
     * @param string $location_type
     */
    public function setLocationType($location_type) {
        $this->location_type = $location_type;
    }
}