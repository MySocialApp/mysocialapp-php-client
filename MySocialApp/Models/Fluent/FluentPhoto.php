<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\Error;
use MySocialApp\Models\Feed;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\Photo;
use MySocialApp\Models\TextWallMessage;
use MySocialApp\Services\Session;

/**
 * Class FluentPhoto
 * @package MySocialApp\Models\Fluent
 */
class FluentPhoto {
    const _PAGE_SIZE = 10;

    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $offset = 0) {
        if ($offset >= FluentFeed::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $offset - FluentPhoto::_PAGE_SIZE);
        }
        $size = min(FluentPhoto::_PAGE_SIZE, $to - ($page * FluentPhoto::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getPhoto()->getList($page, $size, null);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < FluentPhoto::_PAGE_SIZE) {
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
        if ($size > FluentPhoto::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / FluentPhoto::_PAGE_SIZE;
            $offset -= $page * FluentPhoto::_PAGE_SIZE;
            return $this->_stream($page, $to, $offset);
        } else {
            return $this->_stream($page, $to);
        }
    }

    /**
     * @param $id
     * @return \MySocialApp\Models\Photo|Error
     */
    public function get($id) {
        return $this->_session->getClientService()->getPhoto()->get($id);
    }

    /**
     * @param $photo Photo
     * @return \MySocialApp\Models\Photo|\MySocialApp\Models\Error
     */
    public function create($photo) {
        $u = $this->_session->getAccount()->get();
        if ($u === null || $u instanceof Error) {
            return $u;
        }
        $twm = new TextWallMessage();
        $twm->setMessage($photo->getMessage());
        $twm->setTagEntities($photo->getTagEntities());
        $twm->setAccessControl($photo->getAccessControl());
        $r = $this->_session->getClientService()->getTextWallMessage()->postImage($u, $twm, $photo->getRawContent(), null, $photo->getPayload());
        if ($r instanceof Feed) {
            return $r->getObject();
        }
        return $r;
    }

}