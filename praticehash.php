<?php
 
   $password = 'Cloudy88!';	
    $password2='butts';
		$salt="iei0339jfgju";
		$password=sha1($salt.$password);
		$password2=sha1($salt.$password2);
echo $password; 
 
$password2=sha1($salt.$password2);

?>