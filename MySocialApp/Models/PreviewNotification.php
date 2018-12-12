<?php

namespace MySocialApp\Models;

/**
 * Class PreviewNotification
 * @package MySocialApp\Models
 */
class PreviewNotification extends Base {
    /**
     * @var int
     */
    protected $total;

    /**
     * @var \MySocialApp\Models\Notification
     */
    protected $last_notification;

    /**
     * @return int
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total) {
        $this->total = $total;
    }

    /**
     * @return Notification
     */
    public function getLastNotification() {
        return $this->last_notification;
    }

    /**
     * @param Notification $last_notification
     */
    public function setLastNotification($last_notification) {
        $this->last_notification = $last_notification;
    }

    /**
     * @return PreviewNotification|Error
     */
    public function consume() {
        return $this->_session->getClientService()->getNotification()->consume($this->getSafeId());
    }
}