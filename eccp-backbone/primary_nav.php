<?php
   //$flag = "nav_forms";
   
   if($flage == 1){
   		$flage01 = "active";
    }else if($flage == 2){
   		$flage02 = "active";
    }else if($flage == 3){
   		$flage03 = "active";
    }else if($flage == 4){
   		$flage04 = "active";
    }else if($flage == 5){
   		$flage05 = "active";
    }else{
   		$flage06 = "active";
	}  ?>
    
<nav id="primary_nav">
        <ul>
            <li class="nav_dashboard  <?php echo $flage01; ?>"><a href="index.php">Home</a></li> 
            <li class="nav_uielements <?php echo $flage05; ?>"><a href="new-question.php">OnLine Test</a></li>
          <li class="nav_forms <?php echo $flage03; ?>"><a href="inbox.php">Mail-Box</a></li>
            <li class="nav_graphs <?php echo $flage04; ?>"><a href="#">History</a></li>
      		<li class="nav_pages	<?php echo $flage06; ?>"><a href="member-archive.php">Tools</a></li>
<!--        <li class="nav_typography <?php echo $flage06; ?>"><a href="#">Typography</a></li>
            <li class="nav_uielements <?php echo $flage07; ?>"><a href="#">UI Elements</a></li>
            <li class="nav_pages <?php echo $flage08; ?>"><a href="#">Pages</a></li> -->
      </ul>
    </nav>
