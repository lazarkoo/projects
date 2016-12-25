<?php
if(!isset($_SESSION)) session_start(); 
if (!isset($_SESSION["USERNAME"])) 
header('Location: index.php');

require_once '/lib/class/Korisnik.php';

if (!empty($_POST['action']))
{
   
   $urlPOST = "http://localhost/seminarski/services/viewuser";
   $curl_post_data = array(
        'idkorisnik' => $_POST['idkorisnik'],
        'USERNAME' => $_POST['USERNAME'],
        'EMAIL' => $_POST['EMAIL'],
		'IDSTATUS' => $_POST['IDSTATUS'],
		'SLIKA' => $_POST['SLIKA'],
		'DATUMRODJENJA' => $_POST['DATUMRODJENJA'],
        'IME' => $_POST['IME'],
        'PREZIME' => $_POST['PREZIME']
       
        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /seminarski/listusers.php');

}

if (!empty($_GET['idkorisnik']))
{
   $idkorisnik = $_GET['idkorisnik']; 
   $urlGet = "http://localhost/seminarski/services/korisnik/?idkorisnik=".$idkorisnik;
   $curl = curl_init($urlGet);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   $data = json_decode($response);
            
   $korisnik = new Korisnik();
   $korisnik->jsonDeserialize($data[0]);

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
</head><!--/head-->

<body>
	<?php include ('header.php') ?>
			<section>	
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Vaše informacije </h2>
						
						<div class="form-group col-md-6">
							<b>Ime:</b> &nbsp; <?php echo $korisnik->get_ime(); ?>   <br>
				             <b>Prezime:</b> &nbsp;   <?php echo $korisnik->get_prezime(); ?><br>
							
				             <b>Username:</b> &nbsp;   <?php echo $korisnik->get_username(); ?><br>
							 
				             <b>Email:</b> &nbsp;   <?php echo $korisnik->get_email(); ?><br>
						
				             <b>Datum rođenja:</b> &nbsp;   <?php echo $korisnik->get_datumrodjenja(); ?><br>
							 
				             <b>Vrsta korisnika:</b> &nbsp;   <?php echo $korisnik->get_status(); ?><br>
							 
							</div>
							
						</div>
						<div class="form-group col-md-6">
						
				             <img src="images/<?php echo $korisnik->get_slika(); ?>" width="150 px" height="150 px" alt="">
							</div>
						</div>
					
					
						<div class="pagination-area">
							
						</div>
					</div>
				</div>
			</div>
			</div>
	</section>
	
		<?php include ('footer.php') ?>
	

</body>
</html>