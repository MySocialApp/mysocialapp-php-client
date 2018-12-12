<?php

namespace MySocialApp\Models;

/**
 * Class WallActivity
 * @package MySocialApp\Models
 */
class WallActivity extends Base {

    /**
     * @var string
     */
    protected $action;

    /**
     * @var \MySocialApp\Models\Base
     */
    protected $object;

    /**
     * @var string
     */
    protected $language_zone;

    /**
     * @var \MySocialApp\Models\User
     */
    protected $actor;

    /**
     * @var \MySocialApp\Models\JSONable
     */
    protected $target;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var string
     */
    protected $badge;

    /**
     * @return string
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * @return Base
     */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param Base $object
     */
    public function setObject($object) {
        $this->object = $object;
    }

    /**
     * @return string
     */
    public function getLanguageZone() {
        return $this->language_zone;
    }

    /**
     * @param string $language_zone
     */
    public function setLanguageZone($language_zone) {
        $this->language_zone = $language_zone;
    }

    /**
     * @return User
     */
    public function getActor() {
        return $this->actor;
    }

    /**
     * @param User $actor
     */
    public function setActor($actor) {
        $this->actor = $actor;
    }

    /**
     * @return JSONable
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param JSONable $target
     */
    public function setTarget($target) {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getSummary() {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary) {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getBadge() {
        return $this->badge;
    }

    /**
     * @param string $badge
     */
    public function setBadge($badge) {
        $this->badge = $badge;
    }

    /**
     * @return string
     */
    public function getBodyMessage() {
        if ($this->object !== null && $this->object->getBodyMessage() !== null) {
            return $this->object->getBodyMessage();
        }
        return parent::getBodyMessage();
    }
}