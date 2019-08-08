<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Conversation;
use MySocialApp\Models\Error;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestConversation
 * @package MySocialApp\Repositories
 */
class RestConversation extends RestBase {
    /**
     * @param int $page
     * @param int $size
     * @return \MySocialApp\Models\JSONableArray|null
     */
    public function getList($page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            "/conversation?messageSamples=1&page=".$page."&size=".$size, null,
            JSONableArray::classOf(Conversation::class));
    }

    public function getListNoSample($page, $size = 10) {
        return $this->restRequest(RestBase::_GET,
            "/conversation?messageSamples=0&page=".$page."&size=".$size, null,
            JSONableArray::classOf(Conversation::class));
    }

    public function get($id) {
        return $this->restRequest(RestBase::_GET,
            "/conversation/".$id, null, Conversation::class);
    }

    public function post($conversation) {
        return $this->restRequest(RestBase::_POST, "/conversation", $conversation, Conversation::class);
    }

    public function update($conversation, $conversationId) {
        return $this->restRequest(RestBase::_PUT, "/conversation/".$conversationId, $conversation, Conversation::class);
    }

    public function delete($id) {
        return $this->restRequest(RestBase::_DELETE, "/conversation/".$id, null, null);
    }

    public function silent($id, $enabled) {
        if ($enabled) {
            return $this->restRequest(RestBase::_POST, "/conversation/".$id."/silent", null, Conversation::class);
        } else {
            return $this->restRequest(RestBase::_DELETE, "/conversation/".$id."/silent", null, null);
        }
    }
}