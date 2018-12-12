<?php

namespace MySocialApp\Models;

/**
 * Class RideShareMeet
 * @package MySocialApp\Models
 */
class RideShareMeet extends Base {
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var double
     */
    protected $distance;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $location;

    /**
     * @var bool
     */
    protected $new;

    /**
     * @return string|null
     */
    public function getTitle() {
        if ($this->getOwner() !== null) {
            return $this->getOwner()->getDisplayedName();
        }
        return null;
    }

    /**
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date) {
        $this->date = $date;
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
     * @return float
     */
    public function getDistance() {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance($distance) {
        $this->distance = $distance;
    }

    /**
     * @return Location
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * @return bool
     */
    public function isNew() {
        return $this->new;
    }

    /**
     * @param bool $new
     */
    public function setNew($new) {
        $this->new = $new;
    }
}