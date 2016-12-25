<?php

if(!isset($_SESSION)) session_start(); 
if (!isset($_SESSION["USERNAME"])) header('Location: index.php');
if ($_SESSION["IDSTATUS"]=="Citalac") header('Location: index.php');
require_once '/lib/class/Vesti.php';


if (!empty($_POST['action']))
{
   
   $urlPOST = "http://localhost/seminarski/services/izmenivest";
   $curl_post_data = array(
        'idvest' => $_POST['idvest'],
        'DATUMVESTI' => $_POST['DATUMVESTI'],
        'NASLOVVESTI' => $_POST['NASLOVVESTI'],
		'TEKSTVESTI' => $_POST['TEKSTVESTI'],
        'HIGHLIGHT' => $_POST['HIGHLIGHT'],
		'SLIKA' => $_POST['SLIKA'],
		'IDKATEGORIJA' => $_POST['IDKATEGORIJA'],
        'IDKORISNIK' => $_POST['IDKORISNIK']
        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /seminarski/listvesti.php');

}


if (!empty($_GET['idvest']))
{
   $idvest = $_GET['idvest']; 
   $urlGet = "http://localhost/seminarski/services/vest/?idvest=".$idvest;
   $curl = curl_init($urlGet);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   $data = json_decode($response);
            
   $vest = new Vesti();
   $vest->jsonDeserialize($data[0]);

}
else header('Location: listvesti.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Music News</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	 <?php include ('header.php') ?>
	
	<section>
	<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Izmeni vest <?php echo $vest->get_naslovvesti(); ?></h2>
						 
						<div class="single-blog-post">
				    	<form method="post" action = "editvesti.php">
				            <div class="form-group col-md-12">
				             Datum: &nbsp;   <input type="date" name="DATUMVESTI" value="<?php echo $vest->get_datumvesti(); ?>" />
							</div>
							<div class="form-group col-md-12">
				                <input type="text" name="NASLOVVESTI" class="form-control" required="required" value="<?php echo $vest->get_naslovvesti(); ?>">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="HIGHLIGHT" class="form-control" rows="3" ><?php echo $vest->get_highlight(); ?></textarea>
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="TEKSTVESTI"  rows="8" ><?php echo $vest->get_tekstvesti(); ?></textarea>
				            </div>
							<div class="form-group col-md-12">						
							Slika: &nbsp;<input type="file" name="SLIKA" >
							</div>
							<div class="form-group col-md-12">
							Stara slika: <br>
							<img src="images/<?php echo $vest->get_slika(); ?>" width="200 px" height="100 px" alt="">
							
							</div>
							<div class="form-group col-md-12">	
						    Kategorija: 
						    <select name="IDKATEGORIJA">
                                                        
                            <?php 
                                                        
                              $curl = curl_init('http://localhost/seminarski/services/kategorije');
                              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                              $response = curl_exec($curl);
                              $data = json_decode($response);
                              $kategorije = array();

                              for ($i=0; $i<=count($data)-1;$i++)
                              {
                                $kategorija = new Kategorija();
                                $kategorija->jsonDeserialize($data[$i]);
                                array_push($kategorije, $kategorija);
                              }
                              foreach($kategorije as $k):  
                               ?>
                                                            
                              <option value="<?php echo $k->get_idKategorija(); ?>">  
							<?php if ($k->get_idKategorija() == $vest->get_idKategorija()->get_idKategorija())  ?>  
                            <?php echo $k->get_nazivkategorije(); ?> </option>
                                                        
                            <?php endforeach; ?>
                                                        
                           </select>
						</div>
						<div class="form-group col-md-12">	
						    <input type="hidden" name="IDKORISNIK" class="form-control" required="required" value="
							<?php 
                             $curl = curl_init("http://localhost/seminarski/services/pronadjikorisnika/?username=".$_SESSION["USERNAME"]);
                             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                             $response = curl_exec($curl);
                             $data = json_decode($response);
                                                           
                            $korisnik = new Korisnik();
                            $korisnik->jsonDeserialize($data[0]);
							echo $korisnik->get_idKorisnik();
                            ?>">
			
						</div>
						
				            <div class="form-group col-md-12">
							
				                <input type="hidden" name="action" value="edit" >
                                <input type="hidden" name="idvest" id="idvest" value="<?php echo $vest->get_idVesti(); ?>" >
								<input type="submit" class="btn btn-primary pull-right" value="EDIT" >
				            </div>
				        </form>
	    		</div>
				</div>
				</div>
		</div>
				</div>
				</section>
				
	<?php include ('footer.php') ?>
</body>
</html>