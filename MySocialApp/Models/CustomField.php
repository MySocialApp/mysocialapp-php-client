<?php

namespace MySocialApp\Models;

/**
 * Class CustomField
 * @package MySocialApp\Models
 */
class CustomField extends Base {
    const _INPUT_TEXT = "INPUT_TEXT";
    const _INPUT_TEXTAREA = "INPUT_TEXTAREA";
    const _INPUT_NUMBER = "INPUT_NUMBER";
    const _INPUT_BOOLEAN = "INPUT_BOOLEAN";
    const _INPUT_DATE = "INPUT_DATE";
    const _INPUT_URL = "INPUT_URL";
    const _INPUT_EMAIL = "INPUT_EMAIL";
    const _INPUT_PHONE = "INPUT_PHONE";
    const _INPUT_LOCATION = "INPUT_LOCATION";
    const _INPUT_SELECT = "INPUT_SELECT";
    const _INPUT_CHECKBOX = "INPUT_CHECKBOX";

    /**
     * @var \MySocialApp\Models\Field
     */
    protected $field;

    /**
     * @var \MySocialApp\Models\FieldData
     */
    protected $data;

    /**
     * @return Field
     */
    public function getField() {
        return $this->field;
    }

    /**
     * @param Field $field
     */
    public function setField($field) {
        $this->field = $field;
    }

    /**
     * @return FieldData
     */
    public function getData() {
        if ($this->data === null) {
            $d = new FieldData();
            if ($this->field !== null) {
                $d->setFieldId($this->field->getId());
                $d->setFieldIdStr($this->field->getIdStr());
            }
            $this->data = $d;
        }
        return $this->data;
    }

    /**
     * @param FieldData $field_data
     */
    public function setData($field_data) {
        $this->data = $field_data;
    }

    public function getFieldType() {
        return $this->field->getFieldType();
    }

    public function getLabel($locale) {
        return ($this->field->getLabels())[$locale];
    }

    public function getDescription($locale) {
        return ($this->field->getDescriptions())[$locale];
    }

    public function getPlaceholder($locale) {
        return ($this->field->getPlaceholders())[$locale];
    }

    public function getPossibleValues($locale) {
        return ($this->field->getValues())[$locale];
    }

    /**
     * @return bool|null
     */
    public function getBoolValue() {
        if (is_bool($this->getData()->getValue())) {
            return $this->getData()->getValue();
        }
        return $this->getData()->getValue();
    }

    /**
     * @return \DateTime|null
     */
    public function getDateValue() {
        if ($this->getData()->getValue() instanceof \DateTime) {
            return $this->getData()->getValue();
        }
        return $this->getData()->getValue();
    }

    /**
     * @return array|null
     */
    public function getStringValues() {
        if (is_array($this->getData()->getValue())) {
            return $this->getData()->getValue();
        }
        return $this->getData()->getValue();
    }

    /**
     * @return string|null
     */
    public function getStringValue() {
        if (is_string($this->getData()->getValue())) {
            return $this->getData()->getValue();
        }
        return $this->getData()->getValue();
    }

    /**
     * @return double|null
     */
    public function getDoubleValue() {
        if (is_double($this->getData()->getValue())) {
            return $this->getData()->getValue();
        }
        return $this->getData()->getValue();
    }

    /**
     * @return \MySocialApp\Models\Location|null
     */
    public function getLocationValue() {
        if ($this->getData()->getValue() instanceof Location) {
            return $this->getData()->getValue();
        }
        if (is_object($this->getData()->getValue()) || is_array($this->getData()->getValue())) {
            return (new Location())->initWith($this->getData()->getValue());
        }
        return $this->getData()->getValue();
    }

    /**
     * @param mixed $value
     */
    public function setValue($value) {
        $this->getData()->setValue($value);
    }
}