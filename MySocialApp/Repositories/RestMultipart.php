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
            if ($d->getName() !== null) {
                $content .= "; name=\"" . $d->getName() . "\"";
            }
            if ($d->getFileName() !== null) {
                $content .= "; filename=\"" . $d->getFileName() . "\"";
            }
            $content .= "\r\n";
            if ($d->getMimeType() !== null) {
                $content .= "Content-Type: " . $d->getMimeType() ."\r\n";
            }
            if ($d->getFileName() !== null) {
                $content .= "Content-Transfer-Encoding: binary\r\n";
            }
            $content .= "\r\n";
            if ($d->getContent() instanceof JSONable) {
                $content .= $d->getContent()->toJSON() . "\r\n";
            } else if ($d->getContent() instanceof \DateTime) {
                $content .= \DateTime::createFromFormat(DATE_ATOM, $d->getContent()) . "\r\n";
            } else if (is_object($d->getContent()) || is_array($d->getContent())) {
                $content .= json_encode($d->getContent()) . "\r\n";
            } else {
                $content .= $d->getContent() . "\r\n";
            }
        }
        $content .= "--" . $boundary . "--\r\n";
        return $content;
    }
}
