<?php include_once("Library/config.php"); ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo $site_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">

<!--Stylesheets-->


<link rel="stylesheet" href="./css/reset.css" />
<link rel="stylesheet" href="./css/main.css" />
<link rel="stylesheet" href="./css/typography.css" />
<link rel="stylesheet" href="./css/tipsy.css" />
<!--
<link rel="stylesheet" href="./js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="./uploadify/uploadify.css" /> 	-->
<link rel="stylesheet" href="./css/jquery.ui.all.css" />
<!-- <link rel="stylesheet" href="./css/fullcalendar.css" /> 	-->
<link rel="stylesheet" href="./css/bootstrap.css" />
<link rel="stylesheet" href="./js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="./css/highlight.css" />
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="./js/jquery.min.js"> </script>
<script type="text/javascript" src="./js/jquery.quicksand.js"> </script>
<!--<script type="text/javascript" src="./js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="./js/jquery.tipsy.js"> </script>

<script type="text/javascript" src="./js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="./js/form_elements.js"></script>
<script type="text/javascript" src="./js/jquery.ui.core.js"></script>
<script type="text/javascript" src="./js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="./js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="./js/gcal.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>-->
<script type="text/javascript" src="./js/main.js"> </script>
<meta charset="UTF-8"></head>
<body>
<!--Container-->
<div id="dreamworks_container">
    <!--Primary Navigation Start -->
    <?php $flage = 6; include("primary_nav.php"); ?>
    <!--Primary Navigation End -->
    
<!--Main Content-->
<section id="main_content">
<!--Secondary Navigation-->
<?php include_once("secondary_nav_tools.php"); ?>
<!--Content Wrap-->
<div id="content_wrap">
	
