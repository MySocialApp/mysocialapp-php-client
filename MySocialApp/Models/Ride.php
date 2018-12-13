<?php

namespace MySocialApp\Models;

/**
 * Class Ride
 * @package MySocialApp\Models
 */
class Ride extends BaseCustomField {
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $estimated_ride_time;

    /**
     * @var string
     */
    protected $static_maps_url;

    /**
     * @var int
     */
    protected $total_distance;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\User>
     */
    protected $users;

    /**
     * @var \MySocialApp\Models\JSONableArray<\MySocialApp\Models\RideLocation>
     */
    protected $locations;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $start_location;

    /**
     * @var \MySocialApp\Models\Location
     */
    protected $end_location;

    /**
     * @var bool
     */
    protected $has_ride;

    /**
     * @var string
     */
    protected $ride_type;

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
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getEstimatedRideTime() {
        return $this->estimated_ride_time;
    }

    /**
     * @param int $estimated_ride_time
     */
    public function setEstimatedRideTime($estimated_ride_time) {
        $this->estimated_ride_time = $estimated_ride_time;
    }

    /**
     * @return string
     */
    public function getStaticMapsUrl() {
        return $this->static_maps_url;
    }

    /**
     * @param string $static_maps_url
     */
    public function setStaticMapsUrl($static_maps_url) {
        $this->static_maps_url = $static_maps_url;
    }

    /**
     * @return int
     */
    public function getTotalDistance() {
        return $this->total_distance;
    }

    /**
     * @param int $total_distance
     */
    public function setTotalDistance($total_distance) {
        $this->total_distance = $total_distance;
    }

    /**
     * @return array
     */
    public function getUsers() {
        return $this->arrayFrom($this->users);
    }

    /**
     * @param array $users
     */
    public function setUsers($users) {
        $this->users = JSONableArray::createWith($users, User::class, $this->_session);
    }

    /**
     * @return array
     */
    public function getLocations() {
        return $this->arrayFrom($this->locations);
    }

    /**
     * @param array $locations
     */
    public function setLocations($locations) {
        $this->locations = JSONableArray::createWith($locations, RideLocation::class, $this->_session);
    }

    /**
     * @return Location
     */
    public function getStartLocation() {
        return $this->start_location;
    }

    /**
     * @param Location $start_location
     */
    public function setStartLocation($start_location) {
        $this->start_location = $start_location;
    }

    /**
     * @return Location
     */
    public function getEndLocation() {
        return $this->end_location;
    }

    /**
     * @param Location $end_location
     */
    public function setEndLocation($end_location) {
        $this->end_location = $end_location;
    }

    /**
     * @return bool
     */
    public function isHasRide() {
        return $this->has_ride;
    }

    /**
     * @param bool $has_ride
     */
    public function setHasRide($has_ride) {
        $this->has_ride = $has_ride;
    }

    /**
     * @return string
     */
    public function getRideType() {
        return $this->ride_type;
    }

    /**
     * @param string $ride_type
     */
    public function setRideType($ride_type) {
        $this->ride_type = $ride_type;
    }
}