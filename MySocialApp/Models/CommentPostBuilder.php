<?php

namespace MySocialApp\Models;

/**
 * Class CommentPostBuilder
 * @package MySocialApp\Models
 */
class CommentPostBuilder {
    /**
     * @var string
     */
    protected $message;

    /**
     * @var mixed
     */
    protected $image;

    /**
     * @var mixed
     */
    protected $payload;

    /**
     * @var string
     */
    protected $externalId;

    /**
     * @param string $message
     * @return CommentPostBuilder
     */
    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    /**
     * @param mixed $image
     * @return CommentPostBuilder
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /**
     * @param string $externalId
     * @return CommentPostBuilder
     */
    public function setExternalId($externalId) {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return \MySocialApp\Models\CommentPost|Error
     */
    public function build() {
        if ($this->message === null || $this->image === null) {
            return new Error("Message or image is mandatory");
        }
        $comment = new Comment();
        $comment->setMessage($this->message);
        $comment->setPayload($this->payload);
        $comment->setExternalId($this->externalId);
        return new CommentPost($comment, $this->image);
    }
}