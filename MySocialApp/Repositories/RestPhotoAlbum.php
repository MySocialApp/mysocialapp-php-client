<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\PhotoAlbum;

/**
 * Class RestPhotoAlbum
 * @package MySocialApp\Repositories
 */
class RestPhotoAlbum extends RestBase {
    public function getList($page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/photo/album", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(PhotoAlbum::class));
    }

    public function listForUser($id, $page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/user/".$id."/photo/album", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(PhotoAlbum::class));
    }

    public function listForGroup($id, $page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/group/".$id."/photo/album", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(PhotoAlbum::class));
    }

    public function listForEvent($id, $page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/event/".$id."/photo/album", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(PhotoAlbum::class));
    }

    public function listForRide($id, $page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/ride/".$id."/photo/album", array("page"=>$page,"size"=>$size)),
            null, JSONableArray::classOf(PhotoAlbum::class));
    }

    public function get($id) {
        return $this->restRequest(RestBase::_GET, "/photo/album/".$id, null,PhotoAlbum::class);
    }

    public function post($photoAlbum) {
        return $this->restRequest(RestBase::_POST, "/photo/album", $photoAlbum,PhotoAlbum::class);
    }

    public function update($id, $photoAlbum) {
        return $this->restRequest(RestBase::_PUT, "/photo/album/".$id, $photoAlbum,PhotoAlbum::class);
    }

    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/photo/album/".$id, null, null);
    }
}