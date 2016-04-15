
<!DOCTYPE html>
<html lang="en">

<head>
<?php

require ("classes/config.php");
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
			<div class="col-lg-3 col-xs-1">
		   </div>
		<div class="col-xs-10 col-lg-6 fun2 center" >
		  <form class="form-signin" method="POST" autocomplete="off">
			<h2 class="form-signin-heading">Please sign in</h2>
			<label for="inputLogin" class="sr-only">Login</label>
			<input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
			<br/>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<div class="checkbox">
			  <label>
				<input type="checkbox" value="remember-me"> Remember me
			  </label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">Sign in</button>
		  </form>
		  <br/>
			<button class="btn btn-lg btn-primary btn-block" onclick=" location.href='CreateLogin.php'"> Create New User</button>
		</div> <!-- /container -->
	</div>
		<?php
    
	if(isset($_POST['submit'])){	
	
	
	$login=$_POST['login'];
	$password=$_POST['password'];
	$salt="iei0339jfgju3n";
	$password=sha1($password.$salt);
	
	$psql="select firstname, lastname, loginid from login where login = '$login' and hashedpassword='$password' ";
	$result=pg_query($psql);

		if(pg_num_rows(($result))>0){
	
			session_start();
			while ($data= pg_fetch_object($result)){
				$fname=$data->firstname;
				$lname=$data->lastname;	
				$loginid=$data->loginid;
				$fname =ucfirst($fname);
				$lname =ucfirst($lname);
				$_SESSION['name']= $fname." ".$lname; 
				$_SESSION['loginid']=$loginid;
			}
			?>
			<script>location.href=('welcome.php')</script>
			<?php
		}
		else{
			echo"Wrong Username/Password combination";
		}
	
	}
	else{
	/*Nothing submitted yet*/
	}
	?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  
  </body>
</html>