<?php

namespace MySocialApp\Models;

use MySocialApp\Services\Session;

/**
 * Class JSONable
 * @package MySocialApp\Models
 */
class JSONable {

    /**
     * @var Session
     */
    protected $_session;

    /**
     * @param JSONableArray|JSONableMap|JSONable $jsonAble
     * @return array|JSONable|null
     */
    protected function arrayFrom($jsonAble) {
        if ($jsonAble !== null) {
            if ($jsonAble instanceof JSONableArray) {
                return $jsonAble->getArray();
            } else if ($jsonAble instanceof JSONableMap) {
                return $jsonAble->getMap();
            }
            return $jsonAble;
        }
        return null;
    }

    /**
     * @param $json array
     * @param $session Session
     * @return $this JSONable or maybe null
     */
    public function initWith($json, $session = null) {
        $c = get_class($this);
        $this->_session = $session;
        foreach ($json as $key => $value) {
            if (property_exists($c, $key)) {
                $className = null;
                try {
                    if (($comment = (new \ReflectionClass($this))->getProperty($key)->getDocComment()) !== null) {
                        $comment = substr($comment, 3, -2);
                        $re = '/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m';
                        if (preg_match_all($re, $comment, $matches)) {
                            $numMatches = count($matches[0]);
                            for ($i = 0; $i < $numMatches; ++$i) {
                                if ($matches['name'][$i] == "var") {
                                    $className = $matches['value'][$i];
                                    break;
                                }
                            }
                        }
                    }
                } catch (\ReflectionException $e) {
                    // noop
                }

                if ($className !== null) {
                    $p = substr($className, 0, 1);
                    if (($p == "\\" || ctype_upper($p)) && ($o = JSONable::getInstanceFromClassName($className))) {
                        if ($o instanceof JSONable) {
                            $this->$key = $o->initWith($value, $this->_session);
                        } else if ($o instanceof \DateTime) {
                            $this->$key = \DateTime::createFromFormat(DATE_ATOM, $value);
                        }
                    } else {
                        $this->$key = $value;
                    }
                } else {
                    $this->$key = $value;
                }
            }
        }
        return $this;
    }

    /**
     * @return string The JSON representation of this JSONable
     */
    public function toJSON() {
        $json = "{";
        $sep = "";
        foreach (get_object_vars($this) as $key => $value) {
            if ($value !== null && $key[0] != '_') {
                $json .= $sep.json_encode($key).":".JSONable::getJSON($value);
                $sep = ",";
            }
        }
        return "${json}}";
    }

    public function __toString() {
        return json_encode(json_decode($this->toJSON()), JSON_PRETTY_PRINT);
    }

    public static function getInstanceFromClassName($className) {
        if ($className !== null) {
            $p = substr($className, 0, 1);
            if ($p == "\\" || ctype_upper($p)) {
                $subtype = null;
                if (($from = strpos($className, "<")) !== false && ($to = strrpos($className, ">")) !== false) {
                    $subtype = substr($className, $from + 1, $to - $from - 1);
                    $className = substr($className, 0, $from);
                }
                if ($o = new $className()) {
                    if ($subtype !== null) {
                        if ($o instanceof JSONableArray) {
                            return $o->ofClass($subtype);
                        } else if ($o instanceof JSONableMap) {
                            return $o->ofClass($subtype);
                        }
                    }
                    if ($o instanceof JSONable) {
                        return $o;
                    }
                    return $o;
                }
            }
        }
        return null;
    }

    public static function fromJSON($value, $className, $session = null) {
        $o = JSONable::getInstanceFromClassName($className);
        if ($o === null) {
            return $value;
        } else if ($o instanceof JSONable) {
            return $o->initWith($value, $session);
        } else if ($o instanceof \DateTime) {
            return \DateTime::createFromFormat(DATE_ATOM, $value);
        } else {
            return $o;
        }
    }

    public static function getJSON($o) {
        if ($o === null) {
            return "null";
        } else if ($o instanceof JSONable) {
            return $o->toJSON();
        } else if ($o instanceof \DateTime) {
            $o->setTimezone(new \DateTimeZone('UTC'));
            return json_encode($o->format('Y-m-d\TH:i:s\Z'));
        }
        return json_encode($o);
    }
}