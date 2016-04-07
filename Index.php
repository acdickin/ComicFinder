<!DOCTYPE html>
<?php

include("classes/dbconnection.php");
$DBConnection = new DBConnection();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comic Finder</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
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

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar">t</span>
                </button>
                <a class="navbar-brand" href="#"> COMIC FINDER</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
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
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
			
			
			<div class="col-lg-5 ">
                <h1>Welcome to Comic Finder</h1>
               
                
            </div>
			<div class="col-lg-5">
			 <p class="lead">Find a new comic, find out more info about your favorites or discover a new one!</p>
			</div>
			<div class="col-lg-2">
				<ul>
				
				<?php
				$sql="select * from login order by lastname";
					foreach ($DBConnetion ->query($sql) as $row{
						print <li>$row['firstname']+" ";
						print <li>$row['lastname'] +"<br>";
						print <li>$row['login'] \n \n ;
						}
				?>
			</ul>
			
			</div>
			
			<div class="col-lg-12">
			<p class="lead">Freedom</p>
			</div>
		</div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
	<div class="navbar navbar-fixed-bottom text-center">
		<p class= "text-muted">Designed with you in mind</p>
	</div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
