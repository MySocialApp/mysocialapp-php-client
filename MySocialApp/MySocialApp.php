<?php

namespace MySocialApp;

use MySocialApp\Models\AuthenticationToken;
use MySocialApp\Models\Error;
use MySocialApp\Models\Login;
use MySocialApp\Models\User;
use MySocialApp\MySocialApp\Builder;
use MySocialApp\Repositories\RestAccount;
use MySocialApp\Repositories\RestLogin;
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
     * @return RestLogin
     */
    protected function getLogin() {
        return $this->login ?: ($this->login = new RestLogin(null, $this->configuration));
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
     * @param $username string
     * @param $email string
     * @param $password string
     * @param $firstName string
     * @return Session|Error
     */
    public function createAccount($username, $email, $password, $firstName = null) {
        $user = new User($username, $email, $password, $firstName);
        if (($user = $this->getAccount()->create($user)) && $user instanceof User) {
            return $this->connect($email, $password);
        } else if ($user instanceof Error) {
            return $user;
        }
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
     * @param $username string
     * @param $password string
     * @param $accessToken null|string
     * @return Session|Error
     */
    public function connect($username, $password, $accessToken = null) {
        if ($accessToken !== null) {
            return new Session($this->configuration, $this->clientConfiguration, new AuthenticationToken(null, $accessToken));
        }
        $login = new Login($username, $password);
        if (($login = $this->getLogin()->login($login)) && $login instanceof Login) {
            return new Session($this->configuration, $this->clientConfiguration, new AuthenticationToken($username, $login->getAccessToken()));
        } else if ($login instanceof Error) {
            return $login;
        }
    }
}