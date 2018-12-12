<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\URLTag;

/**
 * Class RestURLTag
 * @package MySocialApp\Repositories
 */
class RestURLTag extends RestBase {
    public function getList($page, $query, $contentType) {
        $a = array("page"=>$page);
        if ($query !== null) {
            $a["q"] = $query;
        }
        if ($contentType !== null) {
            $a["content_type"] = $contentType;
        }
        return $this->restRequest(RestBase::_GET, $this->url("/urltag", $a), null, JSONableArray::classOf(URLTag::class));
    }
}