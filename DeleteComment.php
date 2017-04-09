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
				if($count!=0)
				{
					
					//localhost/ZeusBB/DeleteComment.php?id=36&uid=6&action=1
					//id== cmnt id
					//uid== curnt lofed user id
					 //delete goes here
					 $conn = mysqli_connect($server, $username, $password,$db);
					 $deleteQ=" DELETE FROM comment WHERE id='$id'  ";
					 $result=mysqli_query($conn,$deleteQ);
					  header("location: ".$_SERVER['HTTP_REFERER']);
					 //rate.php?id='.$row['id'].'&uid='.$row['user_id'].'&action=2
				} 	
				else
					{
						header("location:error.php?code=NDAz&error=WW91ciBhdHRlbXB0aW5nIHRvIERlbGV0ZSBPdGhlciB1c2VycyBDb21tZW50IQ==");
					}
			 
			}
		 
		}
	 
 }
 else
 {
	 //no loged
 }
	  
		
 
	
?>