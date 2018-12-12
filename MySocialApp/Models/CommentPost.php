<?php

namespace MySocialApp\Models;

/**
 * Class CommentPost
 * @package MySocialApp\Models
 */
class CommentPost {
    /**
     * @var \MySocialApp\Models\Comment
     */
    protected $comment;

    /**
     * @var mixed
     */
    protected $photo;

    /**
     * CommentPost constructor.
     * @param \MySocialApp\Models\Comment $comment
     * @param mixed $photo
     */
    public function __construct($comment, $photo) {
        $this->comment = $comment;
        $this->photo = $photo;
    }

    /**
     * @return Comment
     */
    public function getComment() {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getPhoto() {
        return $this->photo;
    }
}