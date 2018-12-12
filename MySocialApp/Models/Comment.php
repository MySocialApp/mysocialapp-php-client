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

    /**
     * @param \MySocialApp\Models\CommentPost $commentPost
     * @return Comment|Error|null
     */
    public function replyBack($commentPost) {
        if ($this->_session !== null && $this->getParent() !== null) {
            $f = $this->_session->getFeed()->get($this->getParent()->getSafeId());
            if ($f instanceof Base) {
                return $f->addComment($commentPost);
            }
            return $f;
        }
        return null;
    }

    /**
     * @return Comment|Error
     */
    public function save() {
        return $this->addComment(new CommentPost($this, null));
    }

    /**
     * @return null|Error
     */
    public function delete() {
        return $this->_session->getClientService()->getCommentable()->delete($this->getParent() ?: $this, $this);
    }
}