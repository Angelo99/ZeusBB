<?php
 if(isset($_POST['new_qu_top']) && isset($_POST['content']) && isset($_POST['old_qu_top']) && isset($_POST['_old_content']) ){
 
		include 'include/functions.inc.php';
		include 'include/security.inc.php';
	  CheckSimler($_POST['new_qu_top']);

	 
 }
	
 
	 
	?>
	
	 
	 <form action="process.php" method="post">
		 <input type="text" name="new_qu_top" value="new_qu_top">
		 <input type="text" name="content" value="new content">
		 
		 <input type="text" name="old_qu_top" value="old_qu_top">
		 <input type="text" name="_old_content" value="_old_content">
		 <input type="submit">
		 <form>