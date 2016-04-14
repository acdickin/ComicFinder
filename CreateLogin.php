<html> 
	<head>
	<?php
	require ("classes/config.php");
	require ("classes/clean.php")

	?>
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/mystyle.css" rel="stylesheet">
	</head>

    <body> 
    <?php 
	if(isset($_POST['submit'])){
		
	    $password = $_POST['password'];	
		$passwordv = $_POST['passwordv'];	
		
		
		if($password==$passwordv){
			//all good
		
			
			$firstname = pg_escape_string(clean($_POST['firstname']));
			$lastname = pg_escape_string(clean($_POST['lastname']));
			
			$login = pg_escape_string($_POST['login']);
			$email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			
			$email= pg_escape_string($email);
			
			$salt="iei0339jfgju3n";
			$password=pg_escape_string(sha1($password .$salt));
			
			$psql=pg_query($conn, "select * from login where email='$email'");
			$psql2=pg_query($conn, "select * from login where login='$login'");
				if( pg_num_rows($psql)>0){
					echo "Sorry that email is already in use";
				} 
				elseif( pg_num_rows($psql2)>0)	{
					echo "Sorry that user name already in use";
				}
				else{
					$query = "INSERT INTO login(firstname, lastname, login, hashedpassword, email) VALUES('" . $firstname . "', '" . $lastname . "', '" . $login . "','" . $password . "', '" . $email . "' )";
					$result=pg_query($query);
						if (!$result) { 
							$errormessage = pg_last_error(); 
							echo "Error with query: " . $errormessage; 
						exit(); 
						}	 
						
					
					pg_close($conn);
					?>
					<script> 
					alert ("Creation of user was successful");
					location.href='login.php';
					</script>
				<?php
				
				}
			
	
		}		
		else{
			echo "Sorry your passwords do not match<br/>";
			exit();
		}		
	}	
	else{
	?>
		
		
		<!--<div class="container">

      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" id="login" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required>-->
		
		<form action="CreateLogin.php" method="POST" autocomplete="off"> 
           <div class="col-lg-3 col-xs-1">
		   </div>
			<div class="col-xs-10 col-lg-6 fun center" >
				<h1> Create New User</h1>
				
				<label for="inputLogin" class="sr-only">Firstname</label>
				<input type="text" name="firstname" class="form-control" placeholder="First Name" required autofocus>
				<br/>
				
				<label for="inputLogin" class="sr-only">Lastname</label>
				<input type="text" name="lastname" class="form-control" placeholder="Last Name" required >
				<br/>
				
				<label for="inputLogin" class="sr-only">User Name</label>
				<input type="text" name="login" class="form-control" placeholder="User Name" required >
				<br/>
				
				<label for="inputLogin" class="sr-only">Email </label>
				<input type="email" name="email" class="form-control" placeholder="Email" required >
				<br/>
				
				<label for="Password" class="sr-only">Password </label>
				<input type="password" name="password" class="form-control" placeholder="Password" required >
				<br/>
				
				<label for="Password" class="sr-only">Verify Password </label>
				<input type="password" name="passwordv" class="form-control" placeholder="Password Verify" required >
				<br/>
				
				
				<button class="btn btn-md btn-primary btn-block" type="submit" name="submit" value="Submit">Create User</button>
			<button class="btn btn-md btn-primary btn-block" type="reset" name="Reset" value="clear it"> Clear Form</button>
			<!--	<input type="submit" name="submit" value="Submit">
				<input type="reset" name="reset" value="Clear It">-->
			</div>
			<div class="col-lg-3 col-xs-1">
			</div>
			
			
			
        </form> 
	<?php
		}
		?>
    </body> 
</html> 