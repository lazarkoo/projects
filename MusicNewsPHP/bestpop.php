<?php

require_once '/lib/class/Award.php';
require_once '/lib/class/Korisnik.php';


$targetURL;
$targetURL = "http://localhost/seminarski/services/awardspopsong";

$curl = curl_init($targetURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response);


$awards = array();

for ($i=0; $i<=count($data)-1;$i++)
{
    $award = new Award();
    $award->jsonDeserialize($data[$i]);
    array_push($awards, $award);
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
						<h2 class="title text-center">BEST POP SONG - NOMINOVANI</h2>
						 <?php foreach($awards as $a): ?>
						<div class="single-blog-post">
							<center><h3><?php echo $a->get_nazivaward(); ?><br/></h3></center>
							
							
								<center><iframe width="350" height="250"src="<?php echo $a->get_video(); ?>"></iframe></center> 
							
						</div>
						<hr>
						
						<?php endforeach; ?>
					
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