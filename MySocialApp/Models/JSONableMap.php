<?php

namespace MySocialApp\Models;

/**
 * Class JSONableMap
 * @package MySocialApp\Models
 */
class JSONableMap extends JSONable {
    /**
     * @var string
     */
    private $class;
    /**
     * @var array
     */
    private $map;

    public function ofClass($class) {
        $this->class = $class;
        return $this;
    }

    public function initWith($json, $session = null) {
        $this->map = array();
        $this->_session = $session;
        foreach ($json as $key => $value) {
            if ($key !== null && $value !== null) {
                if ($this->class === null) {
                    $this->map[$key] = $value;
                } else {
                    $this->map[$key] = JSONable::fromJSON($value, $this->class, $this->_session);
                }
            }
        }
        return $this;
    }

    public function toJSON() {
        $json = "";
        $sep = "{";
        foreach ($this->map as $key => $value) {
            $json .= $sep.JSONable::getJSON($key).":".JSONable::getJSON($value);
            $sep = ",";
        }
        return "${json}}";
    }

    /**
     * @return array
     */
    public function getMap() {
        return $this->map;
    }

    /**
     * @param array $map
     */
    public function setMap($map) {
        $this->map = $map;
        return $this;
    }
}