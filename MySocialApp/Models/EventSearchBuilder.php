<?php

namespace MySocialApp\Models;

/**
 * Class EventSearchBuilder
 * @package MySocialApp\Models
 */
class EventSearchBuilder {
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var
     */
    protected $locationMaximumDistanceInMeters;
    /**
     * @var string
     */
    protected $sortOrder;
    /**
     * @var \DateTime
     */
    protected $fromDate;
    /**
     * @var \DateTime
     */
    protected $toDate;
    /**
     * @var string
     */
    protected $dateField;
    /**
     * @var bool
     */
    protected $matchAll;
    /**
     * @var bool
     */
    protected $startsWith;
    /**
     * @var bool
     */
    protected $endsWith;
    /**
     * @var \MySocialApp\Models\User
     */
    protected $user;

    /**
     * @param string $firstName
     * @return EventSearchBuilder
     */
    public function setOwnerFirstName($firstName) {
        if ($this->user === null) $this->user = new User();
        $this->user->setFirstName($firstName);
        return $this;
    }

    /**
     * @param string $lastName
     * @return EventSearchBuilder
     */
    public function setOwnerLastName($lastName) {
        if ($this->user === null) $this->user = new User();
        $this->user->setLastName($lastName);
        return $this;
    }

    /**
     * @param string $name
     * @return EventSearchBuilder
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $description
     * @return EventSearchBuilder
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $locationMaximumDistanceInMeters
     * @return EventSearchBuilder
     */
    public function setLocationMaximumDistanceInMeters($locationMaximumDistanceInMeters) {
        $this->locationMaximumDistanceInMeters = $locationMaximumDistanceInMeters;
        return $this;
    }

    /**
     * @param string $sortOrder
     * @return EventSearchBuilder
     */
    public function setSortOrder($sortOrder) {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @param \DateTime $fromDate
     * @return EventSearchBuilder
     */
    public function setFromDate($fromDate) {
        $this->fromDate = $fromDate;
        return $this;
    }

    /**
     * @param \DateTime $toDate
     * @return EventSearchBuilder
     */
    public function setToDate($toDate) {
        $this->toDate = $toDate;
        return $this;
    }

    /**
     * @param string $dateField
     * @return EventSearchBuilder
     */
    public function setDateField($dateField) {
        $this->dateField = $dateField;
        return $this;
    }

    /**
     * @param bool $matchAll
     * @return EventSearchBuilder
     */
    public function setMatchAll($matchAll) {
        $this->matchAll = $matchAll;
        return $this;
    }

    /**
     * @param bool $startsWith
     * @return EventSearchBuilder
     */
    public function setStartsWith($startsWith) {
        $this->startsWith = $startsWith;
        return $this;
    }

    /**
     * @param bool $endsWith
     * @return EventSearchBuilder
     */
    public function setEndsWith($endsWith) {
        $this->endsWith = $endsWith;
        return $this;
    }

    /**
     * @return EventSearch
     */
    public function build() {
        $q = new SearchQuery();
        $q->user = $this->user;
        $q->name = $this->name;
        $q->content = $this->description;
        $q->maximumDistanceInMeters = $this->locationMaximumDistanceInMeters;
        $q->sortOrder = $this->sortOrder;
        $q->startDate = $this->fromDate;
        $q->endDate = $this->toDate;
        $q->dateField = $this->dateField;
        $q->matchAll = $this->matchAll;
        $q->startsWith = $this->startsWith;
        $q->endsWith = $this->endsWith;
        return new EventSearch($q);
    }
}