<?php if($_REQUEST["action"]=="delete"){

	$del1 = mysql_query("SELECT  `ID` FROM  `subject` WHERE  `parent_cat` =".$_POST["cat"]);
	if(mysql_num_rows($del1) != 0){
		echo "<script>alert('This Process Cannot Done Success Please Deleted The Sub-Subject First');</script>"; ?>
		      <script>location.href= "sub-subject-archives.php";</script> <?php
    }else{

		$action = mysql_query("delete from `subject` where `ID` = ".$_POST["cat"]);
		  if($action){
			echo "<script>alert('This Process Done Success');</script>"; ?>
				  <script>location.href= "sub-subject-archives.php";</script><?php
	  }else{
			echo "<script>alert('This Process Cannot Done Success Error Deleted XE03');</script>"; ?>
				  <script>location.href= "sub-subject-archives.php";</script><?php
		 }
		 
		 		 
		  }
	}else{  ?>        
<!--One_Wrap-->
  <form name="team" id="team" class="" method="post" enctype="multipart/form-data">
 <div class="one_wrap">

    
    
  <div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
              <h5>New Subject Access</h5>
        </div>
  <div class="widget_body">
            	<!--Activity Table-->

    <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
        <tr>
            <th width="6%">ID</th>
            <th width="38%">Title</th>
            <th width="44%">Date</th>
            <th width="12%">Actions</th>
      </tr>
<?php
 $Sql = mysql_query("select * from `subject` where `parent_cat` = '0' ");
   while ($Row = mysql_fetch_array($Sql)){
	  $ID_main=$Row["ID"]; ?>
		<tr>
		  <td align="left"><?php echo $Row["ID"]; ?></td>
		  <td align="left"><a href="#" style="font-family:Tahoma;"><?php echo $Row["title"]; ?></a></td>
		  <td align="left"><?php echo $Row["date"]; ?></td>
		  <td align="center"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row["ID"]; ?>">X</a>
		  </span></td>
        </tr>
      
		<?php   $Sql2 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
				$Result2 = mysql_query($Sql2);
				
					while ($Row2 = mysql_fetch_array($Result2)){
						$ID_main=$Row2["ID"];?>
		<tr>
		  <td align="left"><?php echo $Row2["ID"]; ?></td>
		  <td align="left"><a href="#" style="font-family:Tahoma;">&nbsp;&nbsp;<?php echo $Row["title"]."&nbsp;>&nbsp;"; echo $Row2["title"]; ?></a></td>
		  <td align="left"><?php echo $Row2["date"]; ?></td>
		  <td align="left"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row2["ID"]; ?>">X</a>
		  </span></td>
        </tr>
		<?php 
		$Sql3 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
		$Result3 = mysql_query($Sql3);
					
	while ($Row3 = mysql_fetch_array($Result3)){
	$ID_main=$Row3["ID"];?>
		<tr>
		  <td align="left"><?php echo $Row2["ID"]; ?></td>
		  <td align="left">
            <a href="#" style="font-family:Tahoma;">&nbsp;&nbsp;
			  <?php echo $Row["title"]."&nbsp;>&nbsp;"; echo $Row2["title"]."&nbsp;>&nbsp;"; echo $Row3["title"]; ?>
            </a>
           </td>
		  <td align="left"><?php echo $Row2["date"]; ?></td>
		  <td align="left"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row2["ID"]; ?>">X</a>
		  </span></td>
        </tr>
		<?php 
		  $Sql4 = "select * from `subject`  where  `parent_cat` ='$ID_main' ";
		  $Result4 = mysql_query($Sql4);
							
		while ($Row4 = mysql_fetch_array($Result4)){
			$ID_main=$Row4["ID"]; ?>
		<tr>
		  <td align="left"><?php echo $Row2["ID"]; ?></td>
		  <td align="left">
            <a href="#" style="font-family:Tahoma;">&nbsp;&nbsp;
			  <?php echo $Row["title"]."&nbsp;>&nbsp;"; echo $Row2["title"]."&nbsp;>&nbsp;"; echo $Row3["title"]."&nbsp;>&nbsp;"; echo $Row4["title"]; ?>
            </a>
           </td>
		  <td align="left"><?php echo $Row2["date"]; ?></td>
		  <td align="left"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row2["ID"]; ?>">X</a>
		  </span></td>
        </tr>
		<?php 
			$Sql5 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
			$Result5 = mysql_query($Sql5);
	
		  while ($Row5 = mysql_fetch_array($Result5)){
			  $ID_main=$Row5["ID"]; ?>
		<tr>
		  <td align="left"><?php echo $Row2["ID"]; ?></td>
		  <td align="left">
            <a href="#" style="font-family:Tahoma;">&nbsp;&nbsp;
			  <?php
			    echo $Row["title"]."&nbsp;>&nbsp;";  echo $Row2["title"]."&nbsp;>&nbsp;";
				echo $Row3["title"]."&nbsp;>&nbsp;"; echo $Row4["title"]."&nbsp;>&nbsp;";
				echo $Row5["title"];
			  ?>
            </a>
           </td>
		  <td align="left"><?php echo $Row2["date"]; ?></td>
		  <td align="left"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row2["ID"]; ?>">X</a>
		  </span></td>
        </tr>
		<?php 
			  $Sql6 = "select * from `subject` where `parent_cat` ='$ID_main' ";
			  $Result6 = mysql_query($Sql6);
	
			while ($Row6 = mysql_fetch_array($Result6)){
				   $ID_main=$Row6["ID"]; ?>
		<tr>
		  <td align="left"><?php echo $Row2["ID"]; ?></td>
		  <td align="left">
            <a href="#" style="font-family:Tahoma;">&nbsp;&nbsp;
			  <?php
			    echo $Row["title"]."&nbsp;>&nbsp;";  echo $Row2["title"]."&nbsp;>&nbsp;";
				echo $Row3["title"]."&nbsp;>&nbsp;"; echo $Row4["title"]."&nbsp;>&nbsp;";
				echo $Row5["title"]."&nbsp;>&nbsp;"; echo $Row6["title"];
			  ?>
            </a>
           </td>
		  <td align="left"><?php echo $Row2["date"]; ?></td>
		  <td align="left"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row2["ID"]; ?>">X</a>
		  </span></td>
        </tr>
		<?php 
		  $Sql6 = "select * from `subject`  where `parent_cat` ='$ID_main' ";
		  $Result6 = mysql_query($Sql6);

			   while ($Row7 = mysql_fetch_array($Result6)){
					  $ID_main=$Row7["ID"]; ?>
		<tr>
		  <td align="left"><?php echo $Row2["ID"]; ?></td>
		  <td align="left">
            <a href="#" style="font-family:Tahoma;">&nbsp;&nbsp;
			  <?php
			    echo $Row["title"]."&nbsp;>&nbsp;";  echo $Row2["title"]."&nbsp;>&nbsp;";
				echo $Row3["title"]."&nbsp;>&nbsp;"; echo $Row4["title"]."&nbsp;>&nbsp;";
				echo $Row5["title"]."&nbsp;>&nbsp;"; echo $Row6["title"]."&nbsp;>&nbsp;";
				echo $Row7["title"];
			  ?>
            </a>
           </td>
		  <td align="left"><?php echo $Row2["date"]; ?></td>
		  <td align="left"><span class="data_actions iconsweet">
		  <a class="tip_north" original-title="View Details" href="view-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>" target="_blank">`</a>
		  <a class="tip_north" original-title="Edit This Information" href="edit-official-vacation.php?valve=<?php echo $Row2["ID"]; ?>">C</a>
		  <a class="tip_north" original-title="Delete This" href="delete-vacation.php?SESSION=ECCP&=SESSIONID=<?php echo rand(11111, 99999); ?>&T=<?php echo $Row2["ID"]; ?>">X</a>
		  </span></td>
        </tr>
		<?php 
			              }// End While
						}// End While
					}
				}
									}
								}
	 } ?>
 </table>


<div class="widget_body">
 <!--Activity Table-->   
  <div class="action_bar" align="center">
<!--   <input name="Update" type="submit" value="Delete This Subject" class="button_small whitishBtn">
     	<input type="hidden" name="action" value="delete">
-->   </div>
  </div>

     </div><!-- End of widget _body Div -->
 </div>

  
   </form>
 </div>    



    <?php } ?>         
      
      </div>
<!--   </section>
 </div>-->

</body>
</html>