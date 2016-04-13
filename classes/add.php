<?php 
        require ('config.php');
	
       
		
		

		
		  
	/* Error checking*/ 
	$querycheck = "select login from login where login =".$login
		  $result = pg_query($check); 
		  if $result == $login{
			  $nameErr = "That name is already taken. Please try a new name";
		  }
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["firstname"]) || empty($_POST["lastname"]) ||empty($_POST["login"]) ) {
			$nameErr = "Name is required";
		} 
		else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameErr = "Only letters and white space allowed"; 
			
			}
		}
	}
	
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} 
	else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format"; 
		$password=""
		}
	}
	
	
		
		
		
		
       
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage;
            exit(); 
        } 
        printf ("These values were inserted into the database - %s %s %s %s %s ", $firstname, $lastname, $login, $password, $email);
       

		// Closing connection
		pg_close($dbconn);
        ?> 