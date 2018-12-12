<?php

namespace MySocialApp\Models;


class Photo extends Base {
    /**
     * @var string
     */
    protected $message;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $small_url;
    /**
     * @var string
     */
    protected $medium_url;
    /**
     * @var string
     */
    protected $high_url;
    /**
     * @var \MySocialApp\Models\Base
     */
    protected $target;
    /**
     * @var \MySocialApp\Models\TagEntities
     */
    protected $tag_entities;
    /**
     * @var mixed
     */
    protected $_raw_content;

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getSmallUrl() {
        return $this->small_url;
    }

    /**
     * @param string $small_url
     */
    public function setSmallUrl($small_url) {
        $this->small_url = $small_url;
    }

    /**
     * @return string
     */
    public function getMediumUrl() {
        return $this->medium_url;
    }

    /**
     * @param string $medium_url
     */
    public function setMediumUrl($medium_url) {
        $this->medium_url = $medium_url;
    }

    /**
     * @return string
     */
    public function getHighUrl() {
        return $this->high_url;
    }

    /**
     * @param string $high_url
     */
    public function setHighUrl($high_url) {
        $this->high_url = $high_url;
    }

    /**
     * @return Base
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param Base $target
     */
    public function setTarget($target) {
        $this->target = $target;
    }

    /**
     * @return TagEntities
     */
    public function getTagEntities() {
        return $this->tag_entities;
    }

    /**
     * @param TagEntities $tag_entities
     */
    public function setTagEntities($tag_entities) {
        $this->tag_entities = $tag_entities;
    }

    /**
     * @return mixed
     */
    public function getRawContent() {
        return $this->_raw_content;
    }

    /**
     * @param mixed $raw_content
     */
    public function setRawContent($raw_content) {
        $this->_raw_content = $raw_content;
    }

    /**
     * @return Error|null
     */
    public function delete() {
        return $this->_session->getClientService()->getPhoto()->delete($this->getSafeId());
    }

    /**
     * @return Photo|Error
     */
    public function save() {
        return $this->_session->getClientService()->getPhoto()->update($this->getSafeId(), $this);
    }
}