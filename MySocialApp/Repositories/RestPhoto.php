<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\Photo;

/**
 * Class RestPhoto
 * @package MySocialApp\Repositories
 */
class RestPhoto extends RestBase {
    /**
     * @param int $page
     * @param int $size
     * @param \MySocialApp\Models\PhotoAlbum $photoAlbum
     * @return \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Photo>|\MySocialApp\Models\Error
     */
    public function getList($page, $size, $photoAlbum) {
        if ($photoAlbum !== null) {
            return $this->restRequest(RestBase::_GET,
                $this->url("/photo/album/" . $photoAlbum->getSafeId() . "/photo",
                    array("page" => $page, "size" => $size)),
                null, JSONableArray::classOf(Photo::class));
        } else {
            return $this->restRequest(RestBase::_GET, $this->url("/photo", array("page" => $page, "size" => $size)),
                null, JSONableArray::classOf(Photo::class));
        }
    }

    public function get($id) {
        return $this->restRequest(RestBase::_GET, "/photo/" . $id, null, Photo::class);
    }

    public function post($photo) {
        return $this->restRequest(RestBase::_POST, "/photo", $photo, Photo::class);
    }

    public function update($id, $photo) {
        return $this->restRequest(RestBase::_PUT, "/photo/" . $id, $photo, Photo::class);
    }

    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/photo/" . $id, null, null);
    }

    private function postPhotoFor($image, $prefix, $cover, $tagEntities, $payload, $externalId) {
        $url = $prefix . ($cover ? "/cover" : "") . "photo";
        $a = array(new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image));
        if ($tagEntities !== null) {
            $a[] = new RestMultipartData("tag_entities", null, RestMultipartData::_MULTIPART, $tagEntities);
        }
        if ($payload !== null) {
            $a[] = new RestMultipartData("payload", null, RestMultipartData::_MULTIPART, $payload);
        }
        if ($externalId !== null) {
            $a[] = new RestMultipartData("external_id", null, RestMultipartData::_MULTIPART, $externalId);
        }
        return $this->restRequest(RestBase::_POST, $url, new RestMultipart($a), Photo::class);
    }

    public function postPhotoForAccount($image, $cover, $tagEntities, $payload = null, $externalId = null) {
        return $this->postPhotoFor($image, "/account/profile", $cover, $tagEntities, $payload, $externalId);
    }

    public function postPhotoForGroup($image, $id, $cover, $tagEntities, $payload = null, $externalId = null) {
        return $this->postPhotoFor($image, "/group/" . $id . "/profile", $cover, $tagEntities, $payload, $externalId);
    }

    public function postPhotoForEvent($image, $id, $cover, $tagEntities, $payload = null, $externalId = null) {
        return $this->postPhotoFor($image, "/event/" . $id . "/profile", $cover, $tagEntities, $payload, $externalId);
    }
}