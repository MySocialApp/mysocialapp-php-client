<?php

namespace MySocialApp\Models;

/**
 * Class PhotoAlbum
 * @package MySocialApp\Models
 */
class PhotoAlbum extends Base {
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\Photo>
     */
    protected $photos;

    /**
     * @var \MySocialApp\Models\PreviewPhotos
     */
    protected $preview_photos;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getPhotos() {
        return $this->arrayFrom($this->photos);
    }

    /**
     * @param array $photos
     */
    public function setPhotos($photos) {
        $this->photos = JSONableArray::createWith($photos, Photo::class, $this->_session);
    }

    /**
     * @return PreviewPhotos
     */
    public function getPreviewPhotos() {
        return $this->preview_photos;
    }

    /**
     * @param PreviewPhotos $preview_photos
     */
    public function setPreviewPhotos($preview_photos) {
        $this->preview_photos = $preview_photos;
    }

    /**
     * @param mixed $photo
     * @return Photo|Error
     */
    public function addPhoto($photo) {
        $r = $this->addPhotoWithFeedResult($photo);
        if ($r instanceof Feed && $r->getObject() instanceof Photo) {
            return $r->getObject();
        }
        return $r;
    }

    /**
     * @param Photo $photo
     * @return Feed|Error
     */
    public function addPhotoWithFeedResult($photo) {
        if ($photo->getRawContent() === null || $this->name === null) {
            return new Error("Image and photo album name cannot be null");
        }
        $user = $this->_session->getClientService()->getAccount()->get();
        if ($user instanceof User) {
            $twm = new TextWallMessage();
            if ($photo->getMessage() !== null) {
                $twm->setMessage($photo->getMessage());
                $twm->setTagEntities($photo->getTagEntities());
                $twm->setAccessControl($photo->getAccessControl());
            }
            return $this->_session->getClientService()->getTextWallMessage()->postImage($user, $twm, $photo->getRawContent(), null, $photo->getPayload(), $this->name);
        }
        return $user;
    }

    /**
     * @return Error|null
     */
    public function delete() {
        return $this->_session->getClientService()->getPhotoAlbum()->delete($this->getSafeId());
    }

    /**
     * @return PhotoAlbum|Error
     */
    public function save() {
        return $this->_session->getClientService()->getPhotoAlbum()->update($this->getSafeId(), $this);
    }
}