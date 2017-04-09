<?php 
/*
 get last posted by   select * from thread  order by id desc limit 5
*/
function timeAgo($time_ago){
$cur_time   = time();
$time_elapsed   = $cur_time - $time_ago;
$seconds    = $time_elapsed ;
$minutes    = round($time_elapsed / 60 );
$hours      = round($time_elapsed / 3600);
$days       = round($time_elapsed / 86400 );
$weeks      = round($time_elapsed / 604800);
$months     = round($time_elapsed / 2600640 );
$years      = round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60){
    return "$seconds seconds ago";
}
//Minutes
else if($minutes <=60){
    if($minutes==1){
        return "one minute ago";
    }
    else{
        return "$minutes minutes ago";
    }
}
//Hours
else if($hours <=24){
    if($hours==1){
        return "an hour ago";
    }else{
        return "$hours hours ago";
    }
}
//Days
else if($days <= 7){
    if($days==1){
        return "yesterday";
    }else{
        return "$days days ago";
    }
}
//Weeks
else if($weeks <= 4.3){
    if($weeks==1){
        return "a week ago";
    }else{
        return "$weeks weeks ago";
    }
}
//Months
else if($months <=12){
    if($months==1){
        return "a month ago";
    }else{
        return "$months months ago";
    }
}
//Years
else{
    if($years==1){
        return "one year ago";
    }else{
        return "$years years ago";
    }
}

}
 function LastQuetions()
  {
 	  include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$query  = "select title,id from thread  order by id desc limit 5";
		$result=mysqli_query($conn,$query);
		 
			while($row = mysqli_fetch_assoc($result)) {
				   //
				  // echo  $row['title']."<br>";
				  echo "<a href='view.php?id=".$row['id']."'><li class=\"list-group-item\" style='word-wrap: break-word;'>  ".$row['title']."</a></li>" ;
				 
			}
			mysqli_close($conn);
  }
 
  
  function HowManyQue($id)
  {
 	  include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$query  = "SELECT count(cat_id) FROM thread WHERE cat_id='$id'";
		$result=mysqli_query($conn,$query);
		while($row = mysqli_fetch_assoc($result)) {
				  return $row['count(cat_id)'];
			}
			mysqli_close($conn);
  }
 function GetAllCat($is_home)
  {
	  include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$query  = "SELECT id,cat_name FROM catgry";
		$result=mysqli_query($conn,$query);
		if($is_home==0){
			while($row = mysqli_fetch_assoc($result)) {
				   echo "<option value=".$row['id']." >".$row['cat_name']."</option>";
				  
				 
			}
		}else{
			while($row = mysqli_fetch_assoc($result)) {
			 echo "<li class=\"list-group-item\"><span class=\"badge\">".HowManyQue($row['id'])."</span><a href=\"cat.php?id=".$row['id']."\"> ".$row['cat_name']."</li></a>";
			//	 echo "<li class=\"list-group-item\"><span class=\"badge\">".HowManyQue($row['id'])."</span>".$row['cat_name']."</li>";
				 //ask samith aiya how to count cat ids in thread with count() whre=id 1 SELECT count(cat_id) FROM `thread` WHERE cat_id=1
			}
		}
			
			mysqli_close($conn);
  }
  
  function Logged_user()
  {
 	 return $_SESSION['loged'];	
  }
  
  function UserByName($user_name)
  {
 	   include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$query  = "SELECT uid FROM user WHERE username='$user_name'";
		$result=mysqli_query($conn,$query);

			while($row = mysqli_fetch_assoc($result)) {
				   return $row['uid'];
				  
				 
			}
			mysqli_close($conn);
  }
  
  function GetCatNameById($id){
	   include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$query  = "SELECT cat_name FROM catgry WHERE id='$id'";
		$result=mysqli_query($conn,$query);

			while($row = mysqli_fetch_assoc($result)) {
				   return $row['cat_name'];
				  
				 
			}
			mysqli_close($conn);
  }
  function GetAllQuetions($no){
	  //get topic(by desc limit 20) of qu get content of qu get views of qu get likes of que get commnets of qu
	  
	    include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$no=Filter(sqli($conn,$no));
		$no=($no*20)-20;
		 
		$query  = "select * from thread  order by id desc limit ".$no.",20";
		$result=mysqli_query($conn,$query);

			while($row = mysqli_fetch_assoc($result)) {
				    
				//  $r= array ($row['id'],$row['user_id'],$row['id'],$row['cat_id'],$row['title'],$row['author'],$row['time'],$row['last_reply'],$row['views'],$row['rate'],$row['content']);
				// print_r($r[$IndexOfarray]);
				//echo $row['title'];
				//SELECT COUNT(comment) FROM `comment` WHERE thread_id=3 
				 
				 $ID=$row['id'];
				 $UID=$row['user_id'];
				  $count=mysqli_fetch_assoc(mysqli_query($conn," SELECT COUNT(comment) FROM comment WHERE thread_id='$ID' " ));
				  $image=mysqli_fetch_assoc(mysqli_query($conn,"SELECT avatar FROM user WHERE uid='$UID' " ));
				   
				echo '<hr class="ruler">
				<div class="row">
					
					<div class="col-md-12">
						<div class="col-md-3">
							<img src="avatar/'.$image['avatar'].'" height="100px" width="100px">
						</div>
						<div class="col-md-9">
							 
							<h4><a href="view.php?id='.$row['id'].'" class="topic" style="word-wrap: break-word;">'.$row['title'].'</a> - <span style="color:#A0A1AD;">in '.GetCatNameById($row['cat_id']).'</span></h4> 
							 <i><p style="font-size:12px; color:#1F770D;">by <a href="usercp.php?user='.$row['author'].'">'.$row['author'].' </a> '.timeAgo(strtotime($row['time'])).'</p></i>
							<p style="word-wrap: break-word;"> '.substr($row['content'], 0, 300)."....".'</p>
							<p class="wrdspace">
								<span style="font-size:16px; "class="glyphicon glyphicon-comment"></span> '.$count['COUNT(comment)'].' &nbsp;
							 
								<span class="glyphicon glyphicon-eye-open"></span>  '. $row['views'].' &nbsp;
							</p>	
							<!--<div class="answered" style="float:right;">
							<h4><span class="label label-default">0 answered</span></h4></div>-->
						</div>	
						 <a href="view.php?id='.$row['id'].'"  style="float:right;">Show more</a>
						 
					</div>
					 
				</div>';
			}
			mysqli_close($conn);
  }
  
