<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\Error;
use MySocialApp\Models\FeedPost;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\SearchResults;
use MySocialApp\Models\SearchResultValueFeed;
use MySocialApp\Services\Session;

/**
 * Class FluentFeed
 * @package MySocialApp\Models\Fluent
 */
class FluentFeed {
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
     * @param object $algorithm
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $algorithm, $offset = 0) {
        if ($offset >= FluentFeed::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $algorithm, $offset - FluentFeed::_PAGE_SIZE);
        }
        $size = min(FluentFeed::_PAGE_SIZE, $to - ($page * FluentFeed::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getFeed()->getList($page, $size, array(), $algorithm);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < FluentFeed::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_stream($page + 1, $to, $algorithm);
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
     * @param object $algorithm
     * @return array|Error
     */
    public function stream($limit, $algorithm = null) {
        return $this->getList(0, $limit, $algorithm);
    }

    /**
     * @param int $page
     * @param int $size
     * @param object $algorithm
     * @return array|Error
     */
    public function getList($page = 0, $size = 10, $algorithm = null) {
        $to = ($page + 1) * $size;
        if ($size > FluentFeed::_PAGE_SIZE) {
            $offset = $page * $size;
            $page = $offset / FluentFeed::_PAGE_SIZE;
            $offset -= $page * FluentFeed::_PAGE_SIZE;
            return $this->_stream($page, $to, $algorithm, $offset);
        } else {
            return $this->_stream($page, $to, $algorithm);
        }
    }

    /**
     * @param $feedPost FeedPost see \MySocialApp\Models\FeedPostBuilder
     * @return \MySocialApp\Models\Base|\MySocialApp\Models\Error
     */
    public function sendWallPost($feedPost) {
        return $this->create($feedPost);
    }

    /**
     * @param $id
     * @return \MySocialApp\Models\Feed|Error
     */
    public function get($id) {
        return $this->_session->getClientService()->getFeed()->get($id);
    }

    /**
     * @param $externalId string
     * @return \MySocialApp\Models\Feed|\MySocialApp\Models\Error
     */
    public function getByExternalId($externalId) {
        return $this->_session->getClientService()->getFeed()->getByExternalId($externalId);
    }

    /**
     * @param $feedPost FeedPost see \MySocialApp\Models\FeedPostBuilder
     * @return \MySocialApp\Models\Base|\MySocialApp\Models\Error
     */
    public function create($feedPost) {
        $u = $this->_session->getAccount()->get();
        if ($u === null || $u instanceof Error) {
            return $u;
        }
        return $u->sendWallPost($feedPost);
    }

    /**
     * @param \MySocialApp\Models\FeedSearch $search
     * @param int $page
     * @param int $size
     * @return \MySocialApp\Models\SearchResultValueFeed|Error
     */
    public function search($search, $page = 0, $size = 10) {
        $r = $this->_session->getClientService()->getSearch()->get($page, $size, $search->toQueryParams());
        if ($r instanceof SearchResults) {
            if ($r->getResultsByType() !== null) {
                return $r->getResultsByType()->getFeeds();
            }
            $r = new SearchResultValueFeed();
            $r->setData(array());
            $r->setMatchedCount(0);
            return $r;
        }
        return $r;
    }
}