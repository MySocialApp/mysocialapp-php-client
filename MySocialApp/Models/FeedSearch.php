<?php

namespace MySocialApp\Models;

/**
 * Class FeedSearch
 * @package MySocialApp\Models
 */
class FeedSearch extends ISearch {
    public function toQueryParams() {
        $p = parent::toQueryParams();
        $p["type"] = "FEED";
        return $p;
    }
}