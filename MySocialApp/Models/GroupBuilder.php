<?php

namespace MySocialApp\Models;

/**
 * Class GroupBuilder
 * @package MySocialApp\Models
 */
class GroupBuilder {
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var \MySocialApp\Models\Location
     */
    private $location;
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
     * @return GroupBuilder
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $description
     * @return GroupBuilder
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * @param Location $location
     * @return GroupBuilder
     */
    public function setLocation($location) {
        $this->location = $location;
        return $this;
    }

    /**
     * @param string $memberAccessControl
     * @return GroupBuilder
     */
    public function setMemberAccessControl($memberAccessControl) {
        $this->memberAccessControl = $memberAccessControl;
        return $this;
    }

    /**
     * @param mixed $image
     * @return GroupBuilder
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /**
     * @param mixed $coverImage
     * @return GroupBuilder
     */
    public function setCoverImage($coverImage) {
        $this->coverImage = $coverImage;
        return $this;
    }

    /**
     * @param array $customFields
     * @return GroupBuilder
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
        if ($this->location === null) {
            return new Error("Meeting location cannot be null or empty");
        }
        $g = new Group();
        $g->setName($this->name);
        $g->setDescription($this->description);
        $g->setLocation($this->location);
        $g->setGroupMemberAccessControl($this->memberAccessControl);
        if ($this->image !== null) {
            $g->setProfilePhoto(new Photo());
            $g->getProfilePhoto()->setRawContent($this->image);
        }
        if ($this->coverImage !== null) {
            $g->setProfileCoverPhoto(new Photo());
            $g->getProfileCoverPhoto()->setRawContent($this->coverImage);
        }
        if ($this->customFields !== null) {
            $g->setCustomFields($this->customFields);
        }
        return $g;
    }
}