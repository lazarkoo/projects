<?php
require_once 'Kategorija.php';
require_once 'Korisnik.php';

class Vesti implements JsonSerializable {

    protected $_idVesti = 0;
    protected $_naslovvesti = "";
    protected $_datumvesti = "";
    protected $_tekstvesti = "";
	protected $_highlight = "";
	protected $_slika = "";
	protected $_idKategorija;
	protected $_idKorisnik;

    function __construct() {
    }
    
    function get_idVesti() {
        return $this->_idVesti;
    }

    function get_naslovvesti() {
        return $this->_naslovvesti;
    }

    function get_datumvesti() {
        return $this->_datumvesti;
    }

    function get_tekstvesti() {
        return $this->_tekstvesti;
    }
	
	function get_highlight() {
        return $this->_highlight;
    }
	
	function get_slika() {
        return $this->_slika;
    }
	
	function get_idKategorija() {
        return $this->_idKategorija;
    }
	
	function get_idKorisnik() {
        return $this->_idKorisnik;
    }

    function set_idVesti($_idVesti) {
        $this->_idVesti = $_idVesti;
    }

    function set_naslovvesti($_naslovvesti) {
        $this->_naslovvesti = $_naslovvesti;
    }

    function set_datumvesti($_datumvesti) {
        $this->_datumvesti = $_datumvesti;
    }

    function set_tekstvesti($_tekstvesti) {
        $this->_tekstvesti = $_tekstvesti;
    }
	
	function set_highlight($_highlight) {
        $this->_highlight = $_highlight;
    }
	
	function set_slika($_slika) {
        $this->_slika = $_slika;
    }
	
	 function set_idKategorija($_idKategorija) {
        $this->_idKategorija = $_idKategorija;
    }
	
	function set_idKorisnik($_idKorisnik) {
        $this->_idKorisnik = $_idKorisnik;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }

    public function jsonDeserialize($data)
    {
        $this->_idVesti = $data->{'_idVesti'};
        $this->_naslovvesti= $data->{'_naslovvesti'};
        $this->_datumvesti = $data->{'_datumvesti'};
		$this->_tekstvesti = $data->{'_tekstvesti'};
		$this->_highlight = $data->{'_highlight'};
		$this->_slika = $data->{'_slika'};
		$kategorija = new Kategorija();
        $kategorija->jsonDeserialize($data->{'_idKategorija'});
        $this->_idKategorija = $kategorija;
		
		$korisnik = new Korisnik();
        $korisnik->jsonDeserialize($data->{'_idKorisnik'});
        $this->_idKorisnik = $korisnik;

    }
    
}