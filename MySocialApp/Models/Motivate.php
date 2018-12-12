<?php

namespace MySocialApp\Models;

/**
 * Class Motivate
 * @package MySocialApp\Models
 */
class Motivate extends JSONable {
    /**
     * @var int
     */
    protected $quantity;

    /**
     * @return int
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}