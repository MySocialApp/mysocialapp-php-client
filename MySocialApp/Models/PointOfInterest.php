<?php

namespace MySocialApp\Models;

/**
 * Class PointOfInterest
 * @package MySocialApp\Models
 */
class PointOfInterest extends BaseCustomField {
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var \MySocialApp\Models\JSONableArray<int>
     */
    protected $photos;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $location;

    /**
     * @var string
     */
    protected $flag;

    /**
     * @return string
     */
    public function getIdStr() {
        return $this->id;
    }

    /**
     * @param string $id_str
     */
    public function setIdStr($id_str) {
        $this->id = $id_str;
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
    public function getNote() {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note) {
        $this->note = $note;
    }

    /**
     * @return array
     */
    public function getPhotos() {
        return $this->arrayFrom($this->photos);
    }

    /**
     * @param array $photos
     */
    public function setPhotos($photos) {
        $this->photos = (new JSONableArray())->setArray($photos);
    }

    /**
     * @return int
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    /**
     * @return Location
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getFlag() {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag($flag) {
        $this->flag = $flag;
    }
}