function ViewQuetionById($id){
	    include 'config.inc.php';
		//include 'include/security.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
	  $thread_id=sqli($conn,Filter($id));
    	$query  = "select * from thread WHERE id= '$thread_id' ";
		$result=mysqli_query($conn,$query);
		 
		 
			while($row = mysqli_fetch_assoc($result)) {
				 $UID=$row['user_id'];
				$image=mysqli_fetch_assoc(mysqli_query($conn,"SELECT avatar FROM user WHERE uid='$UID' " ));
				 
				    echo '<div class="row">
        <div class="col-xs-12" style="background-color: #ECECEC">
          <div class="col-xs-3">
            <div class="profile-avatar">
              <img class="img-responsive image-members" src="avatar/'.$image['avatar'].'" alt="profile picture">
            </div>
          </div>   
          <div class="col-xs-9">
            
            <h4 style="word-wrap: break-word;"> '.$row['title'].' - <span style="color:#A0A1AD;">in '.GetCatNameById($row['cat_id']).'</span></h4> 
               <i><p style="font-size:12px; color:#1F770D;"> by <a href="usercp.php?user='.$row['author'].'">'.$row['author'].' </a></p></i>
               <div class="col-xs-12" <p style="word-wrap: break-word;"> '.$row['content'].'</p></div>
                <p class="wrdspace">
                 
               	 
			 <span class="glyphicon glyphicon-eye-open"></span>  '. $row['views'].' &nbsp;
              </p>
          </div>   
          
        </div>
      </div>  ';
      
      
				 
			}
			
			$incViews="UPDATE thread SET views=views+1 WHERE id='$thread_id' "  ;
			mysqli_query($conn,$incViews);
			mysqli_close($conn);
  }
 
