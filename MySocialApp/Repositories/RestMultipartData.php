<?php
/**
 * Created by IntelliJ IDEA.
 * User: aurelien
 * Date: 09/12/2018
 * Time: 15:44
 */

namespace MySocialApp\Repositories;

/**
 * Class RestMultipartData
 * @package MySocialApp\Repositories
 */
class RestMultipartData {

    const _JPEG = "image/jpeg";
    const _MULTIPART = "multipart/form-data";
    const _JSON = "application/json";

    /**
     * @var string
     */
    protected $name = false;

    /**
     * @var string
     */
    protected $fileName = false;

    /**
     * @var string
     */
    protected $mimeType = false;

    /**
     * @var string
     */
    protected $content;

    public function __construct($name, $fileName, $mimeType, $content) {
        $this->name = $name;
        $this->fileName = $fileName;
        $this->mimeType = $mimeType;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFileName() {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getMimeType() {
        return $this->mimeType;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }
}