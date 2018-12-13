<?php

namespace MySocialApp\Models;

/**
 * Class TextWallMessage
 * @package MySocialApp\Models
 */
class TextWallMessage extends Base {
    /**
     * @var string
     */
    protected $message;
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
     * @return Error|null
     */
    public function delete() {
        return $this->_session->getClientService()->getTextWallMessage()->delete($this);
    }

    /**
     * @return Photo|Error
     */
    public function save() {
        return $this->_session->getClientService()->getTextWallMessage()->update($this);
    }
}