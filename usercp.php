<?php
  include 'include/config.inc.php'; 
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 session_start();
 
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
    <title>Profile</title>

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
			<div class="page-header">
      <h1>User Profile</h1>
    </div>

    <div class="row">
      <div  class="col-xs-3 col-sm-3">
        
        
        	<?php
             if(isset($_GET['user']) && !empty($_GET['user'])){
                
                GrabUserInfoProfile($_GET['user']);
                 if(isset($_SESSION['loged']) && UserProfileSecuirtyCheck($_GET['user'])=="ALLOW" ){
                   echo '<form action="upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <input name="file" type="file" size="20" />
                  <input name="submit" type="submit" value="Upload" />
                  </form>';
                 }
             }
            ?>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
            <li class="active" style="width:100%"><a href="#profile" data-toggle="tab">Personal Info</a></li>
            <?php
              if(isset($_SESSION['loged']) && UserProfileSecuirtyCheck($_GET['user'])=="ALLOW"){
                echo '<li style="width:100%;"><a href="#security" data-toggle="tab">Account Security</a></li>
            <li style="width:100%"><a href="#recentPosts" data-toggle="tab">Recent Posts</a></li>
            <li style="width:100%"><a href="#settings" data-toggle="tab">Settings</a></li>';
              }
              ?>
              
          </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content" style="background-color:#FFFFFF;height:500px;width:75%">
            <!-- Profile tab content-->
            <div class="tab-pane active" id="profile"><br>
            	<div style="padding-left:20px;padding-right:20px">
            		<h2>Personal Info</h2>
            		<hr>
            		<br><br>
            		<span style="color:#A0A1AD;font-size:15px">	USERNAME </span>
               	<h5><?php 
                   if(isset($_GET['user']) && !empty($_GET['user'])){
                          if(isset($_SESSION['loged'])) {
                            //echo Logged_user();
                           print_r( GrabUserInfo($_GET['user'])[0]);
                      }
                      else
                      {
                        echo Filter($_GET['user']);
                      }
                   }else{
                     
                   }
                  
                            
                ?>
                </h5>
            	
            		 
            		 
				      </div>            		
            </div>

            <!-- SECURITY tab cintent-->
           <?php
            if(isset($_SESSION['loged']) && UserProfileSecuirtyCheck($_GET['user'])=="ALLOW")
            {
              echo ' <div class="tab-pane" id="security">
              <br>
              <div style="padding-left:20px;padding-right:20px">
                <h2>Account Security</h2>
                <hr>
                <br><br>
              
                
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#changePasswrd"><h5>Change Password </h5></a>
            
                      </h4>
                    </div>

                    <div id="changePasswrd" class="panel-collapse collapse out">
                      <div class="panel-body">
                      <form action="userupdate.php" method="get">
                        <span style="color:#A0A1AD;font-size:15px"> Current Password </span><br>
                          <input type="password" name="cur_password"><br>
                        <span style="color:#A0A1AD;font-size:15px"> New Password </span><br>
                          <input type="password" name="new_password" ><br><br>
                            <input type="hidden" value="'.$_GET['user'].'" name="user" >
                          <input type="hidden" value="2" name="action" >
                          <button type="submit" class="btn btn-info">Submit</button>
                          </form>
                      </div>
                    </div>

                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#changeEmail"><h5>Change E-mail </h5></a>
                      </h4>
                    </div>

                    <div id="changeEmail" class="panel-collapse collapse out">
                      <form action="userupdate.php" method="get">
                      <div class="panel-body">
                        <span style="color:#A0A1AD;font-size:15px"> Current E-mail </span><br>
                          <input type="email" value=" '.GrabUserInfo($_GET['user'])[1].' " name="cur_email"><br>
                        <span style="color:#A0A1AD;font-size:15px"> New E-mail </span><br>
                          <input type="email" name="new_email"><br><br>
                          <input type="hidden" value="'.$_GET['user'].'" name="user" >
                          <input type="hidden" value="1" name="action" >
                          <button type="submit" class="btn btn-info">Submit</button>
                          </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="recentPosts">Messages Tab.</div>
            <div class="tab-pane" id="settings">Settings Tab.</div>
          
            ';
            }else
            {
              
            }
            ?>  
            
            
        </div>
        </div>
        <div class="clearfix"></div>

      

    </div>
		</div>
		
<div class="hidden-xs"> 
      <div class="footer">
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



	</body>
</html>			