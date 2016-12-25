<?php

require_once '../lib/DAL/DAL.php';
require_once '../lib/class/AwardResults.php';
require_once '../lib/DAL/AwardDAL.php';

class AwardResultsDAL extends DAL
{

    function __construct() {
        
        parent::__construct();
    }
    
    function PrikaziSveAwardsResults()
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARDRESULTS");
       
       $awardResults = array();
       
       foreach ($results as $a)
       {
           $awardResult = new AwardResults();
           $awardResult->set_idAwardResults($a->IDAWARDRESULTS);
           $awardResult->set_user($a->USER);
		   $awardResult->set_datumglasanja($a->DATUMGLASANJA);
		   
		   $awardDAL = new AwardDAL();
           $awardResult->set_bestmale($awardDAL->PronadjiAwardID($a->BESTMALE));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestfemale($awardDAL->PronadjiAwardID($a->BESTFEMALE));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestband($awardDAL->PronadjiAwardID($a->BESTBAND));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestpopsong($awardDAL->PronadjiAwardID($a->BESTPOPSONG));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestrocksong($awardDAL->PronadjiAwardID($a->BESTROCKSONG));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestvideo($awardDAL->PronadjiAwardID($a->BESTVIDEO));
		   
           $awardResults[] = $awardResult;
       }
       
       return $awardResults;
    }
     function AwardGlasaj($awardresults)
    {
        $upit = "INSERT INTO AWARDRESULTS (USER,DATUMGLASANJA,BESTMALE,BESTFEMALE,BESTBAND,BESTPOPSONG,BESTROCKSONG,BESTVIDEO) VALUES('".$awardresults->get_user()."', '".$awardresults->get_datumglasanja()."', ".$awardresults->get_bestmale()->get_idAward().", '".$awardresults->get_bestfemale()->get_idAward()."', '".$awardresults->get_bestband()->get_idAward()."', '".$awardresults->get_bestpopsong()->get_idAward()."', '".$awardresults->get_bestrocksong()->get_idAward()."', '".$awardresults->get_bestvideo()->get_idAward()."');";
        return $this->IzvrsiUpit($upit);
    }
    
    function PronadjiAwardResultsID($idawardresults)
    {
       $results = $this->IzvrsiUpit("SELECT * FROM AWARD WHERE IDAWARDRESULTS =".$idawardresults);

       $awardResult = new AwardResults();
       
       if (count($results)>0)
       {
           $a = $results[0];
           $awardResult->set_idAwardResults($a->IDAWARDRESULTS);
           $awardResult->set_user($a->USER);
		   $awardResult->set_datumglasanja($a->DATUMGLASANJA);
		   $awardDAL = new AwardDAL();
           $awardResult->set_bestmale($awardDAL->PronadjiAwardID($a->BESTMALE));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestfemale($awardDAL->PronadjiAwardID($a->BESTFEMALE));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestband($awardDAL->PronadjiAwardID($a->BESTBAND));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestpopsong($awardDAL->PronadjiAwardID($a->BESTPOPSONG));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestrocksong($awardDAL->PronadjiAwardID($a->BESTROCKSONG));
		   $awardDAL = new AwardDAL();
		   $awardResult->set_bestvideo($awardDAL->PronadjiAwardID($a->BESTVIDEO));

       }
       
       return $awardResult;
    }

}



