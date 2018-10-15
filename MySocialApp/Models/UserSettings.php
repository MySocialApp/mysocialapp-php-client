<?php

namespace MySocialApp\Models;

/**
 * Class UserSettings
 * @package MySocialApp\Models
 */
class UserSettings extends JSONable {
    /**
     * @var bool
     */
    protected $stat_status_enabled;
    /**
     * @var \MySocialApp\Models\NotificationSettings
     */
    protected $notification;
    /**
     * @var string
     */
    protected $language_zone;
    /**
     * @var string
     */
    protected $interface_language;

    /**
     * @return bool
     */
    public function isStatStatusEnabled() {
        return $this->stat_status_enabled;
    }

    /**
     * @param bool $stat_status_enabled
     */
    public function setStatStatusEnabled($stat_status_enabled) {
        $this->stat_status_enabled = $stat_status_enabled;
    }

    /**
     * @return NotificationSettings
     */
    public function getNotification() {
        return $this->notification;
    }

    /**
     * @param NotificationSettings $notification
     */
    public function setNotification($notification) {
        $this->notification = $notification;
    }

    /**
     * @return string
     */
    public function getLanguageZone() {
        return $this->language_zone;
    }

    /**
     * @param string $language_zone
     */
    public function setLanguageZone($language_zone) {
        $this->language_zone = $language_zone;
    }

    /**
     * @return string
     */
    public function getInterfaceLanguage() {
        return $this->interface_language;
    }

    /**
     * @param string $interface_language
     */
    public function setInterfaceLanguage($interface_language) {
        $this->interface_language = $interface_language;
    }
}