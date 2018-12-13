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
        return $this->arrayFrom($this->user_mention_tags);
    }

    /**
     * @param array $user_mention_tags
     */
    public function setUserMentionTags($user_mention_tags) {
        $this->user_mention_tags = JSONableArray::createWith($user_mention_tags, UserMentionTag::class, $this->_session);
    }

    /**
     * @return array
     */
    public function getUrlTags() {
        return $this->arrayFrom($this->url_tags);
    }

    /**
     * @param array $url_tags
     */
    public function setUrlTags($url_tags) {
        $this->url_tags = JSONableArray::createWith($url_tags, URLTag::class, $this->_session);
    }

    /**
     * @return array
     */
    public function getHashTags() {
        return $this->arrayFrom($this->hash_tags);
    }

    /**
     * @param array $hash_tags
     */
    public function setHashTags($hash_tags) {
        $this->hash_tags = JSONableArray::createWith($hash_tags, HashTag::class, $this->_session);
    }

    /**
     * @return array
     */
    public function allTags() {
        $a = array();
        foreach (($this->getUserMentionTags() ?: array()) as $t) {
            $a[] = $t;
        }
        foreach (($this->getUrlTags() ?: array()) as $t) {
            $a[] = $t;
        }
        foreach (($this->getHashTags() ?: array()) as $t) {
            $a[] = $t;
        }
        return $a;
    }
}