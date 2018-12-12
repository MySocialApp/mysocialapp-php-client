<?php

namespace MySocialApp\Models;

/**
 * Class NotificationAck
 * @package MySocialApp\Models
 */
class NotificationAck extends JSONable {

    const _ACTION_RECEIVED = "RECEIVED";
    const _ACTION_READ = "READ";
    const _ACTION_OPENED = "OPENED";

    const _APP_PLATFORM_IOS = "IOS";
    const _APP_PLATFORM_SDK = "SDK";

    /**
     * @var string
     */
    protected $device_id;

    /**
     * @var string
     */
    protected $advertising_id;

    /**
     * @var string
     */
    protected $notification_key;

    /**
     * @var string
     */
    protected $notification_action;

    /**
     * @var \MySocialApp\Models\BaseLocation
     */
    protected $location;

    /**
     * @var string
     */
    protected $app_platform;

    /**
     * @var string
     */
    protected $app_version;

    /**
     * @return string
     */
    public function getDeviceId() {
        return $this->device_id;
    }

    /**
     * @param string $device_id
     */
    public function setDeviceId($device_id) {
        $this->device_id = $device_id;
    }

    /**
     * @return string
     */
    public function getAdvertisingId() {
        return $this->advertising_id;
    }

    /**
     * @param string $advertising_id
     */
    public function setAdvertisingId($advertising_id) {
        $this->advertising_id = $advertising_id;
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
     * @return string
     */
    public function getNotificationAction() {
        return $this->notification_action;
    }

    /**
     * @param string $notification_action
     */
    public function setNotificationAction($notification_action) {
        $this->notification_action = $notification_action;
    }

    /**
     * @return BaseLocation
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * @param BaseLocation $location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getAppPlatform() {
        return $this->app_platform;
    }

    /**
     * @param string $app_platform
     */
    public function setAppPlatform($app_platform) {
        $this->app_platform = $app_platform;
    }

    /**
     * @return string
     */
    public function getAppVersion() {
        return $this->app_version;
    }

    /**
     * @param string $app_version
     */
    public function setAppVersion($app_version) {
        $this->app_version = $app_version;
    }
}