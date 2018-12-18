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

    public function getList($page, $size, $friendId = null, $latitude = null, $longitude = null, $fullName = null, $parameters = null) {
        $p = $parameters ?: array();
        $p["page"] = $page;
        if ($size !== null) {
            $p["size"] = $size;
        }
        if ($latitude !== null) {
            $p["latitude"] = $latitude;
        }
        if ($longitude !== null) {
            $p["longitude"] = $longitude;
        }
        if ($fullName !== null) {
            $p["full_name"] = $fullName;
        }
        return $this->restRequest(RestBase::_GET,
            $this->url("/user".(($friendId!==null)?"/".$friendId."/friend":""), $p),
            null, JSONableArray::classOf(User::class));
    }

    public function listOutgoingRequests($page, $size = 10) {
        return $this->restRequest(RestBase::_GET, $this->url("/friend/request/outgoing", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(User::class));
    }

    public function listIncomingRequests($page, $size = 10) {
        return $this->restRequest(RestBase::_GET, $this->url("/friend/request/incoming", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(User::class));
    }

    public function listActive() {
        return $this->restRequest(RestBase::_GET, "/user/active", null, JSONableArray::classOf(User::class));
    }

    /**
     * @param $id int
     * @return User|Error
     */
    public function get($id) {
        return $this->restRequest(RestBase::_GET, "/user/".$id, null, User::class);
    }

    /**
     * @param $externalId string
     * @return User|Error
     */
    public function getByExternalId($externalId) {
        return $this->restRequest(RestBase::_GET, "/user/external/".$externalId, null, User::class);
    }

    /**
     * @param $page int
     * @param $size int
     * @param $user User
     * @return JSONableArray<User>
     */
    public function listFriends($page, $size, $user) {
        return $this->restRequest(RestBase::_GET, "/user/".$user->getSafeId()."/friend?page=${page}&size=${size}",
            null, JSONableArray::classOf(User::class));
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function requestAsFriend($user) {
        return $this->restRequest(RestBase::_POST, "/user/".$user->getSafeId()."/friend", null, User::class);
    }

    /**
     * @param $user User
     * @return null|Error
     */
    public function cancelRequestAsFriend($user) {
        return $this->restRequest(RestBase::_DELETE, "/user/".$user->getSafeId()."/friend", null, null);
    }

    /**
     * @param $user User
     * @return User|Error
     */
    public function acceptAsFriend($user) {
        return $this->restRequest(RestBase::_POST, "/user/".$user->getSafeId()."/friend", null, User::class);
    }

    /**
     * @param $user User
     * @return null|Error
     */
    public function refuseAsFriend($user) {
        return $this->restRequest(RestBase::_DELETE, "/user/".$user->getSafeId()."/friend", null, null);
    }

    /**
     * @param $user User
     * @return null|Error
     */
    public function noMoreFriend($user) {
        return $this->restRequest(RestBase::_DELETE, "/user/".$user->getSafeId()."/friend", null, null);
    }

    /**
     * @param $id string|int
     * @return User|Error
     */
    public function joinGroup($id) {
        return $this->restRequest(RestBase::_POST, "/group/".$id."/member", null, User::class);
    }

    /**
     * @param $id string|int
     * @return null|Error
     */
    public function unjoinGroup($id) {
        return $this->restRequest(RestBase::_DELETE, "/group/".$id."/member", null, null);
    }

    /**
     * @param $id string|int
     * @return User|Error
     */
    public function joinEvent($id) {
        return $this->restRequest(RestBase::_POST, "/event/".$id."/member", null, User::class);
    }

    /**
     * @param $id string|int
     * @return null|Error
     */
    public function unjoinEvent($id) {
        return $this->restRequest(RestBase::_DELETE, "/event/".$id."/member", null, null);
    }

    /**
     * @param $id
     * @return null|Error
     */
    public function follow($id) {
        return $this->restRequest(RestBase::_POST, "/user/".$id."/following", null, null);
    }

    /**
     * @param $id
     * @return null|Error
     */
    public function unfollow($id) {
        return $this->restRequest(RestBase::_DELETE, "/user/".$id."/following", null, null);
    }

    /**
     * @param $id
     * @return JSONableArray|Error
     */
    public function listFollowing($id, $page, $size) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/user/".$id."/following", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(User::class));
    }

    /**
     * @param $id
     * @return JSONableArray|Error
     */
    public function listFollower($id, $page, $size) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/user/".$id."/follower", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(User::class));
    }
}