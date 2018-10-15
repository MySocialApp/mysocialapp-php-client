<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Error;
use MySocialApp\Models\User;

/**
 * Class RestAccount
 * @package MySocialApp\Repositories
 */
class RestAccount extends RestBase {
    /**
     * @return User|Error
     */
    public function get() {
        return $this->restRequest("GET", "/account", null, User::class);
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function create($user) {
        return $this->restRequest("POST", "/register", $user, User::class);
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function update($user) {
        return $this->restRequest("PUT", "/account", $user, User::class);
    }

    /**
     * @param $password string
     * @return User|Error
     */
    public function delete($password) {
        $user = new User(null, null, $password, null);
        return $this->restRequest("POST", "/account/delete", $user, User::class);
    }
}