<?php

namespace MySocialApp\Models;

/**
 * Class Base
 * @package MySocialApp\Models
 */
class Base extends JSONable {
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $id_str;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var \DateTime
     */
    protected $created_date;
    /**
     * @var \DateTime
     */
    protected $updated_date;
    /**
     * @var string
     */
    protected $displayed_name;
    /**
     * @var \MySocialApp\Models\Photo
     */
    protected $displayed_photo;
    /**
     * @var string
     */
    protected $entity_type;
    /**
     * @var string
     */
    protected $access_control;
    /**
     * @var \MySocialApp\Models\User
     */
    protected $owner;
    /**
     * @var \MySocialApp\Models\Base
     */
    protected $parent;
    /**
     * @var string
     */
    protected $body_message;
    /**
     * @var string
     */
    protected $body_image_url;
    /**
     * @var string
     */
    protected $body_image_text;
    /**
     * @var \MySocialApp\Models\LikeBlob
     */
    protected $likes;
    /**
     * @var \MySocialApp\Models\CommentBlob
     */
    protected $comments;

    protected $payload;

    public function initWith($json, $session = null)
    {
        if (isset($json["type"]) && ($type = $json["type"]) !== null) {
            $type = "\\MySocialApp\\Models\\" . $type;
            if (class_exists($type) && !$this instanceof $type && ($c = new $type()) !== null && $c instanceof JSONable) {
                return $c->initWith($json, $session);
            }
        } else if (isset($json["entity_type"]) && ($type = $json["entity_type"]) !== null) {
            $type = "\\MySocialApp\\Models\\" . $type;
            if (class_exists($type) && !$this instanceof $type && ($c = new $type()) !== null && $c instanceof JSONable) {
                return $c->initWith($json, $session);
            }
        }
        return parent::initWith($json, $session);
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdStr() {
        return $this->id_str;
    }

    /**
     * @param string $id_str
     */
    public function setIdStr($id_str) {
        $this->id_str = $id_str;
    }

    /**
     * @return string|int
     */
    public function getSafeId() {
        return $this->getIdStr() ?: $this->getId();
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate() {
        return $this->created_date;
    }

    /**
     * @param \DateTime $created_date
     */
    public function setCreatedDate($created_date) {
        $this->created_date = $created_date;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate() {
        return $this->updated_date;
    }

    /**
     * @param \DateTime $updated_date
     */
    public function setUpdatedDate($updated_date) {
        $this->updated_date = $updated_date;
    }

    /**
     * @return string
     */
    public function getDisplayedName() {
        return $this->displayed_name;
    }

    /**
     * @param string $displayed_name
     */
    public function setDisplayedName($displayed_name) {
        $this->displayed_name = $displayed_name;
    }

    /**
     * @return Photo
     */
    public function getDisplayedPhoto() {
        return $this->displayed_photo;
    }

    /**
     * @param Photo $displayed_photo
     */
    public function setDisplayedPhoto($displayed_photo) {
        $this->displayed_photo = $displayed_photo;
    }

    /**
     * @return string
     */
    public function getEntityType() {
        return $this->entity_type;
    }

    /**
     * @param string $entity_type
     */
    public function setEntityType($entity_type) {
        $this->entity_type = $entity_type;
    }

    /**
     * @return string
     */
    public function getAccessControl() {
        return $this->access_control;
    }

    /**
     * @param string $access_control
     */
    public function setAccessControl($access_control) {
        $this->access_control = $access_control;
    }

    /**
     * @return User
     */
    public function getOwner() {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner($owner) {
        $this->owner = $owner;
    }

    /**
     * @return Base
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * @param Base $parent
     */
    public function setParent($parent) {
        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getBodyMessage() {
        return $this->body_message;
    }

    /**
     * @param string $body_message
     */
    public function setBodyMessage($body_message) {
        $this->body_message = $body_message;
    }

    /**
     * @return string
     */
    public function getBodyImageUrl() {
        return $this->body_image_url;
    }

    /**
     * @param string $body_image_url
     */
    public function setBodyImageUrl($body_image_url) {
        $this->body_image_url = $body_image_url;
    }

    /**
     * @return string
     */
    public function getBodyImageText() {
        return $this->body_image_text;
    }

    /**
     * @param string $body_image_text
     */
    public function setBodyImageText($body_image_text) {
        $this->body_image_text = $body_image_text;
    }

    /**
     * @return LikeBlob
     */
    public function getLikes() {
        return $this->likes;
    }

    /**
     * @param LikeBlob $likes
     */
    public function setLikes($likes) {
        $this->likes = $likes;
    }

    /**
     * @return CommentBlob
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * @param CommentBlob $comments
     */
    public function setComments($comments) {
        $this->comments = $comments;
    }

    /**
     * @return mixed|null
     */
    public function getPayload() {
        return $this->payload;
    }

    /**
     * @param mixed|null $payload
     */
    public function setPayload($payload) {
        $this->payload = $payload;
    }

    /**
     * @return array|Error
     */
    public function listLikes() {
        return $this->arrayFrom($this->_session->getClientService()->getLikeable()->get($this));
    }

    /**
     * @return Like|Error
     */
    public function addLike() {
        return $this->_session->getClientService()->getLikeable()->post($this);
    }

    /**
     * @return Error|null
     */
    public function removeLike() {
        return $this->_session->getClientService()->getLikeable()->delete($this);
    }

    /**
     * @return array|Error
     */
    public function listComments() {
        return $this->arrayFrom($this->_session->getClientService()->getCommentable()->get($this));
    }

    /**
     * @param \MySocialApp\Models\CommentPost $commentPost
     * @return Comment|Error
     */
    public function addComment($commentPost) {
        return $this->_session->getClientService()->getCommentable()->post($this, $commentPost->getComment(), $commentPost->getPhoto());
    }

    /**
     * @param \MySocialApp\Models\Comment $comment
     * @param mixed $photo
     * @return Comment|Error
     */
    public function addCommentWithPhoto($comment, $photo) {
        return $this->_session->getClientService()->getCommentable()->post($this, $comment, $photo);
    }

    /**
     * @return null|Error
     */
    public function ignore() {
        return $this->_session->getClientService()->getFeed()->stopFollow($this->getSafeId());
    }

    /**
     * @return null|Error
     */
    public function abuse() {
        return $this->_session->getClientService()->getReport()->post($this->getSafeId());
    }

    /**
     * @return null|Error
     */
    public function delete() {
        return $this->_session->getClientService()->getFeed()->delete($this->getSafeId());
    }

    /**
     * @param $feedPost FeedPost
     * @return Feed
     */
    public function sendWallPost($feedPost) {
        if ($feedPost->getPhoto() !== null) {
            return $this->_session->getClientService()->getTextWallMessage()->postImage($this, $feedPost->getTextWallMessage(), $feedPost->getPhoto(), null, $feedPost->getTextWallMessage()->getPayload());
        }
        return $this->_session->getClientService()->getTextWallMessage()->post($this, $feedPost->getTextWallMessage());
    }

    /**
     * @param $feedPost FeedPost
     * @return Feed
     */
    public function createFeedPost($feedPost) {
        return $this->sendWallPost($feedPost);
    }

    /**
     * @param $feedPost FeedPost
     * @return Feed
     */
    public function createNewsFeed($feedPost) {
        return $this->sendWallPost($feedPost);
    }
}