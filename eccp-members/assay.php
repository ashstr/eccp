<?php 
		@session_start();
		@session_destroy();

		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		echo "<script>location.href='login.php'</script>";

?>