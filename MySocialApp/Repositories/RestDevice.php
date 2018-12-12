<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Device;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestDevice
 * @package MySocialApp\Repositories
 */
class RestDevice extends RestBase {
    public function getList() {
        return $this->restRequest(RestBase::_GET, "/device", null, JSONableArray::classOf(Device::class));
    }

    public function get($id) {
        return $this->restRequest(RestBase::_GET, "/device/".$id, null, Device::class);
    }

    public function post($device) {
        return $this->restRequest(RestBase::_POST, "/device", $device, Device::class);
    }

    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/device/".$id, null, null);
    }
}