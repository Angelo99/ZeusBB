<?php 
include 'include/config.inc.php';	
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 session_start();

 if(isset($_SESSION['loged'])) {
	 echo "redirect me";
 }
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<link href="css/social-buttons.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		 
	</head>



	<body style="background-color: #E6E6E6;">
		<script type="text/javascript" src="js/validate.js"></script>
		<!-- Navigation bar-->
		<nav class="navbar navbar-inverse  navbar-fixed-top">
  			<div class="container-fluid">
    		<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
      				
      					<a class="navbar-brand" href="index.php">Zeus BB</a>
    			</div>


    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">      				
        
      				</ul>

      			<ul class="nav navbar-nav navbar-left" >
	
					<li><a href="index.php">All Questions</a></li> 
					<li><a href="none_answer.php">Not Answerd</a></li>
					<li><a href="members.php">Members!</a></li>
					<li><a href="ask.php">ASK!</a></li>

      			</ul>
      
      			<ul class="nav navbar-nav navbar-right" style="padding-right:50px">
         		<li> <button type="button" class="btn btn-sm btn-warning navbar-btn" data-toggle='modal' data-target='#mySign' >Log in</button></li> 
      			</ul>
    			</div>
  			</div><!-- /.container-fluid -->
		</nav>
		<!-- End of Navigation bar -->

		<div class="container" style="padding-top:75px;background-color:#F1F1F8;width:50%">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<h2>Registration</h2><br>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Account Details</h3>
					</div>
				</div>
				
	
				<form action="signup.php" method="post" onsubmit=" return !!(isempty('Username') & isempty('Email') & isempty('Password') & compare('Email','con_email') & compare('Password','con_password') & check_user() & check_email() ) ">
					<div class="row">
						<div class="form-group col-xs-12">
						 
						 
							<label>Username</label>
							<input type="text" class="form-control" name="username" id="Username"   onkeyup="return checkuser(this.value)" onfocus="return checkuser(this.value)">
							<br><div class="alert alert-danger" role="alert" id="usernamecheck" style="display:none"> </div>
						</div>	
					</div>
		
					<div class="row">
						<div class="form-group col-xs-12">
							<label>Password</label>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
							<input type="password" class="form-control" name="password" id="Password">
						</div>
					</div>
						
					<div class="row">	
						<div class="form-group col-xs-12">
							<label>Confirm Password</label>
						</div>
					</div>
		
					<div class="row">
						<div class="form-group col-xs-12">
							<input type="password" class="form-control" name="con_password" id="con_password">
						</div>
					</div>
				
		
					<div class="row">
						<div class="form-group col-xs-12">
							<label>Email</label>
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-xs-12">
							<input type="email" class="form-control" name="email" id="Email"onkeyup="return checke_email(this.value)" onfocus="return checke_email(this.value)">
							<br><div class="alert alert-danger" role="alert" id="emailcheck" style="display:none"> </div>
						</div>
						 
					</div>
					<div class="row">	
						<div class="form-group col-xs-12">
							<label>Confirm Email</label>
						</div>
					</div>
		
					<div class="row">
						
						<div class="form-group col-xs-12">
							<input type="email" class="form-control" name="con_email" id="con_email">
						</div>
					</div>
					<div class="row">
						
						<div class="form-group col-xs-12">
							<img src="cap.php"><br><br>
							 <input type="text" class="form-control" name="cap" placeholder="Enter above Capcha">
						</div>
					</div>
					
					<div class="row">
            			<div class="form-group col-xs-12" >
            		 		<button type="submit" class="btn btn-primary" id="" value="">Sign Up</button>
           				 </div>
        			</div>
        		</form>
			</div>
		

			<div class="col-md-6">
				<h3>As a member you can</h3>
				<hr>
				<ul>
				<li>Ask questions</li>
				<li>Rate questions</li>
				<li>Answer questions</li>
				</ul>
				
				<br><br><br><br><br><br><br>
				<!--<img src="img/l.png" height="100px" width="100px" style="float:right;">-->
			</div>
		</div>

