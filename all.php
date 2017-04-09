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
	
					<li><a href="allQuestions.html">All Questions</a></li> 
					<li><a href="#">Not Answerd</a></li>
					<li><a href="#">Members!</a></li>
					<li><a href="#">ASK!</a></li>

      			</ul>
      
      			<ul class="nav navbar-nav navbar-right" style="padding-right:50px">
         		<li> <?php
               if(isset($_SESSION['loged'])){
                 //echo "<a href='usercp.php?user=".Logged_user()."'>".Logged_user()."</a>";
                echo "<a href='usercp.php?user=".Logged_user()."'>".Logged_user()."</a>";
               
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
				<!-- start here for cpying-->
				<!--
				  <hr class="ruler">
				<div class="row">
					
					<div class="col-md-12">
						<div class="col-md-3">
							<img src="img/2.jpg" height="100px" width="100px">
						</div>
						<div class="col-md-9">
							 
							<h4><a href="#" class="topic">Topic of the Question</a> - <span style="color:#A0A1AD;">in Programming</span></h4> 
							 <i><p style="font-size:12px; color:#1F770D;"> Author name</p></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<p class="wrdspace">
								<span style="font-size:16px; "class="glyphicon glyphicon-comment"></span> 39 &nbsp;
								<span class="glyphicon glyphicon-thumbs-up"></span> 321 &nbsp;
								<span class="glyphicon glyphicon-eye-open"></span> 200 &nbsp;
							</p>	
							 
						</div>	
						 <a href="shwMore.html"  style="float:right;">Show more</a>
						 
					</div>
					 
				</div> <!-- end here for cpying --> 
				
				<!-- paste ^ -->
				<?php GetAllQuetions(1) ?>
				
		</div> 
	  
			
			 
			<div class="col-md-3  col-md-offset-1">
				<div class="row">	
				 	<div class="col-md-12" style="background-color:#E0E0E0;height:200px">
						<h3>Ask a question</h3>
						<button type="button" class="btn btn-sm btn-warning">ASK</button>
						
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
	
		
		<div class="container" style="background-color:#F1F1F8;text-align:center">	 
			<ul class="pagination">
    			<li>
     				<a href="#" aria-label="Previous">
        			<span aria-hidden="true">&laquo;</span>
     	 			</a>
    			</li>
    			<li><a href="#">1</a></li>
    			<li><a href="#">2</a></li>
    			<li><a href="#">3</a></li>
    			<li><a href="#">4</a></li>
    			<li><a href="#">5</a></li>
    			<li>
      				<a href="#" aria-label="Next">
        			<span aria-hidden="true">&raquo;</span>
     				</a>
    			</li>
  			</ul>
  		</div>	
  	<div class="footer">
  	

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
          <form role="form" action="#" method="post">
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" >
                </div>
                <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                </div>
              
                <button type="submit" style="width: 570px;" class="btn btn-warning pull-right">Sign in</button><br><br>
                <div class="center" style="padding: 10px;">
                  <p>Forgot your password? <a href="reset_pw.html">Click Here</a></p>
                   <p>Not a member?  <a href="registration.php">Click Here</a></p> </div>
          </form>
        </div>
        </div>

      </div>
    </div>
  </div>
	</body>	
</html>			