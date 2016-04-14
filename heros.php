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
									<a href='Welcome.php'>Welcome  $fullname</a>
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
		<div class="row">	
			 <div class="col-lg-1 col-xs-1">
		   </div>
			<div class="col-lg-10 col-xs-12 " '>
				
				<br/> <br/>
				<h3>Hero's page</h3>
					<div  class='col-lg-4 col-xs-11'  >
						<h3>Hero </h3>
							
						</div>
					
					<div  class='col-lg-4 col-xs-11' >
						
						<h3>Info </h3>
							
						</div>
					
					<div  class='col-lg-4 col-xs-11' >
						
						<h3>Best Comics </h3>
							
						</div>
					
			</div>
		</div>	
	
				
				
				
				