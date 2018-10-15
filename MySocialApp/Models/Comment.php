<?php

namespace MySocialApp\Models;

/**
 * Class Comment
 * @package MySocialApp\Models
 */
class Comment extends Base {
    /**
     * @var string
     */
    protected $message;
    /**
     * @var \MySocialApp\Models\TagEntities
     */
    protected $tag_entities;
    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $photo;

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return TagEntities
     */
    public function getTagEntities() {
        return $this->tag_entities;
    }

    /**
     * @param TagEntities $tag_entities
     */
    public function setTagEntities($tag_entities) {
        $this->tag_entities = $tag_entities;
    }

    /**
     * @return Photo
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * @param Photo $photo
     */
    public function setPhoto($photo) {
        $this->photo = $photo;
    }
}