<?php

namespace MySocialApp\Models;

/**
 * Class UserMentionTag
 * @package MySocialApp\Models
 */
class UserMentionTag extends TagEntity {
    /**
     * @var \MySocialApp\Models\User
     */
    protected $mentioned_user;

    /**
     * @return User
     */
    public function getMentionedUser() {
        return $this->mentioned_user;
    }

    /**
     * @param User $mentioned_user
     */
    public function setMentionedUser($mentioned_user) {
        $this->mentioned_user = $mentioned_user;
    }
}