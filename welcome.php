<!DOCTYPE html>
<?php

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
		
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>
<
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
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
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
							echo"
								<li>
									<a href='login.php'></a>
								</li>";
									
						}
					?>						
				</ul>
                
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	
	
	
   <!-- Page Content -->
    <div class="container">
        <div class="row" >
			<div class="col-lg-12 col-xs-12 ">
                <br><br>
				<h1>Welcome to Comic Finder</h1>
			</div>
			
		</div>
			
			
		<div class="row">	
			<div class="col-lg-8 col-xs-12">
				<h3>Favorites</h3>
				<br/>
				<?php
							
				$heros="";
					
				// pull fav charaters
				$sql="select unnest(charid) from fav where userid =$loginid";
				$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
				
				$counter=0;
				while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
					foreach ($line as $value){$heros =$value.",".$heros;}
					}		
					$heros=rtrim($heros, ",") ;
					?>
					<ul>
					<?php
										
					if( (pg_num_rows($result))==0 ){
							
							echo"<div  class='row' style='border:2px solid black'>
									<div class='col-lg-6 col-xs-12'>
										<H1> You currently have no favorites</h1>
							
									</div>
							</div>";
					}
					
					
					elseif(isset($result)){
						//pull data about fav characters				
						$sql1="select * from char where charid in($heros) "; 
						$result = pg_query($sql1) or die('Query failed: ' . pg_last_error());
						while ($data= pg_fetch_object($result)){
							$charname=$data->charname;
							$charreal=$data->charreal;
							$pic=$data->picture;
							$counter++;
							$extra=$data->extra;
							$json=json_decode($extra, true);
							
							
							
							if($counter % 2 != 0){	
								echo "
									<div  class='row' style='border:2px solid black'>
										<div class='col-lg-6 col-xs-12'>
										<ul style='list-style-type:none'>
											
											<img src='img/$pic' alt='$charname' style='height:300px'>
											<li> Hero's name: '$charname'</li>
											<br/>
											<li> Real name: '$charreal'</li>
											
										</ul>
										</div>
												
										
										<div  class='col-lg-6 col-xs-12'>
										<h3>More info</h3>
										<p>
										";
										foreach($json as $key => $value) {
											$key=ucfirst($key);
											
											
											if (gettype($value)=="array")
											{
												$value=implode(",",$value);
												$value=ucfirst($value);
											}			
											$value=ucfirst($value);											
											Echo"	<h4>$key :</h4>
											<p > $value </p>";											
										}
										
										Echo"
										</p>
										
										</div>
											
									</div>
									<br/><br/>					
								";
								
							}	
														
							else{
								echo"	<div  class='row' style='border:2px solid black'>
									
											
									
									<div  class='col-lg-6 col-xs-12'>
										<h3>More info</h3>
										
										";
										foreach($json as $key => $value) {
											$key=ucfirst($key);
											
											
											if (gettype($value)=="array")
											{
												$value=implode(",",$value);
												$value=ucfirst($value);
											}			
											$value=ucfirst($value);											
											
											Echo" 
												<h4>$key :</h4>
											<p > $value </p>";										
										}
										
										Echo"
										
									</div>
									<div class='col-lg-6 col-xs-12'>
										<ul style='list-style-type:none'>
											<img src='img/$pic' alt='$charname' style='height:300px'>
											<li> Hero's name: '$charname'</li>
											<br/>
											<li> Real name: '$charreal'</li>
										</ul>
									</div>	
								</div>
								<br/><br/>					
							";
								
							}
						
						}
					}
					else{
					
					}
					
					
					// Free resultset
					pg_free_result($result);

					// Closing connection
					pg_close($conn);
					?>
					
			</div>
			<div class="col-lg-4 col-xs-12 btn" >
			
			
			
			<button class="btn btn-md btn-primary btn-block btn" type="reset" name="random" value="random" onclick="location.href = 'heros.php'"> Random</button>
			<button class="btn btn-md btn-primary btn-block" type="reset" name=
			"Reset" value="search"> Search</button>
			<input type="text" name="login" class="form-control" placeholder="search by name" required autofocus>
			
			
			
			</div>
			
		</div>		
		
			<div id="last" class="col-lg-12 col-xs-12 " >
                <h1></h1>
			<div>
			
		</div>
        <!-- /.row -->

    </div>
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
