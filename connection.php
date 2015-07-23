<?php
include('config.php');

?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>O Τουρίστας - Σύνδεση</title>
	
	<!-- Bootstrap -->
	<link href="css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/custom.css" rel="stylesheet" media="screen">

	<!-- Animo css-->
	<link href="css/animate+animo.css" rel="stylesheet" media="screen">
	
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
	
	<style>
	.btn-search4 a {
  color: white!important;
}
.login-c2 {
height: 425px!important;
}
.center_alignbottom2 {
bottom: 18px;
position: absolute;
width: 94%;
text-align: center;
}
</style>
	<script src="js/jquery.v2.0.3.js"></script>
</head>


<body>
<div class="login-fullwidith">
           <div class="login-wrap">
		   <?php
                    $sql = mysql_query('select * from settings' );
                    while($dnn2 = mysql_fetch_array($sql))
                    {
					?>
			<img src="<?php echo $dnn2['login_logo']; ?>" class="login-img" alt="logo"/><br/>
			<?php 
						}
						?>
			<div class="login-c1">
				<div class="cpadding50">
									 <?php
                   //If the user is logged, we log him out
                    if(isset($_SESSION['username']))
                    {
                    //We log him out by deleting the username and userid sessions
	                 unset($_SESSION['username'], $_SESSION['id']);
                    ?>
<div style="text-align:center;">Για Αποσύνδεση πατήστε στο κουμπί  <div style="color:red"><b>OK</b></div> ότι συμφωνείτε με την ενέργεια αυτή.</div><br />
                </div></div>
				<style>
.login-c2 {
height: 200px!important;
}
.login-c3 {
margin-top: 250px!important;
}
</style>
				<div class="login-c2">
				<div class="logmargfix">
					
							<div class="center_alignbottom">								
							<form action="index.php" method="post">

					<input class="btn-search4"  type="submit" value="OK" onclick="errorMessage()"/>		</center>					
</form>
							</div>
				</div>
			</div>
			<div class="login-c3">
				<div class="center_alignbottom"><a href="index.php" class="whitelink"><span></span>Επιστροφή στο Site</a></div>
			</div>
                  <?php
                                                     }
                   else
                   {
	               $ousername = '';
	               //We check if the form has been sent
	               if(isset($_POST['username'], $_POST['password']))
	               {
		           //We remove slashes depending on the configuration
		           if(get_magic_quotes_gpc())
		           {
			         $ousername = stripslashes($_POST['username']);
			         $username = mysql_real_escape_string(stripslashes($_POST['username']));
			         $password = stripslashes($_POST['password']);
		           }
		           else
		          {
			      $username = mysql_real_escape_string($_POST['username']);
			      $password = $_POST['password'];
		          }
		          //We get the password of the user
		          $req = mysql_query('select password,id from users where username="'.$username.'"');
		          $dn = mysql_fetch_array($req);
		          //We compare the submited password and the real one, and we check if the user exists
		          if($dn['password']==$password and mysql_num_rows($req)>0)
		         {
			     //If the password is good, we dont show the form
			     $form = false;
			    //We save the user name in the session username and the user Id in the session userid
			    $_SESSION['username'] = $_POST['username'];
			    $_SESSION['id'] = $dn['id'];
                ?>
                <b><div style="color:green;text-align:center">Έχετε καταχωρήσει επιτυχώς τα στοιχεία του  λογαριασμού σας.</b></div>
                <br /></div></div>
				<style>
				.login-c2 {
height: 200px!important;
}
.login-c3 {
margin-top: 250px!important;
}
</style>
				<div class="login-c2">
				<div class="logmargfix">
					
							<div class="center_alignbottom">								
							<form action="index.php" method="post">

					<input class="btn-search4"  type="submit" value="OK" onclick="errorMessage()"/>		</center>					
</form>
							</div>
				</div>
			</div>
			<div class="login-c3">
				<div class="center_alignbottom"><a href="index.php" class="whitelink"><span></span>Επιστροφή στο Site</a></div>
			</div>
                <?php
		        }
		         else
		        {
			//Otherwise, we say the password is incorrect.
			$form = true;
			$message = '<b><div style="color:red;text-align:center">Ο συνδυασμός Όνομα Χρήστη και Κωδικού δεν είναι σωστός.Παρακαλώ δοκιμάστε πάλι...</div></b>';
		        }}
	            else
	           {
		$form = true;
	}
	           if($form)
	          {
		//We display a message if necessary
	if(isset($message))
	{
		echo '<div class="message">'.$message.'</div>';
	}
	//We display the form
?>
              <p>Παρακαλώ εισάγετε τα στοιχεία σας για να συνδεθείτε...</p>
                                <br></br>
								<form action="connection.php" method="post">
<input type="text"  size="20" required="" name="username"  placeholder="Όνομα Χρήστη" id="username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>"  class="form-control logpadding" />
			<br/>
			<input type="password" name="password" id="password" size="20" placeholder="Κωδικός Πρόσβασης" required="" class="form-control logpadding" />			
											<br>
			</div></div>
			<div class="login-c2">
				<div class="logmargfix">
					<style>
					.login-c3 {
margin-top: 475px!important;
}
</style>
							<div class="center_alignbottom">
					<input class="btn-search4"  type="submit" value="OK" onclick="errorMessage()"/>		</center>					

							</div>
				</div>
			</div>
			</form>
            <?php
	           }
             }
            ?>

			<div class="login-c3">
				<div class="center_alignbottom"><a href="index.php" class="whitelink"><span></span>Επιστροφή στο Site</a></div>
			</div>		
       
		</div>
</div>

	<script src="js/initialize-loginpage.js"></script>
	<script src="js/jquery.easing.js"></script>	
	<script src="js/bootstrap.min.js"></script>

</body>
</html>

