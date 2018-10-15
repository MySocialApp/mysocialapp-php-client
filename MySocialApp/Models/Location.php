<?php

namespace MySocialApp\Models;

/**
 * Class Location
 * @package MySocialApp\Models
 */
class Location extends BaseLocation {
    /**
     * @var \MySocialApp\Models\BaseLocation
     */
    protected $location;
    /**
     * @var string
     */
    protected $country;
    /**
     * @var string
     */
    protected $district;
    /**
     * @var string
     */
    protected $state;
    /**
     * @var string
     */
    protected $postal_code;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string
     */
    protected $street_name;
    /**
     * @var string
     */
    protected $street_number;
    /**
     * @var string
     */
    protected $complete_address;
    /**
     * @var string
     */
    protected $complete_city_address;

    /**
     * @return BaseLocation
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * @param BaseLocation $location
     */
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getDistrict() {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict($district) {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPostalCode() {
        return $this->postal_code;
    }

    /**
     * @param string $postal_code
     */
    public function setPostalCode($postal_code) {
        $this->postal_code = $postal_code;
    }

    /**
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreetName() {
        return $this->street_name;
    }

    /**
     * @param string $street_name
     */
    public function setStreetName($street_name) {
        $this->street_name = $street_name;
    }

    /**
     * @return string
     */
    public function getStreetNumber() {
        return $this->street_number;
    }

    /**
     * @param string $street_number
     */
    public function setStreetNumber($street_number) {
        $this->street_number = $street_number;
    }

    /**
     * @return string
     */
    public function getCompleteAddress() {
        return $this->complete_address;
    }

    /**
     * @param string $complete_address
     */
    public function setCompleteAddress($complete_address) {
        $this->complete_address = $complete_address;
    }

    /**
     * @return string
     */
    public function getCompleteCityAddress() {
        return $this->complete_city_address;
    }

    /**
     * @param string $complete_city_address
     */
    public function setCompleteCityAddress($complete_city_address) {
        $this->complete_city_address = $complete_city_address;
    }
}