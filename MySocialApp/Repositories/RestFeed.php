<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Feed;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestFeed
 * @package MySocialApp\Repositories
 */
class RestFeed extends RestBase {
    public function getList($page, $size, $parameters = array()) {
        $parameters["page"] = $page;
        $parameters["size"] = $size;
        return $this->restRequest(RestBase::_GET, $this->url("/feed", $parameters), null, JSONableArray::classOf(Feed::class));
    }

    public function listPublic($page, $size, $parameters = array()) {
        $parameters["page"] = $page;
        $parameters["size"] = $size;
        return $this->restRequest(RestBase::_GET, $this->url("/public/feed", $parameters), null, JSONableArray::classOf(Feed::class));
    }

    public function listForUser($id, $page, $size, $parameters = array()) {
        $parameters["page"] = $page;
        $parameters["size"] = $size;
        return $this->restRequest(RestBase::_GET, $this->url("/user/".$id."/wall", $parameters), null, JSONableArray::classOf(Feed::class));
    }

    public function listForGroup($id, $page, $size, $parameters = array()) {
        $parameters["page"] = $page;
        $parameters["size"] = $size;
        return $this->restRequest(RestBase::_GET, $this->url("/group/".$id."/wall", $parameters), null, JSONableArray::classOf(Feed::class));
    }

    public function listForEvent($id, $page, $size, $parameters = array()) {
        $parameters["page"] = $page;
        $parameters["size"] = $size;
        return $this->restRequest(RestBase::_GET, $this->url("/event/".$id."/wall", $parameters), null, JSONableArray::classOf(Feed::class));
    }

    public function listForRide($id, $page, $size, $parameters = array()) {
        $parameters["page"] = $page;
        $parameters["size"] = $size;
        return $this->restRequest(RestBase::_GET, $this->url("/ride/".$id."/wall", $parameters), null, JSONableArray::classOf(Feed::class));
    }

    public function get($id) {
        return $this->restRequest(RestBase::_GET, "/feed/".$id, null, Feed::class);
    }

    public function getByExternalId($externalId) {
        return $this->restRequest(RestBase::_GET, "/feed/external/".$externalId, null, Feed::class);
    }

    public function consumeDisplay($id, $uid, $deviceId) {
        return $this->restRequest(RestBase::_GET, $this->url("/display/".$id."/consume", array("auth_uid"=>$uid,"device_id"=>$deviceId)), null, null);
    }

    public function stopFollow($id) {
        return $this->restRequest(RestBase::_POST, "/feed/".$id."/ignore", null, null);
    }

    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/feed/".$id, null, null);
    }

    public function postForGroup($id, $image, $forCover) {
        return $this->restRequest(RestBase::_POST, "/group/".$id."/profile".($forCover?"/cover":"")."/photo", new RestMultipart(
            array(new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image))), Feed::class);
    }

    public function postForEvent($id, $image) {
        return $this->restRequest(RestBase::_POST, "/event/".$id."/cover", new RestMultipart(
            array(new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image))), Feed::class);
    }
}
