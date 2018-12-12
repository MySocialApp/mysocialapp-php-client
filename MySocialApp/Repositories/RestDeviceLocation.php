<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Location;

/**
 * Class RestDeviceLocation
 * @package MySocialApp\Repositories
 */
class RestDeviceLocation extends RestBase {
    public function post($id, $location) {
        return $this->restRequest(RestBase::_POST, "/device/location/".$id, $location, Location::class);
    }
}