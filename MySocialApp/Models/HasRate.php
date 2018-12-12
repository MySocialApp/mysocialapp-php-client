<?php

namespace MySocialApp\Models;

/**
 * Class HasRate
 * @package MySocialApp\Models
 */
class HasRate extends Base {
    /**
     * @var \MySocialApp\Models\User
     */
    protected $from;

    /**
     * @var \MySocialApp\Models\Base
     */
    protected $to;

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
     * @return Base
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * @param Base $to
     */
    public function setTo($to) {
        $this->to = $to;
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