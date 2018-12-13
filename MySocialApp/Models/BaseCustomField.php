<?php

namespace MySocialApp\Models;

/**
 * Class BaseCustomField
 * @package MySocialApp\Models
 */
class BaseCustomField extends Base {
    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\CustomField>
     */
    protected $custom_fields;

    /**
     * @param array $custom_fields
     */
    public function setCustomFields($custom_fields) {
        $this->custom_fields = JSONableArray::createWith($custom_fields, CustomField::class, $this->_session);
    }

    protected function customValueCount() {
        $i = 0;
        if ($this->getCustomFields() !== null) {
            foreach ($this->getCustomFields() as $f) {
                if ($f->getData()->getValue() !== null) {
                    $i++;
                }
            }
        }
        return $i;
    }

    /**
     * @return array|Error|null
     */
    public function getCustomFields() {
        if ($this->custom_fields === null) {
            $this->custom_fields = $this->_session->getClientService()->getCustomField()->listFor($this);
        }
        return $this->arrayFrom($this->custom_fields);
    }
}