<?php 
ini_set('display_errors', TRUE);
include 'include/config.inc.php';
include 'include/security.inc.php';
session_start();

if(isset($_SESSION['loged'])){
		header("Location:index.php");
		}
		 
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	 
		
	
	$conn = mysqli_connect($server, $username, $password,$db);
	
	$username=sqli($conn,Filter($_POST['username']));
	$password=md5(sqli($conn,Filter($_POST['password'])));
	//echo $password;
	$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
		if($count==1){
			header('location:index.php');
			$_SESSION['loged']=$username;
			
		}else{
			header("location:error.php?code=NDAz&error=VXNlcm5hbWUgb3IgUGFzc3dvcmQgaXMgV3Jvbmc=");
		}
	}else{
		header("location:error.php?code=NDAz&error=TG9va3MgbGlrZSBBbiBFbXB0eSBSZXF1ZXN0IG8uTw==");
	}
 

?>