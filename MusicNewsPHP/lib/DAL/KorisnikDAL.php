<?php
require_once '../lib/DAL/DAL.php';
require_once '../lib/class/Korisnik.php';
class KorisnikDAL extends DAL
{

    function __construct() {
        
        parent::__construct();
    }
    
    function PrikaziSveKorisnike()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KORISNIK");
       
       $korisnikResults = array();
       
       foreach ($results as $k)
       {
           $korisnik = new Korisnik();
           $korisnik->set_idKorisnik($k->IDKORISNIK);
           $korisnik->set_username($k->USERNAME);
           $korisnik->set_password($k->PASSWORD);
           $korisnik->set_email($k->EMAIL);
		   $korisnik->set_slika($k->SLIKA);
           $korisnik->set_datumrodjenja($k->DATUMRODJENJA);
           $korisnik->set_ime($k->IME);
           $korisnik->set_prezime($k->PREZIME);
		   $korisnik->set_status($k->IDSTATUS);
           $korisnikResults[] = $korisnik;
       }
       
       return $korisnikResults;
    }
    
    function DodajKorisnika($korisnik)
    {
        $korisnik->set_username(strtolower($korisnik->get_username()));
        $korisnik->set_password(hash('sha256', $korisnik->get_password()));
        
        $upit = "INSERT INTO KORISNIK (USERNAME, PASSWORD, EMAIL, SLIKA, DATUMRODJENJA, IME, PREZIME, IDSTATUS) VALUES('".$korisnik->get_username()."','".$korisnik->get_password()."','".$korisnik->get_email()."', '".$korisnik->get_slika()."','".$korisnik->get_datumrodjenja()."','".$korisnik->get_ime()."', '".$korisnik->get_prezime()."', '".$korisnik->get_status()."');";
        return $this->IzvrsiUpit($upit);
    }
	
	function DodajKorisnikaAdmin($korisnik)
    {
        $korisnik->set_username(strtolower($korisnik->get_username()));
        $korisnik->set_password(hash('sha256', $korisnik->get_password()));
        
        $upit = "INSERT INTO KORISNIK (USERNAME, PASSWORD, EMAIL, SLIKA, DATUMRODJENJA, IME, PREZIME, IDSTATUS) VALUES('".$korisnik->get_username()."','".$korisnik->get_password()."','".$korisnik->get_email()."', '".$korisnik->get_slika()."','".$korisnik->get_datumrodjenja()."','".$korisnik->get_ime()."', '".$korisnik->get_prezime()."', '".$korisnik->get_status()."');";
        return $this->IzvrsiUpit($upit);
    }
    
	function IzmeniKorisnika($korisnik)
    {
		$korisnik->set_username(strtolower($korisnik->get_username()));
        $korisnik->set_password(hash('sha256', $korisnik->get_password()));
		
        $upit= "UPDATE KORISNIK SET USERNAME = '".$korisnik->get_username()."', PASSWORD = '".$korisnik->get_password()."', EMAIL = '".$korisnik->get_email()."',SLIKA = '".$korisnik->get_slika()."',DATUMRODJENJA = '".$korisnik->get_datumrodjenja()."',IME = '".$korisnik->get_ime()."', PREZIME = '".$korisnik->get_prezime()."',  IDSTATUS ='".$korisnik->get_status()."' WHERE IDKORISNIK =".$korisnik->get_idKorisnik();
        return $this->IzvrsiUpit($upit);
    }
    
    function ObrisiKorisnika($korisnik)
    {
        $upit= "DELETE FROM KORISNIK WHERE IDKORISNIK =".$korisnik->get_idKorisnik();
        return $this->IzvrsiUpit($upit);
    }
       
    function PronadjiKorisnika($username, $password)
    {
       $usernamemod = strtolower($username);
       $passwordmod = hash('sha256', $password);
    
        
       $results = $this->IzvrsiUpit("SELECT * FROM KORISNIK WHERE USERNAME ='".$usernamemod."' AND PASSWORD='".$passwordmod."'");

       $korisnikResult = new Korisnik();
       
       if (count($results)>0)
       {
           $k = $results[0];
           $korisnikResult->set_idKorisnik($k->IDKORISNIK);
           $korisnikResult->set_username($k->USERNAME);
           $korisnikResult->set_password($k->PASSWORD);
           $korisnikResult->set_email($k->EMAIL);
		   $korisnikResult->set_slika($k->SLIKA);
           $korisnikResult->set_datumrodjenja($k->DATUMRODJENJA);
           $korisnikResult->set_ime($k->IME);
           $korisnikResult->set_prezime($k->PREZIME);
		   $korisnikResult->set_status($k->IDSTATUS);
       }
       
       return $korisnikResult;
    }
   function PronadjiKorisnikaID($idkorisnik)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KORISNIK WHERE IDKORISNIK =".$idkorisnik);

       $korisnikResult = new Korisnik();
       
       if (count($results)>0)
       {
           $k = $results[0];
           
           $korisnikResult = new Korisnik();
           $korisnikResult->set_idKorisnik($k->IDKORISNIK);
           $korisnikResult->set_username($k->USERNAME);
           $korisnikResult->set_password($k->PASSWORD);
		   $korisnikResult->set_email($k->EMAIL);
		   $korisnikResult->set_slika($k->SLIKA);
           $korisnikResult->set_datumrodjenja($k->DATUMRODJENJA);
           $korisnikResult->set_ime($k->IME);
           $korisnikResult->set_prezime($k->PREZIME);
		   $korisnikResult->set_status($k->IDSTATUS);		  	
       }
       
       return $korisnikResult;
    }
	
	function PronadjiKorisnikaNAME($idkorisnik)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KORISNIK WHERE IDKORISNIK =".$idkorisnik);

       $korisnikResult = new Korisnik();
       
       if (count($results)>0)
       {
           $k = $results[0];
           
           $korisnikResult = new Korisnik();
		$korisnikResult->set_username($k->USERNAME);
       }
       
       return $korisnikResult;
    }
	
	 function PronadjiKorisnikaUSERNAME($username)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KORISNIK WHERE USERNAME = '".$username."'");

       $korisnikResult = new Korisnik();
       
       if (count($results)>0)
       {
           $k = $results[0];
           
           $korisnikResult = new Korisnik();
           $korisnikResult->set_idKorisnik($k->IDKORISNIK);
           $korisnikResult->set_username($k->USERNAME);
           $korisnikResult->set_password($k->PASSWORD);
		   $korisnikResult->set_email($k->EMAIL);
		   $korisnikResult->set_slika($k->SLIKA);
           $korisnikResult->set_datumrodjenja($k->DATUMRODJENJA);
           $korisnikResult->set_ime($k->IME);
           $korisnikResult->set_prezime($k->PREZIME);
		   $korisnikResult->set_status($k->IDSTATUS);	
       }else
		   $korisnikResult->set_username($username);
       
       return $korisnikResult;
    }
}