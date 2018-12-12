<?php

namespace MySocialApp\Repositories;

use http\Exception\UnexpectedValueException;
use MySocialApp\Models\Error;
use MySocialApp\Models\JSONable;
use MySocialApp\Services\Configuration;
use MySocialApp\Services\Session;

/**
 * Class RestBase
 * @package MySocialApp\Repositories
 */
class RestBase {

    const _GET = "GET";
    const _POST = "POST";
    const _PUT = "PUT";
    const _DELETE = "DELETE";

    /**
     * @var Session
     */
    protected $session;
    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * @return string the API base URL for this instance
     */
    public function apiURL() {
        if ($this->session !== null && $this->session->getConfiguration() !== null && $this->session->getConfiguration()->apiURL() !== null) {
            return $this->session->getConfiguration()->apiURL();
        } else if ($this->configuration !== null && $this->configuration->apiURL() !== null) {
            return $this->configuration->apiURL();
        } else {
            return "{noRootUrl}";
        }
    }

    private function getUrlEncoded($d) {
        if ($d instanceof JSONable) {
            return urlencode($d->toJSON());
        } else if ($d instanceof \DateTime) {
            return urlencode(\DateTime::createFromFormat(DATE_ATOM, $d));
        } else if (is_object($d) || is_array($d)) {
            return urlencode(json_encode($d));
        } else {
            return urlencode($d);
        }
    }

    protected function url($base, $parameters) {
        $url = $base;
        $sep = "?";
        foreach($parameters as $k => $v) {
            $url .= $sep.$this->getUrlEncoded($k)."=".$this->getUrlEncoded($v);
            $sep = "&";
        }
        return $url;
    }

    /**
     * RestBase constructor.
     * @param $session Session
     * @param $configuration Configuration
     */
    public function __construct($session, $configuration = null) {
        $this->session = $session;
        $this->configuration = $configuration;
    }

    /**
     * @param $method string can be GET, POST, PUT, DELETE
     * @param $url string the relative URL to call on the API backend
     * @param $inputData object can be a JSONable, a string, or a simple object or array
     * @param $outputClass null|string if present, specify the output class expected to be sent back by the API backend. The class must extend JSONable.
     * @param $contentType string
     * @return JSONable|null
     */
    public function restRequest($method, $url, $inputData, $outputClass, $contentType = "application/json") {
        $data = $inputData;
        if ($data instanceof JSONable) {
            $data = $data->toJSON();
        } else if ($data instanceof RestMultipart) {
            $boundary = '--------------------------'.microtime(true);
            $data = $data->getContent($boundary);
            $contentType = "multipart/form-data; boundary=".$boundary;
        } else if (is_object($data) || is_array($data)) {
            $data = json_encode($data);
        } else if ($data != null && !is_string($data)) {
            throw new UnexpectedValueException("Invalid input data type");
        }
        $header = "";
        if ($this->session !== null
            && $this->session->getAuthenticationToken() != null
            && ($token = $this->session->getAuthenticationToken()->getAccessToken()) !== null) {
            $header .= "Authorization: ${token}\r\n";
        }
        $header .= "User-Agent: MySocialApp/PHP\r\n";
        if ($data !== null && ($len = strlen($data)) > 0) {
            $header .= "Content-Length: ${len}\r\n";
        }
        $header .= "Content-Type: ${contentType}\r\n";
        $context = array(
            'http' => array(
                'method'    =>  $method,
                'header'    =>  $header,
                "ignore_errors" => true,
                'content'   =>  $data
            )
        );
        $context = stream_context_create($context);
        $url = $this->apiURL().$url;
        if ($this->isDebug()) {
            echo json_encode(array("method"=>$method, "url"=>$url, "header"=>$header, "content"=>$data), JSON_PRETTY_PRINT).PHP_EOL;
        }
        $c = file_get_contents($url, false, $context);
        if (is_array($http_response_header) && $this->isDebug()) {
            echo json_encode($http_response_header, JSON_PRETTY_PRINT).PHP_EOL;
            echo $c.PHP_EOL.PHP_EOL;
        }
        if (isset($http_response_header[0]) && ($res = $http_response_header[0])) {
            if (strpos($res, "HTTP/1.1 2") !== false) {
                if ($c !== null && strlen($c) > 0 && $outputClass !== null && ($o = JSONable::getInstanceFromClassName($outputClass)) !== null) {
                    $o = $o->initWith(json_decode($c, true), $this->session);
                    return $o;
                }
            } else {
                if (strpos($c, "{") === 0) {
                    return (new Error())->initWith(json_decode($c, true), $this->session);
                } else {
                    return (new Error())->initWith(array("message"=>$c), $this->session);
                }
            }
        }
        return null;
    }

    private function isDebug() {
        return $this->session != null && $this->session->getClientConfiguration() != null && $this->session->getClientConfiguration()->isDebug();
    }
}
