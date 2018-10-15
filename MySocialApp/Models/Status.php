<?php

namespace MySocialApp\Models;

/**
 * Class Status
 * @package MySocialApp\Models
 */
class Status extends Base {
    /**
     * @var string
     */
    protected $message;

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }
}