<?php
 	require_once "Rest.php" ;
    require_once '../lib/DAL/VestiDAL.php';
    require_once '../lib/DAL/KorisnikDAL.php';
	require_once '../lib/DAL/AwardDAL.php';
	require_once '../lib/DAL/AwardResultsDAL.php';
	require_once '../lib/DAL/KategorijaAwardDAL.php';
	class API extends REST 
        {

            public function __construct() {
                parent::__construct();
            }

            public function processApi() {
                $func = strtolower(trim(str_replace("/", "", $_REQUEST['x'])));
                if ((int) method_exists($this, $func) > 0)
                    $this->$func();
                else
                    $this->response('', 404);
            }

            public function json($data) {
                if (is_array($data)) {
                    return json_encode($data);
                }
            }
			//**** award pocetak
			 private function awardsfemale() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziFemaleAwards();
                $this->response($this->json($awards), 200);
            }
			
			private function awardsmale() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziMaleAwards();
                $this->response($this->json($awards), 200);
            }
			
			private function awardsband() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziBandAwards();
                $this->response($this->json($awards), 200);
            }
			
			private function awardspopsong() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziPopSongAwards();
                $this->response($this->json($awards), 200);
            }
			
			private function awardsrocksong() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziRockSongAwards();
                $this->response($this->json($awards), 200);
            }
			
			private function awardsvideo() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziBestVideoAwards();
                $this->response($this->json($awards), 200);
            }
			
			 private function awards() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardDAL = new AwardDAL();
                $awards = $awardDAL->PrikaziSveAwards();
                $this->response($this->json($awards), 200);
            }
			
			 private function award() {

                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $idaward = (int) $this->_request['idaward'];
                if ($idaward > 0) {
                    $awardDAL = new AwardDAL();
                    $award = $awardDAL->PronadjiAwardID($idaward);
                    $result = array();
                    array_push($result, $award);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
			
			 private function dodajaward() {
                if ($this->get_request_method() != "POST") {
                    $this->response('', 406);
                }

                $award = new Award();
                $award->set_nazivaward((string) $this->_request['NAZIV']);
                $award->set_slika((string) $this->_request['SLIKA']);
                $award->set_video((string) $this->_request['VIDEO']);
				
				$kategorijaawardDAL = new KategorijaAwardDAL();
				$award->set_idKategorijaAward($kategorijaawardDAL->PronadjiKategorijaAwardID((int) $this->_request['IDKATEGORIJAAWARD']));
				
                $awardDAL = new AwardDAL();
                $succ = $awardDAL->DodajAward($award);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
                 
            }
			
			 private function izmeniaward() {
               if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $award = new Award();
                $award->set_idAward((int) $this->_request['idaward']);
                $award->set_nazivaward((string) $this->_request['NAZIV']);
                $kategorijaawardDAL = new KategorijaAwardDAL();
				$award->set_idKategorijaAward($kategorijaawardDAL->PronadjiKategorijaAwardID((int) $this->_request['IDKATEGORIJAAWARD']));
				$award->set_slika((string) $this->_request['SLIKA']);
                $award->set_video((string) $this->_request['VIDEO']);
				

                $awardDAL = new AwardDAL();
                $succ = $awardDAL->IzmeniAward($award);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
           

            private function obrisiaward() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $award = new Award();
                $award->set_idAward((int) $this->_request['idaward']);
                $awardDAL = new AwardDAL();
                $succ = $awardDAL->ObrisiAward($award);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
			//**** awards kraj
			
			//*** glasaj awards pocetak
			
			 private function awardsglasaj() {
                if ($this->get_request_method() != "POST") {
                    $this->response('', 406);
                }

                $awardresults = new AwardResults();
                $awardresults->set_user((string) $this->_request['USER']);
				$awardresults->set_datumglasanja((string) $this->_request['DATUMGLASANJA']);
				$awardDAL = new AwardDAL();
                $awardresults->set_bestmale($awardDAL->PronadjiAwardID((int) $this->_request['BESTMALE']));
				$awardDAL = new AwardDAL();
                $awardresults->set_bestfemale($awardDAL->PronadjiAwardID((int) $this->_request['BESTFEMALE']));
				$awardDAL = new AwardDAL();
				$awardresults->set_bestband($awardDAL->PronadjiAwardID((int) $this->_request['BESTBAND']));
				$awardDAL = new AwardDAL();
				$awardresults->set_bestpopsong($awardDAL->PronadjiAwardID((int) $this->_request['BESTPOPSONG']));
				$awardDAL = new AwardDAL();
				$awardresults->set_bestrocksong($awardDAL->PronadjiAwardID((int) $this->_request['BESTROCKSONG']));
				$awardDAL = new AwardDAL();
				$awardresults->set_bestvideo($awardDAL->PronadjiAwardID((int) $this->_request['BESTVIDEO']));
				
                $awardresultsDAL = new AwardResultsDAL();
                $succ = $awardresultsDAL->AwardGlasaj($awardresults);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
                 
            }
			
			 private function awardsresults() {
                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $awardresultsDAL = new AwardResultsDAL();
                $vesti = $awardresultsDAL->PrikaziSveAwardsResults();
                $this->response($this->json($vesti), 200);
                 
            }
			
			//*** glasaj awards kraj
			
			//**** vesti pocetak
            private function vesti() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $VestiDAL = new VestiDAL();
                $vesti = $VestiDAL->PrikaziSveVesti();
                $this->response($this->json($vesti), 200);
            }
            
            private function vestipretraga() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);
                
                $search = (string) $this->_request['search'];
                $VestiDAL = new VestiDAL();
                $vesti = $VestiDAL->PrikaziVestiPretraga($search);
                $this->response($this->json($vesti), 200);
            }

            private function vest() {

                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $idvest = (int) $this->_request['idvest'];
                if ($idvest > 0) {
                    $VestiDAL = new VestiDAL();
                    $vest = $VestiDAL->PronadjiVestiID($idvest);
                    $result = array();
                    array_push($result, $vest);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }

            private function dodajvest() {
                if ($this->get_request_method() != "POST") {
                    $this->response('', 406);
                }

                $vest = new Vesti();
                $vest->set_naslovvesti((string) $this->_request['NASLOVVESTI']);
                $vest->set_datumvesti((string) $this->_request['DATUMVESTI']);
				$vest->set_tekstvesti( $this->_request['TEKSTVESTI']);
                $vest->set_highlight((string) $this->_request['HIGHLIGHT']);
				$vest->set_slika((string) $this->_request['SLIKA']);
                $kategorijaDAL = new KategorijaDAL();
                $vest->set_idKategorija($kategorijaDAL->PronadjiKategorijaID((int) $this->_request['IDKATEGORIJA']));
				
				 $korisnikDAL = new KorisnikDAL();
                $vest->set_idKorisnik($korisnikDAL->PronadjiKorisnikaID((int) $this->_request['IDKORISNIK']));
				
                $vestiDAL = new VestiDAL();
                $succ = $vestiDAL->DodajVest($vest);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
                 
            }
			 private function izmenivest() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $vest = new Vesti();
                $vest->set_idVesti((int) $this->_request['idvest']);
                $vest->set_datumvesti((string) $this->_request['DATUMVESTI']);
                $vest->set_naslovvesti((string) $this->_request['NASLOVVESTI']);
				$vest->set_tekstvesti((string) $this->_request['TEKSTVESTI']);
                $vest->set_highlight((string) $this->_request['HIGHLIGHT']);
				$vest->set_slika((string) $this->_request['SLIKA']);
              
                $kategorijaDAL = new KategorijaDAL();
                $vest->set_idKategorija($kategorijaDAL->PronadjiKategorijaID((int) $this->_request['IDKATEGORIJA']));
				
				$korisnikDAL = new KorisnikDAL();
                $vest->set_idKorisnik($korisnikDAL->PronadjiKorisnikaID((int) $this->_request['IDKORISNIK']));

                $vestDAL = new VestiDAL();
                $succ = $vestDAL->IzmeniVest($vest);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
           

            private function obrisivest() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $vest = new Vesti();
                $vest->set_idVesti((int) $this->_request['idvest']);
                $vestiDAL = new VestiDAL();
                $succ = $vestiDAL->ObrisiVest($vest);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
			
			private function viewvest() {
                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $idvest = (int) $this->_request['idvest'];
                if ($idvest > 0) {
                    $vestiDAL = new VestiDAL();
                    $vest = $vestiDAL->PronadjiVestiID($idvest);
                    $result = array();
                    array_push($result, $vest);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
			//**** vesti kraj
			
			//**** kategorije pocetak
            private function kategorije() {
                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $KategorijaDAL = new KategorijaDAL();
                $KategorijaArr = $KategorijaDAL->PrikaziSveKategorije();
                $this->response($this->json($KategorijaArr), 200);
            }

            private function kategorija() {
                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }
                $idkategorija = (int) $this->_request['idkategorija'];
                if ($idkategorija > 0) {
                    $KategorijaDAL = new KategorijaDAL();
                    $kategorija = $KategorijaDAL->PronadjiKategorijaID($idkategorija);
                    $result = array();
                    array_push($result, $kategorija);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
			//**** kategorije kraj
			
			
			//***** korisnici pocetak
			 private function korisnici() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $KorisnikDAL = new KorisnikDAL();
                $korisnici = $KorisnikDAL->PrikaziSveKorisnike();
                $this->response($this->json($korisnici), 200);
            }
            
            private function korisnicipretraga() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);
                
                $search = (string) $this->_request['search'];
                $KorisnikDAL = new KorisnikDAL();
                $korisnici = $KorisnikDAL->PrikaziKorisnikePretraga($search);
                $this->response($this->json($korisnici), 200);
            }
			private function viewuser() {
                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $idkorisnik = (int) $this->_request['idkorisnik'];
                if ($idkorisnik > 0) {
                    $korisnikDAL = new KorisnikDAL();
                    $korisnik = $korisnikDAL->PronadjiKorisnikaID($idkorisnik);
                    $result = array();
                    array_push($result, $korisnik);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
			
            private function korisnik() {

                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $idkorisnik = (int) $this->_request['idkorisnik'];
                if ($idkorisnik > 0) {
                    $KorisnikDAL = new KorisnikDAL();
                    $korisnik = $KorisnikDAL->PronadjiKorisnikaID($idkorisnik);
                    $result = array();
                    array_push($result, $korisnik);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }  
			
			private function pronadjikorisnika() {

                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $username = (string) $this->_request['username'];
                if ($username != null) {
                    $KorisnikDAL = new KorisnikDAL();
                    $korisnik = $KorisnikDAL->PronadjiKorisnikaUSERNAME($username);
                    $result = array();
                    array_push($result, $korisnik);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
			
			private function pronadjikorisnikaID() {

                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }

                $id = (string) $this->_request['id'];
                if ($id != null) {
                    $KorisnikDAL = new KorisnikDAL();
                    $korisnik = $KorisnikDAL->PronadjiKorisnikaID($id);
                    $result = array();
                    array_push($result, $korisnik);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }

            private function kreirajnalog()
            {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $korisnik = new Korisnik();
                $korisnik->set_username((string) $this->_request['USERNAME']);
                $korisnik->set_password((string) $this->_request['PASSWORD']);
                $korisnik->set_email((string) $this->_request['EMAIL']);
				$korisnik->set_slika((string) $this->_request['SLIKA']);
                $korisnik->set_datumrodjenja((string) $this->_request['DATUMRODJENJA']);
                $korisnik->set_ime((string) $this->_request['IME']);
                $korisnik->set_prezime((string) $this->_request['PREZIME']);
				$korisnik->set_status((string) $this->_request['IDSTATUS']);
				
                $korisnikDAL = new KorisnikDAL();
                
                $succ = $korisnikDAL->DodajKorisnika($korisnik);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
			
			 private function dodajkorisnikaadmin()
            {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $korisnik = new Korisnik();
                $korisnik->set_username((string) $this->_request['USERNAME']);
                $korisnik->set_password((string) $this->_request['PASSWORD']);
                $korisnik->set_email((string) $this->_request['EMAIL']);
				$korisnik->set_slika((string) $this->_request['SLIKA']);
                $korisnik->set_datumrodjenja((string) $this->_request['DATUMRODJENJA']);
                $korisnik->set_ime((string) $this->_request['IME']);
                $korisnik->set_prezime((string) $this->_request['PREZIME']);
				$korisnik->set_status((string) $this->_request['IDSTATUS']);
				
			   $korisnikDAL = new KorisnikDAL();
               $succ = $korisnikDAL->DodajKorisnikaAdmin($korisnik);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
			
			 private function izmenikorisnika() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $korisnik = new Korisnik();
				$korisnik->set_idKorisnik((int) $this->_request['idkorisnik']);
                $korisnik->set_username((string) $this->_request['USERNAME']);
                $korisnik->set_password((string) $this->_request['PASSWORD']);
                $korisnik->set_email((string) $this->_request['EMAIL']);
				$korisnik->set_slika((string) $this->_request['SLIKA']);
                $korisnik->set_datumrodjenja((string) $this->_request['DATUMRODJENJA']);
                $korisnik->set_ime((string) $this->_request['IME']);
                $korisnik->set_prezime((string) $this->_request['PREZIME']);
				$korisnik->set_status((string) $this->_request['IDSTATUS']);
                
                $korisnikDAL = new KorisnikDAL();
                $succ = $korisnikDAL->IzmeniKorisnika($korisnik);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
           

            private function obrisikorisnika() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $korisnik = new Korisnik();
                $korisnik->set_idKorisnik((int) $this->_request['idkorisnik']);
                $korisnikDAL = new KorisnikDAL();
                $succ = $korisnikDAL->ObrisiKorisnika($korisnik);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
			
			private function login()
            {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $username = (string) $this->_request['USERNAME'];
                $password = (string) $this->_request['PASSWORD'];
				
                $korisnikDAL = new KorisnikDAL();
                $korisnik = $korisnikDAL->PronadjiKorisnika($username, $password);

                $result = array();
                if ($korisnik->get_idKorisnik()>0) 
                {
                    array_push($result, $korisnik->get_username());
					array_push($result, $korisnik->get_status());
                    array_push($result, true);
                }
                else array_push($result, false);
                $this->response($this->json($result), 200);

            }

			//****** korisnici kraj
			
			//******* statusi pocetak
			
			 private function statusi() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $StatusDAL = new StatusDAL();
                $statusi = $StatusDAL->PrikaziSveStatuse();
                $this->response($this->json($statusi), 200);
            }

            private function status() {
                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }
                $idstatus = (int) $this->_request['idstatus'];
                if ($idstatus > 0) {
                    $StatusDAL = new StatusDAL();
                    $status = $StatusDAL->PronadjiStatusID($idstatus);
                    $result = array();
                    array_push($result, $status);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
			
			 //**** statusi kraj
			
			//******* kategorija award pocetak
			
			 private function katawards() {

                if ($this->get_request_method() != "GET")
                    $this->response('', 406);

                $kategorijaawardDAL = new KategorijaAwardDAL();
                $statusi = $kategorijaawardDAL->PrikaziSveKategorijeAward();
                $this->response($this->json($statusi), 200);
            }

            private function kataward() {
                if ($this->get_request_method() != "GET") {
                    $this->response('', 406);
                }
                $idkategorijaaward = (int) $this->_request['idkategorijaaward'];
                if ($idkategorijaaward > 0) {
                    $kategorijaawardDAL = new KategorijaAwardDAL();
                    $kategorijaaward = $kategorijaawardDAL->PronadjiKategorijaAwardID($idkategorijaaward);
                    $result = array();
                    array_push($result, $kategorijaaward);
                    $this->response($this->json($result), 200);
                }
                $this->response('', 204);
            }
						
			 //**** kategorija award kraj
        }
        
	$api = new API;
	$api->processApi();
?>