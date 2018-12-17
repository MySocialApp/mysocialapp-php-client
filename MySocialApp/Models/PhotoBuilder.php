<?php

namespace MySocialApp\Models;

/**
 * Class PhotoBuilder
 * @package MySocialApp\Models
 */
class PhotoBuilder {
    /**
     * @var string
     */
    private $message;
    /**
     * @var mixed
     */
    private $image;
    /**
     * @var string
     */
    private $visibility;
    /**
     * @var mixed
     */
    private $payload;
    /**
     * @var string
     */
    protected $externalId;

    /**
     * @param string $message
     * @return PhotoBuilder
     */
    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    /**
     * @param mixed $image
     * @return PhotoBuilder
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /**
     * @param string $visibility
     * @return PhotoBuilder
     */
    public function setVisibility($visibility) {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @param mixed $payload
     * @return PhotoBuilder
     */
    public function setPayload($payload) {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @param string $externalId
     * @return PhotoBuilder
     */
    public function setExternalId($externalId) {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return Error|Photo
     */
    public function build() {
        if ($this->image === null) {
            return new Error("Image cannot be null");
        }
        $p = new Photo();
        $p->setRawContent($this->image);
        $p->setMessage($this->message);
        $p->setAccessControl($this->visibility);
        $p->setPayload($this->payload);
        $p->setExternalId($this->externalId);
        return $p;
    }
}