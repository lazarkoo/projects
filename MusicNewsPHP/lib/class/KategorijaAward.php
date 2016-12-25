<?php

class KategorijaAward implements JsonSerializable
{
    protected $_idKategorijaAward = 0;
    protected $_nazivkategorijeaward = "";
	
	  function __construct() {
        
    }
    
    function get_idKategorijaAward() {
        return $this->_idKategorijaAward;
    }

    function get_nazivkategorijeaward() {
        return $this->_nazivkategorijeaward;
    }

    function set_idKategorijaAward($_idKategorijaAward) {
        $this->_idKategorijaAward = $_idKategorijaAward;
    }

    function set_nazivkategorijeaward($_nazivkategorijeaward) {
        $this->_nazivkategorijeaward = $_nazivkategorijeaward;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
    
    public function jsonDeserialize($data)
    {
        $this->_idKategorijaAward = $data->{'_idKategorijaAward'};
        $this->_nazivkategorijeaward = $data->{'_nazivkategorijeaward'};
    }

}

