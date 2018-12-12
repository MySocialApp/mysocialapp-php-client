<?php

namespace MySocialApp\Models;

/**
 * Class EventOptionsBuilder
 * @package MySocialApp\Models
 */
class EventOptionsBuilder {

    const _DATE_FIELD_START_DATE = "start_date";
    const _DATE_FIELD_END_DATE = "end_date";

    /**
     * @var string
     */
    private $mSortField;
    /**
     * @var string
     */
    private $mDateField;
    /**
     * @var \DateTime
     */
    private $mFromDate;
    /**
     * @var \MySocialApp\Models\Location
     */
    private $mLocation;
    /**
     * @var bool
     */
    private $mLimited;

    /**
     * @param string $sortField
     * @return EventOptionsBuilder
     */
    public function setSortField($sortField) {
        $this->mSortField = $sortField;
        return $this;
    }

    /**
     * @param string $dateField
     * @return EventOptionsBuilder
     */
    public function setDateField($dateField) {
        $this->mDateField = $dateField;
        return $this;
    }

    /**
     * @param \DateTime $fromDate
     * @return EventOptionsBuilder
     */
    public function setFromDate($fromDate) {
        $this->mFromDate = $fromDate;
        return $this;
    }

    /**
     * @param Location $location
     * @return EventOptionsBuilder
     */
    public function setLocation($location) {
        $this->mLocation = $location;
        return $this;
    }

    /**
     * @param bool $limited
     * @return EventOptionsBuilder
     */
    public function setLimited($limited) {
        $this->mLimited = $limited;
        return $this;
    }

    public function build() {
        return new EventOptions($this->mSortField, $this->mDateField, $this->mFromDate, $this->mLocation, $this->mLimited);
    }
}