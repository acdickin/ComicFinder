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
			$password=pg_escape_string(sha1($password +$salt));
			
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
						
					var_dump($query);
					pg_close($conn);
					?>
					<script> 
					alert ("Creation of user '$login' was successful");
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
				<BR><BR>
				First Name :
				<BR> 
				<div class="col-sm-offset-1 col-sm-10 "> 
				<input type="text" name="firstname" size="40" required ><BR> 
				</div>
				<BR> <BR> 
				Last Name : 
				<BR> 
				<div class="col-sm-offset-1 col-sm-10 "> 
				<input type="text" name="lastname" size="40" required ><BR> 
				</div>
				<BR> <BR>
				User Name: 
				<BR>
				<div class="col-sm-offset-1 col-sm-10" > 
				<input type="text" name="login" size="40"  required><BR> 
				</div>
				<BR> <BR> 				
				Email Address : 
				<BR>
				<div class="col-sm-offset-1 col-sm-10" > 
				<input type="email" name="email" size="40" required ><BR> 
				</div>
				<BR> <BR> 
				Password :
				<BR> 
				<div class="col-sm-offset-1 col-sm-10"> 
				<input type="password" name="password" size="40"required><BR> 
				</div>
				<BR> <BR> 
				Password Verify :
				<BR> 
				<div class="col-sm-offset-1 col-sm-10"> 
				<input type="password" name="passwordv" size="40" ><BR> 
				</div>
				<BR> <BR> 
				
				
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