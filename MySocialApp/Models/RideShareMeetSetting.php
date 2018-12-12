<?php

namespace MySocialApp\Models;

/**
 * Class RideShareMeetSetting
 * @package MySocialApp\Models
 */
class RideShareMeetSetting extends Base {
    /**
     * @var bool
     */
    protected $active;

    /**
     * @var int
     */
    protected $maximum_distance;

    /**
     * @return bool
     */
    public function isActive() {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active) {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getMaximumDistance() {
        return $this->maximum_distance;
    }

    /**
     * @param int $maximum_distance
     */
    public function setMaximumDistance($maximum_distance) {
        $this->maximum_distance = $maximum_distance;
    }
}