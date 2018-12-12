<?php

namespace MySocialApp\Models;

/**
 * Class EventSearch
 * @package MySocialApp\Models
 */
class EventSearch extends ISearch {
    public function toQueryParams() {
        $p = parent::toQueryParams();
        $p["type"] = "EVENT";
        return $p;
    }
}