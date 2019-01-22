<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\AuthenticationToken;
use MySocialApp\Models\Error;
use MySocialApp\Models\Login;
use MySocialApp\Models\User;
use MySocialApp\Services\Session;

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
        return $this->restRequest(RestBase::_POST, "/login", $login, Login::class);
    }

    /**
     * @param string $userId
     * @return \MySocialApp\Models\Login|Error
     */
    public function loginAs($userId) {
        return $this->restRequest(RestBase::_POST, "/login/as/".$userId, null, Login::class);
    }

    /**
     * @param $login Login
     * @return Login|Error
     */
    public function loginWithFacebook($login) {
        return $this->restRequest(RestBase::_POST, "/facebook/login", $login, Login::class);
    }

    /**
     * @return null|Error
     */
    public function logout() {
        return $this->restRequest(RestBase::_POST, "/logout", null, null);
    }

    /**
     * @param $login Login
     * @return null|Error
     */
    public function deleteAccount($login) {
        return $this->restRequest(RestBase::_DELETE, "/account", null, null);
    }

    /**
     * @param $email string
     * @param $oldPassword string
     * @param $newPassword string
     * @return Error|\MySocialApp\Models\User
     */
    public function changePassword($newPassword) {
        $user = new User();
        $user->setPassword($newPassword);
        return $this->restRequest(RestBase::_POST, "/reset/password", $user, User::class);
    }
}