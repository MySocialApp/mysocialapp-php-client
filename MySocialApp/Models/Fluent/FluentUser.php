<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Services\Session;

/**
 * Class FluentUser
 * @package MySocialApp\Models\Fluent
 */
class FluentUser {
    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @param $id int
     * @return \MySocialApp\Models\Error|\MySocialApp\Models\User
     */
    public function get($id) {
        return $this->_session->getClientService()->getUser()->get($id);
    }

    /**
     * @param $externalId
     * @return \MySocialApp\Models\Error|\MySocialApp\Models\User
     */
    public function getByExternalId($externalId) {
        return $this->_session->getClientService()->getUser()->getByExternalId($externalId);
    }
}