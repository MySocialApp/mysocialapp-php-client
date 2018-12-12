<?php

namespace MySocialApp\Models;

/**
 * Class ConversationMessages
 * @package MySocialApp\Models
 */
class ConversationMessages extends JSONable {
    const _PAGE_SIZE = 10;

    /**
     * @var int
     */
    protected $total_unreads;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\ConversationMessage>
     */
    protected $samples;

    /**
     * @var string
     */
    protected $_conversationId;

    /**
     * @param $page
     * @param $to
     * @param bool $consume
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $consume, $offset = 0) {
        if ($offset >= ConversationMessages::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $offset - ConversationMessages::_PAGE_SIZE);
        }
        $size = min(ConversationMessages::_PAGE_SIZE, $to - ($page * ConversationMessages::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getConversationMessage()->getList($page, $size, $this->_conversationId, $consume);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < ConversationMessages::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_stream($page + 1, $consume, $to);
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
     * @param int $limit
     * @return array|Error
     */
    public function stream($limit) {
        return $this->getList(0, $limit);
    }

    /**
     * @param int $limit
     * @return array|Error
     */
    public function streamAndConsume($limit) {
        return $this->getListAndConsume(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function getList($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > ConversationMessages::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / ConversationMessages::_PAGE_SIZE;
            $offset -= $page * ConversationMessages::_PAGE_SIZE;
            return $this->_stream($page, $to, false, $offset);
        } else {
            return $this->_stream($page, $to, false);
        }
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function getListAndConsume($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > ConversationMessages::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / ConversationMessages::_PAGE_SIZE;
            $offset -= $page * ConversationMessages::_PAGE_SIZE;
            return $this->_stream($page, $to, true, $offset);
        } else {
            return $this->_stream($page, $to, true);
        }
    }

    public function updateConversationId($conversationId) {
        $this->_conversationId = $conversationId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalUnreads() {
        return $this->total_unreads;
    }

    /**
     * @param int $total_unreads
     */
    public function setTotalUnreads($total_unreads) {
        $this->total_unreads = $total_unreads;
    }

    /**
     * @return JSONableArray
     */
    public function getSamples() {
        return $this->samples;
    }

    /**
     * @param JSONableArray $samples
     */
    public function setSamples($samples) {
        $this->samples = $samples;
    }
}