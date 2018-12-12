<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\AccountEvent;

/**
 * Class RestAccountEvent
 * @package MySocialApp\Repositories
 */
class RestAccountEvent extends RestBase {
    /**
     * @return AccountEvent
     */
    public function get() {
        return parent::restRequest(RestBase::_GET, "/account/event", null, AccountEvent::class);
    }
}