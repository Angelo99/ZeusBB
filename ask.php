<?php 
include 'include/config.inc.php';	
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 session_start();


?>

<!DOCTYPE html>
<html>
	<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery-1.11.3.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validate.js"></script>
    <title>Ask A Quetion</title>
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
                <li><p>LOL</p></li>
      				</ul>

      			<ul class="nav navbar-nav navbar-left">
	
					<li><a href="index.php">All Questions</a></li> 
					<li><a href="none_answer.php">Not Answerd</a></li>
					<li><a href="#">Members!</a></li>
					<li><a href="ask.php">ASK!</a></li>

      			</ul>
      			 
      
      			<ul class="nav navbar-nav navbar-right" style="padding-right:50px">
         		<li><?php
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
                 echo "<button type='button' class='btn btn-sm btn-warning navbar-btn'>Log in</button></li> ";
               }
               ?> 
               <!-- Split button -->

      			</ul>
    			</div>
  			</div><!-- /.container-fluid -->
		</nav>

    <div class="container" style="padding-top:75px;background-color:#F1F1F8">
       
      
      
    <div class="col-md-7 col-md-offset-1">
      <div class="row">
        <div class="ask_qu">
        <div class='col-xs-12'> <!-- col xs 6 start here-->
          <form action="ask.php" method="post" onsubmit="return SubmitForm(this)">
           <div class="form-group"> <!-- form grup start here-->
           <?php  if(isset($_SESSION['loged'])){
 		if(isset($_POST['quetion_title']) && !empty($_POST['quetion_title']) && isset($_POST['req']) && !empty($_POST['req']) && isset($_POST['cat']) && !empty($_POST['cat'])){
          //Setting cookies
             
              setcookie("title", $_POST['quetion_title'], time() + (120), "/");
              setcookie("bdy", $_POST['req'], time() + (120), "/");
            
          $val=CheckSimler($_POST['quetion_title']);
          if(isset($_POST['DB']) && !empty($_POST['DB'])){
            $conn1 = mysqli_connect($server, $username, $password,$db);
             $title=sqli($conn1,Filter($_POST['quetion_title']));
             $content=strip_tags(sqli($conn1,Filter($_POST['req'])));
             $cat=sqli($conn1,Filter($_POST['cat']));
             $post_time= date('Y-m-d H:i:s');
             $loged_as= $_SESSION['loged'];
             $author= UserByName($loged_as);
             $sql="INSERT INTO thread VALUES (0,' $author','$cat','$title','$loged_as','$post_time','null','0','0','$content')";
                if (mysqli_query($conn1, $sql)) {
                  echo "<script>window.location='index.php' </script>";
                }
            
          }else{
            if($val=="OK"){
             $conn1 = mysqli_connect($server, $username, $password,$db);
             $title=sqli($conn1,Filter($_POST['quetion_title']));
             $content=strip_tags(sqli($conn1,Filter($_POST['req'])));
             $cat=sqli($conn1,Filter($_POST['cat']));
             $post_time= date('Y-m-d H:i:s');
             $loged_as= $_SESSION['loged'];
             $author= UserByName($loged_as);
             $sql="INSERT INTO thread VALUES (0,' $author','$cat','$title','$loged_as','$post_time','null','0','0','$content')";
                if (mysqli_query($conn1, $sql)) {
                  header("location:none_answer.php");
                }
             
          }else
          {
            
          }
            
          }
          
          
        
        
         
          //mysqli_close($conn1);
         
         
     } 
	 }else{
			
			 header("location:error.php?code=NDAz=&error=UGxlYXNlIFJlZ2lzdGVyIHRvIEFzayBBIFF1ZXN0aW9uIQ==");
		 }
		?>
             
            <span class="label label-warning">Hi <?php echo Logged_user();?></span>
           <br><input class="form-control input-sm" id="quetion_title" type="text" placeholder=" Enter quetion topic here " name="quetion_title"  value="<?php if(isset($_COOKIE["title"]) && !empty($_COOKIE["title"]) ){ echo $_COOKIE["title"];} ?>">
           
               <!--  <div class="edit" style="max-height:800px;min-height:237px;border: 1px solid #867F7F; background-color: white;" contenteditable="true" id="que_con"></div>-->
                <textarea id="que_con"  name="req" class="form-control edit" row="10" style="height:300px"  ><?php if(isset($_COOKIE["bdy"]) && !empty($_COOKIE["bdy"]) ){ echo $_COOKIE["bdy"];} ?></textarea>
				<!--<input type="hidden" id="req" value="" name="req"/> -->
               <div class="form-group">
                  <label for="sel1">Select category</label>
                  <select class="form-control" id="sel1" name="cat">
                    <?php   echo  GetAllCat(0);  ?>
                  </select>
              </div>
              
              <button type="submit" class="btn btn-danger">Submit</button>
           
              
                  <input type="checkbox" name="DB"> Bypass Duplicate Checker
 
           </div> <!-- form grup end here-->
           </form>
        </div> <!-- col xs 6 ends here-->
      </div> 
    

      </div>
     </div> 

       <div class="recent_qu col-md-4" >
            <h3 >Recent Questions</h3>
               <ul class="list-group">
                
                 <?php echo LastQuetions()  ;?>
 
              </ul> 
        </div>
     </div>  

     
 