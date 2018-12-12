<?php

namespace MySocialApp\Models;

/**
 * Class ConversationMessagePostBuilder
 * @package MySocialApp\Models
 */
class ConversationMessagePostBuilder {
    /**
     * @var string
     */
    protected $mMessage;

    /**
     * @var mixed
     */
    protected $mImage;

    public function __construct() {
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message) {
        $this->mMessage = $message;
        return $this;
    }

    /**
     * @param mixed $image
     * @return $this
     */
    public function setImage($image) {
        $this->mImage = $image;
        return $this;
    }

    /**
     * @return ConversationMessagePost|Error
     */
    public function build() {
        if ($this->mMessage === null && $this->mImage === null) {
            return (new Error())->initWith(array("message"=>"Message or image is mandatory"));
        }
        return new ConversationMessagePost($this->mMessage, $this->mImage);
    }
}