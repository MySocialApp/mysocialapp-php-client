<?php

namespace MySocialApp\Models;

/**
 * Class FeedPostBuilder
 * @package MySocialApp\Models
 */
class FeedPostBuilder {
    /**
     * @var string
     */
    private $mMessage;
    /**
     * @var string
     */
    private $mImage;
    /**
     * @var string
     */
    private $mVisibility;

    /**
     * @param $message string
     * @return FeedPostBuilder
     */
    public function setMessage($message) {
        $this->mMessage = $message;
        return $this;
    }

    /**
     * @param $filename string
     * @return FeedPostBuilder
     */
    public function setImage($filename) {
        $this->mImage = $filename;
        return $this;
    }

    /**
     * @param $visibility string see \MySocialApp\Models\AccessControl
     * @return FeedPostBuilder
     */
    public function setVisibility($visibility) {
        $this->mVisibility = $visibility;
        return $this;
    }

    public function build() {
        if ($this->mMessage === null && $this->mImage === null) {
            return null;
        }
        $m = new TextWallMessage();
        $m->setAccessControl($this->mVisibility);
        $m->setMessage($this->mMessage);
        return new FeedPost($m, $this->mImage);

    }
}