<?php
include('config.php');

if(isset($_GET['id']))
                                        {
	                                    $id = intval($_GET['id']);}
         $post_id = $id; 

?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ο Τουρίστας - Διαδικτυακή Εφαρμογή ΜΑ/ἜΛΛΑΚ</title>
	 <link type="text/css" rel="stylesheet" href="css/style.css">
     <link type="text/css" rel="stylesheet" href="css/example.css">
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         
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
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="css/fullscreen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
	
    <!-- Picker UI-->	
	<link rel="stylesheet" href="css/jquery-ui.css" />	
	
	<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="css/jslider.css" type="text/css">
	<link rel="stylesheet" href="css/jslider.round-blue.css" type="text/css">
	
    <!-- jQuery-->	
    <script src="js/jquery.v2.0.3.js"></script>
	<script src="js/jquery-ui.js"></script>	

	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="js/tmpl.js"></script>
	<script type="text/javascript" src="js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="js/draggable-0.1.js"></script>
	<script type="text/javascript" src="js/jquery.slider.js"></script>
	<!-- end -->

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
    
				  </ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
		
        </div>
      </div>
 
	</div>
	 <?php

                                        //WE CHECK IF THE EVENT ID IS DEFINED
                                        if(isset($_GET['id']))
                                        {
	                                    $id = intval($_GET['id']);
										//COUNT VIEWS OF THE EVENT PAGE
	                                    //WE CHECK IF THE EVENT EXISTS
                                        $dn = mysql_query('select * from places where id="'.$id.'"');
	                                            if(mysql_num_rows($dn)>0)
	                                            {
		                                         $dnn = mysql_fetch_array($dn);
		                                         //WE DISPLAY TOURISM TYPE DATAS
                                        ?>
	<div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="index.php"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
					<li><a href="tourism_type.php?id=<?php echo htmlentities($dnn['tourism_type'], ENT_QUOTES, 'UTF-8'); ?>">Είδος Τουρισμού</a></li>
					<li>/</li>
					<li><a href="place.php?id=<?php echo htmlentities($dnn['id'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($dnn['title'], ENT_QUOTES, 'UTF-8'); ?></a></li>
					<li>/</li>					
					<li><a href="#" class="active"><?php echo htmlentities($dnn['map_variable'], ENT_QUOTES, 'UTF-8'); ?></a></li>					
				</ul>				
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	
	<!-- CONTENT -->
	<div class="container">
	
		<div class="container pagecontainer offset-0">	

			<!-- SLIDER -->
			<div class="col-md-8 details-slider">
			
				<div id="c-carousel">
				<div id="wrapper">
				<div id="inner">
					<div id="caroufredsel_wrapper2">
					
						<div id="carousel">
						
							<img src="<?php echo htmlentities($dnn['main_image_src'], ENT_QUOTES, 'UTF-8'); ?>" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src1'], ENT_QUOTES, 'UTF-8'); ?>" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src2'], ENT_QUOTES, 'UTF-8'); ?>" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src3'], ENT_QUOTES, 'UTF-8'); ?>" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src4'], ENT_QUOTES, 'UTF-8'); ?>" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src5'], ENT_QUOTES, 'UTF-8'); ?>" alt=""/>						
						</div>
					</div>
					<div id="pager-wrapper">
						<div id="pager">
							<img src="<?php echo htmlentities($dnn['main_image_src'], ENT_QUOTES, 'UTF-8'); ?>" width="120" height="68" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src1'], ENT_QUOTES, 'UTF-8'); ?>" width="120" height="68" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src2'], ENT_QUOTES, 'UTF-8'); ?>" width="120" height="68" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src3'], ENT_QUOTES, 'UTF-8'); ?>" width="120" height="68" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src4'], ENT_QUOTES, 'UTF-8'); ?>" width="120" height="68" alt=""/>
							<img src="<?php echo htmlentities($dnn['image_src5'], ENT_QUOTES, 'UTF-8'); ?>" width="120" height="68" alt=""/>						
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<button id="prev_btn2" class="prev2"><img src="images/spacer.png" alt=""/></button>
				<button id="next_btn2" class="next2"><img src="images/spacer.png" alt=""/></button>		
					
		</div>
		</div> <!-- /c-carousel -->
			</div>
			<!-- END OF SLIDER -->			
			
			<!-- RIGHT INFO -->
			 <?php
		
              $id = intval($_GET['id']);							
			  $req = mysql_query("SELECT * FROM places WHERE id='$id'" );							   
             while($row = mysql_fetch_array($req))  {
	  $id = $row['id'];
	  $query = mysql_query("SELECT * FROM places_rating WHERE id_places='$id'" );
                while($data = mysql_fetch_assoc($query)){
                    $rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
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
			<div class="col-md-4 detailsright offset-0">
			
				<div class="padding20">
			    <h4 class="lh1"><?php echo htmlentities($dnn['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
				<div class="rate-result-cnt">
                <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                <div class="rate-stars"></div>
                </div> </div>
				
				
				<div class="line3 margtop20"></div>
				
				<div class="col-md-6 bordertype1 padding20">
					<span class="opensans size30 bold grey2"><?php echo $rate_bg; ?>%</span><br/>
					Γενικό Σύνολο
				</div>
				<div class="col-md-6 bordertype2 padding20">
					<span class="opensans size30 bold grey2"><?php echo $rate_value; ?></span>/5<br/>
					Αξιολόγηση Επισκεπτών
				</div>
	
			    <div class="col-md-12 center padding10">
					<?php if ($rate_bg < 30){ ?>
					
<span class="opensans size30 bold padding20 grey2">Κακό!</span>
<?php } ?>
<?php if ($rate_bg > 30 AND $rate_bg < 50){ ?>
<span class="opensans size30 bold padding20 grey2">Μέτριο!</span>
<?php } ?>
<?php if ($rate_bg > 50 AND $rate_bg < 85){ ?>
<span class="opensans size30 bold padding20 grey2">Πολύ Καλό!</span>
<?php } ?>
<?php if ($rate_bg > 85){ ?>
<span class="opensans size30 bold padding20 grey2">Εξαιρετικό!</span>
<?php } ?>
<?php } ?>

				
				</div>
				<div class="line3 margtop20"></div>
				
				<div class="col-md-11 bordertype3">
					<div class="rate-ex1-cnt">
    <div id="1" class="rate-btn-1 rate-btn"></div>
    <div id="2" class="rate-btn-2 rate-btn"></div>
    <div id="3" class="rate-btn-3 rate-btn"></div>
    <div id="4" class="rate-btn-4 rate-btn"></div>
    <div id="5" class="rate-btn-5 rate-btn"></div>
</div>
				</div>
				<div class="clearfix"></div><br/>
				
				
			</div>
			<!-- END OF RIGHT INFO -->
</div>
		<!-- END OF container-->
		
		<div class="container mt25 offset-0">

			<div class="col-md-12 pagecontainer2 offset-0">
				<div class="cstyle10"></div>
		
				<ul class="nav nav-tabs" id="myTab">
					<li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#summary"><span class="summary"></span> <span class="hidetext"> Λίγα λογια για την Τοποθεσία</span>&nbsp;</a></li>
					<li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span class="maps"></span> <span class="hidetext"> Τοποθεσία στον χάρτη</span>&nbsp;</a></li>
					<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#thingstodo"> <span class="thingstodo"></span><span class="hidetext"> Επισκεφθείτε ακόμη...</span>&nbsp;</a></li>

				</ul>			
				<div class="tab-content4" >
					<!-- TAB 1 -->				
					<div id="summary" class="tab-pane active">
						<p class="hpadding20">
						<?php echo htmlentities($dnn['description'], ENT_QUOTES, 'UTF-8'); ?>
						</p>
						<div class="line4"></div>
						
						<!-- Collapse 1 -->	
						<button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse1">
						  <?php echo htmlentities($dnn['map_variable'], ENT_QUOTES, 'UTF-8'); ?> <span class="collapsearrow"></span>
						</button>

						<div class="line4"></div>						
					
					</div>
					
					<!-- TAB 4 -->					
					<div id="maps" class="tab-pane fade">
						<div class="hpadding20">
							  <?php
                               mysql_connect('localhost','user730','fTybYz7N') or die(mysql_error());
                               mysql_select_db('user730_db2') or die(mysql_error());    
                               $result = mysql_query('SELECT * FROM places') or die(mysql_error());
                               $count = 0;
                               $row = mysql_fetch_array($result);
                               ?>
							    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                               <script>
                               google.load('visualization', '1', { 'packages': ['map'] });
                               google.setOnLoadCallback(drawMap);

                               function drawMap() 
							   {
                               var data = google.visualization.arrayToDataTable([
                               ['Country', 'Event'],
                               <?php
                               while($row = mysql_fetch_array($result))
                               
							   {
                               ?>
                               ['<?php  echo $row['map_variable']; ?>', '<center>Τοποθεσία στον Χάρτη</center>'],
                               <?php 
							   } 
							   ?>
                               ]);

                               var options = { showTip: true , zoomLevel: 4,icons: {
      default: {
        normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
        selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
      }
    } };
                               var map = new google.visualization.Map(document.getElementById('chart_div'));
                               map.draw(data, options);
							   };
                               </script>
                               <div id="chart_div"></div>
						      
							   
						</div>
					</div>
					
					<!-- TAB 6 -->					
					<div id="thingstodo" class="tab-pane fade">
					
						<p class="hpadding20 opensans size16 dark bold">Συνιστώμενες Τοποθεσίες σε αυτήν την περιοχή</p>
						
						<div class="line2"></div>
						 <?php
                               mysql_connect('localhost','user730','fTybYz7N') or die(mysql_error());
                               mysql_select_db('user730_db2') or die(mysql_error());  
					           $req = mysql_query('select * FROM places WHERE id="'.$id.'"' );
							   $row = mysql_fetch_array($req);
							   $map_variable = $row['map_variable'];
                               $id = intval($_GET['id']);
							   mysql_query ('UPDATE places SET views= views+1 WHERE id="'.$id.'"');
							   $req1 = mysql_query("SELECT * FROM places WHERE map_variable='$map_variable'" );
while($row1 = mysql_fetch_array($req1))
{
   if ($id != $row1['id'])
   {
							   
                               ?>
						<div class="padding20">
							<div class="col-md-4 offset-0">
								<a href="place?id=<?php  echo $row1['id']; ?>"><img src="<?php  echo $row1['main_image_src']; ?>" alt="" class="fwimg"/></a>
							</div>
							<div class="col-md-12 offset-0">
								<div class="col-md-8 mediafix1">
									<span class="opensans dark size16 margtop1 margtop-5"><?php  echo $row1['title']; ?></span><br/>
										<p class="margtop10"><?php  echo $row1['description']; ?></p>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-12 center bordertype4">									
									<br/><br/><br/>
									<a href="place?id=<?php  echo $row1['id']; ?>" class="bookbtn mt1">Περισσότερα...</a>	
								</div>										
							</div>
							<div class="clearfix"></div>	</div>

						<div class="line2"></div>		
							<?php 
							}}
                        ?>
						</div>						
				</div>
			</div>
			
			<div class="col-md-12" >
			<div class="pagecontainer2 mt20">
			<div class="cpadding1">
						<span class="icon-location"></span>
						<h3 class="opensans">Ίδιου τύπου Τουρισμού Καταχωρήσεις</h3>
						</div>
					
					<div class="row" style="margin-bottom:30px;" >
					
					 <?php
                               mysql_connect('localhost','user730','fTybYz7N') or die(mysql_error());
                               mysql_select_db('user730_db2') or die(mysql_error()); 
                               $id = intval($_GET['id']);							   
					           $req = mysql_query("SELECT * FROM places WHERE id='$id'" );							   
      while($row = mysql_fetch_array($req))  {
	  $tourism_type = $row['tourism_type'];
	  $req1 = mysql_query("SELECT * FROM places WHERE tourism_type='$tourism_type'" );
while($row1 = mysql_fetch_array($req1))
{

$id1=$row1['id'];
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
							   <div class="col-md-4" >
					<div class="cpadding1">
						<a href="#"><img src="<?php  echo $row1['main_image_src'];?>" width="96px" height="61px" class="left mr20" alt=""/></a>
						<a href="place.php?id=<?php  echo $row1['id']; ?>" class="dark"><b><?php  echo $row1['title']; ?></b></a><br/>
						<div class="rate-result-cnt">
                <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                <div class="rate-stars"></div>
                </div> </div>
						</div>
						<?php
						}}
						?></div>
					</div></div>
					<div class="line5"></div>
					
						<br/>
				
					
				</div>				
			
			</div>
		</div>
		
		
		 <?php
	                                             }
	                                             else
	                                             {
		                                         echo 'Αυτή η τοποθεσία δεν είναι καταχωρημένη.';
	                                             }
                                               }
                                               else
                                               {
	                                           echo 'Το ID της τοποθεσίας αυτής δεν προσδιορίζεται.';
                                               }
                                             ?>
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

	<script src="js-details.js"></script>	
    <!-- Custom Select -->
	<script type='text/javascript' src='js/jquery.customSelect.js'></script>
	
    <!-- Custom functions -->
    <script src="js/functions.js"></script>

    <!-- Nicescroll  -->	
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- jQuery KenBurn Slider  -->
    <script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-throttle-debounce.min.js"></script>

    <!-- Counter -->	
    <script src="js/counter.js"></script>	
	<script src="js/initialize-carousel.js"></script>		
	
    <!-- Js Easing-->	
    <script src="js/jquery.easing.js"></script>

    <!-- Bootstrap-->	
    <script src="js/bootstrap.min.js"></script>
	 <script>
        // rating script
        $(function(){ 
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
                            
            $('.rate-btn').click(function(){    
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
                $.ajax({
                    type : "POST",
                    url : "ajax.php",
                    data: dataRate,
                    success: function(data) {
    if(data.success == "yes"){           
        //alert(data.status);
        } else {
            alert("Η αξιολόγησή σας έχει καταχωρηθεί!");
        }
    }
					
                });
                
            });
        });
    </script>

  </body>
</html>
