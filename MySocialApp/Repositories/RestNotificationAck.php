<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\NotificationAck;

/**
 * Class RestNotificationAck
 * @package MySocialApp\Repositories
 */
class RestNotificationAck extends RestBase {
    public function post($notificationAck) {
        return $this->restRequest(RestBase::_POST, "/notification/ack", $notificationAck, NotificationAck::class);
    }
}