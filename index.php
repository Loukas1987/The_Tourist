<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ο Τουρίστας - Διαδικτυακή Εφαρμογή ΜΑ/ἜΛΛΑΚ</title>
	
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />

    <!-- Carousel -->
	<link href="css/carousel.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="css/fullscreen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />

    <!-- Picker UI-->	
	<link rel="stylesheet" href="css/jquery-ui.css" />		
	
    <!-- jQuery -->	
    <script src="js/jquery.v2.0.3.js"></script>

	
  </head>
  <body id="top">
    
	<!-- Top wrapper -->			  
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
    $sql = "SELECT username FROM users WHERE username='$user' AND user_type=0";
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
	<!-- /Top wrapper -->	


	
	<div id="dajy" class="fullscreen-container mtslide sliderbg fixed">
			<div class="fullscreenbanner">	<div id="slider" class="nivoSlider"> 

	<?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from tourism_types ORDER BY id ASC' );
while($dnn = mysql_fetch_array($req))
{
?>
<img src="<?php echo $dnn['image_src']; ?>" data-thumb="images/up.jpg" alt="" data-transition="slideInLeft" title="<?php echo $dnn['title']; ?>" />
<?php
}
?>
</div></div></div>

	
		
		<script type="text/javascript">

			var tpj=jQuery;
			tpj.noConflict();

			tpj(document).ready(function() {

			if (tpj.fn.cssOriginal!=undefined)
				tpj.fn.css = tpj.fn.cssOriginal;

				tpj('.fullscreenbanner').revolution(
					{
						delay:9000,
						startwidth:1170,
						startheight:600,

						onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

						thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
						thumbHeight:50,
						thumbAmount:3,

						hideThumbs:0,
						navigationType:"bullet",				// bullet, thumb, none
						navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

						navigationStyle:round,				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


						navigationHAlign:"left",				// Vertical Align top,center,bottom
						navigationVAlign:"bottom",					// Horizontal Align left,center,right
						navigationHOffset:30,
						navigationVOffset:30,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,

						touchenabled:"on",						// Enable Swipe Function : on/off


						stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
						stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

						hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
						hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
						hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


						fullWidth:"on",							// Same time only Enable FullScreen of FullWidth !!
						fullScreen:"off",						// Same time only Enable FullScreen of FullWidth !!


						shadow:1								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

					});


		});
		</script>
		

		



	<!-- WRAP -->
	<div class="wrap cstyle03">
		<div class="container mt-200 z-index100">		
		  <div class="row">
		   <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from places ORDER BY id ASC' );
$counter = 0;
while($dnn1 = mysql_fetch_array($req))
{
$counter++;
    if($counter < 4){
?>
			<div class="col-md-4">
				<div class="shadow cstyle05">
					<div class="fwi one"><img src="<?php echo $dnn1['main_image_src']; ?>" alt="<?php echo $dnn1['title']; ?>" /><div class="mhover none"><span class="icon"><a href="place?id=<?php echo $dnn1['id']; ?>"><img src="images/spacer.png" alt=""/></a></span></div></div>
					<div class="ctitle"><center><?php echo $dnn1['title']; ?></center>
					</div>
				</div>
			</div>
	<?php
 }}
?>
			</div>
		</div>
		
 <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from places ORDER BY id ASC' );
while($dnn1 = mysql_fetch_array($req))
{
?>
		
		<div class="lastminute lcfix">
			<div class="container lmc">	
				
				Τελευταία Καταχώρηση: <b><?php echo $dnn1['title']; ?></b>  - <?php echo $dnn1['map_variable']; ?> <br/>
				<br/>
					<a href="place.php?id=<?php echo $dnn1['id']; ?>" class="btn iosbtn" type="submit">Διαβάστε Περισσοτερα...</a>
			</div>
		</div>
		<?php
 }
?>

		
		
		<!-- FOOTER -->
		
		<div class="footerbg sfix">
			<div class="container">		
				<footer>
					<div class="footer">
					<?php
                    $sql = mysql_query('select * from settings' );
                    while($dnn2 = mysql_fetch_array($sql))
                    {
					?>
						<a href="<?php echo $dnn2['Facebook_url']; ?>" class="social1"><img src="images/icon-facebook.png" alt=""/></a>
						<a href="<?php echo $dnn2['Twitter_url']; ?>" class="social2"><img src="images/icon-twitter.png" alt=""/></a>
						<a href="<?php echo $dnn2['google_plus_url']; ?>" class="social3"><img src="images/icon-gplus.png" alt=""/></a>
						<a href="<?php echo $dnn2['youtube_url']; ?>" class="social4"><img src="images/icon-youtube.png" alt=""/></a>
						<?php 
						}
						?>
						<br/><br/>
						Copyright &copy; <?php echo date("Y") ?> <a href="#">Ο Τουρίστας</a>. <a href="https://ma.ellak.gr/">ΜΑ/ἜΛΛΑΚ</a>
						<br/><br/>
						<a href="#top" id="gotop2" class="gotop"><img src="images/spacer.png" alt=""/></a>
					</div>
				</footer>
			</div>	
		</div>
		
		

		
		
	</div>
	<!-- END OF WRAP -->
	
	
	

	<script src="js/js-index.js"></script>	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
	<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 
    <!-- Custom functions -->
    <script src="js/functions.js"></script>
	
    <!-- Picker UI-->	
	<script src="js/jquery-ui.js"></script>		
	
	<!-- Easing -->
    <script src="js/jquery.easing.js"></script>
	
    <!-- jQuery KenBurn Slider  -->
	
   <!-- Nicescroll  -->	
	<script src="js/jquery.nicescroll.min.js"></script>
	
    <!-- CarouFredSel -->
    <script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>
	
    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>	

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
