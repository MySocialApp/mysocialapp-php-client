<?php

namespace MySocialApp\Models;

/**
 * Class PhotoAlbumBuilder
 * @package MySocialApp\Models
 */
class PhotoAlbumBuilder {
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $photos;

    /**
     * @param string $name
     * @return PhotoAlbumBuilder
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $photos
     * @return PhotoAlbumBuilder
     */
    public function setPhotos($photos) {
        $this->photos = $photos;
        return $this;
    }

    public function build() {
        $pa = new PhotoAlbum();
        $pa->setName($this->name);
        $pa->setPhotos($this->photos);
        return $pa;
    }
}