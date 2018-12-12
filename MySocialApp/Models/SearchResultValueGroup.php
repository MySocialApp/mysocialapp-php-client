<?php

namespace MySocialApp\Models;

/**
 * Class SearchResultValueGroup
 * @package MySocialApp\Models
 */
class SearchResultValueGroup extends JSONable {
    /**
     * @var int
     */
    protected $matched_count;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Group>
     */
    protected $data;

    /**
     * @return int
     */
    public function getMatchedCount() {
        return $this->matched_count;
    }

    /**
     * @param int $matched_count
     */
    public function setMatchedCount($matched_count) {
        $this->matched_count = $matched_count;
    }

    /**
     * @return JSONableArray
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param JSONableArray $data
     */
    public function setData($data) {
        $this->data = $data;
    }
}