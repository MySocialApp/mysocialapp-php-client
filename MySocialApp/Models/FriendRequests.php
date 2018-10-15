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
        if ($this->outgoing !== null) {
            return $this->outgoing->getArray();
        }
        return null;
    }

    /**
     * @param array $outgoing
     */
    public function setOutgoing($outgoing) {
        $this->outgoing = (new JSONableArray())->ofClass(User::class)->setSession($this->_session)->setArray($outgoing);
    }

    /**
     * @return array
     */
    public function getIncoming() {
        if ($this->incoming !== null) {
            return $this->incoming->getArray();
        }
        return null;
    }

    /**
     * @param array $incoming
     */
    public function setIncoming($incoming) {
        $this->incoming = (new JSONableArray())->ofClass(User::class)->setSession($this->_session)->setArray($incoming);
    }
}