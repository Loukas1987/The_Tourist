<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>O Τουρίστας-Web Εφαρμογή</title>
	
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet" media="screen">
 <link type="text/css" rel="stylesheet" href="css/style.css">
     <link type="text/css" rel="stylesheet" href="css/example.css">
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      

	<link href="css/carousel.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="css/font-awesome-ie7.css" media="screen" /><![endif]-->

	<link rel="stylesheet" href="css/jquery-ui.css" />	
    <script src="js/jquery.v2.0.3.js"></script>
	

	
  </head>
  <body id="top" class="thebg" >
    
<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">

			<div class="container offset-3">
			  <!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="Ο Τουρίστας - Διαδικτυακή Εφαρμογή" class="logo"/></a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				 <li><a href="index.php">Αρχική Σελίδα</a></li>
				 <li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">Μορφές Τουρισμού<b class="lightcaret mt-2"></b></a>
					<ul class="dropdown-menu">
					  <li class="dropdown-header">Οι μορφές τουρισμού που υπάρχουν</li>	
					  <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from tourism_types ORDER BY id ASC' );
while($dnn = mysql_fetch_array($req))
{
?>
					  <li><a href="tourism_type.php?id=<?php echo $dnn['id']; ?>"><?php echo $dnn['title']; ?></a></li>
					  		<?php
}
?>
							</ul>
				  </li>				  
				  	
	<!-- LOGIN-SIGNUP PANEL -->
    <?php if(isset($_SESSION['username']))
    {
    ?>
	<!-- PANEL IF LOGGED USER -->
					 <li class="dropdown">

	
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
	<?php 
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$user' AND user_type=1";
    $result = mysql_query($sql) or die ("Δεν επιτρέπεται η πρόσβαση στην Βάση Δεδομένων: " . mysql_error());
     while ($row = mysql_fetch_assoc($result))
     {echo $row['username'].'<b class="lightcaret mt-2"></b>';
	 
    ?><b class="lightcaret mt-2"></b></a>
					<ul class="dropdown-menu">
					  <li class="dropdown-header">Στοιχεία Λογαριασμού</li>	
					  <li><a href="profile.php?id=<?php echo $row['id']; ?>">Προφίλ Λογαριασμού</a></li>
					  <li><a href="admin-settings.php">Ρυθμίσεις Ιστολογίου</a></li>
					  <li><a href="connection.php">Αποσύνδεση</a></li>	 
					</ul>
					<?php } ?>
					<?php 
    $user = $_SESSION['username'];
    $sql = "SELECT username FROM users WHERE username='$user' AND user_type!=1";
    $result = mysql_query($sql) or die ("Δεν επιτρέπεται η πρόσβαση στην Βάση Δεδομένων: " . mysql_error());
     while ($row = mysql_fetch_assoc($result))
     {echo $row['username'].'<b class="lightcaret mt-2"></b>';
    ?>
	<b class="lightcaret mt-2"></b></a>
					<ul class="dropdown-menu">
					  <li class="dropdown-header">Στοιχεία Λογαριασμού</li>	
					  <li><a href="profile.php">Προφίλ Λογαριασμού</a></li>
					  <li><a href="connection.php">Αποσύνδεση</a></li>	 
					</ul>
					<?php } ?>
	</a>
	</li>
    <?php
    }
    else
    {
    ?>
	<!-- PANEL IF NON-LOGGED USER -->
    <li><a href="signup.php">Εγγραφή Μέλους</a></li>
    <li><a href="login.php">Σύνδεση</a></li>
    <?php
    }
    ?>                       
    
				  </ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
		
        </div>
      </div>
   </div>	
	<div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="index.php"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
					<li><a href="#" class="active">Κατηγορία Τουρισμού</a></li>					
				</ul>				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">

		
		<div class="container mt25 offset-0">
			
			
			<!-- CONTENT -->
			 <?php

                                        //WE CHECK IF THE EVENT ID IS DEFINED
                                        if(isset($_GET['id']))
                                        {
	                                    $id = intval($_GET['id']);
										//COUNT VIEWS OF THE EVENT PAGE
	                                    //WE CHECK IF THE EVENT EXISTS
                                        $dn = mysql_query('select * from tourism_types where id="'.$id.'"');
	                                            if(mysql_num_rows($dn)>0)
	                                            {
		                                         $dnn = mysql_fetch_array($dn);
		                                         //WE DISPLAY TOURISM TYPE DATAS
                                        ?>
			<div class="col-md-12 pagecontainer2 offset-0">
				<div class="hpadding50c">
					<p class="lato size30 slim"><?php echo htmlentities($dnn['title'], ENT_QUOTES, 'UTF-8'); ?></p>
					<p class="aboutarrow"></p>
				</div>
				<div class="line3"></div>
				
				<div class="hpadding50c">
				
					<!-- LEFT IMG -->
					<div class="col-md-8 cpdd01 grey2">
						<div class="abover">
							<img src="<?php echo htmlentities($dnn['image_src'], ENT_QUOTES, 'UTF-8'); ?>" class="fwimg" alt=""/>
						</div><br/>
						
						<span class="lato size22 dark bold"><?php echo htmlentities($dnn['title'], ENT_QUOTES, 'UTF-8'); ?></span><br/>
						<div class="line4"></div>
						<?php echo htmlentities($dnn['description'], ENT_QUOTES, 'UTF-8'); ?>
						<br/><br/>
						<br/><br/>
						
						<br/>
						<br/>
					</div>
					<!-- END OF LEFT IMG -->
					
					<!-- IMG RIGHT TEXT -->
					<div class="col-md-4 cpdd02">
						<div class="opensans grey">
							<span class="lato size18 dark bold">Καταχωρήσεις ανά τύπο Τουρισμού</span><br/>
							<br/>
							<ul class="blogcat">
							 <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from tourism_types' );
$req1 = mysql_query('SELECT COUNT( * ) AS count,tourism_type FROM places GROUP BY tourism_type ORDER BY tourism_type ASC' );
while(($dnn = mysql_fetch_array($req))&& $dnn1=mysql_fetch_array($req1))
{
?>
								<li><a href="tourism_type?id=<?php echo $dnn['id']; ?>"><?php echo $dnn['title']; ?></a> <span class="badge indent0"><a href="tourism_type?id=<?php echo $dnn1['tourism_type']; ?>"><?php echo $dnn1['count']; ?></a></span></li>
								<?php 
							}
                        ?>
								</ul>
							<br/>
							<br/><br/>
							
							<!-- Nav tabs -->
							<ul class="nav navigation-tabs3">
							  <li class="active"><a href="#tab-newtopic" data-toggle="tab"><span class="glyphicon glyphicon-star"></span>Ίδιου Τύπου</a></li>
							  <li><a href="#tab-comments" data-toggle="tab"><span class="glyphicon glyphicon-stats"></span> Δημοφιλείς</a></li>

							</ul>
							
							<div class="tab-content4">
								<!-- Tab 1 -->
								<div class="tab-pane active" id="tab-newtopic">
							   
							    <?php
                               mysql_connect('localhost','user730','fTybYz7N') or die(mysql_error());
                               mysql_select_db('user730_db2') or die(mysql_error()); 
                               $id = intval($_GET['id']);							   
					           $req = mysql_query("SELECT * FROM places WHERE tourism_type='$id'" );							   
      while($row = mysql_fetch_array($req))  {

$id1=$row['id'];
  $query = mysql_query("SELECT * FROM places_rating WHERE id_places='$id1'");
  $sum_rates = array();
for ($i=0; $i<=2; $i++) {
           $sum_rates[] = $i;
       }
			  while($data = mysql_fetch_array($query)){
                    $rate_db[i] = $data;
                    $sum_rates[i] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
   
                               ?>
							   
									<a href="place.php?id=<?php  echo $row['id']; ?>"><img alt="" class="left mr20" width="100px" src="<?php  echo $row['main_image_src']; ?>"></a>
									<a class="dark" href="place.php?id=<?php  echo $row['id']; ?>">
									<b><?php  echo $row['title']; ?></b>
								    <div class="rate-result-cnt">
                                       <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                                        <div class="rate-stars"></div>
                                         </div></br></br></br></br>
									<div class="line4"></div>
										<?php 
							}
                        ?>
										
								</div>
								<!-- End of Tab 1 -->
								
								<!-- Tab 2 -->
								<div class="tab-pane" id="tab-comments">
								 <?php
                               mysql_connect('localhost','user730','fTybYz7N') or die(mysql_error());
                               mysql_select_db('user730_db2') or die(mysql_error());  
                               $id = intval($_GET['id']);
							   $req = mysql_query("SELECT * FROM places WHERE tourism_type='$id' ORDER BY views DESC" );
  while($row = mysql_fetch_array($req))  {

$id1=$row['id'];
  $query = mysql_query("SELECT * FROM places_rating WHERE id_places='$id1'");
  $sum_rates = array();
for ($i=0; $i<=2; $i++) {
           $sum_rates[] = $i;
       }
			  while($data = mysql_fetch_array($query)){
                    $rate_db[i] = $data;
                    $sum_rates[i] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
							   
                               ?>
							   
									<a href="place.php?id=<?php  echo $row['id']; ?>"><img alt="" class="left mr20" width="100px" src="<?php  echo $row['main_image_src']; ?>"></a>
									<a class="dark" href="place.php?id=<?php  echo $row['id']; ?>">
									<b><?php  echo $row['title']; ?></b>
								    <div class="rate-result-cnt">
                                       <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                                        <div class="rate-stars"></div>
                                         </div></br></br></br></br>
									<div class="line4"></div>
									
									<?php 
							}
                        ?>
									
								</div>
								<!-- End of Tab 2 -->
								
								<!-- Tab 3 -->
								<div class="tab-pane" id="tab-blogcomments">

								</div>
								<!-- End of Tab 3 -->
							</div>

						</div>
					</div>
					<!-- END OF IMG RIGHT TEXT -->
					<div class="clearfix"></div>
					<br/><br/>
					
				

					
					
				</div>
				

				
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>
		
		
	</div>
	<!-- END OF CONTENT -->
	

	
	
	<!-- FOOTER -->
	
	<div class="footerbgblack">
		<div class="container">		
			<?php
                    $sql = mysql_query('select * from settings' );
                    while($dnn2 = mysql_fetch_array($sql))
                    {
					?>
			<div class="col-md-12">
				<div class="scont">
				        <a href="<?php echo $dnn2['Facebook_url']; ?>" class="social1b"><img src="images/icon-facebook.png" alt=""/></a>
						<a href="<?php echo $dnn2['Twitter_url']; ?>" class="social2b"><img src="images/icon-twitter.png" alt=""/></a>
						<a href="<?php echo $dnn2['google_plus_url']; ?>" class="social3b"><img src="images/icon-gplus.png" alt=""/></a>
						<a href="<?php echo $dnn2['youtube_url']; ?>" class="social4b"><img src="images/icon-youtube.png" alt=""/></a>
					<br/><br/><br/>
					<a href="#"><img src="<?php echo $dnn2['footer_logo']; ?>" alt="" /></a><br/>
					Copyright &copy; <?php echo date("Y") ?> <a href="#">Ο Τουρίστας</a>. <a href="https://ma.ellak.gr/">ΜΑ/ἜΛΛΑΚ</a>
					<br/><br/>
					<?php 
						}
						?>
				</div>
			</div>
			<!-- End of column 1-->
				
			
			
		</div>	
	</div>
 <div class="footerbg3black">
		<div class="container center grey"> 
		<a href="#top" class="gotop scroll"><img src="images/spacer.png" alt=""/></a>
		</div>
	</div>
 <?php
	                                             }
	                                             else
	                                             {
		                                         echo 'Αυτό το γεγονός δεν είναι καταχωρημένο.';
	                                             }
                                               }
                                               else
                                               {
	                                           echo 'Το ID του γεγονόντος αυτού δεν προσδιορίζεται.';
                                               }
                                             ?>
	
	
	<script src="js/js-blog.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/functions.js"></script>
	<script type='text/javascript' src='js/lightbox.js'></script>	
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>
    <script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/helper-plugins/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>
	<script src="js/jquery-ui.js"></script>	
    <script src="js/jquery.easing.js"></script>	
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
