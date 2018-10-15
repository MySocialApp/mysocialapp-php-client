<?php

namespace MySocialApp\Models;

/**
 * Class WallActivity
 * @package MySocialApp\Models
 */
class WallActivity extends Base {
    /**
     * @var \MySocialApp\Models\Base
     */
    protected $object;

    /**
     * @return \MySocialApp\Models\Base
     */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param \MySocialApp\Models\Base $object
     */
    public function setObject($object) {
        $this->object = $object;
    }
}