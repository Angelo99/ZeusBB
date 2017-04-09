<?php
	include 'include/config.inc.php';	
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 session_start();

   //echo substr("hellods dsjfdasgdfaguiadfgiu guiasgvafafdgyafd", 0, 10);
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
			 
				
			<div class="col-md-8">
				 <?php 
					if(isset($_GET['id']) && !empty($_GET['id']) ){
						NoneAnswers($_GET['id']);
					}else{
						NoneAnswers(1);
					}
						
					 ?>
				<?php  ?>
				
		</div> 
	  
			
			 
			<div class="col-md-3  col-md-offset-1">
				<div class="row">	
				 	<div class="col-md-12" style="background-color:#E0E0E0;height:200px">
						<h3>Ask a Question</h3>
						<p>The Zeus BB an Expert Forum is intended to be a place where students can go to find answers to any questions that they have been unable to find using other resources.</p>
						<a style="float:right" href="ask.php" type="button" class="btn btn-sm btn-warning">Ask Right Now!</a>
						
					</div>
				</div>	
			<hr class="ruler">
	
				<div class="row">
					<div class="col-md-12">
						<h3>Categories</h3>
					</div>	
	
					<div class="col-md-12">
						 <ul class="list-group">
						<li class="list-group-item">
							 <?php   echo  GetAllCat(1);  ?>
						</li>
						</ul>
					</div>
					 
					 
					 
				</div>	
			</div>	
		</div> 
	
		
		<center>
			<div class="container" style="background-color:#F1F1F8;text-align:center">	 
			<ul class="pagination">
    			<li>
     				<a href="#" aria-label="Previous">
        			<span aria-hidden="true">&laquo;</span>
     	 			</a>
    			</li>
    			<?php GenPagination("None");?>
    			<li>
      				<a href="#" aria-label="Next">
        			<span aria-hidden="true">&raquo;</span>
     				</a>
    			</li>
  			</ul>
  		</div>
			
		</center>	
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