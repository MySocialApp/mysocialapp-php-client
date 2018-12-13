<?php

namespace MySocialApp\Models;

/**
 * Class PreviewPhotos
 * @package MySocialApp\Models
 */
class PreviewPhotos extends JSONable {
    /**
     * @var int
     */
    protected $total;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Photo>
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
     * @param array $samples
     */
    public function setSamples($samples) {
        $this->samples = JSONableArray::createWith($samples, Photo::class, $this->_session);
    }
}