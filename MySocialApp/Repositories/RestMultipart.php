<?php

namespace MySocialApp\Repositories;

use MySocialApp\Models\JSONable;

/**
 * Class RestMultipart
 * @package MySocialApp\Repositories
 */
class RestMultipart {
    /**
    * @var array<RestMultipartData>
    */
    protected $data;

    /**
    * RestMultipart.php constructor.
    * @param $data array
    */
    public function __construct($data) {
        $this->data = $data;
    }

    public function addPart($data) {
        array_push($this->data, $data);
    }

    public function getContent($boundary) {
        $content = "";
        foreach ($this->data as $d) {
            $content .= "--" . $boundary . "\r\n";
            $content .= "Content-Disposition: form-data";
            if ($d->getName() !== false) {
                $content .= "; name=\"" . $d->getName() . "\"";
            }
            if ($d->getFileName() !== false) {
                $content .= "; filename=\"" . $d->getFileName() . "\"";
            }
            $content .= "\r\n";
            if ($d->getMimeType() !== false) {
                $content .= "Content-Type: " . $d->getMimeType() ."\r\n";
            }
            $content .= "\r\n";
            if ($d->getData() instanceof JSONable) {
                $content .= $d->getData()->toJSON() . "\r\n";
            } else if ($d->getData() instanceof \DateTime) {
                $content .= \DateTime::createFromFormat(DATE_ATOM, $d->getData()) . "\r\n";
            } else if (is_object($d->getData()) || is_array($d->getData())) {
                $content .= json_encode($d->getData()) . "\r\n";
            } else {
                $content .= $d->getData() . "\r\n";
            }
        }
        $content .= "--" . $boundary . "--\r\n";
        return $content;
    }
}
