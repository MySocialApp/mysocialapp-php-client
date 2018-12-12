<?php

namespace MySocialApp\Models;

/**
 * Class UserStat
 * @package MySocialApp\Models
 */
class UserStat extends Base {
    /**
     * @var \MySocialApp\Models\UserStatStatus
     */
    protected $status;
    /**
     * @var \MySocialApp\Models\JSONableMap
     */
    protected $rides;
    /**
     * @var \MySocialApp\Models\JSONableMap
     */
    protected $friend;
    /**
     * @var \MySocialApp\Models\JSONableMap
     */
    protected $photos;

    /**
     * @return UserStatStatus
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param $m
     * @return array
     */
    private function getMap($m) {
        $m = $m ?: new JSONableMap();
        return $m->getMap();
    }

    /**
     * @return int
     */
    public function getCreatedRides() {
        return $this->getMap($this->rides)["created"] ?: 0;
    }

    /**
     * @return int
     */
    public function getDoneRides() {
        return $this->getMap($this->rides)["done"] ?: 0;
    }

    /**
     * @return int
     */
    public function getDistanceRides() {
        return $this->getMap($this->rides)["distance"] ?: 0;
    }

    /**
     * @return int
     */
    public function getTotalFriends() {
        return $this->getMap($this->friend)["total"] ?: 0;
    }

    /**
     * @return int
     */
    public function getTotalPhotos() {
        return $this->getMap($this->photos)["total"] ?: 0;
    }
}