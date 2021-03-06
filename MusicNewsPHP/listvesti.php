<?php
if(!isset($_SESSION)) session_start(); 
if (!isset($_SESSION["USERNAME"])) header('Location: index.php');
if ($_SESSION["IDSTATUS"]=="Citalac") header('Location: index.php');
require_once '/lib/class/Vesti.php';

$curl = curl_init('http://localhost/seminarski/services/vesti');
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
	<section>
				
	 <?php include ('header.php') ?>
		<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Administracija vesti</h2>
						 
						<div class="single-blog-post">
				    	
				            <div class="form-group col-md-12">
				            <h3><a href = "createvest.php">Dodaj vest</a></h3>
							<hr>
							</div>
							<table>
							<?php foreach($vesti as $v): ?>
							
							
							<tr>
							<td>
				                Naslov vesti: <?php echo $v->get_naslovvesti(); ?> &nbsp;
							</td>
							<td>
							
								<form name="edit<?php echo $v->get_idVesti(); ?>" method="GET" action="editvesti.php">
								<input type="hidden" name="idvest" id="idvest" value="<?php echo $v->get_idVesti(); ?>"/>
								<input type="Button" value="EDIT" onclick="document.edit<?php echo $v->get_idVesti(); ?>.submit()"/>
								</form>
				            </td>
							<td>
								<form name="delete<?php echo $v->get_idVesti(); ?>" method="POST" action="deletevest.php">
							<input type="hidden" name="idvest" id="idvest" value="<?php echo $v->get_idVesti(); ?>"/>
							&nbsp;&nbsp;<input type="Button" value="DELETE" onclick="document.delete<?php echo $v->get_idVesti(); ?>.submit()"/>
								</form>
				            </td>
							</tr>
							
							<?php endforeach; ?>
							</table>
						
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