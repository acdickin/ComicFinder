<!DOCTYPE html>
<?php
error_reporting(0);
require ("classes/config.php");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome">
    <meta name="author" content="">

    <title>Comic Finder</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/mystyle.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style type="text/css">
	 body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	
	</style>
    <script src="classes/randomHero.js"></script>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="index.php"> COMIC FINDER</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="welcome.php">Favorites</a>
                    </li>
                    <li>
                        <a href="heros.php">Heros</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
				</ul>	
				<ul class="nav navbar-nav navbar-right">
					
				<?php
				session_start();
				
				$fullname = $_SESSION['name'];
				$loginid = $_SESSION['loginid'];		
				if(isset($_SESSION['name']) && !empty($_SESSION['name'])) {
					echo"<li>
							<a href='#'>Welcome  $fullname</a>
						</li>
						<li>
							<a href='index.php' onclick='session_unset();session_destroy();'> log out</a>
						<li>";		
					}
				else{
					Header('Location: index.php');	
				}
				#FOR NAV OF SEARCH AND RANDOM			
					if(isset($_POST['submit']) && (($_POST['find'])!=""))  {
					
					$find=$_POST['find'];
					$sql1="select charid from char where charname like '%$find%'";
					$result = pg_query($sql1) or die("No Results were found for $find");
			
						while ($data = pg_fetch_object($result)) {	
							$row=$data->charid;
							$search=$search.",".$row;
							
						}
						$search=ltrim($search, ',');
						$loc="heros.php?rand=$search";
						
						Header("Location:$loc");
					}
					elseif (isset($_POST['random'])){
						$max=$_SESSION['max'];
						$rand= mt_rand( 1 , $max );
						$loc="heros.php?rand=$rand";
						Header("Location:$loc");
					}	
				?>		
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container">
		<div class="row" >
			<div class="col-lg-12 col-xs-12 ">
				<h1>Hero Page</h1>
			</div>	
		</div>
	</div>
	<div class="container">
		<div class="row" >
			<form class="form-signin" method="POST">
				<div class="col-lg-4 col-xs-12 btn" >
					<button class="btn btn-lg btn-primary btn-block btn" type="submit" name="random" value="random" > Random</button>
				</div>	
				<div class="col-lg-4 col-xs-12 btn" >
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">Submit</button>
				</div>	
				<div class="col-lg-4 col-xs-12 btn " >
					<input class="btn btn-lg btn-primary btn-block btn" type="text" name="find"  placeholder="search by name" >
				</div>	
			</form>
		</div>
	
	
	<?php
	if ( (($_GET['rand'])=='') &&(($_Get['search'])=='')){
		echo"
			<div class='container'>
				<div class='row' style='border:15px groove #73AD21'>
						
						<div class='col-lg-10 col-offset-1'>
							<h1> No Heros Selected</h1>
						</div>
				</div>
			</div>"	;
	}	
	else{
	
		$heros=$_GET['rand'];
		$psql="Select * from char where charid in ($heros)";
		$result = pg_query($psql) or die('Query failed: ' . pg_last_error());
		
		while ($data= pg_fetch_object($result)){
				$charname=$data->charname;
				$charreal=$data->charreal;
				$pic=$data->picture;
				$extra=$data->extra;
				$json=json_decode($extra, true);
				$charname=ucwords($charname);
				$charreal=ucwords($charreal);
		echo"	
			 
<div class='container'>	
	<div class='row'>	
		
		<div class='col-lg-12 col-xs-12'style='border:15px groove #73AD21'>			
				<div  class='col-lg-12' >	
				<div  class='col-lg-4 col-md-12 col-xs-12'  >
					<h3>$charname</h3>
						<img src='img/$pic' alt='$charname' style='height:300px'>
						
						<li> Real name: '$charreal'</li>
				</div>
				<div  class='col-lg-4 col-md-12 col-xs-12' >
					<h3>Best Comics </h3>	
				</div>
				<div  class='col-lg-4 col-md-12 col-xs-12' >
					<h3>Info </h3>";
						foreach($json as $key => $value) {
							$key=ucfirst($key);
							if (gettype($value)=='array')
								{
									$value=implode(',',$value);
									$value=ucfirst($value);
								}			
							$value=ucfirst($value);				
							echo"			
							<h4>$key :</h4>
							<p > $value </p>";			
						}
				
			echo"</div>
						
					
					
				</div>
			</div>
		</div>	
	</div>
</div>
		<br/><br/>
					
				";
				}				
				}
						?>
		
		
			<?php 
				pg_free_result($result);
		
				// Closing connection
				pg_close($conn);
			?>		
	
    <!-- /.container -->
	<div  id= "bottom" class="navbar navbar-fixed-bottom text-center" >
		<p > <!--class-= "text-muted"--> Designed with you in mind</p>
	</div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

</body>

</html>
		
				
				