<?php

namespace MySocialApp\Models;

use MySocialApp\Services\Session;

/**
 * Class Event
 * @package MySocialApp\Models
 */
class Event extends BaseCustomField {
    const _PAGE_SIZE = 10;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $start_date;

    /**
     * @var \DateTime
     */
    protected $end_date;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $location;

    /**
     * @var string
     */
    protected $static_maps_url;

    /**
     * @var int
     */
    protected $max_seats;

    /**
     * @var bool
     */
    protected $is_cancelled;

    /**
     * @var int
     */
    protected $free_seats;

    /**
     * @var string
     */
    protected $event_member_access_control;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Member>
     */
    protected $members;

    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $profile_photo;

    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $profile_cover_photo;

    /**
     * @var bool
     */
    protected $is_member;

    /**
     * @var int
     */
    protected $distance_in_meters;

    /**
     * @var int
     */
    protected $total_members;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate() {
        return $this->start_date;
    }

    /**
     * @param \DateTime $start_date
     */
    public function setStartDate($start_date) {
        $this->start_date = $start_date;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate() {
        return $this->end_date;
    }

    /**
     * @param \DateTime $end_date
     */
    public function setEndDate($end_date) {
        $this->end_date = $end_date;
    }

    /**
     * @return Location
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getStaticMapsUrl() {
        return $this->static_maps_url;
    }

    /**
     * @param string $static_maps_url
     */
    public function setStaticMapsUrl($static_maps_url) {
        $this->static_maps_url = $static_maps_url;
    }

    /**
     * @return int
     */
    public function getMaxSeats() {
        return $this->max_seats;
    }

    /**
     * @param int $max_seats
     */
    public function setMaxSeats($max_seats) {
        $this->max_seats = $max_seats;
    }

    /**
     * @return bool
     */
    public function isCancelled() {
        return $this->is_cancelled;
    }

    /**
     * @param bool $is_cancelled
     */
    public function setIsCancelled($is_cancelled) {
        $this->is_cancelled = $is_cancelled;
    }

    /**
     * @return int
     */
    public function getFreeSeats() {
        return $this->free_seats;
    }

    /**
     * @param int $free_seats
     */
    public function setFreeSeats($free_seats) {
        $this->free_seats = $free_seats;
    }

    /**
     * @return string
     */
    public function getEventMemberAccessControl() {
        return $this->event_member_access_control;
    }

    /**
     * @param string $event_member_access_control
     */
    public function setEventMemberAccessControl($event_member_access_control) {
        $this->event_member_access_control = $event_member_access_control;
    }

    /**
     * @return array
     */
    public function getMembers() {
        if ($this->members === null) {
            $e = $this->_session->getClientService()->getEvent()->get($this->getSafeId());
            if ($e instanceof Event) {
                $this->members = $e->getMembers() ?: (new JSONableArray())->ofClass(User::class);
            } else {
                return $e;
            }
        }
        return $this->arrayFrom($this->members);
    }

    /**
     * @param array $members
     */
    public function setMembers($members) {
        $this->members = (new JSONableArray())->ofClass(User::class)->setArray($members);
    }

    /**
     * @return Photo
     */
    public function getProfilePhoto() {
        return $this->profile_photo;
    }

    /**
     * @param Photo $profile_photo
     */
    public function setProfilePhoto($profile_photo) {
        $this->profile_photo = $profile_photo;
    }

    /**
     * @return Photo
     */
    public function getProfileCoverPhoto() {
        return $this->profile_cover_photo;
    }

    /**
     * @param Photo $profile_cover_photo
     */
    public function setProfileCoverPhoto($profile_cover_photo) {
        $this->profile_cover_photo = $profile_cover_photo;
    }

    /**
     * @return bool
     */
    public function isMember() {
        return $this->is_member;
    }

    /**
     * @param bool $is_member
     */
    public function setIsMember($is_member) {
        $this->is_member = $is_member;
    }

    /**
     * @return int
     */
    public function getDistanceInMeters() {
        return $this->distance_in_meters;
    }

    /**
     * @param int $distance_in_meters
     */
    public function setDistanceInMeters($distance_in_meters) {
        $this->distance_in_meters = $distance_in_meters;
    }

    /**
     * @return int
     */
    public function getTotalMembers() {
        return $this->total_members;
    }

    /**
     * @param int $total_members
     */
    public function setTotalMembers($total_members) {
        $this->total_members = $total_members;
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $offset = 0) {
        if ($offset >= Event::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $offset - Event::_PAGE_SIZE);
        }
        $size = min(Event::_PAGE_SIZE, $to - ($page * Event::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getFeed()->listForEvent($this->getSafeId(), $page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < Event::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_stream($page + 1, $to);
                    if (is_array($a2)) {
                        return array_merge($a, $a2);
                    } else {
                        return $a;
                    }
                }
            } else {
                return $e;
            }
        }
        return array();
    }

