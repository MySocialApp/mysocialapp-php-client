<?php

namespace MySocialApp\Models;

/**
 * Class RideShareFuzz
 * @package MySocialApp\Models
 */
class RideShareFuzz extends Base {
    /**
     * @var int
     */
    protected $radius_distance;

    /**
     * @return int
     */
    public function getRadiusDistance() {
        return $this->radius_distance;
    }

    /**
     * @param int $radius_distance
     */
    public function setRadiusDistance($radius_distance) {
        $this->radius_distance = $radius_distance;
    }
}