<?php

namespace MySocialApp;


use MySocialApp\Services\ClientConfiguration;

/**
 * Class MySocialAppBuilder
 * @package MySocialApp
 */
class MySocialAppBuilder {
    /**
     * @var string
     */
    protected $appId;
    /**
     * @var string
     */
    protected $apiEndpointURL;
    /**
     * @var ClientConfiguration
     */
    protected $clientConfiguration;

    public function getAppId() {
        return $this->appId;
    }

    /**
     * @param $appId string
     * @return MySocialAppBuilder
     */
    public function setAppId($appId) {
        $this->appId = $appId;
        return $this;
    }

    public function getAPIEndpointURL() {
        return $this->apiEndpointURL;
    }

    /**
     * @param $apiEndpointURL string
     * @return MySocialAppBuilder
     */
    public function setAPIEndpointURL($apiEndpointURL) {
        $this->apiEndpointURL = $apiEndpointURL;
        return $this;
    }

    public function getClientConfiguration() {
        return $this->clientConfiguration;
    }

    /**
     * @param $clientConfiguration ClientConfiguration
     * @return MySocialAppBuilder
     */
    public function setClientConfiguration($clientConfiguration) {
        $this->clientConfiguration = $clientConfiguration;
        return $this;
    }
    /**
     * @return MySocialApp
     */
    public function build() {
        if ($this->clientConfiguration === null) {
            $this->clientConfiguration = new ClientConfiguration();
        }
        return new MySocialApp($this);
    }
}