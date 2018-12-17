<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\Base;
use MySocialApp\Models\Comment;
use MySocialApp\Models\Display;
use MySocialApp\Models\Error;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\Photo;
use MySocialApp\Models\Status;

/**
 * Class RestCommentable
 * @package MySocialApp\Repositories
 */
class RestCommentable extends RestBase {

    /**
     * @param $commentable Base
     * @return string
     */
    private function getBaseUrl($commentable) {
        $id = $commentable->getSafeId();
        if ($id!== null) {
            if ($commentable instanceof Display)
                return "/display/" . $id;
            if ($commentable instanceof Photo)
                return "/photo/" . $id;
            if ($commentable instanceof Status)
                return "/status/" . $id;
            return "/feed/" . $id;
        }
        return false;
    }

    /**
     * @param $commentable Base
     * @return JSONableArray<Comment>
     */
    public function get($commentable) {
        $base = $this->getBaseUrl($commentable);
        if ($base !== false) {
            return $this->restRequest(RestBase::_GET, $base . "/comment", null, JSONableArray::classOf(Comment::class));
        } else {
            return new JSONableArray();
        }
    }

    /**
     * @param $commentable Base
     * @param $comment Comment|null
     * @param $image string|null
     * @param $payload mixed
     * @return Comment|null
     */
    public function post($commentable, $comment = null, $image = null, $payload = null) {
        $base = $this->getBaseUrl($commentable);
        if ($base !== false) {
            $url = $base . "/comment";
            if ($image !== null) {
                $data = array();
                $data[] = new RestMultipartData("file", "image", RestMultipartData::_JPEG, $image);
                $url .= "/photo";
                if ($comment !== null && $comment->getMessage() !== null) {
                    $data[] = new RestMultipartData("name", null, RestMultipartData::_MULTIPART, $comment->getMessage());
                }
                if ($comment !== null && $comment->getTagEntities() !== null) {
                    $data[] = new RestMultipartData("tag_entities", null, RestMultipartData::_MULTIPART, $comment->getTagEntities());
                }
                if ($payload === null) {
                    $payload = $comment->getPayload();
                }
                if ($payload !== null) {
                    $data[] = new RestMultipartData("payload", null, RestMultipartData::_MULTIPART, $payload);
                }
                if ($comment !== null && $comment->getExternalId() !== null && strlen($comment->getExternalId()) > 0) {
                    $data[] = new RestMultipartData("external_id", null, RestMultipartData::_MULTIPART, $comment->getExternalId());
                }
                return $this->restRequest("POST", $url, new RestMultipart($data), Comment::class);
            } else if ($comment !== null) {
                if ($comment->getSafeId() !== null) {
                    $url .= "/" . $comment->getSafeId();
                    return $this->restRequest(RestBase::_PUT, $url, $comment, Comment::class);
                } else {
                    return $this->restRequest(RestBase::_POST, $url, $comment, Comment::class);
                }
            }
        }
        return null;
    }

    /**
     * @param $commentable Base
     * @param $comment Comment
     * @return Error|null
     */
    public function delete($commentable, $comment) {
        $base = $this->getBaseUrl($commentable);
        if ($base !== false && $comment->getSafeId() !== null) {
            return $this->restRequest(RestBase::_DELETE, $base . "/comment/" . $comment->getSafeId(), null, null);
        }
        return null;
    }
}