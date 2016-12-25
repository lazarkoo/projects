<?php

if (!empty($_POST['USERNAME']) && !empty($_POST['PASSWORD']) && !empty($_POST['EMAIL']) && !empty($_POST['SLIKA']) && !empty($_POST['DATUMRODJENJA']) &&!empty($_POST['IME']) &&!empty($_POST['PREZIME']) &&!empty($_POST['IDSTATUS']))

{
	
   $urlPOST = "http://localhost/seminarski/services/kreirajnalog";
   $curl_post_data = array(
        'USERNAME' => $_POST['USERNAME'],
        'PASSWORD' => $_POST['PASSWORD'],
        'EMAIL' => $_POST['EMAIL'],
		'SLIKA' => $_POST['SLIKA'],
		'DATUMRODJENJA' => $_POST['DATUMRODJENJA'],
        'IME' => $_POST['IME'],
        'PREZIME' => $_POST['PREZIME'],
		'IDSTATUS' => $_POST['IDSTATUS']
        );
   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response)
   {
       // create session
       session_start();
       $_SESSION["USERNAME"]=$_POST['USERNAME'];
	   //$_SESSION["IDSTATUS"]=$_POST['IDSTATUS'];
       header('Location: /seminarski/index.php');
   }
   else header('Location: index.php');

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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Registrujte vaš nalog</h2>
						<form name="register" method="POST" action="register.php">
							<input type="text" name = "IME" placeholder="Ime" />
							<input type="text" name = "PREZIME" placeholder="Prezime" />
							<input type="text" name="USERNAME" placeholder="Username" />
							<input type="password" name = "PASSWORD" placeholder="Password" />
							<input type="email" name = "EMAIL" placeholder="Email" />
							Slika: &nbsp;<input type="file" name="SLIKA" >
							Datum rođenja:<input type="date" name="DATUMRODJENJA"  />
							<input type="hidden" name = "IDSTATUS" value=Citalac />
						  
						
							<input type="submit" class="btn btn-default" value ="Registruj se"/>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php include ('footer.php') ?>
</body>
</html>