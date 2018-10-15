<?php

namespace MySocialApp\Models;

/**
 * Class User
 * @package MySocialApp\Models
 */
class User extends Base {
    private $PAGE_SIZE = 10;
    /**
     * @var string
     */
    protected $first_name;
    /**
     * @var string
     */
    protected $last_name;
    /**
     * @var string
     */
    protected $full_name;
    /**
     * @var string
     */
    protected $presentation;
    /**
     * @var \DateTime
     */
    protected $date_of_birth;
    /**
     * @var string
     */
    protected $gender;
    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $profile_photo;
    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $profile_cover_photo;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var \MySocialApp\Models\Status
     */
    protected $current_status;
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\User>
     */
    protected $common_friends;
    /**
     * @var bool
     */
    protected $is_friend;
    /**
     * @var bool
     */
    protected $is_requested_as_friend;
    /**
     * @var \MySocialApp\Models\Location
     */
    protected $living_location;
    /**
     * @var int
     */
    protected $distance;
    /**
     * @var \MySocialApp\Models\UserFlag
     */
    protected $flag;
    /**
     * @var \MySocialApp\Models\UserStat
     */
    protected $user_stat;
    /**
     * @var \MySocialApp\Models\UserSettings
     */
    protected $user_settings;
    /**
     * @var string
     */
    protected $spoken_language;
    /**
     * @var \MySocialApp\Models\JSONableArray
     */
    protected $authorities;
    /**
     * @var string
     */
    protected $external_id;

    public function __construct($username = null, $email = null, $password = null, $firstName = null) {
        $this->username = $username;
        if ($firstName !== null && strlen($firstName) > 0) {
            $this->first_name = $firstName;
        } else {
            $this->first_name = $username;
        }
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstName() {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName() {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getFullName() {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName($full_name) {
        $this->full_name = $full_name;
    }

    /**
     * @return string
     */
    public function getPresentation() {
        return $this->presentation;
    }

    /**
     * @param string $presentation
     */
    public function setPresentation($presentation) {
        $this->presentation = $presentation;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth() {
        return $this->date_of_birth;
    }

    /**
     * @param \DateTime $date_of_birth
     */
    public function setDateOfBirth($date_of_birth) {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return string
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender) {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
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
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return Status
     */
    public function getCurrentStatus() {
        return $this->current_status;
    }

    /**
     * @param Status $current_status
     */
    public function setCurrentStatus($current_status) {
        $this->current_status = $current_status;
    }

    /**
     * @return array
     */
    public function getCommonFriends() {
        if ($this->common_friends !== null) {
            return $this->common_friends->getArray();
        }
        return null;
    }

    /**
     * @param array $common_friends
     */
    public function setCommonFriends($common_friends) {
        $this->common_friends = (new JSONableArray())->ofClass(User::class)->setSession($this->_session)->setArray($common_friends);
    }

    /**
     * @return bool
     */
    public function isFriend() {
        return $this->is_friend;
    }

    /**
     * @param bool $is_friend
     */
    public function setIsFriend($is_friend) {
        $this->is_friend = $is_friend;
    }

    /**
     * @return bool
     */
    public function isRequestedAsFriend() {
        return $this->is_requested_as_friend;
    }

    /**
     * @param bool $is_requested_as_friend
     */
    public function setIsRequestedAsFriend($is_requested_as_friend) {
        $this->is_requested_as_friend = $is_requested_as_friend;
    }

    /**
     * @return Location
     */
    public function getLivingLocation() {
        return $this->living_location;
    }

    /**
     * @param Location $living_location
     */
    public function setLivingLocation($living_location) {
        $this->living_location = $living_location;
    }

    /**
     * @return int
     */
    public function getDistance() {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance($distance) {
        $this->distance = $distance;
    }

    /**
     * @return UserFlag
     */
    public function getFlag() {
        return $this->flag;
    }

    /**
     * @param UserFlag $flag
     */
    public function setFlag($flag) {
        $this->flag = $flag;
    }

    /**
     * @return UserStat
     */
    public function getUserStat() {
        return $this->user_stat;
    }

    /**
     * @param UserStat $user_stat
     */
    public function setUserStat($user_stat) {
        $this->user_stat = $user_stat;
    }

    /**
     * @return UserSettings
     */
    public function getUserSettings() {
        return $this->user_settings;
    }

    /**
     * @param UserSettings $user_settings
     */
    public function setUserSettings($user_settings) {
        $this->user_settings = $user_settings;
    }

    /**
     * @return string
     */
    public function getSpokenLanguage() {
        return $this->spoken_language;
    }

    /**
     * @param string $spoken_language
     */
    public function setSpokenLanguage($spoken_language) {
        $this->spoken_language = $spoken_language;
    }

    /**
     * @return array
     */
    public function getAuthorities() {
        if ($this->authorities !== null) {
            return $this->authorities->getArray();
        }
        return null;
    }

    /**
     * @param array $authorities
     */
    public function setAuthorities($authorities) {
        $this->authorities = (new JSONableArray())->setSession($this->_session)->setArray($authorities);
    }

    /**
     * @return string
     */
    public function getExternalId() {
        return $this->external_id;
    }

    /**
     * @param string $external_id
     */
    public function setExternalId($external_id) {
        $this->external_id = $external_id;
    }

    /**
     * @return User
     */
    public function save() {
        return $this->_session->getClientService()->getAccount()->update($this);
    }

    /**
     * @return User
     */
    public function requestAsFriend() {
        return $this->_session->getClientService()->getUser()->requestAsFriend($this);
    }

    /**
     * @return Error|null
     */
    public function cancelFriendRequest() {
        return $this->_session->getClientService()->getUser()->cancelRequestAsFriend($this);
    }

    /**
     * @return Error|User
     */
    public function acceptFriendRequest() {
        return $this->_session->getClientService()->getUser()->acceptAsFriend($this);
    }

    /**
     * @return Error|null
     */
    public function refuseFriendRequest() {
        return $this->_session->getClientService()->getUser()->refuseAsFriend($this);
    }

    /**
     * @return Error|null
     */
    public function removeFriend() {
        return $this->_session->getClientService()->getUser()->noMoreFriend($this);
    }

    /**
     * @param $page int
     * @param $size int
     * @return array|Error
     */
    public function listFriends($page = 0, $size = 10) {
        $from = $page * $size;
        $to = ($page+1) * $size;
        $size = min($size, $this->PAGE_SIZE);
        $firstPage = $from % $size;
        $page = ($from - $firstPage) / $size;
        $friends = array();
        while ($from < $to) {
            $f = $this->_session->getClientService()->getUser()->listFriends($page, $size, $this);
            if ($f instanceof Error) {
                return $f;
            }
            if ($f === null) {
                break;
            }
            if ($f instanceof JSONableArray) {
                $from += $size - $firstPage;
                $f = $f->getArray();
                if (count($f) === 0) {
                    break;
                }
                if ($firstPage > 0) {
                    $f = array_slice($f, $firstPage);
                    $firstPage = 0;
                }
                while ($from > $to) {
                    array_pop($f);
                    $from--;
                }
                foreach ($f as $friend) {
                    $friends[] = $friend;
                }
            }
        }
        return $friends;
    }
}