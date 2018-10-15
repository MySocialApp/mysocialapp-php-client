<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Error;
use MySocialApp\Models\Login;

/**
 * Class RestLogin
 * @package MySocialApp\Repositories
 */
class RestLogin extends RestBase {
    /**
     * @param $login Login
     * @return Login|Error
     */
    public function login($login) {
        return $this->restRequest("POST", "/login", $login, Login::class);
    }

    /**
     * @param $login Login
     * @return Login|Error
     */
    public function loginWithFacebook($login) {
        return $this->restRequest("POST", "/facebook/login", $login, Login::class);
    }

    /**
     * @return null|Error
     */
    public function logout() {
        return $this->restRequest("POST", "/logout", null, null);
    }

    /**
     * @param $login Login
     * @return null|Error
     */
    public function deleteAccount($login) {
        return $this->restRequest("DELETE", "/account", $login, null);
    }
}