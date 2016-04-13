<?php
 
   $password = 'Cloudy88!';	
		$salt="iei0339jfgju";
		$password=sha1($salt.$password);
echo $password; 
?>