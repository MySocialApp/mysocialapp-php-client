<?php

namespace MySocialApp\Models\Fluent;

use MySocialApp\Models\JSONableArray;
use MySocialApp\Models\Login;
use MySocialApp\Models\User;
use MySocialApp\Services\Session;

/**
 * Class FluentAccount
 * @package MySocialApp\Models\Fluent
 */
class FluentAccount {
    /**
     * @var Session
     */
    protected $_session;

    public function __construct($session) {
        $this->_session = $session;
    }

    /**
     * @return \MySocialApp\Models\Error|\MySocialApp\Models\User
     */
    public function get() {
        return $this->_session->getClientService()->getAccount()->get();
    }

    /**
     * Caution: your account will be completely erased and no more available.
     * This method delete all your data that belongs to this account.!!
     * @param $password string
     * @return \MySocialApp\Models\Error|null
     */
    public function requestForDeleteAccount($password) {
        return $this->_session->getClientService()->getLogin()->deleteAccount(new Login("", $password));
    }

    /**
     * @return array
     */
    public function getAvailableCustomFields() {
        $a = $this->_session->getClientService()->getCustomField()->listFor(new User());
        if ($a instanceof JSONableArray) {
            return $a->getArray();
        }
        return $a;
    }

    /**
     * @param $image mixed content of the file to upload
     * @return \MySocialApp\Models\Photo|null
     */
    public function changeProfilePhoto($image) {
        return $this->_session->getClientService()->getPhoto()->postPhotoForAccount($image, false, null);
    }

    /**
     * @param $image mixed content of the file to upload
     * @return \MySocialApp\Models\Photo|null
     */
    public function changeProfileCoverPhoto($image) {
        return $this->_session->getClientService()->getPhoto()->postPhotoForAccount($image, true, null);
    }
}