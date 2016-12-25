<?php

require_once '/lib/class/Vesti.php';
require_once '/lib/class/Korisnik.php';
$targetURL;
if (!empty($_GET["search"])) $targetURL = "http://localhost/seminarski/services/vestipretraga/?search=".$_GET["search"];
else $targetURL = "http://localhost/seminarski/services/vesti";

$curl = curl_init($targetURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);


$vesti = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $vest = new Vesti();
    $vest->jsonDeserialize($data[$i]);
    array_push($vesti, $vest);
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
					
						<h2 class="title text-center">Najnovije vesti</h2>
						 
						 <?php foreach($vesti as $v): ?>
						
						  
						<div class="single-blog-post">
							<h3><?php echo $v->get_naslovvesti(); ?><br/></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php echo $v->get_idKorisnik()->get_username(); ?></li>
									<li><i class="fa fa-calendar"></i> <?php echo $v->get_datumvesti(); ?><br/></li>
									<li><i class="fa fa-calendar"></i>Kategorija: <?php echo $v->get_idKategorija()->get_nazivkategorije(); ?></li>
								</ul>
								
							</div>
							
								<img src="images/<?php echo $v->get_slika(); ?>" width="866 px" height="396 px" alt="">
							
							
							<p> <?php echo $v->get_highlight(); ?></p>
							
							<form name="edit<?php echo $v->get_idVesti(); ?>" method="GET" action="vest.php">
							<input type="hidden" name="idvest" id="idvest" value="<?php echo $v->get_idVesti(); ?>"/>
							<input type="Button" value="Read More" class="btn btn-primary" onclick="document.edit<?php echo $v->get_idVesti(); ?>.submit()"/>
							</form>      
						   
							
						</div>
						<hr>
							
					
						<?php endforeach; ?>
					
					</div>
				</div>
			</div>
			</div>
	</section>
	
		<?php include ('footer.php') ?>
	

</body>
</html>