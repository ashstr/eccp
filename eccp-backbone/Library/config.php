<?php
session_start();
require('class.manage.php');
include("user_info.php");
connect_data("localhost",$DBuser,$DBpass,$DBName);//user name password dbname 

	mysql_query("SET character_set_client=cp1256"); 
	mysql_query("SET character_set_connection=cp1256"); 
	mysql_query("SET character_set_database=cp1256"); 
	mysql_query("SET character_set_results=cp1256"); 
	mysql_query("SET character_set_server=cp1256");

					
	$mainsql="select * from `data` ";
	$rsq=mysql_query($mainsql) or die(mysql_error());
	$getdata=mysql_fetch_array($rsq);

	$rtv = $_SERVER['HTTP_HOST']; 	
	
	$domain_site   = $getdata["domain"];  // domain site ex:  site.com
	$site_title    = $getdata["site_title"];// page title
	$mail_admin    = $getdata["email_admin"];// mail administrator

	$sender 	    = $getdata["sender"];// mail administrator
	$stat_word     = $getdata["stat_word"];
	
	$mailtitle     = $getdata["mailtitle"];
	$newsnum       = $getdata["newsnum"];
	
	$close_site    = $getdata["close_site"];
	$popup_win     = $getdata["popup_win"];
	$popup_content = $getdata["popup_content"];
	$popup_height  = $getdata["popup_height"];
	$popup_width   = $getdata["popup_width"];

//check if advert expire
//@include("online.php");

//connect_data("localhost",$DBuser,$DBpass,$DBName);//user name password dbname 
//mysql_query("SET character_set_client=cp1256"); 
//mysql_query("SET character_set_connection=cp1256"); 
//mysql_query("SET character_set_database=cp1256"); 
//mysql_query("SET character_set_results=cp1256"); 
//mysql_query("SET character_set_server=cp1256");
// get Site Information////////////////////////////

/*mysql_query("SET character_set_client=utf8"); 
mysql_query("SET character_set_connection=utf8"); 
mysql_query("SET character_set_database=utf8"); 
mysql_query("SET character_set_results=utf8"); 
mysql_query("SET character_set_server=utf8"); 
mysql_query("SET NAMES 'utf8'"); 
*/

//novasco2_eccp  DB Name
//k$q301qR!*%~ pass
// user novasco2_eccp

define("Baner_Path" , "ban/" , "case_sensitive=true" );  ?>