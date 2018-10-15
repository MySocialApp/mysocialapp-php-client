<?php

namespace MySocialApp\Models;

/**
 * Class AuthenticationToken
 * @package MySocialApp\Models
 */
class AuthenticationToken {
    /**
     * @var string
     */
    protected $nickname;

    /**
     * @return string
     */
    public function getNickname() {
        return $this->nickname;
    }

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @return string
     */
    public function getAccessToken() {
        return $this->accessToken;
    }

    public function __construct($nickname, $accessToken) {
        $this->nickname = $nickname;
        $this->accessToken = $accessToken;
    }
}