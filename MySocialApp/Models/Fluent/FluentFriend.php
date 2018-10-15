<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\Error;
use MySocialApp\Services\Session;

/**
 * Class FluentFriend
 * @package MySocialApp\Models\Fluent
 */
class FluentFriend {
    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @return int|Error
     */
    public function totalIncomingFriendRequests() {
        $ae = $this->_session->getClientService()->getAccountEvent()->get();
        if ($ae instanceof Error || $ae === null) {
            return $ae;
        }
        return $ae->getIncomingFriendRequests();
    }

    /**
     * @return array|Error
     */
    public function listIncomingFriendRequests() {
        $r = $this->_session->getClientService()->getFriendRequest()->get();
        if ($r instanceof Error || $r === null) {
            return $r;
        }
        return $r->getIncoming() ?: array();
    }

    /**
     * @return array|Error
     */
    public function listOutgoingFriendRequests() {
        $r = $this->_session->getClientService()->getFriendRequest()->get();
        if ($r instanceof Error || $r === null) {
            return $r;
        }
        return $r->getOutgoing() ?: array();
    }

    /**
     * @return Error|\MySocialApp\Models\FriendRequests
     */
    public function getFriendRequests() {
        return $this->_session->getClientService()->getFriendRequest()->get();
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function listFriends($page = 0, $size = 10) {
        $u = $this->_session->getAccount()->get();
        if ($u === null || $u instanceof Error) {
            return $u;
        }
        return $u->listFriends($page, $size);
    }
}