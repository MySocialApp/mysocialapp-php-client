<?php

namespace MySocialApp\Services;

use MySocialApp\Repositories\RestAccount;
use MySocialApp\Repositories\RestAccountEvent;
use MySocialApp\Repositories\RestCommentable;
use MySocialApp\Repositories\RestConversation;
use MySocialApp\Repositories\RestConversationMessage;
use MySocialApp\Repositories\RestCustomField;
use MySocialApp\Repositories\RestDevice;
use MySocialApp\Repositories\RestEvent;
use MySocialApp\Repositories\RestFeed;
use MySocialApp\Repositories\RestFriendRequest;
use MySocialApp\Repositories\RestGroup;
use MySocialApp\Repositories\RestLikeable;
use MySocialApp\Repositories\RestLogin;
use MySocialApp\Repositories\RestNotificationAck;
use MySocialApp\Repositories\RestPhoto;
use MySocialApp\Repositories\RestPhotoAlbum;
use MySocialApp\Repositories\RestPreviewNotification;
use MySocialApp\Repositories\RestReport;
use MySocialApp\Repositories\RestReset;
use MySocialApp\Repositories\RestSearch;
use MySocialApp\Repositories\RestStatus;
use MySocialApp\Repositories\RestTextWallMessage;
use MySocialApp\Repositories\RestUser;

/**
 * Class ClientService
 * @package MySocialApp\Services
 */
class ClientService {
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var RestAccount
     */
    protected $account;

    /**
     * @return RestAccount
     */
    public function getAccount() {
        return $this->account ?: ($this->account = new RestAccount($this->session));
    }

    /**
     * @var RestAccountEvent
     */
    protected $accountEvent;

    /**
     * @return RestAccountEvent
     */
    public function getAccountEvent() {
        return $this->accountEvent ?: ($this->accountEvent = new RestAccountEvent($this->session));
    }

    /**
     * @var RestCommentable
     */
    protected $commentable;

    /**
     * @return RestCommentable
     */
    public function getCommentable() {
        return $this->commentable ?: ($this->commentable = new RestCommentable($this->session));
    }

    /**
     * @var RestConversation
     */
    protected $conversation;

    /**
     * @return RestConversation
     */
    public function getConversation() {
        return $this->conversation ?: ($this->conversation = new RestConversation($this->session));
    }

    /**
     * @var RestConversationMessage
     */
    protected $conversationMessage;

    /**
     * @return RestConversationMessage
     */
    public function getConversationMessage() {
        return $this->conversationMessage ?: ($this->conversationMessage = new RestConversationMessage($this->session));
    }

    /**
     * @var RestCustomField
     */
    protected $customField;

    /**
     * @return RestCustomField
     */
    public function getCustomField() {
        return $this->customField ?: ($this->customField = new RestCustomField($this->session));
    }

    /**
     * @var RestDevice
     */
    protected $device;

    /**
     * @return RestDevice
     */
    public function getDevice() {
        return $this->device ?: ($this->device = new RestDevice($this->session));
    }

    /**
     * @var RestEvent
     */
    protected $event;

    /**
     * @return RestEvent
     */
    public function getEvent() {
        return $this->event ?: ($this->event = new RestEvent($this->session));
    }

    /**
     * @var RestFeed
     */
    protected $feed;

    /**
     * @return RestFeed
     */
    public function getFeed() {
        return $this->feed ?: ($this->feed = new RestFeed($this->session));
    }

    /**
     * @var RestFriendRequest
     */
    protected $friendRequest;

    /**
     * @return RestFriendRequest
     */
    public function getFriendRequest() {
        return $this->friendRequest ?: ($this->friendRequest = new RestFriendRequest($this->session));
    }

    /**
     * @var RestGroup
     */
    protected $group;

    /**
     * @return RestGroup
     */
    public function getGroup() {
        return $this->group ?: ($this->group = new RestGroup($this->session));
    }

    /**
     * @var RestLikeable
     */
    protected $likeable;

    /**
     * @return RestLikeable
     */
    public function getLikeable() {
        return $this->likeable ?: ($this->likeable = new RestLikeable($this->session));
    }

    /**
     * @var RestLogin
     */
    protected $login;

    /**
     * @return RestLogin
     */
    public function getLogin() {
        return $this->login ?: ($this->login = new RestLogin($this->session));
    }

    /**
     * @var RestPreviewNotification
     */
    protected $notification;

    /**
     * @return RestPreviewNotification
     */
    public function getNotification() {
        return $this->notification ?: ($this->notification = new RestPreviewNotification($this->session));
    }

    /**
     * @var RestNotificationAck
     */
    protected $notificationAck;

    /**
     * @return RestNotificationAck
     */
    public function getNotificationAck() {
        return $this->notificationAck ?: ($this->notificationAck = new RestNotificationAck($this->session));
    }

    /**
     * @var RestPhoto
     */
    protected $photo;

    /**
     * @return RestPhoto
     */
    public function getPhoto() {
        return $this->photo ?: ($this->photo = new RestPhoto($this->session));
    }

    /**
     * @var RestPhotoAlbum
     */
    protected $photoAlbum;

    /**
     * @return RestPhotoAlbum
     */
    public function getPhotoAlbum() {
        return $this->photoAlbum ?: ($this->photoAlbum = new RestPhotoAlbum($this->session));
    }

    /**
     * @var RestReport
     */
    protected $report;

    /**
     * @return RestReport
     */
    public function getReport() {
        return $this->report ?: ($this->report = new RestReport($this->session));
    }

    /**
     * @var RestReset
     */
    protected $reset;

    /**
     * @return RestReset
     */
    public function getReset() {
        return $this->reset ?: ($this->reset = new RestReset($this->session));
    }

    /**
     * @var RestSearch
     */
    protected $search;

    /**
     * @return RestSearch
     */
    public function getSearch() {
        return $this->search ?: ($this->search = new RestSearch($this->session));
    }

    /**
     * @var RestStatus
     */
    protected $status;

    /**
     * @return RestStatus
     */
    public function getStatus() {
        return $this->status ?: ($this->status = new RestStatus($this->session));
    }

    /**
     * @var RestTextWallMessage
     */
    protected $textWallMessage;

    /**
     * @return RestTextWallMessage
     */
    public function getTextWallMessage() {
        return $this->textWallMessage ?: ($this->textWallMessage = new RestTextWallMessage($this->session));
    }

    /**
     * @var RestUser
     */
    protected $user;

    /**
     * @return RestUser
     */
    public function getUser() {
        return $this->user ?: ($this->user = new RestUser($this->session));
    }

    /**
     * ClientService constructor.
     * @param $session Session
     */
    public function __construct($session) {
        $this->session = $session;
    }
}