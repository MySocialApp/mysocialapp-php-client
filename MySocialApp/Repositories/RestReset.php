<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Reset;

/**
 * Class RestReset
 * @package MySocialApp\Repositories
 */
class RestReset extends RestBase {
    public function post($reset) {
        return $this->restRequest(RestBase::_POST, "/reset", $reset, Reset::class);
    }
}