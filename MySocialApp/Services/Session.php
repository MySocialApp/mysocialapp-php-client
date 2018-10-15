<?php

namespace MySocialApp\Services;

use MySocialApp\Models\AuthenticationToken;
use MySocialApp\Models\Fluent\FluentAccount;
use MySocialApp\Models\Fluent\FluentFeed;
use MySocialApp\Models\Fluent\FluentUser;

/**
 * Class Session
 * @package MySocialApp\Services
 */
class Session {
    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * @return Configuration
     */
    public function getConfiguration() {
        return $this->configuration;
    }

    /**
     * @var ClientConfiguration
     */
    protected $clientConfiguration;

    /**
     * @return ClientConfiguration
     */
    public function getClientConfiguration() {
        return $this->clientConfiguration;
    }

    /**
     * @var AuthenticationToken
     */
    protected $authenticationToken;

    /**
     * @return AuthenticationToken
     */
    public function getAuthenticationToken() {
        return $this->authenticationToken;
    }

    /**
     * @var ClientService
     */
    protected $clientService;

    /**
     * @return ClientService
     */
    public function getClientService() {
        return $this->clientService;
    }

    /**
     * @var FluentAccount
     */
    protected $account;

    /**
     * @return FluentAccount
     */
    public function getAccount() {
        return $this->account ?: ($this->account = new FluentAccount($this));
    }

    /**
     * @var FluentFeed
     */
    protected $feed;

    /**
     * @return FluentFeed
     */
    public function getFeed() {
        return $this->feed ?: ($this->feed = new FluentFeed($this));
    }

    /**
     * @var FluentUser
     */
    protected $user;

    /**
     * @return FluentUser
     */
    public function getUser() {
        return $this->user ?: ($this->user = new FluentUser($this));
    }

    /**
     * Session constructor.
     * @param $configuration Configuration
     * @param $clientConfiguration ClientConfiguration
     * @param $authenticationToken AuthenticationToken
     */
    public function __construct($configuration, $clientConfiguration, $authenticationToken) {
        $this->configuration = $configuration;
        $this->clientConfiguration = $clientConfiguration;
        $this->authenticationToken = $authenticationToken;
        $this->clientService = new ClientService($this);
    }

    public function disconnect() {
        $this->clientService->getLogin()->logout();
    }
}