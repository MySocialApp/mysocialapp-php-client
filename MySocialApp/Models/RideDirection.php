<?php

namespace MySocialApp\Models;

/**
 * Class RideDirection
 * @package MySocialApp\Models
 */
class RideDirection extends Base {
    /**
     * @var int
     */
    protected $distance_in_meters;

    /**
     * @var int
     */
    protected $duration_in_seconds;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\RideLocation>
     */
    protected $locations;

    /**
     * @return int
     */
    public function getDistanceInMeters() {
        return $this->distance_in_meters;
    }

    /**
     * @param int $distance_in_meters
     */
    public function setDistanceInMeters($distance_in_meters) {
        $this->distance_in_meters = $distance_in_meters;
    }

    /**
     * @return int
     */
    public function getDurationInSeconds() {
        return $this->duration_in_seconds;
    }

    /**
     * @param int $duration_in_seconds
     */
    public function setDurationInSeconds($duration_in_seconds) {
        $this->duration_in_seconds = $duration_in_seconds;
    }

    /**
     * @return array
     */
    public function getLocations() {
        return $this->arrayFrom($this->locations);
    }

    /**
     * @param array $locations
     */
    public function setLocations($locations) {
        $this->locations = (new JSONableArray())->ofClass(RideLocation::class)->setArray($locations);
    }
}