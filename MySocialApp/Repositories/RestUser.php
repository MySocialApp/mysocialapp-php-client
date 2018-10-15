<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Error;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\User;

/**
 * Class RestUser
 * @package MySocialApp\Repositories
 */
class RestUser extends RestBase {

    /**
     * @param $id int
     * @return User|Error
     */
    public function get($id) {
        return parent::restRequest("GET", "/user/".$id, null, User::class);
    }

    /**
     * @param $externalId string
     * @return User|Error
     */
    public function getByExternalId($externalId) {
        return parent::restRequest("GET", "/user/external/".$externalId, null, User::class);
    }

    /**
     * @param $page int
     * @param $size int
     * @param $user User
     * @return JSONableArray
     */
    public function listFriends($page, $size, $user) {
        return parent::restRequest("GET", "/user/".$user->getId()."/friend?page=${page}&size=${size}",
            null, JSONableArray::class."<".User::class.">");
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function requestAsFriend($user) {
        return parent::restRequest("POST", "/user/".$user->getId()."/friend", null, User::class);
    }

    /**
     * @param $user
     * @return null|Error
     */
    public function cancelRequestAsFriend($user) {
        return parent::restRequest("DELETE", "/user/".$user->getId()."/friend", null, null);
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function acceptAsFriend($user) {
        return parent::restRequest("POST", "/user/".$user->getId()."/friend", null, User::class);
    }

    /**
     * @param $user
     * @return null|Error
     */
    public function refuseAsFriend($user) {
        return parent::restRequest("DELETE", "/user/".$user->getId()."/friend", null, null);
    }

    /**
     * @param $user
     * @return null|Error
     */
    public function noMoreFriend($user) {
        return parent::restRequest("DELETE", "/user/".$user->getId()."/friend", null, null);
    }
}