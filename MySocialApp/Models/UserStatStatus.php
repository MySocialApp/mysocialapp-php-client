<?php

namespace MySocialApp\Models;

/**
 * Class UserStatStatus
 * @package MySocialApp\Models
 */
class UserStatStatus extends Base {

    const _STATUS_CONNECTED = "CONNECTED";
    const _STATUS_RIDING = "RIDING";
    const _STATUS_AWAY = "AWAY";
    const _STATUS_UNKNOWN = "UNKNOWN";
    const _STATUS_NOT_CONNECTED = "NOT_CONNECTED";
    const _STATUS_DISABLED = "DISABLED";

    /**
     * @var \DateTime
     */
    protected $last_connection_date;
    /**
     * @var string
     */
    protected $state;

    /**
     * @return \DateTime
     */
    public function getLastConnectionDate() {
        return $this->last_connection_date;
    }

    /**
     * @param \DateTime $last_connection_date
     */
    public function setLastConnectionDate($last_connection_date) {
        $this->last_connection_date = $last_connection_date;
    }

    /**
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state) {
        $this->state = $state;
    }
}