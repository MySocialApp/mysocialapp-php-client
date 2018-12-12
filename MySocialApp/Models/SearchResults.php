<?php

namespace MySocialApp\Models;

/**
 * Class SearchResults
 * @package MySocialApp\Models
 */
class SearchResults extends JSONable {
    /**
     * @var int
     */
    protected $matched_count;

    /**
     * @var string
     */
    protected $query_id;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var \MySocialApp\Models\JSONableArray
     */
    protected $matched_types;

    /**
     * @var \MySocialApp\Models\SearchResultTypes
     */
    protected $results_by_type;

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
     * @return string
     */
    public function getQueryId() {
        return $this->query_id;
    }

    /**
     * @param string $query_id
     */
    public function setQueryId($query_id) {
        $this->query_id = $query_id;
    }

    /**
     * @return int
     */
    public function getPage() {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page) {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size) {
        $this->size = $size;
    }

    /**
     * @return JSONableArray
     */
    public function getMatchedTypes() {
        return $this->matched_types;
    }

    /**
     * @param JSONableArray $matched_types
     */
    public function setMatchedTypes($matched_types) {
        $this->matched_types = $matched_types;
    }

    /**
     * @return SearchResultTypes
     */
    public function getResultsByType() {
        return $this->results_by_type;
    }

    /**
     * @param SearchResultTypes $results_by_type
     */
    public function setResultsByType($results_by_type) {
        $this->results_by_type = $results_by_type;
    }
}