function AddComment($tid,$uid,$comment){
	//get thread id get logged user id add comment insert into
	//UserByName	
	include 'config.inc.php';
	 //insert into comment values(id,tid,user_id,commnet,time,likes)
	  $conn = mysqli_connect($server, $username, $password,$db);
	  $comment=sqli($conn,Filter($comment));
	  $uid=UserByName(sqli($conn,Filter($uid)));
	  $tid=sqli($conn,Filter($tid));
	   $post_time= date('Y-m-d H:i:s');
      $query  = " insert into comment values(0,'$tid','$uid','$comment','$post_time','0','0') ";
     mysqli_query($conn,$query);
	 
	 $sql = "UPDATE thread SET last_reply='$uid' WHERE id='$tid' ";
	   mysqli_query($conn,$sql);
	   mysqli_close($conn);
 
}
function ViewCommentById($id){
    include 'config.inc.php';
		//include 'include/security.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
	  $id=sqli($conn,Filter($id));
    	$query  = "select * from comment WHERE thread_id= '$id' and likes>=likes order by likes desc ";
		//SELECT * FROM `comment` WHERE thread_id=3 and likes>=likes order by likes desc 
		$result=mysqli_query($conn,$query);
		
		 
		 
			while($row = mysqli_fetch_assoc($result)) {
			 $UID=$row['user_id'];
			  
			 $username=mysqli_fetch_assoc(mysqli_query($conn,"SELECT username,avatar FROM user WHERE uid='$UID' " ));
			 
			 echo '<div class="row">
        <div class="col-xs-11 col-xs-offset-1" style="background-color: #ECECEC">
          <div class="col-xs-4 col-sm-3 col-md-2"><br>
            <img class="img-circle " src="avatar/'.$username['avatar'].'" alt="profile picture" width="75" height="75">
			 
          </div>
          <div class="col-xs-8 col-sm-9 col-md-10" >
           <br> <p style="word-wrap: break-word;">'.$row['comment'].'</p>
            <hr class="ruler"><a   type="button" style="color:green" class="btn btn-default btn-sm glyphicon glyphicon-thumbs-up" onClick=Rate("rate.php?id='.$row['id'].'&uid='.$row['user_id'].'&action=1") "></a>
			<a  type="button" style="color:red" class="btn btn-default btn-sm  glyphicon glyphicon-thumbs-down" onClick=Rate("rate.php?id='.$row['id'].'&uid='.$row['user_id'].'&action=2") "></a>
			<a  href="DeleteComment.php?id='.$row['id'].'&uid='.$row['user_id'].'&action=1" type="button"  class="btn btn-default btn-sm   glyphicon glyphicon-remove"   ></a>
			<br><br><span style="color:green">'.$row['likes'].' Likes</span>
			<span style="color:red">'.$row['dislikes'].' Unlikes</span><br>
			 
          <br>
              <i><span style="font-size:12px; color:rgba(255, 0, 0, 0.9);"> by <a href="usercp.php?user='.$username['username'].'">'.$username['username'].' </a></span></i>
             <span class="wrdspace">   &nbsp;<span> '.timeAgo(strtotime($row['time'])).'</span>
                    
              </span><br><br>           
          </div>  
        </div>
      </div>
      </br></br>';
      
      
				 
			}
			 
			mysqli_close($conn);


}

 
  function GetAllQuetionsByCatId($id){
	  //get topic(by desc limit 20) of qu get content of qu get views of qu get likes of que get commnets of qu
	  
	    include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
	  $cat_id=Filter(sqli($conn,$id));
    	$query  = "select * from thread where cat_id='$cat_id'  order by  id desc limit 20";
		$result=mysqli_query($conn,$query);

			while($row = mysqli_fetch_assoc($result)) {
			 
				 
				 $ID=$row['id'];
				 $UID=$row['user_id'];
				  $count=mysqli_fetch_assoc(mysqli_query($conn," SELECT COUNT(comment) FROM comment WHERE thread_id='$ID' " ));
				  $image=mysqli_fetch_assoc(mysqli_query($conn,"SELECT avatar FROM user WHERE uid='$UID' " ));
				   
				echo '<hr class="ruler">
				<div class="row">
					
					<div class="col-md-12">
						<div class="col-md-3">
							<img src="avatar/'.$image['avatar'].'" height="100px" width="100px">
						</div>
						<div class="col-md-9">
							 
							<h4><a style="word-wrap: break-word;" href="view.php?id='.$row['id'].'" class="topic">'.$row['title'].'</a> - <span style="color:#A0A1AD;">in '.GetCatNameById($row['cat_id']).'</span></h4> 
							 <i><p style="font-size:12px; color:#1F770D;">by <a href="usercp.php?user='.$row['author'].'">'.$row['author'].' </a> '.timeAgo(strtotime($row['time'])).'</p></i>
							<p style="word-wrap: break-word;"> '.substr($row['content'], 0, 300)."....".'</p>
							<p class="wrdspace">
								<span style="font-size:16px; "class="glyphicon glyphicon-comment"></span> '.$count['COUNT(comment)'].' &nbsp;
								<span class="glyphicon glyphicon-thumbs-up"></span> '. $row['rate'].' &nbsp;
								<span class="glyphicon glyphicon-eye-open"></span>  '. $row['views'].' &nbsp;
							</p>	
							<!--<div class="answered" style="float:right;">
							<h4><span class="label label-default">0 answered</span></h4></div>-->
						</div>	
						 <a href="view.php?id='.$row['id'].'"  style="float:right;">Show more</a>
						 
					</div>
					 
				</div>';
			}
			mysqli_close($conn);
  }

 function NoneAnswers($no){
	  //get topic(by desc limit 20) of qu get content of qu get views of qu get likes of que get commnets of qu
	  
	    include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
	 $conn = mysqli_connect($server, $username, $password,$db);
    	$no=Filter(sqli($conn,$no));
		$no=($no*20)-20;
    	$query  = "SELECT * FROM `thread` WHERE last_reply='null' order by id desc limit ".$no." ,20  "  ;
		$result=mysqli_query($conn,$query);

			while($row = mysqli_fetch_assoc($result)) {
			 
				 
				 $ID=$row['id'];
				 $UID=$row['user_id'];
				  $count=mysqli_fetch_assoc(mysqli_query($conn," SELECT COUNT(comment) FROM comment WHERE thread_id='$ID' " ));
				  $image=mysqli_fetch_assoc(mysqli_query($conn,"SELECT avatar FROM user WHERE uid='$UID' " ));
				   
				echo '<hr class="ruler">
				<div class="row">
					
					<div class="col-md-12">
						<div class="col-md-3">
							<img src="avatar/'.$image['avatar'].'" height="100px" width="100px">
						</div>
						<div class="col-md-9">
							 
							<h4><a style="word-wrap: break-word;" href="view.php?id='.$row['id'].'" class="topic">'.$row['title'].'</a> - <span style="color:#A0A1AD;">in '.GetCatNameById($row['cat_id']).'</span></h4> 
							 <i><p style="font-size:12px; color:#1F770D;">by '.$row['author'].' '.timeAgo(strtotime($row['time'])).'</p></i>
							<p style="word-wrap: break-word;"> '.substr($row['content'], 0, 300)."....".'</p>
							<p class="wrdspace">
								<span style="font-size:16px; "class="glyphicon glyphicon-comment"></span> '.$count['COUNT(comment)'].' &nbsp;
								<span class="glyphicon glyphicon-thumbs-up"></span> '. $row['rate'].' &nbsp;
								<span class="glyphicon glyphicon-eye-open"></span>  '. $row['views'].' &nbsp;
							</p>	
							<!--<div class="answered" style="float:right;">
							<h4><span class="label label-default">0 answered</span></h4></div>-->
						</div>	
						 <a href="view.php?id='.$row['id'].'"  style="float:right;">Show more</a>
						 
					</div>
					 
				</div>';
			}
			mysqli_close($conn);
  }
 
