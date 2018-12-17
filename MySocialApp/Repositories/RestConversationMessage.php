<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Base;
use MySocialApp\Models\ConversationMessage;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestConversationMessage
 * @package MySocialApp\Repositories
 */
class RestConversationMessage extends RestBase {
    public function getList($page, $size, $conversationId, $consume = false) {
        $url = "/conversation/".$conversationId."/message";
        if ($consume) {
            $url .= "/consume";
        }
        $url .= "?page=".$page."&size=".$size;
        return $this->restRequest(RestBase::_GET, $url, null, JSONableArray::classOf(ConversationMessage::class));
    }

    public function listUnread($conversationId, $consume = false) {
        if ($conversationId !== null) {
            $url = "/conversation/" . $conversationId . "/message/unread";
            if ($consume) {
                $url .= "/consume";
            }
        } else {
            $url = "/conversation/unread";
        }
        return $this->restRequest(RestBase::_GET, $url, null, JSONableArray::classOf(ConversationMessage::class));
    }

    /**
     * @param \MySocialApp\Models\ConversationMessage $message
     * @param string $conversationId
     * @param mixed $image
     * @param mixed $payload
     * @return \MySocialApp\Models\Base|null
     */
    public function post($message, $conversationId, $image = null, $payload = null) {
        if ($image === null) {
            return $this->restRequest(RestBase::_POST, "/conversation/" . $conversationId . "/message", $message, ConversationMessage::class);
        } else {
            $a = array();
            $a[] = new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image);
            if ($message->getMessage() !== null && strlen($message->getMessage()) > 0) {
                $a[] = new RestMultipartData("message", null, RestMultipartData::_MULTIPART, $message->getMessage());
            }
            if ($message->getTagEntities() !== null) {
                $a[] = new RestMultipartData("tag_entities", null, RestMultipartData::_MULTIPART, $message->getTagEntities());
            }
            if ($payload === null) {
                $payload = $message->getPayload();
            }
            if ($payload !== null) {
                $a[] = new RestMultipartData("payload", null, RestMultipartData::_MULTIPART, $payload);
            }
            if ($message->getExternalId() !== null && strlen($message->getExternalId()) > 0) {
                $a[] = new RestMultipartData("external_id", null, RestMultipartData::_MULTIPART, $message->getExternalId());
            }
            return $this->restRequest(RestBase::_POST, "/conversation/".$conversationId."/message/photo",
                new RestMultipart($a), Base::class);
        }
    }
}