<?php

namespace MySocialApp\Models;

/**
 * Class SearchResultTypes
 * @package MySocialApp\Models
 */
class SearchResultTypes extends JSONable {
    /**
     * @var \MySocialApp\Models\SearchResultValueUser
     */
    protected $USER;
    /**
     * @var \MySocialApp\Models\SearchResultValueFeed
     */
    protected $FEED;
    /**
     * @var \MySocialApp\Models\SearchResultValueGroup
     */
    protected $GROUP;
    /**
     * @var \MySocialApp\Models\SearchResultValueEvent
     */
    protected $EVENT;

    /**
     * @return SearchResultValueUser
     */
    public function getUsers() {
        return $this->USER;
    }

    /**
     * @param SearchResultValueUser $USER
     */
    public function setUsers($USER) {
        $this->USER = $USER;
    }

    /**
     * @return SearchResultValueFeed
     */
    public function getFeeds() {
        return $this->FEED;
    }

    /**
     * @param SearchResultValueFeed $FEED
     */
    public function setFeeds($FEED) {
        $this->FEED = $FEED;
    }

    /**
     * @return SearchResultValueGroup
     */
    public function getGroups() {
        return $this->GROUP;
    }

    /**
     * @param SearchResultValueGroup $GROUP
     */
    public function setGroups($GROUP) {
        $this->GROUP = $GROUP;
    }

    /**
     * @return SearchResultValueEvent
     */
    public function getEvents() {
        return $this->EVENT;
    }

    /**
     * @param SearchResultValueEvent $EVENT
     */
    public function setEvents($EVENT) {
        $this->EVENT = $EVENT;
    }
}