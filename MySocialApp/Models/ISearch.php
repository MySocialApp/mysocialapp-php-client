<?php

namespace MySocialApp\Models;

/**
 * Class ISearch
 * @package MySocialApp\Models
 */
class ISearch {
    /**
     * @var \MySocialApp\Models\SearchQuery
     */
    protected $searchQuery;

    public function __construct($searchQuery) {
        $this->searchQuery = $searchQuery;
    }

    public function toQueryParams() {
        $m = array();
        if ($this->searchQuery->q !== null) {
            $m["q"] = $this->searchQuery->q;
        }
        if ($this->searchQuery->name !== null) {
            $m["name"] = $this->searchQuery->name;
        }
        if ($this->searchQuery->content !== null) {
            $m["content"] = $this->searchQuery->content;
        }
        if ($this->searchQuery->user !== null && $this->searchQuery->user->getFirstName() !== null) {
            $m["first_name"] = $this->searchQuery->user->getFirstName();
        }
        if ($this->searchQuery->user !== null && $this->searchQuery->user->getLastName() !== null) {
            $m["first_name"] = $this->searchQuery->user->getLastName();
        }
        if ($this->searchQuery->user !== null && $this->searchQuery->user->getPresentation() !== null) {
            $m["content"] = $this->searchQuery->user->getPresentation();
        }
        if ($this->searchQuery->user !== null && $this->searchQuery->user->getGender() !== null) {
            $m["gender"] = $this->searchQuery->user->getGender();
        }
        if ($this->searchQuery->user !== null && $this->searchQuery->user->getLivingLocation() !== null) {
            if ($this->searchQuery->user->getLivingLocation()->getLatitude() !== null) {
                $m["latitude"] = $this->searchQuery->user->getLivingLocation()->getLatitude();
            }
            if ($this->searchQuery->user->getLivingLocation()->getLongitude() !== null) {
                $m["longitude"] = $this->searchQuery->user->getLivingLocation()->getLongitude();
            }
        }
        if ($this->searchQuery->maximumDistanceInMeters !== null) {
            $m["maximum_distance"] = $this->searchQuery->maximumDistanceInMeters;
        }
        if ($this->searchQuery->dateField !== null) {
            $m["date_field"] = $this->searchQuery->dateField;
        } else {
            $m["date_field"] = "created_date";
        }
        if ($this->searchQuery->startDate !== null) {
            $m["start_date"] = $this->searchQuery->startDate;
        }
        if ($this->searchQuery->endDate !== null) {
            $m["end_date"] = $this->searchQuery->endDate;
        }
        if ($this->searchQuery->sortOrder !== null) {
            $m["sort_order"] = $this->searchQuery->sortOrder;
        }
        if ($this->searchQuery->matchAll !== null) {
            $m["must_match_all"] = $this->searchQuery->matchAll;
        }
        if ($this->searchQuery->startsWith !== null) {
            $m["starts_with"] = $this->searchQuery->startsWith;
        }
        if ($this->searchQuery->endsWith !== null) {
            $m["ends_with"] = $this->searchQuery->endsWith;
        }
        return $m;
    }
}