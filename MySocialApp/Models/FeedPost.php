<?php

namespace MySocialApp\Models;

/**
 * Class FeedPost
 * @package MySocialApp\Models
 */
class FeedPost {
    /**
     * @var TextWallMessage
     */
    protected $textWallMessage;
    /**
     * @var mixed
     */
    protected $photo;

    /**
     * FeedPost constructor.
     * @param $textWallMessage TextWallMessage
     * @param $photo mixed
     */
    public function __construct($textWallMessage, $photo) {
        $this->textWallMessage = $textWallMessage;
        $this->photo = $photo;
    }

    /**
     * @return TextWallMessage
     */
    public function getTextWallMessage() {
        return $this->textWallMessage;
    }

    /**
     * @param TextWallMessage $textWallMessage
     */
    public function setTextWallMessage($textWallMessage) {
        $this->textWallMessage = $textWallMessage;
    }

    /**
     * @return mixed
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo) {
        $this->photo = $photo;
    }
}