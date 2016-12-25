<?php
require_once 'Award.php';

class AwardResults implements JsonSerializable
{
    protected $_idAwardResults = 0;
    protected $_user = "";
	protected $_datumglasanja = "";
	protected $_bestmale;
	protected $_bestfemale;
	protected $_bestband;
	protected $_bestpopsong;
	protected $_bestrocksong;
	protected $_bestvideo;
	
	  function __construct() {
        
    }
    
    function get_idAwardResults() {
        return $this->_idAwardResults;
    }

    function get_user() {
        return $this->_user;
    }
	
	function get_datumglasanja() {
        return $this->_datumglasanja;
    }
	
	function get_bestmale() {
        return $this->_bestmale;
    }
	
	function get_bestfemale() {
        return $this->_bestfemale;
    }
	
	function get_bestband() {
        return $this->_bestband;
    }
	
	function get_bestpopsong() {
        return $this->_bestpopsong;
    }
	
	function get_bestrocksong() {
        return $this->_bestrocksong;
    }
	
	function get_bestvideo() {
        return $this->_bestvideo;
    }
	
    function set_idAwardResults($_idAwardResults) {
        $this->_idAwardResults = $_idAwardResults;
    }

    function set_user($_user) {
        $this->_user = $_user;
    }
	
	function set_datumglasanja($_datumglasanja) {
        $this->_datumglasanja = $_datumglasanja;
    }
	
	 function set_bestmale($_bestmale) {
        $this->_bestmale = $_bestmale;
    }
	
	 function set_bestfemale($_bestfemale) {
        $this->_bestfemale = $_bestfemale;
    }
	
	 function set_bestband($_bestband) {
        $this->_bestband = $_bestband;
    }
	
	 function set_bestpopsong($_bestpopsong) {
        $this->_bestpopsong = $_bestpopsong;
    }
	
	 function set_bestrocksong($_bestrocksong) {
        $this->_bestrocksong = $_bestrocksong;
    }
	
	 function set_bestvideo($_bestvideo) {
        $this->_bestvideo = $_bestvideo;
    }
	
	
    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
    
    public function jsonDeserialize($data)
    {
        $this->_idAwardResults = $data->{'_idAwardResults'};
        $this->_user = $data->{'_user'};
		$this->_datumglasanja = $data->{'_datumglasanja'};
		$award = new Award();
        $award->jsonDeserialize($data->{'_bestmale'});
        $this->_bestmale = $award;
		$award = new Award();
		$award->jsonDeserialize($data->{'_bestfemale'});
        $this->_bestfemale = $award;
		$award = new Award();
		$award->jsonDeserialize($data->{'_bestband'});
        $this->_bestband = $award;
		$award = new Award();
		$award->jsonDeserialize($data->{'_bestpopsong'});
        $this->_bestpopsong = $award;
		$award = new Award();
		$award->jsonDeserialize($data->{'_bestrocksong'});
        $this->_bestrocksong = $award;
		$award = new Award();
		$award->jsonDeserialize($data->{'_bestvideo'});
        $this->_bestvideo = $award;
    }

}

