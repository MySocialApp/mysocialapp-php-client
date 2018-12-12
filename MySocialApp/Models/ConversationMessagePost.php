<?php

namespace MySocialApp\Models;

/**
 * Class ConversationMessagePost
 * @package MySocialApp\Models
 */
class ConversationMessagePost {
    /**
     * @var \MySocialApp\Models\ConversationMessage
     */
    protected $conversationMessage;

    /**
     * @var mixed
     */
    protected $photo;

    public function __construct($message, $photo) {
        $this->conversationMessage = new ConversationMessage();
        $this->conversationMessage->setMessage($message);
        $this->photo = $photo;
    }

    /**
     * @return ConversationMessage
     */
    public function getConversationMessage() {
        return $this->conversationMessage;
    }

    /**
     * @return mixed
     */
    public function getPhoto() {
        return $this->photo;
    }
}