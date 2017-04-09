<?php
	session_start();
	if(isset($_SESSION['loged'])){
		echo "loged";
	} 
	?>
 
 <html>
<head><title>Register</title>
<script>

</script>
</head>
<body>
	<script type="text/javascript" src="js/validate.js"></script>
<form action="signup.php" method="post" onsubmit=" return !!(isempty('Username') & isempty('Email') & isempty('Password') & compare('Email','con_email') & compare('Password','con_password') & check_user() & check_email() ) ">
	<span id="usernamecheck"></span><br> 
	<span id="emailcheck"></span><br> 
	username:
	<input type="textbox" name="username" id="Username"   onkeyup="return checkuser(this.value)" onfocus="return checkuser(this.value)"><br> 
	
		email:
	<input type="textbox" name="email" id="Email"onkeyup="return checke_email(this.value)" onfocus="return checke_email(this.value)"> 
	
	confirm	email:
	<input type="textbox" name="con_email" id="con_email" >  <br>
	password:
	<input type="textbox" name="password" id="Password">
	
	confirm	password:
	<input type="textbox" name="con_password" id="con_password"><br>
	<img src="cap.php"> <input type="text" name="cap">
	<input type="submit" >
	
	</form>
</body>
</html>


