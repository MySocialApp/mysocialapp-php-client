<?php

namespace MySocialApp\Models;

/**
 * Class SearchQuery
 * @package MySocialApp\Models
 */
class SearchQuery {

    const _SORT_ASC = "ASC";
    const _SORT_DESC = "DESC";

    /**
     * @var \MySocialApp\Models\User
     */
    public $user;
    /**
     * @var string
     */
    public $q;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $content;
    /**
     * @var double
     */
    public $maximumDistanceInMeters;
    /**
     * @var string
     */
    public $sortOrder;
    /**
     * @var \DateTime
     */
    public $startDate;
    /**
     * @var \DateTime
     */
    public $endDate;
    /**
     * @var string
     */
    public $dateField;
    /**
     * @var bool
     */
    public $matchAll;
    /**
     * @var bool
     */
    public $startsWith;
    /**
     * @var bool
     */
    public $endsWith;
}