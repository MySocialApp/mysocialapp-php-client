<?php

namespace MySocialApp\Models;


class Error extends JSONable {
    /**
     * @var \DateTime
     */
    protected $timestamp;
    /**
     * @var int
     */
    protected $status;
    /**
     * @var string
     */
    protected $error;
    /**
     * @var string
     */
    protected $exception;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var string
     */
    protected $path;

    /**
     * @return \DateTime
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     */
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getError() {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error) {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getException() {
        return $this->exception;
    }

    /**
     * @param string $exception
     */
    public function setException($exception) {
        $this->exception = $exception;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path) {
        $this->path = $path;
    }
}