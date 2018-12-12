<?php

namespace MySocialApp\Models;

/**
 * Class TagEntity
 * @package MySocialApp\Models
 */
class TagEntity extends Base {
    /**
     * @var string
     */
    protected $text;
    /**
     * @var \MySocialApp\Models\Base
     */
    protected $target;
    /**
     * @var \MySocialApp\Models\User
     */
    protected $user;
    /**
     * @var \MySocialApp\Models\JSONableArray
     */
    protected $indices;
    /**
     * @var int
     */
    protected $start_index;
    /**
     * @var int
     */
    protected $end_index;

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
     * @return User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * @return array
     */
    public function getIndices() {
        if ($this->indices !== null) {
            return $this->indices->getArray();
        }
        return null;
    }

    /**
     * @param array $indices
     */
    public function setIndices($indices) {
        $this->indices = JSONableArray::createWith($indices, null, $this->_session);
    }

    /**
     * @return int
     */
    public function getStartIndex() {
        return $this->start_index;
    }

    /**
     * @param int $start_index
     */
    public function setStartIndex($start_index) {
        $this->start_index = $start_index;
    }

    /**
     * @return int
     */
    public function getEndIndex() {
        return $this->end_index;
    }

    /**
     * @param int $end_index
     */
    public function setEndIndex($end_index) {
        $this->end_index = $end_index;
    }
}