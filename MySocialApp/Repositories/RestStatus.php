<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Status;

/**
 * Class RestStatus
 * @package MySocialApp\Repositories
 */
class RestStatus extends RestBase {
    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/status/".$id, null, null);
    }

    public function post($status) {
        return $this->restRequest(RestBase::_POST, "/status", $status, Status::class);
    }
}