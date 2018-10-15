<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\FeedPost;
use MySocialApp\Services\Session;

/**
 * Class FluentFeed
 * @package MySocialApp\Models\Fluent
 */
class FluentFeed {
    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @param $feedPost FeedPost see \MySocialApp\Models\FeedPostBuilder
     * @return \MySocialApp\Models\Base|\MySocialApp\Models\Error
     */
    public function sendWallPost($feedPost) {
        return $this->create($feedPost);
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
}