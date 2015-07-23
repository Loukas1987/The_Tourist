<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>O Τουρίστας - Σύνδεση</title>
	
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
	
	<!-- Load jQuery -->
	<script src="js/jquery.v2.0.3.js"></script>

<style>
.login-wrap {
  width: 800px!important;
}
.center_alignbottom {
  position: initial!important;
  }
  .login-fullwidith{height:1125px!important}
  .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
  position: inherit!important;}
  
  .message {
  color: red;
}
.message1 {
  color: green;
}
</style>
	


  </head>
  <body>
	<!-- 100% Width & Height container  -->
	<div class="login-fullwidith">
		
		<!-- Login Wrap  -->
		<div class="login-wrap">
			<?php
                   include('config.php');
				    $sql = mysql_query('select * from settings' );
                    while($dnn2 = mysql_fetch_array($sql))
                    {
					?>
			<img src="<?php echo $dnn2['login_logo']; ?>" class="login-img" alt="logo"/><br/>
			<?php 
						}
						?>
						<div class="login-c1" height="auto!important">
			<div class="cpadding50">
				<!-- START FORM TO REGISTER NEW MEMBER -->  
									     <?php
                                         //WE CHECK IF THE FORM HAS BEEN SENT
if(isset($_POST['name'],$_POST['lastname'],$_POST['address'],$_POST['city'],$_POST['username'], $_POST['password'],$_POST['phone_number'], $_POST['passverif'], $_POST['email'],$_POST['zip_code'],$_POST['image_src']))
                                        {
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
	                                        //WE CHECK IF THE TWO PASSWORDS ARE IDENTICAL
	                                        if($_POST['password']==$_POST['passverif'])
	                                       {
		                                   //WE CHECK IF THE PASSWORD HAS 6 OR MORE CHARACTERS
		                                      if(strlen($_POST['password'])>=6)
		                                      {
			                                    //WE CHECK IF THE EMAIL FORM IS VALID
			                                    if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
			                                    { 
				                                 //WE PROTECT THE VARIABLES
				                                                             $name = mysql_real_escape_string($_POST['name']);
				                                                             $lastname = mysql_real_escape_string($_POST['lastname']);
				                                                             $address = mysql_real_escape_string($_POST['address']);
				                                                             $city = mysql_real_escape_string($_POST['city']);
				                                                             $username = mysql_real_escape_string($_POST['username']);
				                                                             $password = mysql_real_escape_string($_POST['password']);
				                                                             $email = mysql_real_escape_string($_POST['email']);
			                                                                 $image_src = mysql_real_escape_string($_POST['image_src']);

				                                  //WE CHECK IF THERE IS NO OTHER USER USING THE SAME USERNAME
				                                  $dn = mysql_num_rows(mysql_query('select id from users where username="'.$username.'"'));
				                                  if($dn==0)
				                                  {
					                              //WE COUNT THE NUMBER OF USERS TO GIVE AN ID TO THIS ONE
					                              $dn2 = mysql_num_rows(mysql_query('select id from users'));
					                              $id = $dn2+1;
					                              //WE SAVE THE INFORMATIONS TO THE DATABASE 
		if(mysql_query('insert into users(id,name,lastname,address,city,username, password, email, zip_code,phone_number,image_src) values ('.$id.', "'.$name.'","'.$lastname.'","'.$address.'","'.$city.'","'.$username.'", "'.$password.'", "'.$email.'","'.$zip_code.'","'.$phone_number.'","'.$image_src.'")'))
					                                 {
						                             //WE DONT DISPLAY THE FORM
						                             $form = false;
											?>
                                                 <div class="message1">Έχετε εγγραφεί επιτυχώς. Μπορείτε πλέον να συνδεθείτε.<br />
												 </div><!-- END: DIV.MESSAGE -->
                                            <?php
					                        }
					                                 else
					                                 {
						                              //OTHERWISE,WE SAY THAT AN ERROR OCCURED
						                              $form = true;
						                              $message = 'Ένα σφάλμα συνέβη κατά την εγγραφή σας';
					                                 }
				                                  }
				                                else
				                                        {
					                                    //OTHERWISE, SEEMS THAT USERNAME IS NOT AVAILABLE
					                                    $form = true;
					                                   $message = 'Το Όνομα Χρήστη το οποίο θέλετε να χρησιμοποιήσετε δεν είναι διαθέσιμο, παρακαλώ επιλέξτε διαφορετικό.';
				                                       }
			                                    }
			                                    else
			                                    {
				                                 //OTHERWISE, WE SAY THAT THE EMAIL IS NOT VALID
				                                $form = true;
				                                $message = 'Το email που έχετε εισάγει δεν είναι έγκυρο.';
			                                    }
		                                    }
		                                    else
		                                   {
			                                //OTHERWISE, WE SAY THAT THE PASSWORD IS TOO SHORT
			                                $form = true;
			                                $message = 'Ο κωδικός πρόσβασης πρέπει να αποτελείται τουλάχιστον από 6 χαρακτήρες.';
		                                   }
	                                    }
	                                    else
	                                    {
		                                //OTHERWISE, WE SAY THAT THA PASSWORDS ARE NOT IDENTICAL
		                                 $form = true;
		                                 $message = 'O κωδικός πρόσβασης και ο κωδικός επιβεβαίωσης διαφέρουν. Προσπαθήστε πάλι';
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
		                             echo '<div class="message"><b>'.$message.'</b></div>';
	                                 }
	                                 //We display the form
                                     ?>
									<div class="row"> 
                                     <form action="signup.php" method="post">
                                      Παρακαλούμε συμπληρώστε τα ακόλουθα στοιχεία για να πραγματοποιηθεί η εγγραφή σας:<br /><br />
								<br/>
	  						<span class="size16 bold">Προσωπικά Στοιχεία</span>
						<div class="line2"></div>
						<br/>
						    <div class="col-sm-6">
							Όνομα*:			
							<input type="text" class="form-control" name="name"  rel="popover" id="name" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομά σου">
							<br/>
							</div>
							<div class="col-sm-6">
							Επώνυμο*:			
							<input type="text" class="form-control" name="lastname"  rel="popover" id="name" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Επώνυμό σου">
							<br/></div>
							<div class="col-sm-6">
							E-mail*:
							<input type="text" class="form-control" name="email" id="email" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το E-mail σου">
							<br/></div>
							<div class="col-sm-6">
							Τηλεφωνικός Αριθμός:
							<input type="text" name="phone_number" id="phone_number"  class="form-control" /> 
                            <br/></div>
							<div class="col-sm-12">
							Εικόνα Προφίλ (Url):
						    <input type="text" class="form-control" name="image_src" id="file" />
                        <br/></div>					
						<span class="size16 bold">Στοιχεία Διεύθυνσης</span>
						<div class="line2"></div>
						<br/>
						<div class="col-sm-6">
						Πόλη*:
			            <input type="text" name="city" id="city" class="form-control" />
						<br/></div>
						<div class="col-sm-6">
						Ταχυδρομικός Κώδικας*:
					    <input type="text" name="zip_code" id="address" class="form-control" />
		                <br/></div>
						<div class="col-sm-12">
		                 Διεύθυνση*:
					    <input type="text" name="address" id="address" class="form-control" />
                        <br/></div>
						<br/>						
						<span class="size16 bold">Στοιχεία Πρόσβασης</span>
						<div class="line2"></div>
						<br/>
						<div class="col-sm-12">
					Όνομα Χρήστη*:
				 <input type="text" class="form-control" name="username"  rel="popover" id="username" data-content="Αυτό το πεδίο είναι υποχρεωτικό" data-original-title="Εδώ μπορείς να επεξεργασθείς το Όνομα Χρήστη σου">						  
					<br/></div>
					<div class="col-sm-6">
				Κωδικός Πρόσβασης*:
				<input type="password" class="form-control" name="password" />
				 <br/></div>
				 <div class="col-sm-6">
				Κωδικός Πρόσβασης* (προς επιβεβαίωση)
               <input type="password" class="form-control" name="passverif" />	  
                 <br/></div>
					    <input type="submit"  value="Αποθήκευση" class="cyanbtn  center_alignbottom"/>
                         </form>
								</div>	 
                                <?php
                                }
                                ?>
			</div>		
		</div>
	      	<div class="login-c3">
				<div class="center_alignbottom"><a href="login.php" class="whitelink"><span></span> Σύνδεση</a></div>
			</div>		
	</div>	
	<script>
			$(document).ready(function($){
			function onBgresize() {
				var $gfwidth = window.innerWidth;
				var $gfheight = window.innerHeight;
				
				var $loginw = $('.login-wrap').width();
				var $loginh = $('.login-wrap').height();
				
				$('.login-fullwidith').css({'width': $gfwidth +'px', 'height': $gfheight +'px'});
				
				$('.login-wrap').css({'margin-left': $gfwidth/2-$loginw/2 +'px', 'margin-top': $gfheight/2-$loginh +'px'});
				
			}
			onBgresize();
			$(window).resize(function() {
				onBgresize();
			});
		});		
		</script>
	<script src="js/jquery.easing.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>