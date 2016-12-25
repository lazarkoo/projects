<?php

require_once '../lib/DAL/DAL.php';
require_once '../lib/class/Vesti.php';
require_once '../lib/DAL/KategorijaDAL.php';
require_once '../lib/DAL/KorisnikDAL.php';

class VestiDAL extends DAL 
{

    function __construct() {
        
        parent::__construct();
    }
    
    function PrikaziSveVesti()
    {		
		
       $results = $this->IzvrsiUpit("SELECT * FROM VESTI order by DATUMVESTI desc");
       
       $vestiResults = array();
       
       foreach ($results as $k)
       {
           $vestiResult = new Vesti();
           $vestiResult->set_idVesti($k->IDVESTI);
           $vestiResult->set_naslovvesti($k->NASLOVVESTI);
           $vestiResult->set_datumvesti($k->DATUMVESTI);
		   $vestiResult->set_tekstvesti($k->TEKSTVESTI);
           $vestiResult->set_highlight($k->HIGHLIGHT);
		   $vestiResult->set_slika($k->SLIKA);
		  
		  
           $KategorijaDAL = new KategorijaDAL();
           $vestiResult->set_idKategorija($KategorijaDAL->PronadjiKategorijaID($k->IDKATEGORIJA));
           
		   
		   $korisnikDAL = new KorisnikDAL();
           $vestiResult->set_idKorisnik($korisnikDAL->PronadjiKorisnikaNAME($k->IDKORISNIK));
          
			$vestiResults[] = $vestiResult;

       }
       
       return $vestiResults;
    }
    
    function PrikaziVestiPretraga($search)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM VESTI WHERE NASLOVVESTI LIKE '%".$search."%'");
       
       $vestiResults = array();
       
       foreach ($results as $k)
       {
           $vestiResult = new Vesti();
           $vestiResult->set_idVesti($k->IDVESTI);
           $vestiResult->set_naslovvesti($k->NASLOVVESTI);
           $vestiResult->set_datumvesti($k->DATUMVESTI);
		   $vestiResult->set_tekstvesti($k->TEKSTVESTI);
		   $vestiResult->set_highlight($k->HIGHLIGHT);
		   $vestiResult->set_slika($k->SLIKA);
           
           $KategorijaDAL = new KategorijaDAL();
           $vestiResult->set_idKategorija($KategorijaDAL->PronadjiKategorijaID($k->IDKATEGORIJA));
          
		   
		   $korisnikDAL = new KorisnikDAL();
           $vestiResult->set_idKorisnik($korisnikDAL->PronadjiKorisnikaID($k->IDKORISNIK));
           $vestiResults[] = $vestiResult;
       }
       
       return $vestiResults;
    }
    
    function DodajVest($vest)
    {
        $upit = "INSERT INTO VESTI(NASLOVVESTI, DATUMVESTI, TEKSTVESTI, HIGHLIGHT, SLIKA, IDKATEGORIJA, IDKORISNIK) VALUES('".$vest->get_naslovvesti()."', '".$vest->get_datumvesti()."', '".mysql_real_escape_string(htmlspecialchars($vest->get_tekstvesti()))."', '".$vest->get_highlight()."', '".$vest->get_slika()."', ".$vest->get_idKategorija()->get_idKategorija().", ".$vest->get_idKorisnik()->get_idKorisnik().");";
        return $this->IzvrsiUpit($upit);
    }
    
    function IzmeniVest($vest)
    {
        $upit= "UPDATE VESTI SET NASLOVVESTI = '".$vest->get_naslovvesti()."', DATUMVESTI = '".$vest->get_datumvesti()."', TEKSTVESTI = '".$vest->get_tekstvesti()."', HIGHLIGHT = '".$vest->get_highlight()."', SLIKA = '".$vest->get_slika()."', IDKATEGORIJA =".$vest->get_idKategorija()->get_idKategorija().", IDKORISNIK =".$vest->get_idKorisnik()->get_idKorisnik()." WHERE IDVESTI =".$vest->get_idVesti();
        return $this->IzvrsiUpit($upit);
    }
    
    function ObrisiVest($vest)
    {
        $upit= "DELETE FROM VESTI WHERE IDVESTI =".$vest->get_idVesti();
        return $this->IzvrsiUpit($upit);
    }
    
    function PronadjiVestiID($idvest)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM VESTI WHERE IDVESTI =".$idvest);

       $vestiResult = new Vesti();
       
       if (count($results)>0)
       {
           $k = $results[0];
           
           $vestiResult = new Vesti();
           $vestiResult->set_idVesti($k->IDVESTI);
           $vestiResult->set_naslovvesti($k->NASLOVVESTI);
           $vestiResult->set_datumvesti($k->DATUMVESTI);
		   $vestiResult->set_tekstvesti($k->TEKSTVESTI);
		   $vestiResult->set_highlight($k->HIGHLIGHT);
		   $vestiResult->set_slika($k->SLIKA);
           $KategorijaDAL = new KategorijaDAL();
           $vestiResult->set_idKategorija($KategorijaDAL->PronadjiKategorijaID($k->IDKATEGORIJA));
		   
		   $korisnikDAL = new KorisnikDAL();
           $vestiResult->set_idKorisnik($korisnikDAL->PronadjiKorisnikaID($k->IDKORISNIK));

       }
       
       return $vestiResult;
    }

}


