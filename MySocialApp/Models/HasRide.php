<?php

namespace MySocialApp\Models;

/**
 * Class HasRide
 * @package MySocialApp\Models
 */
class HasRide extends Base {
    /**
     * @var \MySocialApp\Models\User
     */
    protected $from;

    /**
     * @var \MySocialApp\Models\Ride
     */
    protected $to;

    /**
     * @var \DateTime
     */
    protected $ride_date;

    /**
     * @var string
     */
    protected $opinion;

    /**
     * @var int
     */
    protected $rate;

    /**
     * @return User
     */
    public function getFrom() {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom($from) {
        $this->from = $from;
    }

    /**
     * @return Ride
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * @param Ride $to
     */
    public function setTo($to) {
        $this->to = $to;
    }

    /**
     * @return \DateTime
     */
    public function getRideDate() {
        return $this->ride_date;
    }

    /**
     * @param \DateTime $ride_date
     */
    public function setRideDate($ride_date) {
        $this->ride_date = $ride_date;
    }

    /**
     * @return string
     */
    public function getOpinion() {
        return $this->opinion;
    }

    /**
     * @param string $opinion
     */
    public function setOpinion($opinion) {
        $this->opinion = $opinion;
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