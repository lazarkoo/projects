<?php
require_once '/lib/class/Korisnik.php';

require_once '/lib/class/AwardResults.php';
$curl = curl_init('http://localhost/seminarski/services/awardsresults');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);
$awardresults = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $awardresult = new AwardResults();
    $awardresult->jsonDeserialize($data[$i]);
    array_push($awardresults, $awardresult);
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

<?php include 'header.php';?>


<section>
	<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">REZULTATI GLASANJA</h2>
						 
					<?php foreach($awardresults as $a): ?>
						<div class="single-blog-post">
							
							<p>Datum glasanja:  <?php echo $a->get_datumglasanja(); ?></p>
							<p>User: <?php echo $a->get_user(); ?></p>
							<p>Best male: <?php echo $a->get_bestmale()->get_nazivaward(); ?></p>
							<p>Best female: <?php echo $a->get_bestfemale()->get_nazivaward();; ?></p>
							<p>Best band: <?php echo $a->get_bestband()->get_nazivaward();; ?></p>
							<p>Best pop song: <?php echo $a->get_bestpopsong()->get_nazivaward();; ?></p>
							<p>Best rock song: <?php echo $a->get_bestrocksong()->get_nazivaward();; ?></p>
							<p>Best video: <?php echo $a->get_bestvideo()->get_nazivaward();; ?></p>
							
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