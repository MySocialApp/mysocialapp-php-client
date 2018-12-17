<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\User;
use MySocialApp\Services\Session;

/**
 * Class FluentFollow
 * @package MySocialApp\Models\Fluent
 */
class FluentFollow {

    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|\MySocialApp\Models\Error
     */
    public function listFollowing($page = 0, $size = 10) {
        $u = $this->_session->getAccount()->get();
        if ($u instanceof User) {
            return $u->listFollowing($page, $size);
        }
        return $u;
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|\MySocialApp\Models\Error
     */
    public function listFollower($page = 0, $size = 10) {
        $u = $this->_session->getAccount()->get();
        if ($u instanceof User) {
            return $u->listFollower($page, $size);
        }
        return $u;
    }
}