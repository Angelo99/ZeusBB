<?php
function Filter($str)
{
    $filter=htmlspecialchars($str, ENT_QUOTES);
	//$filter=mysqli_real_escape_string($str);
	return $filter;
}

function sqli($con,$str1)
{
   
	$sqli_filter=mysqli_real_escape_string($con,$str1);
	return $sqli_filter;
}

?>