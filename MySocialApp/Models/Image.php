<?php

namespace MySocialApp\Models;

/**
 * Class Image
 * @package MySocialApp\Models
 */
class Image extends JSONable {
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $provided_url;

    /**
     * @var string
     */
    protected $small;

    /**
     * @var string
     */
    protected $medium;

    /**
     * @var string
     */
    protected $large;

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getProvidedUrl() {
        return $this->provided_url;
    }

    /**
     * @param string $provided_url
     */
    public function setProvidedUrl($provided_url) {
        $this->provided_url = $provided_url;
    }

    /**
     * @return string
     */
    public function getSmall() {
        return $this->small;
    }

    /**
     * @param string $small
     */
    public function setSmall($small) {
        $this->small = $small;
    }

    /**
     * @return string
     */
    public function getMedium() {
        return $this->medium;
    }

    /**
     * @param string $medium
     */
    public function setMedium($medium) {
        $this->medium = $medium;
    }

    /**
     * @return string
     */
    public function getLarge() {
        return $this->large;
    }

    /**
     * @param string $large
     */
    public function setLarge($large) {
        $this->large = $large;
    }
}