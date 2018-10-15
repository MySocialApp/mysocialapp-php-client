<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\Login;
use MySocialApp\Services\Session;

/**
 * Class FluentAccount
 * @package MySocialApp\Models\Fluent
 */
class FluentAccount {
    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @return \MySocialApp\Models\Error|\MySocialApp\Models\User
     */
    public function get() {
        return $this->_session->getClientService()->getAccount()->get();
    }

    /**
     * @param $password
     * @return \MySocialApp\Models\Error|null
     */
    public function requestForDeleteAccount($password) {
        return $this->_session->getClientService()->getLogin()->deleteAccount(new Login("", $password));
    }
}