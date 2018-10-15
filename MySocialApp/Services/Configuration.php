<?php

namespace MySocialApp\Services;

/**
 * Class Configuration
 * @package MySocialApp\Services
 */
class Configuration {
    /**
     * @var string
     */
    protected $appId;
    /**
     * @var string
     */
    protected $apiEndpointURL;

    public function apiURL() {
        if (($u = $this->apiEndpointURL) !== null) {
            return "${u}/api/v1";
        } else if (($a = $this->appId) !== null) {
            return "https://${a}-api.mysocialapp.io/api/v1";
        }
        return null;
    }

    /**
     * Configuration constructor.
     * @param $appId string
     * @param $apiEndpointURL string
     */
    public function __construct($appId, $apiEndpointURL) {
        $this->appId = $appId;
        $this->apiEndpointURL = $apiEndpointURL;
    }
}