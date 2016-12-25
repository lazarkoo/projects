<?php
class Korisnik implements JsonSerializable 
{
    public $_idKorisnik;
    public $_username;
    public $_password;
    public $_email;
	public $_slika;
    public $_datumrodjenja;
	public $_ime;
    public $_prezime;
	public $_status;
	
    
    function get_idKorisnik() {
        return $this->_idKorisnik;
    }
  
    function get_username() {
        return $this->_username;
    }

    function get_password() {
        return $this->_password;
    }

    function get_email() {
        return $this->_email;
    }
	
	 function get_slika() {
        return $this->_slika;
    }
  
    function get_datumrodjenja() {
        return $this->_datumrodjenja;
    }

    function get_ime() {
        return $this->_ime;
    }

    function get_prezime() {
        return $this->_prezime;
    }
	
	 function get_status() {
        return $this->_status;
    }
	
	 function set_idKorisnik($_idKorisnik) {
        $this->_idKorisnik = $_idKorisnik;
    }
	
    function set_username($_username) {
        $this->_username = $_username;
    }

    function set_password($_password) {
        $this->_password = $_password;
    }

    function set_email($_email) {
        $this->_email = $_email;
    }
	
	function set_slika($_slika) {
        $this->_slika = $_slika;
    }
	
    function set_datumrodjenja($_datumrodjenja) {
        $this->_datumrodjenja = $_datumrodjenja;
    }

    function set_ime($_ime) {
        $this->_ime = $_ime;
    }

    function set_prezime($_prezime) {
        $this->_prezime = $_prezime;
    }
	
	 function set_status($_status) {
        $this->_status = $_status;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }

    public function jsonDeserialize($data)
    {
        $this->_idKorisnik = $data->{"_idKorisnik"};
        $this->_username = $data->{'_username'};
        $this->_password= $data->{'_password'};
        $this->_email = $data->{'_email'};
		$this->_slika = $data->{"_slika"};
        $this->_datumrodjenja = $data->{'_datumrodjenja'};
        $this->_ime= $data->{'_ime'};
        $this->_prezime = $data->{'_prezime'};
		$this->_status = $data->{'_status'};
		}

}