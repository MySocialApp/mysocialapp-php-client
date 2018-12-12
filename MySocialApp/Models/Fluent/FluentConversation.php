<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\AccountEvent;
use MySocialApp\Models\Error;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Services\Session;

/**
 * Class FluentConversation
 * @package MySocialApp\Models\Fluent
 */
class FluentConversation {
    const _PAGE_SIZE = 10;

    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @return int|\MySocialApp\Models\Error
     */
    public function totalUnread() {
        $e =$this->_session->getClientService()->getAccountEvent()->get();
        if ($e instanceof AccountEvent) {
            return $e->getUnreadConversations();
        }
        return $e;
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $offset = 0) {
        if ($offset >= FluentConversation::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $offset - FluentConversation::_PAGE_SIZE);
        }
        $size = min(FluentConversation::_PAGE_SIZE, $to - ($page * FluentConversation::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getConversation()->getList($page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < FluentConversation::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_stream($page + 1, $to);
                    if (is_array($a2)) {
                        return array_merge($a, $a2);
                    } else {
                        return $a;
                    }
                }
            } else {
                return $e;
            }
        }
        return array();
    }

    /**
     * @param $limit
     * @return array|Error
     */
    public function stream($limit) {
        return $this->getList(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function getList($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > FluentConversation::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / FluentConversation::_PAGE_SIZE;
            $offset -= $page * FluentConversation::_PAGE_SIZE;
            return $this->_stream($page, $to, $offset);
        } else {
            return $this->_stream($page, $to);
        }
    }

    /**
     * @param $id
     * @return \MySocialApp\Models\Conversation|Error
     */
    public function get($id) {
        return $this->_session->getClientService()->getConversation()->get($id);
    }

    /**
     * @param $conversation
     * @return \MySocialApp\Models\Conversation|Error
     */
    public function create($conversation) {
        return $this->_session->getClientService()->getConversation()->post($conversation);
    }
}