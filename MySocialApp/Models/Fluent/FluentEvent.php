<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\Error;
use MySocialApp\Models\Event;
use MySocialApp\Models\EventOptions;
use MySocialApp\Models\EventOptionsBuilder;
use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\SearchResults;
use MySocialApp\Models\SearchResultValueEvent;
use MySocialApp\Services\Session;

/**
 * Class FluentEvent
 * @package MySocialApp\Models\Fluent
 */
class FluentEvent {
    const _PAGE_SIZE = 10;

    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @param int $page
     * @param int $to
     * @param EventOptions $options
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $options, $offset = 0) {
        if ($offset >= FluentEvent::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $options, $offset - FluentEvent::_PAGE_SIZE);
        }
        $size = min(FluentEvent::_PAGE_SIZE, $to - ($page * FluentEvent::_PAGE_SIZE));
        if ($size > 0) {
            $params = array();
            if ($options !== null) $params = $options->toQueryParams();
            $e = $this->_session->getClientService()->getEvent()->getList($page, $size, $params);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < FluentEvent::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_stream($page + 1, $to, $options);
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

    private function getOptionsFromDate($date) {
        if ($date !== null) {
            return (new EventOptionsBuilder())->setFromDate($date)->setDateField(EventOptionsBuilder::_DATE_FIELD_START_DATE)->setSortField(EventOptionsBuilder::_DATE_FIELD_START_DATE)->build();
        } else {
            return (new EventOptionsBuilder())->build();
        }
    }

    /**
     * @param int $limit
     * @param \DateTime $date
     * @return array|Error
     */
    public function streamFromDate($limit, $date) {
        return $this->stream($limit, $this->getOptionsFromDate($date));
    }

    /**
     * @param int $page
     * @param int $size
     * @param \DateTime $date
     * @return array|Error
     */
    public function getListFromDate($page, $size, $date) {
        return $this->getList($page, $size, $this->getOptionsFromDate($date));
    }

    /**
     * @param int $limit
     * @param EventOptions $options
     * @return array|Error
     */
    public function stream($limit, $options) {
        return $this->getList(0, $limit, $options);
    }

    /**
     * @param int $page
     * @param int $size
     * @param EventOptions $options
     * @return array|Error
     */
    public function getList($page, $size, $options) {
        $to = ($page+1) * $size;
        if ($size > FluentEvent::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / FluentEvent::_PAGE_SIZE;
            $offset -= $page * FluentEvent::_PAGE_SIZE;
            return $this->_stream($page, $to, $options, $offset);
        } else {
            return $this->_stream($page, $to, $options);
        }
    }

    /**
     * @param $id
     * @return \MySocialApp\Models\Event|Error
     */
    public function get($id) {
        return $this->_session->getClientService()->getEvent()->get($id);
    }

    /**
     * @param \MySocialApp\Models\Event $event
     * @return \MySocialApp\Models\Event|Error
     */
    public function create($event) {
        return $event->save($this->_session);
    }

    /**
     * @param \MySocialApp\Models\EventSearch $search
     * @param int $page
     * @param int $size
     * @return \MySocialApp\Models\SearchResultValueEvent|Error
     */
    public function search($search, $page = 0, $size = 10) {
        $r = $this->_session->getClientService()->getSearch()->get($page, $size, $search->toQueryParams());
        if ($r instanceof SearchResults) {
            if ($r->getResultsByType() !== null) {
                return $r->getResultsByType()->getEvents();
            }
            $r = new SearchResultValueEvent();
            $r->setData(array());
            $r->setMatchedCount(0);
            return $r;
        }
        return $r;
    }

    public function getAvailableCustomFields() {
        return $this->_session->getClientService()->getCustomField()->listFor(new Event());
    }
}