<?php 
include 'include/config.inc.php';	
include 'include/functions.inc.php'; 
include 'include/security.inc.php';
session_start();
 if(isset($_SESSION['loged'])){
	  
		if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['uid']) && !empty($_GET['uid'])&& isset($_GET['action']) && !empty($_GET['action']))
		{
			if($_GET['action']==1)
			{
				$conn = mysqli_connect($server, $username, $password,$db);
	  			$id=sqli($conn,Filter($_GET['id']));
				$action=sqli($conn,Filter($_GET['action']));
				$check_user= UserByName($_SESSION['loged']);
				$sql=" SELECT * FROM `comment` WHERE id='$id' and user_id='$check_user' "  ;
				$result=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($result);
				if($count==0){
					$check_duplicate=" SELECT * FROM `likes` WHERE cid='$id' and `last_like_uid`='$check_user' ";
					$c=mysqli_query($conn,$check_duplicate);
					$no=mysqli_num_rows($c);
						 
						if($no==0)
						{
								
								 
									echo "Thank You!";
									$incViews="UPDATE comment SET likes=likes+1 WHERE id='$id' "  ;
									mysqli_query($conn,$incViews);
									$DUP="  insert into likes values(0,'$id','$check_user')  "  ;
									$r=mysqli_query($conn,$DUP);
						
						}	else
							{
								echo "You alredy rate this";
							}
				} 	
				else
					{
						echo "you cant rate your own answers";
					}
			}
			else{
				//here we go dislike
				 $conn = mysqli_connect($server, $username, $password,$db);
	  			$id=sqli($conn,Filter($_GET['id']));
				$action=sqli($conn,Filter($_GET['action']));
				$check_user= UserByName($_SESSION['loged']);
				$sql=" SELECT * FROM `comment` WHERE id='$id' and user_id='$check_user' "  ;
				$result=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($result);
				if($count==0){
					$check_duplicate=" SELECT * FROM `likes` WHERE cid='$id' and `last_like_uid`='$check_user' ";
					$c=mysqli_query($conn,$check_duplicate);
					$no=mysqli_num_rows($c);
						 
						if($no==0)
						{
								
								 
									echo "Thank You!";
									$incViews="UPDATE comment SET dislikes=dislikes-1 WHERE id='$id' "  ;
									mysqli_query($conn,$incViews);
									$DUP="  insert into likes values(0,'$id','$check_user')  "  ;
									$r=mysqli_query($conn,$DUP);
						
						}	else
							{
								echo "You alredy rate this";
							}
				} 	
				else
					{
						echo "you cant rate your own answers";
					}
			}
			   
		}
		else{
			echo "para empty";
		}
	 
 }else{
	 echo "Please Login to use Rate system";
 }
	
	
?>