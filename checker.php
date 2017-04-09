<?php
	//FIX SQL SECURITY!!!!!!!!!
 



if(isset($_GET['user']) && !empty($_GET['user']))	{
	  
	 check_user($_GET['user']);
}

if(isset($_GET['email']) && !empty($_GET['email']))	{
	check_email($_GET['email']);
}

	
function check_user($user){
	 	include 'include/config.inc.php';	
		include 'include/security.inc.php';	
		$conn = mysqli_connect($server, $username, $password,$db);
 
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
			 $user=Filter($_GET['user']);
			 $user=sqli($conn,$user);
			  $sql = "SELECT uid FROM user WHERE username = '$user'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) != 0){
				echo "Username exist";
			}
		}
}	

function check_email($email){
	
 
 
		include 'include/config.inc.php';	
		include 'include/security.inc.php';	
		$conn = mysqli_connect($server, $username, $password,$db);
 
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
			 $email=Filter($_GET['email']);
			 $email=sqli($conn,$email);
			  $sql = "SELECT uid FROM user WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) != 0){
				echo "email exist";
			}
		}
}		



?>