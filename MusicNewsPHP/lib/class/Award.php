<?php
require_once 'KategorijaAward.php';

class Award implements JsonSerializable
{
    protected $_idAward = 0;
    protected $_nazivaward = "";
	protected $_slika = "";
	protected $_video = "";
	protected $_idKategorijaAward;
	  function __construct() {
        
    }
    
    function get_idAward() {
        return $this->_idAward;
    }

    function get_nazivaward() {
        return $this->_nazivaward;
    }
	
	function get_idKategorijaAward() {
        return $this->_idKategorijaAward;
    }
	
	function get_slika() {
        return $this->_slika;
    }
	
	function get_video() {
        return $this->_video;
    }

    function set_idAward($_idAward) {
        $this->_idAward = $_idAward;
    }

    function set_nazivaward($_nazivaward) {
        $this->_nazivaward = $_nazivaward;
    }
	
	 function set_idKategorijaAward($_idKategorijaAward) {
        $this->_idKategorijaAward = $_idKategorijaAward;
    }
	
	 function set_slika($_slika) {
        $this->_slika = $_slika;
    }
	
	 function set_video($_video) {
        $this->_video = $_video;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
    
    public function jsonDeserialize($data)
    {
        $this->_idAward = $data->{'_idAward'};
        $this->_nazivaward = $data->{'_nazivaward'};
		$this->_slika = $data->{'_slika'};
		$this->_video = $data->{'_video'};
		$kategorijaaward = new KategorijaAward();
        $kategorijaaward->jsonDeserialize($data->{'_idKategorijaAward'});
        $this->_idKategorijaAward = $kategorijaaward;
    }

}

