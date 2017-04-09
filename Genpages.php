<?php
	include 'include/config.inc.php';	
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/search.css">
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	 
	</head>



	<body style="background-color: #E6E6E6"  >
		 
 			<?php
		if(isset($_GET['code']) && !empty($_GET['code']) && isset($_GET['error']) && !empty($_GET['error'])  )		{
			echo ' <div class="error_bdy" style="text-align:center; padding:50px;">
						
							<h1 style="font-size:50px; color:rgb(240, 109, 38);">'.base64_decode(Filter($_GET['code'])).'</h1><br><br>
							<p style="font-size:20px;">
							'.base64_decode($_GET['error']).'
							</p>
							<br>
							<p><i><a href="index.php">Redirecting</a> to Home page in 5 second</i></p>
					</div>';
		}else{
			header("location:index.php");
		}				
?>
	</body>	
</html>			

 