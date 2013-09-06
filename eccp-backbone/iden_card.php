<dl class="user_info">
	<dt><a href="#"><img src="./uploaded/mem-profile/avatar.png" alt="" width="79" height="79" /></a></dt>
  <dd>
    <a class="welcome_user" href="#">Welcome,  <strong><?php echo $_SESSION["user_admin_name"]; ?></strong></a>
    <span class="log_data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php
		print "ECCP Admin Member"; 	?>
      </strong>
    </span>
<!--    <span class="log_data">Last sign in : 16:11 Feb 27th 2012</span>-->
    <a class="logout" href="logOut.php">Logout</a>
    <a class="user_messages" href="inbox.php"><span>
	 <?php
	   $myUID = $_SESSION["user_admin"];
	   $mnb = mysql_query("SELECT * FROM `message` where `to`= $myUID and `read` = 'NO' ");
	   $mm = mysql_num_rows($mnb);
		 if($mm){echo $mm."&nbsp;New Message"; }else{ echo "No New Message";}  ?></span></a></dd>
</dl>