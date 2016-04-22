<html> 
	<head>
	<?php
	require ("classes/config.php");
	require ("classes/clean.php")

	?>
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/mystyle.css" rel="stylesheet">
	<style type="text/css">
	 body {  padding-top: 70px;   }
	
	</style>
	
	</head>

    <body> 
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
				$max=$_SESSION['max'];
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

	
		
		
		
		
<div class='container'>	
	<div class='row'>	
		<div class='col-lg-12 col-xs-12' >			
					
			<div class='col-lg-2 col-md-4 col-xs-4'  >
				<h2>Name</h2>
			</div>	
			<div  class='col-lg-2 col-md-4 col-xs-4'  >
				<h2>Image</h2>
			</div>
			<div  class='col-lg-2 col-md-4 col-xs-4'  >	
				<h2>Real name</h2>
			</div>
			<div  class='col-lg-4 col-md-8 col-xs-8' >
				<h2>Extra</h2>
			</div>
			<div  class='col-lg-2 col-md-4 col-xs-4' >
			
			</div>
		</div>
	</div>
</div>		
	<?php 
		$num=0;
		$psql ="select * from char";
		$result = pg_query($psql) or die('Query failed: ' . pg_last_error());			
				while ($data= pg_fetch_object($result)){
				$charname=$data->charname;
				$charreal=$data->charreal;
				$pic=$data->picture;
				$extra=$data->extra;
				$json=json_decode($extra, true);
				$charname=ucwords($charname);
				$charreal=ucwords($charreal);
				$num++;
				
		if(isset($_POST['update$num'] )){
							echo"
<div class='container' id='$num'>	
	<div class='row'>	
		<div class='col-lg-12 col-xs-12' >			
			<div  class='col-lg-2 col-md-4 col-xs-4'  >
				<input class='btn btn-sm btn-primary btn-block btn' type='charname' name='charname'  value='$charname'  >
				
			</div>	
			<div  class='col-lg-2 col-md-4 col-xs-4'  >
				<img src='img/$pic' alt='$charname' style='height:100px; float:left'>
			</div>
			<div  class='col-lg-2 col-md-4 col-xs-4'  >	
				<input class='btn btn-sm btn-primary btn-block btn' type='charreal' name='charreal'  value='$charreal'  >			
			</div>
			<div  class='col-lg-4 col-md-8 col-xs-8' >";
					foreach($json as $key => $value) {
						$key=ucfirst($key);
						if (gettype($value)=='array')
						{
								$value=implode(',',$value);
								$value=ucfirst($value);
									
						$value=ucfirst($value);				
						echo"
						<div  class='col-lg-6 col-md-4 col-xs-4'  >									
						<input class='btn btn-sm btn-primary btn-block btn' type='key' name='key'  value='$key'  >
						
						<input class='btn btn-sm btn-primary btn-block btn' type='value' name='value'  value='$value'  >
						</div>";		
						}
			}
			
			
		}
		else{
			echo"
<div class='container' id='$num'>	
	<div class='row'>	
		<div class='col-lg-12 col-xs-12' >			
			<div  class='col-lg-2 col-md-4 col-xs-4'  >
				<h4>$charname</h4>
			</div>	
			<div  class='col-lg-2 col-md-4 col-xs-4'  >
				<img src='img/$pic' alt='$charname' style='height:100px; float:left'>
			</div>
			<div  class='col-lg-2 col-md-4 col-xs-4'  >	
			 <p>Real name: '$charreal'</p>
			</div>
			<div  class='col-lg-4 col-md-8 col-xs-8' >";
					foreach($json as $key => $value) {
						$key=ucfirst($key);
						if (gettype($value)=='array')
						{
								$value=implode(',',$value);
								$value=ucfirst($value);
									
						$value=ucfirst($value);				
						echo"
						<div  class='col-lg-6 col-md-4 col-xs-4'  >									
						<p>$key:</p>
						<p > $value </p>
						</div>";		
						}
						}
			}
			echo"</div>	
		<form class='update_delete' method='POST'>
		<div  class='col-lg-2 col-md-4 col-xs-4'  >	
			<div  class='col-lg-6 col-md-6 col-xs-6' >
					<button class='btn btn-xs btn-primary btn-block' type='submit' name='update$num' value='update$num'>Update</button>
			</div>
				
			<div  class='col-lg-6 col-md-6 col-xs-6' >
					<button class='btn btn-xs btn-primary btn-block' type='submit' name='delete$num' value='delete$num' Onclick='ConfirmDelete()'>Delete</button>	
					
			</div>	
		</div>
		</form>
		
		</div>	
			</div> 
	</div>
</div>";
	}
?><script>function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
     psql="
  else
    return false;
} </script>
	
    </body> 
</html> 