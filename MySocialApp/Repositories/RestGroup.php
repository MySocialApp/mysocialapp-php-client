<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Error;
use MySocialApp\Models\Event;
use MySocialApp\Models\Group;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestGroup
 * @package MySocialApp\Repositories
 */
class RestGroup extends RestBase {
    public function getList($page, $size, $parameters = array()) {
        if (is_array($parameters)) {
            $parameters["page"] = $page;
            $parameters["size"] = $size;
            return $this->restRequest(RestBase::_GET, $this->url("/group", $parameters), null, JSONableArray::classOf(Group::class));
        } else {
            return $this->restRequest(RestBase::_GET, $this->url("/group", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(Group::class));
        }
    }

    public function get($id, $limited = true) {
        return $this->restRequest(RestBase::_GET, $this->url("/group/".$id, array("limited",$limited)), null, Group::class);
    }

    public function listForMember($id, $page, $size, $parameters = array()) {
        if (is_array($parameters)) {
            $parameters["page"] = $page;
            $parameters["size"] = $size;
            return $this->restRequest(RestBase::_GET, $this->url("/user/".$id."/group", $parameters), null, JSONableArray::classOf(Group::class));
        } else {
            return $this->restRequest(RestBase::_GET, $this->url("/user/".$id."/group", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(Group::class));
        }
    }

    public function post($group) {
        return $this->restRequest(RestBase::_POST, "/group", $group, Group::class);
    }

    /**
     * @param $group Group
     * @return Event|Error
     */
    public function update($group) {
        return $this->restRequest(RestBase::_PUT, "/event/".$group->getSafeId(), $group, Event::class);
    }
}