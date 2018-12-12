<?php

namespace MySocialApp\Models;

/**
 * Class SearchResult
 * @package MySocialApp\Models
 */
class SearchResult extends JSONable {
    /**
     * @var int
     */
    protected $matched_count;

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
}