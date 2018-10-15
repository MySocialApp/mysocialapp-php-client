<?php

namespace MySocialApp\Models;

/**
 * Class Login
 * @package MySocialApp\Models
 */
class Login extends Base {
    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $nickname;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $access_token;

    /**
     * Login constructor.
     * @param $username string
     * @param $password string
     * @param $accessToken string
     */
    public function __construct($username = null, $password = null, $accessToken = null) {
        $this->username = $username;
        $this->password = $password;
        $this->access_token = $accessToken;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getNickname() {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAccessToken() {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token) {
        $this->access_token = $access_token;
    }
}