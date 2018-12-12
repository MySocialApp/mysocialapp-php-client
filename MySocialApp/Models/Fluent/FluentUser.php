<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\Error;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Services\Session;

/**
 * Class FluentUser
 * @package MySocialApp\Models\Fluent
 */
class FluentUser {
    const _PAGE_SIZE = 10;

    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @param $id int
     * @return \MySocialApp\Models\Error|\MySocialApp\Models\User
     */
    public function get($id) {
        return $this->_session->getClientService()->getUser()->get($id);
    }

    /**
     * @param $externalId
     * @return \MySocialApp\Models\Error|\MySocialApp\Models\User
     */
    public function getByExternalId($externalId) {
        return $this->_session->getClientService()->getUser()->getByExternalId($externalId);
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $offset = 0) {
        if ($offset >= FluentUser::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $offset - FluentUser::_PAGE_SIZE);
        }
        $size = min(FluentUser::_PAGE_SIZE, $to - ($page * FluentUser::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getUser()->getList($page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < FluentUser::_PAGE_SIZE) {
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
     * @param int $limit
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
        if ($size > FluentUser::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / FluentUser::_PAGE_SIZE;
            $offset -= $page * FluentUser::_PAGE_SIZE;
            return $this->_stream($page, $to, $offset);
        } else {
            return $this->_stream($page, $to);
        }
    }
}