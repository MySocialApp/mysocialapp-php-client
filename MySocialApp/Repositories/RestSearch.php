<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\SearchResults;

/**
 * Class RestSearch
 * @package MySocialApp\Repositories
 */
class RestSearch extends RestBase {
    public function get($page, $size, $params) {
        if (is_array($params)) {
            $params["page"] = $page;
            $params["size"] = $size;
            return $this->restRequest(RestBase::_GET, $this->url("/search", $params), null, SearchResults::class);
        } else {
            return $this->restRequest(RestBase::_GET, $this->url("/search", array("page"=>$page,"size"=>$size)), null, SearchResults::class);
        }
    }
}