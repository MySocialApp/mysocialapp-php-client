<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Error;
use MySocialApp\Models\FriendRequests;

/**
 * Class RestFriendRequest
 * @package MySocialApp\Repositories
 */
class RestFriendRequest extends RestBase {
    /**
     * @return FriendRequests|Error
     */
    public function get() {
        return parent::restRequest(RestBase::_GET, "/friend/request", null, FriendRequests::class);
    }
}