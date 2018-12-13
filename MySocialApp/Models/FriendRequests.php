<?php

namespace MySocialApp\Models;


class FriendRequests extends Base {
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\User>
     */
    protected $outgoing;
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\User>
     */
    protected $incoming;

    /**
     * @return array
     */
    public function getOutgoing() {
        return $this->arrayFrom($this->outgoing);
    }

    /**
     * @param array $outgoing
     */
    public function setOutgoing($outgoing) {
        $this->outgoing = JSONableArray::createWith($outgoing, User::class, $this->_session);
    }

    /**
     * @return array
     */
    public function getIncoming() {
        return $this->arrayFrom($this->incoming);
    }

    /**
     * @param array $incoming
     */
    public function setIncoming($incoming) {
        $this->incoming = JSONableArray::createWith($incoming, User::class, $this->_session);
    }
}