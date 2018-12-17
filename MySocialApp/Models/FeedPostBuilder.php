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
     * @var mixed
     */
    private $mImage;
    /**
     * @var string
     */
    private $mVisibility;
    /**
     * @var mixed
     */
    private $mPayload;
    /**
     * @var string
     */
    protected $mExternalId;

    /**
     * @param $message string
     * @return FeedPostBuilder
     */
    public function setMessage($message) {
        $this->mMessage = $message;
        return $this;
    }

    /**
     * @param $image mixed
     * @return FeedPostBuilder
     */
    public function setImage($image) {
        $this->mImage = $image;
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

    /**
     * @param $payload mixed
     * @return FeedPostBuilder
     */
    public function setPayload($payload) {
        $this->mPayload = $payload;
        return $this;
    }

    /**
     * @param string $externalId
     * @return FeedPostBuilder
     */
    public function setExternalId($externalId) {
        $this->mExternalId = $externalId;
        return $this;
    }

    public function build() {
        if ($this->mMessage === null && $this->mImage === null) {
            return null;
        }
        $m = new TextWallMessage();
        $m->setAccessControl($this->mVisibility);
        $m->setMessage($this->mMessage);
        $m->setPayload($this->mPayload);
        $m->setExternalId($this->mExternalId);
        return new FeedPost($m, $this->mImage);
    }
}