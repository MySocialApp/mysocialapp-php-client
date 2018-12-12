<?php

namespace MySocialApp\Models;

/**
 * Class JSONableArray
 * @package MySocialApp\Models
 */
class JSONableArray extends JSONable {
    /**
     * @var string
     */
    private $class;
    /**
     * @var array
     */
    private $array;

    public static function createWith($array, $forClass, $withSession) {
        return (new JSONableArray())->ofClass($forClass)->initWith(array(),$withSession)->setArray($array);
    }

    public function ofClass($class) {
        $this->class = $class;
        return $this;
    }

    public function initWith($json, $session = null) {
        $this->array = array();
        $this->_session = $session;
        if (isset($json["total"])) {
            foreach ($json as $key => $value) {
                if ($key != "total") {
                    $json = $value;
                    break;
                }
            }
        }
        foreach ($json as $value) {
            if ($value !== null) {
                if ($this->class === null) {
                    $this->array[] = $value;
                } else {
                    $this->array[] = JSONable::fromJSON($value, $this->class, $this->_session);
                }
            }
        }
        return $this;
    }

    public function toJSON() {
        $json = "";
        $sep = "[";
        foreach ($this->array as $value) {
            $json .= $sep.JSONable::getJSON($value);
            $sep = ",";
        }
        return "${json}]";
    }

    /**
     * @return array
     */
    public function getArray() {
        return $this->array;
    }

    /**
     * @param array $array
     * @return JSONableArray
     */
    public function setArray($array) {
        $this->array = $array;
        return $this;
    }

    /**
     * @param $subType string
     * @return string
     */
    public static function classOf($subType) {
        return JSONableArray::class."<".$subType.">";
    }
}