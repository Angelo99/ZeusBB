<?php 
    include 'include/config.inc.php'; 
 include 'include/functions.inc.php'; 
include 'include/security.inc.php';
session_start();
if(isset($_SESSION['loged'])){
          if (isset($_POST['submit'])) {
        $file = uploadFile('file', true, true);
        
        if (is_array($file['error'])) {
          $message = '';
          foreach ($file['error'] as $msg) {
            $message .= '<p>'.$msg.'</p>';    
          }
        } else {
          $message = "File uploaded successfully";
           $conn = mysqli_connect($server, $username, $password,$db);
           $filename1=$file['filename'];
           $uid=UserByName(sqli($conn,Filter($_SESSION['loged'])));
           $avatar="UPDATE user SET avatar='$filename1' WHERE uid='$uid' "  ;
			      mysqli_query($conn,$avatar);
            mysqli_close($conn);
        }
        echo $message;
      }
	
		}else{
      
      echo "nop";
    }

	?>