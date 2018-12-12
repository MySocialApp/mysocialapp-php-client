<?php

namespace MySocialApp\Repositories;

/**
 * Class RestReport
 * @package MySocialApp\Repositories
 */
class RestReport extends RestBase {
    public function post($id) {
        return $this->restRequest(RestBase::_POST, "/feed/".$id."/abuse", null, null);
    }
}