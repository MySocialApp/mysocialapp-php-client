<?php

namespace MySocialApp\Models;

/**
 * Class Notification
 * @package MySocialApp\Models
 */
class Notification extends Base {
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $image_url;

    /**
     * @var string
     */
    protected $notification_key;

    /**
     * @var bool
     */
    protected $request_ack;

    /**
     * @var bool
     */
    protected $show_notification;

    /**
     * @var bool
     */
    protected $force_notification_sound;

    /**
     * @var \MySocialApp\Models\Base
     */
    protected $payload;

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
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
     * @return string
     */
    public function getImageUrl() {
        return $this->image_url;
    }

    /**
     * @param string $image_url
     */
    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    /**
     * @return string
     */
    public function getNotificationKey() {
        return $this->notification_key;
    }

    /**
     * @param string $notification_key
     */
    public function setNotificationKey($notification_key) {
        $this->notification_key = $notification_key;
    }

    /**
     * @return bool
     */
    public function isRequestAck() {
        return $this->request_ack;
    }

    /**
     * @param bool $request_ack
     */
    public function setRequestAck($request_ack) {
        $this->request_ack = $request_ack;
    }

    /**
     * @return bool
     */
    public function isShowNotification() {
        return $this->show_notification;
    }

    /**
     * @param bool $show_notification
     */
    public function setShowNotification($show_notification) {
        $this->show_notification = $show_notification;
    }

    /**
     * @return bool
     */
    public function isForceNotificationSound() {
        return $this->force_notification_sound;
    }

    /**
     * @param bool $force_notification_sound
     */
    public function setForceNotificationSound($force_notification_sound) {
        $this->force_notification_sound = $force_notification_sound;
    }

    /**
     * @return Base
     */
    public function getPayload() {
        return $this->payload;
    }

    /**
     * @param Base $payload
     */
    public function setPayload($payload) {
        $this->payload = $payload;
    }

    /**
     * @param \MySocialApp\Models\NotificationAck $notificationAck
     * @return \MySocialApp\Models\NotificationAck|Error
     */
    public function ack($notificationAck) {
        if ($notificationAck->getNotificationKey() === null) {
            $notificationAck->setNotificationKey($this->notification_key);
        }
        return $this->_session->getClientService()->getNotificationAck()->post($notificationAck);
    }
}