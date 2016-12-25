	<?php
if(!isset($_SESSION)) session_start(); 
if (!isset($_SESSION["USERNAME"])) header('Location: index.php');
$username = ($_SESSION["USERNAME"]);

require_once '/lib/class/AwardResults.php';	
require_once '/lib/class/Award.php';
require_once '/lib/class/Korisnik.php';

if (!empty($_POST['action']))
{
   $urlPOST = "http://localhost/seminarski/services/awardsglasaj";
   $curl_post_data = array(
		'DATUMGLASANJA' => $_POST['DATUMGLASANJA'],
		'USER' => $_POST['USER'],
		'BESTMALE' => $_POST['BESTMALE'],
		'BESTFEMALE' => $_POST['BESTFEMALE'],
        'BESTBAND' => $_POST['BESTBAND'],
		'BESTPOPSONG' => $_POST['BESTPOPSONG'],
		'BESTROCKSONG' => $_POST['BESTROCKSONG'],
		'BESTVIDEO' => $_POST['BESTVIDEO']
        );
		

   $curl = curl_init($urlPOST);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
   $response = curl_exec($curl);
   if ($response) header('Location: /seminarski/index.php');

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
						<h2 class="title text-center">Voting form</h2>
						 
						<div class="single-blog-post">
				    	<form ACTION="musicawardsvote.php" METHOD="POST">
				            
							<div class="form-group col-md-12">
							<input type="hidden" name="DATUMGLASANJA" value="<?php echo  date('d.m.Y'); ?>" />
							Datum: &nbsp; <?php echo  date('d.m.Y'); ?>
							
							 </div>
							<div class="form-group col-md-12">
				            Username:   <input type="text" name="USER" class="form-control" value="<?php echo $username; ?>" required="required">
				            </div>
							<div class="form-group col-md-12">	
						    Best male artist: 
						    <select name="BESTMALE">
                                                        
                                                        <?php 
                                                        
                                                            $curl = curl_init('http://localhost/seminarski/services/awardsmale');
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
                                                        
                                                            foreach($awards as $a): 
                                                           ?>
                                                            
                                                     <option value="<?php echo $a->get_idAward(); ?>">  <?php echo $a->get_nazivaward(); ?> </option>
                                                        
                                                            <?php
                                                                
                                                            endforeach;
                                                        ?>
                                                        
                           </select>
						</div>
				          <div class="form-group col-md-12">	
						    Best female artist: 
						    <select name="BESTFEMALE">
                                                        
                                                        <?php 
                                                        
                                                            $curl = curl_init('http://localhost/seminarski/services/awardsfemale');
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
                                                        
                                                            foreach($awards as $a): 
                                                           ?>
                                                            
                                                     <option value="<?php echo $a->get_idAward(); ?>">  <?php echo $a->get_nazivaward(); ?> </option>
                                                        
                                                            <?php
                                                                
                                                            endforeach;
                                                        ?>
                                                        
                           </select>
						</div>
												
							  <div class="form-group col-md-12">	
						    Best band: 
						    <select name="BESTBAND">
                                                        
                                                        <?php 
                                                        
                                                            $curl = curl_init('http://localhost/seminarski/services/awardsband');
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
                                                        
                                                            foreach($awards as $a): 
                                                           ?>
                                                            
                                                     <option value="<?php echo $a->get_idAward(); ?>">  <?php echo $a->get_nazivaward(); ?> </option>
                                                        
                                                            <?php
                                                                
                                                            endforeach;
                                                        ?>
                                                        
                           </select>
						</div>
							<div class="form-group col-md-12">	
						    Best pop song: 
						    <select name="BESTPOPSONG">
                                                        
                                                        <?php 
                                                        
                                                            $curl = curl_init('http://localhost/seminarski/services/awardspopsong');
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
                                                        
                                                            foreach($awards as $a): 
                                                           ?>
                                                            
                                                     <option value="<?php echo $a->get_idAward(); ?>">  <?php echo $a->get_nazivaward(); ?> </option>
                                                        
                                                            <?php
                                                                
                                                            endforeach;
                                                        ?>
                                                        
                           </select>
						</div>
						
						<div class="form-group col-md-12">	
						    Best rock song: 
						    <select name="BESTROCKSONG">
                                                        
                                                        <?php 
                                                        
                                                            $curl = curl_init('http://localhost/seminarski/services/awardsrocksong');
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
                                                        
                                                            foreach($awards as $a): 
                                                           ?>
                                                            
                                                     <option value="<?php echo $a->get_idAward(); ?>">  <?php echo $a->get_nazivaward(); ?> </option>
                                                        
                                                            <?php
                                                                
                                                            endforeach;
                                                        ?>
                                                        
                           </select>
						</div>
						
						<div class="form-group col-md-12">	
						    Best video: 
						    <select name="BESTVIDEO">
                                                        
                                                        <?php 
                                                        
                                                            $curl = curl_init('http://localhost/seminarski/services/awardsvideo');
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
                                                        
                                                            foreach($awards as $a): 
                                                           ?>
                                                            
                                                     <option value="<?php echo $a->get_idAward(); ?>">  <?php echo $a->get_nazivaward(); ?> </option>
                                                        
                                                            <?php
                                                                
                                                            endforeach;
                                                        ?>
                                                        
                           </select>
						</div>
				            <div class="form-group col-md-12">
				                <input type="hidden" name="action" value="awardsvote" >
								
								<input TYPE="submit" name="submit" class="btn btn-primary pull-right" value="VOTE"/>
							
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