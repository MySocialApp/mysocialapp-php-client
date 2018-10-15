<?php

namespace MySocialApp\Models;

/**
 * Class LikeBlob
 * @package MySocialApp\Models
 */
class LikeBlob extends JSONable {
    /**
     * @var int
     */
    protected $total;
    /**
     * @var bool
     */
    protected $has_like;
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Like>
     */
    protected $samples;

    /**
     * @return int
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total) {
        $this->total = $total;
    }

    /**
     * @return bool
     */
    public function isHasLike() {
        return $this->has_like;
    }

    /**
     * @param bool $has_like
     */
    public function setHasLike($has_like) {
        $this->has_like = $has_like;
    }

    /**
     * @return JSONableArray
     */
    public function getSamples() {
        if ($this->samples !== null) {
            return $this->samples->getArray();
        }
        return null;
    }

    /**
     * @param JSONableArray $samples
     */
    public function setSamples($samples) {
        $this->samples = (new JSONableArray())->ofClass(Like::class)->setSession($this->_session)->setArray($samples);
    }
}