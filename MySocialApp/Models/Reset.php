<?php

namespace MySocialApp\Models;

/**
 * Class Reset
 * @package MySocialApp\Models
 */
class Reset extends Base {
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $response;

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
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * @param string $response
     */
    public function setResponse($response) {
        $this->response = $response;
    }
}