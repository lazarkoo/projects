<?php

require_once '../lib/DAL/DAL.php';
require_once '../lib/class/KategorijaAward.php';


class KategorijaAwardDAL extends DAL
{

    function __construct() {
        
        parent::__construct();
    }
    
    function PrikaziSveKategorijeAward()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KATEGORIJAAWARD");
       
       $katawardResults = array();
       
       foreach ($results as $k)
       {
           $katawardResult = new KategorijaAward();
           $katawardResult->set_idKategorijaAward($k->IDKATEGORIJAAWARD);
           $katawardResult->set_nazivkategorijeaward($k->NAZIV);
           $katawardResults[] = $katawardResult;
       }
       
       return $katawardResults;
    }
    
    
    
    function PronadjiKategorijaAwardID($idkategorijaaward)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM KATEGORIJAAWARD WHERE IDKATEGORIJAAWARD =".$idkategorijaaward);

       $katawardResult = new KategorijaAward();
       
       if (count($results)>0)
       {
           $k = $results[0];
           $katawardResult->set_idKategorijaAward($k->IDKATEGORIJAAWARD);
           $katawardResult->set_nazivkategorijeaward($k->NAZIV);

       }
       
       return $katawardResult;
    }

}



