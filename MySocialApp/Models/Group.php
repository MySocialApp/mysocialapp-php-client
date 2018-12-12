<?php

namespace MySocialApp\Models;

use MySocialApp\Services\Session;

/**
 * Class Group
 * @package MySocialApp\Models
 */
class Group extends BaseCustomField {
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
     * @var \MySocialApp\Models\Location
     */
    protected $location;

    /**
     * @var bool
     */
    protected $is_approvable;

    /**
     * @var string
     */
    protected $group_member_access_control;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Member>
     */
    protected $members;

    /**
     * @var int
     */
    protected $total_members;

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
     * @return bool
     */
    public function isApprovable() {
        return $this->is_approvable;
    }

    /**
     * @param bool $is_approvable
     */
    public function setIsApprovable($is_approvable) {
        $this->is_approvable = $is_approvable;
    }

    /**
     * @return string
     */
    public function getGroupMemberAccessControl() {
        return $this->group_member_access_control;
    }

    /**
     * @param string $group_member_access_control
     */
    public function setGroupMemberAccessControl($group_member_access_control) {
        $this->group_member_access_control = $group_member_access_control;
    }

    /**
     * @return array
     */
    public function getMembers() {
        if ($this->members === null) {
            $e = $this->_session->getClientService()->getGroup()->get($this->getSafeId(), false);
            if ($e instanceof Event) {
                $this->members = $e->getMembers() ?: array();
            } else {
                return $e;
            }
        }
        return $this->members;
    }

    /**
     * @param array $members
     */
    public function setMembers($members) {
        $this->members = JSONableArray::createWith($members, Member::class, $this->_session);
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
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _stream($page, $to, $offset = 0) {
        if ($offset >= Group::_PAGE_SIZE) {
            return $this->_stream($page + 1, $to, $offset - Group::_PAGE_SIZE);
        }
        $size = min(Group::_PAGE_SIZE, $to - ($page * Group::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getFeed()->listForGroup($this->getSafeId(), $page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < Group::_PAGE_SIZE) {
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
        if ($size > Group::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / Group::_PAGE_SIZE;
            $offset -= $page * Group::_PAGE_SIZE;
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
        return $this->_session->getClientService()->getPhoto()->postPhotoForGroup($image, $this->getSafeId(), false, null);
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
     * @return Group|Error
     */
    public function save($session = null) {
        if ($session !== null && $session instanceof Session) {
            $this->_session = $session;
        }
        $e = null;
        if (($id = $this->getSafeId()) !== null) {
            $e = $this->_session->getClientService()->getGroup()->update($this);
        } else {
            $e = $this->_session->getClientService()->getGroup()->post($this);
            if ($e instanceof Group) {
                $this->id = $e->getId();
                $this->id_str = $e->getIdStr();
            }
        }
        if ($e instanceof Group && $this->profile_photo !== null && $this->profile_photo->getRawContent() !== null) {
            $i = $this->changeImage($this->profile_photo->getRawContent());
            if ($i instanceof Photo) {
                $this->setProfilePhoto($i);
                $e->setProfilePhoto($i);
            } else {
                return $i;
            }
        }
        if ($e instanceof Group && $this->profile_cover_photo !== null && $this->profile_cover_photo->getRawContent() !== null) {
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
     * @return User|Error
     */
    public function join() {
        return $this->_session->getClientService()->getUser()->joinGroup($this->getSafeId());
    }

    /**
     * @return Error|null
     */
    public function quit() {
        return $this->unJoin();
    }

    /**
     * @return null|Error
     */
    public function unJoin() {
        return $this->_session->getClientService()->getUser()->unjoinGroup($this->getSafeId());
    }
}