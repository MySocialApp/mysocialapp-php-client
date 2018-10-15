<?php

namespace MySocialApp\Services;

use MySocialApp\Repositories\RestAccount;
use MySocialApp\Repositories\RestAccountEvent;
use MySocialApp\Repositories\RestFriendRequest;
use MySocialApp\Repositories\RestLogin;
use MySocialApp\Repositories\RestTextWallMessage;
use MySocialApp\Repositories\RestUser;

/**
 * Class ClientService
 * @package MySocialApp\Services
 */
class ClientService {
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var RestLogin
     */
    protected $login;

    /**
     * @return RestLogin
     */
    public function getLogin() {
        return $this->login ?: ($this->login = new RestLogin($this->session));
    }

    /**
     * @var RestAccount
     */
    protected $account;

    /**
     * @return RestAccount
     */
    public function getAccount() {
        return $this->account ?: ($this->account = new RestAccount($this->session));
    }

    /**
     * @var RestUser
     */
    protected $user;

    /**
     * @return RestUser
     */
    public function getUser() {
        return $this->user ?: ($this->user = new RestUser($this->session));
    }

    /**
     * @var RestFriendRequest
     */
    protected $friendRequest;

    /**
     * @return RestFriendRequest
     */
    public function getFriendRequest() {
        return $this->friendRequest ?: ($this->friendRequest = new RestFriendRequest($this->session));
    }

    /**
     * @var RestAccountEvent
     */
    protected $accountEvent;

    /**
     * @return RestAccountEvent
     */
    public function getAccountEvent() {
        return $this->accountEvent ?: ($this->accountEvent = new RestAccountEvent($this->session));
    }

    /**
     * @var RestTextWallMessage
     */
    protected $textWallMessage;

    /**
     * @return RestTextWallMessage
     */
    public function getTextWallMessage() {
        return $this->textWallMessage ?: ($this->textWallMessage = new RestTextWallMessage($this->session));
    }

    /**
     * ClientService constructor.
     * @param $session Session
     */
    public function __construct($session) {
        $this->session = $session;
    }
}