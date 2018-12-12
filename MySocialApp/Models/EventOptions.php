<?php

namespace MySocialApp\Models;

/**
 * Class EventOptions
 * @package MySocialApp\Models
 */
class EventOptions {
    /**
     * @var string
     */
    protected $sortField;

    /**
     * @var string
     */
    protected $dateField;

    /**
     * @var \DateTime
     */
    protected $fromDate;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $location;

    /**
     * @var bool
     */
    protected $limited;

    public function __construct($sortField, $dateField, $fromDate, $location, $limited) {
        $this->sortField = $sortField;
        $this->dateField = $dateField;
        $this->fromDate = $fromDate;
        $this->location = $location;
        $this->limited = $limited;
    }

    public function toQueryParams() {
        $m = array();
        if ($this->sortField !== null) {
            $m["sort_field"] = $this->sortField;
        }
        if ($this->dateField !== null) {
            $m["date_field"] = $this->dateField;
        }
        if ($this->fromDate !== null) {
            $m["from_date"] = $this->fromDate;
        }
        if ($this->location !== null && $this->location->getLongitude() !== null && $this->location->getLatitude() !== null) {
            $m["longitude"] = $this->location->getLongitude();
            $m["latitude"] = $this->location->getLatitude();
        }
        if ($this->limited !== null) {
            $m["limited"] = $this->limited;
        }
        return $m;
    }
}