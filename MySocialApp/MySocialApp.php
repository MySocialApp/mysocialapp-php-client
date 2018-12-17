<?php

namespace MySocialApp;

use MySocialApp\Models\AuthenticationToken;
use MySocialApp\Models\Error;
use MySocialApp\Models\Login;
use MySocialApp\Models\Reset;
use MySocialApp\Models\User;
use MySocialApp\Repositories\RestAccount;
use MySocialApp\Repositories\RestLogin;
use MySocialApp\Repositories\RestReset;
use MySocialApp\Services\ClientConfiguration;
use MySocialApp\Services\Configuration;
use MySocialApp\Services\Session;

/**
 * Class MySocialApp
 * @package MySocialApp
 */
class MySocialApp {
    /**
     * @var Configuration
     */
    protected $configuration;
    /**
     * @var ClientConfiguration
     */
    protected $clientConfiguration;

    /**
     * @var RestLogin
     */
    protected $login;

    /**
     * @var RestReset
     */
    protected $reset;

    /**
     * @return RestLogin
     */
    protected function getLogin() {
        return $this->login ?: ($this->login = new RestLogin(null, $this->configuration));
    }

    /**
     * @return RestReset
     */
    protected function getReset() {
        return $this->reset ?: ($this->reset = new RestReset(null, $this->configuration));
    }

    /**
     * @var RestAccount
     */
    protected $account;

    protected function getAccount() {
        return $this->account ?: ($this->account = new RestAccount(null, $this->configuration));
    }

    /**
     * MySocialApp constructor.
     * @param $builder MySocialAppBuilder
     */
    public function __construct($builder) {
        date_default_timezone_set(@date_default_timezone_get());
        $this->configuration = new Configuration($builder->getAppId(), $builder->getApiEndpointURL());
        $this->clientConfiguration = $builder->getClientConfiguration();
    }

    /**
     * @param $email string
     * @param $password string
     * @param $firstName string
     * @return Session|Error
     */
    public function createAccount($email, $password, $firstName = null) {
        $user = new User($email, $email, $password, $firstName);
        if (($user = $this->getAccount()->create($user)) && $user instanceof User) {
            return $this->connect($email, $password);
        }
        return $user;
    }

    /**
     * @param $email string
     * @param $password string
     * @return Session|Error
     */
    public function connectByEmail($email, $password) {
        return $this->connect($email, $password);
    }

    /**
     * @param string $token
     * @return Error|Session
     */
    public function connectByToken($token) {
        return $this->connect(null, null, $token);
    }

    /**
     * @param $email null|string
     * @param $password null|string
     * @param $accessToken null|string
     * @return Session|Error
     */
    public function connect($email, $password, $accessToken = null) {
        if ($accessToken !== null) {
            return new Session($this->configuration, $this->clientConfiguration, new AuthenticationToken(null, $accessToken));
        }
        $login = new Login($email, $password);
        if (($login = $this->getLogin()->login($login)) && $login instanceof Login) {
            return new Session($this->configuration, $this->clientConfiguration, new AuthenticationToken($login->getUsername(), $login->getAccessToken()));
        }
        return $login;
    }

    /**
     * @param string $email
     * @return Reset|Error
     */
    public function resetPasswordByEmail($email) {
        $r = new Reset();
        $r->setEmail($email);
        return $this->getReset()->post($r);
    }

    /**
     * @param string $username
     * @return Reset|Error
     */
    public function resetPassword($username) {
        $r = new Reset();
        $r->setUsername($username);
        return $this->getReset()->post($r);
    }
}