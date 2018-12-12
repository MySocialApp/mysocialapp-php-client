<?php

namespace MySocialApp\Models;

/**
 * Class PointOfInterestReview
 * @package MySocialApp\Models
 */
class PointOfInterestReview extends Comment {
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $parent_id;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var int
     */
    protected $rate;

    /**
     * @return string
     */
    public function getIdStr() {
        return $this->id;
    }

    /**
     * @param string $idStr
     */
    public function setIdStr($idStr) {
        $this->id = $idStr;
    }

    /**
     * @return string
     */
    public function getParentId() {
        return $this->parent_id;
    }

    /**
     * @param string $parent_id
     */
    public function setParentId($parent_id) {
        $this->parent_id = $parent_id;
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
     * @return int
     */
    public function getRate() {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate) {
        $this->rate = $rate;
    }
}