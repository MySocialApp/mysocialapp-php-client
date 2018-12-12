<?php

namespace MySocialApp\Models;


class Conversation extends Base {
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \MySocialApp\Models\ConversationMessages
     */
    protected $messages;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\User>
     */
    protected $members;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return ConversationMessages
     */
    public function getMessages() {
        if ($this->messages === null) {
            $this->messages = new ConversationMessages();
        }
        $this->messages->updateConversationId($this->getSafeId());
        return $this->messages;
    }

    /**
     * @param ConversationMessages $messages
     */
    public function setMessages($messages) {
        $this->messages = $messages;
    }

    /**
     * @return array
     */
    public function getMembers() {
        if ($this->members !== null) {
            return $this->members->getArray();
        }
        return $this->members;
    }

    /**
     * @param array $members
     */
    public function setMembers($members) {
        $this->members = JSONableArray::createWith($members, Member::class, $this->_session);
    }

    /**
     * @param \MySocialApp\Models\ConversationMessagePost $conversationMessagePost
     * @return ConversationMessage|Error
     */
    public function sendMessage($conversationMessagePost) {
        return $this->_session->getClientService()->getConversationMessage()->post(
            $conversationMessagePost->getConversationMessage(),
            $this->getSafeId(),
            $conversationMessagePost->getPhoto());
    }

    /**
     * @param \MySocialApp\Models\User $user
     * @return \MySocialApp\Models\User|Error
     */
    public function kickMember($user) {
        $id = "".$user->getSafeId();
        $this->setMembers(array_filter($this->getMembers(), function($u) use ($id) { return strcmp("".$u->getSafeId(), $id) !== 0; }));
        $r = $this->save();
        if ($r instanceof Base) {
            return $user;
        }
        return $r;
    }

    /**
     * @param \MySocialApp\Models\User $user
     * @return \MySocialApp\Models\User|Error
     */
    public function addMember($user) {
        $members = $this->getMembers() ?: array();
        $members[] = $user;
        $this->setMembers($members);
        $r = $this->save();
        if ($r instanceof Base) {
            return $user;
        }
        return $r;
    }

    /**
     * @return null|Error
     */
    public function delete() {
        return $this->_session->getClientService()->getConversation()->delete($this->getSafeId());
    }

    /**
     * @return \MySocialApp\Models\Conversation|Error
     */
    public function save() {
        if (($id = $this->getSafeId()) !== null) {
            return $this->_session->getClientService()->getConversation()->update($this, $id);
        } else {
            return $this->_session->getClientService()->getConversation()->post($this);
        }
    }

    /**
     * @return Error|null
     */
    public function quit() {
        return $this->delete();
    }
}