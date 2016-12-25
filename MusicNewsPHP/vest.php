<?php

require_once '/lib/class/Vesti.php';


if (!empty($_POST['action']))
{
   
   $urlPOST = "http://localhost/seminarski/services/viewvest";
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
						<h2 class="title text-center"><?php echo $vest->get_naslovvesti(); ?></h2>
						 
						 <div class="single-blog-post">
							
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php echo $vest->get_idKorisnik()->get_username(); ?></li>
									<li><i class="fa fa-calendar"></i> <?php echo $vest->get_datumvesti(); ?><br/></li>
									<li><i class="fa fa-calendar"></i>Kategorija: <?php echo $vest->get_idKategorija()->get_nazivkategorije(); ?></li>
								</ul>
								
							</div>
							<p> <?php echo $vest->get_highlight(); ?></p>
								<img src="images/<?php echo $vest->get_slika(); ?>" width="866 px" height="396 px" alt="">
							
							<br><br>
							<p> <?php echo $vest->get_tekstvesti(); ?></p>
							
						</div>
						 
	    		</div>
				</div>
				</div>
		</div>
				</div>
				</section>
				
	<?php include ('footer.php') ?>
</body>
</html>