<?php
	include 'include/config.inc.php';	
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
 session_start();

if(isset($_GET['action']) && !empty($_GET['action']) ){
	
	if($_GET['action']==1)
	{ 	
					//1 means change email
					if(isset($_GET['cur_email']) && !empty($_GET['cur_email']) && isset($_GET['new_email']) && !empty($_GET['new_email']) && UserProfileSecuirtyCheck($_GET['user'])=="ALLOW"){
				if(check_email($_GET['new_email'])!="DNT"){
					$conn = mysqli_connect($server, $username, $password,$db);
					$old_email=Filter(sqli($conn,$_GET['cur_email']));
					$email=Filter(sqli($conn,$_GET['new_email']));
					
					$incViews="UPDATE user  SET email= '$email' WHERE email='$old_email' "  ;
					mysqli_query($conn,$incViews);
					 header("location:Genpages.php?code=RG9uZQ==&error=WW91ciBBY2NvdW50IFVwZGF0ZWQh");
					
				}else{
					header("location:error.php?code=NDAz&error=VXNlIEFub3RoZXIgRW1haWw=");
				}
			}else{
				header("location:error.php?code=NDAz&error=U2VjdXJpdHkgQWxlcnQgVHJpZ2dlcmVkICEh");
			}
	}
	else
	{
			if(isset($_GET['cur_password']) && !empty($_GET['cur_password']) && isset($_GET['new_password']) && !empty($_GET['new_password']) && UserProfileSecuirtyCheck($_GET['user'])=="ALLOW"){
				  $conn = mysqli_connect($server, $username, $password,$db);
				   $New_pw=md5(sqli($conn,Filter($_GET['new_password'])));
				   $cur_user_id=UserByName($_SESSION['loged']);
				   
				 $old_pw=mysqli_fetch_assoc(mysqli_query($conn,"SELECT password FROM user WHERE uid='$cur_user_id' " ));
					if($old_pw['password']==md5($_GET['cur_password'])){
						 	$incViews="UPDATE user  SET password= '$New_pw' WHERE uid='$cur_user_id' "  ;
							mysqli_query($conn,$incViews);
							header("location:Genpages.php?code=RG9uZQ==&error=WW91ciBBY2NvdW50IFVwZGF0ZWQh");
					}else{
						header("location:error.php?code=NDAz&error=Q3VycmVudCBQYXNzd29yZCBpcyBOb3QgTWF0Y2hpbmc=");
					}
				 
					
				 
			}else{
				//header("location:error.php?code=NDAz&error=U2VjdXJpdHkgQWxlcnQgVHJpZ2dlcmVkICEh");
			}
	}
}

 
 
	?>