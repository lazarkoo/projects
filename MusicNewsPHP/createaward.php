<?php

if(!isset($_SESSION)) session_start();  
if (!isset($_SESSION["USERNAME"])) header('Location: index.php');
if ($_SESSION["IDSTATUS"]=="Citalac" or $_SESSION["IDSTATUS"]=="Novinar") header('Location: index.php');

require_once '/lib/class/Award.php';
require_once '/lib/class/Korisnik.php';

if (!empty($_POST['action']))
{
   
   $urlPOST = "http://localhost/seminarski/services/dodajaward";
   $curl_post_data = array(
		'NAZIV' => $_POST['NAZIV'],
        'IDKATEGORIJAAWARD' => $_POST['IDKATEGORIJAAWARD'],
		'SLIKA' => $_POST['SLIKA'],
        'VIDEO' => $_POST['VIDEO']
        );
		
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /seminarski/listawards.php');

}



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
</head>

<body>
	
	 <?php include ('header.php') ?>
	<section>
	<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Dodaj award</h2>
						 
						<div class="single-blog-post">
				    	<form method="post" action = "createaward.php">
				                  
							
							<div class="form-group col-md-12">
				                <input type="text" name="NAZIV" class="form-control" required="required" placeholder="Naziv">
				            </div>
				           
							<div class="form-group col-md-12">	
						    Kategorija: 
						   <select name="IDKATEGORIJAAWARD">
                                                        
                           <?php 
                                                        
                           $curl = curl_init('http://localhost/seminarski/services/katawards');
                           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                           $response = curl_exec($curl);
                           $data = json_decode($response);
                          $katawards = array();

                          for ($i=0; $i<=count($data)-1;$i++)
                          {
                          $kataward = new KategorijaAward();
                          $kataward->jsonDeserialize($data[$i]);
                          array_push($katawards, $kataward);
                          }
                          foreach($katawards as $a): ?>
                                                            
                         <option value="<?php echo $a->get_idKategorijaAward(); ?>">  <?php echo $a->get_nazivkategorijeaward(); ?> </option>
                                                        
                         <?php endforeach; ?>
                                                        
                           </select>
						</div>
						<div class="form-group col-md-12">
				                <input type="file" name="SLIKA" class="form-control" >
				            </div>
							
							<div class="form-group col-md-12">
				                <input type="text" name="VIDEO" class="form-control" placeholder="You Tube URL">
				            </div>
						
					
				            <div class="form-group col-md-12">
				                <input type="hidden" name="action" value="create" >
								<input type="submit" class="btn btn-primary pull-right" value="Save">
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