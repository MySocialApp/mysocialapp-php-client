<?php

namespace MySocialApp\Models;

/**
 * Class Display
 * @package MySocialApp\Models
 */
class Display extends Base {
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
     * @var string
     */
    protected $resource_id;

    /**
     * @var float
     */
    protected $original_price;

    /**
     * @var float
     */
    protected $discount_price;

    /**
     * @var int
     */
    protected $rate;

    /**
     * @var int
     */
    protected $rate_base;

    /**
     * @var string
     */
    protected $rate_text;

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

    /**
     * @return string
     */
    public function getResourceId() {
        return $this->resource_id;
    }

    /**
     * @param string $resource_id
     */
    public function setResourceId($resource_id) {
        $this->resource_id = $resource_id;
    }

    /**
     * @return float
     */
    public function getOriginalPrice() {
        return $this->original_price;
    }

    /**
     * @param float $original_price
     */
    public function setOriginalPrice($original_price) {
        $this->original_price = $original_price;
    }

    /**
     * @return float
     */
    public function getDiscountPrice() {
        return $this->discount_price;
    }

    /**
     * @param float $discount_price
     */
    public function setDiscountPrice($discount_price) {
        $this->discount_price = $discount_price;
    }

    /**
     * @return int
     */
    public function getRate() {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate) {
        $this->rate = $rate;
    }

    /**
     * @return int
     */
    public function getRateBase() {
        return $this->rate_base;
    }

    /**
     * @param int $rate_base
     */
    public function setRateBase($rate_base) {
        $this->rate_base = $rate_base;
    }

    /**
     * @return string
     */
    public function getRateText() {
        return $this->rate_text;
    }

    /**
     * @param string $rate_text
     */
    public function setRateText($rate_text) {
        $this->rate_text = $rate_text;
    }
}