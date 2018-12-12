<?php

namespace MySocialApp\Models;

/**
 * Class Member
 * @package MySocialApp\Models
 */
class Member extends JSONable {
    /**
     * @var \DateTime
     */
    protected $created_date;

    /**
     * @var \DateTime
     */
    protected $updated_date;

    /**
     * @var \MySocialApp\Models\Event
     */
    protected $event;

    /**
     * @var \MySocialApp\Models\Group
     */
    protected $group;

    /**
     * @var \MySocialApp\Models\User
     */
    protected $user;

    /**
     * @var string
     */
    protected $status;

    /**
     * @return \DateTime
     */
    public function getCreatedDate() {
        return $this->created_date;
    }

    /**
     * @param \DateTime $created_date
     */
    public function setCreatedDate($created_date) {
        $this->created_date = $created_date;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate() {
        return $this->updated_date;
    }

    /**
     * @param \DateTime $updated_date
     */
    public function setUpdatedDate($updated_date) {
        $this->updated_date = $updated_date;
    }

    /**
     * @return Event
     */
    public function getEvent() {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent($event) {
        $this->event = $event;
    }

    /**
     * @return Group
     */
    public function getGroup() {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup($group) {
        $this->group = $group;
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
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }
}