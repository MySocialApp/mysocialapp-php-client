<?php

namespace MySocialApp\Models;

/**
 * Class CommentBlob
 * @package MySocialApp\Models
 */
class CommentBlob extends JSONable {
    /**
     * @var int
     */
    protected $total;
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Comment>
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
     * @return array
     */
    public function getSamples() {
        return $this->arrayFrom($this->samples);
    }

    /**
     * @param array
     */
    public function setSamples($samples) {
        $this->samples = JSONableArray::createWith($samples, Comment::class, $this->_session);
    }
}