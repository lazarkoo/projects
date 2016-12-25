
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								
								<li><a href=""><i class="fa fa-envelope"></i> musicnews@mail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							
							
							<?php
                               
							if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
          
							if (isset($_SESSION["USERNAME"]))
							{
							
						?>
							
							<li>
							<form name="view<?php
							 $curl = curl_init("http://localhost/seminarski/services/pronadjikorisnika/?username=".$_SESSION["USERNAME"]);
                             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                             $response = curl_exec($curl);
                             $data = json_decode($response);
                                                           
                            $korisnik = new Korisnik();
                            $korisnik->jsonDeserialize($data[0]);
							echo $korisnik->get_idKorisnik();
                            ?>"  method="GET" action="user.php">
							<input type="hidden" name="idkorisnik" id="idkorisnik" value="
							<?php
							
							$curl = curl_init("http://localhost/seminarski/services/pronadjikorisnika/?username=".$_SESSION["USERNAME"]);
                             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                             $response = curl_exec($curl);
                             $data = json_decode($response);
                                                           
                            $korisnik = new Korisnik();
                            $korisnik->jsonDeserialize($data[0]);
							echo $korisnik->get_idKorisnik();
                            ?>">
                        
							<input type="hidden" value="<?php echo $_SESSION["USERNAME"];?>" onclick="document.view<?php
							
							$curl = curl_init("http://localhost/seminarski/services/pronadjikorisnika/?username=".$_SESSION["USERNAME"]);
                             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                             $response = curl_exec($curl);
                             $data = json_decode($response);
                                                           
                            $korisnik = new Korisnik();
                            $korisnik->jsonDeserialize($data[0]);
							echo $korisnik->get_idKorisnik();
                            ?>.submit()\ />";
							</form> 	
							</li>
							
							<?php	
										
							echo "<li><a href=\"user.php\">";
							echo $_SESSION["USERNAME"];
							
							echo "</a></li>";
							
							
							
							echo "<li><a href=\"logout.php\">";
							echo "Logout";
							echo "</a></li>";
									}
							
								
							if (!isset($_SESSION["USERNAME"]))
							{
							
									
								echo "<li><a href=\"login.php\"><i class=\"fa fa-lock\"></i> Login</a></li>";
								echo "<li><a href=\"register.php\"><i class=\"fa fa-lock\"></i> Register</a></li>";
									}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<?php
                               
							if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
          
							if ((isset($_SESSION["USERNAME"])) and  (($_SESSION["IDSTATUS"]=="Admin")))
							{
							echo "<li class=\"dropdown\"><a href=\"#\">Administracija<i class=\"fa fa-angle-down\"></i></a>";
                            echo "<ul role=\"menu\" class=\"sub-menu\">";
                              echo          "<li><a href=\"listvesti.php\">Vesti</a></li>";
							   echo          "<li><a href=\"listawards.php\">Awards</a></li>";
							     echo          "<li><a href=\"listusers.php\">Korisnici</a></li>";
								echo "</ul>";
                              echo  "</li>"; 
									}
									elseif ((isset($_SESSION["USERNAME"])) and  (($_SESSION["IDSTATUS"]=="Novinar")))
							{
							echo "<li class=\"dropdown\"><a href=\"#\">Administracija<i class=\"fa fa-angle-down\"></i></a>";
                            echo "<ul role=\"menu\" class=\"sub-menu\">";
                              echo          "<li><a href=\"listvesti.php\">Vesti</a></li>";
							 
								echo "</ul>";
                              echo  "</li>"; 
									}
									elseif ((isset($_SESSION["USERNAME"])) and  (($_SESSION["IDSTATUS"]=="Citalac")))
									{
										
									}
									
								?>
								<li><a href="autor.php">Autor</a></li>
							</ul>
						</div>
					</div>
					<?php include ('search.php') ?>
				</div>
			</div>
		</div><!--/header-bottom-->
		
		<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>MUSIC</span>-NEWS</h1>
									<h2>Dobro došli na naš web sajt</h2>
									<p>Pronađite najnovije vesti iz sveta muzike</p>
									
								</div>
								<div class="col-sm-6">
									<img src="images/home/1.jpg" width = "484px" height="441px" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>MUSIC</span>-NEWS</h1>
									<h2>Music Awards</h2>
									<p>Glasajte u Music Awards</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/2.jpg" width = "484px" height="441px" class="girl img-responsive" alt="" />
									</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>MUSIC</span>-NEWS</h1>
									<h2>Top Lista</h2>
									<p>Pogledajte top listu za ovu nedelju</p>
									<button type="button" class="btn btn-default get"><a href="toplista.php">Pogledajte</a></button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/3.jpg" width = "484px" height="441px" class="girl img-responsive" alt="" />
									
								</div>
							</div>
						
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
		
	</header><!--/header-->
	
	
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Ostalo</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Music Awards - Nominees
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="bestmale.php">Best male </a></li>
											<li><a href="bestfemale.php">Best female </a></li>
											<li><a href="bestband.php">Best band </a></li>
											<li><a href="bestpop.php">Best pop song</a></li>
											<li><a href="bestrock.php">Best rock song </a></li>
											<li><a href="bestvideo.php">Best music video </a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<?php
                               
							if(!isset($_SESSION)) 
							{ 
							session_start(); 
							} 
          
							if ((isset($_SESSION["USERNAME"])) and ($_SESSION["IDSTATUS"] =="Admin"))
							{
							echo "<div class=\"panel panel-default\">";
							echo "<div class=\"panel-heading\">";
							echo "<h4 class=\"panel-title\">";
							echo "<a href=\"musicawardsvote.php\">";
							echo "Music Awards - Vote";
							echo "</a></h4>";
							echo "</div>";
							echo "</div>";	
							echo "<div class=\"panel panel-default\">";
							echo "<div class=\"panel-heading\">";
							echo "<h4 class=\"panel-title\">";
							echo "<a href=\"musicawardsresults.php\">";
							echo "Music Awards - Results";
							echo "</a></h4>";
							echo "</div>";
							echo "</div>";							
							}
							elseif (isset($_SESSION["USERNAME"]))
							{
							echo "<div class=\"panel panel-default\">";
							echo "<div class=\"panel-heading\">";
							echo "<h4 class=\"panel-title\">";
							echo "<a href=\"musicawardsvote.php\">";
							echo "Music Awards - Vote";
							echo "</a></h4>";
							echo "</div>";
							echo "</div>";					
							}
							
							?>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="toplista.php">Top Lista</a></h4>
								</div>
							</div>
						<div class="panel panel-default">
								<div class="panel-heading">
									
								</div>
							</div>
							
						</div>
					
						
						
						
					</div>
				</div>