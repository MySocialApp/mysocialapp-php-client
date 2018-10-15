<?php

namespace MySocialApp\Models;

/**
 * Class UserFlag
 * @package MySocialApp\Models
 */
class UserFlag extends Base {
    /**
     * @var string
     */
    protected $image_url;
    /**
     * @var string
     */
    protected $text;
    /**
     * @var string
     */
    protected $link;
    /**
     * @var string
     */
    protected $link_text;
    /**
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getImageUrl() {
        return $this->image_url;
    }

    /**
     * @param string $image_url
     */
    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    /**
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text) {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link) {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLinkText() {
        return $this->link_text;
    }

    /**
     * @param string $link_text
     */
    public function setLinkText($link_text) {
        $this->link_text = $link_text;
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
}