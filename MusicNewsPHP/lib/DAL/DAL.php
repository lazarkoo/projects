<?php

require_once '../lib/DAL/DALRezultatUpita.php';
require_once '../lib/utility/dbsettings.php';

class DAL  {
     
  public function __construct()
  {
      $this->_podesavanjaBaze = new dbSettings();
  }
  
  protected $_konekcija;
  protected $_podesavanjaBaze;


private function UspostaviKonekcijuSaBazom() {
    $this->_konekcija = mysql_connect($this->_podesavanjaBaze->get_dbserver(),
                                      $this->_podesavanjaBaze->get_dbuser(), 
                                      $this->_podesavanjaBaze->get_dbpassword())
      or die ("Neuspesna konekcija ka serveru baze podataka...");
         
    mysql_select_db($this->_podesavanjaBaze->get_database(),$this->_konekcija)
      or die ("Nepostojeca baza podataka...");
     
    return $this->_konekcija;
  }
  
  private  function PrekiniKonekcijuSaBazom()
  {
      mysql_close($this->_konekcija);
  }


  protected function IzvrsiUpit($sqlUpit){
 
    $this->UspostaviKonekcijuSaBazom();
 
    $rezultatUpita = mysql_query($sqlUpit);
 
    if ($rezultatUpita){
      if (strpos($sqlUpit,'SELECT') === false){
        return true;
      }
    }
    else{
      if (strpos($sqlUpit,'SELECT') === false){
        return false;
      }
      else{
        return null;
      }
    }
 
    $rezultati = array();
 
    while ($red = mysql_fetch_array($rezultatUpita)){
 
      $rezultatUpitaDAL = new DALRezultatUpita();
 
      foreach ($red as $kljuc=>$vrednost){
        $rezultatUpitaDAL->$kljuc = $vrednost;
      }
 
      $rezultati[] = $rezultatUpitaDAL;
    }
    
    $this->PrekiniKonekcijuSaBazom();
    
    return $rezultati;       
  } 
   
}





