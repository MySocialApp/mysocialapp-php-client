<?php

namespace MySocialApp\Models;

/**
 * Class SearchResultValueUser
 * @package MySocialApp\Models
 */
class SearchResultValueUser extends JSONable {
    /**
     * @var int
     */
    protected $matched_count;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\User>
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
     * @return array
     */
    public function getData() {
        return $this->arrayFrom($this->data);
    }

    /**
     * @param array $data
     */
    public function setData($data) {
        $this->data = (new JSONableArray())->ofClass(User::class)->setArray($data);
    }
}