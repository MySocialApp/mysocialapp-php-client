<?php

namespace MySocialApp\Models;

/**
 * Class UserDistance
 * @package MySocialApp\Models
 */
class UserDistance extends Base {
    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var int
     */
    protected $distance;

    /**
     * @var int
     */
    protected $ranking;

    /**
     * @var int
     */
    protected $total_ranked;

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
    public function getDistance() {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance($distance) {
        $this->distance = $distance;
    }

    /**
     * @return int
     */
    public function getRanking() {
        return $this->ranking;
    }

    /**
     * @param int $ranking
     */
    public function setRanking($ranking) {
        $this->ranking = $ranking;
    }

    /**
     * @return int
     */
    public function getTotalRanked() {
        return $this->total_ranked;
    }

    /**
     * @param int $total_ranked
     */
    public function setTotalRanked($total_ranked) {
        $this->total_ranked = $total_ranked;
    }
}