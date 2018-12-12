<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\HashTag;
use MySocialApp\Models\JSONableArray;

/**
 * Class RestHashTag
 * @package MySocialApp\Repositories
 */
class RestHashTag extends RestBase {
    public function getList($page, $size, $query) {
        return $this->restRequest(RestBase::_GET,
            $this->url("/hashtag", array("page"=>$page,"size"=>$size,"q"=>$query)), null,
            JSONableArray::classOf(HashTag::class));
    }
}