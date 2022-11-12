<?php

class Locations
{
    //Atributos
	private $location_id;
    private $street_address;
    private $postal_code;
    private $city;
    private $state_province;
    private $country_id;
	
    //METODOS
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}