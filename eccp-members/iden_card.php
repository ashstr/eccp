<dl class="user_info">
	<dt><a href="#">
	  <?php
	 // $UID = $_SESSION["UID"];
	  //$info=mysql_query("select * from `memeber` where `UID`='$_POST[user_name]' and `Upass`='$_POST[password]'") or die(mysql_error());
	  
	  ?>
      <img src="./uploaded/mem-profile/avatar-eccp.png" alt="" width="79" height="79" /></a></dt>
  <dd>
    <a class="welcome_user" href="#">Welcome,  <strong><?php echo substr($_SESSION["my_name"], 0, 15); ?></strong></a>
    <span class="log_data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php
		print "ECCP Student Member"; 	?>
      </strong>
    </span>
<!--    <span class="log_data">Last sign in : 16:11 Feb 27th 2012</span>-->
    <a class="logout" href="logOut.php">Logout</a>
    <a class="user_messages" href="inbox.php"><span>
	 <?php
	   $myUID = $_SESSION["UID"];
	   $mnb = mysql_query("SELECT * FROM `message` where `to` = ".$_SESSION["UID"]." and `read` = 'NO'  ");
	   $mm = mysql_num_rows($mnb);
		if($mm){echo $mm."&nbsp;New Message"; }else{ echo "No New Message";}  ?>
     </span></a>    </dd>
</dl>