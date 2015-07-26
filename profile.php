<?php
include('config.php');
?>
<?php
  
  if ( isset($_POST['submit1']) == true) {
    
 mysql_query("INSERT INTO tourism_types(image_src,description,title) VALUES ('{$_POST['image_src']}','{$_POST['description']}','{$_POST['title']}')");
     
  } 
  
  else if ( isset($_POST['submit0']) == true) {
  
    
mysql_query('update users set name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",address="'.$_POST['address'].'",city="'.$_POST['city'].'", email="'.$_POST['email'].'",zip_code="'.$_POST['zip_code'].'",phone_number="'.$_POST['phone_number'].'", image_src="'.$_POST['image_src'].'" where username="'.$_SESSION['username'].'"');  
  

  }
  
  else if ( isset($_POST['submit2']) == true) {
    
 mysql_query("INSERT INTO places(title,description,map_variable,tourism_type,main_image_src,image_src1,image_src2,image_src3,image_src4,image_src5) VALUES ('{$_POST['title']}','{$_POST['description']}','{$_POST['map_variable']}','{$_POST['tourism_type']}','{$_POST['main_image_src']}','{$_POST['image_src1']}','{$_POST['image_src2']}','{$_POST['image_src3']}','{$_POST['image_src4']}','{$_POST['image_src5']}')");
  
  }
  
  else if ( isset($_POST['submit3']) == true) {
    	                                
mysql_query('UPDATE users SET password="'.$_POST['password'].'" WHERE username="'.$_SESSION['username'].'"');
  
  }
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
				<a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="O Τουρίστας" class="logo"/></a>
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
					<li><a href="profile.php" class="active">Προφίλ</a></li>					
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
					  <li class="active">
						<a href="#profile" data-toggle="tab">
						<span class="profile-icon"></span>
						Το προφίλ μου
						</a></li>
					   <li>
						<a href="#add_tourism_type" data-toggle="tab">
						<span class="bookings-icon"></span>
						Καταχώρηση Μορφής Τουρισμού
						</a></li>
						
						 <li>
						<a href="#add_tourism_place" data-toggle="tab">
						<span class="bookings-icon"></span>
						Καταχώρηση Τοποθεσίας
						</a></li>
						
					  <li>
						  <a href="#password" data-toggle="tab" onclick="mySelectUpdate()">
						  <span class="password-icon"></span>							  
						  Αλλαγή Κωδικού Πρόσβασης
						  </a></li>
					
					</ul>
					<div class="clearfix"></div>
				</div>
				<!-- LEFT MENU -->
					
					<?php
                                                         //We check if the user is logged
                                                         if(isset($_SESSION['username']))
                                                         {
	                                                     //We check if the form has been sent
if(isset($_POST['name'],$_POST['lastname'],$_POST['address'],$_POST['city'],$_POST['username'], $_POST['password'],$_POST['phone_number'], $_POST['passverif'], $_POST['email'],$_POST['zip_code'],$_POST['image_src']))
	                                                         {
		                                                     //We remove slashes depending on the configuration
		                                                          if(get_magic_quotes_gpc())
		                                                          {
		                                                           $_POST['name'] = stripslashes($_POST['name']);
		                                                           $_POST['lastname'] = stripslashes($_POST['lastname']);
		                                                           $_POST['address'] = stripslashes($_POST['address']);
		                                                           $_POST['city'] = stripslashes($_POST['city']);
		                                                           $_POST['username'] = stripslashes($_POST['username']);
		                                                           $_POST['password'] = stripslashes($_POST['password']);
		                                                           $_POST['passverif'] = stripslashes($_POST['passverif']);
		                                                           $_POST['email'] = stripslashes($_POST['email']);
		                                                           $_POST['image_src'] = stripslashes($_POST['image_src']);
																   $_POST['zip_code'] = stripslashes($_POST['zip_code']);
																   $_POST['phone_number'] = stripslashes($_POST['phone_number']);

		                                                           }
		                                                           //We check if the two passwords are identical
		                                                           if($_POST['password']==$_POST['passverif'])
		                                                           {
			                                                       //We check if the password has 6 or more characters
			                                                             if(strlen($_POST['password'])>=6)
			                                                             {
				                                                          //We check if the email form is valid
				                                                           if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				                                                           {
					                                                        //We protect the variables	
				                                                             $name = mysql_real_escape_string($_POST['name']);
				                                                             $lastname = mysql_real_escape_string($_POST['lastname']);
				                                                             $address = mysql_real_escape_string($_POST['address']);
				                                                             $city = mysql_real_escape_string($_POST['city']);
				                                                             $username = mysql_real_escape_string($_POST['username']);
				                                                             $password = mysql_real_escape_string($_POST['password']);
				                                                             $email = mysql_real_escape_string($_POST['email']);
			                                                                 $image_src = mysql_real_escape_string($_POST['image_src']);
				
					                                                        //We check if there is no other user using the same username
					                                                         $dn = mysql_fetch_array(mysql_query('select count(*) as nb from users where username="'.$username.'"'));
					                                                          //We check if the username changed and if it is available
					                                                                if($dn['nb']==0 or $_POST['username']==$_SESSION['username'])
					                                                                {
						                                                            //We edit the user informations
						                                                                 if(mysql_query('update users set name="'.$name.'",lastname="'.$lastname.'",address="'.$address.'",city="'.$city.'", email="'.$email.'",zip_code="'.$zip_code.'",phone_number="'.$phone_number.'", image_src="'.$image_src.'" where username="'.$_SESSION['username'].'"'))
						                                                                 {
							                                                              //We dont display the form
							                                                               $form = false;
							                                                               //We delete the old sessions so the user need to log again
							                                                                unset($_SESSION['username'], $_SESSION['userid']);
                                                                            ?>
                                                                            <div class="message">Τα δεδομένα σας έχουν ενημερωθεί επιτυχώς. Πρέπει ωστόσο να συνδεθείτε ξανά.<br />
                                                                            <a href="connexion.php">Σύνδεση</a></div>
                                                                            <?php
                                                                                                   }
                                                                                                   else
                                                                                                   {
                                                                                                   //Otherwise, we say that an error occured
                                                                                                   $form = true;
                                                                                                   $message = 'Ένα σφάλμα συνέβη καθώς τροποιήσατε τα προσωπικά σας δεδομένα';
                                                                                                   }
                                                                                                 }
                                                                                             else
                                                                                             {
                                                                                             //Otherwise, we say the username is not available
                                                                                             $form = true;
                                                                                             $message = 'Το Όνομα Χρήστη, το οποίο επιθυμείτε να χρησιμοποιήσετε δεν είναι διαθέσιμο.Παρακαλώ επίλεξτε κάτι άλλο.';
                                                                                             }
                                                                                         }
                                                                                         else
                                                                                         {
                                                                                         //Otherwise, we say the email is not valid
                                                                                         $form = true;
                                                                                         $message = 'Το e-mail που χρησιμοποιήσατε δεν είναι έγκυρο.';
                                                                                         }
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    //Otherwise, we say the password is too short
                                                                                    $form = true;
                                                                                    $message = 'Ο κωδικός σας πρόσβασης πρέπει να αποτελείται από τουλάχιστον 6 χαρακτήρες.';
                                                                                    }
                                                                                }
                                                                                else
                                                                               {
                                                                               //Otherwise, we say the passwords are not identical
                                                                               $form = true;
                                                                               $message = 'Δεν έχετε καταχωρήσει σωστά τον κωδικό επιβεβαίωσης.';
                                                                               }
                                                                          }
                                                                          else
                                                                         {
                                                                         $form = true;
                                                                         }
                                                                         if($form)
                                                                        {
                                                                        //We display a message if necessary
                                                                        if(isset($message))
                                                                        {
                                                                        echo '<strong>'.$message.'</strong>';
                                                                        }
                                                                       //If the form has already been sent, we display the same values
                                                                       if(isset($_POST['name'],$_POST['lastname'],$_POST['address'],$_POST['city'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['image_src']))
                                                                      {
                                                                      $username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
                                                                            if($_POST['password']==$_POST['passverif'])
                                                                            {
                                                                            $password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
                                                                            }
                                                                            else
                                                                            {
                                                                            $password = '';
                                                                            }
		                                                                    $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
                                                                        }
                                                                        else
                                                                       {
        //otherwise, we display the values of the database
                        $dnn = mysql_fetch_array(mysql_query('select * from users where username="'.$_SESSION['username'].'"'));
						$id = htmlentities($dnn['id'], ENT_QUOTES, 'UTF-8');
                        $name = htmlentities($dnn['name'], ENT_QUOTES, 'UTF-8');
						$lastname = htmlentities($dnn['lastname'], ENT_QUOTES, 'UTF-8');
						$address = htmlentities($dnn['address'], ENT_QUOTES, 'UTF-8');
						$city = htmlentities($dnn['city'], ENT_QUOTES, 'UTF-8');
						$username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
                        $password = htmlentities($dnn['password'], ENT_QUOTES, 'UTF-8');
                        $email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');
						$image_src = htmlentities($dnn['image_src'], ENT_QUOTES, 'UTF-8');
						$zip_code = htmlentities($dnn['zip_code'], ENT_QUOTES, 'UTF-8');
					    $phone_number = htmlentities($dnn['phone_number'], ENT_QUOTES, 'UTF-8');

    }
    //We display the form
?>

				<!-- RIGHT CPNTENT -->
				<div class="col-md-11 offset-0">
					<!-- Tab panes from left menu -->
					<div class="tab-content5">
					
					  <!-- TAB 1 -->
					  <div class="tab-pane padding40 active" id="profile">

						  <!-- Admin top -->
						  <div class="col-md-4 offset-0">
							<img src="<?php echo $image_src; ?>" alt="" class="left margright20"/>
							<p class="size12 grey margtop10">
							Καλώς Ήλθες <span class="lred"><?php echo $name; ?></span><br/>
							</p>
							<div class="clearfix"></div>
						  </div>
						  <div class="col-md-4">
						  </div>
				
						  <!-- End of Admin top -->
						  
						  
						<div class="clearfix"></div>  
						
						<span class="size16 bold">Προσωπικά Στοιχεία</span>
						<div class="line2"></div>
						  

						<!-- COL 1 -->
						<div class="col-md-12 offset-0">
			            <form class="form-group" action="profile.php?id=<?php echo $id; ?>" method="post">
                                  	
							<br/>
							Όνομα*:			
							<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" rel="popover" id="name" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							Επώνυμο*:			
							<input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" rel="popover" id="name" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Επώνυμό σου">
							<br/>
							Εικόνα Προφίλ (URL)*:
							<input type="text" class="form-control" name="image_src" value="<?php echo $image_src; ?>" rel="popover" id="username" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομα Χρήστη σου">						  
							<br/>
							E-mail*:
							<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" id="email" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το E-mail σου">
							<br/>
							Τηλεφωνικός Αριθμός:
							<input type="text" name="phone_number" id="phone_number" value="<?php echo $phone_number; ?>" class="form-control" />

							
							<br/>
						<br/>
						<br/>						
						<span class="size16 bold">Στοιχεία Διεύθυνσης</span>
						<div class="line2"></div>
						
						<br/>
						Πόλη*:
			            <input type="text" name="city" id="city" value="<?php echo $city; ?>" class="form-control" />
						<br/>
						Διεύθυνση*:
					    <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control" />

						<br/>
						Ταχυδρομικός Κώδικας*:
					    <input type="text" name="zip_code" id="address" value="<?php echo $zip_code; ?>" class="form-control" />
						
						<br/><br/>
					    <input type="submit" name="submit0" class="cyanbtn  margtop20"/>
						 </form>
           
						</div>
						<!-- END OF COL 1 -->
						
						<div class="clearfix"></div><br/><br/><br/>
					
					  </div>
					  <!-- END OF TAB 1 -->		

					    <!-- TAB 2 -->					  
					  <div class="tab-pane" id="add_tourism_type">
						<div class="padding40">
						
							<span class="dark size18">Νέα Καταχώρηση Μορφής Τουρισμού</span>
							<div class="line4"></div>
						    <form class="form-group" action="profile.php?id=<?php echo $id; ?>" method="post">
	
							Τίτλος Μορφής Τουρισμού*<br/>
							<input type="text" class="form-control" name="title" rel="popover" id="title" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς τον τίτλος της νέας μορφής τουρισμού">
							<br/>
							Περιγραφή - Ορισμός Μορφής Τουρισμού*<br/>
						   <textarea class="form-control" name="description"  cols="74%" placeholder="Λίγα λόγια για το γεγονός..." rows="10" tabindex="4"></textarea>
							<br/>
							Κύρια Εικόνα Σελίδας<br/>
							<input type="text" class="form-control" name="image_src" rel="popover" id="image_src" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
				            <input type="submit" name="submit1" class="cyanbtn  margtop20"/>
							</form>
						</div>
					  </div>
					  <!-- END OF TAB 2 -->	
					  
					    <!-- TAB 3 -->					  
					  <div class="tab-pane" id="add_tourism_place">
						<div class="padding40">
						
							<span class="dark size18">Προσθήκη Τοποθεσίας</span>
							<div class="line4"></div>
							
							
									
						    <form class="form-group" action="profile.php?id=<?php echo $id; ?>" method="post">
	
							Ονομασία Τοποθεσίας*<br/>
							<input type="text" class="form-control" name="title" rel="popover" id="title" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς τον τίτλος της νέας μορφής τουρισμού">
							<br/>
							Περιγραφή - Ορισμός Μορφής Τουρισμού*<br/>
						   <textarea class="form-control" name="description" id="description"  cols="74%" placeholder="Λίγα λόγια για την τοποθεσία..." rows="10" tabindex="4"></textarea>
							<br/>
							Μεταβλητή για τον εντοπισμό στον χάρτη*<br/>
							<input type="text" class="form-control" name="map_variable" rel="popover" id="map_variable" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς τον τίτλος της νέας μορφής τουρισμού">
							<br/>
							Κύρια Εικόνα Σελίδας<br/>
							<input type="text" class="form-control" name="main_image_src" rel="popover" id="main_image_src" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
							<br/>
							Δευτερεύουσες Εικόνες Slider (URL) <br/>
							<input type="text" class="form-control" name="image_src1" rel="popover" id="image_src1" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
							<input type="text" class="form-control" name="image_src2" rel="popover" id="image_src2" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
							<input type="text" class="form-control" name="image_src3" rel="popover" id="image_src3" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
							<input type="text" class="form-control" name="image_src4" rel="popover" id="image_src4" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
							<input type="text" class="form-control" name="image_src5" rel="popover" id="image_src5" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να τοποθετήσεις το url εξωτερικής εικόνας">
							<br/>
						    Τύπος Τουρισμού που ανήκει η τοποθεσία<br/>
							  <select class="form-control" name="tourism_type">
                                 <option value="">Τύπος Τουρισμού που ανήκει η τοποθεσία</option>
								  <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('SELECT * FROM tourism_types' );
while($dnn = mysql_fetch_array($req))
{
?>
                                <option  value="<?php echo $dnn['id']; ?>"><?php echo $dnn['title']; ?></option>

								<?php
}
?>
				  </select> 
<br/>
				            <input type="submit" name="submit2" class="cyanbtn  margtop20"/>
							</form>
							
							
		
						</div>
					  </div>
					  <!-- END OF TAB 3 -->	
					  
					  <!-- TAB 6 -->					  
					  <div class="tab-pane" id="password">
						<div class="padding40">
						
							<span class="dark size18">Αλλαγή Κωδικού Πρόσβασης</span>
							<div class="line4"></div>
						    <form class="form-group" action="profile.php?id=<?php echo $id; ?>" method="post">
	
							Όνομα Χρήστη<br/>
							<input type="text" class="form-control" name="username" value="<?php echo $username; ?>" rel="popover" id="username" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομα Χρήστη σου" disabled>						  
							<br/>
							Κωδικός Πρόσβασης<br/>
							<input type="password" class="form-control" name="password" value="<?php echo $password; ?>" rel="popover" id="password" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομα Χρήστη σου">						  
							<br/>
							Κωδικός Πρόσβασης (προς επιβεβαίωση)<br/>
							<input type="password" class="form-control" name="passverif" value="<?php echo $password; ?>" rel="popover" id="passverif" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομα Χρήστη σου">						  
							<br/>
				            <input type="submit" name="submit3" class="cyanbtn  margtop20"/>
							</form>
		
						</div>
					  </div>
					  <!-- END OF TAB 6 -->	
			 <?php
	        }
            }
            else
           {
           ?>
           <div class="message"><i>Για να έχετε πρόσβαση στην σελίδα αυτή θα πρέπει να είστε συνδεδεμένοι στον λογαριασμός σας.</i></div><br /><br />
           <a href="login.php" style="color:green">Σύνδεση τώρα</a>
           <?php
           }
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

	<div class="footerbg3black">
		<div class="container center grey"> 
		<a href="#top" class="gotop scroll"><img src="images/spacer.png" alt=""/></a>
		</div>
	</div>
	
	
	<script src="js/js-profile.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/functions.js"></script>
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>
	<script src="js/jquery-ui.js"></script>	
    <script src="js/jquery.easing.js"></script>	
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
