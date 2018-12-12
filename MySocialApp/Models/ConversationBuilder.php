<?php

namespace MySocialApp\Models;

/**
 * Class ConversationBuilder
 * @package MySocialApp\Models
 */
class ConversationBuilder {
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $members;

    /**
     * @param string $name
     * @return ConversationBuilder
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param \MySocialApp\Models\User $user
     * @return ConversationBuilder
     */
    public function addMember($user) {
        if ($this->members === null) {
            $this->members = array();
        }
        $this->members[] = $user;
        return $this;
    }

    /**
     * @param array $users
     * @return ConversationBuilder
     */
    public function addMembers($users) {
        if ($this->members === null) {
            $this->members = array();
        }
        foreach($users as $u) {
            $this->members[] = $u;
        }
        return $this;
    }

    /**
     * @param array $users
     */
    public function setMembers($users) {
        $this->members = $users;
    }

    public function build() {
        $c = new Conversation();
        $c->setMembers($this->members);
        $c->setName($this->name);
        return $c;
    }
}