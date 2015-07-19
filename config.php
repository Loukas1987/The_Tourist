<?php
//We start sessions
				 error_reporting(E_ERROR | E_PARSE);

session_start();

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('localhost','user730', 'fTybYz7N');
mysql_select_db('user730_db2');

//Webmaster Email
$mail_webmaster = 'triantafillopoulos.loukas@gmail.com';

//Top site root URL
$url_root = 'http://ellaksrv.datacenter.uoc.gr/~user730/the_tourist/index.php';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';
?>