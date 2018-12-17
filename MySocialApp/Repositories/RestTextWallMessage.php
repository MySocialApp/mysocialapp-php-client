<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Base;
use MySocialApp\Models\Error;
use MySocialApp\Models\Event;
use MySocialApp\Models\Group;
use MySocialApp\Models\PhotoAlbum;
use MySocialApp\Models\PointOfInterest;
use MySocialApp\Models\Ride;
use MySocialApp\Models\TextWallMessage;
use MySocialApp\Models\User;

/**
 * Class RestTextWallMessage
 * @package MySocialApp\Repositories
 */
class RestTextWallMessage extends RestBase {

    private function getBaseUrl($target, $profile = null) {
        if ($target instanceof Base && $target->getSafeId() !== null) {
            $id = $target->getSafeId();
            if ($target instanceof Event) {
                return "/event/" . $id;
            }
            if ($target instanceof Group) {
                return "/group/" . $id . (($profile !== null) ? "/profile" : "");
            }
            if ($target instanceof Ride) {
                return "/ride/" . $id;
            }
            if ($target instanceof User) {
                if ($profile !== null) {
                    return "/account/profile";
                }
                return "/user/" . $id;
            }
            if ($target instanceof PhotoAlbum) {
                return "/photo/album/" . $id;
            }
            if ($target instanceof PointOfInterest) {
                return "/poi/" . $id;
            }
        }
        return null;
    }

    /**
     * @param $target Base
     * @param $message TextWallMessage
     * @return Base|Error
     */
    public function post($target, $message) {
        if ($url = $this->getBaseUrl($target)) {
            return parent::restRequest(RestBase::_POST, $url . "/wall/message", $message, Base::class);
        }
        return null;
    }

    /**
     * @param \MySocialApp\Models\Base $target
     * @param \MySocialApp\Models\TextWallMessage $message
     * @param mixed $image
     * @param bool|null $profile
     * @param mixed|null $payload
     * @param string $album
     * @return \MySocialApp\Models\Base|null
     */
    public function postImage($target, $message, $image, $profile = null, $payload = null, $externalId = null, $album = "mes photos") {
        if ($url = $this->getBaseUrl($target, $profile)) {
            $a = array();
            $url .= "/photo";
            if ($target instanceof User && $profile === null) {
                $url = "/photo";
            }
            if ($profile === false) {
                $url .= "/cover";
            }
            $a[] = new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image);
            if ($album !== null) {
                $a[] = new RestMultipartData("album", null, RestMultipartData::_MULTIPART, $album);
            }
            if ($message->getMessage() !== null) {
                $a[] = new RestMultipartData("message", null, RestMultipartData::_MULTIPART, $message->getMessage());
            }
            if ($message->getAccessControl() !== null) {
                $a[] = new RestMultipartData("access_control", null, RestMultipartData::_MULTIPART, $message->getAccessControl());
            }
            if ($message->getTagEntities() !== null) {
                $a[] = new RestMultipartData("tag_entities", null, RestMultipartData::_MULTIPART, $message->getTagEntities());
            }
            if ($payload !== null) {
                $a[] = new RestMultipartData("payload", null, RestMultipartData::_MULTIPART, $payload);
            }
            if ($externalId !== null) {
                $a[] = new RestMultipartData("external_id", null, RestMultipartData::_MULTIPART, $externalId);
            }
            return $this->restRequest(RestBase::_POST, $url, new RestMultipart($a), Base::class);
        }
        return null;
    }

    /**
     * @param TextWallMessage $textWallMessage
     * @return \MySocialApp\Models\Base|Error
     */
    public function update($textWallMessage) {
        return $this->restRequest(RestBase::_PUT, "/user/0/message/" . $textWallMessage->getSafeId(), $textWallMessage, Base::class);
    }

    /**
     * @param TextWallMessage $textWallMessage
     * @return null|Error
     */
    public function delete($textWallMessage) {
        return $this->restRequest(RestBase::_DELETE, "/user/0/message/" . $textWallMessage->getSafeId(), $textWallMessage, null);
    }
}