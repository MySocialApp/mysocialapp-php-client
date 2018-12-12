<?php

namespace MySocialApp\Models;

/**
 * Class CustomField
 * @package MySocialApp\Models
 */
class CustomField extends Base {
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
        if (is_bool($this->data->getValue())) {
            return $this->data->getValue();
        }
        return $this->data->getValue();
    }

    /**
     * @return \DateTime|null
     */
    public function getDateValue() {
        if ($this->data->getValue() instanceof \DateTime) {
            return $this->data->getValue();
        }
        return $this->data->getValue();
    }

    /**
     * @return array|null
     */
    public function getStringValues() {
        if (is_array($this->data->getValue())) {
            return $this->data->getValue();
        }
        return $this->data->getValue();
    }

    /**
     * @return string|null
     */
    public function getStringValue() {
        if (is_string($this->data->getValue())) {
            return $this->data->getValue();
        }
        return $this->data->getValue();
    }

    /**
     * @return double|null
     */
    public function getDoubleValue() {
        if (is_double($this->data->getValue())) {
            return $this->data->getValue();
        }
        return $this->data->getValue();
    }

    /**
     * @return \MySocialApp\Models\Location|null
     */
    public function getLocationValue() {
        if ($this->data->getValue() instanceof Location) {
            return $this->data->getValue();
        }
        if (is_object($this->data->getValue()) || is_array($this->data->getValue())) {
            return (new Location())->initWith($this->data->getValue());
        }
        return $this->data->getValue();
    }
}