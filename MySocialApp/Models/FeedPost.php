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
     * @var string
     */
    protected $photo;

    /**
     * FeedPost constructor.
     * @param $textWallMessage TextWallMessage
     * @param $photo string
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
     * @return string
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo) {
        $this->photo = $photo;
    }
}