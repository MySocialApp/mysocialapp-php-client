<?php

namespace MySocialApp\Models;

/**
 * Class EventBuilder
 * @package MySocialApp\Models
 */
class EventBuilder {
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var \DateTime
     */
    private $startDate;
    /**
     * @var \DateTime
     */
    private $endDate;
    /**
     * @var \MySocialApp\Models\Location
     */
    private $location;
    /**
     * @var int
     */
    private $maxSeats;
    /**
     * @var string
     */
    private $memberAccessControl;
    /**
     * @var mixed
     */
    private $image;
    /**
     * @var mixed
     */
    private $coverImage;
    /**
     * @var array
     */
    private $customFields;

    /**
     * @param string $name
     * @return EventBuilder
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $description
     * @return EventBuilder
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * @param \DateTime $startDate
     * @return EventBuilder
     */
    public function setStartDate($startDate) {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param \DateTime $endDate
     * @return EventBuilder
     */
    public function setEndDate($endDate) {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @param Location $location
     * @return EventBuilder
     */
    public function setLocation($location) {
        $this->location = $location;
        return $this;
    }

    /**
     * @param int $maxSeats
     * @return EventBuilder
     */
    public function setMaxSeats($maxSeats) {
        $this->maxSeats = $maxSeats;
        return $this;
    }

    /**
     * @param string $memberAccessControl
     * @return EventBuilder
     */
    public function setMemberAccessControl($memberAccessControl) {
        $this->memberAccessControl = $memberAccessControl;
        return $this;
    }

    /**
     * @param mixed $image
     * @return EventBuilder
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /**
     * @param mixed $coverImage
     * @return EventBuilder
     */
    public function setCoverImage($coverImage) {
        $this->coverImage = $coverImage;
        return $this;
    }

    /**
     * @param array $customFields
     * @return EventBuilder
     */
    public function setCustomFields($customFields) {
        $this->customFields = $customFields;
        return $this;
    }

    public function build() {
        if ($this->name === null || strlen($this->name) === 0) {
            return new Error("Name cannot be null or empty");
        }
        if ($this->description === null || strlen($this->description) === 0) {
            return new Error("Description cannot be null or empty");
        }
        if ($this->startDate === null || $this->endDate === null) {
            return new Error("Start date and end date cannot be null");
        }
        if ($this->startDate < new \DateTime()) {
            return new Error("Start date cannot be lower than now");
        }
        if ($this->startDate > $this->endDate) {
            return new Error("Start date cannot be greater than end date");
        }
        if ($this->location === null) {
            return new Error("Meeting location cannot be null or empty");
        }
        $e = new Event();
        $e->setName($this->name);
        $e->setDescription($this->description);
        $e->setStartDate($this->startDate);
        $e->setEndDate($this->endDate);
        $e->setLocation($this->location);
        $e->setMaxSeats($this->maxSeats);
        $e->setEventMemberAccessControl($this->memberAccessControl);
        if ($this->image !== null) {
            $e->setProfilePhoto(new Photo());
            $e->getProfilePhoto()->setRawContent($this->image);
        }
        if ($this->coverImage !== null) {
            $e->setProfileCoverPhoto(new Photo());
            $e->getProfileCoverPhoto()->setRawContent($this->coverImage);
        }
        if ($this->customFields !== null) {
            $e->setCustomFields($this->customFields);
        }
        return $e;
    }
}