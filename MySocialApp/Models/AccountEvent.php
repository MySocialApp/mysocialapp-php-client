<?php

namespace MySocialApp\Models;

/**
 * Class AccountEvent
 * @package MySocialApp\Models
 */
class AccountEvent extends JSONable {
    /**
     * @var \MySocialApp\Models\JSONableMap
     */
    protected $conversation;
    /**
     * @var \MySocialApp\Models\JSONableMap
     */
    protected $notification;
    /**
     * @var \MySocialApp\Models\JSONableMap
     */
    protected $friend_request;

    /**
     * @return int
     */
    public function getUnreadConversations() {
        if ($this->conversation !== null && $this->conversation->getMap() !== null && isset($this->conversation->getMap()["total_unreads"])) {
            return $this->conversation->getMap()["total_unreads"];
        }
        return 0;
    }

    /**
     * @return int
     */
    public function getUnreadNotifications() {
        if ($this->notification !== null && $this->notification->getMap() !== null && isset($this->notification->getMap()["total_unreads"])) {
            return $this->notification->getMap()["total_unreads"];
        }
        return 0;
    }

    /**
     * @return int
     */
    public function getIncomingFriendRequests() {
        if ($this->friend_request !== null && $this->friend_request->getMap() !== null && isset($this->friend_request->getMap()["total_incoming_requests"])) {
            return $this->friend_request->getMap()["total_incoming_requests"];
        }
        return 0;
    }
}