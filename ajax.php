<?php
require_once 'config.php';

    if($_POST['act'] == 'rate'){
    	//search if the user(ip) has already gave a note
    	$ip = $_SERVER["REMOTE_ADDR"];
    	$therate = $_POST['rate'];
    	$thepost = $_POST['post_id'];

    	$query = mysql_query("SELECT * FROM places_rating where ip= '$ip'  "); 
    	while($data = mysql_fetch_assoc($query)){
    		$rate_db[] = $data;
    	}

    	if(@count($rate_db) == 0 ){
    		mysql_query("INSERT INTO places_rating(id_places, ip, rate)VALUES('$thepost', '$ip', '$therate')");
    	}else{
    		mysql_query("UPDATE places_rating SET rate= '$therate' WHERE ip = '$ip'");
    	}
    } 
?>