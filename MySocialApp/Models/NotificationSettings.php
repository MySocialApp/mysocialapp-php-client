<?php

namespace MySocialApp\Models;

/**
 * Class NotificationSettings
 * @package MySocialApp\Models
 */
class NotificationSettings extends JSONable {
    /**
     * @var bool
     */
    protected $enabled;
    /**
     * @var bool
     */
    protected $push_enabled;
    /**
     * @var bool
     */
    protected $mail_enabled;
    /**
     * @var bool
     */
    protected $mail_frequency;
    /**
     * @var bool
     */
    protected $event_enabled;
    /**
     * @var bool
     */
    protected $maximum_distance;
    /**
     * @var bool
     */
    protected $mention_enabled;
    /**
     * @var bool
     */
    protected $messaging_enabled;
    /**
     * @var bool
     */
    protected $comment_enabled;
    /**
     * @var bool
     */
    protected $like_enabled;
    /**
     * @var bool
     */
    protected $offer_enabled;
    /**
     * @var bool
     */
    protected $sound_enabled;
    /**
     * @var bool
     */
    protected $newsletter_enabled;

    /**
     * @return bool
     */
    public function isEnabled() {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled) {
        $this->enabled = $enabled;
    }

    /**
     * @return bool
     */
    public function isPushEnabled() {
        return $this->push_enabled;
    }

    /**
     * @param bool $push_enabled
     */
    public function setPushEnabled($push_enabled) {
        $this->push_enabled = $push_enabled;
    }

    /**
     * @return bool
     */
    public function isMailEnabled() {
        return $this->mail_enabled;
    }

    /**
     * @param bool $mail_enabled
     */
    public function setMailEnabled($mail_enabled) {
        $this->mail_enabled = $mail_enabled;
    }

    /**
     * @return bool
     */
    public function isMailFrequency() {
        return $this->mail_frequency;
    }

    /**
     * @param bool $mail_frequency
     */
    public function setMailFrequency($mail_frequency) {
        $this->mail_frequency = $mail_frequency;
    }

    /**
     * @return bool
     */
    public function isEventEnabled() {
        return $this->event_enabled;
    }

    /**
     * @param bool $event_enabled
     */
    public function setEventEnabled($event_enabled) {
        $this->event_enabled = $event_enabled;
    }

    /**
     * @return bool
     */
    public function isMaximumDistance() {
        return $this->maximum_distance;
    }

    /**
     * @param bool $maximum_distance
     */
    public function setMaximumDistance($maximum_distance) {
        $this->maximum_distance = $maximum_distance;
    }

    /**
     * @return bool
     */
    public function isMentionEnabled() {
        return $this->mention_enabled;
    }

    /**
     * @param bool $mention_enabled
     */
    public function setMentionEnabled($mention_enabled) {
        $this->mention_enabled = $mention_enabled;
    }

    /**
     * @return bool
     */
    public function isMessagingEnabled() {
        return $this->messaging_enabled;
    }

    /**
     * @param bool $messaging_enabled
     */
    public function setMessagingEnabled($messaging_enabled) {
        $this->messaging_enabled = $messaging_enabled;
    }

    /**
     * @return bool
     */
    public function isCommentEnabled() {
        return $this->comment_enabled;
    }

    /**
     * @param bool $comment_enabled
     */
    public function setCommentEnabled($comment_enabled) {
        $this->comment_enabled = $comment_enabled;
    }

    /**
     * @return bool
     */
    public function isLikeEnabled() {
        return $this->like_enabled;
    }

    /**
     * @param bool $like_enabled
     */
    public function setLikeEnabled($like_enabled) {
        $this->like_enabled = $like_enabled;
    }

    /**
     * @return bool
     */
    public function isOfferEnabled() {
        return $this->offer_enabled;
    }

    /**
     * @param bool $offer_enabled
     */
    public function setOfferEnabled($offer_enabled) {
        $this->offer_enabled = $offer_enabled;
    }

    /**
     * @return bool
     */
    public function isSoundEnabled() {
        return $this->sound_enabled;
    }

    /**
     * @param bool $sound_enabled
     */
    public function setSoundEnabled($sound_enabled) {
        $this->sound_enabled = $sound_enabled;
    }

    /**
     * @return bool
     */
    public function isNewsletterEnabled() {
        return $this->newsletter_enabled;
    }

    /**
     * @param bool $newsletter_enabled
     */
    public function setNewsletterEnabled($newsletter_enabled) {
        $this->newsletter_enabled = $newsletter_enabled;
    }
}