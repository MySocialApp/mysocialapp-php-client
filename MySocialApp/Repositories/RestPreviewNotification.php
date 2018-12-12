<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\PreviewNotification;

/**
 * Class RestPreviewNotification
 * @package MySocialApp\Repositories
 */
class RestPreviewNotification extends RestBase {
    public function listRead($page, $size = 10) {
        return $this->restRequest(RestBase::_GET, $this->url("/notification/read",
            array("page"=>$page,"size"=>$size)), null,
            JSONableArray::classOf(PreviewNotification::class));
    }

    public function listUnread($page, $size = 10) {
        return $this->restRequest(RestBase::_GET, $this->url("/notification/unread",
            array("page"=>$page,"size"=>$size)), null,
            JSONableArray::classOf(PreviewNotification::class));
    }

    public function listUnreadConsume($page, $size = 10) {
        return $this->restRequest(RestBase::_GET, $this->url("/notification/unread/consume",
            array("page"=>$page,"size"=>$size)), null,
            JSONableArray::classOf(PreviewNotification::class));
    }

    public function consume($id) {
        return $this->restRequest(RestBase::_GET, "/notification/".$id."/unread/consume", null, PreviewNotification::class);
    }
}