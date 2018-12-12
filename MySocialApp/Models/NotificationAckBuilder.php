<?php

namespace MySocialApp\Models;

/**
 * Class NotificationAckBuilder
 * @package MySocialApp\Models
 */
class NotificationAckBuilder {
    /**
     * @var string
     */
    protected $mDeviceId;

    /**
     * @var string
     */
    protected $mAppPlatform;

    /**
     * @var string
     */
    protected $mAppVersion;

    /**
     * @var string
     */
    protected $mAdvertisingId;

    /**
     * @var string
     */
    protected $mNotificationKey;

    /**
     * @var string
     */
    protected $mNotificationAction;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $mLocation;

    /**
     * @param string $deviceId
     * @return NotificationAckBuilder
     */
    public function setDeviceId($deviceId) {
        $this->mDeviceId = $deviceId;
        return $this;
    }

    /**
     * @param string $appPlatform
     * @return NotificationAckBuilder
     */
    public function setAppPlatform($appPlatform) {
        $this->mAppPlatform = $appPlatform;
        return $this;
    }

    /**
     * @param string $appVersion
     * @return NotificationAckBuilder
     */
    public function setAppVersion($appVersion) {
        $this->mAppVersion = $appVersion;
        return $this;
    }

    /**
     * @param string $advertisingId
     * @return NotificationAckBuilder
     */
    public function setAdvertisingId($advertisingId) {
        $this->mAdvertisingId = $advertisingId;
        return $this;
    }

    /**
     * @param string $notificationKey
     * @return NotificationAckBuilder
     */
    public function setNotificationKey($notificationKey) {
        $this->mNotificationKey = $notificationKey;
        return $this;
    }

    /**
     * @param string $notificationAction
     * @return NotificationAckBuilder
     */
    public function setNotificationAction($notificationAction) {
        $this->mNotificationAction = $notificationAction;
        return $this;
    }

    /**
     * @param Location $location
     * @return NotificationAckBuilder
     */
    public function setLocation($location) {
        $this->mLocation = $location;
        return $this;
    }

    public function build() {
        $n = new NotificationAck();
        $n->setDeviceId($this->mDeviceId);
        $n->setAppPlatform($this->mAppPlatform);
        $n->setAppVersion($this->mAppVersion);
        $n->setAdvertisingId($this->mAdvertisingId);
        $n->setNotificationKey($this->mNotificationKey);
        $n->setNotificationAction($this->mNotificationAction);
        $n->setLocation($this->mLocation);
        return $n;
    }
}