function GenPagination($place){
		 if($place=="Home"){
			 include 'config.inc.php';
	 		$conn = mysqli_connect($server, $username, $password,$db);
			$query  = " select * from thread ";
			$r=mysqli_query($conn,$query);
			$count=mysqli_num_rows($r);
			$link=ceil($count/20);
			for($start=1;$start<=$link;$start++)
			{
				if($start==1){
					echo '<li><a  href="index.php?id='.$start.'">'.$start.'</a></li>';
				}else{
					echo '<li><a href="index.php?id='.$start.'">'.$start.'</a></li>';
				}
				
			}
			
			 
		 }else if("None")
		 {
			 //load comment
			 include 'config.inc.php';
	 		$conn = mysqli_connect($server, $username, $password,$db);
			$query  = ' SELECT * FROM `thread` WHERE last_reply="null" ';
			$r=mysqli_query($conn,$query);
			$count=mysqli_num_rows($r);
			$link=ceil($count/20);
			
			for($start=1;$start<=$link;$start++)
			{
				
				if($start==1){
					echo '<li><a  href="none_answer.php?id='.$start.'">'.$start.'</a></li>';
				}else{
					echo '<li><a href="none_answer.php?id='.$start.'">'.$start.'</a></li>';
				}
				
			}
		 }
		 else if("Cat")
		 {
			 
			 
		 }
		 else
		{
			 
			echo "add func later";
				
		}
}
function ViewQuetionTitleById($id){
	    include 'config.inc.php';
		//include 'include/security.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
	  $thread_id=sqli($conn,Filter($id));
    	$query  = "select title from thread WHERE id= '$thread_id' ";
		$result=mysqli_query($conn,$query);
		 
		 
			while($row = mysqli_fetch_assoc($result)) {
 
				 
				    return $row['title'];
      
      
				 
			}
 
			mysqli_close($conn);
  }
  
 function CheckSimler($title){
	 include 'config.inc.php';
	 //include 'include/security.inc.php';
	 $conn = mysqli_connect($server, $username, $password,$db);
	 $title=Filter($title);
    	$query  = "select id,title from thread";
		$result=mysqli_query($conn,$query);
		 
		 	$count=0;
			while($row = mysqli_fetch_assoc($result)) {
				 similar_text (strtolower($row['title']),strtolower($title),$t);
			if($t==0){
				//echo " New topic is ".$_POST['new_qu_top']." old topic is ".$row['title'].$t."<br>";
			}else{
				if($t>=50){
					//echo "Your Topic was ".$_POST['new_qu_top']." We found similer Quetion like ur quetion before submit you can check if ur answer if there <br>";
					//the question you asked,  someone else asked the same
					echo "<p style='color:rgb(177, 59, 59);font-size:14px' >The Question You Asked (".$title.") Similer to Another Quetion (".$row['title'].") <a target='_blank'  href='view.php?id=".$row['id']." '> click to view</a></p>";
					$count++;
				}
			}
			
			}
			if($count==0){
				//echo "post it anyway";
				return "OK";
			}
				
 			 
			mysqli_close($conn);
 }
 
 
 function GrabUserInfo($id){
	 include 'config.inc.php';
	 //include 'include/security.inc.php';
	 $conn = mysqli_connect($server, $username, $password,$db);
	 $user=sqli($conn,Filter($id));
    	$query  = "select * from user where username= '$user' ";
		$result=mysqli_query($conn,$query);
		 
		 	 
			while($row = mysqli_fetch_assoc($result)) {
				 return $user_info = array($row['username'],$row['email'],$row['reputation'],$row['registered_date'],$row['last_login_time'] );
			}
 			 
			mysqli_close($conn);
 }
 
 
  
 function GrabUserInfoProfile($id){
	 include 'config.inc.php';
	 //include 'include/security.inc.php';
	 $conn = mysqli_connect($server, $username, $password,$db);
	 $user=sqli($conn,Filter($id));
    	$query  = "select username,avatar from user where username= '$user' ";
		$result=mysqli_query($conn,$query);
		 
		 	 
			while($row = mysqli_fetch_assoc($result)) {
				echo '<img src="avatar/'.$row["avatar"].'" class="img-responsive"width="257" height="240">';
			}
 			 
			mysqli_close($conn);
 }
 
 
 function UserProfileSecuirtyCheck($id){
				include 'config.inc.php';
				$conn = mysqli_connect($server, $username, $password,$db);
				$user=UserByName(sqli($conn,Filter($id)));
				$check_user= sqli($conn,Filter(Logged_user()));
				$sql=" SELECT * FROM `user` WHERE uid='$user' and username='$check_user' "  ;
				$result=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($result);
				if($count!=0){
					 return "ALLOW";
				} 	
				else
					{
						return "DISALLOW";
					}
 }
 
 function uploadFile ($file_field = null, $check_image = false, $random_name = false) {
       
  //Config Section    
  //Set file upload path
  $path = 'c:/wamp/www/ZeusBB/avatar/'; //with trailing slash
  //Set max file size in bytes
  $max_size = 1000000;
  //Set default file extension whitelist
  $whitelist_ext = array('jpg','png','gif');
  //Set default file type whitelist
  $whitelist_type = array('image/jpeg', 'image/png','image/gif');

  //The Validation
  // Create an array to hold any output
  $out = array('error'=>null);
               
  if (!$file_field) {
    $out['error'][] = "Please specify a valid form field name";           
  }

  if (!$path) {
    $out['error'][] = "Please specify a valid upload path";               
  }
       
  if (count($out['error'])>0) {
    return $out;
  }

  //Make sure that there is a file
  if((!empty($_FILES[$file_field])) && ($_FILES[$file_field]['error'] == 0)) {
         
    // Get filename
    $file_info = pathinfo($_FILES[$file_field]['name']);
    $name = $file_info['filename'];
    $ext = $file_info['extension'];
               
    //Check file has the right extension           
    if (!in_array($ext, $whitelist_ext)) {
      $out['error'][] = "Invalid file Extension";
    }
               
    //Check that the file is of the right type
    if (!in_array($_FILES[$file_field]["type"], $whitelist_type)) {
      $out['error'][] = "Invalid file Type";
    }
               
    //Check that the file is not too big
    if ($_FILES[$file_field]["size"] > $max_size) {
      $out['error'][] = "File is too big";
    }
               
    //If $check image is set as true
    if ($check_image) {
      if (!getimagesize($_FILES[$file_field]['tmp_name'])) {
        $out['error'][] = "Uploaded file is not a valid image";
      }
    }

    //Create full filename including path
    if ($random_name) {
      // Generate random filename
      $tmp = str_replace(array('.',' '), array('',''), microtime());
                       
      if (!$tmp || $tmp == '') {
        $out['error'][] = "File must have a name";
      }     
      $newname = $tmp.'.'.$ext;                                
    } else {
        $newname = $name.'.'.$ext;
		//echo $newname;
    }
               
    //Check if file already exists on server
    if (file_exists($path.$newname)) {
      $out['error'][] = "A file with this name already exists";
    }

    if (count($out['error'])>0) {
      //The file has not correctly validated
      return $out;
    } 

    if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $path.$newname)) {
      //Success
      $out['filepath'] = $path;
      $out['filename'] = $newname;
      return $out;
    } else {
      $out['error'][] = "Server Error!";
    }
         
  } else {
    $out['error'][] = "No file uploaded";
    return $out;
  }      
}
 function LastQuetionsFooter()
  {
 	  include 'config.inc.php';
	  $conn = mysqli_connect($server, $username, $password,$db);
    	$query  = "select id,cat_name FROM catgry  order by id asc limit 3";
		$result=mysqli_query($conn,$query);
		 
			while($row = mysqli_fetch_assoc($result)) {
				   //
				  // echo  $row['title']."<br>";
				  echo "<li><a href='cat.php?id=".$row['id']."'class=\"ftrlinks\">".$row['cat_name']."</a><li>" ;
				 
			}
			mysqli_close($conn);
  }
  function AllMemebers(){
	 include 'config.inc.php';
	 //include 'include/security.inc.php';
	 $conn = mysqli_connect($server, $username, $password,$db);
	 //$user=sqli($conn,Filter($id));
    	$query  = "select * from user ";
		$result=mysqli_query($conn,$query);
		 
		 	 
			while($row = mysqli_fetch_assoc($result)) {
				// return $user_info = array($row['username'],$row['email'],$row['reputation'],$row['registered_date'],$row['last_login_time'] );

				 echo ' <div class="col-md-3 members thumbnail">
                	<div class="row">
                		<center><img src="avatar/'.$row['avatar'].'" class="img-responsive img-circle image-members" ></center>
                	</div> 
                	<div class="row">
                		<div><h3 class="text-center">'.$row['username'].'</h3></div>
                	</div>	
                	
                	<div class="row">
                		<center><a href="usercp.php?user='.$row['username'].' "type="button" class="btn btn-info">View</a></center>
                	</div>
                	    
              	</div>';
			}
 			 
			mysqli_close($conn);
 }
 
 
 function check_email($email){
	
 
 
		include 'include/config.inc.php';	
		//include 'include/security.inc.php';	
		$conn = mysqli_connect($server, $username, $password,$db);
 
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
			 $email=Filter($email);
			 $email=sqli($conn,$email);
			  $sql = "SELECT uid FROM user WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) != 0){
				echo "email exist";
				return "DNT";
			}
		}
}
?>