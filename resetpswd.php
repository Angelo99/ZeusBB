<?php
  include 'include/config.inc.php'; 
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 session_start();

   //echo substr("hellods dsjfdasgdfaguiadfgiu guiasgvafafdgyafd", 0, 10);
  ?>
<!doctype html>
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



  <body style="background-color: #E6E6E6">

    <!-- Navigation bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
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

            <ul class="nav navbar-nav navbar-left">
  
          <li><a href="index.php">All Questions</a></li> 
          <li><a href="none_answer.php">Not Answerd</a></li>
          <li><a href="members.php">Members!</a></li>
          <li><a href="ask.php">ASK!</a></li>

            </ul>
      
            <ul class="nav navbar-nav navbar-right" style="padding-right:50px">
            <li> <?php
               if(isset($_SESSION['loged'])){
                 //echo "<a href='usercp.php?user=".Logged_user()."'>".Logged_user()."</a>";
                   echo ' <br><div class="dropdown">
        <button class="btn btn-link dropdown-toggle btn-xs" type="button" data-toggle="dropdown">'.Logged_user().'
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="usercp.php?user='.Logged_user().'">User Profile</a></li>
          <li><a href="#">something</a></li>
           <li class="divider"></li>
          <li><a href="lg.php">Logout</a></li>
        </ul>
        </div> 
      ';
               
               }else{
                 echo "<button type='button' class='btn btn-sm btn-warning navbar-btn'  data-toggle='modal' data-target='#mySign'>Log in</button></li> ";
               }
               ?> 
         
            </ul>
          </div>
        </div><!-- /.container-fluid -->
    </nav>
  
 
 <div class="container" style="padding-top:75px;background-color:#F1F1F8">

	 
<form role="form">
  <div class="row"> 	
    <div class="col-md-12">
           <div class="center">
					 <h3>Create a new password</h3> 
		  		 	<p>Enter the email address you used when you created the account.</p>
           </div>
    </div> 
  </div>
    <div class="row"> 
          	<div class="form-group col-xs-6">
					<label>Email</label>
					<input type="" name="" class="form-control" id="" value="">
        </div>
          <div class="form-group col-xs-4">
				  <br>
        	<button type="submit" class="btn btn-danger pull-right nav-btn" >Reset</button>
				</div>
			 
			 </div>
    </div>
	 </div>
</form>
 </div>
<br><br><br><br><br><br><br><br><br><br><br>


<!--Footer-->
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
                <li><a href="" class="ftrlinks">Terms and Condition</a></li>
                <li><a href="" class="ftrlinks">Privacy policy</a></li>
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
                <li><a href="" class="ftrlinks">Programming</a></li>
                <li><a href="" class="ftrlinks">Maths</a></li>
                <li><a href="" class="ftrlinks">Test</a></li>
              </ul>
          </div>
          <div class="col-xs-6 col-sm-4">
            <h4>Support</h4>
              <ul class="list-unstyled">
                <li><a href="contactus.php" class="ftrlinks">Contact us</a></li>
                <li><a href="faq.php" class="ftrlinks">FAQ</a></li>
                <li><a href="" class="ftrlinks">Terms and Condition</a></li>
                <li><a href="" class="ftrlinks">Privacy policy</a></li>
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