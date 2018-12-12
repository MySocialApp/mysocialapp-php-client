<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Display;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\Like;
use MySocialApp\Models\Photo;
use MySocialApp\Models\Status;

/**
 * Class RestLikeable
 * @package MySocialApp\Repositories
 */
class RestLikeable extends RestBase {
    /**
     * @param \MySocialApp\Models\Base $likeable
     * @return string
     */
    private function getUrl($likeable) {
        $id = $likeable->getSafeId();
        if ($likeable instanceof Display) {
            return "/display/" . $id . "/like";
        }
        if ($likeable instanceof Photo) {
            return "/photo/" . $id . "/like";
        }
        if ($likeable instanceof Status) {
            return "/status/" . $id . "/like";
        }
        return "/feed/" . $id . "/like";
    }

    public function get($likeable) {
        return $this->restRequest(RestBase::_GET, $this->getUrl($likeable), null, JSONableArray::classOf(Like::class));
    }

    public function post($likeable) {
        return $this->restRequest(RestBase::_POST, $this->getUrl($likeable), null, Like::class);
    }

    public function delete($likeable) {
        return $this->restRequest(RestBase::_DELETE, $this->getUrl($likeable), null, null);
    }
}