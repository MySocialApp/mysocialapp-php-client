<?php

namespace MySocialApp\Models;

/**
 * Class URLTag
 * @package MySocialApp\Models
 */
class URLTag extends TagEntity {
    /**
     * @var string
     */
    protected $original_url;
    /**
     * @var string
     */
    protected $original_url_to_display;
    /**
     * @var string
     */
    protected $original_host_url;
    /**
     * @var string
     */
    protected $short_url;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $preview_url;

    /**
     * @return string
     */
    public function getOriginalUrl() {
        return $this->original_url;
    }

    /**
     * @param string $original_url
     */
    public function setOriginalUrl($original_url) {
        $this->original_url = $original_url;
    }

    /**
     * @return string
     */
    public function getOriginalUrlToDisplay() {
        return $this->original_url_to_display;
    }

    /**
     * @param string $original_url_to_display
     */
    public function setOriginalUrlToDisplay($original_url_to_display) {
        $this->original_url_to_display = $original_url_to_display;
    }

    /**
     * @return string
     */
    public function getOriginalHostUrl() {
        return $this->original_host_url;
    }

    /**
     * @param string $original_host_url
     */
    public function setOriginalHostUrl($original_host_url) {
        $this->original_host_url = $original_host_url;
    }

    /**
     * @return string
     */
    public function getShortUrl() {
        return $this->short_url;
    }

    /**
     * @param string $short_url
     */
    public function setShortUrl($short_url) {
        $this->short_url = $short_url;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPreviewUrl() {
        return $this->preview_url;
    }

    /**
     * @param string $preview_url
     */
    public function setPreviewUrl($preview_url) {
        $this->preview_url = $preview_url;
    }
}