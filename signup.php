 <?php
 ini_set('display_errors', TRUE);
include 'include/config.inc.php';
include 'include/security.inc.php';	
include 'include/functions.inc.php';	
session_start();
 

 
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['cap']) && !empty($_POST['cap'])) {
	 
	 if($_POST['email']!=$_POST['con_email']){
		header("location:error.php?code=NDAz=&error=RW1haWwgaXMgTm90IE1hdGNoaW5nIA==");
	 }else if($_POST['password']!=$_POST['con_password']){
		 header("location:error.php?code=NDAz=&error=UGFzc3dvcmQgaXMgTm90IE1hdGNoaW5nIA==");
	 }else if($_POST['cap']!=$_SESSION['vercode']){
		 header("location:error.php?code=Um9ib3Q=&error=SGV5IE1yIFJvYm90IENhcHRjaGEgaXMgV3Jvbmcg");
	 }else if(check_email($_POST['email'])=="DNT"){
		 header("location:error.php?code=NDAz&error=VXNlIEFub3RoZXIgRW1haWw=");
	 }
	 else{
		 
 
		$conn = mysqli_connect($server, $username, $password,$db);
 
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
			 $user=sqli($conn,Filter($_POST['username']));
			 $email=sqli($conn,Filter($_POST['email']));
			 $password=md5(sqli($conn,Filter($_POST['password'])));
			 
			 $registered_date=date("Y-m-d");
			$ip = $_SERVER['REMOTE_ADDR'];
			 
			 $sql = "INSERT INTO user (uid, username, password,email,	reputation,registered_date,	last_login_time,last_post_name,postcount,avatar,last_ip)
				VALUES ('', '$user', '$password','$email','0','$registered_date','0','0','0','def.jpg','$ip')";
				if (mysqli_query($conn, $sql)) {
					echo '<script>window.location="Genpages.php?code=VGhhbmsgWW91IQ==&error=WW91ciBBY2NvdW50IHdpbGwgYmUgYWN0aXZhdGVkIA=="</script>';			   	
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				
				mysqli_close($conn);

		}
		
		 
	 }
	 	
}else{
	header("location:error.php?code=NDAz&error=TG9va3MgbGlrZSBBbiBFbXB0eSBSZXF1ZXN0IG8uTw==");
}



?>