<?php

class Kategorija implements JsonSerializable
{
    protected $_idKategorija = 0;
    protected $_nazivkategorije = "";
	
	  function __construct() {
        
    }
    
    function get_idKategorija() {
        return $this->_idKategorija;
    }

    function get_nazivkategorije() {
        return $this->_nazivkategorije;
    }

    function set_idKategorija($_idKategorija) {
        $this->_idKategorija = $_idKategorija;
    }

    function set_nazivkategorije($_nazivkategorije) {
        $this->_nazivkategorije = $_nazivkategorije;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
    
    public function jsonDeserialize($data)
    {
        $this->_idKategorija = $data->{'_idKategorija'};
        $this->_nazivkategorije = $data->{'_nazivkategorije'};
    }

}

