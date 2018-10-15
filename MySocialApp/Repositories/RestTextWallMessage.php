<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Base;
use MySocialApp\Models\TextWallMessage;
use MySocialApp\Models\User;
use MySocialApp\Models\WallActivity;

/**
 * Class RestTextWallMessage
 * @package MySocialApp\Repositories
 */
class RestTextWallMessage extends RestBase {

    private function getBaseUrl($target) {
        if ($target instanceof Base && $id = $target->getIdStr()) {
            if ($target instanceof User) {
                return "/user/${id}";
            }
        }
        return null;
    }

    /**
     * @param $target Base
     * @param $message TextWallMessage
     * @return \MySocialApp\Models\Base|Error
     */
    public function post($target, $message) {
        if ($url = $this->getBaseUrl($target)) {
            $feed = parent::restRequest("POST", $url."/wall/message", $message, WallActivity::class);
            if ($feed instanceof WallActivity) {
                return $feed->getObject();
            }
            return $feed;
        }
        return null;
    }
}