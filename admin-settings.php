<?php
include('config.php');
?>

<?php
  
<<<<<<< HEAD
<<<<<<< HEAD
  $sql = mysql_query('select * from users where user_type=0' );
					$i=0;
                   $dnn2 = mysql_fetch_array($sql);
				   
=======
>>>>>>> origin/master
=======
>>>>>>> origin/master
  
  if ( isset($_POST['submit1']) == true) {
    
	mysql_query("UPDATE settings SET header_logo='".$_POST['header_logo']."',footer_logo='".$_POST['footer_logo']."',login_logo='".$_POST['login_logo']."'");

    
  } else if ( isset($_POST['submit2']) == true) {
    
mysql_query("UPDATE settings SET Facebook_url='".$_POST['Facebook_url']."',youtube_url='".$_POST['youtube_url']."',Twitter_url='".$_POST['Twitter_url']."'");
    
<<<<<<< HEAD
<<<<<<< HEAD
  } 
=======
=======
>>>>>>> origin/master
  } else if ( isset($_POST['submit3-2']) == true) {
    
mysql_query("UPDATE users SET user_type='".$_POST['user_type']."'");

    
  }
>>>>>>> origin/master
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
	
	<!-- Animo css-->
	<link href="css/animate+animo.css" rel="stylesheet" media="screen">

    <!-- Picker -->	
	<link rel="stylesheet" href="css/jquery-ui.css" />	
	
    <!-- jQuery -->		
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
				
				<?php
                    $sql = mysql_query('select * from settings' );
                    while($dnn2 = mysql_fetch_array($sql))
                    {
					?>
				<a href="index.php" class="navbar-brand"><img src="<?php echo $dnn2['header_logo']; ?>" alt="" class="logo"/></a>
				<?php 
						}
						?>
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
$req = mysql_query('select * from tourism_types ORDER BY title ASC' );
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
					<li><a href="admin-settings.php" class="active">Ρυθμίσεις Ιστολογίου</a></li>					
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
			<div class="col-md-12 pagecontainer2 offset-0">
				
				<!-- LEFT MENU -->
				<div class="col-md-1 offset-0">
					<!-- Nav tabs -->
					<ul class="nav profile-tabs">
					 
					   <li  class="active">
						<a href="#general_settings" data-toggle="tab">
						<span class="bookings-icon"></span>
						Γενικές Ρυθμίσεις
						</a></li>
						
						 <li>
						<a href="#profile" data-toggle="tab">
						<span class="profile-icon"></span>
						Κοινωνικά Μέσα Δικτύωσης
						</a></li>
						 <li>
						<a href="#users" data-toggle="tab">
						<span class="profile-icon"></span>
						Διαχείρηση Χρηστών
						</a></li>
					
					</ul>
					<div class="clearfix"></div>
				</div>
				<!-- LEFT MENU -->
				<?php 
                 //We check if the user is logged
                 if(isset($_SESSION['username']))
                 {
				 $user = $_SESSION['username'];
                 $sql = "SELECT * FROM users WHERE username='$user' AND user_type=1";
                 $result = mysql_query($sql) or die ("Δεν επιτρέπεται η πρόσβαση στην Βάση Δεδομένων: " . mysql_error());
                  if ($row = mysql_fetch_assoc($result))
                 {
           											 
?>
					<?php
                        $sql = "SELECT * FROM settings";
$result = mysql_query ($sql) or die (mysql_error ());
while ($row = mysql_fetch_array ($result)){

$Facebook_url=$row['Facebook_url'];
$Twitter_url=$row['Twitter_url'];
$google_plus_url=$row['google_plus_url'];
$youtube_url=$row['youtube_url'];
$header_logo=$row['header_logo'];
$footer_logo=$row['footer_logo'];
$login_logo=$row['login_logo'];
}
?>

				<!-- RIGHT CPNTENT -->
				<div class="col-md-11 offset-0">
					<!-- Tab panes from left menu -->
					<div class="tab-content5">
					
					 <!-- TAB 1 -->
					  <div class="tab-pane padding40 active" id="general_settings">

						  
						  
						<div class="clearfix"></div>  
						
						<span class="size16 bold">Γενικές Ρυθμίσεις</span>
						<div class="line2"></div>
						  

						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
			            <form class="form-group" action="admin-settings.php" method="post">
                             	
						<br/>
						    Λογότυπο Κεφαλίδας (Πάνω μέρος) (120px X 26px)*:			
					<input type="text" class="form-control" name="header_logo" value="<?php echo $header_logo; ?>" rel="popover" id="header_logo" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							   Λογότυπο Υποσέλιδου (Κάτω μέρος) (120px X 26px)*:			
					<input type="text" class="form-control" name="footer_logo" value="<?php echo $footer_logo; ?>" rel="popover" id="footer_logo" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							Λογότυπο Καρτέλας Σύνδεσης (120px X 26px)*:			
					<input type="text" class="form-control" name="login_logo" value="<?php echo $login_logo; ?>" rel="popover" id="login_logo" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							
						<br/>						
					    <input type="submit" name="submit1" value="Ενημερωση" class="cyanbtn  margtop20"/>
						 </form>
           
						</div>
						<!-- END OF COL 1 -->
						
						<div class="clearfix"></div><br/><br/><br/>
						
					  </div>
					  <!-- END OF TAB 1 -->		

					  <!-- TAB 2 -->
					  <div class="tab-pane padding40" id="profile">

						  
						  
						<div class="clearfix"></div>  
						
						<span class="size16 bold">Κοινωνικά Μέσα Δικτύωσης</span>
						<div class="line2"></div>
						  

						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
			            <form class="form-group" action="admin-settings.php" method="post">
                             	
						<br/>
						    Facebook Url*:			
					<input type="text" class="form-control" name="Facebook_url" value="<?php echo $Facebook_url; ?>" rel="popover" id="Facebook_url" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							Twitter Url*:			
					<input type="text" class="form-control" name="Twitter_url" value="<?php echo $Twitter_url; ?>" rel="popover" id="Facebook_url" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							Google Plus Url*:			
					<input type="text" class="form-control" name="google_plus_url" value="<?php echo $google_plus_url; ?>" rel="popover" id="Facebook_url" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							Youtube Url*:			
					<input type="text" class="form-control" name="youtube_url" value="<?php echo $youtube_url; ?>" rel="popover" id="Facebook_url" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
						<br/>						
					    <input type="submit"  name="submit2" value="Ενημερωση" class="cyanbtn  margtop20"/>
						 </form>
           
						</div>
						<!-- END OF COL 1 -->
						
						<div class="clearfix"></div><br/><br/><br/>
							
						
						
					  </div>
					  <!-- END OF TAB 2 -->		
  <!-- TAB 2 -->
					  <div class="tab-pane padding40" id="users">

						  
						  
						<div class="clearfix"></div>  
						
						<span class="size16 bold">Διαχείρηση Χρηστών - Με την τιμή 1 ορίζεται ένας απλός χρήστης (τιμή 0) σε διαχειριστής</span>
						<div class="line2"></div>
						  

						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
			<form class="form-group" action="admin-settings.php" method="post">			
	<?php
                    $sql = mysql_query('select * from users where user_type=0' );
<<<<<<< HEAD
<<<<<<< HEAD
					$i=0;
                    while($dnn2 = mysql_fetch_array($sql))
                    {
					$i++;
=======
					
                    while($dnn2 = mysql_fetch_array($sql))
                    {
>>>>>>> origin/master
=======
					
                    while($dnn2 = mysql_fetch_array($sql))
                    {
>>>>>>> origin/master
					?>	<br>
                    Ρόλος του Χρήστη <?php echo $dnn2['name']; ?>
<br>				
                                  	
<<<<<<< HEAD
<<<<<<< HEAD
<input type="text" class="form-control" name="user_type-<?php echo $dnn2['id']; ?>" value="<?php echo $dnn2['user_type']; ?>" rel="popover" id="user_type" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">					
		<br>	
		
	       <input type="submit" name="submit-<?php echo $dnn2['id']; ?>" class="cyanbtn  margtop20"/><br></br>	
=======
=======
>>>>>>> origin/master
<input type="text" class="form-control" name="user_type" value="<?php echo $dnn2['user_type']; ?>" rel="popover" id="user_type" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">					
		<br>	
		
	       <input type="submit" name="submit3-<?php echo $dnn2['id']; ?>" class="cyanbtn  margtop20"/><br></br>	
<<<<<<< HEAD
>>>>>>> origin/master
=======
>>>>>>> origin/master
           <?php 
						}
						?>
						 </form>
						 <?php 
						 if ( isset($_POST['submit-2']) == true) {
    
mysql_query("UPDATE users SET user_type=submit3-'.$_POST[$i].' WHERE id=2");

  }?>
						</div>
						<!-- END OF COL 1 -->
						
						<div class="clearfix"></div><br/><br/><br/>
							
						
						
					  </div>
					  <!-- END OF TAB 2 -->	
					   <?php
	        }
            else 
           {								
           ?>
		    <div class="tab-pane padding40" style="padding-left:140px" id="users">
         <span class="size16 bold">Προειδοποίηση</span>
		 <div class="line2"></div>
		 <i>Για να έχετε πρόσβαση στην σελίδα αυτή θα πρέπει να έχετε λογαριασμό <b>ΔΙΑΧΕΙΡΙΣΤΗ</b>...</i>
		   <br /><br />
           <a href="login.php" class="cyanbtn  margtop20">Σύνδεση τώρα</a>
		   </div> <?php
           }}
           ?>	
          	
					</div>
					<!-- End of Tab panes from left menu -->	
					
				</div> 
				<!-- END OF RIGHT CPNTENT -->
			
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

	<!-- Javascript  -->
	<script src="js/js-profile.js"></script>
	
    <!-- Nicescroll  -->	
	<script src="js/jquery.nicescroll.min.js"></script>
	
    <!-- Custom functions -->
    <script src="js/functions.js"></script>
	
    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>
	
	<!-- Load Animo -->
	<script src="js/animo.js"></script>

    <!-- Picker -->	
	<script src="js/jquery-ui.js"></script>	

    <!-- Picker -->	
    <script src="js/jquery.easing.js"></script>	
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
