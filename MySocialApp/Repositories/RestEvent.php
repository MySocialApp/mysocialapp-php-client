<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Error;
use MySocialApp\Models\Event;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestEvent
 * @package MySocialApp\Repositories
 */
class RestEvent extends RestBase {
    public function getList($page, $size, $parameters = array()) {
        if (is_array($parameters)) {
            $parameters["page"] = $page;
            $parameters["size"] = $size;
            return $this->restRequest(RestBase::_GET, $this->url("/event", $parameters), null, JSONableArray::classOf(Event::class));
        } else {
            return $this->restRequest(RestBase::_GET, $this->url("/event", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(Event::class));
        }
    }

    public function get($id) {
        return $this->restRequest(RestBase::_GET, $this->url("/event/".$id, array("limited",false)), null, Event::class);
    }

    public function post($event) {
        return $this->restRequest(RestBase::_POST, "/event", $event, Event::class);
    }

    public function listForRide($id, $page, $size) {
        return $this->restRequest(RestBase::_GET, $this->url("/ride/".$id."/event", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(Event::class));
    }

    public function listForMember($id, $page, $size, $parameters = array()) {
        if (is_array($parameters)) {
            $parameters["page"] = $page;
            $parameters["size"] = $size;
            return $this->restRequest(RestBase::_GET, $this->url("/user/".$id."/event", $parameters), null, JSONableArray::classOf(Event::class));
        } else {
            return $this->restRequest(RestBase::_GET, $this->url("/user/".$id."/event", array("page"=>$page,"size"=>$size)), null, JSONableArray::classOf(Event::class));
        }
    }

    public function link($eventId, $toRideId) {
        return $this->restRequest(RestBase::_POST, "/ride/".$toRideId."/event/".$eventId, null, Event::class);
    }

    public function unlink($eventId, $fromRideId) {
        return $this->restRequest(RestBase::_DELETE, "/ride/".$fromRideId."/event/".$eventId, null, null);
    }

    /**
     * @param $event Event
     * @return Event|Error
     */
    public function update($event) {
        return $this->restRequest(RestBase::_PUT, "/event/".$event->getSafeId(), $event, Event::class);
    }

    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/event/".$id, null, null);
    }

    public function cancel($id) {
        return $this->restRequest(RestBase::_POST, "/event/".$id."/cancel", null, Event::class);
    }
}