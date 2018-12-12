<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Base;
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
        return $this->restRequest(RestBase::_GET, "/account", null, User::class);
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function create($user) {
        return $this->restRequest(RestBase::_POST, "/register", $user, User::class);
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function update($user) {
        return $this->restRequest(RestBase::_PUT, "/account", $user, User::class);
    }

    /**
     * @param $image mixed the file content
     * @return \MySocialApp\Models\Base|null
     */
    public function postPhoto($image) {
        return $this->restRequest(RestBase::_POST, "/account/profile/photo", new RestMultipart(
            array(new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image))), Base::class);
    }

    /**
     * @param $password string
     * @return User|Error
     */
    public function delete($password) {
        $user = new User(null, null, $password, null);
        return $this->restRequest(RestBase::_POST, "/account/delete", $user, User::class);
    }
}