    /**
     * @param int $limit
     * @return array|Error
     */
    public function streamNewsFeed($limit) {
        return $this->listNewsFeed(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function listNewsFeed($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > Event::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / Event::_PAGE_SIZE;
            $offset -= $page * Event::_PAGE_SIZE;
            return $this->_stream($page, $to, $offset);
        } else {
            return $this->_stream($page, $to);
        }
    }

    /**
     * @param mixed $image
     * @return Photo|Error
     */
    public function changeImage($image) {
        return $this->_session->getClientService()->getPhoto()->postPhotoForEvent($image, $this->getSafeId(), false, null);
    }

    /**
     * @param mixed $image
     * @return Photo|Error
     */
    public function changeCoverImage($image) {
        return $this->_session->getClientService()->getPhoto()->postPhotoForEvent($image, $this->getSafeId(), true, null);
    }

    /**
     * @param Session $session
     * @return Event|Error
     */
    public function save($session = null) {
        if ($session !== null && $session instanceof Session) {
            $this->_session = $session;
        }
        $e = null;
        if (($id = $this->getSafeId()) !== null) {
            $e = $this->_session->getClientService()->getEvent()->update($this);
        } else {
            $e = $this->_session->getClientService()->getEvent()->post($this);
            if ($e instanceof Event) {
                $this->id = $e->getId();
                $this->id_str = $e->getIdStr();
            }
        }
        if ($e instanceof Event && $this->profile_photo !== null && $this->profile_photo->getRawContent() !== null) {
            $i = $this->changeImage($this->profile_photo->getRawContent());
            if ($i instanceof Photo) {
                $this->setProfilePhoto($i);
                $e->setProfilePhoto($i);
            } else {
                return $i;
            }
        }
        if ($e instanceof Event && $this->profile_cover_photo !== null && $this->profile_cover_photo->getRawContent() !== null) {
            $i = $this->changeCoverImage($this->profile_cover_photo->getRawContent());
            if ($i instanceof Photo) {
                $this->setProfileCoverPhoto($i);
                $e->setProfileCoverPhoto($i);
            } else {
                return $i;
            }
        }
        return $e;
    }

    /**
     * @return Event|Error
     */
    public function cancel() {
        return $this->_session->getClientService()->getEvent()->cancel($this->getSafeId());
    }

    /**
     * @return \MySocialApp\Models\User|Error
     */
    public function participate() {
        return $this->_session->getClientService()->getUser()->joinEvent($this->getSafeId());
    }

    /**
     * @return Error|User
     */
    public function confirmParticipation() {
        return $this->participate();
    }

    /**
     * @return null|Error
     */
    public function unParticipate() {
        return $this->_session->getClientService()->getUser()->unjoinEvent($this->getSafeId());
    }

    /**
     * @return Error|null
     */
    public function cancelParticipation() {
        return $this->unParticipate();
    }
}