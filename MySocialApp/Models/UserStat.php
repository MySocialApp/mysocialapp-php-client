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
     * @param UserStatStatus $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return JSONableMap
     */
    public function getRides() {
        return $this->rides;
    }

    /**
     * @param JSONableMap $rides
     */
    public function setRides($rides) {
        $this->rides = $rides;
    }

    /**
     * @return JSONableMap
     */
    public function getFriend() {
        return $this->friend;
    }

    /**
     * @param JSONableMap $friend
     */
    public function setFriend($friend) {
        $this->friend = $friend;
    }

    /**
     * @return JSONableMap
     */
    public function getPhotos() {
        return $this->photos;
    }

    /**
     * @param JSONableMap $photos
     */
    public function setPhotos($photos) {
        $this->photos = $photos;
    }
}