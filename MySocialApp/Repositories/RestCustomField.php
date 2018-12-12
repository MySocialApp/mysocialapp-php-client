<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\CustomField;
use MySocialApp\Models\Event;
use MySocialApp\Models\Group;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\PointOfInterest;
use MySocialApp\Models\Ride;
use MySocialApp\Models\User;

/**
 * Class RestCustomField
 * @package MySocialApp\Repositories
 */
class RestCustomField extends RestBase {

    public function listFor($baseCustomField) {
        if ($baseCustomField instanceof User)
            return $this->listForUrl("/account/customfield");
        if ($baseCustomField instanceof Event)
            return $this->listForUrl("/event/customfield");
        if ($baseCustomField instanceof Group)
            return $this->listForUrl("/group/customfield");
        if ($baseCustomField instanceof Ride)
            return $this->listForUrl("/ride/customfield");
        if ($baseCustomField instanceof PointOfInterest)
            return $this->listForUrl("/poi/customfield");
        return null;
    }

    protected function listForUrl($url) {
        return $this->restRequest(RestBase::_GET, $url, null, JSONableArray::classOf(CustomField::class));
    }
}