<?php

require_once '../lib/DAL/DAL.php';
require_once '../lib/class/Award.php';
require_once '../lib/DAL/KategorijaAwardDAL.php';
require_once '../lib/class/KategorijaAward.php';

class AwardDAL extends DAL
{

    function __construct() {
        
        parent::__construct();
    }
    
    function PrikaziSveAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
    function PrikaziFemaleAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDKATEGORIJAAWARD = '1'");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
    
	 function PrikaziMaleAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDKATEGORIJAAWARD = '2'");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
	
	function PrikaziBandAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDKATEGORIJAAWARD = '3'");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
	
	function PrikaziPopSongAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDKATEGORIJAAWARD = '4'");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
	
	function PrikaziRockSongAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDKATEGORIJAAWARD = '5'");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
	
	function PrikaziBestVideoAwards()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDKATEGORIJAAWARD = '6'");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
    
	 function DodajAward($award)
    {
        $upit = "INSERT INTO AWARD(NAZIV, IDKATEGORIJAAWARD, SLIKA, VIDEO) VALUES('".$award->get_nazivaward()."', ".$award->get_idKategorijaAward()->get_idKategorijaAward().", '".$award->get_slika()."', '".$award->get_video()."');";
        return $this->IzvrsiUpit($upit);
    }
	
	 function IzmeniAward($award)
    {
        $upit= "UPDATE AWARD SET NAZIV = '".$award->get_nazivaward()."', IDKATEGORIJAAWARD = ".$award->get_idKategorijaAward()->get_idKategorijaAward().", SLIKA = '".$award->get_slika()."', VIDEO = '".$award->get_video()."' WHERE IDAWARD =".$award->get_idAward();
        return $this->IzvrsiUpit($upit);
    }
	
    function ObrisiAward($award)
    {
        $upit= "DELETE FROM AWARD WHERE IDAWARD =".$award->get_idAward();
        return $this->IzvrsiUpit($upit);
    }
	
   function PronadjiAwardID($idaward)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDAWARD =".$idaward);

       $awardResult = new Award();
       
       if (count($results)>0)
       {
           $a = $results[0];
           
           $awardResult = new Award();
           $awardResult->set_idAward($a->IDAWARD);
           $awardResult->set_nazivaward($a->NAZIV);
		   $awardResult->set_slika($a->SLIKA);
		   $awardResult->set_video($a->VIDEO);
		   $KategorijaAwardDAL = new KategorijaAwardDAL();
           $awardResult->set_idKategorijaAward($KategorijaAwardDAL->PronadjiKategorijaAwardID($a->IDKATEGORIJAAWARD));

       }
       
       return $awardResult;
    }

}



