<?php

class Countries
{
    //Atributos
	private $country_id;
    private $country_name;
    private $region_id;
	
    //METODOS
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}