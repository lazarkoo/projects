<?php

require_once '../lib/DAL/DAL.php';
require_once '../lib/class/Kategorija.php';


class KategorijaDAL extends DAL
{

    function __construct() {
        
        parent::__construct();
    }
    
    function PrikaziSveKategorije()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KATEGORIJA");
       
       $katResults = array();
       
       foreach ($results as $k)
       {
           $katResult = new Kategorija();
           $katResult->set_idKategorija($k->IDKATEGORIJA);
           $katResult->set_nazivkategorije($k->NAZIVKATEGORIJA);
           $katResults[] = $katResult;
       }
       
       return $katResults;
    }
    
    function DodajRank($rank)
    {
        $upit = "INSERT INTO Rank (nazivRank) VALUES('".$rank->get_nazivRank()."');";
        return $this->IzvrsiUpit($upit);
    }
    
    function IzmeniRank($rank)
    {
        $upit= "UPDATE Rank SET nazivRank = '".$rank->get_nazivRank()."' WHERE idRank =".$rank->get_idRank();
        return $this->IzvrsiUpit($upit);
    }
    
    function ObrisiRank($rank)
    {
        $upit= "DELETE FROM Rank WHERE idRank =".$rank->get_idRank();
        return $this->IzvrsiUpit($upit);
    }
    
    function PronadjiKategorijaID($idkategorija)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KATEGORIJA WHERE IDKATEGORIJA =".$idkategorija);

       $katResult = new Kategorija();
       
       if (count($results)>0)
       {
           $k = $results[0];
           $katResult->set_idKategorija($k->IDKATEGORIJA);
           $katResult->set_nazivkategorije($k->NAZIVKATEGORIJA);

       }
       
       return $katResult;
    }

}