<div class="hidden-xs">	
  		<div class="footer">
  			<div class="container">
  				<div class="col-xs-6 col-sm-4">
  					<h4>Top Catagories</h4>
  						<ul class="list-unstyled">
  							<?php  LastQuetionsFooter()?>
  						</ul>
  				</div>
  				<div class="col-xs-6 col-sm-4">
  					<h4>Support</h4>
  						<ul class="list-unstyled">
  							<li><a href="contactus.php" class="ftrlinks">Contact us</a></li>
  							<li><a href="faq.php" class="ftrlinks">FAQ</a></li>
  							<li><a href="termsncondition.php" class="ftrlinks">Terms and Condition</a></li>
  							<li><a href="privacy.php" class="ftrlinks">Privacy policy</a></li>
  							<li><a href="abtus.php" class="ftrlinks">About US</a></li>
  						</ul>
  				</div>
  				<div class="col-xs-6 col-sm-4">
    	    	    <h4>Social Media</h4>
    	    		    <ul class="list-inline">
    	    		     	<li><a href="https://twitter.com" class="links"><button class="btn btn-twitter"><i class="fa fa-twitter"></i></button></a></li>
    	    		     	<li><a href="https://facebook.com" class="links"><button class="btn btn-facebook"><i class="fa fa-facebook"></a></i></button></li>
    	    		     	<li><a href="https://instagram.com" class="links"><button class="btn btn-instagram"><i class="fa fa-instagram"></i></button></a></li>
    	    		     	<li><a href="https://plus.google.com" class="links-g"><button class="btn btn-google"><i class="fa fa-google"></i></button></a></li>

    	    	    	</ul>
    	    	</div>  			
  			</div>	
  		</div>
  	</div>


  	<div class="visible-xs">	
  		<div class="footer" style="height:300px">
  			<div class="container">
  			<div class="col-xs-6 col-sm-4">
  					<h4>Top Catagories</h4>
  						<ul class="list-unstyled">
  							<?php  LastQuetionsFooter()?>
  						</ul>
  				</div>
  				<div class="col-xs-6 col-sm-4">
            <h4>Support</h4>
              <ul class="list-unstyled">
                <li><a href="contactus.php" class="ftrlinks">Contact us</a></li>
                <li><a href="faq.php" class="ftrlinks">FAQ</a></li>
                <li><a href="termsncondition.php" class="ftrlinks">Terms and Condition</a></li>
                <li><a href="privacy.php" class="ftrlinks">Privacy policy</a></li>
                <li><a href="abtus.php" class="ftrlinks">About US</a></li>
              </ul>
          </div>
  				<div class="col-xs-12 col-sm-4">
    	    		<hr>
    	    		<center>    
    	    	    <ul class="list-inline">
    	    		     	<li><a href="https://twitter.com" class="links"><button class="btn btn-twitter"><i class="fa fa-twitter"></i></button></a></li>
    	    		     	<li><a href="https://facebook.com" class="links"><button class="btn btn-facebook"><i class="fa fa-facebook"></a></i></button></li>
    	    		     	<li><a href="https://instagram.com" class="links"><button class="btn btn-instagram"><i class="fa fa-instagram"></i></button></a></li>
    	    		     	<li><a href="https://plus.google.com" class="links-g"><button class="btn btn-google"><i class="fa fa-google"></i></button></a></li>

    	    	    	</ul>
    	    	    </center> 
    	    	</div> 			
  			</div>	
  		</div>
  	</div>  	

<!-- POP UP LOGIN-->
  <div class="container"> 
    <div id="mySign" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Member Sign In</h4>
          </div>
        <div class="modal-body">
          <form role="form" action="login.php" method="post">
              <div class="form-group">
                <label for="email">User Name</label>
                <input type="username" class="form-control" id="username" name="username">
              </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" name="password" >
                </div>
                
              
                <button type="submit" style="width: 570px;" class="btn btn-warning pull-right">Sign in</button><br><br>
                <div class="center" style="padding: 10px;">
                 
                   <p>Not a member?  <a href="registration.php">Click Here</a></p>
                   <p>Forgot password? <a href="resetpswd.php">Click Here</a></p> </div>
          </form>
        </div>
        </div>

      </div>
    </div>
  </div>
	</body>
</html>