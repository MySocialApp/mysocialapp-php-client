<?php

namespace MySocialApp\Models;

/**
 * Class FeedSearchBuilder
 * @package MySocialApp\Models
 */
class FeedSearchBuilder {
    /**
     * @var string
     */
    protected $textToSearch;
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
     * @return FeedSearchBuilder
     */
    public function setOwnerFirstName($firstName) {
        if ($this->user === null) $this->user = new User();
        $this->user->setFirstName($firstName);
        return $this;
    }

    /**
     * @param string $lastName
     * @return FeedSearchBuilder
     */
    public function setOwnerLastName($lastName) {
        if ($this->user === null) $this->user = new User();
        $this->user->setLastName($lastName);
        return $this;
    }

    /**
     * @param \MySocialApp\Models\Location $location
     * @return FeedSearchBuilder
     */
    public function setLocation($location) {
        if ($this->user === null) $this->user = new User();
        $this->user->setLivingLocation($location);
        return $this;
    }

    /**
     * @param string $textToSearch
     * @return FeedSearchBuilder
     */
    public function setTextToSearch($textToSearch) {
        $this->textToSearch = $textToSearch;
        return $this;
    }

    /**
     * @param mixed $locationMaximumDistanceInMeters
     * @return FeedSearchBuilder
     */
    public function setLocationMaximumDistanceInMeters($locationMaximumDistanceInMeters) {
        $this->locationMaximumDistanceInMeters = $locationMaximumDistanceInMeters;
        return $this;
    }

    /**
     * @param mixed $locationMaximumDistanceInKilometers
     * @return FeedSearchBuilder
     */
    public function setLocationMaximumDistanceInKilometers($locationMaximumDistanceInKilometers) {
        $this->locationMaximumDistanceInMeters = $locationMaximumDistanceInKilometers * 1000;
        return $this;
    }

    /**
     * @param string $sortOrder
     * @return FeedSearchBuilder
     */
    public function setSortOrder($sortOrder) {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @param bool $matchAll
     * @return FeedSearchBuilder
     */
    public function setMatchAll($matchAll) {
        $this->matchAll = $matchAll;
        return $this;
    }

    /**
     * @param bool $startsWith
     * @return FeedSearchBuilder
     */
    public function setStartsWith($startsWith) {
        $this->startsWith = $startsWith;
        return $this;
    }

    /**
     * @param bool $endsWith
     * @return FeedSearchBuilder
     */
    public function setEndsWith($endsWith) {
        $this->endsWith = $endsWith;
        return $this;
    }

    /**
     * @return FeedSearch
     */
    public function build() {
        $q = new SearchQuery();
        $q->user = $this->user;
        $q->q = $this->textToSearch;
        $q->content = $this->description;
        $q->maximumDistanceInMeters = $this->locationMaximumDistanceInMeters;
        $q->sortOrder = $this->sortOrder;
        $q->matchAll = $this->matchAll;
        $q->startsWith = $this->startsWith;
        $q->endsWith = $this->endsWith;
        return new FeedSearch($q);
    }
}