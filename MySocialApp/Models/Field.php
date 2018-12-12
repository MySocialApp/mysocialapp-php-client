<?php

namespace MySocialApp\Models;

define("MSA_FIELD_TYPE_INPUT_TEXT", "INPUT_TEXT");
define("MSA_FIELD_TYPE_INPUT_TEXTAREA", "INPUT_TEXTAREA");
define("MSA_FIELD_TYPE_INPUT_NUMBER", "INPUT_NUMBER");
define("MSA_FIELD_TYPE_INPUT_BOOLEAN", "INPUT_BOOLEAN");
define("MSA_FIELD_TYPE_INPUT_DATE", "INPUT_DATE");
define("MSA_FIELD_TYPE_INPUT_DATETIME", "INPUT_DATETIME");
define("MSA_FIELD_TYPE_INPUT_TIME", "INPUT_TIME");
define("MSA_FIELD_TYPE_INPUT_URL", "INPUT_URL");
define("MSA_FIELD_TYPE_INPUT_EMAIL", "INPUT_EMAIL");
define("MSA_FIELD_TYPE_INPUT_PHONE", "INPUT_PHONE");
define("MSA_FIELD_TYPE_INPUT_LOCATION", "INPUT_LOCATION");
define("MSA_FIELD_TYPE_INPUT_SELECT", "INPUT_SELECT");
define("MSA_FIELD_TYPE_INPUT_CHECKBOXT", "INPUT_CHECKBOX");

/**
 * Class Field
 * @package MySocialApp\Models
 */
class Field extends Base {
    /**
     * @var string
     */
    protected $field_type;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var bool
     */
    protected $important;

    /**
     * @var int
     */
    protected $default_value;

    /**
     * @var \MySocialApp\Models\JSONableMap<string>
     */
    protected $labels;

    /**
     * @var \MySocialApp\Models\JSONableMap<string>
     */
    protected $descriptions;

    /**
     * @var \MySocialApp\Models\JSONableMap<string>
     */
    protected $placeholders;

    /**
     * @var \MySocialApp\Models\JSONableMap<\MySocialApp\Models\JSONableArray<string>>
     */
    protected $values;

    /**
     * @return string
     */
    public function getFieldType() {
        return $this->field_type;
    }

    /**
     * @param string $field_type
     */
    public function setFieldType($field_type) {
        $this->field_type = $field_type;
    }

    /**
     * @return int
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position) {
        $this->position = $position;
    }

    /**
     * @return bool
     */
    public function isImportant() {
        return $this->important;
    }

    /**
     * @param bool $important
     */
    public function setImportant($important) {
        $this->important = $important;
    }

    /**
     * @return int
     */
    public function getDefaultValue() {
        return $this->default_value;
    }

    /**
     * @param int $default_value
     */
    public function setDefaultValue($default_value) {
        $this->default_value = $default_value;
    }

    /**
     * @return array
     */
    public function getLabels() {
        if ($this->labels !== null) {
            return $this->labels->getMap();
        }
        return $this->labels;
    }

    /**
     * @return array
     */
    public function getDescriptions() {
        if ($this->descriptions !== null) {
            return $this->descriptions->getMap();
        }
        return $this->descriptions;
    }

    /**
     * @return array
     */
    public function getPlaceholders() {
        if ($this->placeholders !== null) {
            return $this->placeholders->getMap();
        }
        return $this->placeholders;
    }

    /**
     * @return array
     */
    public function getValues() {
        if ($this->values !== null) {
            $a = array();
            foreach ($this->values as $k => $v) {
                if ($v instanceof JSONableArray) {
                    $a[$k] = $v->getArray();
                }
            }
            return $a;
        }
        return $this->values;
    }

    /**
     * @param string $forValue
     * @return int|null
     */
    public function getValueIndex($forValue) {
        if ($this->values !== null) {
            foreach($this->values as $v) {
                if ($v instanceof JSONableArray) {
                    $i = 0;
                    $a = $v->getArray();
                    while ($i < count($a)) {
                        if (strcmp($a[$i], $forValue) === 0) {
                            return $i;
                        }
                        $i++;
                    }
                }
            }
        }
        return null;
    }

    /**
     * @param string $forValue
     * @param string $locale
     * @return string|null
     */
    public function getLocalizedValue($forValue, $locale) {
        if ($this->values !== null) {
            foreach($this->values->getMap() as $v) {
                if ($v instanceof JSONableArray) {
                    $i = 0;
                    $a = $v->getArray();
                    while ($i < count($a)) {
                        if (strcmp($a[$i], $forValue) === 0) {
                            $m = $this->values->getMap();
                            $m = $m[$locale];
                            $m = $m->getArray();
                            return $m[$i];
                        }
                        $i++;
                    }
                }
            }
        }
        return null;
    }
}