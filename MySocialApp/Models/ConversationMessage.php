<?php

namespace MySocialApp\Models;

/**
 * Class ConversationMessage
 * @package MySocialApp\Models
 */
class ConversationMessage extends Base {
    /**
     * @var string
     */
    protected $message;

    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $photo;

    /**
     * @var \MySocialApp\Models\TagEntities
     */
    protected $tag_entities;

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
     * @return \MySocialApp\Models\Photo
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * @param \MySocialApp\Models\Photo $photo
     */
    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    /**
     * @return \MySocialApp\Models\TagEntities
     */
    public function getTagEntities() {
        return $this->tag_entities;
    }

    /**
     * @param \MySocialApp\Models\TagEntities $tag_entities
     */
    public function setTagEntities($tag_entities) {
        $this->tag_entities = $tag_entities;
    }
}