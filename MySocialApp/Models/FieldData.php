<?php

namespace MySocialApp\Models;

/**
 * Class FieldData
 * @package MySocialApp\Models
 */
class FieldData extends Base {
    /**
     * @var int
     */
    protected $field_id;

    /**
     * @var string
     */
    protected $field_id_str;

    protected $value;

    /**
     * @return int
     */
    public function getFieldId() {
        return $this->field_id;
    }

    /**
     * @param int $field_id
     */
    public function setFieldId($field_id) {
        $this->field_id = $field_id;
    }

    /**
     * @return string
     */
    public function getFieldIdStr() {
        return $this->field_id_str;
    }

    /**
     * @param string $field_id_str
     */
    public function setFieldIdStr($field_id_str) {
        $this->field_id_str = $field_id_str;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value) {
        $this->value = $value;
    }
}