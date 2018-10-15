<?php

namespace MySocialApp\Models;

/**
 * Class TagEntities
 * @package MySocialApp\Models
 */
class TagEntities extends JSONable {
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\UserMentionTag>
     */
    protected $user_mention_tags;
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\URLTag>
     */
    protected $url_tags;
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\HashTag>
     */
    protected $hash_tags;

    /**
     * @return array
     */
    public function getUserMentionTags() {
        if ($this->user_mention_tags !== null) {
            return $this->user_mention_tags->getArray();
        }
        return null;
    }

    /**
     * @param array $user_mention_tags
     */
    public function setUserMentionTags($user_mention_tags) {
        $this->user_mention_tags = (new JSONableArray())->ofClass(UserMentionTag::class)->setSession($this->_session)->setArray($user_mention_tags);
    }

    /**
     * @return array
     */
    public function getUrlTags() {
        if ($this->url_tags !== null) {
            return $this->url_tags->getArray();
        }
        return null;
    }

    /**
     * @param array $url_tags
     */
    public function setUrlTags($url_tags) {
        $this->url_tags = (new JSONableArray())->ofClass(URLTag::class)->setSession($this->_session)->setArray($url_tags);
    }

    /**
     * @return array
     */
    public function getHashTags() {
        if ($this->hash_tags !== null) {
            return $this->hash_tags->getArray();
        }
        return null;
    }

    /**
     * @param array $hash_tags
     */
    public function setHashTags($hash_tags) {
        $this->hash_tags = (new JSONableArray())->ofClass(HashTag::class)->setSession($this->_session)->setArray($hash_tags);
    }
}