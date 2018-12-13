<?php

namespace MySocialApp\Models;

use MySocialApp\Services\Session;

/**
 * Class User
 * @package MySocialApp\Models
 */
class User extends Base {
    const _PAGE_SIZE = 10;
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
        return $this->arrayFrom($this->common_friends);
    }

    /**
     * @param array $common_friends
     */
    public function setCommonFriends($common_friends) {
        $this->common_friends = JSONableArray::createWith($common_friends, User::class, $this->_session);
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
        return $this->arrayFrom($this->authorities);
    }

    /**
     * @param array $authorities
     */
    public function setAuthorities($authorities) {
        $this->authorities = JSONableArray::createWith($authorities, null, $this->_session);
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
     * @param mixed $image
     * @return Photo|Error
     */
    public function changeProfilePhoto($image) {
        return $this->_session->getClientService()->getPhoto()->postPhotoForAccount($image, false, null);
    }

    /**
     * @param mixed $image
     * @return Photo|Error
     */
    public function changeProfileCoverPhoto($image) {
        return $this->_session->getClientService()->getPhoto()->postPhotoForAccount($image, true, null);
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
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _streamFriends($page, $to, $offset = 0) {
        if ($offset >= User::_PAGE_SIZE) {
            return $this->_streamFriends($page + 1, $to, $offset - User::_PAGE_SIZE);
        }
        $size = min(User::_PAGE_SIZE, $to - ($page * User::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getUser()->listFriends($page, $size, $this);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < User::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_streamFriends($page + 1, $to);
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
    public function streamFriends($limit) {
        return $this->listFriends(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function listFriends($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > User::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / User::_PAGE_SIZE;
            $offset -= $page * User::_PAGE_SIZE;
            return $this->_streamFriends($page, $to, $offset);
        } else {
            return $this->_streamFriends($page, $to);
        }
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _streamFeed($page, $to, $offset = 0) {
        if ($offset >= User::_PAGE_SIZE) {
            return $this->_streamFeed($page + 1, $to, $offset - User::_PAGE_SIZE);
        }
        $size = min(User::_PAGE_SIZE, $to - ($page * User::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getFeed()->listForUser($this->getSafeId(), $page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < User::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_streamFeed($page + 1, $to);
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
        if ($size > User::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / User::_PAGE_SIZE;
            $offset -= $page * User::_PAGE_SIZE;
            return $this->_streamFeed($page, $to, $offset);
        } else {
            return $this->_streamFeed($page, $to);
        }
    }

    /**
     * @param \MySocialApp\Models\ConversationMessagePost $conversationMessagePost
     * @return \MySocialApp\Models\ConversationMessage|Error
     */
    public function sendPrivateMessage($conversationMessagePost) {
        $conversation = new Conversation();
        $conversation->setMembers(array($this));
        $c = $this->_session->getClientService()->getConversation()->post($conversation);
        if ($c instanceof Conversation) {
            return $c->sendMessage($conversationMessagePost);
        }
        return $c;
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _streamGroup($page, $to, $offset = 0) {
        if ($offset >= User::_PAGE_SIZE) {
            return $this->_streamGroup($page + 1, $to, $offset - User::_PAGE_SIZE);
        }
        $size = min(User::_PAGE_SIZE, $to - ($page * User::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getGroup()->listForMember($this->getSafeId(), $page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < User::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_streamGroup($page + 1, $to);
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
    public function streamGroup($limit) {
        return $this->listGroup(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function listGroup($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > User::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / User::_PAGE_SIZE;
            $offset -= $page * User::_PAGE_SIZE;
            return $this->_streamGroup($page, $to, $offset);
        } else {
            return $this->_streamGroup($page, $to);
        }
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _streamEvent($page, $to, $offset = 0) {
        if ($offset >= User::_PAGE_SIZE) {
            return $this->_streamEvent($page + 1, $to, $offset - User::_PAGE_SIZE);
        }
        $size = min(User::_PAGE_SIZE, $to - ($page * User::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getEvent()->listForMember($this->getSafeId(), $page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < User::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_streamEvent($page + 1, $to);
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
    public function streamEvent($limit) {
        return $this->listEvent(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function listEvent($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > User::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / User::_PAGE_SIZE;
            $offset -= $page * User::_PAGE_SIZE;
            return $this->_streamEvent($page, $to, $offset);
        } else {
            return $this->_streamEvent($page, $to);
        }
    }

    /**
     * @param $page
     * @param $to
     * @param int $offset
     * @return array|Error
     */
    private function _streamPhotoAlbum($page, $to, $offset = 0) {
        if ($offset >= User::_PAGE_SIZE) {
            return $this->_streamPhotoAlbum($page + 1, $to, $offset - User::_PAGE_SIZE);
        }
        $size = min(User::_PAGE_SIZE, $to - ($page * User::_PAGE_SIZE));
        if ($size > 0) {
            $e = $this->_session->getClientService()->getPhotoAlbum()->listForUser($this->getSafeId(), $page, $size);
            if ($e instanceof JSONableArray) {
                $a = array_slice($e->getArray(), $offset);
                if (count($e->getArray()) < User::_PAGE_SIZE) {
                    return $a;
                } else {
                    $a2 = $this->_streamPhotoAlbum($page + 1, $to);
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
    public function streamPhotoAlbum($limit) {
        return $this->listPhotoAlbum(0, $limit);
    }

    /**
     * @param int $page
     * @param int $size
     * @return array|Error
     */
    public function listPhotoAlbum($page = 0, $size = 10) {
        $to = ($page+1) * $size;
        if ($size > User::_PAGE_SIZE) {
            $offset = $page*$size;
            $page = $offset / User::_PAGE_SIZE;
            $offset -= $page * User::_PAGE_SIZE;
            return $this->_streamPhotoAlbum($page, $to, $offset);
        } else {
            return $this->_streamPhotoAlbum($page, $to);
        }
    }

    /**
     * @return Error|Session
     */
    public function connectAsUser() {
        if (($login = $this->_session->getClientService()->getLogin()->loginAs($this->getSafeId())) && $login instanceof Login) {
            return new Session($this->_session->getConfiguration(), $this->_session->getClientConfiguration(),
                new AuthenticationToken($login->getUsername(), $login->getAccessToken()));
        }
        return $login;
    }
}