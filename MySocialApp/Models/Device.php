<?php

namespace MySocialApp\Models;

define("MSA_DEVICE_IOS", "IOS");

/**
 * Class Device
 * @package MySocialApp\Models
 */
class Device extends JSONable {

    /**
     * @var string
     */
    protected $app_platform;

    /**
     * @var string
     */
    protected $push_key;

    /**
     * @var string
     */
    protected $device_id;

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
    public function getPushKey() {
        return $this->push_key;
    }

    /**
     * @param string $push_key
     */
    public function setPushKey($push_key) {
        $this->push_key = $push_key;
    }

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
     * Device constructor.
     * @param string $pushKey
     * @param string $deviceId
     * @param string $appPlatform
     */
    public function __construct($pushKey, $deviceId, $appPlatform = MSA_DEVICE_IOS) {
        $this->push_key = $pushKey;
        $this->device_id = $deviceId;
        $this->app_platform = $appPlatform;
    }
}